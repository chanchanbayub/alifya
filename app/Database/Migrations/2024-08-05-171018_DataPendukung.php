<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DataPendukung extends Migration
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

            'mitra_pengajar_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'pekerjaan' => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
            ],
            'pernyataan' => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
            ],
            'kontrak' => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
            ],
            'kendaraan_pribadi' => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
            ],
            'media_belajar' => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
            ],
            'alasan_bergabung' => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
            ],
            'kelebihan' => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
            ],
            'info_loker' => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
            ],
            'ijazah' => [
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
        $this->forge->addForeignKey('mitra_pengajar_id', 'data_pengajar_table', 'id', 'CASCADE', 'CASCADE');

        $this->forge->createTable('data_pendukung_table', false, $attributes);
    }

    public function down()
    {
        $this->forge->dropTable('data_pendukung_table');
    }
}
