<?php

namespace App\Controllers\Admin;

use CodeIgniter\Database\Database;
use App\Controllers\BaseController;
use App\Models\PengurusModel;


class PengurusController extends BaseController
{
    protected $pengurusModel;
    protected $helpers = ['form'];

    public function __construct()
    {
        $this->pengurusModel = new PengurusModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Pengurus',
            'daftar_pengurus' => $this->PengurusModel->orderBy('id_pengurus', 'DESC')->findAll()
        ];

        return view('admin/pengurus/index', $data);
    }

    // Tambah Data Pengurus
    public function create()
    {
        // Ambil Slug
        $slug = url_title($this->request->getvar('nama_lengkap'), '-', TRUE);

        // Simpan Data ke DataBase
        $data = [
            'nama_lengkap' => esc($this->request->getvar('nama_lengkap')),
            'slug_pengurus' => $slug
        ];
        $this->PengurusModel->insert($data);
        return redirect()->back()->with('success', 'Data Pengurus Berhasil Ditambahkan');
    }

    public function update($id_pengurus)
    {
        $slug = url_title($this->request->getvar('nama_lengkap'), '-', TRUE);

        $data = [
            'nama_lengkap' => esc($this->request->getvar('nama_lengkap')),
            'slug_pengurus' => $slug
        ];
        $this->PengurusModel->update($id_pengurus, $data);
        return redirect()->back()->with('success', 'Data Pengurus Berhasil Diubah');
    }

    public function delete($id_pengurus)
    {
        $this->PengurusModel->where('id_pengurus', $id_pengurus)->delete();
        return redirect()->back()->with('success', 'Data Berhasil Dihapus');
    }
}
