<?php

namespace App\Controllers\Users;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ProgramBelajarController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Program Belajar | Alifya Private',
        ];
        return view('users/program_belajar_v', $data);
    }
}
