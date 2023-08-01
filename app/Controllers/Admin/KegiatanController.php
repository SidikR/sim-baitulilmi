<?php

namespace App\Controllers\Admin;

use CodeIgniter\Database\Database;
use App\Controllers\BaseController;
use App\Models\KegiatanModel;
use CodeIgniter\Commands\Utilities\Publish;
use CodeIgniter\Validation\Rules;
use Config\App;
use JetBrains\PhpStorm\Internal\ReturnTypeContract;
use Intervention\Image\ImageManagerStatic as Image;


class KegiatanController extends BaseController
{
    protected $KegiatanModel;
    protected $helpers = ['form'];
    protected $directoriImageDevelopment = "../public/assets-admin/img/foto-kegiatan";
    protected $directoriImageProduction = "../../../public_html/baim/assets-admin/img/foto-kegiatan";


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
        $id_max = $this->KegiatanModel->getMaxId();
        // Deklarasi Nailai Slug Pengurus
        $slugy = url_title($this->request->getvar('nama_kegiatan'), '-', TRUE);
        $slug = $slugy . '-' . $id_max[0]->id_kegiatan + 1;
        $gambar = $this->request->getVar('croppedImage');
        $namaGambar = $slug . '.webp';
        $data_start_index = strpos($gambar, ',') + 1;
        $base64_data = substr($gambar, $data_start_index);
        $decoded_data = base64_decode($base64_data);

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
            $img = Image::make($decoded_data);
            if ($this->development) {
                $img->save(WRITEPATH . $this->directoriImageDevelopment . '/' . $namaGambar);
            } else {
                $img->save(WRITEPATH . $this->directoriImageProduction . '/' . $namaGambar);
            }
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
            return redirect()->back()->with('failed', 'Data Post Gagal Diubah');
        } {
            $this->KegiatanModel->update($id_kegiatan, $data);
            return redirect()->to('kegiatan')->with('success', 'Data Kegiatan Berhasil Diubah');
        }
    }

    public function form_update($slug_kegiatan)
    {

        $data = [
            'title' => "Edit Data Kegiatan",
            'daftar_kegiatan' => $this->KegiatanModel->getKegiatan($slug_kegiatan),
            'validation' => \Config\Services::validation()
        ];

        if (empty($data['daftar_kegiatan'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama Kegiatan dengan slug : ' . $slug_kegiatan . ' tidak ditemukan !');
        }
        return view('admin/kegiatan/edit', $data);
    }


    public function update_foto($id_kegiatan)
    {
        $slug = $this->KegiatanModel->getSlug($id_kegiatan);
        $gambar = $this->request->getVar('croppedImage');
        $namaGambar = $this->KegiatanModel->getNameFoto($id_kegiatan);
        $data_start_index = strpos($gambar, ',') + 1;
        $base64_data = substr($gambar, $data_start_index);
        $decoded_data = base64_decode($base64_data);

        if ($this->development) {
            $filepath = WRITEPATH . $this->directoriImageDevelopment . '/' . $namaGambar;
        } else {
            $filepath = WRITEPATH . $this->directoriImageProduction . '/' . $namaGambar;
        }

        if ($namaGambar != 'defaultkegiatan.svg') {
            unlink($filepath);
            $namaGambar = $slug . '.webp';
        }

        $data = [
            'title' => 'Tambah Foto Kegiatan',
            'foto_kegiatan' => $namaGambar,
            'validation' => \Config\Services::validation()
        ];

        if (empty($namaGambar)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Anda tidak Mengupload Gambar Apapun!  - Silakan Pilih Foto Anda');
        }
        $this->KegiatanModel->update($id_kegiatan, $data);
        $img = Image::make($decoded_data);
        if ($this->development) {
            $img->save(WRITEPATH . $this->directoriImageDevelopment . '/' . $namaGambar);
        } else {
            $img->save(WRITEPATH . $this->directoriImageProduction . '/' . $namaGambar);
        }
        return redirect()->to('kegiatan')->with('success', 'Data Kegiatan Berhasil Diubah');
    }


    public function delete($id_kegiatan)
    {
        $namaGambar = $this->KegiatanModel->getNameFoto($id_kegiatan);
        if ($this->development) {
            $filepath = WRITEPATH . $this->directoriImageDevelopment . '/' . $namaGambar;
        } else {
            $filepath = WRITEPATH . $this->directoriImageProduction . '/' . $namaGambar;
        }
        if ($namaGambar != 'defaultkegiatan.svg') {
            unlink($filepath);
        }
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
