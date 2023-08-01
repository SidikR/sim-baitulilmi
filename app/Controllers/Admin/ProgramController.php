<?php

namespace App\Controllers\Admin;

use CodeIgniter\Database\Database;
use App\Controllers\BaseController;
use App\Models\ProgramModel;
use CodeIgniter\Commands\Utilities\Publish;
use CodeIgniter\Validation\Rules;
use Config\App;
use JetBrains\PhpStorm\Internal\ReturnTypeContract;
use Config\Services;
use Ramsey\Uuid\Rfc4122\UuidV4;
use Ramsey\Uuid\Uuid;


class ProgramController extends BaseController
{
    protected $ProgramModel;
    protected $helpers = ['form'];
    protected $directoriImageDevelopment = "../public/assets-admin/img/program";
    protected $directoriImageProduction = "../../../public_html/baim/assets-admin/img/program";


    public function __construct()
    {
        $this->ProgramModel = new ProgramModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Foto Galeri Program',
            'daftar_program' => $this->ProgramModel->orderBy('id', 'DESC')->findAll(),
        ];

        return view('admin/program/index', $data);
    }


    // Tambah Data Program
    public function create()
    {
        $data = [
            'daftar_program' => $this->ProgramModel->findAll(),
            'title' => 'Tambah Foto Galeri',
            'daftar_filter' => $this->ProgramModel->getFilter(),
            'validation' => \Config\Services::validation()
        ];

        return view('admin/program/create', $data);
    }

    public function save()
    {
        $uuid4 = Uuid::uuid4();
        // Ambil Gambar
        $filter = $this->request->getVar('filter_op');

        if ($filter == "Pilih Filter" || $filter == " ") {
            $filter = $this->request->getVar('filter_br');
        }

        $gambar = $this->request->getVar('croppedImage');
        $namaGambar = 'gambar.' . $uuid4->toString() . '.webp';
        $data_start_index = strpos($gambar, ',') + 1;
        $base64_data = substr($gambar, $data_start_index);
        $decoded_data = base64_decode($base64_data);


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
            //Menuliskan ke direktori
            if ($this->development) {
                $svgFilePath = WRITEPATH . $this->directoriImageDevelopment . '/' . $namaGambar;
                // $gambar->move(WRITEPATH . $this->directoriImageDevelopment, $namaGambar);
            } else {
                $svgFilePath = WRITEPATH . $this->directoriImageProduction . '/' . $namaGambar;
                // $gambar->move(WRITEPATH . $this->directoriImageProduction, $namaGambar);
            }
            file_put_contents($svgFilePath, $decoded_data);
            $this->ProgramModel->insert($data);
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
        $uuid4 = Uuid::uuid4();
        $gambar = $this->request->getVar('croppedImage');
        $namaGambar = 'gambar.' . $uuid4->toString() . '.webp';
        $data_start_index = strpos($gambar, ',') + 1;
        $base64_data = substr($gambar, $data_start_index);
        $decoded_data = base64_decode($base64_data);

        $data = [
            'title' => 'Tambah Foto Program',
            'foto' => $namaGambar,
            'validation' => \Config\Services::validation()
        ];

        if (empty($namaGambar)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Anda tidak Mengupload Gambar Apapun!  - Silakan Pilih Foto Anda');
        }
        $this->ProgramModel->update($id, $data);
        //Menuliskan ke direktori
        if ($this->development) {
            $svgFilePath = WRITEPATH . $this->directoriImageDevelopment . '/' . $namaGambar;
            // $gambar->move(WRITEPATH . $this->directoriImageDevelopment, $namaGambar);
        } else {
            $svgFilePath = WRITEPATH . $this->directoriImageProduction . '/' . $namaGambar;
            // $gambar->move(WRITEPATH . $this->directoriImageProduction, $namaGambar);
        }
        file_put_contents($svgFilePath, $decoded_data);

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
