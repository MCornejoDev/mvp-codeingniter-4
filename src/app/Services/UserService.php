<?php

namespace App\Services;

use App\Models\User;
use Exception;

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

    public static function create(array $data): bool
    {
        try {
            return (new User())->insert($data);
        } catch (Exception $e) {
            log_message('error', 'Error create user: ' . $e->getMessage());
            return false;
        }
    }
}
