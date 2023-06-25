<?php

namespace App\Controllers\Admin;

use CodeIgniter\Database\Database;
use App\Controllers\BaseController;
use App\Models\PengurusModel;
use CodeIgniter\Commands\Utilities\Publish;
use CodeIgniter\Validation\Rules;
use Config\App;
use JetBrains\PhpStorm\Internal\ReturnTypeContract;


class PengurusController extends BaseController
{
    protected $PengurusModel;
    protected $helpers = ['form'];


    public function __construct()
    {
        $this->PengurusModel = new PengurusModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Pengurus Masjid',
            'daftar_pengurus' => $this->PengurusModel->orderBy('id_pengurus', 'DESC')->findAll(),
        ];

        return view('admin/pengurus/index', $data);
    }


    // Tambah Data Pengurus
    public function create()
    {
        $data = [
            'daftar_pengurus' => $this->PengurusModel->findAll(),
            'title' => 'Tambah Pengurus',
            'validation' => \Config\Services::validation()
        ];

        return view('admin/pengurus/create', $data);
    }

    public function save()
    {
        $id_max = $this->PengurusModel->getMaxId();

        // Deklarasi Nailai Slug Pengurus
        $slugy = url_title($this->request->getvar('nama_lengkap'), '-', TRUE);
        $slug = $slugy . '-' . $id_max[0]->id_pengurus + 1;

        // Ambil Gambar
        $gambar = $this->request->getFile('foto_pengurus');

        //Ambil Nama Gambar
        $namaGambar = $gambar->getName('');

        // Simpan Data ke DataBase
        $data = [
            'daftar_pengurus' => $this->PengurusModel->orderBy('id_pengurus', 'DESC')->findAll(),
            'title' => 'Tambah Pengurus',
            'nama_lengkap' => esc($this->request->getvar('nama_lengkap')),
            'slug_pengurus' => $slug,
            'jenis_kelamin' => esc($this->request->getvar('jenis_kelamin')),
            'jabatan' => esc($this->request->getvar('nama_jabatan')),
            'instagram' => esc($this->request->getvar('instagram')),
            'linkedin' => esc($this->request->getvar('linkedin')),
            'nomor_telepon' => esc($this->request->getvar('nomor_telepon')),
            'alamat_pengurus' => esc($this->request->getvar('alamat_pengurus')),
            'foto_pengurus' => $namaGambar,
            'validation' => \Config\Services::validation()
        ];

        $rules = $this->validate([
            'nama_lengkap' => 'required',
            'jenis_kelamin' => 'required',
            'nomor_telepon' => 'required',
            'nama_jabatan' => 'required',
            'alamat_pengurus' => 'required'
        ]);

        if (!$rules) {
            session()->setFlashdata('failed', 'Data pengurus gagal ditambahkan !');
            return view('admin/pengurus/create', $data);
        } {
            $this->PengurusModel->insert($data);
            //Menuliskan ke direktori
            $gambar->move(WRITEPATH . '../public/assets-admin/img/foto-pengurus', $namaGambar);
            return redirect()->to('/pengurus')->with('success', 'Data Pengurus Berhasil Ditambahkan');
        }
    }


    public function update($id_pengurus)
    {
        $slugy = url_title($this->request->getvar('nama_lengkap'), '-', TRUE);
        $slug = $slugy . '-' . $id_pengurus;
        //$daftar_pengurus = $this->pengurusModel->getPengurus($slug_pengurus);
        $data = [
            'nama_lengkap' => esc($this->request->getvar('nama_lengkap')),
            'slug_pengurus' => $slug,
            'jenis_kelamin' => esc($this->request->getvar('jenis_kelamin')),
            'jabatan' => esc($this->request->getvar('nama_jabatan')),
            'instagram' => esc($this->request->getvar('instagram')),
            'linkedin' => esc($this->request->getvar('linkedin')),
            'nomor_telepon' => esc($this->request->getvar('nomor_telepon')),
            'alamat_pengurus' => esc($this->request->getvar('alamat_pengurus')),
        ];
        $this->PengurusModel->update($id_pengurus, $data);
        return redirect()->to('pengurus')->with('success', 'Data Pengurus Berhasil Diubah');
    }

    public function form_update($slug_pengurus)
    {

        $data = [
            'title' => "Edit Data Pengurus",
            'daftar_pengurus' => $this->PengurusModel->getPengurus($slug_pengurus),
        ];

        if (empty($data['daftar_pengurus'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama Pengurus dengan slug : ' . $slug_pengurus . ' tidak ditemukan !');
        }
        return view('admin/pengurus/edit', $data);
    }


    public function update_foto($id_pengurus)
    {
        // Ambil Gambar
        $gambar = $this->request->getFile('foto_pengurus');

        //Ambil Nama Gambar
        $namaGambar = $gambar->getName('');

        $data = [
            'title' => 'Tambah Foto Pengurus',
            'foto_pengurus' => $namaGambar,
            'validation' => \Config\Services::validation()
        ];

        if (empty($namaGambar)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Anda tidak Mengupload Gambar Apapun!  - Silakan Pilih Foto Anda');
        }
        $this->PengurusModel->update($id_pengurus, $data);
        $gambar->move(WRITEPATH . '../public/assets-admin/img/foto-pengurus', $namaGambar);
        return redirect()->to('pengurus')->with('success', 'Data Pengurus Berhasil Diubah');
    }


    public function delete($id_pengurus)
    {
        $this->PengurusModel->where('id_pengurus', $id_pengurus)->delete();
        return redirect()->back()->with('success', 'Data Berhasil Dihapus');
    }



    public function detail($slug_pengurus)
    {
        $data = [
            'title' => 'Detail Pengurus',
            'pengurus' => $this->PengurusModel->getPengurus($slug_pengurus),
            'nama_lengkap' => esc($this->request->getvar('nama_lengkap'))
        ];

        if (empty($data['pengurus'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama Pengurus dengan slug : ' . $slug_pengurus . ' tidak ditemukan !');
        }
        return view('admin/pengurus/detail', $data);
    }
}
