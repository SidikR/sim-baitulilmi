<?php

namespace App\Controllers\Pages;

use App\Controllers\BaseController;
use App\Models\PengurusModel;

class PengurusController extends BaseController
{

    protected $PengurusModel;
    protected $helpers = ['form', 'auth'];


    public function __construct()
    {
        $this->PengurusModel = new PengurusModel();
    }


    public function index()
    {
        $data = [
            'title' => 'Pengurus Masjid',
            'daftar_pengurus' => $this->PengurusModel->orderBy('id_pengurus', 'DESC')->findAll(),
        ];

        return view('pages/pengurus/index', $data);
    }

    public function detail($slug_pengurus)
    {
        $data = [
            'title' => 'Detail Pengurus',
            'pengurus' => $this->PengurusModel->getPengurus($slug_pengurus),
        ];

        if (empty($data['pengurus'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama Pengurus dengan slug : ' . $slug_pengurus . ' tidak ditemukan !');
        }
        return view('pages/pengurus/detail', $data);
    }
}
