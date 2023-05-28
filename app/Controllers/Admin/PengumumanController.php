<?php

namespace App\Controllers\Admin;

use CodeIgniter\Database\Database;
use App\Controllers\BaseController;
use App\Models\PengumumanModel;
use CodeIgniter\Commands\Utilities\Publish;
use CodeIgniter\Validation\Rules;
use Config\App;
use JetBrains\PhpStorm\Internal\ReturnTypeContract;


class PengumumanController extends BaseController
{
    protected $PengumumanModel;
    protected $helpers = ['form', 'auth'];


    public function __construct()
    {
        $this->PengumumanModel = new PengumumanModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Pengumuman',
            'daftar_pengumuman' => $this->PengumumanModel->orderBy('id_pengumuman', 'DESC')->findAll(),
        ];

        return view('admin/pengumuman/index', $data);
    }


    // Tambah Data Pengumuman
    public function create()
    {
        $data = [
            'daftar_pengumuman' => $this->PengumumanModel->findAll(),
            'title' => 'Tambah Pengumuman',
            'validation' => \Config\Services::validation()
        ];

        return view('admin/pengumuman/create', $data);
    }

    public function save()
    {

        // Simpan Data ke DataBase
        $data = [
            'daftar_pengumuman' => $this->PengumumanModel->orderBy('id_pengumuman', 'DESC')->findAll(),
            'title' => 'Tambah Pengumuman',
            'tanggal' => esc($this->request->getvar('tanggal')),
            'judul' => esc($this->request->getvar('judul')),
            'isi' => esc($this->request->getvar('isi')),
            'validation' => \Config\Services::validation()
        ];

        $rules = $this->validate([
            'tanggal' => 'required',
            'judul' => 'required',
            'isi' => 'required',
        ]);

        if (!$rules) {
            session()->setFlashdata('failed', 'Data pengumuman gagal ditambahkan !');
            return view('admin/pengumuman/create', $data);
        } {
            $this->PengumumanModel->insert($data);
            return redirect()->to('/pengumuman')->with('success', 'Data Pengumuman Berhasil Ditambahkan');
        }
    }


    public function update($id_pengumuman)
    {

        $data = [
            'tanggal' => esc($this->request->getvar('tanggal')),
            'judul' => esc($this->request->getvar('judul')),
            'isi' => esc($this->request->getvar('isi'))
        ];
        $this->PengumumanModel->update($id_pengumuman, $data);
        return redirect()->to('pengumuman')->with('success', 'Data Pengumuman Berhasil Diubah');
    }

    public function form_update($id_pengumuman)
    {

        $data = [
            'title' => "Edit Data Pengumuman",
            'daftar_pengumuman' => $this->PengumumanModel->getPengumuman($id_pengumuman),
        ];

        if (empty($data['daftar_pengumuman'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Pengumuman dengan id : ' . $id_pengumuman . ' tidak ditemukan !');
        }
        return view('admin/pengumuman/edit', $data);
    }

    public function delete($id_pengumuman)
    {
        $this->PengumumanModel->where('id_pengumuman', $id_pengumuman)->delete();
        return redirect()->back()->with('success', 'Data Berhasil Dihapus');
    }


    public function detail($id_pengumuman)
    {
        $data = [
            'title' => 'Detail Pengumuman',
            'daftar_pengumuman' => $this->PengumumanModel->getPengumuman($id_pengumuman),
        ];

        if (empty($data['daftar_pengumuman'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama Pengumuman dengan slug : ' . $id_pengumuman . ' tidak ditemukan !');
        }
        return view('admin/pengumuman/detail', $data);
    }
}
