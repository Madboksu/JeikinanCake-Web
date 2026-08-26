<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AdminModel;

class AuthController extends BaseController
{
    protected AdminModel $adminModel;

    public function __construct()
    {
        $this->adminModel = new AdminModel();
    }

    /**
     * Tampilkan Halaman Login Admin
     */
    public function login()
    {
        if (session()->get('is_admin_logged_in')) {
            return redirect()->to(base_url('admin/dashboard'));
        }

        $data = [
            'title' => 'Admin Login - Jeikinan Cake',
        ];

        return view('admin/login', $data);
    }

    /**
     * Proses Autentikasi Login
     */
    public function authenticate()
    {
        $rules = [
            'username' => 'required',
            'password' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->to(base_url('admin/login'))
                ->withInput()
                ->with('error', 'Username dan Password wajib diisi.');
        }

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $admin = $this->adminModel->getByUsername($username);

        if (!$admin) {
            return redirect()->to(base_url('admin/login'))
                ->withInput()
                ->with('error', 'Username atau Password salah.');
        }

        // Verifikasi password hash
        if (password_verify($password, $admin['password_hash'])) {
            session()->set([
                'admin_id'           => $admin['admin_id'],
                'admin_username'     => $admin['username'],
                'is_admin_logged_in' => true,
            ]);

            return redirect()->to(base_url('admin/dashboard'))
                ->with('success', 'Selamat datang kembali, ' . esc($admin['username']) . '!');
        }

        return redirect()->to(base_url('admin/login'))
            ->withInput()
            ->with('error', 'Username atau Password salah.');
    }

    /**
     * Proses Logout Admin
     */
    public function logout()
    {
        session()->remove(['admin_id', 'admin_username', 'is_admin_logged_in']);
        session()->destroy();

        return redirect()->to(base_url('admin/login'))
            ->with('success', 'Anda telah berhasil keluar dari Admin Panel.');
    }
}
