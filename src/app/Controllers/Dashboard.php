<?php

namespace App\Controllers;

use App\Services\LinkService;
use App\Services\UserService;
use CodeIgniter\HTTP\Response;

class Dashboard extends BaseController
{
    public function dashboard(): string
    {
        return view('dashboard');
    }

    public function users(): string
    {
        return view('admin/users', ['users' => UserService::getAll()]);
    }

    public function links(): string
    {
        $page = $this->request->getVar('page') ?? 1;
        return view('admin/links', ['links' => LinkService::getAll($page)]);
    }

    public function postLink(): Response
    {
        $data = [
            'url' => $this->request->getPost('url'),
            'link_user_id' => session()->get('id'),
        ];

        LinkService::create($data);
        return redirect()->to('/dashboard')->with('success', 'Enlace creado correctamente.');
    }
}
