<?php

namespace App\Models;

use CodeIgniter\Model;

class PaymentMethodModel extends Model
{
    protected $table = 'payment_methods';

    protected $primaryKey = 'id';

    protected $allowedFields = [
        'user_id',
        'type',
        'bank_name',
        'account_name',
        'account_number',
        'is_primary',
    ];

    protected $useTimestamps = true;

    /**
     * Ambil semua rekening bank milik user
     */
    public function getBankAccounts(int $userId)
    {
        return $this->where('user_id', $userId)
            ->where('type', 'bank')
            ->orderBy('is_primary', 'DESC')
            ->orderBy('id', 'DESC')
            ->findAll();
    }

    /**
     * Ambil metode pembayaran utama
     */
    public function getPrimaryPayment(int $userId)
    {
        return $this->where('user_id', $userId)
            ->where('is_primary', 1)
            ->first();
    }
}