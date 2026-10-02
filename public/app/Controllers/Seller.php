<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\NotificationModel;

class Seller extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    // Halaman form "Daftar Jadi Penjual"
    public function daftar()
    {
        if (! session()->get('isLoggedIn')) {
            return redirect()->to('/login')
                ->with('error', 'Silakan login dulu untuk daftar jadi penjual.');
        }

        $user = $this->userModel->find(session()->get('user_id'));

        // Kalau sudah pernah mengajukan / sudah jadi penjual, jangan tampilkan form lagi.
        if ($user['role'] === 'penjual') {
            return redirect()->to('/akun')
                ->with('info', 'Status penjual kamu: ' . $user['verification_status']);
        }

        return view('seller_daftar');
    }

    // Proses simpan pengajuan jadi penjual
    public function store()
    {
        if (! session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $shopName = $this->request->getPost('shop_name');
        $shopBio  = $this->request->getPost('shop_bio');
        $phone    = $this->request->getPost('phone');
        $city     = $this->request->getPost('city');

        if (empty($shopName) || empty($phone) || empty($city)) {
            return redirect()->back()
                ->with('error', 'Nama toko, nomor kontak, dan kota wajib diisi.')
                ->withInput();
        }

        // Foto profil/toko (opsional)
        $avatarName = null;
        $avatar = $this->request->getFile('avatar');
        if ($avatar && $avatar->isValid() && ! $avatar->hasMoved()) {
            $avatarName = $avatar->getRandomName();
            $avatar->move(ROOTPATH . 'public/uploads/sellers', $avatarName);
        }

        // Dokumen bukti kelayakan, misal foto KTP / bukti stok barang (wajib)
        $docName = null;
        $document = $this->request->getFile('verification_document');
        if ($document && $document->isValid() && ! $document->hasMoved()) {
            $docName = $document->getRandomName();
            $document->move(ROOTPATH . 'public/uploads/sellers', $docName);
        } else {
            return redirect()->back()
                ->with('error', 'Dokumen bukti kelayakan wajib diunggah.')
                ->withInput();
        }

        $this->userModel->update(session()->get('user_id'), [
            'role'                   => 'penjual',
            'shop_name'              => $shopName,
            'shop_bio'               => $shopBio,
            'phone'                  => $phone,
            'city'                   => $city,
            'avatar'                 => $avatarName,
            'verification_document'  => $docName,
            'verification_status'    => 'pending',
            'verified_at'            => null,
        ]);

        // Perbarui session role supaya langsung sinkron
        session()->set('user_role', 'penjual');

        return redirect()->to('/akun')
            ->with('success', 'Pengajuan jadi penjual berhasil dikirim. Menunggu verifikasi admin.');
    }

    public function pesanan()
{
    if (! session()->get('isLoggedIn')) {
        return redirect()->to('/login');
    }

    $userId = session()->get('user_id');

    $orderModel = new \App\Models\OrderModel();

    $orders = $orderModel
        ->select(
            'orders.*, 
             products.name as product_name, 
             products.photo as product_photo, 
             products.category'
        )
        ->join(
            'products',
            'products.id = orders.product_id'
        )
        ->where(
            'orders.seller_id',
            $userId
        )
        ->orderBy(
            'orders.id',
            'DESC'
        )
        ->findAll();

    return view('seller_pesanan', [
        'orders' => $orders,
    ]);
}

public function pesananKirim($orderId)
{
    if (! session()->get('isLoggedIn')) {
        return redirect()->to('/login');
    }

    $userId = session()->get('user_id');

    $orderModel = new \App\Models\OrderModel();

    // Pastikan pesanan memang milik seller yang sedang login
    $order = $orderModel
        ->where('id', $orderId)
        ->where('seller_id', $userId)
        ->first();

    if (! $order) {
        return redirect()
            ->to('/jual/pesanan')
            ->with('error', 'Pesanan tidak ditemukan.');
    }

    // Hanya pesanan yang sudah dikemas yang bisa dikirim
    if ($order['status'] !== 'dikemas') {
        return redirect()
            ->to('/jual/pesanan')
            ->with('error', 'Pesanan belum dapat dikirim.');
    }

    // Ubah status menjadi dikirim
    $orderModel->update($orderId, [
        'status' => 'dikirim'
    ]);

    // Kirim notifikasi ke pembeli
$notificationModel = new NotificationModel();

$productModel = new \App\Models\ProductModel();
$product = $productModel->find($order['product_id']);

if ($product) {
    $notificationModel->insert([
        'user_id'  => $order['buyer_id'],
        'type'     => 'order',
        'title'    => 'Pesanan Dikirim',
        'message'  => 'Pesanan "' . $product['name'] . '" sudah dikirim oleh penjual.',
        'link'     => '/akun/pesanan?status=dikirim',
        'is_read'  => 0,
    ]);
}

    return redirect()
        ->to('/jual/pesanan')
        ->with(
            'success',
            'Pesanan berhasil ditandai sebagai dikirim.'
        );
}

public function setujuiPengembalian($orderId)
{
    if (! session()->get('isLoggedIn')) {
        return redirect()->to('/login');
    }

    $userId = session()->get('user_id');

    $orderModel = new \App\Models\OrderModel();

    $order = $orderModel
        ->where('id', $orderId)
        ->where('seller_id', $userId)
        ->first();

    if (! $order) {
        return redirect()
            ->to('/jual/pesanan')
            ->with('error', 'Pesanan tidak ditemukan.');
    }

    if ($order['status'] !== 'pengembalian') {
        return redirect()
            ->to('/jual/pesanan')
            ->with('error', 'Pesanan ini tidak sedang dalam proses pengembalian.');
    }

    $orderModel->update($orderId, [
        'status' => 'pengembalian_disetujui'
    ]);

    // Kirim notifikasi ke buyer
    $notificationModel = new NotificationModel();

    $productModel = new \App\Models\ProductModel();
    $product = $productModel->find($order['product_id']);

    if ($product) {
        $notificationModel->insert([
            'user_id'  => $order['buyer_id'],
            'type'     => 'order',
            'title'    => 'Pengembalian Disetujui',
            'message'  => 'Pengajuan pengembalian untuk pesanan "' . $product['name'] . '" telah disetujui oleh penjual.',
            'link'     => '/akun/pesanan?status=pengembalian_disetujui',
            'is_read'  => 0,
        ]);
    }

    return redirect()
        ->to('/jual/pesanan')
        ->with(
            'success',
            'Pengajuan pengembalian berhasil disetujui.'
        );
}

public function tolakPengembalian($orderId)
{
    if (! session()->get('isLoggedIn')) {
        return redirect()->to('/login');
    }

    $userId = session()->get('user_id');

    $orderModel = new \App\Models\OrderModel();

    $order = $orderModel
        ->where('id', $orderId)
        ->where('seller_id', $userId)
        ->first();

    if (! $order) {
        return redirect()
            ->to('/jual/pesanan')
            ->with('error', 'Pesanan tidak ditemukan.');
    }

    if ($order['status'] !== 'pengembalian') {
        return redirect()
            ->to('/jual/pesanan')
            ->with('error', 'Pesanan ini tidak sedang dalam proses pengembalian.');
    }

    $orderModel->update($orderId, [
        'status' => 'pengembalian_ditolak'
    ]);

    // Kirim notifikasi ke buyer
    $notificationModel = new NotificationModel();

    $productModel = new \App\Models\ProductModel();
    $product = $productModel->find($order['product_id']);

    if ($product) {
        $notificationModel->insert([
            'user_id'  => $order['buyer_id'],
            'type'     => 'order',
            'title'    => 'Pengembalian Ditolak',
            'message'  => 'Pengajuan pengembalian untuk pesanan "' . $product['name'] . '" ditolak oleh penjual.',
            'link'     => '/akun/pesanan?status=pengembalian_ditolak',
            'is_read'  => 0,
        ]);
    }

    return redirect()
        ->to('/jual/pesanan')
        ->with(
            'success',
            'Pengajuan pengembalian berhasil ditolak.'
        );
}

public function detailPesanan($orderId)
{
    if (! session()->get('isLoggedIn')) {
        return redirect()->to('/login');
    }

    $userId = session()->get('user_id');

    $orderModel = new \App\Models\OrderModel();

    $order = $orderModel
        ->select(
            'orders.*,
             products.name as product_name,
             products.photo as product_photo,
             products.category,
             products.condition,
             users.name as buyer_name,
             users.email as buyer_email,
             users.phone as buyer_phone,
             users.address as buyer_address'
        )
        ->join(
            'products',
            'products.id = orders.product_id'
        )
        ->join(
            'users',
            'users.id = orders.buyer_id'
        )
        ->where(
            'orders.id',
            $orderId
        )
        ->where(
            'orders.seller_id',
            $userId
        )
        ->first();

    if (! $order) {
        return redirect()
            ->to('/jual/pesanan')
            ->with('error', 'Pesanan tidak ditemukan.');
    }

    return view('seller_pesanan_detail', [
    'order' => $order,
]);
}
}