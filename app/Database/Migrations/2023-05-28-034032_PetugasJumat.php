<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PetugasJumat extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_petugas' => [
                'type'           => 'INT',
                'constraint'     => '11',
                'auto_increment' => true,
            ],
            'tanggal' => [
                'type'       => 'DATE',
            ],
            'nama_imam' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'jabatan_imam' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'nama_khatib' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'jabatan_khatib' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'nama_muadzin' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'jabatan_muadzin' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'poster' => [
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
        $this->forge->addKey('id_petugas', true);
        $this->forge->createTable('petugas_jumat');
    }

    public function down()
    {
        $this->forge->dropTable('petugas_jumat');
    }
}
