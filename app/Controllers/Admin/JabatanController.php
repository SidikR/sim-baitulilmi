<?php

namespace App\Controllers\Admin;

use CodeIgniter\Database\Database;
use App\Controllers\BaseController;
use App\Models\JabatanModel;
use CodeIgniter\Commands\Utilities\Publish;
use CodeIgniter\Validation\Rules;
use Config\App;
use JetBrains\PhpStorm\Internal\ReturnTypeContract;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;


class JabatanController extends BaseController
{
    protected $JabatanModel;
    protected $helpers = ['form'];


    public function __construct()
    {
        $this->JabatanModel = new JabatanModel();
    }

    // Fungsi Pertama Kali di Load
    public function index()
    {
        $data = [
            'title' => 'Daftar Jabatan',
            'daftar_jabatan' => $this->JabatanModel->orderBy('id_jabatan', 'DESC')->findAll(),
        ];

        return view('admin/jabatan/index', $data);
    }

    // Fungsi Tambah Data Jabatan
    public function create()
    {
        $data = [
            'title' => 'Tambah Jabatan',
            'validation' => \Config\Services::validation(),
        ];

        return view('admin/jabatan/create', $data);
    }



    public function save()
    {
        // Deklarasi Nailai Slug Jabatan
        $slug = url_title($this->request->getvar('nama_jabatan'), '-', TRUE);

        // Deklarasi Tabel Jabatan
        $daftar_jabatan = $this->JabatanModel->orderBy('id_jabatan', 'DESC')->findAll();

        // Untuk Dijadikan Primary Key
        $uuid4 = Uuid::uuid4();

        // Simpan Data ke DataBase
        $data = [
            'title' => 'Tambah Jabatan',
            'id_jabatan' => $uuid4->toString(),
            'nama_jabatan' => esc($this->request->getvar('nama_jabatan')),
            'slug_jabatan' => $slug,
            'deskripsi_jabatan' => esc($this->request->getvar('deskripsi_jabatan')),
            'validation' => \Config\Services::validation(),
            'daftar_jabatan' => $daftar_jabatan
        ];

        $rules = $this->validate([
            'nama_jabatan' => 'required',
            'deskripsi_jabatan' => 'required'
        ]);

        if (!$rules) {
            session()->setFlashdata('failed', 'Data jabatan gagal ditambahkan !');
            return view('admin/jabatan/create', $data);
        } {
            $this->JabatanModel->insert($data);
            return redirect()->to('/jabatan')->with('success', 'Data Jabatan Berhasil Ditambahkan');
        }
    }

    // Fungsi Update Data
    public function update($id_jabatan)
    {
        $slug = url_title($this->request->getvar('nama_jabatan'), '-', TRUE);


        $data = [
            'nama_jabatan' => esc($this->request->getvar('nama_jabatan')),
            'slug_jabatan' => $slug,
            'deskripsi_jabatan' => esc($this->request->getvar('deskripsi_jabatan'))
        ];
        $this->JabatanModel->update($id_jabatan, $data);
        return redirect()->back()->with('success', 'Data Jabatan Berhasil Diubah');
    }

    // Fungsi Halaman Update
    public function form_update($slug_jabatan)
    {
        $daftar_jabatan = $this->JabatanModel->getJabatan($slug_jabatan);

        $data = [
            'title' => "Edit Data Jabatan",
            'daftar_jabatan' => $this->JabatanModel->getJabatan($slug_jabatan),
        ];

        if (empty($data['daftar_jabatan'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama Jabatan dengan slug : ' . $slug_jabatan . ' tidak ditemukan !');
        }
        return view('admin/jabatan/edit', $data);
    }


    public function delete($id_jabatan)
    {
        $this->JabatanModel->where('id_jabatan', $id_jabatan)->delete();
        return redirect()->back()->with('success', 'Data Berhasil Dihapus');
    }



    public function detail($slug_jabatan)
    {
        $jabatan = $this->JabatanModel->getJabatan($slug_jabatan);
        $data = [
            'title' => 'Detail Jabatan',
            'jabatan' => $this->JabatanModel->getJabatan($slug_jabatan),
            'nama_lengkap' => esc($this->request->getvar('nama_lengkap'))
        ];

        if (empty($data['jabatan'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama Jabatan dengan slug : ' . $slug_jabatan . ' tidak ditemukan !');
        }
        return view('admin/jabatan/detail', $data);
    }
}
