<?php

namespace App\Controllers\Pages;

use App\Controllers\BaseController;
use App\Models\KeuanganModel;

class GuestKeuanganController extends BaseController
{
    protected $KeuanganModel;
    protected $helpers = ['form', 'auth'];

    public function __construct()
    {
        $this->KeuanganModel = new KeuanganModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Transparansi Keuangan',
            'daftar_keuangan' => $this->KeuanganModel->orderBy('created_at', 'DESC')->getAll()
        ];
        return view('pages/keuangan', $data);
    }
}
