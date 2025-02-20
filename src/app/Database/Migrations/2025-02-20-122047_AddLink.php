<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddLink extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'link_id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'link_user_id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
            ],
            'link_url' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'link_url_short' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'link_clicks' => [
                'type'       => 'INT',
                'constraint' => '100',
            ],
        ]);
        $this->forge->addKey('link_id', true);
        $this->forge->addForeignKey('link_user_id', 'users', 'user_id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('links');
    }

    public function down()
    {
        $this->forge->dropTable('links');
    }
}
