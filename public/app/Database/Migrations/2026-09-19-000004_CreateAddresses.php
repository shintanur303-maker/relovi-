<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAddresses extends Migration
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

            'label' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'default'    => 'Rumah',
            ],

            'recipient_name' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],

            'phone' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
            ],

            'province' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],

            'city' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],

            'district' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],

            'village' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],

            'postal_code' => [
                'type'       => 'VARCHAR',
                'constraint' => 10,
                'null'       => true,
            ],

            'full_address' => [
                'type' => 'TEXT',
                'null' => true,
            ],

            'latitude' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,7',
                'null'       => true,
            ],

            'longitude' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,7',
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

        $this->forge->createTable('addresses');
    }

    public function down()
    {
        $this->forge->dropTable('addresses', true);
    }
}