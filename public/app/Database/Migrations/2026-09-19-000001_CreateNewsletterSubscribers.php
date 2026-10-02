<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateNewsletterSubscribers extends Migration
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
                'null'       => true,
            ],

            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],

            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['active', 'inactive'],
                'default'    => 'active',
            ],

            'notify_new_items' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'default'    => 1,
            ],

            'notify_promo' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'default'    => 1,
            ],

            'notify_flash_sale' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'default'    => 1,
            ],

            'notify_recommendation' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'default'    => 0,
            ],

            'subscribed_at' => [
                'type' => 'DATETIME',
                'null' => true,
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
        $this->forge->addUniqueKey('email');

        $this->forge->createTable('newsletter_subscribers');
    }

    public function down()
    {
        $this->forge->dropTable('newsletter_subscribers');
    }
}