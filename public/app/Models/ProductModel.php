<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'name', 'price', 'category', 'location', 'size', 'payment_method', 'shipping_option', 'rating', 'condition', 'description', 'photo', 'status'];
    protected $useTimestamps = true;
}