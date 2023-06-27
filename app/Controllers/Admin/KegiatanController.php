<?php

namespace App\Controllers\Admin;

use CodeIgniter\Database\Database;
use App\Controllers\BaseController;
use App\Models\KegiatanModel;
use CodeIgniter\Commands\Utilities\Publish;
use CodeIgniter\Validation\Rules;
use Config\App;
use JetBrains\PhpStorm\Internal\ReturnTypeContract;


class KegiatanController extends BaseController
{
    protected $KegiatanModel;
    protected $helpers = ['form'];


    public function __construct()
    {
        $this->KegiatanModel = new KegiatanModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Kegiatan',
            'daftar_kegiatan' => $this->KegiatanModel->orderBy('waktu_mulai_kegiatan', 'DESC')->findAll(),
        ];

        return view('admin/kegiatan/index', $data);
    }


    // Tambah Data Kegiatan
    public function create()
    {
        $data = [
            'daftar_kegiatan' => $this->KegiatanModel->findAll(),
            'title' => 'Tambah Kegiatan',
            'validation' => \Config\Services::validation()
        ];

        return view('admin/kegiatan/create', $data);
    }

    public function save()
    {
        $id_max = $this->KegiatanModel->getMaxId() ?? 0;
        // Deklarasi Nailai Slug Kegiatan
        $slugy = url_title($this->request->getvar('nama_kegiatan'), '-', TRUE);
        $slug = $slugy . '-' . $id_max[0]->id_kegiatan + 1;

        // Ambil Gambar
        $gambar = $this->request->getFile('foto_kegiatan');

        //Ambil Nama Gambar
        $namaGambar = $gambar->getName('');

        // Simpan Data ke DataBase
        $data = [
            'daftar_kegiatan' => $this->KegiatanModel->findAll(),
            'title' => 'Tambah Kegiatan',
            'nama_kegiatan' => esc($this->request->getvar('nama_kegiatan')),
            'slug_kegiatan' => $slug,
            'waktu_mulai_kegiatan' => esc($this->request->getvar('waktu_mulai_kegiatan')),
            'waktu_berakhir_kegiatan' => esc($this->request->getvar('waktu_berakhir_kegiatan')),
            'penyelenggara_kegiatan' => esc($this->request->getvar('penyelenggara_kegiatan')),
            'tempat_kegiatan' => esc($this->request->getvar('tempat_kegiatan')),
            'deskripsi_kegiatan' => esc($this->request->getvar('deskripsi_kegiatan')),
            'foto_kegiatan' => $namaGambar,
            'validation' => \Config\Services::validation()
        ];

        $rules = $this->validate([
            'nama_kegiatan' => 'required',
            'waktu_mulai_kegiatan' => 'required',
            'waktu_berakhir_kegiatan' => 'required',
            'tempat_kegiatan' => 'required',
            'penyelenggara_kegiatan' => 'required',
            'deskripsi_kegiatan' => 'required'
        ]);

        if (!$rules) {
            session()->setFlashdata('failed', 'Data kegiatan gagal ditambahkan !');
            return view('admin/kegiatan/create', $data);
        } {
            $this->KegiatanModel->insert($data);
            //Menuliskan ke direktori
            $gambar->move(WRITEPATH . '../../public_html/baim/assets-admin/img/kegiatan', $namaGambar);
            return redirect()->to('/kegiatan')->with('success', 'Data Kegiatan Berhasil Ditambahkan');
        }
    }


    public function update($id_kegiatan)
    {
        $slugy = url_title($this->request->getvar('nama_kegiatan'), '-', TRUE);
        $slug = $slugy . '-' . $id_kegiatan;
        $data = [
            'nama_kegiatan' => esc($this->request->getvar('nama_kegiatan')),
            'slug_kegiatan' => $slug,
            'waktu_mulai_kegiatan' => esc($this->request->getvar('waktu_mulai_kegiatan')),
            'penyelenggara_kegiatan' => esc($this->request->getvar('penyelenggara_kegiatan')),
            'tempat_kegiatan' => esc($this->request->getvar('tempat_kegiatan')),
            'deskripsi_kegiatan' => esc($this->request->getvar('deskripsi_kegiatan')),
        ];
        $this->KegiatanModel->update($id_kegiatan, $data);
        return redirect()->to('kegiatan')->with('success', 'Data Kegiatan Berhasil Diubah');
    }

    public function form_update($slug_kegiatan)
    {

        $data = [
            'title' => "Edit Data Kegiatan",
            'daftar_kegiatan' => $this->KegiatanModel->getKegiatan($slug_kegiatan),
        ];

        if (empty($data['daftar_kegiatan'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama Kegiatan dengan slug : ' . $slug_kegiatan . ' tidak ditemukan !');
        }
        return view('admin/kegiatan/edit', $data);
    }


    public function update_foto($id_kegiatan)
    {
        // Ambil Gambar
        $gambar = $this->request->getFile('foto_kegiatan');

        //Ambil Nama Gambar
        $namaGambar = $gambar->getName('');

        $data = [
            'title' => 'Tambah Foto Kegiatan',
            'foto_kegiatan' => $namaGambar,
            'validation' => \Config\Services::validation()
        ];

        if (empty($namaGambar)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Anda tidak Mengupload Gambar Apapun!  - Silakan Pilih Foto Anda');
        }
        $this->KegiatanModel->update($id_kegiatan, $data);
        $gambar->move(WRITEPATH . '../../public_html/baim/assets-admin/img/kegiatan', $namaGambar);
        return redirect()->to('kegiatan')->with('success', 'Data Kegiatan Berhasil Diubah');
    }


    public function delete($id_kegiatan)
    {
        $this->KegiatanModel->where('id_kegiatan', $id_kegiatan)->delete();
        return redirect()->back()->with('success', 'Data Berhasil Dihapus');
    }



    public function detail($slug_kegiatan)
    {
        $data = [
            'title' => 'Detail Kegiatan',
            'kegiatan' => $this->KegiatanModel->getKegiatan($slug_kegiatan),
            'nama_kegiatan' => esc($this->request->getvar('nama_kegiatan'))
        ];

        if (empty($data['kegiatan'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama Kegiatan dengan slug : ' . $slug_kegiatan . ' tidak ditemukan !');
        }
        return view('admin/kegiatan/detail', $data);
    }
}
