<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Program extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => '11',
                'auto_increment' => true,
            ],
            'nama_program' => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
            ],
            'filter' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'deskripsi_program' => [
                'type'       => 'VARCHAR',
                'constraint' => '225',
            ],
            'foto' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'deskripsi_kegiatan' => [
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
        $this->forge->addKey('id', true);
        $this->forge->createTable('program');
    }

    public function down()
    {
        $this->forge->dropTable('program');
    }
}
