<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'user_name' => 'test',
            'user_email'    => 'test@example.com',
            'user_password' => password_hash('password', PASSWORD_DEFAULT),
        ];

        $this->db->table('users')->insert($data);
    }
}
