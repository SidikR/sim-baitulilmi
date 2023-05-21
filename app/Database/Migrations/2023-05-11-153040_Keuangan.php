<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Keuangan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_keuangan' => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
            ],
            'id_akunkeuangan' => [
                'type'       => 'INT',
                'constraint' => '2',
            ],
            'id_akseskeuangan' => [
                'type'       => 'INT',
                'constraint' => '2',
            ],
            'tanggal_transaksi' => [
                'type'       => 'date',
            ],
            'keterangan' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'slug' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'masuk' => [
                'type'       => 'decimal',
                'constraint' => '20',
                'null' => true,
            ],
            'keluar' => [
                'type'       => 'decimal',
                'constraint' => '20',
                'null' => true,
            ],
            'foto_bukti' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'jenis_keuangan' => [
                'type'       => 'INT',
                'constraint' => '2',
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
        $this->forge->addPrimaryKey('id_keuangan');
        $this->forge->addKey('id_akunkeuangan', 'id_akseskeuangan');
        $this->forge->addForeignKey('id_akunkeuangan', 'akunkeuangan', 'id_akunkeuangan', 'RESTRICT', 'RESTRICT');
        $this->forge->addForeignKey('id_akseskeuangan', 'akseskeuangan', 'id_akseskeuangan', 'RESTRICT', 'RESTRICT');
        $this->forge->createTable('keuangan');
    }

    public function down()
    {
        $this->forge->dropTable('keuangan');
    }
}
