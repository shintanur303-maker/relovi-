<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table = 'orders';

    protected $primaryKey = 'id';

    protected $allowedFields = [
        'buyer_id',
        'seller_id',
        'product_id',
        'quantity',
        'price',
        'payment_method',
        'status',
    ];

    protected $useTimestamps = true;

    // Ambil pesanan milik pembeli
    // Bisa difilter berdasarkan status
    public function getOrdersForBuyer(int $buyerId, ?string $status = null)
    {
        $query = $this->select(
                'orders.*, 
                 products.name as product_name, 
                 products.photo as product_photo, 
                 products.category'
            )
            ->join(
                'products',
                'products.id = orders.product_id'
            )
            ->where(
                'orders.buyer_id',
                $buyerId
            )
            ->orderBy(
                'orders.id',
                'DESC'
            );

        if ($status !== null) {
            $query = $query->where(
                'orders.status',
                $status
            );
        }

        return $query->findAll();
    }
}