<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddStatusToProducts extends Migration
{
    public function up()
    {
        $this->forge->addColumn('products', [
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['aktif', 'arsip', 'terjual'],
                'default' => 'aktif',
                'after' => 'photo',
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('products', ['status']);
    }
}