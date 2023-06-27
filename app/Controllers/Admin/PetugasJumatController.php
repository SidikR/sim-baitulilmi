<?php

namespace App\Controllers\Admin;

use CodeIgniter\Database\Database;
use App\Controllers\BaseController;
use App\Models\PetugasJumatModel;
use CodeIgniter\Commands\Utilities\Publish;
use CodeIgniter\Validation\Rules;
use Config\App;
use JetBrains\PhpStorm\Internal\ReturnTypeContract;


class PetugasjumatController extends BaseController
{
    protected $PetugasJumatModel;
    protected $helpers = ['form', 'auth'];


    public function __construct()
    {
        $this->PetugasJumatModel = new PetugasJumatModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Petugas Jumat',
            'daftar_petugasjumat' => $this->PetugasJumatModel->orderBy('id_petugas', 'DESC')->findAll(),
        ];

        return view('admin/petugas-jumat/index', $data);
    }


    // Tambah Data Petugasjumat
    public function create()
    {
        $data = [
            'daftar_petugasjumat' => $this->PetugasJumatModel->findAll(),
            'title' => 'Tambah Petugas Jumat',
            'validation' => \Config\Services::validation()
        ];

        return view('admin/petugas-jumat/create', $data);
    }

    public function save()
    {
        // Ambil Gambar
        $gambar = $this->request->getFile('poster');

        //Ambil Nama Gambar
        $namaGambar = $gambar->getName('');

        // Simpan Data ke DataBase
        $data = [
            'daftar_petugasjumat' => $this->PetugasJumatModel->orderBy('id_petugas', 'DESC')->findAll(),
            'title' => 'Tambah Petugasjumat',
            'tanggal' => esc($this->request->getvar('tanggal')),
            'nama_imam' => esc($this->request->getvar('nama_imam')),
            'jabatan_imam' => esc($this->request->getvar('jabatan_imam')),
            'nama_khatib' => esc($this->request->getvar('nama_khatib')),
            'jabatan_khatib' => esc($this->request->getvar('jabatan_khatib')),
            'nama_muadzin' => esc($this->request->getvar('nama_muadzin')),
            'jabatan_muadzin' => esc($this->request->getvar('jabatan_muadzin')),
            'poster' => $namaGambar,
            'validation' => \Config\Services::validation()
        ];

        $rules = $this->validate([
            'nama_imam' => 'required',
            'nama_khatib' => 'required',
            'nama_muadzin' => 'required',
            'tanggal' => 'required',
        ]);

        if (!$rules) {
            session()->setFlashdata('failed', 'Data petugasjumat gagal ditambahkan !');
            return view('admin/petugas-jumat/create', $data);
        } {
            $this->PetugasJumatModel->insert($data);
            //Menuliskan ke direktori
            $gambar->move(WRITEPATH . '../../public_html/baim/assets-admin/img/petugas-jumat', $namaGambar);
            return redirect()->to('/petugas-jumat')->with('success', 'Data Petugasjumat Berhasil Ditambahkan');
        }
    }


    public function update($id_petugas)
    {

        $data = [
            'tanggal' => esc($this->request->getvar('tanggal')),
            'nama_imam' => esc($this->request->getvar('nama_imam')),
            'jabatan_imam' => esc($this->request->getvar('jabatan_imam')),
            'nama_khatib' => esc($this->request->getvar('nama_khatib')),
            'jabatan_khatib' => esc($this->request->getvar('jabatan_khatib')),
            'nama_muadzin' => esc($this->request->getvar('nama_muadzin')),
            'jabatan_muadzin' => esc($this->request->getvar('jabatan_muadzin')),
        ];
        $this->PetugasJumatModel->update($id_petugas, $data);
        return redirect()->to('petugas-jumat')->with('success', 'Data Petugasjumat Berhasil Diubah');
    }

    public function form_update($id_petugas)
    {

        $data = [
            'title' => "Edit Data Petugasjumat",
            'daftar_petugasjumat' => $this->PetugasJumatModel->getPetugasJumat($id_petugas),
        ];

        if (empty($data['daftar_petugasjumat'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Petugas Jumat dengan id : ' . $id_petugas . ' tidak ditemukan !');
        }
        return view('admin/petugas-jumat/edit', $data);
    }


    public function update_foto($id_petugas)
    {
        // Ambil Gambar
        $gambar = $this->request->getFile('poster');

        //Ambil Nama Gambar
        $namaGambar = $gambar->getName('');

        $data = [
            'title' => 'Tambah Foto Petugasjumat',
            'poster' => $namaGambar,
            'validation' => \Config\Services::validation()
        ];

        if (empty($namaGambar)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Anda tidak Mengupload Gambar Apapun!  - Silakan Pilih Foto Anda');
        }
        $this->PetugasJumatModel->update($id_petugas, $data);
        $gambar->move(WRITEPATH . '../../public_html/baim/assets-admin/img/petugas-jumat', $namaGambar);
        return redirect()->to('petugas-jumat')->with('success', 'Data Foto Berhasil Diubah');
    }


    public function delete($id_petugas)
    {
        $this->PetugasJumatModel->where('id_petugas', $id_petugas)->delete();
        return redirect()->back()->with('success', 'Data Berhasil Dihapus');
    }



    public function detail($id_petugas)
    {
        $data = [
            'title' => 'Detail Petugas Jumat',
            'petugasjumat' => $this->PetugasJumatModel->getPetugasJumat($id_petugas),
        ];

        if (empty($data['petugasjumat'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama Petugas Jumat dengan slug : ' . $id_petugas . ' tidak ditemukan !');
        }
        return view('admin/petugas-jumat/detail', $data);
    }
}
