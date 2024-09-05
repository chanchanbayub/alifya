<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\AlatPengajaranModel;
use App\Models\Admin\MateriBelajarModel;
use CodeIgniter\HTTP\ResponseInterface;

class AlatPengajaranController extends BaseController
{
    protected $materiBelajarModel;
    protected $alatPengajaranModel;
    protected $validation;


    public function __construct()
    {
        $this->materiBelajarModel = new MateriBelajarModel();
        $this->alatPengajaranModel = new AlatPengajaranModel();
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {

        $data = [
            'title' => 'Alat Pengajaran',
            'materi_belajar' => $this->materiBelajarModel->getMateriBelajar(),
            'alat_pengajaran' => $this->alatPengajaranModel->getAlatPengajaran()
        ];

        return view('admin/alat_pengajar_v', $data);
    }

    public function insert()
    {
        if ($this->request->isAJAX()) {

            if (!$this->validate([
                'materi_belajar_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Materi Belajar Tidak Boleh Kosong !'
                    ]
                ],
                'link' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'link Tidak Boleh Kosong !'
                    ]
                ],
            ])) {
                $alert = [
                    'error' => [
                        'materi_belajar_id' => $this->validation->getError('materi_belajar_id'),
                        'link' => $this->validation->getError('link'),
                    ]
                ];
            } else {

                $materi_belajar_id = $this->request->getPost('materi_belajar_id');
                $link = $this->request->getPost('link');

                $this->alatPengajaranModel->save([
                    'materi_belajar_id' => strtolower($materi_belajar_id),
                    'link' => $link
                    // 'link' => mysqli_real($link),
                ]);

                $alert = [
                    'success' => 'Alat Pengajaran Berhasil di Simpan !'
                ];
            }

            return json_encode($alert);
        }
    }

    public function edit()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');

            $alat_pengajaran = $this->alatPengajaranModel->where(["id" => $id])->first();

            $materi_belajar = $this->materiBelajarModel->getMateriBelajar();

            $data = [
                'alat_pengajaran' => $alat_pengajaran,
                'materi_belajar' => $materi_belajar
            ];

            return json_encode($data);
        }
    }

    public function delete()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');

            $alat_pengajaran = $this->alatPengajaranModel->where(["id" => $id])->first();

            $this->alatPengajaranModel->delete($alat_pengajaran["id"]);

            $alert = [
                'success' => 'Alat Pengajar Berhasil di Hapus !'
            ];

            return json_encode($alert);
        }
    }

    public function update()
    {
        if ($this->request->isAJAX()) {

            if (!$this->validate([

                'materi_belajar_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Level Tidak Boleh Kosong !'
                    ]
                ],
                'link' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'link Tidak Boleh Kosong !'
                    ]
                ],
            ])) {
                $alert = [
                    'error' => [
                        'materi_belajar_id' => $this->validation->getError('materi_belajar_id'),
                        'link' => $this->validation->getError('link'),
                    ]
                ];
            } else {

                $id = $this->request->getPost('id');
                $materi_belajar_id = $this->request->getPost('materi_belajar_id');
                $link = $this->request->getPost('link');

                $this->alatPengajaranModel->update($id, [
                    'materi_belajar_id' => strtolower($materi_belajar_id),
                    'link' => $link,
                ]);

                $alert = [
                    'success' => 'Alat Pengajar Berhasil di Update !'
                ];
            }

            return json_encode($alert);
        }
    }
}
