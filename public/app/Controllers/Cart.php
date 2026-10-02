<?php

namespace App\Controllers;

use App\Models\CartModel;
use App\Models\NotificationModel;
use App\Models\ProductModel;
use App\Models\AddressModel;

class Cart extends BaseController
{
    protected $cartModel;
    protected $notificationModel;
    protected $productModel;
    protected $addressModel;

    public function __construct()
    {
        $this->cartModel = new CartModel();
        $this->notificationModel = new NotificationModel();
        $this->productModel = new ProductModel();
        $this->addressModel = new AddressModel();
    }

    public function index()
    {
        if (! session()->get('isLoggedIn')) {
            return redirect()->to('/login')->with('error', 'Silakan login dulu.');
        }

        $items = $this->cartModel->getCartItems(session()->get('user_id'));
        return view('cart', ['items' => $items]);
    }

    public function add($productId)
    {
        if (! session()->get('isLoggedIn')) {
            return redirect()->to('/login')->with('error', 'Silakan login dulu untuk menambah ke keranjang.');
        }

        $userId = session()->get('user_id');

        $product = $this->productModel->find($productId);

        if (! $product) {
        return redirect()->back()
        ->with('error', 'Produk tidak ditemukan.');
}

        $existing = $this->cartModel->where('user_id', $userId)->where('product_id', $productId)->first();

        if ($existing) {
            $this->cartModel->update($existing['id'], ['quantity' => $existing['quantity'] + 1]);
        } else {
            $this->cartModel->insert([
                'user_id' => $userId,
                'product_id' => $productId,
                'quantity' => 1,
            ]);
        }

$this->notificationModel->insert([
    'user_id' => $userId,
    'type'    => 'cart',
    'title'   => 'Berhasil ditambahkan',
    'message' => 'Barang "' . $product['name'] . '" berhasil ditambahkan ke keranjang.',
    'link'    => '/keranjang',
    'is_read' => 0,
]);

if (
    ! empty($product['user_id']) &&
    $product['user_id'] != $userId
) {

    $this->notificationModel->insert([
        'user_id' => $product['user_id'],
        'type'    => 'cart_seller',
        'title'   => 'Produk masuk keranjang',
        'message' => 'Produk "' . $product['name'] . '" ditambahkan ke keranjang oleh pembeli.',
        'link'    => '/produk/' . $productId,
        'is_read' => 0,
    ]);

}

return redirect()->back()->with('success', 'Barang berhasil ditambahkan ke keranjang!');
    }

    public function remove($id)
{
    $this->cartModel->delete($id);
    return redirect()->to('/keranjang')->with('success', 'Barang dihapus dari keranjang.');
}

public function updateQuantity($id, $action)
{
    if (! session()->get('isLoggedIn')) {
        return redirect()
            ->to('/login')
            ->with('error', 'Silakan login dulu.');
    }

    $userId = session()->get('user_id');

    // Cari item keranjang milik user yang sedang login
    $item = $this->cartModel
        ->where('id', $id)
        ->where('user_id', $userId)
        ->first();

    if (! $item) {
        return redirect()
            ->to('/keranjang')
            ->with('error', 'Barang tidak ditemukan di keranjang.');
    }

    $quantity = (int) $item['quantity'];

    if ($action === 'plus') {
        $quantity++;
    } elseif ($action === 'minus') {
        $quantity--;

        // Minimal jumlah barang adalah 1
        if ($quantity < 1) {
            $quantity = 1;
        }
    }

    $this->cartModel->update($id, [
        'quantity' => $quantity
    ]);

    return redirect()->to('/keranjang');
}

public function beliSekarang($productId)
{
    if (! session()->get('isLoggedIn')) {
        return redirect()
            ->to('/login')
            ->with('error', 'Silakan login dulu.');
    }

    $userId = session()->get('user_id');

    $product = $this->productModel->find($productId);

    if (! $product) {
        return redirect()
            ->back()
            ->with('error', 'Produk tidak ditemukan.');
    }

    // Hapus session checkout dari keranjang jika ada
session()->remove('checkout_cart_items');

// Simpan ID produk yang ingin langsung dibeli
session()->set('checkout_product_id', $productId);
    return redirect()->to('/keranjang/checkout');
}

public function checkoutDariKeranjang()
{
    if (! session()->get('isLoggedIn')) {
        return redirect()
            ->to('/login')
            ->with('error', 'Silakan login dulu.');
    }

    $userId = session()->get('user_id');

    // Ambil ID item keranjang yang dipilih
    $selectedItems = $this->request->getGet('selected_items');

    if (empty($selectedItems) || ! is_array($selectedItems)) {
        return redirect()
            ->to('/keranjang')
            ->with('error', 'Silakan pilih barang yang ingin di-checkout.');
    }

    // Pastikan hanya item milik user yang sedang login yang diambil
    $items = $this->cartModel
        ->select(
            'carts.id,
             carts.product_id,
             carts.quantity,
             products.name,
             products.price,
             products.photo'
        )
        ->join(
            'products',
            'products.id = carts.product_id'
        )
        ->where(
            'carts.user_id',
            $userId
        )
        ->whereIn(
            'carts.id',
            $selectedItems
        )
        ->findAll();

    if (empty($items)) {
        return redirect()
            ->to('/keranjang')
            ->with('error', 'Barang yang dipilih tidak ditemukan.');
    }

    // Hapus session checkout "Beli Sekarang" jika ada
session()->remove('checkout_product_id');

// Simpan ID item yang dipilih untuk proses konfirmasi checkout
session()->set('checkout_cart_items', array_column($items, 'id'));

    $address = $this->addressModel->getPrimaryAddress($userId);

    return view('checkout', [
        'items'   => $items,
        'address' => $address,
    ]);
}

public function checkout()
{
    if (! session()->get('isLoggedIn')) {
        return redirect()
            ->to('/login')
            ->with('error', 'Silakan login dulu.');
    }

    $userId = session()->get('user_id');

    // Ambil ID produk yang dipilih melalui "Beli Sekarang"
    $productId = session()->get('checkout_product_id');

    if (! $productId) {
        return redirect()
            ->to('/keranjang')
            ->with('error', 'Silakan pilih barang yang ingin dibeli terlebih dahulu.');
    }

    // Cari barang tersebut di keranjang
    $item = $this->cartModel
        ->where('user_id', $userId)
        ->where('product_id', $productId)
        ->first();

    if (! $item) {
        return redirect()
            ->to('/keranjang')
            ->with('error', 'Barang tersebut tidak ada di keranjang.');
    }

    // Ambil detail produk
    $product = $this->productModel->find($productId);

    if (! $product) {
        return redirect()
            ->to('/keranjang')
            ->with('error', 'Produk tidak ditemukan.');
    }

    // Buat format item agar tetap sesuai dengan checkout.php
    $items = [[
        'id'         => $item['id'],
        'product_id' => $product['id'],
        'name'       => $product['name'],
        'price'      => $product['price'],
        'quantity'   => $item['quantity'],
        'photo'      => $product['photo'],
    ]];

    $address = $this->addressModel->getPrimaryAddress($userId);

    return view('checkout', [
        'items'   => $items,
        'address' => $address,
    ]);
}

public function konfirmasiCheckout()
{
    if (! session()->get('isLoggedIn')) {
        return redirect()
            ->to('/login')
            ->with('error', 'Silakan login dulu.');
    }

    $userId = session()->get('user_id');

    // Ambil produk yang dipilih melalui "Beli Sekarang"
    $productId = session()->get('checkout_product_id');

    if (! $productId) {
        return redirect()
            ->to('/keranjang')
            ->with('error', 'Silakan pilih barang yang ingin dibeli terlebih dahulu.');
    }

    // Cari barang tersebut di keranjang
    $item = $this->cartModel
        ->where('user_id', $userId)
        ->where('product_id', $productId)
        ->first();

    if (! $item) {
        return redirect()
            ->to('/keranjang')
            ->with('error', 'Barang tersebut tidak ditemukan di keranjang.');
    }

    // Ambil data produk
    $product = $this->productModel->find($productId);

    if (! $product) {
        return redirect()
            ->to('/keranjang')
            ->with('error', 'Produk tidak ditemukan.');
    }

    // Pastikan alamat utama sudah tersedia
    $address = $this->addressModel->getPrimaryAddress($userId);

    if (! $address) {
        return redirect()
            ->to('/keranjang')
            ->with('error', 'Silakan pilih alamat utama terlebih dahulu.');
    }

    $orderModel = new \App\Models\OrderModel();

    // Buat satu pesanan untuk produk yang dipilih
    $paymentMethod = $this->request->getPost('payment_method');

if (! in_array($paymentMethod, ['qris', 'transfer', 'ewallet', 'card'], true)) {
    $paymentMethod = 'qris';
}

$orderModel->insert([
    'buyer_id'       => $userId,
    'seller_id'      => $product['user_id'],
    'product_id'     => $product['id'],
    'quantity'       => $item['quantity'],
    'price'          => $product['price'] * $item['quantity'],
    'payment_method' => $paymentMethod,
    'status'         => 'belum_dibayar',
]);

    // Notifikasi ke seller
    $this->notificationModel->insert([
        'user_id'  => $product['user_id'],
        'type'     => 'order',
        'title'    => 'Pesanan Baru',
        'message'  => 'Ada pesanan baru untuk produk "' . $product['name'] . '".',
        'link'     => '/jual/pesanan',
        'is_read'  => 0,
    ]);

    // Notifikasi ke semua admin
    $adminUsers = (new \App\Models\UserModel())
        ->where('role', 'admin')
        ->findAll();

    foreach ($adminUsers as $admin) {

        $this->notificationModel->insert([
            'user_id'  => $admin['id'],
            'type'     => 'order',
            'title'    => 'Pesanan Baru',
            'message'  => 'Ada pesanan baru untuk produk "' . $product['name'] . '".',
            'link'     => '/notifikasi',
            'is_read'  => 0,
        ]);
    }

    // Hapus hanya barang yang sudah dibeli dari keranjang
    $this->cartModel->delete($item['id']);

    // Hapus penanda checkout setelah pesanan berhasil dibuat
    session()->remove('checkout_product_id');

    return redirect()
        ->to('/akun/pesanan')
        ->with(
            'success',
            'Pesanan berhasil dibuat, silakan selesaikan pembayaran.'
        );
}

public function konfirmasiCheckoutDariKeranjang()
{
    if (! session()->get('isLoggedIn')) {
        return redirect()
            ->to('/login')
            ->with('error', 'Silakan login dulu.');
    }

    $userId = session()->get('user_id');

    // Ambil ID item keranjang yang sebelumnya dipilih
    $selectedItems = session()->get('checkout_cart_items');

    if (empty($selectedItems) || ! is_array($selectedItems)) {
        return redirect()
            ->to('/keranjang')
            ->with('error', 'Tidak ada barang yang dipilih.');
    }

    // Pastikan alamat utama tersedia
    $address = $this->addressModel->getPrimaryAddress($userId);

    if (! $address) {
        return redirect()
            ->to('/keranjang')
            ->with('error', 'Silakan pilih alamat utama terlebih dahulu.');
    }

    // Ambil item keranjang milik user
    $items = $this->cartModel
        ->select(
            'carts.id,
             carts.product_id,
             carts.quantity,
             products.name,
             products.price,
             products.user_id as seller_id'
        )
        ->join(
            'products',
            'products.id = carts.product_id'
        )
        ->where(
            'carts.user_id',
            $userId
        )
        ->whereIn(
            'carts.id',
            $selectedItems
        )
        ->findAll();

    if (empty($items)) {
        return redirect()
            ->to('/keranjang')
            ->with('error', 'Barang yang dipilih tidak ditemukan.');
    }

    $orderModel = new \App\Models\OrderModel();

    foreach ($items as $item) {

        // Buat pesanan
        $paymentMethod = $this->request->getPost('payment_method');

if (! in_array($paymentMethod, ['qris', 'transfer', 'ewallet', 'card'], true)) {
    $paymentMethod = 'qris';
}

$orderModel->insert([
    'buyer_id'       => $userId,
    'seller_id'      => $item['seller_id'],
    'product_id'     => $item['product_id'],
    'quantity'       => $item['quantity'],
    'price'          => $item['price'] * $item['quantity'],
    'payment_method' => $paymentMethod,
    'status'         => 'belum_dibayar',
]);

        // Notifikasi ke seller
        $this->notificationModel->insert([
            'user_id'  => $item['seller_id'],
            'type'     => 'order',
            'title'    => 'Pesanan Baru',
            'message'  => 'Ada pesanan baru untuk produk "' . $item['name'] . '".',
            'link'     => '/jual/pesanan',
            'is_read'  => 0,
        ]);
    }

    $adminUsers = (new \App\Models\UserModel())
    ->where('role', 'admin')
    ->findAll();

foreach ($adminUsers as $admin) {
    foreach ($items as $item) {
        $this->notificationModel->insert([
            'user_id'  => $admin['id'],
            'type'     => 'order',
            'title'    => 'Pesanan Baru',
            'message'  => 'Ada pesanan baru untuk produk "' . $item['name'] . '".',
            'link'     => '/notifikasi',
            'is_read'  => 0,
        ]);
    }
}

    // Hapus barang yang sudah dibeli dari keranjang
    $this->cartModel
        ->where('user_id', $userId)
        ->whereIn('id', $selectedItems)
        ->delete();

    // Hapus data session checkout
    session()->remove('checkout_cart_items');

    return redirect()
        ->to('/akun/pesanan')
        ->with(
            'success',
            'Pesanan berhasil dibuat, silakan selesaikan pembayaran.'
        );
}

}