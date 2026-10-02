<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\UserModel;
use App\Models\ReviewModel;

class Home extends BaseController
{
    public function index(): string
    {
        $productModel = new ProductModel();
        $f = $this->request->getGet();

        $query = $productModel
    ->groupStart()
        ->where('status !=', 'arsip')
        ->orWhere('status', null)
    ->groupEnd();

        // Pencarian manual berdasarkan nama, deskripsi, dan kategori
if (! empty($f['cari'])) {

    $keyword = strtolower(trim($f['cari']));
    $kata = preg_split('/\s+/', $keyword);

    $kategoriMap = [
        'atasan'    => 'Atasan',
        'bawahan'   => 'Bawahan',
        'outer'     => 'Outerwear',
        'outerwear' => 'Outerwear',
        'sepatu'    => 'Sepatu',
        'tas'       => 'Tas',
        'aksesoris' => 'Aksesoris',
        'aksesori'  => 'Aksesoris',
        'elektronik'=> 'Elektronik',
    ];

    // Cek apakah ada kata yang merupakan kategori
    $kategori = null;
    $kataLain = [];

    foreach ($kata as $k) {
        if (isset($kategoriMap[$k])) {
            $kategori = $kategoriMap[$k];
        } else {
            $kataLain[] = $k;
        }
    }

    // Kalau ada kategori, filter berdasarkan kategori
    if ($kategori !== null) {
        $query = $query->where('category', $kategori);
    }

    // Kalau masih ada kata lain, cari di nama/deskripsi
    foreach ($kataLain as $k) {
        $query = $query->groupStart()
            ->like('name', $k)
            ->orLike('description', $k)
            ->groupEnd();
    }
}

        if (! empty($f['kategori'])) $query = $query->where('category', $f['kategori']);
        if (! empty($f['ukuran'])) $query = $query->where('size', $f['ukuran']);
        if (! empty($f['kondisi'])) $query = $query->where('condition', $f['kondisi']);
        if (! empty($f['lokasi'])) $query = $query->where('location', $f['lokasi']);
        if (! empty($f['pembayaran'])) $query = $query->where('payment_method', $f['pembayaran']);
        if (! empty($f['pengiriman'])) $query = $query->where('shipping_option', $f['pengiriman']);
        if (! empty($f['rating'])) $query = $query->where('rating >=', $f['rating']);

        if (! empty($f['harga'])) {
            if ($f['harga'] === 'bawah50') $query = $query->where('price <', 50000);
            if ($f['harga'] === '50-300') $query = $query->where('price >=', 50000)->where('price <=', 300000);
            if ($f['harga'] === 'atas300') $query = $query->where('price >', 300000);
        }

        if (($f['urutkan'] ?? '') === 'termurah') {
            $query = $query->orderBy('price', 'ASC');
        } elseif (($f['urutkan'] ?? '') === 'termahal') {
            $query = $query->orderBy('price', 'DESC');
        } else {
            $query = $query->orderBy('id', 'DESC');
        }

        $data['products'] = $query->findAll();
        $data['f'] = $f;

        // Notifikasi khusus admin: jumlah penjual yang menunggu verifikasi
        $data['pendingSellerCount'] = 0;
        if (session()->get('user_role') === 'admin') {
            $data['pendingSellerCount'] = (new UserModel())
                ->where('role', 'penjual')
                ->where('verification_status', 'pending')
                ->countAllResults();
        }

        // "Penjual Terpercaya": ambil penjual yang sudah disetujui admin,
        // lengkap dengan jumlah produk yang dia jual.
        $sellers = (new UserModel())
            ->where('role', 'penjual')
            ->where('verification_status', 'approved')
            ->orderBy('verified_at', 'DESC')
            ->findAll(12);

        foreach ($sellers as &$seller) {
            $seller['product_count'] = $productModel
                ->where('user_id', $seller['id'])
                ->countAllResults();
        }
        unset($seller);

        $data['trustedSellers'] = $sellers;

        $data['statBarangTerselamatkan'] = (new ProductModel())->countAllResults();

$data['statPenjualAktif'] = (new UserModel())
    ->where('role', 'penjual')
    ->where('verification_status', 'approved')
    ->countAllResults();

$ratingSummary = (new ReviewModel())->getSiteRatingSummary();
$data['statRatingPositif'] = $ratingSummary['total_reviews'] > 0
    ? (int) round(($ratingSummary['avg_rating'] / 5) * 100)
    : 98;

$kotaUnik = (new ProductModel())
    ->select('location')
    ->where('location IS NOT NULL', null, false)
    ->where('location !=', '')
    ->distinct()
    ->findAll();
$data['statKotaTerjangkau'] = count($kotaUnik);

// Data user yang sedang login
$data['currentUser'] = null;

if (session()->get('isLoggedIn')) {
    $data['currentUser'] = (new UserModel())
        ->find(session()->get('user_id'));
}

        return view('welcome_message', $data);
    }
}