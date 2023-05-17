<?php

namespace App\Controllers\Bendahara;

use App\Controllers\BaseController;

class AksesKeuanganController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Akses Keuangan - SIM BAIM'
        ];
        return view('bendahara/akseskeuangan/index', $data);
    }
}
