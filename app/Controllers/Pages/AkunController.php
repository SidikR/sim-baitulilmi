<?php

namespace App\Controllers\Pages;

use App\Controllers\BaseController;
use App\Models\PeminjamanInventarisModel;
use App\Models\PeminjamanMasjidModel;

class AkunController extends BaseController
{
    protected $PeminjamanInventarisModel;
    protected $PeminjamanMasjidModel;
    protected $helpers = ['form', 'auth'];

    public function __construct()
    {
        $this->PeminjamanInventarisModel = new PeminjamanInventarisModel();
        $this->PeminjamanMasjidModel = new PeminjamanMasjidModel();
    }

    public function index()
    {
        $user_id = user_id();
        $daftar_peminjaman = $this->PeminjamanInventarisModel->getAllWithType(user_id());
        $daftar_peminjaman_masjid = $this->PeminjamanMasjidModel->getAllWithType(user_id());
        $data = [
            'title' => 'Halaman Akun - ' . user()->nama_lengkap,
            'daftar_peminjaman' => $daftar_peminjaman,
            'daftar_peminjaman_masjid' => $daftar_peminjaman_masjid
        ];
        return view('pages/user/index', $data);
    }

    public function batal_inventaris($id_peminjaman)
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

    public function batal_masjid($id_peminjaman)
    {
        $data = [
            'title' => 'Akun Anda',
            'daftar_peminjaman' => $this->PeminjamanMasjidModel->getAll(),
            'status_peminjaman' => 'batal',
            'pesan' => esc($this->request->getvar('pesan'))
        ];
        $this->PeminjamanMasjidModel->update($id_peminjaman, $data);
        return redirect()->back();
    }
}
