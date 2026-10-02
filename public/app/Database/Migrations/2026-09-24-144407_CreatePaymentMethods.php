<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePaymentMethods extends Migration
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

            'type' => [
                'type'       => 'VARCHAR',
                'constraint' => 30,
            ],

            'bank_name' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],

            'account_name' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],

            'account_number' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null'       => true,
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

        $this->forge->createTable('payment_methods');
    }

    public function down()
    {
        $this->forge->dropTable('payment_methods');
    }
}