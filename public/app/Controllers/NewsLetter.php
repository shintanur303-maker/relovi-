<?php

namespace App\Controllers;

use App\Models\NewsletterSubscriberModel;
use App\Models\UserModel;

class Newsletter extends BaseController
{
    protected $newsletterModel;
    protected $userModel;

    public function __construct()
    {
        $this->newsletterModel = new NewsletterSubscriberModel();
        $this->userModel = new UserModel();
    }

    /**
     * Halaman langganan
     */
    public function index()
    {
        $subscriber = null;

        // Jika user sudah login,
        // cari berdasarkan user_id
        if (session()->get('isLoggedIn')) {
            $subscriber = $this->newsletterModel
                ->findByUserId(session()->get('user_id'));
        }

        // Jika belum login,
        // gunakan email subscriber dari session
        if (! $subscriber && session()->get('newsletter_email')) {
            $subscriber = $this->newsletterModel
                ->findByEmail(session()->get('newsletter_email'));
        }

        return view('newsletter', [
            'subscriber' => $subscriber,
        ]);
    }

    /**
     * Proses berlangganan
     */
    public function subscribe()
    {
        $email = trim($this->request->getPost('email'));

        // Validasi email
        if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return redirect()->back()
                ->withInput()
                ->with('newsletter_error', 'Masukkan alamat email yang valid.');
        }

        // Cek apakah email sudah ada
        $existing = $this->newsletterModel->findByEmail($email);

        if ($existing) {

            // Jika sebelumnya pernah unsubscribe,
            // aktifkan kembali
            if ($existing['status'] === 'inactive') {

                $this->newsletterModel->update($existing['id'], [
                    'status' => 'active',
                    'subscribed_at' => date('Y-m-d H:i:s'),
                ]);

                session()->set('newsletter_email', $email);

                return redirect()->to('/')
                    ->with('newsletter_success', 'Langganan kamu berhasil diaktifkan kembali.');
            }

            // Jika masih aktif
            return redirect()->to('/')
                ->with('newsletter_info', 'Email ini sudah terdaftar sebagai subscriber Relovié.');
        }

        // Ambil user_id jika sedang login
        $userId = null;

        if (session()->get('isLoggedIn')) {
            $userId = session()->get('user_id');
        }

        // Simpan subscriber baru
        $this->newsletterModel->insert([
            'user_id' => $userId,
            'email' => $email,
            'status' => 'active',
            'notify_new_items' => 1,
            'notify_promo' => 1,
            'notify_flash_sale' => 1,
            'notify_recommendation' => 0,
            'subscribed_at' => date('Y-m-d H:i:s'),
        ]);

        // Simpan email di session
        session()->set('newsletter_email', $email);

        return redirect()->to('/')
            ->with('newsletter_success', 'Berhasil berlangganan newsletter Relovié!');
    }

    /**
     * Update preferensi newsletter
     */
    public function updatePreferences()
    {
        $subscriber = $this->getCurrentSubscriber();

        if (! $subscriber) {
            return redirect()->to('/berlangganan')
                ->with('newsletter_error', 'Data langganan tidak ditemukan.');
        }

        $this->newsletterModel->update($subscriber['id'], [
            'notify_new_items' => $this->request->getPost('notify_new_items') ? 1 : 0,
            'notify_promo' => $this->request->getPost('notify_promo') ? 1 : 0,
            'notify_flash_sale' => $this->request->getPost('notify_flash_sale') ? 1 : 0,
            'notify_recommendation' => $this->request->getPost('notify_recommendation') ? 1 : 0,
        ]);

        return redirect()->to('/berlangganan')
            ->with('newsletter_success', 'Preferensi newsletter berhasil diperbarui.');
    }

    /**
     * Berhenti berlangganan
     */
    public function unsubscribe()
    {
        $subscriber = $this->getCurrentSubscriber();

        if (! $subscriber) {
            return redirect()->to('/berlangganan')
                ->with('newsletter_error', 'Data langganan tidak ditemukan.');
        }

        $this->newsletterModel->update($subscriber['id'], [
            'status' => 'inactive',
        ]);

        session()->remove('newsletter_email');

        return redirect()->to('/berlangganan')
            ->with('newsletter_success', 'Kamu sudah berhenti berlangganan newsletter Relovié.');
    }

    /**
     * Mendapatkan subscriber yang sedang digunakan
     */
    private function getCurrentSubscriber()
    {
        if (session()->get('isLoggedIn')) {
            $subscriber = $this->newsletterModel
                ->findByUserId(session()->get('user_id'));

            if ($subscriber) {
                return $subscriber;
            }
        }

        $email = session()->get('newsletter_email');

        if ($email) {
            return $this->newsletterModel
                ->findByEmail($email);
        }

        return null;
    }
}