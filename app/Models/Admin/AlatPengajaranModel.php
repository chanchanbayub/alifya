<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class AlatPengajaranModel extends Model
{
    protected $table            = 'alat_pengajaran_table';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['materi_belajar_id', 'link'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getAlatPengajaran()
    {
        return $this->table($this->table)
            ->select("alat_pengajaran_table.id, alat_pengajaran_table.materi_belajar_id, alat_pengajaran_table.link, materi_belajar_table.level, materi_belajar_table.keterangan")
            ->join('materi_belajar_table', 'materi_belajar_table.id = alat_pengajaran_table.materi_belajar_id')
            ->orderBy('alat_pengajaran_table.id desc')
            ->get()->getResultObject();
    }
}
