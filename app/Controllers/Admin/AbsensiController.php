<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\AbsensiModel;
use App\Models\Admin\KelompokBelajarModel;
use App\Models\Admin\PengajarModel;
use CodeIgniter\HTTP\ResponseInterface;

class AbsensiController extends BaseController
{

    protected $pengajarModel;
    protected $validation;
    protected $kelompokBelajarModel;
    protected $absensiModel;

    public function __construct()
    {
        $this->pengajarModel = new PengajarModel();
        $this->absensiModel = new AbsensiModel();
        $this->validation = \Config\Services::validation();
        $this->kelompokBelajarModel = new KelompokBelajarModel();

        helper(['format']);
    }

    public function index()
    {
        $mitra_pengajar = $this->pengajarModel->getDataPengajarStatusAktif();

        $data = [
            'title' => 'Absensi Mitra',
            'absensi' => $this->absensiModel->getDataAbsensi(),
            'mitra_pengajar' => $mitra_pengajar,
        ];

        return view('admin/absensi_v', $data);
    }

    public function getPesertaDidik()
    {
        if ($this->request->isAJAX()) {

            $mitra_pengajar_id = $this->request->getVar('mitra_pengajar_id');

            $peserta_didik = $this->kelompokBelajarModel->getPesertaDidikWhereMitraPengajar($mitra_pengajar_id);

            $data = [
                'peserta_didik' => $peserta_didik
            ];

            return json_encode($data);
        }
    }

    public function insert()
    {
        if ($this->request->isAJAX()) {

            if (!$this->validate([
                'tanggal' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tanggal Tidak Boleh Kosong !'
                    ]
                ],
                'mitra_pengajar_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Mitra Pengajar Tidak Boleh Kosong !'
                    ]
                ],
                'peserta_didik_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Peserta Didik Tidak Boleh Kosong !'
                    ]
                ],
                'absen' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Absen Tidak Boleh Kosong !'
                    ]
                ],
                'keterangan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Upah Tidak Boleh Kosong !'
                    ]
                ],
                'pergantian_jadwal' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Upah Tidak Boleh Kosong !'
                    ]
                ],

            ])) {
                $alert = [
                    'error' => [
                        'tanggal' => $this->validation->getError('tanggal'),
                        'mitra_pengajar_id' => $this->validation->getError('mitra_pengajar_id'),
                        'peserta_didik_id' => $this->validation->getError('peserta_didik_id'),
                        'absen' => $this->validation->getError('absen'),
                        'keterangan' => $this->validation->getError('keterangan'),
                        'pergantian_jadwal' => $this->validation->getError('pergantian_jadwal'),

                    ]
                ];
            } else {

                $tanggal = $this->request->getPost('tanggal');
                $mitra_pengajar_id = $this->request->getPost('mitra_pengajar_id');
                $peserta_didik_id = $this->request->getPost('peserta_didik_id');
                $absen = $this->request->getPost('absen');
                $keterangan = $this->request->getPost('keterangan');
                $pergantian_jadwal = $this->request->getPost('pergantian_jadwal');

                $this->absensiModel->save([
                    'tanggal' => strtolower($tanggal),
                    'mitra_pengajar_id' => strtolower($mitra_pengajar_id),
                    'peserta_didik_id' => strtolower($peserta_didik_id),
                    'absen' => strtolower($absen),
                    'keterangan' => strtolower($keterangan),
                    'pergantian_jadwal' => strtolower($pergantian_jadwal),

                ]);

                $alert = [
                    'success' => 'Absensi Berhasil di Simpan !'
                ];
            }

            return json_encode($alert);
        }
    }

    public function edit()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');

            $harga = $this->hargaMitraModel->where(["id" => $id])->get()->getRowObject();

            $mitra_pengajar = $this->pengajarModel->getDataPengajarStatusAktif();

            $peserta_didik = $this->kelompokBelajarModel->getPesertaDidikWhereMitraPengajar($harga->mitra_pengajar_id);

            $data = [
                'harga_mitra' => $harga,
                'mitra_pengajar' => $mitra_pengajar,
                'murid' => $peserta_didik
            ];

            return json_encode($data);
        }
    }

    public function delete()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');

            $harga = $this->hargaMitraModel->where(["id" => $id])->first();

            $this->hargaMitraModel->delete($harga["id"]);

            $alert = [
                'success' => 'Upah Mitra Berhasil di Hapus !'
            ];

            return json_encode($alert);
        }
    }

    public function update()
    {
        if ($this->request->isAJAX()) {

            if (!$this->validate([
                'mitra_pengajar_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Upah Tidak Boleh Kosong !'
                    ]
                ],

                'peserta_didik_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Peserta Didik Tidak Boleh Kosong !'
                    ]
                ],
                'bulan_mitra' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Bulan Tidak Boleh Kosong !'
                    ]
                ],
                'harga_mitra' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Upah Tidak Boleh Kosong !'
                    ]
                ],

            ])) {
                $alert = [
                    'error' => [
                        'mitra_pengajar_id' => $this->validation->getError('mitra_pengajar_id'),
                        'peserta_didik_id' => $this->validation->getError('peserta_didik_id'),
                        'bulan_mitra' => $this->validation->getError('bulan_mitra'),
                        'harga_mitra' => $this->validation->getError('harga_mitra'),

                    ]
                ];
            } else {
                $id = $this->request->getPost('id');
                $mitra_pengajar_id = $this->request->getPost('mitra_pengajar_id');
                $peserta_didik_id = $this->request->getPost('peserta_didik_id');
                $bulan = $this->request->getPost('bulan_mitra');
                $harga = $this->request->getPost('harga_mitra');

                $this->hargaMitraModel->update($id, [
                    'mitra_pengajar_id' => strtolower($mitra_pengajar_id),
                    'peserta_didik_id' => strtolower($peserta_didik_id),
                    'bulan_mitra' => strtolower($bulan),
                    'harga_mitra' => strtolower($harga),

                ]);

                $alert = [
                    'success' => 'Upah Mitra Berhasil di Ubah !'
                ];
            }

            return json_encode($alert);
        }
    }
}
