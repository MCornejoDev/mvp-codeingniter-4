<?php

namespace App\Controllers;

use App\Services\LinkService;
use App\Services\UserService;

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
        return view('admin/links', ['links' => LinkService::getAll()]);
    }
}
