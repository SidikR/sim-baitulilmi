<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PeminjamanInventaris extends Migration
{
    public function up()
    {
        // Users
        $this->forge->addField([
            'id_peminjaman'         => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'id_user'               => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'id_barang'             => ['type' => 'int', 'constraint' => 11],
            'qty'                   => ['type' => 'int', 'constraint' => 2, 'null' => true],
            'instansi_peminjam'     => ['type' => 'varchar', 'constraint' => 100],
            'nama_penanggungjawab'  => ['type' => 'varchar', 'constraint' => 255],
            'tanggal_dipinjam'      => ['type' => 'date'],
            'tanggal_pengembalian'  => ['type' => 'date'],
            'infaq'                 => ['type' => 'int', 'constraint' => 20],
            'metode_infaq'          => ['type' => 'varchar', 'constraint' => 100],
            'agreement'             => ['type' => 'boolean'],
            'foto_identitas'        => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'status_peminjaman'     => ['type' => 'varchar', 'constraint' => 255, 'default' => 'pending'],
            'pesan'                 => ['type' => 'varchar', 'constraint' => 255],
            'created_at'            => ['type' => 'datetime', 'null' => true],
            'updated_at'            => ['type' => 'datetime', 'null' => true],
            'deleted_at'            => ['type' => 'datetime', 'null' => true],
        ]);

        $this->forge->addKey('id_peminjaman', true);
        $this->forge->addKey(['id_barang', 'id_user']);
        $this->forge->addForeignKey('id_barang', 'inventaris', 'id_inventaris', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_user', 'users', 'id', 'CASCADE', 'CASCADE');

        $this->forge->createTable('peminjaman_inventaris', true);
    }

    public function down()
    {
        $this->forge->dropTable('peminjaman_inventaris', true);
    }
}
