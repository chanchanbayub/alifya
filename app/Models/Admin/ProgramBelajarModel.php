<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class ProgramBelajarModel extends Model
{
    protected $table            = 'program_belajar_table';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['nama_program', 'jumlah_pertemuan', 'harga', 'banner'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getProgramBelajar()
    {
        return $this->table($this->table)
            ->orderBy('id desc')
            ->get()->getResultObject();
    }
}
