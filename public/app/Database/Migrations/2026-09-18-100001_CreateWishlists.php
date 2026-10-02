<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateWishlists extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'user_id' => ['type' => 'INT', 'unsigned' => true],
            'product_id' => ['type' => 'INT', 'unsigned' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey(['user_id', 'product_id']);
        $this->forge->createTable('wishlists');
    }

    public function down()
    {
        $this->forge->dropTable('wishlists');
    }
}