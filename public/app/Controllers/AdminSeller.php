<?php

namespace App\Controllers;

use App\Models\UserModel;

class AdminSeller extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    // Admin: daftar penjual yang menunggu verifikasi
    public function index()
    {
        if (session()->get('user_role') !== 'admin') {
            return redirect()->to('/');
        }

        $sellers = $this->userModel
            ->where('role', 'penjual')
            ->where('verification_status', 'pending')
            ->orderBy('id', 'DESC')
            ->findAll();

        return view('admin_seller_list', ['sellers' => $sellers]);
    }

    // Admin: lihat detail 1 penjual (profil toko + dokumen kelayakan)
    public function detail($id)
    {
        if (session()->get('user_role') !== 'admin') {
            return redirect()->to('/');
        }

        $seller = $this->userModel->find($id);

        if (! $seller || $seller['role'] !== 'penjual') {
            return redirect()->to('/admin/seller')->with('error', 'Penjual tidak ditemukan.');
        }

        return view('admin_seller_detail', ['seller' => $seller]);
    }

    // Admin: setujui penjual
    public function approve($id)
    {
        if (session()->get('user_role') !== 'admin') {
            return redirect()->to('/');
        }

        $this->userModel->update($id, [
            'verification_status' => 'approved',
            'verified_at'          => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to('/admin/seller')->with('success', 'Penjual berhasil disetujui.');
    }

    // Admin: tolak penjual
    public function reject($id)
    {
        if (session()->get('user_role') !== 'admin') {
            return redirect()->to('/');
        }

        $this->userModel->update($id, [
            'verification_status' => 'rejected',
            'verified_at'          => null,
        ]);

        return redirect()->to('/admin/seller')->with('success', 'Penjual ditolak.');
    }
}