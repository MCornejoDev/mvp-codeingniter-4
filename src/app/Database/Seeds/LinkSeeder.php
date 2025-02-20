<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;


class LinkSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'link_user_id' => 1,
            'link_url' => 'test',
            'link_url_short' => 'test',
            'link_clicks' => 0,
        ];

        $this->db->table('links')->insert($data);
    }
}
