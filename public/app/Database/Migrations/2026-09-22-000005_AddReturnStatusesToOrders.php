<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddReturnStatusesToOrders extends Migration
{
    public function up()
    {
        $db = \Config\Database::connect();

        $db->query("
            ALTER TABLE orders
            MODIFY status ENUM(
                'belum_dibayar',
                'dikemas',
                'dikirim',
                'selesai',
                'pengembalian',
                'pengembalian_disetujui',
                'pengembalian_ditolak',
                'dibatalkan'
            ) NOT NULL DEFAULT 'belum_dibayar'
        ");
    }

    public function down()
    {
        $db = \Config\Database::connect();

        $db->query("
            ALTER TABLE orders
            MODIFY status ENUM(
                'belum_dibayar',
                'dikemas',
                'dikirim',
                'selesai',
                'pengembalian',
                'dibatalkan'
            ) NOT NULL DEFAULT 'belum_dibayar'
        ");
    }
}