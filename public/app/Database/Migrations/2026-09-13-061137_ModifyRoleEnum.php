<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ModifyRoleEnum extends Migration
{
    public function up()
    {
        $this->db->query("ALTER TABLE users MODIFY role ENUM('member','pembeli','penjual','admin') DEFAULT 'pembeli'");

        // Ubah akun lama yang masih 'member' jadi 'pembeli'
        $this->db->query("UPDATE users SET role = 'pembeli' WHERE role = 'member'");
    }

    public function down()
    {
        $this->db->query("ALTER TABLE users MODIFY role ENUM('member','admin') DEFAULT 'member'");
    }
}