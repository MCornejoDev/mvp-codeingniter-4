<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'username' => 'test',
            'email'    => 'test@example.com',
            'password' => password_hash('password', PASSWORD_DEFAULT),
        ];

        $this->db->table('users')->insert($data);
    }
}
