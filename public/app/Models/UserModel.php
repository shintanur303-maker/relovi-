<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'name',
        'email',
        'password',
        'role',
        'shop_name',
        'shop_bio',
        'phone',
        'gender',
        'city',
        'address',
        'avatar',
        'verification_document',
        'verification_status',
        'verified_at',
    ];
    protected $useTimestamps = true;

    public function findByEmail($email)
    {
        return $this->where('email', $email)->first();
    }
}