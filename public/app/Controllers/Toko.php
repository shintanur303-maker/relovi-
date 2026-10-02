<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\UserModel;

class Toko extends BaseController
{
    protected $userModel;
    protected $productModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->productModel = new ProductModel();
    }

    // Halaman profil publik toko
    public function index($id)
    {
        $seller = $this->userModel->find($id);

        // Kalau bukan penjual, atau belum disetujui admin, jangan tampilkan
        if (! $seller || $seller['role'] !== 'penjual' || $seller['verification_status'] !== 'approved') {
            return redirect()->to('/')->with('error', 'Toko tidak ditemukan.');
        }

        $products = $this->productModel
            ->where('user_id', $seller['id'])
            ->orderBy('id', 'DESC')
            ->findAll();

        return view('toko_profile', [
            'seller'   => $seller,
            'products' => $products,
        ]);
    }
}