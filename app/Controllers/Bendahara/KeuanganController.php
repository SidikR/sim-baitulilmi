<?php

namespace App\Controllers\Bendahara;

use App\Controllers\BaseController;
use App\Models\KeuanganModel;
use App\Models\AkunKeuanganModel;
use App\Models\AksesKeuanganModel;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

class KeuanganController extends BaseController
{
    protected $KeuanganModel;
    protected $AkunKeuanganModel;
    protected $AksesKeuanganModel;
    protected $helpers = ['form'];

    public function __construct()
    {
        $this->KeuanganModel = new KeuanganModel();
        $this->AkunKeuanganModel = new AkunKeuanganModel();
        $this->AksesKeuanganModel = new AksesKeuanganModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Keuangan BAIM',
            'daftar_keuangan' => $this->KeuanganModel->orderBy('created_at', 'DESC')->getAll()
        ];
        return view('bendahara/keuangan/index', $data);
    }

    // Fungsi Untuk Membuka Halaman Create/Tambah

    // Fungsi Tambah Data keuangan
    public function create()
    {
        $data = [
            'title' => 'Tambah Keuangan',
            'validation' => \Config\Services::validation(),
            'daftar_akunkeuangan' => $this->AkunKeuanganModel->findAll(),
            'daftar_akseskeuangan' => $this->AksesKeuanganModel->findAll()
        ];

        return view('bendahara/keuangan/create', $data);
    }

    // Fungsi Simpan 
    public function save()
    {
        // Deklarasi Nailai Slug Jabatan
        $slug = url_title($this->request->getvar('keterangan'), '-', TRUE);

        // Deklarasi Tabel Jabatan
        $daftar_keuangan = $this->KeuanganModel->orderBy('created_at', 'DESC')->getAll();

        // Ambil Gambar
        $gambar = $this->request->getFile('foto_bukti');

        //Ambil Nama Gambar
        $namaGambar = $gambar->getName('');

        //Menuliskan ke direktori
        $gambar->move(WRITEPATH . '../public/assets-bendahara/img/foto-bukti', $namaGambar);

        $uuid4 = Uuid::uuid4();


        // Simpan Data ke DataBase
        $data = [
            'title' => 'Tambah keuangan',
            'id_keuangan' => $uuid4->toString(),
            'tanggal_transaksi' => esc($this->request->getvar('tanggal_transaksi')),
            'id_akunkeuangan' => esc($this->request->getvar('akunkeuangan')),
            'id_akseskeuangan' => esc($this->request->getvar('akseskeuangan')),
            'keterangan' => esc($this->request->getvar('keterangan')),
            'masuk' => esc($this->request->getvar('masuk')),
            'keluar' => esc($this->request->getvar('keluar')),
            'slug' => $slug,
            'foto_bukti' => $namaGambar,
            'validation' => \Config\Services::validation(),
            'daftar_keuangan' => $daftar_keuangan,
            'daftar_akunkeuangan' => $this->AkunKeuanganModel->findAll(),
            'daftar_akseskeuangan' => $this->AksesKeuanganModel->findAll()
        ];

        $rules = $this->validate([
            'keterangan' => 'required'
        ]);

        if (!$rules) {
            session()->setFlashdata('failed', 'Data keuangan gagal ditambahkan !');
            return view('bendahara/keuangan/create', $data);
        } {
            $this->KeuanganModel->insert($data);
            return redirect()->to('/keuangan')->with('success', 'Data keuangan Berhasil Ditambahkan');
        }
    }

    public function delete($id_keuangan)
    {
        $this->KeuanganModel->join('akunkeuangan', 'akunkeuangan.id_akunkeuangan = keuangan.id_akunkeuangan')->join('akseskeuangan', 'akseskeuangan.id_akseskeuangan = keuangan.id_akseskeuangan')->where('id_keuangan', $id_keuangan)->delete();
        return redirect()->back()->with('success', 'Data Berhasil Dihapus');
    }


    public function detail($slug_keuangan)
    {
        $keuangan = $this->KeuanganModel->getKeuangan($slug_keuangan);
        $data = [
            'title' => 'Detail keuangan',
            'keuangan' => $keuangan,
            // 'nama_lengkap' => esc($this->request->getvar('nama_lengkap'))
        ];

        if (empty($data['keuangan'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama keuangan dengan slug : ' . $slug_keuangan . ' tidak ditemukan !');
        }
        return view('bendahara/keuangan/detail', $data);
    }

    public function form_update($slug_keuangan)
    {

        $data = [
            'title' => "Edit Data keuangan",
            'keuangan' => $this->KeuanganModel->getKeuangan($slug_keuangan),
            'daftar_akunkeuangan' => $this->AkunKeuanganModel->findAll(),
            'daftar_akseskeuangan' => $this->AksesKeuanganModel->findAll()
        ];

        if (empty($data['keuangan'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama keuangan dengan slug : ' . $slug_keuangan . ' tidak ditemukan !');
        }
        return view('bendahara/keuangan/edit', $data);
    }

    public function update($id_keuangan)
    {
        // Ambil Gambar
        $gambar = $this->request->getFile('foto_bukti');

        //Ambil Nama Gambar
        $namaGambar = $gambar->getName('');

        //Menuliskan ke direktori
        $gambar->move(WRITEPATH . '../public/assets-bendahara/img/foto-bukti', $namaGambar);

        $data = [
            'tanggal_transaksi' => esc($this->request->getvar('tanggal_transaksi')),
            'id_akunkeuangan' => esc($this->request->getvar('akunkeuangan')),
            'id_akseskeuangan' => esc($this->request->getvar('akseskeuangan')),
            'keterangan_keuangan' => esc($this->request->getvar('keterangan_keuangan')),
            'nominal_keuangan' => esc($this->request->getvar('nominal_keuangan')),
            'slug_keuangan' => url_title($this->request->getvar('keterangan_keuangan'), '-', TRUE),
            'foto_bukti' => $namaGambar,
        ];

        $this->KeuanganModel->update($id_keuangan, $data);

        return redirect()->back()->with('success', 'Data Keuangan Berhasil Diubah');
    }
}
