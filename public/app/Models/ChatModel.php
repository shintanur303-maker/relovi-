<?php

namespace App\Models;

use CodeIgniter\Model;

class ChatModel extends Model
{
    protected $table = 'chats';
    protected $primaryKey = 'id';
    protected $allowedFields = ['buyer_id', 'seller_id', 'product_id', 'sender', 'message'];
    protected $useTimestamps = true;
    protected $updatedField = '';

    // Dipakai admin: daftar pembeli yang chat ke ADMIN saja (seller_id kosong)
    public function getDistinctBuyers()
    {
        return $this->select('chats.buyer_id, users.name')
            ->join('users', 'users.id = chats.buyer_id')
            ->where('chats.seller_id', null)
            ->groupBy('chats.buyer_id')
            ->findAll();
    }

    // Dipakai penjual: daftar pembeli yang chat ke TOKO dia
    public function getDistinctBuyersForSeller($sellerId)
    {
        return $this->select('chats.buyer_id, users.name')
            ->join('users', 'users.id = chats.buyer_id')
            ->where('chats.seller_id', $sellerId)
            ->groupBy('chats.buyer_id')
            ->findAll();
    }
}