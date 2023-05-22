<?php

namespace App\Controllers\Admin;

use CodeIgniter\Database\Database;
use App\Controllers\BaseController;
use CodeIgniter\Commands\Utilities\Publish;
use CodeIgniter\Validation\Rules;
use Config\App;
use JetBrains\PhpStorm\Internal\ReturnTypeContract;
use App\Models\PeminjamanInventarisModel;
use App\Models\InventarisModel;


class PeminjamanController extends BaseController
{
    protected $PeminjamanInventarisModel;
    protected $InventarisModel;
    protected $helpers = ['form', 'auth'];


    public function __construct()
    {
        $this->PeminjamanInventarisModel = new PeminjamanInventarisModel();
        $this->InventarisModel = new InventarisModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Peminjaman',
            'daftar_peminjaman_inventaris' => $this->PeminjamanInventarisModel->orderBy('id_peminjaman', 'DESC')->getAll(),
            // 'validation' => \Config\Services::validation()
        ];

        return view('admin/peminjaman/index', $data);
    }

    public function accept($id_peminjaman)
    {
        $dpi = $this->PeminjamanInventarisModel->getPeminjaman($id_peminjaman);
        $stok = $dpi->stok_inventaris;
        $qty1 = $dpi->qty;
        $temp = $stok - $qty1;
        $data = [
            // 'daftar_peminjaman_inventaris' => $dpi,
            'status_peminjaman' => 'accepted',
            'stok_inventaris' => $temp
        ];

        $this->PeminjamanInventarisModel->update($id_peminjaman, $data);
        $this->InventarisModel->update($id_peminjaman, $data);
        return redirect()->back();
    }

    public function done($id_peminjaman)
    {
        $dpi = $this->PeminjamanInventarisModel->getPeminjaman($id_peminjaman);
        $stok = $dpi->stok_inventaris;
        $qty1 = $dpi->qty;
        $temp = $stok + $qty1;
        $data = [
            'daftar_peminjaman_inventaris' => $this->PeminjamanInventarisModel->orderBy('id_peminjaman', 'DESC')->getAll(),
            'status_peminjaman' => 'done',
            'stok_inventaris' => $temp
        ];

        $this->PeminjamanInventarisModel->update($id_peminjaman, $data);
        $this->InventarisModel->update($id_peminjaman, $data);
        return redirect()->back();
    }

    // // Tambah Data Pengurus
    // public function create()
    // {
    //     $daftar_jabatan = $this->JabatanModel->findAll();
    //     $data = [
    //         'daftar_pengurus' => $this->PengurusModel->orderBy('id_pengurus', 'DESC')->getAll(),
    //         'title' => 'Tambah Pengurus',
    //         'validation' => \Config\Services::validation(),
    //         'daftar_jabatan' => $daftar_jabatan
    //     ];

    //     return view('admin/pengurus/create', $data);
    // }



    // public function save()
    // {
    //     // $daftar_jabatan = $this->JabatanModel->findAll();
    //     $uuid4 = Uuid::uuid4();
    //     $id_pengurus = $uuid4->toString();

    //     // Deklarasi Nailai Slug Pengurus
    //     $slug = url_title($this->request->getvar('nama_lengkap'), '-', TRUE);

    //     // Ambil Gambar
    //     $gambar = $this->request->getFile('foto_pengurus');

    //     //Ambil Nama Gambar
    //     $namaGambar = $gambar->getName('');

    //     //Menuliskan ke direktori
    //     $gambar->move(WRITEPATH . '../public/assets-admin/img/pengurus', $namaGambar);

    //     // Simpan Data ke DataBase
    //     $data = [
    //         'daftar_pengurus' => $this->PengurusModel->orderBy('id_pengurus', 'DESC')->getAll(),
    //         'daftar_jabatan' => $this->JabatanModel->orderBy('id_jabatan', 'DESC')->findAll(),
    //         'title' => 'Tambah Pengurus',
    //         'id_pengurus' => $id_pengurus,
    //         'nama_lengkap' => esc($this->request->getvar('nama_lengkap')),
    //         'slug_pengurus' => $slug,
    //         'jenis_kelamin' => esc($this->request->getvar('jenis_kelamin')),
    //         'id_jabatan' => esc($this->request->getvar('nama_jabatan')),
    //         'nomor_telepon' => esc($this->request->getvar('nomor_telepon')),
    //         'alamat_pengurus' => esc($this->request->getvar('alamat_pengurus')),
    //         'foto_pengurus' => $namaGambar,
    //         'validation' => \Config\Services::validation()
    //     ];

    //     $rules = $this->validate([
    //         'nama_lengkap' => 'required',
    //         'jenis_kelamin' => 'required',
    //         'nomor_telepon' => 'required',
    //         'nama_jabatan' => 'required',
    //         'alamat_pengurus' => 'required'
    //     ]);

    //     if (!$rules) {
    //         session()->setFlashdata('failed', 'Data pengurus gagal ditambahkan !');
    //         return view('admin/pengurus/create', $data);
    //     } {
    //         $this->PengurusModel->insert($data);
    //         return redirect()->to('/pengurus')->with('success', 'Data Pengurus Berhasil Ditambahkan');
    //     }
    // }


    // public function update($id_pengurus)
    // {
    //     // Ambil Gambar
    //     $gambar = $this->request->getFile('foto_pengurus');

    //     //Ambil Nama Gambar
    //     $namaGambar = $gambar->getName();

    //     //Menuliskan ke direktori
    //     $gambar->move(WRITEPATH . '../public/assets-admin/img/pengurus', $namaGambar);
    //     $slug = url_title($this->request->getvar('nama_lengkap'), '-', TRUE);
    //     //$daftar_pengurus = $this->pengurusModel->getPengurus($slug_pengurus);
    //     $data = [
    //         'nama_lengkap' => esc($this->request->getvar('nama_lengkap')),
    //         'slug_pengurus' => $slug,
    //         'jenis_kelamin' => esc($this->request->getvar('jenis_kelamin')),
    //         'nomor_telepon' => esc($this->request->getvar('nomor_telepon')),
    //         'alamat_pengurus' => esc($this->request->getvar('alamat_pengurus')),
    //         'foto_pengurus' => $namaGambar
    //     ];
    //     $this->PengurusModel->update($id_pengurus, $data);
    //     // $this->PengurusModel->save($data);
    //     return redirect()->back()->with('success', 'Data Pengurus Berhasil Diubah');
    // }

    // public function form_update($slug_pengurus)
    // {
    //     $daftar_pengurus = $this->PengurusModel->getPengurus($slug_pengurus);

    //     $data = [
    //         'title' => "Edit Data Pengurus",
    //         'daftar_pengurus' => $this->PengurusModel->getPengurus($slug_pengurus),
    //     ];

    //     if (empty($data['daftar_pengurus'])) {
    //         throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama Pengurus dengan slug : ' . $slug_pengurus . ' tidak ditemukan !');
    //     }
    //     return view('admin/pengurus/edit', $data);
    // }


    // public function delete($id_pengurus)
    // {
    //     $this->PengurusModel->where('id_pengurus', $id_pengurus)->delete();
    //     return redirect()->back()->with('success', 'Data Berhasil Dihapus');
    // }



    // public function detail($slug_pengurus)
    // {
    //     $pengurus = $this->PengurusModel->getPengurus($slug_pengurus);
    //     $data = [
    //         'title' => 'Detail Pengurus',
    //         'pengurus' => $this->PengurusModel->getPengurus($slug_pengurus),
    //         'nama_lengkap' => esc($this->request->getvar('nama_lengkap'))
    //     ];

    //     if (empty($data['pengurus'])) {
    //         throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama Pengurus dengan slug : ' . $slug_pengurus . ' tidak ditemukan !');
    //     }
    //     return view('admin/pengurus/detail', $data);
    // }
}
