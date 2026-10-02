<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateOrders extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],

            'buyer_id' => [
                'type'     => 'INT',
                'unsigned' => true,
            ],

            'seller_id' => [
                'type'     => 'INT',
                'unsigned' => true,
            ],

            'product_id' => [
                'type'     => 'INT',
                'unsigned' => true,
            ],

            'quantity' => [
                'type'    => 'INT',
                'default' => 1,
            ],

            'price' => [
                'type'       => 'DECIMAL',
                'constraint' => '12,2',
            ],

            'status' => [
                'type'       => 'ENUM',
                'constraint' => [
                    'belum_dibayar',
                    'dikemas',
                    'dikirim',
                    'selesai',
                    'pengembalian',
                    'dibatalkan',
                ],
                'default' => 'belum_dibayar',
            ],

            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],

            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);

        $this->forge->createTable('orders');
    }

    public function down()
    {
        $this->forge->dropTable('orders');
    }
}