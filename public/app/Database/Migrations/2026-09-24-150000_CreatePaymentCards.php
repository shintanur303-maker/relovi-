<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePaymentCards extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],

            'user_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],

            'card_type' => [
                'type'       => 'VARCHAR',
                'constraint' => 30,
                'null'       => true,
            ],

            'last_four' => [
                'type'       => 'VARCHAR',
                'constraint' => 4,
            ],

            'card_name' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],

            'expiry_month' => [
                'type'       => 'VARCHAR',
                'constraint' => 2,
            ],

            'expiry_year' => [
                'type'       => 'VARCHAR',
                'constraint' => 2,
            ],

            'is_primary' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'default'    => 0,
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
        $this->forge->addKey('user_id');

        $this->forge->createTable('payment_cards');
    }

    public function down()
    {
        $this->forge->dropTable('payment_cards');
    }
}