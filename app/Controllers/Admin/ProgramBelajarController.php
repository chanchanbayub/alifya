<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\ProgramBelajarModel;
use CodeIgniter\HTTP\ResponseInterface;

class ProgramBelajarController extends BaseController
{
    protected $programBelajarModel;
    protected $validation;

    public function __construct()
    {
        $this->programBelajarModel = new ProgramBelajarModel();
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {

        $data = [
            'title' => 'Program Belajar',
            'program_belajar' => $this->programBelajarModel->getProgramBelajar()
        ];

        return view('admin/program_belajar_v', $data);
    }

    public function insert()
    {
        if ($this->request->isAJAX()) {

            if (!$this->validate([
                'nama_program' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama Program Tidak Boleh Kosong !'
                    ]
                ],
                'jumlah_pertemuan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Jumlah Pertemuan Tidak Boleh Kosong !'
                    ]
                ],
                'harga' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Harga Tidak Boleh Kosong !'
                    ]
                ],
                'banner' => [
                    'rules' => 'uploaded[banner]',
                    'errors' => [
                        'uploaded' => 'Banner Tidak Boleh Kosong !'
                    ]
                ],
            ])) {
                $alert = [
                    'error' => [
                        'nama_program' => $this->validation->getError('nama_program'),
                        'jumlah_pertemuan' => $this->validation->getError('jumlah_pertemuan'),
                        'harga' => $this->validation->getError('harga'),
                        'banner' => $this->validation->getError('banner'),
                    ]
                ];
            } else {

                $nama_program = $this->request->getPost('nama_program');
                $jumlah_pertemuan = $this->request->getPost('jumlah_pertemuan');
                $harga = $this->request->getPost('harga');
                $banner = $this->request->getFile('banner');

                $nama_foto = $banner->getRandomName();

                $this->programBelajarModel->save([
                    'nama_program' => strtolower($nama_program),
                    'jumlah_pertemuan' => strtolower($jumlah_pertemuan),
                    'harga' => strtolower($harga),
                    'banner' => strtolower($nama_foto),
                ]);

                $banner->move('banner', $nama_foto);

                $alert = [
                    'success' => 'Program Berhasil di Simpan !'
                ];
            }

            return json_encode($alert);
        }
    }

    public function edit()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');

            $program = $this->programBelajarModel->where(["id" => $id])->first();

            return json_encode($program);
        }
    }

    public function delete()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');

            $program = $this->programBelajarModel->where(["id" => $id])->first();

            $path_banner = 'banner/' . $program['banner'];


            $this->programBelajarModel->delete($program["id"]);

            $alert = [
                'success' => 'Program Belajar Berhasil di Hapus !'
            ];

            if ($program['banner'] != null) {
                if (file_exists($path_banner)) {
                    unlink($path_banner);
                }
            }

            return json_encode($alert);
        }
    }

    public function update()
    {
        if ($this->request->isAJAX()) {

            if (!$this->validate([

                'nama_program' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama Program Tidak Boleh Kosong !'
                    ]
                ],
                'jumlah_pertemuan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Jumlah Pertemuan Tidak Boleh Kosong !'
                    ]
                ],
                'harga' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Harga Tidak Boleh Kosong !'
                    ]
                ],
                'banner' => [
                    'rules' => 'uploaded[banner]',
                    'errors' => [
                        'uploaded' => 'Banner Tidak Boleh Kosong !'
                    ]
                ],
            ])) {
                $alert = [
                    'error' => [
                        'nama_program' => $this->validation->getError('nama_program'),
                        'jumlah_pertemuan' => $this->validation->getError('jumlah_pertemuan'),
                        'harga' => $this->validation->getError('harga'),
                        'banner' => $this->validation->getError('banner'),
                    ]
                ];
            } else {

                $id = $this->request->getPost('id');
                $banner_lama = $this->request->getPost('banner_lama');
                $nama_program = $this->request->getPost('nama_program');
                $jumlah_pertemuan = $this->request->getPost('jumlah_pertemuan');
                $harga = $this->request->getPost('harga');

                $path_lama = 'banner/' . $banner_lama;

                $banner = $this->request->getFile('banner');

                if ($banner->getError() == 4) {
                    $nama_foto = $banner_lama;
                } else {
                    if (file_exists($path_lama)) {
                        unlink($path_lama);
                    }
                    $nama_foto = $banner->getRandomName();
                    $banner->move('banner', $nama_foto);
                }

                $this->programBelajarModel->update($id, [
                    'nama_program' => strtolower($nama_program),
                    'jumlah_pertemuan' => strtolower($jumlah_pertemuan),
                    'harga' => strtolower($harga),
                    'banner' => strtolower($nama_foto),

                ]);

                $alert = [
                    'success' => 'Program Belajar Berhasil di Update !'
                ];
            }

            return json_encode($alert);
        }
    }
}
