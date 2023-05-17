<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AksesKeuangan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_aksesKeuangan' => [
                'type'           => 'INT',
                'constraint'     => 100,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'keterangan' => [
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
            ]
        ]);
        $this->forge->addKey('id_aksesKeuangan', true);
        $this->forge->createTable('aksesKeuangan');
    }

    public function down()
    {
        $this->forge->dropTable('aksesKeuangan');
    }
}
