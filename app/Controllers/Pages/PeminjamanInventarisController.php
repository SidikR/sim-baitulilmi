<?php

namespace App\Controllers\Pages;

use App\Controllers\BaseController;
use App\Database\Migrations\PeminjamanInventaris;
use App\Models\InventarisModel;
use App\Models\PeminjamanInventarisModel;
use App\Models\PeminjamanMasjidModel;

class PeminjamanInventarisController extends BaseController
{
    protected $InventarisModel;
    protected $PeminjamanInventarisModel;
    protected $PeminjamanMasjidModel;
    protected $helpers = ['form', 'auth'];

    public function __construct()
    {
        $this->InventarisModel = new InventarisModel();
        $this->PeminjamanMasjidModel = new PeminjamanMasjidModel();
        $this->PeminjamanInventarisModel = new PeminjamanInventarisModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Peminjaman Inventaris',
            'daftar_inventaris' => $this->InventarisModel->orderBy('created_at', 'DESC')->findAll(),
            'validation' => \Config\Services::validation(),

        ];
        return view('pages/inventaris/index', $data);
    }

    public function save()
    {
        // Ambil Gambar
        $gambar = $this->request->getFile('foto_identitas');

        //Ambil Nama Gambar
        $namaGambar = $gambar->getName('');

        //Menuliskan ke direktori


        $data = [
            'title' => 'Pinjam Inventaris',
            // 'id_inventaris' => $uuid4->toString(),
            'id_user' => user_id(),
            'id_barang' => esc($this->request->getvar('nama_inventaris')),
            'qty' => esc($this->request->getvar('qty')),
            'instansi_peminjam' => esc($this->request->getvar('instansi_peminjam')),
            'nama_penanggungjawab' => esc($this->request->getvar('nama_penanggungjawab')),
            'tanggal_dipinjam' => esc($this->request->getvar('tanggal_dipinjam')),
            'tanggal_pengembalian' => esc($this->request->getvar('tanggal_kembali')),
            'infaq' => esc($this->request->getvar('infaq')),
            'metode_infaq' => esc($this->request->getvar('metode_infaq')),
            'foto_identitas' => $namaGambar,
            'agreement' => esc($this->request->getvar('agreement')),
            'validation' => \Config\Services::validation(),
            'daftar_inventaris' => $this->InventarisModel->orderBy('created_at', 'DESC')->findAll()
        ];

        $rules = $this->validate([
            'nama_inventaris' => 'required',
            'qty' => 'required',
            'instansi_peminjam' => 'required',
            'nama_penanggungjawab' => 'required',
            'tanggal_dipinjam' => 'required',
            'tanggal_kembali' => 'required',
            'infaq' => 'required',
            'metode_infaq' => 'required'
        ]);

        if (!$rules) {
            session()->setFlashdata('failed', 'Data inventaris gagal ditambahkan !');
            return view('pages/inventaris/index', $data);
        } {
            $this->PeminjamanInventarisModel->insert($data);
            $gambar->move(WRITEPATH . '../public/assets-admin/img/peminjaman/foto-identitas', $namaGambar);
            return redirect()->to(base_url('peminjaman'))->with('success', 'Permintaan Telah dikirim, Silakan cek Log Peminjaman di Profile Anda!');
        }
    }

    public function save_masjid()
    {
        // Ambil Gambar
        $gambar = $this->request->getFile('foto_identitas');

        //Ambil Nama Gambar
        $namaGambar = $gambar->getName('');

        //Menuliskan ke direktori


        $data = [
            'title' => 'Pinjam Masjid',
            'id_user' => user_id(),
            'instansi_peminjam' => esc($this->request->getvar('instansi_peminjam')),
            'nama_kegiatan' => esc($this->request->getvar('nama_kegiatan')),
            'deskripsi_kegiatan' => esc($this->request->getvar('deskripsi_kegiatan')),
            'nama_penanggungjawab' => esc($this->request->getvar('nama_penanggungjawab')),
            'tanggal_dipinjam' => esc($this->request->getvar('tanggal_dipinjam')),
            'tanggal_selesai' => esc($this->request->getvar('tanggal_selesai')),
            'infaq' => esc($this->request->getvar('infaq')),
            'metode_infaq' => esc($this->request->getvar('metode_infaq')),
            'agreement' => esc($this->request->getvar('agreement')),
            'foto_identitas' => $namaGambar,
            'validation' => \Config\Services::validation(),
            'daftar_inventaris' => $this->InventarisModel->orderBy('created_at', 'DESC')->findAll(),
        ];

        $rules = $this->validate([
            'nama_kegiatan' => 'required',
            'deskripsi_kegiatan' => 'required',
            'instansi_peminjam' => 'required',
            'nama_penanggungjawab' => 'required',
            'tanggal_dipinjam' => 'required',
            'tanggal_selesai' => 'required',
            'infaq' => 'required',
            'metode_infaq' => 'required'
        ]);

        if (!$rules) {
            session()->setFlashdata('failed', 'Data inventaris gagal ditambahkan !');
            return view('pages/inventaris/index', $data);
        } {
            $this->PeminjamanMasjidModel->insert($data);
            $gambar->move(WRITEPATH . '../public/assets-admin/img/peminjaman/foto-identitas', $namaGambar);
            return redirect()->to(base_url('peminjaman'))->with('success', 'Permintaan Telah dikirim, Silakan cek Log Peminjaman di Profile Anda!');
        }
    }
}
