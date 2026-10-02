<?php

namespace App\Models;

use CodeIgniter\Model;

class PaymentCardModel extends Model
{
    protected $table = 'payment_cards';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'user_id',
        'card_type',
        'last_four',
        'card_name',
        'expiry_month',
        'expiry_year',
        'is_primary',
    ];

    protected $useTimestamps = true;

    public function getCardsByUser(int $userId)
    {
        return $this->where('user_id', $userId)
            ->orderBy('is_primary', 'DESC')
            ->orderBy('id', 'DESC')
            ->findAll();
    }

    public function getPrimaryCard(int $userId)
    {
        return $this->where('user_id', $userId)
            ->where('is_primary', 1)
            ->first();
    }
}