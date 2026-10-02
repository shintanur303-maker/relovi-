<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddSellerChatSupport extends Migration
{
    public function up()
    {
        // seller_id kosong (null) = chat ke admin (perilaku lama tetap jalan)
        // seller_id terisi = chat ke penjual tertentu
        $this->forge->addColumn('chats', [
            'seller_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => true,
                'after'      => 'buyer_id',
            ],
        ]);

        // Tambahkan 'seller' sebagai pengirim yang valid (sebelumnya cuma buyer/admin)
        $this->forge->modifyColumn('chats', [
            'sender' => [
                'type'       => 'ENUM',
                'constraint' => ['buyer', 'admin', 'seller'],
                'null'       => false,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('chats', 'seller_id');

        $this->forge->modifyColumn('chats', [
            'sender' => [
                'type'       => 'ENUM',
                'constraint' => ['buyer', 'admin'],
                'null'       => false,
            ],
        ]);
    }
}