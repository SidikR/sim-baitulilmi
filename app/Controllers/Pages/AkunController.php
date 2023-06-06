<?php

namespace App\Controllers\Pages;

use App\Controllers\BaseController;
use App\Models\PeminjamanInventarisModel;
use App\Models\PeminjamanMasjidModel;
// use App\Models\UserModel;
use Myth\Auth\Models\UserModel;
use Myth\Auth\Entities\User;
use \Myth\Auth\Password;
use \Myth\Auth\Authorization\GroupModel;

class AkunController extends BaseController
{
    protected $PeminjamanInventarisModel;
    protected $PeminjamanMasjidModel;
    protected $UserModel;
    protected $helpers = ['form', 'auth'];

    public function __construct()
    {
        $this->PeminjamanInventarisModel = new PeminjamanInventarisModel();
        $this->PeminjamanMasjidModel = new PeminjamanMasjidModel();
        $UserModel = new UserModel();
        // $this->UserModel = new UserModel();
    }

    public function index()
    {
        $user_id = user_id();
        $daftar_peminjaman = $this->PeminjamanInventarisModel->getAllWithType(user_id());
        $daftar_peminjaman_masjid = $this->PeminjamanMasjidModel->getAllWithType(user_id());
        // $dataUser = $this->userModel->getUserbyId(user_id());

        // dd($dataUser);
        // $dataUser = $this->userModel->findAll();
        // dd($dataUser);
        $data = [
            'title' => 'Halaman Akun - ' . user()->nama_lengkap,
            'daftar_peminjaman' => $daftar_peminjaman,
            'daftar_peminjaman_masjid' => $daftar_peminjaman_masjid,
            // 'dataUser' => $dataUser
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

    public function update($id)
    {

        // $userModel = new UserModel();
        $user = $this->UserModel->find($id);

        $data = [
            'title' => 'Akun Anda',
            'username' => esc($this->request->getVar('username')),
            'nama_lengkap' => esc($this->request->getVar('nama_lengkap')),
            'nomor_hp' => esc($this->request->getVar('nomor_hp')),
            'jenis_kelamin' => esc($this->request->getVar('jenis_kelamin')),
            'alamat' => esc($this->request->getVar('alamat')),
        ];

        $this->UserModel->update($id, $data);
        return redirect()->to('akun')->with('success', 'Data Berhasil di Update!');
    }
}
