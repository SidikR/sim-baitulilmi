<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Feedback extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => '11',
                'auto_increment' => true,
            ],
            'nama' => [
                'type'           => 'Varchar',
                'constraint'     => '100',
            ],
            'no_telepon' => [
                'type'       => 'varchar',
                'constraint' => '15',
            ],
            'email' => [
                'type'           => 'Varchar',
                'constraint'     => '100',
            ],
            'subject' => [
                'type'           => 'Varchar',
                'constraint'     => '100',
            ],
            'feedback' => [
                'type'           => 'Varchar',
                'constraint'     => '225',
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
        $this->forge->createTable('feedback');
    }

    public function down()
    {
        $this->forge->dropTable('feedback');
    }
}
