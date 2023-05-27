<?php

namespace App\Controllers\Pages;

use App\Controllers\BaseController;
use App\Models\PeminjamanInventarisModel;

class AkunController extends BaseController
{
    protected $PeminjamanInventarisModel;
    protected $helpers = ['form', 'auth'];

    public function __construct()
    {
        $this->PeminjamanInventarisModel = new PeminjamanInventarisModel();
    }

    public function index()
    {
        $user_id = user_id();
        $daftar_peminjaman = $this->PeminjamanInventarisModel->getAllWithType(user_id());
        $data = [
            'title' => 'Halaman Akun - ' . user()->nama_lengkap,
            'daftar_peminjaman' => $daftar_peminjaman
        ];
        return view('pages/user/index', $data);
    }

    public function batal($id_peminjaman)
    {
        $data = [
            'title' => 'Akun Anda',
            'daftar_peminjaman' => $this->PeminjamanInventarisModel->getAll(),
            'status_peminjaman' => 'batal',
            'pesan' => esc($this->request->getvar('pesan'))
        ];
        $this->PeminjamanInventarisModel->update($id_peminjaman, $data);
        return redirect()->back();
    }
}
