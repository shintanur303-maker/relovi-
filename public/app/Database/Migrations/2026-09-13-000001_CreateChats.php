<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateChats extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'buyer_id' => ['type' => 'INT', 'unsigned' => true],
            'product_id' => ['type' => 'INT', 'unsigned' => true, 'null' => true],
            'sender' => ['type' => 'ENUM', 'constraint' => ['buyer', 'admin']],
            'message' => ['type' => 'TEXT'],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('chats');
    }

    public function down()
    {
        $this->forge->dropTable('chats');
    }
}