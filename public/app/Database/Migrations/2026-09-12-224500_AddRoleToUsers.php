<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddRoleToUsers extends Migration
{
    public function up()
    {
        $this->forge->addColumn('users', [
            'role' => ['type' => 'ENUM', 'constraint' => ['pembeli', 'penjual', 'admin'], 'default' => 'pembeli'],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('users', 'role');
    }
}