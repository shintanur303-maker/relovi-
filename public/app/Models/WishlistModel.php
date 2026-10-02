<?php

namespace App\Models;

use CodeIgniter\Model;

class WishlistModel extends Model
{
    protected $table = 'wishlists';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'product_id'];
    protected $useTimestamps = true;

    public function isWishlisted($userId, $productId)
    {
        return (bool) $this->where('user_id', $userId)->where('product_id', $productId)->first();
    }
}