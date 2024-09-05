<?php

namespace App\Models\Users;

use CodeIgniter\Model;

class DataPendukungModel extends Model
{
    protected $table            = 'data_pendukung_table';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['mitra_pengajar_id',  'pekerjaan', 'kontrak', 'pernyataan', 'kendaraan_pribadi', 'media_belajar', 'alasan_bergabung', 'kelebihan', 'info_loker', 'ijazah'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
