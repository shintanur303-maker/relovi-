<?php

namespace App\Controllers;

use App\Models\UserModel;

class Scan extends BaseController
{
    // Kategori yang valid, sama persis dengan yang dipakai di form jual barang
    private array $kategoriValid = [
        'Atasan', 'Bawahan', 'Outerwear', 'Sepatu', 'Tas', 'Elektronik', 'Aksesoris',
    ];

    // Halaman kamera
    public function index()
    {
        $data['pendingSellerCount'] = 0;
        if (session()->get('user_role') === 'admin') {
            $data['pendingSellerCount'] = (new UserModel())
                ->where('role', 'penjual')
                ->where('verification_status', 'pending')
                ->countAllResults();
        }

        return view('scan_camera', $data);
    }

    // Terima foto, kirim ke AI vision buat nebak kategori, lalu balikin JSON
    public function proses()
    {
        $photo = $this->request->getFile('photo');

        if (! $photo || ! $photo->isValid()) {
            return $this->response->setJSON([
                'message' => 'Foto tidak terbaca, coba jepret ulang.',
            ]);
        }

        // Simpan sementara supaya bisa dibaca & diubah ke base64
        $tmpPath = $photo->getTempName();
        $imageData = base64_encode(file_get_contents($tmpPath));
        $mimeType = $photo->getClientMimeType() ?: 'image/jpeg';

        $kategori = $this->tebakKategoriDenganAI($imageData, $mimeType);

        if ($kategori === null) {
            return $this->response->setJSON([
                'message' => 'Belum berhasil mengenali jenis barangnya. Coba foto dengan latar lebih polos & pencahayaan cukup.',
            ]);
        }

        return $this->response->setJSON([
            'redirect' => '/produk?kategori=' . urlencode($kategori),
        ]);
    }

    // Panggil Gemini API buat mengklasifikasikan foto ke salah satu kategori
    private function tebakKategoriDenganAI(string $base64Image, string $mimeType): ?string
    {
        $apiKey = getenv('GEMINI_API_KEY');

        if (! $apiKey) {
            // Belum ada API key -> fitur AI belum bisa jalan
            log_message('warning', 'GEMINI_API_KEY belum diset di .env');
            return null;
        }

        $daftarKategori = implode(', ', $this->kategoriValid);
        $model = 'gemini-2.5-flash'; // model gratis-tier, cek daftar terbaru di aistudio.google.com

        $payload = [
            'contents' => [
                [
                    'parts' => [
                        [
                            'inline_data' => [
                                'mime_type' => $mimeType,
                                'data'      => $base64Image,
                            ],
                        ],
                        [
                            'text' => "Lihat foto barang ini. Pilih SATU kategori yang paling cocok dari daftar berikut: {$daftarKategori}. Jawab HANYA dengan satu kata nama kategorinya persis seperti di daftar, tanpa penjelasan tambahan.",
                        ],
                    ],
                ],
            ],
        ];

        $ch = curl_init("https://generativelanguage.googleapis.com/v1beta/models/{$model}:generateContent");
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST           => true,
            CURLOPT_POSTFIELDS     => json_encode($payload),
            CURLOPT_HTTPHEADER     => [
                'content-type: application/json',
                'x-goog-api-key: ' . $apiKey,
            ],
            CURLOPT_TIMEOUT => 20,
        ]);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($httpCode !== 200 || ! $response) {
            log_message('error', 'Gagal memanggil Gemini API: HTTP ' . $httpCode . ' - ' . $response);
            return null;
        }

        $data = json_decode($response, true);
        $teksJawaban = trim($data['candidates'][0]['content']['parts'][0]['text'] ?? '');

        // Cocokkan jawaban AI dengan daftar kategori yang valid (jaga-jaga kalau ada typo/beda kapital)
        foreach ($this->kategoriValid as $kategori) {
            if (strcasecmp($kategori, $teksJawaban) === 0) {
                return $kategori;
            }
        }

        return null;
    }
}