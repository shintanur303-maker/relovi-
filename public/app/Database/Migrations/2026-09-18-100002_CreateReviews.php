<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateReviews extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'order_id' => ['type' => 'INT', 'unsigned' => true],
            'reviewer_id' => ['type' => 'INT', 'unsigned' => true],
            'seller_id' => ['type' => 'INT', 'unsigned' => true],
            'product_id' => ['type' => 'INT', 'unsigned' => true],
            'rating' => ['type' => 'TINYINT', 'unsigned' => true],
            'comment' => ['type' => 'TEXT', 'null' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('order_id');
        $this->forge->createTable('reviews');
    }

    public function down()
    {
        $this->forge->dropTable('reviews');
    }
}