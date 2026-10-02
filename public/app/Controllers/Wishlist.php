<?php

namespace App\Controllers;

use App\Models\WishlistModel;
use App\Models\ProductModel;
use App\Models\NotificationModel;

class Wishlist extends BaseController
{
    protected $wishlistModel;
    protected $productModel;
    protected $notificationModel;

    public function __construct()
    {
        $this->wishlistModel = new WishlistModel();
        $this->productModel = new ProductModel();
        $this->notificationModel = new NotificationModel();
    }

    public function index()
    {
        if (! session()->get('isLoggedIn')) {
            return redirect()->to('/login')
                ->with('error', 'Silakan login dulu untuk melihat wishlist.');
        }

        $items = $this->wishlistModel
            ->select('wishlists.id as wishlist_id, products.*')
            ->join('products', 'products.id = wishlists.product_id')
            ->where('wishlists.user_id', session()->get('user_id'))
            ->orderBy('wishlists.id', 'DESC')
            ->findAll();

        return view('wishlist', ['items' => $items]);
    }

    public function add($productId)
    {
        if (! session()->get('isLoggedIn')) {
            return redirect()->to('/login')
                ->with('error', 'Silakan login dulu untuk menyimpan ke wishlist.');
        }

        $userId = session()->get('user_id');

        // Cek apakah produk benar-benar ada
        $product = $this->productModel->find($productId);

        if (! $product) {
            return redirect()->back()
                ->with('error', 'Produk tidak ditemukan.');
        }

        // Cek apakah sudah ada di wishlist
        $existing = $this->wishlistModel
            ->where('user_id', $userId)
            ->where('product_id', $productId)
            ->first();

        if (! $existing) {

            // Simpan ke wishlist
            $this->wishlistModel->insert([
                'user_id'    => $userId,
                'product_id' => $productId,
            ]);

            // ==========================================
            // NOTIFIKASI UNTUK PEMBELI
            // ==========================================

            $this->notificationModel->insert([
                'user_id' => $userId,
                'type'    => 'wishlist',
                'title'   => 'Ditambahkan ke wishlist',
                'message' => 'Barang "' . $product['name'] . '" berhasil ditambahkan ke wishlist.',
                'link'    => '/wishlist',
                'is_read' => 0,
            ]);

            // ==========================================
            // NOTIFIKASI UNTUK PENJUAL
            // ==========================================

            if (! empty($product['user_id']) && $product['user_id'] != $userId) {

                $this->notificationModel->insert([
                    'user_id' => $product['user_id'],
                    'type'    => 'wishlist_seller',
                    'title'   => 'Barang kamu masuk wishlist',
                    'message' => 'Produk "' . $product['name'] . '" ditambahkan ke wishlist oleh seorang pembeli.',
                    'link'    => '/produk/' . $productId,
                    'is_read' => 0,
                ]);
            }
        }

        return redirect()->back()
            ->with('success', 'Barang ditambahkan ke wishlist!');
    }

    public function remove($productId)
    {
        if (! session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $userId = session()->get('user_id');

        $this->wishlistModel
            ->where('user_id', $userId)
            ->where('product_id', $productId)
            ->delete();

        return redirect()->back()
            ->with('success', 'Barang dihapus dari wishlist.');
    }
}