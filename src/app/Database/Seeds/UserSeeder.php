<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'username' => 'admin',
                'email'    => 'admin@admin.com',
                'password' => password_hash('admin', PASSWORD_DEFAULT),
                'is_admin' => true,
            ],
            [
                'username' => 'user',
                'email'    => 'user@user.com',
                'password' => password_hash('user', PASSWORD_DEFAULT),
                'is_admin' => false,
            ],
        ];

        $this->db->table('users')->insertBatch($data);
    }
}
