<?php

namespace App\Controllers\Mitra;

use App\Controllers\BaseController;
use App\Models\Mitra\KelompokModel;
use CodeIgniter\HTTP\ResponseInterface;

class DashboardController extends BaseController
{

    protected $kelompokModel;

    public function __construct()
    {
        $this->kelompokModel = new KelompokModel();
    }

    public function index()
    {
        $peserta_didik = $this->kelompokModel->getKelompokPengajarWithMitraPengajar(session()->get('mitra_pengajar_id'));
        $data = [
            'title' => 'Dashboard Mitra Pengajar',
            'peserta_didik' => count($peserta_didik),
        ];
        return view('mitra/dashboard_mitra_v', $data);
    }
}
