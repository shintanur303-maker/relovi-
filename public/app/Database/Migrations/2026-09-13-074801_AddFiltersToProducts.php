<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddFiltersToProducts extends Migration
{
    public function up()
    {
        $this->forge->addColumn('products', [
            'size' => ['type' => 'VARCHAR', 'constraint' => 20, 'null' => true],
            'location' => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => true],
            'payment_method' => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => true],
            'shipping_option' => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => true],
            'rating' => ['type' => 'DECIMAL', 'constraint' => '2,1', 'default' => 0],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('products', ['size', 'location', 'payment_method', 'shipping_option', 'rating']);
    }
}