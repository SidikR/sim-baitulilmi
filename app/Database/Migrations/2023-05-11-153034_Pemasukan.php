<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pemasukan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pemasukan' => [
                'type'           => 'INT',
                'constraint'     => 100,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_akunKeuangan' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'id_aksesKeuangan' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'tanggal_transaksi' => [
                'type'       => 'DATETIME',
                'null' => true,
            ],
            'keterangan' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'nominal' => [
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
        $this->forge->addKey('id_pemasukan', true);
        $this->forge->createTable('pemasukan');
        $this->forge->addForeignKey('id_akunKeuangan', 'akunKeuangan', 'id_akunKeuangan', 'RESTRICT', 'RESTRICT');
        $this->forge->addForeignKey('id_aksesKeuangan', 'aksesKeuangan', 'id_aksesKeuangan', 'RESTRICT', 'RESTRICT');
    }

    public function down()
    {
        $this->forge->dropTable('pemasukan');
    }
}
