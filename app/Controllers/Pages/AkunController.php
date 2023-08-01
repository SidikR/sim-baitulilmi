<?php

namespace App\Controllers\Pages;

use App\Controllers\BaseController;
use App\Models\PeminjamanInventarisModel;
use App\Models\PeminjamanMasjidModel;
use App\Models\AkunModel;
use Myth\Auth\Entities\User;
use \Myth\Auth\Password;
use \Myth\Auth\Authorization\GroupModel;

class AkunController extends BaseController
{
    protected $PeminjamanInventarisModel;
    protected $PeminjamanMasjidModel;
    protected $AkunModel;
    protected $helpers = ['form', 'auth'];
    protected $directoriImageDevelopment = "../public/assets/img/foto-user";
    protected $directoriImageProduction = "../../../public_html/baim/assets/img/foto-user";

    public function __construct()
    {
        $this->PeminjamanInventarisModel = new PeminjamanInventarisModel();
        $this->PeminjamanMasjidModel = new PeminjamanMasjidModel();
        $this->AkunModel = new AkunModel();
    }

    public function index()
    {
        $daftar_peminjaman = $this->PeminjamanInventarisModel->getAllWithType(user_id());
        $daftar_peminjaman_masjid = $this->PeminjamanMasjidModel->getAllWithType(user_id());
        // $dataUser = $this->AkunModel->getUserbyId(user_id());

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
        $data = [
            'title' => 'Akun Anda ',
            'username' => esc($this->request->getVar('username')),
            'nama_lengkap' => esc($this->request->getVar('nama_lengkap')),
            'nomor_hp' => esc($this->request->getVar('nomor_hp')),
            'jenis_kelamin' => esc($this->request->getVar('jenis_kelamin')),
            'alamat' => esc($this->request->getVar('alamat')),
        ];

        $this->AkunModel->update($id, $data);
        return redirect()->to('akun')->with('success', 'Data Berhasil di Update!');
    }

    public function update_foto($id)
    {
        // Ambil Gambar
        $gambar = $this->request->getFile('foto_user');

        //Ambil Nama Gambar
        $namaGambar = $gambar->getName('');

        $data = [
            'title' => 'Tambah inventaris',
            'foto_user' => $namaGambar,
            'validation' => \Config\Services::validation()
        ];

        if (empty($namaGambar)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Anda tidak Mengupload Gambar Apapun!  - Silakan Pilih Foto Anda');
        }
        $this->AkunModel->update($id, $data);
        if ($namaGambar != null) {
            //Menuliskan ke direktori
            if ($this->development) {
                $gambar->move(WRITEPATH . $this->directoriImageDevelopment, $namaGambar);
            } else {
                $gambar->move(WRITEPATH . $this->directoriImageProduction, $namaGambar);
            }
        }
        return redirect()->to('akun')->with('success', 'Foto Akun Anda Berhasil Diubah');
    }
}
