<?php

namespace App\Models;

use CodeIgniter\Model;

class CartModel extends Model
{
    protected $table = 'carts';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'product_id', 'quantity'];
    protected $useTimestamps = true;

    public function getCartItems($userId)
    {
        return $this->select('carts.*, products.name, products.price, products.photo, products.condition')
            ->join('products', 'products.id = carts.product_id')
            ->where('carts.user_id', $userId)
            ->findAll();
    }
}