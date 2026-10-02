<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\CartModel;
use App\Models\UserModel;
use App\Models\OrderModel;
use App\Models\WishlistModel;
use App\Models\AddressModel;
use App\Models\NotificationModel;
use App\Models\PaymentMethodModel;
use App\Models\PaymentCardModel;

class Account extends BaseController
{
    public function index()
    {
        if (! session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $productModel = new ProductModel();
        $cartModel = new CartModel();
        $wishlistModel = new WishlistModel();

        $data = [
            'myProducts' => $productModel
                ->where('user_id', session()->get('user_id'))
                ->findAll(),

            'cartCount' => count(
                $cartModel
                    ->where('user_id', session()->get('user_id'))
                    ->findAll()
            ),

            'wishlistCount' => $wishlistModel
    ->where('user_id', session()->get('user_id'))
    ->countAllResults(),

        ];

        return view('account', $data);
    }

    public function profil()
    {
        if (! session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $user = (new UserModel())
            ->find(session()->get('user_id'));

        return view('account_profil', [
            'user' => $user,
        ]);
    }

    public function simpanProfil()
{
    if (! session()->get('isLoggedIn')) {
        return redirect()->to('/login');
    }

    $userId = session()->get('user_id');

    $userModel = new UserModel();

    // Ambil data user saat ini
    $user = $userModel->find($userId);

    if (! $user) {
        return redirect()
            ->to('/akun')
            ->with('error', 'Data pengguna tidak ditemukan.');
    }

    // Validasi data profil
    $rules = [
        'name'  => 'required|min_length[3]|max_length[100]',
        'email' => "required|valid_email|is_unique[users.email,id,{$userId}]",
        'phone' => 'permit_empty|max_length[20]',
    ];

    if (! $this->validate($rules)) {
        return redirect()
            ->back()
            ->withInput()
            ->with('errors', $this->validator->getErrors());
    }

    // Data yang akan disimpan
    $data = [
        'name'     => $this->request->getPost('name'),
        'email'    => $this->request->getPost('email'),
        'gender'   => $this->request->getPost('gender'),
        'phone'    => $this->request->getPost('phone'),
        'address'  => $this->request->getPost('address'),
        'shop_bio' => $this->request->getPost('shop_bio'),
    ];

    // =========================
    // UPLOAD FOTO PROFIL
    // =========================

    $avatar = $this->request->getFile('avatar');

    if ($avatar && $avatar->isValid() && ! $avatar->hasMoved()) {

        // Validasi tipe file
        $allowedTypes = [
            'image/jpg',
            'image/jpeg',
            'image/png',
            'image/webp'
        ];

        if (! in_array($avatar->getMimeType(), $allowedTypes)) {
            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    'Foto profil harus berupa JPG, JPEG, PNG, atau WEBP.'
                );
        }

        // Validasi ukuran maksimal 2 MB
        if ($avatar->getSizeByUnit('mb') > 2) {
            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    'Ukuran foto profil maksimal 2 MB.'
                );
        }

        // Buat folder avatar jika belum ada
        $uploadPath = FCPATH . 'uploads/avatars/';

        if (! is_dir($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }

        // Buat nama file acak
        $newName = $avatar->getRandomName();

        // Pindahkan file
        $avatar->move($uploadPath, $newName);

        // Simpan nama file ke database
        $data['avatar'] = $newName;

        // Hapus foto lama jika ada
        if (! empty($user['avatar'])) {

            $oldAvatar = $uploadPath . $user['avatar'];

            if (is_file($oldAvatar)) {
                unlink($oldAvatar);
            }
        }
    }

    // Update data user
    $userModel->update($userId, $data);

    // Update nama di session
    session()->set(
        'user_name',
        $this->request->getPost('name')
    );

    return redirect()
        ->to('/akun/profil')
        ->with(
            'success',
            'Profil berhasil diperbarui.'
        );
}

    public function pesanan()
    {
        if (! session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $status = $this->request->getGet('status');

        $orders = (new OrderModel())
            ->getOrdersForBuyer(
                session()->get('user_id'),
                $status
            );

        return view('account_pesanan', [
            'orders'      => $orders,
            'statusAktif' => $status,
        ]);
    }

    public function bayar($orderId)
{
    if (! session()->get('isLoggedIn')) {
        return redirect()->to('/login');
    }

    $userId = session()->get('user_id');

    $orderModel = new OrderModel();

    $order = $orderModel
        ->where('id', $orderId)
        ->where('buyer_id', $userId)
        ->first();

    if (! $order) {
        return redirect()
            ->to('/akun/pesanan')
            ->with('error', 'Pesanan tidak ditemukan.');
    }

    if ($order['status'] !== 'belum_dibayar') {
        return redirect()
            ->to('/akun/pesanan')
            ->with('error', 'Pesanan ini tidak dapat dibayar.');
    }

    return view('account_bayar', [
        'order' => $order,
    ]);
}

public function prosesBayar($orderId)
{
    if (! session()->get('isLoggedIn')) {
        return redirect()->to('/login');
    }

    $userId = session()->get('user_id');

    $orderModel = new OrderModel();

    // Cari pesanan milik user yang sedang login
    $order = $orderModel
        ->where('id', $orderId)
        ->where('buyer_id', $userId)
        ->first();

    if (! $order) {
        return redirect()
            ->to('/akun/pesanan')
            ->with('error', 'Pesanan tidak ditemukan.');
    }

    // Pastikan hanya pesanan yang belum dibayar yang bisa diproses
    if ($order['status'] !== 'belum_dibayar') {
        return redirect()
            ->to('/akun/pesanan')
            ->with('error', 'Pesanan ini sudah diproses.');
    }

    // Simulasi pembayaran berhasil
    $orderModel->update($orderId, [
        'status' => 'dikemas'
    ]);
    
    // Kirim notifikasi ke penjual bahwa pembayaran sudah dilakukan
$notificationModel = new NotificationModel();

$productModel = new ProductModel();
$product = $productModel->find($order['product_id']);

if ($product) {
    $notificationModel->insert([
        'user_id'  => $order['seller_id'],
        'type'     => 'order',
        'title'    => 'Pembayaran Diterima',
        'message'  => 'Pembayaran untuk pesanan "' . $product['name'] . '" telah diterima. Silakan proses pesanan.',
        'link'     => '/jual/pesanan',
        'is_read'  => 0,
    ]);
}

    return redirect()
        ->to('/akun/pesanan?status=dikemas')
        ->with(
            'success',
            'Pembayaran berhasil. Pesanan sedang diproses oleh penjual.'
        );
}

public function pesananSelesai($orderId)
{
    if (! session()->get('isLoggedIn')) {
        return redirect()->to('/login');
    }

    $userId = session()->get('user_id');

    $orderModel = new OrderModel();

    // Cari pesanan milik buyer yang sedang login
    $order = $orderModel
        ->where('id', $orderId)
        ->where('buyer_id', $userId)
        ->first();

    if (! $order) {
        return redirect()
            ->to('/akun/pesanan')
            ->with('error', 'Pesanan tidak ditemukan.');
    }

    // Hanya pesanan yang sudah dikirim yang bisa diselesaikan
    if ($order['status'] !== 'dikirim') {
        return redirect()
            ->to('/akun/pesanan')
            ->with('error', 'Pesanan belum dapat diselesaikan.');
    }

    // Ubah status menjadi selesai
    $orderModel->update($orderId, [
        'status' => 'selesai'
    ]);

    // Kirim notifikasi ke penjual
$notificationModel = new NotificationModel();

$productModel = new ProductModel();
$product = $productModel->find($order['product_id']);

if ($product) {
    $notificationModel->insert([
        'user_id'  => $order['seller_id'],
        'type'     => 'order',
        'title'    => 'Pesanan Selesai',
        'message'  => 'Pesanan "' . $product['name'] . '" telah diterima oleh pembeli.',
        'link'     => '/jual/pesanan',
        'is_read'  => 0,
    ]);
}

    return redirect()
        ->to('/akun/pesanan?status=selesai')
        ->with(
            'success',
            'Pesanan berhasil diselesaikan. Terima kasih!'
        );
}

public function ajukanPengembalian($orderId)
{
    if (! session()->get('isLoggedIn')) {
        return redirect()->to('/login');
    }

    $userId = session()->get('user_id');

    $orderModel = new OrderModel();

    // Cari pesanan milik buyer yang sedang login
    $order = $orderModel
        ->where('id', $orderId)
        ->where('buyer_id', $userId)
        ->first();

    if (! $order) {
        return redirect()
            ->to('/akun/pesanan')
            ->with('error', 'Pesanan tidak ditemukan.');
    }

    // Pengembalian hanya bisa diajukan untuk pesanan yang sudah selesai
    if ($order['status'] !== 'selesai') {
        return redirect()
            ->to('/akun/pesanan')
            ->with('error', 'Pesanan belum dapat diajukan untuk pengembalian.');
    }

    // Ubah status menjadi pengembalian
    $orderModel->update($orderId, [
        'status' => 'pengembalian'
    ]);

    // Kirim notifikasi ke seller
$notificationModel = new NotificationModel();

$productModel = new ProductModel();
$product = $productModel->find($order['product_id']);

if ($product) {
    // Notifikasi ke seller
    $notificationModel->insert([
        'user_id'  => $order['seller_id'],
        'type'     => 'order',
        'title'    => 'Pengajuan Pengembalian',
        'message'  => 'Buyer mengajukan pengembalian untuk pesanan "' . $product['name'] . '".',
        'link'     => '/jual/pesanan',
        'is_read'  => 0,
    ]);

    // Cari semua admin
    $adminUsers = (new UserModel())
        ->where('role', 'admin')
        ->findAll();

    foreach ($adminUsers as $admin) {
        $notificationModel->insert([
            'user_id'  => $admin['id'],
            'type'     => 'order',
            'title'    => 'Pengajuan Pengembalian',
            'message'  => 'Ada pengajuan pengembalian untuk pesanan "' . $product['name'] . '".',
            'link'     => '/notifikasi',
            'is_read'  => 0,
        ]);
    }
}

    return redirect()
        ->to('/akun/pesanan?status=pengembalian')
        ->with(
            'success',
            'Pengajuan pengembalian berhasil dikirim.'
        );
}

public function pengaturanChat()
{
    if (! session()->get('isLoggedIn')) {
        return redirect()->to('/login');
    }

    return view('account_pengaturan_chat');
}

public function pengaturanPesanan()
{
    if (! session()->get('isLoggedIn')) {
        return redirect()->to('/login');
    }

    return view('account_pengaturan_pesanan');
}

public function pengaturanNotifikasi()
{
    if (! session()->get('isLoggedIn')) {
        return redirect()->to('/login');
    }

    return view('account_pengaturan_notifikasi');
}

public function pengaturanPrivasi()
{
    if (! session()->get('isLoggedIn')) {
        return redirect()->to('/login');
    }

    return view('account_pengaturan_privasi');
}

public function pengaturanBlokir()
{
    if (! session()->get('isLoggedIn')) {
        return redirect()->to('/login');
    }

    return view('account_pengaturan_blokir');
}

public function pengaturanBahasa()
{
    if (! session()->get('isLoggedIn')) {
        return redirect()->to('/login');
    }

    return view('account_pengaturan_bahasa');
}

    public function pengaturan()
    {
        if (! session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        return view('account_pengaturan');
    }
   public function alamat()
{
    if (! session()->get('isLoggedIn')) {
        return redirect()->to('/login');
    }

    $addressModel = new AddressModel();

    $addresses = $addressModel
        ->where('user_id', session()->get('user_id'))
        ->orderBy('is_primary', 'DESC')
        ->orderBy('id', 'DESC')
        ->findAll();

    return view('account_alamat', [
        'addresses' => $addresses,
    ]);
}

public function tambahAlamat()
{
    if (! session()->get('isLoggedIn')) {
        return redirect()->to('/login');
    }

    return view('account_alamat_tambah');
}
    public function simpanAlamat()
{
    if (! session()->get('isLoggedIn')) {
        return redirect()->to('/login');
    }

    $addressModel = new AddressModel();

    $isFirstAddress = $addressModel
    ->where('user_id', session()->get('user_id'))
    ->countAllResults() === 0;

    $addressModel->insert([
        'user_id'        => session()->get('user_id'),
        'label'          => $this->request->getPost('label'),
        'recipient_name' => $this->request->getPost('recipient_name'),
        'phone'          => $this->request->getPost('phone'),
        'province'       => $this->request->getPost('province'),
        'city'           => $this->request->getPost('city'),
        'district'       => $this->request->getPost('district'),
        'village'        => $this->request->getPost('village'),
        'postal_code'    => $this->request->getPost('postal_code'),
        'full_address'   => $this->request->getPost('full_address'),
        'latitude'       => $this->request->getPost('latitude'),
        'longitude'      => $this->request->getPost('longitude'),
        'is_primary'     => $isFirstAddress ? 1 : 0,
    ]);

    return redirect()
        ->to('/akun/pengaturan/alamat')
        ->with('success', 'Alamat berhasil disimpan.');
}

public function jadikanAlamatUtama($id)
{
    if (! session()->get('isLoggedIn')) {
        return redirect()->to('/login');
    }

    $userId = session()->get('user_id');

    $addressModel = new AddressModel();

    // Pastikan alamat tersebut memang milik user yang sedang login
    $address = $addressModel
        ->where('id', $id)
        ->where('user_id', $userId)
        ->first();

    if (! $address) {
        return redirect()
            ->to('/akun/pengaturan/alamat')
            ->with('error', 'Alamat tidak ditemukan.');
    }

    // Jadikan semua alamat milik user bukan utama
    $addressModel
        ->where('user_id', $userId)
        ->set(['is_primary' => 0])
        ->update();

    // Jadikan alamat yang dipilih sebagai alamat utama
    $addressModel->update($id, [
        'is_primary' => 1,
    ]);

    return redirect()
        ->to('/akun/pengaturan/alamat')
        ->with('success', 'Alamat utama berhasil diubah.');
}

    public function keamanan()
{
    if (! session()->get('isLoggedIn')) {
        return redirect()->to('/login');
    }

    $user = (new UserModel())->find(session()->get('user_id'));

    return view('account_keamanan', [
        'user' => $user,
    ]);
}

    public function simpanKeamanan()
    {
        if (! session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $userId = session()->get('user_id');

        $userModel = new UserModel();
        $user = $userModel->find($userId);

        $passwordLama = $this->request->getPost('password_lama');
        $passwordBaru = $this->request->getPost('password_baru');
        $konfirmasi = $this->request->getPost('konfirmasi_password');

        if (! password_verify($passwordLama, $user['password'])) {
            return redirect()
                ->back()
                ->with(
                    'error',
                    'Password lama salah.'
                );
        }

        if (strlen($passwordBaru) < 6) {
            return redirect()
                ->back()
                ->with(
                    'error',
                    'Password baru minimal 6 karakter.'
                );
        }

        if ($passwordBaru !== $konfirmasi) {
            return redirect()
                ->back()
                ->with(
                    'error',
                    'Konfirmasi password tidak cocok.'
                );
        }

        $userModel->update($userId, [
            'password' => password_hash(
                $passwordBaru,
                PASSWORD_DEFAULT
            ),
        ]);

        return redirect()
            ->to('/akun/pengaturan')
            ->with(
                'success',
                'Password berhasil diganti.'
            );
    }

    public function hapusAkun()
    {
        if (! session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        return view('account_hapus');
    }

    public function konfirmasiHapusAkun()
    {
        if (! session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $userId = session()->get('user_id');

        $userModel = new UserModel();
        $user = $userModel->find($userId);

        if (! password_verify(
            $this->request->getPost('password'),
            $user['password']
        )) {
            return redirect()
                ->back()
                ->with(
                    'error',
                    'Password salah, akun tidak dihapus.'
                );
        }

        $userModel->delete($userId);

        session()->destroy();

        return redirect()
            ->to('/')
            ->with(
                'success',
                'Akun kamu sudah dihapus.'
            );
    }

    public function pengaturanDetail(string $slug)
    {
        if (! session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $judulMap = [
    'alamat'      => 'Alamat Saya',
    'rekening'    => 'Rekening Bank/Kartu',
    'chat'        => 'Pengaturan Chat',
    'pesanan'     => 'Pengaturan Pesanan',
    'notifikasi'  => 'Pengaturan Notifikasi',
    'privasi'     => 'Pengaturan Privasi',
    'blokir'      => 'Pengguna Diblokir',
    'bahasa'      => 'Bahasa / Language',
    'bantuan'     => 'Pusat Bantuan',
    'peraturan'   => 'Peraturan Komunitas',
    'kebijakan'   => 'Kebijakan',
    'nilai'       => 'Nilai Relovié',
    'informasi'   => 'Informasi',
];

        if (! isset($judulMap[$slug])) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $paymentMethodModel = new PaymentMethodModel();

$bankAccounts = $paymentMethodModel
    ->getBankAccounts(session()->get('user_id'));

$paymentCardModel = new PaymentCardModel();

$bankCards = $paymentCardModel
    ->getCardsByUser(session()->get('user_id'));

if (
    in_array(
        $slug,
        [
            'bantuan',
            'peraturan',
            'kebijakan',
            'nilai',
            'informasi'
        ]
    )
) {
    return view('account_pengaturan_bantuan', [
        'judul' => $judulMap[$slug],
        'slug'  => $slug,
    ]);
}

return view('account_pengaturan_detail', [
    'judul'        => $judulMap[$slug],
    'slug'         => $slug,
    'bankAccounts' => $bankAccounts,
    'bankCards'    => $bankCards,
]);
    }

    public function tambahRekening()
{
    if (! session()->get('isLoggedIn')) {
        return redirect()->to('/login');
    }

    return view('account_rekening_tambah');
}

public function ewallet()
{
    if (! session()->get('isLoggedIn')) {
        return redirect()->to('/login');
    }

    return view('account_ewallet');
}

public function tambahKartu()
{
    if (! session()->get('isLoggedIn')) {
        return redirect()->to('/login');
    }

    return view('account_kartu_tambah');
}

public function simpanKartu()
{
    if (! session()->get('isLoggedIn')) {
        return redirect()->to('/login');
    }

    $userId = session()->get('user_id');

    $cardNumber = preg_replace(
        '/\s+/',
        '',
        $this->request->getPost('card_number')
    );

    $expiry = trim(
        $this->request->getPost('expiry')
    );

    $cardName = trim(
        $this->request->getPost('card_name')
    );

    // Validasi dasar
    if (
        empty($cardNumber) ||
        strlen($cardNumber) < 12 ||
        empty($expiry) ||
        empty($cardName)
    ) {
        return redirect()
            ->back()
            ->with('error', 'Data kartu belum lengkap.');
    }

    // Pisahkan masa berlaku BB/TT
    $expiryParts = explode('/', $expiry);

    if (count($expiryParts) !== 2) {
        return redirect()
            ->back()
            ->with('error', 'Format masa berlaku harus BB/TT.');
    }

    $expiryMonth = trim($expiryParts[0]);
    $expiryYear  = trim($expiryParts[1]);

    if (
        ! preg_match('/^\d{2}$/', $expiryMonth) ||
        ! preg_match('/^\d{2}$/', $expiryYear)
    ) {
        return redirect()
            ->back()
            ->with('error', 'Format masa berlaku harus BB/TT.');
    }

    // Pastikan bulan valid
    $month = (int) $expiryMonth;

    if ($month < 1 || $month > 12) {
        return redirect()
            ->back()
            ->with('error', 'Bulan kartu tidak valid.');
    }

    // Hanya simpan 4 digit terakhir
    $lastFour = substr($cardNumber, -4);

    $paymentCardModel = new \App\Models\PaymentCardModel();

    // Cek apakah user sudah memiliki kartu
    $existingCard = $paymentCardModel
        ->where('user_id', $userId)
        ->first();

    $inserted = $paymentCardModel->insert([
        'user_id'      => $userId,
        'card_type'    => 'Kartu',
        'last_four'    => $lastFour,
        'card_name'    => $cardName,
        'expiry_month' => $expiryMonth,
        'expiry_year'  => $expiryYear,
        'is_primary'  => $existingCard ? 0 : 1,
    ]);

    dd([
    'post'   => $this->request->getPost(),
    'insert' => $inserted,
    'errors' => $paymentCardModel->errors(),
]);

    if ($inserted === false) {
        $errors = $paymentCardModel->errors();

        return redirect()
            ->back()
            ->with(
                'error',
                'Kartu gagal disimpan: ' .
                implode(', ', $errors)
            );
    }

    return redirect()
        ->to('/akun/pengaturan/rekening')
        ->with(
            'success',
            'Kartu berhasil ditambahkan.'
        );
}

public function simpanRekening()
{
    if (! session()->get('isLoggedIn')) {
        return redirect()->to('/login');
    }

    $userId = session()->get('user_id');

    $rules = [
        'bank_name' => 'required|max_length[100]',
        'account_name' => 'required|max_length[100]',
        'account_number' => 'required|max_length[50]',
    ];

    if (! $this->validate($rules)) {
        return redirect()
            ->back()
            ->withInput()
            ->with('errors', $this->validator->getErrors());
    }

    $paymentMethodModel = new PaymentMethodModel();

    // Jadikan rekening yang baru ditambahkan sebagai rekening utama
    $paymentMethodModel
        ->where('user_id', $userId)
        ->where('type', 'bank')
        ->set(['is_primary' => 0])
        ->update();

    $paymentMethodModel->insert([
        'user_id'        => $userId,
        'type'           => 'bank',
        'bank_name'      => $this->request->getPost('bank_name'),
        'account_name'   => $this->request->getPost('account_name'),
        'account_number' => $this->request->getPost('account_number'),
        'is_primary'     => 1,
    ]);

    return redirect()
        ->to('/akun/pengaturan/rekening')
        ->with('success', 'Rekening bank berhasil ditambahkan.');
}

public function jadikanRekeningUtama($id)
{
    if (! session()->get('isLoggedIn')) {
        return redirect()->to('/login');
    }

    $userId = session()->get('user_id');

    $paymentMethodModel = new PaymentMethodModel();

    // Pastikan rekening tersebut milik user yang sedang login
    $rekening = $paymentMethodModel
        ->where('id', $id)
        ->where('user_id', $userId)
        ->where('type', 'bank')
        ->first();

    if (! $rekening) {
        return redirect()
            ->to('/akun/pengaturan/rekening')
            ->with('error', 'Rekening tidak ditemukan.');
    }

    // Hilangkan status utama dari semua rekening user
    $paymentMethodModel
        ->where('user_id', $userId)
        ->where('type', 'bank')
        ->set(['is_primary' => 0])
        ->update();

    // Jadikan rekening yang dipilih sebagai utama
    $paymentMethodModel
        ->update($id, [
            'is_primary' => 1,
        ]);

    return redirect()
        ->to('/akun/pengaturan/rekening')
        ->with('success', 'Rekening utama berhasil diubah.');
}

public function hapusRekening($id)
{
    if (! session()->get('isLoggedIn')) {
        return redirect()->to('/login');
    }

    $userId = session()->get('user_id');

    $paymentMethodModel = new PaymentMethodModel();

    // Pastikan rekening tersebut milik user yang sedang login
    $rekening = $paymentMethodModel
        ->where('id', $id)
        ->where('user_id', $userId)
        ->where('type', 'bank')
        ->first();

    if (! $rekening) {
        return redirect()
            ->to('/akun/pengaturan/rekening')
            ->with('error', 'Rekening tidak ditemukan.');
    }

    // Hapus rekening
    $paymentMethodModel->delete($id);

    return redirect()
        ->to('/akun/pengaturan/rekening')
        ->with('success', 'Rekening bank berhasil dihapus.');
}
}