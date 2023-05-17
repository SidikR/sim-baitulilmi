<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pegeluaran extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pengeluaran' => [
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
            'foto_bukti' => [
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
        $this->forge->addKey('id_pengeluaran', true);
        $this->forge->createTable('pengeluaran');
        $this->forge->addForeignKey('id_akunKeuangan', 'akunKeuangan', 'id_akunKeuangan', 'RESTRICT', 'RESTRICT');
        $this->forge->addForeignKey('id_aksesKeuangan', 'aksesKeuangan', 'id_aksesKeuangan', 'RESTRICT', 'RESTRICT');
    }

    public function down()
    {
        $this->forge->dropTable('pengeluaran');
    }
}
