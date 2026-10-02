<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddPaymentMethodToOrders extends Migration
{
    public function up()
    {
        $fields = [
            'payment_method' => [
                'type'       => 'VARCHAR',
                'constraint' => 30,
                'null'       => true,
                'after'      => 'price',
            ],
        ];

        $this->forge->addColumn('orders', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('orders', 'payment_method');
    }
}