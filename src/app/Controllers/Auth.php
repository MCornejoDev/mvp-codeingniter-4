<?php

namespace App\Controllers;

use App\Models\User;
use App\Services\UserService;

class Auth extends BaseController
{
    public function login()
    {
        return view('auth/login');
    }

    public function loginPost()
    {
        $session = session();
        $model = new User();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $model->where('email', $email)->first();

        if ($user && password_verify($password, $user['password'])) {
            $session->set([
                'id' => $user['id'],
                'username' => $user['username'],
                'email' => $user['email'],
                'logged_in' => true,
                'is_admin' => $user['is_admin'],
            ]);
            return redirect()->to('/dashboard');
        } else {
            $session->setFlashdata('error', 'Correo o contraseña incorrectos.');
            return redirect()->to('/');
        }
    }

    public function register()
    {
        return view('auth/register');
    }

    public function registerPost()
    {
        $data = [
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        ];

        UserService::create($data);

        return redirect()->to('/login')->with('success', 'Registro exitoso, inicia sesión.');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
