<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddProfileFieldsToUsers extends Migration
{
    public function up()
    {
        $this->forge->addColumn('users', [
            'gender' => [
                'type'       => 'ENUM',
                'constraint' => ['Laki-laki', 'Perempuan'],
                'null'       => true,
                'after'      => 'phone',
            ],
            'address' => [
                'type'    => 'TEXT',
                'null'    => true,
                'after'   => 'city',
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('users', ['gender', 'address']);
    }
}