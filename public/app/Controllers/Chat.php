<?php

namespace App\Controllers;

use App\Models\ChatModel;
use App\Models\ProductModel;
use App\Models\UserModel;
use App\Models\NotificationModel;

class Chat extends BaseController
{
    protected $chatModel;
    protected $notificationModel;

    public function __construct()
    {
        $this->chatModel = new ChatModel();
        $this->notificationModel = new NotificationModel();
    }

    // =========================================================
    // CHAT PEMBELI <-> ADMIN
    // =========================================================

    public function index()
    {
        if (! session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $buyerId = session()->get('user_id');
        $productId = $this->request->getGet('product_id');
        $productName = null;

        if ($productId) {
            $product = (new ProductModel())->find($productId);
            $productName = $product['name'] ?? null;
        }

        $messages = $this->chatModel
            ->where('buyer_id', $buyerId)
            ->where('seller_id', null)
            ->orderBy('id', 'ASC')
            ->findAll();

        return view('chat', [
            'messages'   => $messages,
            'productId'  => $productId,
            'productName' => $productName
        ]);
    }

    public function send()
    {
        if (! session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $userId = session()->get('user_id');

        $this->chatModel->insert([
            'buyer_id'   => $userId,
            'seller_id'  => null,
            'product_id' => $this->request->getPost('product_id') ?: null,
            'sender'     => 'buyer',
            'message'    => $this->request->getPost('message'),
        ]);

        $totalMessages = $this->chatModel
            ->where('buyer_id', $userId)
            ->where('seller_id', null)
            ->countAllResults();

        if ($totalMessages === 1) {
            $this->chatModel->insert([
                'buyer_id'  => $userId,
                'seller_id' => null,
                'sender'    => 'admin',
                'message'   => 'Halo! Terima kasih sudah menghubungi Relovié. Pesanmu sudah kami terima, admin akan segera membalas secepatnya 🙏',
            ]);
        }

        return redirect()->back();
    }

    public function adminIndex()
    {
        if (session()->get('user_role') !== 'admin') {
            return redirect()->to('/');
        }

        $buyers = $this->chatModel->getDistinctBuyers();

        return view('admin_chat_list', [
            'buyers' => $buyers
        ]);
    }

    public function adminView($buyerId)
    {
        if (session()->get('user_role') !== 'admin') {
            return redirect()->to('/');
        }

        $messages = $this->chatModel
            ->where('buyer_id', $buyerId)
            ->where('seller_id', null)
            ->orderBy('id', 'ASC')
            ->findAll();

        return view('admin_chat_view', [
            'messages' => $messages,
            'buyerId'  => $buyerId
        ]);
    }

    public function adminReply($buyerId)
    {
        if (session()->get('user_role') !== 'admin') {
            return redirect()->to('/');
        }

        $this->chatModel->insert([
            'buyer_id'  => $buyerId,
            'seller_id' => null,
            'sender'    => 'admin',
            'message'   => $this->request->getPost('message'),
        ]);

        return redirect()->to('/admin/chat/' . $buyerId);
    }


    // =========================================================
    // CHAT PEMBELI <-> PENJUAL
    // =========================================================

    // Pembeli membuka chat dengan penjual
    public function withSeller($sellerId)
    {
        if (! session()->get('isLoggedIn')) {
            return redirect()->to('/login')
                ->with('error', 'Silakan login dulu untuk chat dengan penjual.');
        }

        $seller = (new UserModel())->find($sellerId);

        if (! $seller || $seller['role'] !== 'penjual') {
            return redirect()->to('/')
                ->with('error', 'Toko tidak ditemukan.');
        }

        $buyerId = session()->get('user_id');

        $messages = $this->chatModel
            ->where('buyer_id', $buyerId)
            ->where('seller_id', $sellerId)
            ->orderBy('id', 'ASC')
            ->findAll();

        return view('chat_seller', [
            'messages' => $messages,
            'seller'   => $seller,
            'sellerId' => $sellerId,
        ]);
    }


    // =========================================================
    // PEMBELI MENGIRIM PESAN KE PENJUAL
    // =========================================================

    public function sendToSeller($sellerId)
    {
        if (! session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $buyerId = session()->get('user_id');

        // Cek apakah penjual benar-benar ada
        $seller = (new UserModel())->find($sellerId);

        if (! $seller || $seller['role'] !== 'penjual') {
            return redirect()->back()
                ->with('error', 'Penjual tidak ditemukan.');
        }

        $message = trim($this->request->getPost('message'));

        if ($message === '') {
            return redirect()->back()
                ->with('error', 'Pesan tidak boleh kosong.');
        }

        // Simpan pesan
        $this->chatModel->insert([
            'buyer_id'  => $buyerId,
            'seller_id' => $sellerId,
            'sender'    => 'buyer',
            'message'   => $message,
        ]);

        // =====================================================
        // NOTIFIKASI UNTUK PENJUAL
        // =====================================================

        $this->notificationModel->insert([
            'user_id' => $sellerId,
            'type'    => 'chat',
            'title'   => 'Pesan baru dari pembeli',
            'message' => 'Kamu mendapat pesan baru dari pembeli.',
            'link'    => '/jual/chat/' . $buyerId,
            'is_read' => 0,
        ]);

        return redirect()->to('/toko/' . $sellerId . '/chat');
    }


    // =========================================================
    // PENJUAL MELIHAT DAFTAR PEMBELI YANG CHAT
    // =========================================================

    public function sellerIndex()
    {
        if (session()->get('user_role') !== 'penjual') {
            return redirect()->to('/');
        }

        $sellerId = session()->get('user_id');

        $buyers = $this->chatModel
            ->getDistinctBuyersForSeller($sellerId);

        return view('seller_chat_list', [
            'buyers' => $buyers
        ]);
    }


    // =========================================================
    // PENJUAL MELIHAT CHAT DENGAN PEMBELI
    // =========================================================

    public function sellerView($buyerId)
    {
        if (session()->get('user_role') !== 'penjual') {
            return redirect()->to('/');
        }

        $sellerId = session()->get('user_id');

        $messages = $this->chatModel
            ->where('buyer_id', $buyerId)
            ->where('seller_id', $sellerId)
            ->orderBy('id', 'ASC')
            ->findAll();

        return view('seller_chat_view', [
            'messages' => $messages,
            'buyerId'  => $buyerId
        ]);
    }


    // =========================================================
    // PENJUAL MEMBALAS PESAN PEMBELI
    // =========================================================

    public function sellerReply($buyerId)
    {
        if (session()->get('user_role') !== 'penjual') {
            return redirect()->to('/');
        }

        $sellerId = session()->get('user_id');

        $message = trim($this->request->getPost('message'));

        if ($message === '') {
            return redirect()->back()
                ->with('error', 'Pesan tidak boleh kosong.');
        }

        // Simpan balasan penjual
        $this->chatModel->insert([
            'buyer_id'  => $buyerId,
            'seller_id' => $sellerId,
            'sender'    => 'seller',
            'message'   => $message,
        ]);

        // =====================================================
        // NOTIFIKASI UNTUK PEMBELI
        // =====================================================

        $this->notificationModel->insert([
            'user_id' => $buyerId,
            'type'    => 'chat',
            'title'   => 'Penjual membalas pesan',
            'message' => 'Penjual membalas pesanmu. Klik untuk melihat chat.',
            'link'    => '/toko/' . $sellerId . '/chat',
            'is_read' => 0,
        ]);

        return redirect()->to('/jual/chat/' . $buyerId);
    }
}