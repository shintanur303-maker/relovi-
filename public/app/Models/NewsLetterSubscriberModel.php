<?php

namespace App\Models;

use CodeIgniter\Model;

class NewsletterSubscriberModel extends Model
{
    protected $table = 'newsletter_subscribers';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'user_id',
        'email',
        'status',
        'notify_new_items',
        'notify_promo',
        'notify_flash_sale',
        'notify_recommendation',
        'subscribed_at',
    ];

    protected $useTimestamps = true;

    public function findByEmail($email)
    {
        return $this->where('email', $email)->first();
    }

    public function findActiveByEmail($email)
    {
        return $this->where('email', $email)
            ->where('status', 'active')
            ->first();
    }

    public function findByUserId($userId)
    {
        return $this->where('user_id', $userId)->first();
    }
}