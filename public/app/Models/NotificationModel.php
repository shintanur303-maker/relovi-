<?php

namespace App\Models;

use CodeIgniter\Model;

class NotificationModel extends Model
{
    protected $table = 'notifications';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'user_id',
        'type',
        'title',
        'message',
        'link',
        'is_read',
    ];

    protected $useTimestamps = true;

    /**
     * Ambil semua notifikasi milik user
     */
    public function getUserNotifications($userId)
    {
        return $this->where('user_id', $userId)
            ->orderBy('id', 'DESC')
            ->findAll();
    }

    /**
     * Ambil notifikasi yang belum dibaca
     */
    public function getUnreadNotifications($userId)
    {
        return $this->where('user_id', $userId)
            ->where('is_read', 0)
            ->orderBy('id', 'DESC')
            ->findAll();
    }

    /**
     * Hitung jumlah notifikasi yang belum dibaca
     */
    public function countUnread($userId)
    {
        return $this->where('user_id', $userId)
            ->where('is_read', 0)
            ->countAllResults();
    }

    /**
     * Tandai satu notifikasi sebagai sudah dibaca
     */
    public function markAsRead($id, $userId)
    {
        return $this->where('id', $id)
            ->where('user_id', $userId)
            ->set(['is_read' => 1])
            ->update();
    }

    /**
     * Tandai semua notifikasi sebagai sudah dibaca
     */
    public function markAllAsRead($userId)
    {
        return $this->where('user_id', $userId)
            ->set(['is_read' => 1])
            ->update();
    }
}