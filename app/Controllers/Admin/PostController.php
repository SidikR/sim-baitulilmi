<?php

namespace App\Controllers\Admin;

use CodeIgniter\Database\Database;
use App\Controllers\BaseController;
use App\Models\PostModel;
use CodeIgniter\Commands\Utilities\Publish;
use CodeIgniter\Validation\Rules;
use Config\App;
use JetBrains\PhpStorm\Internal\ReturnTypeContract;
use Intervention\Image\ImageManagerStatic as Image;


class PostController extends BaseController
{
    protected $PostModel;
    protected $helpers = ['form'];
    protected $directoriImageDevelopment = "../public/assets-admin/img/foto-post";
    protected $directoriImageProduction = "../../../public_html/baim/assets-admin/img/foto-post";


    public function __construct()
    {
        $this->PostModel = new PostModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Post',
            'daftar_post' => $this->PostModel->orderBy('updated_at', 'DESC')->findAll(),
        ];

        return view('admin/post/index', $data);
    }


    // Tambah Data Post
    public function create()
    {

        $data = [
            'daftar_post' => $this->PostModel->findAll(),
            'title' => 'Tambah Post',
            'validation' => \Config\Services::validation(),
            'daftar_kategori' => $this->PostModel->getKategori(),
        ];

        return view('admin/post/create', $data);
    }

    public function save()
    {
        $id_max = $this->PostModel->getMaxId();
        // Deklarasi Nailai Slug Pengurus
        $slugy = url_title($this->request->getvar('nama_post'), '-', TRUE);
        $slug = $slugy . '-' . $id_max[0]->id_post + 1;
        $gambar = $this->request->getVar('croppedImage');
        $namaGambar = $slug . '.webp';
        $data_start_index = strpos($gambar, ',') + 1;
        $base64_data = substr($gambar, $data_start_index);
        $decoded_data = base64_decode($base64_data);

        $kategori = $this->request->getVar('kategori_ck');

        if ($kategori == "--Pilih Kategori--") {
            $kategori = $this->request->getVar('kategori_br');
        }

        // Simpan Data ke DataBase
        $data = [
            'daftar_post' => $this->PostModel->findAll(),
            'daftar_kategori' => $this->PostModel->getKategori(),
            'title' => 'Tambah Post',
            'nama_post' => esc($this->request->getvar('nama_post')),
            'slug_post' => $slug,
            'deskripsi_post' => $this->request->getvar('deskripsi_post'),
            'foto_post' => $namaGambar,
            'kategori' => $kategori,
            'validation' => \Config\Services::validation()
        ];

        // dd($data);

        $rules = $this->validate([
            'nama_post' => 'required',
            'deskripsi_post' => 'required',
        ]);

        if (!$rules) {
            session()->setFlashdata('failed', 'Data post gagal ditambahkan !');
            return view('admin/post/create', $data);
        } {
            $this->PostModel->insert($data);
            //Menuliskan ke direktori
            $img = Image::make($decoded_data);
            if ($this->development) {
                $img->save(WRITEPATH . $this->directoriImageDevelopment . '/' . $namaGambar);
            } else {
                $img->save(WRITEPATH . $this->directoriImageProduction . '/' . $namaGambar);
            }
            return redirect()->to('/post')->with('success', 'Data Post Berhasil Ditambahkan');
        }
    }


    public function update($id_post)
    {
        $slugy = url_title($this->request->getvar('nama_post'), '-', TRUE);
        $slug = $slugy . '-' . $id_post;
        $kategori = $this->request->getVar('kategori_ck');

        if ($kategori == "--Tambah Kategori Baru--") {
            $kategori = $this->request->getVar('kategori_br');
        }
        $data = [
            'daftar_kategori' => $this->PostModel->getKategori(),
            'nama_post' => esc($this->request->getvar('nama_post')),
            'slug_post' => $slug,
            'deskripsi_post' => $this->request->getvar('deskripsi_post'),
            'kategori' => $kategori,
            'validation' => \Config\Services::validation()
        ];

        $rules = $this->validate([
            'nama_post' => 'required',
            'deskripsi_post' => 'required'
        ]);

        if (!$rules) {
            return redirect()->back()->with('failed', 'Data Post Gagal Diubah');
        } {
            $this->PostModel->update($id_post, $data);
            return redirect()->to('post')->with('success', 'Data Post Berhasil Diubah');
        }
    }

    public function form_update($slug_post)
    {

        $data = [
            'title' => "Edit Data Post",
            'daftar_post' => $this->PostModel->getPost($slug_post),
            'daftar_kategori' => $this->PostModel->getKategori(),
            'validation' => \Config\Services::validation()
        ];

        if (empty($data['daftar_post'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama Post dengan slug : ' . $slug_post . ' tidak ditemukan !');
        }
        return view('admin/post/edit', $data);
    }


    public function update_foto($id_post)
    {
        $slug = $this->PostModel->getSlug($id_post);
        $gambar = $this->request->getVar('croppedImage');
        $namaGambar = $this->PostModel->getNameFoto($id_post);
        $data_start_index = strpos($gambar, ',') + 1;
        $base64_data = substr($gambar, $data_start_index);
        $decoded_data = base64_decode($base64_data);

        if ($this->development) {
            $filepath = WRITEPATH . $this->directoriImageDevelopment . '/' . $namaGambar;
        } else {
            $filepath = WRITEPATH . $this->directoriImageProduction . '/' . $namaGambar;
        }

        if ($namaGambar != 'defaultpost.svg') {
            unlink($filepath);
            $namaGambar = $slug . '.webp';
        }

        $data = [
            'title' => 'Tambah Foto Post',
            'foto_post' => $namaGambar,
            'validation' => \Config\Services::validation()
        ];

        if (empty($namaGambar)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Anda tidak Mengupload Gambar Apapun!  - Silakan Pilih Foto Anda');
        }
        $this->PostModel->update($id_post, $data);
        //Menuliskan ke direktori
        $img = Image::make($decoded_data);
        if ($this->development) {
            $img->save(WRITEPATH . $this->directoriImageDevelopment . '/' . $namaGambar);
        } else {
            $img->save(WRITEPATH . $this->directoriImageProduction . '/' . $namaGambar);
        }
        return redirect()->to('post')->with('success', 'Data Post Berhasil Diubah');
    }


    public function delete($id_post)
    {
        $namaGambar = $this->PostModel->getNameFoto($id_post);
        if ($this->development) {
            $filepath = WRITEPATH . $this->directoriImageDevelopment . '/' . $namaGambar;
        } else {
            $filepath = WRITEPATH . $this->directoriImageProduction . '/' . $namaGambar;
        }
        if ($namaGambar != 'defaultpost.svg') {
            unlink($filepath);
        }
        $this->PostModel->where('id_post', $id_post)->delete();
        return redirect()->back()->with('success', 'Data Berhasil Dihapus');
    }



    public function detail($slug_post)
    {
        $data = [
            'title' => 'Detail Post',
            'post' => $this->PostModel->getPost($slug_post)
        ];

        if (empty($data['post'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama Post dengan slug : ' . $slug_post . ' tidak ditemukan !');
        }
        return view('admin/post/detail', $data);
    }
}
