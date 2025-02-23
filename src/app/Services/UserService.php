<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    public static function getAll(?int $page = 1, ?int $limit = 5): array
    {
        $model = new User();

        $data = [
            'users' => $model->paginate($limit, 'default', $page),
            'pager' => $model->pager,
        ];

        return $data;
    }
}
