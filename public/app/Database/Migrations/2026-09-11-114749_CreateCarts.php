<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCarts extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'user_id' => ['type' => 'INT', 'unsigned' => true],
            'product_id' => ['type' => 'INT', 'unsigned' => true],
            'quantity' => ['type' => 'INT', 'default' => 1],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('carts');
    }

    public function down()
    {
        $this->forge->dropTable('carts');
    }
}