<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Jabatan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_jabatan' => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
                //'unsigned'       => true,
            ],
            'nama_jabatan' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'slug_jabatan' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'deskripsi_jabatan' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ]
        ]);
        $this->forge->addKey('id_jabatan', true);
        $this->forge->createTable('jabatan');
    }

    public function down()
    {
        $this->forge->dropTable('jabatan');
    }
}
