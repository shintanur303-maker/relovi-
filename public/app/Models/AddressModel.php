<?php

namespace App\Models;

use CodeIgniter\Model;

class AddressModel extends Model
{
    protected $table = 'addresses';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'user_id',
        'label',
        'recipient_name',
        'phone',
        'province',
        'city',
        'district',
        'village',
        'postal_code',
        'full_address',
        'latitude',
        'longitude',
        'is_primary',
    ];

    protected $useTimestamps = true;

    public function getPrimaryAddress(int $userId)
{
    return $this->where('user_id', $userId)
        ->where('is_primary', 1)
        ->first();
}
}