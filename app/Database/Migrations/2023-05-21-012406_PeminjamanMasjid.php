<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PeminjamanMasjid extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_peminjaman'         => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'id_user'               => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'instansi_peminjam'     => ['type' => 'varchar', 'constraint' => 100],
            'nama_penanggungjawab'  => ['type' => 'varchar', 'constraint' => 255],
            'nama_kegiatan'         => ['type' => 'varchar', 'constraint' => 255],
            'deskripsi_kegiatan'    => ['type' => 'varchar', 'constraint' => 255],
            'tanggal_dipinjam'      => ['type' => 'datetime'],
            'tanggal_selesai'       => ['type' => 'datetime'],
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
        $this->forge->addKey('id_user');
        $this->forge->addForeignKey('id_user', 'users', 'id', 'CASCADE', 'CASCADE');

        $this->forge->createTable('peminjaman_masjid', true);
    }

    public function down()
    {
        $this->forge->dropTable('peminjaman_masjid', true);
    }
}
