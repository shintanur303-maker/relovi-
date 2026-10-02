<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\ReviewModel;
use App\Models\UserModel;
use App\Models\WishlistModel;

class Product extends BaseController
{
    public function show($id)
{
    $product = $this->productModel->find($id);
    if (! $product) {
        return redirect()->to('/')->with('error', 'Produk tidak ditemukan atau sudah tidak tersedia.');
    }

    $userModel = new UserModel();
    $reviewModel = new ReviewModel();
    $wishlistModel = new WishlistModel();

    $seller = $userModel->find($product['user_id']);
    $ratingSummary = $reviewModel->getSellerRatingSummary($product['user_id']);
    $reviews = $reviewModel->getReviewsForSeller($product['user_id']);

    $isOwner = session()->get('isLoggedIn') && session()->get('user_id') == $product['user_id'];
    $isWishlisted = session()->get('isLoggedIn')
        ? $wishlistModel->isWishlisted(session()->get('user_id'), $id)
        : false;

    return view('product_detail', [
        'p' => $product,
        'seller' => $seller,
        'ratingSummary' => $ratingSummary,
        'reviews' => $reviews,
        'isOwner' => $isOwner,
        'isWishlisted' => $isWishlisted,
    ]);
}
    protected $productModel;
    protected $userModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->userModel = new UserModel();
    }

    // Cek apakah user yang login boleh jualan.
    // Return null kalau boleh, atau return response redirect kalau tidak boleh.
    private function guardSeller()
    {
        if (! session()->get('isLoggedIn')) {
            return redirect()->to('/login')
                ->with('error', 'Silakan login dulu untuk jual barang.');
        }

        $user = $this->userModel->find(session()->get('user_id'));

        if (! $user || $user['role'] !== 'penjual') {
            return redirect()->to('/jadi-penjual')
                ->with('error', 'Kamu perlu daftar jadi penjual dulu sebelum bisa jual barang.');
        }

        if ($user['verification_status'] !== 'approved') {
            $pesan = $user['verification_status'] === 'pending'
                ? 'Pengajuan penjualmu masih menunggu verifikasi admin.'
                : 'Pengajuan penjualmu belum disetujui. Silakan hubungi admin.';

            return redirect()->to('/akun')->with('error', $pesan);
        }

        return null; // boleh lanjut
    }

    // Halaman jual barang
    public function create()
    {
        $blocked = $this->guardSeller();
        if ($blocked) {
            return $blocked;
        }

        return view('product_create');
    }

    // Proses upload produk
    public function store()
    {
        $blocked = $this->guardSeller();
        if ($blocked) {
            return $blocked;
        }

        $photo = $this->request->getFile('photo');
        $photoName = null;

        if ($photo && $photo->isValid() && ! $photo->hasMoved()) {
            $photoName = $photo->getRandomName();
            $photo->move(
                ROOTPATH . 'public/uploads/products',
                $photoName
            );
        }

        $data = [
            'user_id'         => session()->get('user_id'),
            'name'            => $this->request->getPost('name'),
            'price'           => $this->request->getPost('price'),
            'category'        => $this->request->getPost('category'),
            'location'        => $this->request->getPost('location'),
            'size'            => $this->request->getPost('size'),
            'payment_method'  => $this->request->getPost('payment_method'),
            'shipping_option' => $this->request->getPost('shipping_option'),
            'condition'       => $this->request->getPost('condition'),
            'description'     => $this->request->getPost('description'),
            'photo'           => $photoName,
        ];

        $this->productModel->insert($data);

        return redirect()->to('/')
            ->with('success', 'Barang berhasil diunggah!');
    }

    // Halaman edit produk
public function edit($id)
{
    $blocked = $this->guardSeller();

    if ($blocked) {
        return $blocked;
    }

    $userId = session()->get('user_id');

    // Pastikan produk memang milik seller yang sedang login
    $product = $this->productModel
        ->where('id', $id)
        ->where('user_id', $userId)
        ->first();

    if (! $product) {
        return redirect()
            ->to('/')
            ->with('error', 'Produk tidak ditemukan atau bukan milik kamu.');
    }

    return view('product_edit', [
        'p' => $product,
    ]);
}

// Proses update produk
public function update($id)
{
    $blocked = $this->guardSeller();

    if ($blocked) {
        return $blocked;
    }

    $userId = session()->get('user_id');

    // Pastikan produk memang milik seller yang sedang login
    $product = $this->productModel
        ->where('id', $id)
        ->where('user_id', $userId)
        ->first();

    if (! $product) {
        return redirect()
            ->to('/')
            ->with('error', 'Produk tidak ditemukan atau bukan milik kamu.');
    }

    // Ambil foto baru jika ada
    $photoName = $product['photo'];

    $photo = $this->request->getFile('photo');

    if ($photo && $photo->isValid() && ! $photo->hasMoved()) {

        $photoName = $photo->getRandomName();

        $photo->move(
            ROOTPATH . 'public/uploads/products',
            $photoName
        );

        // Hapus foto lama jika memang ada
        if (! empty($product['photo'])) {

            $oldPhoto = ROOTPATH
                . 'public/uploads/products/'
                . $product['photo'];

            if (is_file($oldPhoto)) {
                unlink($oldPhoto);
            }
        }
    }

    $data = [
        'name'            => $this->request->getPost('name'),
        'price'           => $this->request->getPost('price'),
        'category'        => $this->request->getPost('category'),
        'location'        => $this->request->getPost('location'),
        'size'            => $this->request->getPost('size'),
        'payment_method'  => $this->request->getPost('payment_method'),
        'shipping_option' => $this->request->getPost('shipping_option'),
        'condition'       => $this->request->getPost('condition'),
        'description'     => $this->request->getPost('description'),
        'photo'           => $photoName,
    ];

    $this->productModel->update($id, $data);

    return redirect()
        ->to('/produk/' . $id)
        ->with('success', 'Produk berhasil diperbarui.');
}

// Arsipkan produk
public function arsipkan($id)
{
    $blocked = $this->guardSeller();

    if ($blocked) {
        return $blocked;
    }

    $userId = session()->get('user_id');

    // Pastikan produk milik seller yang sedang login
    $product = $this->productModel
        ->where('id', $id)
        ->where('user_id', $userId)
        ->first();

    if (! $product) {
        return redirect()
            ->to('/')
            ->with('error', 'Produk tidak ditemukan atau bukan milik kamu.');
    }

    $this->productModel->update($id, [
        'status' => 'arsip'
    ]);

    return redirect()
        ->to('/')
        ->with('success', 'Produk berhasil diarsipkan.');
}


// Hapus produk secara permanen
public function hapus($id)
{
    $blocked = $this->guardSeller();

    if ($blocked) {
        return $blocked;
    }

    $userId = session()->get('user_id');

    // Pastikan produk milik seller yang sedang login
    $product = $this->productModel
        ->where('id', $id)
        ->where('user_id', $userId)
        ->first();

    if (! $product) {
        return redirect()
            ->to('/')
            ->with('error', 'Produk tidak ditemukan atau bukan milik kamu.');
    }

    // Hapus file foto jika ada
    if (! empty($product['photo'])) {

        $photoPath = ROOTPATH
            . 'public/uploads/products/'
            . $product['photo'];

        if (is_file($photoPath)) {
            unlink($photoPath);
        }
    }

    $this->productModel->delete($id);

    return redirect()
        ->to('/')
        ->with('success', 'Produk berhasil dihapus.');
}

public function arsip()
{
    $blocked = $this->guardSeller();

    if ($blocked) {
        return $blocked;
    }

    $userId = session()->get('user_id');

    $products = $this->productModel
        ->where('user_id', $userId)
        ->where('status', 'arsip')
        ->orderBy('id', 'DESC')
        ->findAll();

    return view('product_arsip', [
        'products' => $products,
    ]);
}

public function aktifkan($id)
{
    $blocked = $this->guardSeller();

    if ($blocked) {
        return $blocked;
    }

    $userId = session()->get('user_id');

    $product = $this->productModel
        ->where('id', $id)
        ->where('user_id', $userId)
        ->where('status', 'arsip')
        ->first();

    if (! $product) {
        return redirect()
            ->to('/produk/arsip')
            ->with('error', 'Produk arsip tidak ditemukan.');
    }

    $this->productModel->update($id, [
        'status' => 'aktif'
    ]);

    return redirect()
        ->to('/produk/arsip')
        ->with('success', 'Produk berhasil diaktifkan kembali.');
}

    // Menampilkan produk berdasarkan kategori
    public function category($categoryName)
    {
        $products = $this->productModel
            ->where('category', $categoryName)
            ->where('status !=', 'arsip')
            ->orderBy('id', 'DESC')
            ->findAll();

        return view('product_category', [
            'products'     => $products,
            'categoryName' => $categoryName,
        ]);
    }
    // Menampilkan semua produk dengan filter
    public function browse()
    {
    $productModel = $this->productModel;
    $f = $this->request->getGet();

    $query = $productModel
    ->where('status !=', 'arsip');

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

    return view('produk', [
        'products' => $query->findAll(),
        'f' => $f,
    ]);
}
}
