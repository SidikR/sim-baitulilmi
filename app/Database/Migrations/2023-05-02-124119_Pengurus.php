<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pengurus extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pengurus' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_lengkap' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'slug' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'jenis_kelamin' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
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
        $this->forge->addKey('id_pengurus', true);
        $this->forge->createTable('pengurus');
    }

    public function down()
    {
        $this->forge->dropTable('pengurus');
    }
}
