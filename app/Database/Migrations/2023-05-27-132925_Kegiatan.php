<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kegiatan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_kegiatan' => [
                'type'           => 'INT',
                'constraint'     => '11',
                'auto_increment' => true,
            ],
            'nama_kegiatan' => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
            ],
            'slug_kegiatan' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'waktu_mulai_kegiatan' => [
                'type'       => 'Datetime',
            ],
            'waktu_berakhir_kegiatan' => [
                'type'       => 'Datetime',
            ],
            'penyelenggara_kegiatan' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'tempat_kegiatan' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'deskripsi_kegiatan' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'foto_kegiatan' => [
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
        $this->forge->addKey('id_kegiatan', true);
        $this->forge->createTable('kegiatan');
    }

    public function down()
    {
        $this->forge->dropTable('kegiatan');
    }
}
