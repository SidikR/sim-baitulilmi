<?php

namespace App\Controllers\Admin;

use CodeIgniter\Database\Database;
use App\Controllers\BaseController;
use App\Models\PetugasJumatModel;
use CodeIgniter\Commands\Utilities\Publish;
use CodeIgniter\Validation\Rules;
use Config\App;
use JetBrains\PhpStorm\Internal\ReturnTypeContract;
use Intervention\Image\ImageManagerStatic as Image;


class PetugasjumatController extends BaseController
{
    protected $PetugasJumatModel;
    protected $helpers = ['form', 'auth'];
    protected $directoriImageDevelopment = "../public/assets-admin/img/petugas-jumat";
    protected $directoriImageProduction = "../../../public_html/baim/assets-admin/img/petugas-jumat";


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
        $id_max = $this->PetugasJumatModel->getMaxId();

        // Deklarasi Nailai Slug Pengurus
        $slugy = url_title($this->request->getvar('tanggal'), '-', TRUE);
        $slug = $slugy . '-' . $id_max[0]->id_petugas + 1;

        $gambar = $this->request->getVar('croppedImage');
        $namaGambar = $slug . '.webp';
        $data_start_index = strpos($gambar, ',') + 1;
        $base64_data = substr($gambar, $data_start_index);
        $decoded_data = base64_decode($base64_data);

        // Simpan Data ke DataBase
        $data = [
            'daftar_petugasjumat' => $this->PetugasJumatModel->orderBy('id_petugas', 'DESC')->findAll(),
            'title' => 'Tambah Petugas Jumat',
            'tanggal' => esc($this->request->getvar('tanggal')),
            'slug_petugas' => $slug,
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
            // Convert and save the image as PNG
            $img = Image::make($decoded_data);
            if ($this->development) {
                $img->save(WRITEPATH . $this->directoriImageDevelopment . '/' . $namaGambar);
            } else {
                $img->save(WRITEPATH . $this->directoriImageProduction . '/' . $namaGambar);
            }
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
            'title' => "Edit Data Petugas Jumat",
            'daftar_petugasjumat' => $this->PetugasJumatModel->getPetugasJumat($id_petugas),
        ];

        if (empty($data['daftar_petugasjumat'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Petugas Jumat dengan id : ' . $id_petugas . ' tidak ditemukan !');
        }
        return view('admin/petugas-jumat/edit', $data);
    }


    public function update_foto($id_petugas)
    {
        $slug = $this->PetugasJumatModel->getSlug($id_petugas);
        $gambar = $this->request->getVar('croppedImage');
        $namaGambar = $this->PetugasJumatModel->getNameFoto($id_petugas);
        $data_start_index = strpos($gambar, ',') + 1;
        $base64_data = substr($gambar, $data_start_index);
        $decoded_data = base64_decode($base64_data);

        if ($this->development) {
            $filepath = WRITEPATH . $this->directoriImageDevelopment . '/' . $namaGambar;
        } else {
            $filepath = WRITEPATH . $this->directoriImageProduction . '/' . $namaGambar;
        }

        if ($namaGambar != 'defaultposter.svg') {
            unlink($filepath);
            $namaGambar = $slug . '.webp';
        }

        $data = [
            'title' => 'Tambah Foto Petugas Jumat',
            'poster' => $namaGambar,
            'validation' => \Config\Services::validation()
        ];

        if (empty($namaGambar)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Anda tidak Mengupload Gambar Apapun!  - Silakan Pilih Foto Anda');
        }
        $this->PetugasJumatModel->update($id_petugas, $data);
        $img = Image::make($decoded_data);
        if ($this->development) {
            $img->save(WRITEPATH . $this->directoriImageDevelopment . '/' . $namaGambar);
        } else {
            $img->save(WRITEPATH . $this->directoriImageProduction . '/' . $namaGambar);
        }
        return redirect()->to('petugas-jumat')->with('success', 'Data Foto Berhasil Diubah');
    }


    public function delete($id_petugas)
    {
        $namaGambar = $this->PetugasJumatModel->getNameFoto($id_petugas);
        if ($this->development) {
            $filepath = WRITEPATH . $this->directoriImageDevelopment . '/' . $namaGambar;
        } else {
            $filepath = WRITEPATH . $this->directoriImageProduction . '/' . $namaGambar;
        }
        if ($namaGambar != 'defaultposter.svg') {
            unlink($filepath);
        }
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
