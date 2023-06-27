<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\InventarisModel;
use CodeIgniter\Database\Database;
use CodeIgniter\Validation\Rules;

class InventarisController extends BaseController
{
    protected $InventarisModel;
    protected $helpers = ['form'];

    public function __construct()
    {
        $this->InventarisModel = new InventarisModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Inventaris BAIM',
            'daftar_inventaris' => $this->InventarisModel->orderBy('created_at', 'DESC')->findAll()
        ];
        return view('admin/inventaris/index', $data);
    }

    // Fungsi Untuk Membuka Halaman Create/Tambah

    // Fungsi Tambah Data inventaris
    public function create()
    {
        $data = [
            'title' => 'Tambah Inventaris',
            'validation' => \Config\Services::validation(),
        ];

        return view('admin/inventaris/create', $data);
    }

    // Fungsi Simpan 
    public function save()
    {
        // Deklarasi Nailai Slug Jabatan
        $slug = url_title($this->request->getvar('nama_inventaris'), '-', TRUE);

        // Deklarasi Tabel Jabatan
        $daftar_inventaris = $this->InventarisModel->orderBy('created_at', 'DESC')->findAll();

        // Ambil Gambar
        $gambar = $this->request->getFile('foto_inventaris');

        //Ambil Nama Gambar
        $namaGambar = $gambar->getName('');


        // Simpan Data ke DataBase
        $data = [
            'title' => 'Tambah inventaris',
            'nama_inventaris' => esc($this->request->getvar('nama_inventaris')),
            'asal_inventaris' => esc($this->request->getvar('asal_inventaris')),
            'deskripsi_inventaris' => esc($this->request->getvar('deskripsi_inventaris')),
            'stok_inventaris' => esc($this->request->getvar('stok_inventaris')),
            'slug_inventaris' => $slug,
            'foto_inventaris' => $namaGambar,
            'validation' => \Config\Services::validation(),
            'daftar_inventaris' => $daftar_inventaris
        ];

        $rules = $this->validate([
            'nama_inventaris' => 'required',
            'asal_inventaris' => 'required',
            'deskripsi_inventaris' => 'required',
            'stok_inventaris' => 'required'
        ]);

        if (!$rules) {
            session()->setFlashdata('failed', 'Data inventaris gagal ditambahkan !');
            return view('admin/inventaris/create', $data);
        } {
            $this->InventarisModel->insert($data);
            //Menuliskan ke direktori
            $gambar->move(WRITEPATH . '../../public_html/baim/assets-admin/img/foto-inventaris', $namaGambar);
            return redirect()->to('/inventaris')->with('success', 'Data inventaris Berhasil Ditambahkan');
        }
    }

    public function delete($id_inventaris)
    {
        $this->InventarisModel->join('akuninventaris', 'akuninventaris.id_akuninventaris = inventaris.id_akuninventaris')->join('aksesinventaris', 'aksesinventaris.id_aksesinventaris = inventaris.id_aksesinventaris')->where('id_inventaris', $id_inventaris)->delete();
        return redirect()->back()->with('success', 'Data Berhasil Dihapus');
    }



    public function detail($slug_inventaris)
    {

        $data = [
            'title' => 'Detail inventaris',
            'daftar_inventaris' => $this->InventarisModel->getInventaris($slug_inventaris)
        ];

        if (empty($data['daftar_inventaris'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama inventaris dengan slug : ' . $slug_inventaris . ' tidak ditemukan !');
        }
        return view('admin/inventaris/detail', $data);
    }


    public function form_update($slug_inventaris)
    {

        $data = [
            'title' => "Edit Data inventaris",
            'daftar_inventaris' => $this->InventarisModel->getInventaris($slug_inventaris),
            'validation' => \Config\Services::validation()
        ];

        if (empty($data['daftar_inventaris'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama inventaris dengan slug : ' . $slug_inventaris . ' tidak ditemukan !');
        }
        return view('admin/inventaris/edit', $data);
    }


    public function update($id_inventaris)
    {
        $slug = url_title($this->request->getvar('nama_inventaris'), '-', TRUE);
        $data = [
            'title' => 'Tambah inventaris',
            'nama_inventaris' => esc($this->request->getvar('nama_inventaris')),
            'asal_inventaris' => esc($this->request->getvar('asal_inventaris')),
            'deskripsi_inventaris' => esc($this->request->getvar('deskripsi_inventaris')),
            'stok_inventaris' => esc($this->request->getvar('stok_inventaris')),
            'slug_inventaris' => $slug,
            'validation' => \Config\Services::validation()
        ];

        $this->InventarisModel->update($id_inventaris, $data);
        return redirect()->to('inventaris')->with('success', 'Data Inventaris Berhasil Diubah');
    }

    public function update_foto($id_inventaris)
    {
        // Ambil Gambar
        $gambar = $this->request->getFile('foto_inventaris');

        //Ambil Nama Gambar
        $namaGambar = $gambar->getName('');

        $data = [
            'title' => 'Tambah inventaris',
            'foto_inventaris' => $namaGambar,
            'validation' => \Config\Services::validation()
        ];

        if (empty($namaGambar)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Anda tidak Mengupload Gambar Apapun!  - Silakan Pilih Foto Anda');
        }
        $this->InventarisModel->update($id_inventaris, $data);
        $gambar->move(WRITEPATH . '../../public_html/baim/assets-admin/img/foto-inventaris', $namaGambar);
        return redirect()->to('inventaris')->with('success', 'Data Inventaris Berhasil Diubah');
    }
}
