<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DataMuridTable extends Migration
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

            'uid_murid' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true
            ],

            'nama_lengkap_anak' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],

            'tanggal_lahir_anak' => [
                'type'       => 'date',
            ],

            'usia_anak' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],

            'alamat_domisili_anak' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],

            'sekolah_anak' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],

            'nomor_whatsapp_wali' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],

            'username_instagram_wali' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],

            'program_belajar_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],

            'materi_belajar_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],

            'hari_belajar' => [
                'type'           => 'varchar',
                'constraint'     => 255,
            ],

            'waktu_belajar' => [
                'type'           => 'varchar',
                'constraint'     => 255,
            ],

            'foto_anak' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],

            'status_murid_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
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
        $this->forge->addForeignKey('status_murid_id', 'status_murid_table', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('program_belajar_id', 'program_belajar_table', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('materi_belajar_id', 'materi_belajar_table', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('data_murid_table', false, $attributes);
    }

    public function down()
    {
        $this->forge->dropTable('data_murid_table');
    }
}
