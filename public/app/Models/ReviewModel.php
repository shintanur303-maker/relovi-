<?php

namespace App\Models;

use CodeIgniter\Model;

class ReviewModel extends Model
{
    protected $table = 'reviews';
    protected $primaryKey = 'id';
    protected $allowedFields = ['order_id', 'reviewer_id', 'seller_id', 'product_id', 'rating', 'comment'];
    protected $useTimestamps = true;

    public function getSellerRatingSummary($sellerId)
    {
        $row = $this->selectAvg('rating', 'avg_rating')
            ->selectCount('id', 'total_reviews')
            ->where('seller_id', $sellerId)
            ->first();

        return [
            'avg_rating' => $row['avg_rating'] ? round((float) $row['avg_rating'], 1) : null,
            'total_reviews' => (int) ($row['total_reviews'] ?? 0),
        ];
    }

    // Ringkasan rating se-situs (bukan per penjual), dipakai buat stats-bar di halaman home
    public function getSiteRatingSummary()
    {
        $row = $this->selectAvg('rating', 'avg_rating')
            ->selectCount('id', 'total_reviews')
            ->first();

        return [
            'avg_rating' => $row['avg_rating'] ? round((float) $row['avg_rating'], 1) : null,
            'total_reviews' => (int) ($row['total_reviews'] ?? 0),
        ];
    }

    public function getReviewsForSeller($sellerId)
    {
        return $this->select('reviews.*, users.name as reviewer_name, products.name as product_name')
            ->join('users', 'users.id = reviews.reviewer_id')
            ->join('products', 'products.id = reviews.product_id')
            ->where('reviews.seller_id', $sellerId)
            ->orderBy('reviews.id', 'DESC')
            ->findAll();
    }
}