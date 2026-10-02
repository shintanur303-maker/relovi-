<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddSellerProfileFieldsToUsers extends Migration
{
    public function up()
    {
        $this->forge->addColumn('users', [
            'shop_name' => [
                'type'       => 'VARCHAR',
                'constraint' => 150,
                'null'       => true,
                'after'      => 'role',
            ],
            'shop_bio' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'phone' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
                'null'       => true,
            ],
            'city' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
            'avatar' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'verification_document' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'verification_status' => [
                'type'       => 'ENUM',
                'constraint' => ['pending', 'approved', 'rejected'],
                'null'       => true,
                'default'    => null,
            ],
            'verified_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('users', [
            'shop_name',
            'shop_bio',
            'phone',
            'city',
            'avatar',
            'verification_document',
            'verification_status',
            'verified_at',
        ]);
    }
}