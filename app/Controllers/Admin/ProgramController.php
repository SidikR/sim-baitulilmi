<?php

namespace App\Controllers\Admin;

use CodeIgniter\Database\Database;
use App\Controllers\BaseController;
use App\Models\ProgramModel;
use CodeIgniter\Commands\Utilities\Publish;
use CodeIgniter\Validation\Rules;
use Config\App;
use JetBrains\PhpStorm\Internal\ReturnTypeContract;


class ProgramController extends BaseController
{
    protected $ProgramModel;
    protected $helpers = ['form'];


    public function __construct()
    {
        $this->ProgramModel = new ProgramModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Program',
            'daftar_program' => $this->ProgramModel->orderBy('id', 'DESC')->findAll(),
        ];

        return view('admin/program/index', $data);
    }


    // Tambah Data Program
    public function create()
    {
        $data = [
            'daftar_program' => $this->ProgramModel->findAll(),
            'title' => 'Tambah Program',
            'daftar_filter' => $this->ProgramModel->getFilter(),
            'validation' => \Config\Services::validation()
        ];

        return view('admin/program/create', $data);
    }

    public function save()
    {
        // Ambil Gambar
        $gambar = $this->request->getFile('foto');

        //Ambil Nama Gambar
        $namaGambar = $gambar->getName('');

        $filter = $this->request->getVar('filter_op');

        if ($filter == "Pilih Filter" || $filter == " ") {
            $filter = $this->request->getVar('filter_br');
        }

        // Simpan Data ke DataBase
        $data = [
            'daftar_program' => $this->ProgramModel->findAll(),
            'daftar_filter' => $this->ProgramModel->getFilter(),
            'title' => 'Tambah Program',
            'nama_program' => esc($this->request->getvar('nama_program')),
            'deskripsi_program' => esc($this->request->getvar('deskripsi_program')),
            'filter' => $filter,
            'foto' => $namaGambar,
            'validation' => \Config\Services::validation()
        ];

        $rules = $this->validate([
            'nama_program' => 'required',
            'deskripsi_program' => 'required'
        ]);

        if (!$rules) {
            session()->setFlashdata('failed', 'Data Program gagal ditambahkan !');
            return view('admin/program/create', $data);
        } {
            $this->ProgramModel->insert($data);
            //Menuliskan ke direktori
            $gambar->move(WRITEPATH . '../../public_html/baim/assets-admin/img/program', $namaGambar);
            return redirect()->to('/program')->with('success', 'Data Program Berhasil Ditambahkan');
        }
    }


    public function update($id)
    {
        $filter = $this->request->getVar('filter_op');

        if ($filter == "Pilih Filter" || $filter == " ") {
            $filter = $this->request->getVar('filter_br');
        }

        $data = [
            'nama_program' => esc($this->request->getvar('nama_program')),
            'deskripsi_program' => esc($this->request->getvar('deskripsi_program')),
            'filter' => $filter,
        ];
        $this->ProgramModel->update($id, $data);
        return redirect()->to('program')->with('success', 'Data Program Berhasil Diubah');
    }

    public function form_update($id)
    {

        $data = [
            'title' => "Edit Data Program",
            'daftar_program' => $this->ProgramModel->getProgram($id),
            'daftar_filter' => $this->ProgramModel->getFilter(),
        ];

        if (empty($data['daftar_program'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama Program dengan id : ' . $id . ' tidak ditemukan !');
        }
        return view('admin/program/edit', $data);
    }


    public function update_foto($id)
    {
        // Ambil Gambar
        $gambar = $this->request->getFile('foto');

        //Ambil Nama Gambar
        $namaGambar = $gambar->getName('');

        $data = [
            'title' => 'Tambah Foto Program',
            'foto' => $namaGambar,
            'validation' => \Config\Services::validation()
        ];

        if (empty($namaGambar)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Anda tidak Mengupload Gambar Apapun!  - Silakan Pilih Foto Anda');
        }
        $this->ProgramModel->update($id, $data);
        $gambar->move(WRITEPATH . '../../public_html/baim/assets-admin/img/program', $namaGambar);
        return redirect()->to('program')->with('success', 'Data Program Berhasil Diubah');
    }


    public function delete($id)
    {
        $this->ProgramModel->where('id', $id)->delete();
        return redirect()->back()->with('success', 'Data Berhasil Dihapus');
    }



    public function detail($id)
    {
        $data = [
            'title' => 'Detail Program',
            'program' => $this->ProgramModel->getProgram($id),
        ];

        if (empty($data['program'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama Program dengan id : ' . $id . ' tidak ditemukan !');
        }
        return view('admin/program/detail', $data);
    }
}
