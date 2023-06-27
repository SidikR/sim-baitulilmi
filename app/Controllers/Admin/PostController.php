<?php

namespace App\Controllers\Admin;

use CodeIgniter\Database\Database;
use App\Controllers\BaseController;
use App\Models\PostModel;
use CodeIgniter\Commands\Utilities\Publish;
use CodeIgniter\Validation\Rules;
use Config\App;
use JetBrains\PhpStorm\Internal\ReturnTypeContract;


class PostController extends BaseController
{
    protected $PostModel;
    protected $helpers = ['form'];


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
            'kategori' => $this->PostModel->getKategori(),
        ];

        return view('admin/post/create', $data);
    }

    public function save()
    {
        $id_max = $this->PostModel->getMaxId();
        // Deklarasi Nailai Slug Post
        $slugy = url_title($this->request->getvar('nama_post'), '-', TRUE);
        $slug = $slugy . '-' . $id_max[0]->id_post + 1;

        // Ambil Gambar
        $gambar = $this->request->getFile('foto_post');

        //Ambil Nama Gambar
        $namaGambar = $gambar->getName('');

        $kategori = $this->request->getVar('kategori_ck');

        if ($kategori == "Pilih Kategori") {
            $kategori = $this->request->getVar('kategori_br');
        }

        // Simpan Data ke DataBase
        $data = [
            'daftar_post' => $this->PostModel->findAll(),
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
            'deskripsi_post' => 'required'
        ]);

        if (!$rules) {
            session()->setFlashdata('failed', 'Data post gagal ditambahkan !');
            return view('admin/post/create', $data);
        } {
            $this->PostModel->insert($data);
            //Menuliskan ke direktori
            $gambar->move(WRITEPATH . '../../../public_html/baim/assets-admin/img/post', $namaGambar);
            return redirect()->to('/post')->with('success', 'Data Post Berhasil Ditambahkan');
        }
    }


    public function update($id_post)
    {
        $slugy = url_title($this->request->getvar('nama_post'), '-', TRUE);
        $slug = $slugy . '-' . $id_post;
        $data = [
            'nama_post' => esc($this->request->getvar('nama_post')),
            'slug_post' => $slug,
            'deskripsi_post' => $this->request->getvar('deskripsi_post'),
        ];
        $this->PostModel->update($id_post, $data);
        return redirect()->to('post')->with('success', 'Data Post Berhasil Diubah');
    }

    public function form_update($slug_post)
    {

        $data = [
            'title' => "Edit Data Post",
            'daftar_post' => $this->PostModel->getPost($slug_post),
        ];

        if (empty($data['daftar_post'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama Post dengan slug : ' . $slug_post . ' tidak ditemukan !');
        }
        return view('admin/post/edit', $data);
    }


    public function update_foto($id_post)
    {
        // Ambil Gambar
        $gambar = $this->request->getFile('foto_post');

        //Ambil Nama Gambar
        $namaGambar = $gambar->getName('');

        $data = [
            'title' => 'Tambah Foto Post',
            'foto_post' => $namaGambar,
            'validation' => \Config\Services::validation()
        ];

        if (empty($namaGambar)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Anda tidak Mengupload Gambar Apapun!  - Silakan Pilih Foto Anda');
        }
        $this->PostModel->update($id_post, $data);
        $gambar->move(WRITEPATH . '../../../public_html/baim/assets-admin/img/post', $namaGambar);
        return redirect()->to('post')->with('success', 'Data Post Berhasil Diubah');
    }


    public function delete($id_post)
    {
        $this->PostModel->where('id_post', $id_post)->delete();
        return redirect()->back()->with('success', 'Data Berhasil Dihapus');
    }



    public function detail($slug_post)
    {

        $data = [
            'title' => 'Detail Post',
            'post' => $this->PostModel->getPost($slug_post)
        ];

        // dd($data);

        if (empty($data['post'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama Post dengan slug : ' . $slug_post . ' tidak ditemukan !');
        }
        // dd($data);
        return view('admin/post/detail', $data);
    }
}
