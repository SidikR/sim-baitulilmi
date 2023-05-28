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
                'constraint'     => '11',
            ],
            'id_jabatan' => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
            ],
            'nama_lengkap' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'slug_pengurus' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'jenis_kelamin' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'nomor_telepon' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'alamat_pengurus' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'foto_pengurus' => [
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
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id_pengurus', true);
        $this->forge->addKey('id_jabatan');
        $this->forge->addForeignKey('id_jabatan', 'jabatan', 'id_jabatan', 'RESTRICT', 'RESTRICT');
        $this->forge->createTable('pengurus');
    }

    public function down()
    {
        $this->forge->dropTable('pengurus');
    }
}
