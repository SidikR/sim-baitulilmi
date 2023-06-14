<?php

namespace App\Controllers\Pages;

use App\Controllers\BaseController;
use App\Models\KegiatanModel;

class KegiatanController extends BaseController
{

    protected $KegiatanModel;
    protected $helpers = ['form', 'auth'];


    public function __construct()
    {
        $this->KegiatanModel = new KegiatanModel();
    }


    public function index()
    {
        $data = [
            'title' => 'Kegiatan Masjid',
            'daftar_kegiatan' => $this->KegiatanModel->orderBy('waktu_mulai_kegiatan', 'DESC')->findAll(),
        ];

        return view('pages/kegiatan/index', $data);
    }

    public function detail($slug_kegiatan)
    {
        $data = [
            'title' => 'Detail Kegiatan',
            'kegiatan' => $this->KegiatanModel->getKegiatan($slug_kegiatan),
        ];

        if (empty($data['kegiatan'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama Kegiatan dengan slug : ' . $slug_kegiatan . ' tidak ditemukan !');
        }
        return view('pages/kegiatan/detail', $data);
    }
}
