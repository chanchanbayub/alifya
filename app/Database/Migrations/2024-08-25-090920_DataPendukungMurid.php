<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DataPendukungMurid extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],

            'peserta_didik_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'brosur' => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
            ],
            'info_les' => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
            ],
            'data' => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
            ],

            'created_at' => [
                'type' => 'datetime',

            ],
            'updated_at' => [
                'type' => 'datetime',

            ],
        ]);
        $this->forge->addKey('id', true);
        $attributes = ['ENGINE' => 'InnoDB'];
        $this->forge->addForeignKey('peserta_didik_id', 'data_murid_table', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('data_pendukung_murid_table', false, $attributes);
    }

    public function down()
    {
        $this->forge->createTable('data_pendukung_murid_table');
    }
}
