<?php

namespace App\Controllers\Bendahara;

use App\Controllers\BaseController;

class AkunKeuanganController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Akun Keuangan - SIM BAIM'
        ];
        return view('bendahara/akunkeuangan/index', $data);
    }
}
