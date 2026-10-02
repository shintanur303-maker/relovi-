<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function login()
    {
        return view('login');
    }

    public function attemptLogin()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $this->userModel->findByEmail($email);

        if ($user && password_verify($password, $user['password'])) {
            session()->set([
                'user_id'    => $user['id'],
                'user_name'  => $user['name'],
                'user_role'  => $user['role'],
                'isLoggedIn' => true,
            ]);

            return redirect()->to('/')->with('success', 'Berhasil login!');
        }

        return redirect()->back()->with('error', 'Email atau password salah.');
    }

    public function register()
    {
        return view('register');
    }

    public function attemptRegister()
    {
        $data = [
            'name'     => $this->request->getPost('name'),
            'email'    => $this->request->getPost('email'),
            'password' => password_hash(
                $this->request->getPost('password'),
                PASSWORD_DEFAULT
            ),
             // Setiap akun baru mulai sebagai 'pembeli'.
            // Untuk jadi penjual, harus lewat alur "Daftar Jadi Penjual" + verifikasi admin.
            'role'     => 'user',
        ];

        $this->userModel->insert($data);

        return redirect()->to('/login')->with(
            'success',
            'Registrasi berhasil, silakan login.'
        );
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to('/login');
    }
}