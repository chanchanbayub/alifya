<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class PengajarModel extends Model
{
    protected $table            = 'data_pengajar_table';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['uid', 'nama_lengkap', 'email', 'usia', 'alamat_domisili', 'pendidikan_terakhir', 'jurusan', 'status_perkawinan', 'nomor_whatsapp', 'username_instagram', 'foto', 'cv', 'status_id'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getDataPengajar()
    {
        return $this->table($this->table)
            ->select("data_pengajar_table.id, data_pengajar_table.uid, data_pengajar_table.nama_lengkap, data_pengajar_table.email, data_pengajar_table.usia, data_pengajar_table.alamat_domisili, data_pengajar_table.pendidikan_terakhir, data_pengajar_table.jurusan, status_perkawinan, data_pengajar_table.nomor_whatsapp, data_pengajar_table.username_instagram, data_pengajar_table.foto, data_pengajar_table.cv, data_pengajar_table.status_id, status_pengajar_table.status_pengajar")
            ->join('status_pengajar_table', 'status_pengajar_table.id = data_pengajar_table.status_id')
            ->orderBy('id desc')
            ->get()->getResultObject();
    }

    public function getMitraPengajarWithId($id)
    {
        return $this->table($this->table)
            ->select("data_pengajar_table.id, data_pengajar_table.uid, data_pengajar_table.nama_lengkap, data_pengajar_table.email, data_pengajar_table.usia, data_pengajar_table.alamat_domisili, data_pengajar_table.pendidikan_terakhir, data_pengajar_table.jurusan, status_perkawinan, data_pengajar_table.nomor_whatsapp, data_pengajar_table.username_instagram, data_pengajar_table.foto, data_pengajar_table.cv, data_pengajar_table.status_id, status_pengajar_table.status_pengajar")
            ->join('status_pengajar_table', 'status_pengajar_table.id = data_pengajar_table.status_id')
            ->where(["data_pengajar_table.id" => $id])
            ->orderBy('id desc')
            ->get()->getRowObject();
    }

    public function getMitraPengajar($email)
    {
        return $this->table($this->table)
            ->select("data_pengajar_table.id, data_pengajar_table.uid, data_pengajar_table.nama_lengkap, data_pengajar_table.email, data_pengajar_table.usia, data_pengajar_table.alamat_domisili, data_pengajar_table.pendidikan_terakhir, data_pengajar_table.jurusan, status_perkawinan, data_pengajar_table.nomor_whatsapp, data_pengajar_table.username_instagram, data_pengajar_table.foto, data_pengajar_table.cv, data_pengajar_table.status_id, status_pengajar_table.status_pengajar, data_pendukung_table.ijazah, data_pendukung_table.pekerjaan, data_pendukung_table.pernyataan,data_pendukung_table.kontrak, data_pendukung_table.kendaraan_pribadi, data_pendukung_table.media_belajar,data_pendukung_table.alasan_bergabung,data_pendukung_table.kelebihan,data_pendukung_table.info_loker")
            ->join('status_pengajar_table', 'status_pengajar_table.id = data_pengajar_table.status_id')
            ->join('data_pendukung_table', 'data_pendukung_table.mitra_pengajar_id = data_pengajar_table.id', 'left')
            ->where(["data_pengajar_table.email" => $email])
            ->orderBy('id desc')
            ->get()->getRowObject();
    }


    public function getDataPengajarStatusWaiting()
    {
        return $this->table($this->table)
            ->select("data_pengajar_table.id, data_pengajar_table.uid, data_pengajar_table.nama_lengkap, data_pengajar_table.email, data_pengajar_table.usia, data_pengajar_table.alamat_domisili, data_pengajar_table.pendidikan_terakhir, data_pengajar_table.jurusan, status_perkawinan, data_pengajar_table.nomor_whatsapp, data_pengajar_table.username_instagram, data_pengajar_table.foto, data_pengajar_table.cv, data_pengajar_table.status_id, status_pengajar_table.status_pengajar")
            ->join('status_pengajar_table', 'status_pengajar_table.id = data_pengajar_table.status_id')
            ->where(["data_pengajar_table.status_id" => 2])
            ->orderBy('id desc')
            ->get()->getResultObject();
    }

    public function getDataPengajarStatusAktif()
    {
        return $this->table($this->table)
            ->select("data_pengajar_table.id, data_pengajar_table.uid, data_pengajar_table.nama_lengkap, data_pengajar_table.email, data_pengajar_table.usia, data_pengajar_table.alamat_domisili, data_pengajar_table.pendidikan_terakhir, data_pengajar_table.jurusan, status_perkawinan, data_pengajar_table.nomor_whatsapp, data_pengajar_table.username_instagram, data_pengajar_table.foto, data_pengajar_table.cv, data_pengajar_table.status_id, status_pengajar_table.status_pengajar")
            ->join('status_pengajar_table', 'status_pengajar_table.id = data_pengajar_table.status_id')
            ->where(["data_pengajar_table.status_id" => 1])
            ->orderBy('id desc')
            ->get()->getResultObject();
    }

    public function getPengajarIDTerakhir()
    {
        return $this->table($this->table)
            ->select("data_pengajar_table.id")
            ->orderBy('id desc')
            ->get()->getRowObject();
    }
}
