<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    public static function getAll(): array
    {
        return (new User())->findAll();
    }
}
