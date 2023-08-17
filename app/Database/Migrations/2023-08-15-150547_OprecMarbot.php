<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class OprecMarbot extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pendaftaran'         => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'id_user'               => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'cv'                    => ['type' => 'varchar', 'constraint' => 100, 'null' => true],
            'created_at'            => ['type' => 'datetime', 'null' => true],
            'updated_at'            => ['type' => 'datetime', 'null' => true],
            'deleted_at'            => ['type' => 'datetime', 'null' => true],
        ]);

        $this->forge->addKey('id_pendaftaran', true);
        $this->forge->addForeignKey('id_user', 'users', 'id', 'CASCADE', 'CASCADE');

        $this->forge->createTable('oprec_marbot', true);
    }

    public function down()
    {
        //
        $this->forge->dropTable('oprec_marbot', true);
    }
}
