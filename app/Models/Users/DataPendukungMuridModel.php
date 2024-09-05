<?php

namespace App\Models\Users;

use CodeIgniter\Model;

class DataPendukungMuridModel extends Model
{
    protected $table            = 'data_pendukung_murid_table';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['peserta_didik_id', 'brosur', 'info_les', 'data'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
