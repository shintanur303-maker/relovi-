<?php

namespace App\Controllers;

use App\Models\NotificationModel;

class Notification extends BaseController
{
    protected $notificationModel;

    public function __construct()
    {
        $this->notificationModel = new NotificationModel();
    }

    /**
     * Menampilkan semua notifikasi user
     */
    public function index()
    {
        if (! session()->get('isLoggedIn')) {
            return redirect()->to('/login')
                ->with('error', 'Silakan login dulu untuk melihat notifikasi.');
        }

        $userId = session()->get('user_id');

        $notifications = $this->notificationModel
            ->getUserNotifications($userId);

        $unreadCount = $this->notificationModel
            ->countUnread($userId);

        return view('notifications', [
            'notifications' => $notifications,
            'unreadCount'   => $unreadCount,
        ]);
    }

    /**
     * Tandai satu notifikasi sebagai sudah dibaca
     */
    public function read($id)
    {
        if (! session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $userId = session()->get('user_id');

        $notification = $this->notificationModel
            ->where('id', $id)
            ->where('user_id', $userId)
            ->first();

        if (! $notification) {
            return redirect()->to('/notifikasi');
        }

        $this->notificationModel->markAsRead($id, $userId);

        // Kalau notifikasi mempunyai link, arahkan ke link tersebut
        if (! empty($notification['link'])) {
            return redirect()->to($notification['link']);
        }

        return redirect()->to('/notifikasi');
    }

    /**
     * Tandai semua notifikasi sebagai sudah dibaca
     */
    public function readAll()
{
    if (! session()->get('isLoggedIn')) {
        return redirect()->to('/login');
    }

    $userId = session()->get('user_id');

    $this->notificationModel->markAllAsRead($userId);

    return redirect()->to('/notifikasi')
        ->with('success', 'Semua notifikasi sudah ditandai sebagai dibaca.');
}


// =========================================================
// NOTIFIKASI TERBARU UNTUK TOAST
// =========================================================

public function latestUnread()
{
    if (! session()->get('isLoggedIn')) {
        return $this->response->setJSON([
            'success' => false
        ]);
    }

    $userId = session()->get('user_id');

    $notification = $this->notificationModel
        ->where('user_id', $userId)
        ->where('is_read', 0)
        ->orderBy('id', 'DESC')
        ->first();

    if (! $notification) {
        return $this->response->setJSON([
            'success' => true,
            'notification' => null
        ]);
    }

    return $this->response->setJSON([
        'success' => true,
        'notification' => [
            'id'      => $notification['id'],
            'title'   => $notification['title'],
            'message' => $notification['message'],
            'link'    => $notification['link'],
        ]
    ]);
}

}