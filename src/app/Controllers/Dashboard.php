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
        $page = $this->request->getVar('page') ?? 1;
        return view('admin/users', ['users' => UserService::getAll($page)]);
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

        $response = LinkService::create($data);

        return redirect()->to('/dashboard')
            ->withInput()
            ->with($response['status'], $response['messages']);
    }

    public function updateClicks()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('link_id');

            if (!$id) {
                return $this->response->setJSON(['status' => 'error', 'message' => 'No se recibió el link_id']);
            }

            LinkService::updateClicks($id);
            return $this->response->setJSON(['status' => 'success', 'message' => 'Clicks actualizados correctamente']);
        }

        return $this->response->setJSON(['status' => 'error', 'message' => 'No es una solicitud AJAX']);
    }

    public function link(string $slug)
    {
        $link = LinkService::getBySlug($slug);
        LinkService::updateClicks($link['id']);
        return redirect()->to($link['url']);
    }
}
