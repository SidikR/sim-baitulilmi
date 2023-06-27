<?php

namespace App\Controllers\Bendahara;

use App\Controllers\BaseController;
use App\Database\Migrations\Pengeluaran;
use App\Models\AksesKeuanganModel;
use App\Models\AkunKeuanganModel;
use App\Models\KeuanganModel;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

class PengeluaranController extends BaseController
{
    protected $AkunKeuanganModel;
    protected $AksesKeuanganModel;
    protected $KeuanganModel;
    protected $helpers = ['form'];

    public function __construct()
    {
        $this->AksesKeuanganModel = new AksesKeuanganModel();
        $this->AkunKeuanganModel = new AkunKeuanganModel();
        $this->KeuanganModel = new KeuanganModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Pengeluaran BAIM',
            'daftar_pengeluaran' => $this->KeuanganModel->getAllWithType(1)
        ];
        return view('bendahara/pengeluaran/index', $data);
    }

    // Fungsi Untuk Membuka Halaman Create/Tambah

    // Fungsi Tambah Data pengeluaran
    public function create()
    {
        $data = [
            'title' => 'Tambah Pengeluaran',
            'validation' => \Config\Services::validation(),
            'daftar_akunkeuangan' => $this->AkunKeuanganModel->findAll(),
            'daftar_akseskeuangan' => $this->AksesKeuanganModel->findAll()
        ];

        return view('bendahara/pengeluaran/create', $data);
    }

    // Fungsi Simpan 
    public function save()
    {
        // Deklarasi Nailai Slug Jabatan
        $slug = url_title($this->request->getvar('keterangan'), '-', TRUE);

        // Deklarasi Tabel Jabatan
        $daftar_pengeluaran = $this->KeuanganModel->orderBy('created_at', 'DESC')->getAll();
        $uuid4 = Uuid::uuid4();

        $gambar = $this->request->getFile('foto_bukti');

        //Ambil Nama Gambar
        $namaGambar = $gambar->getName('');

        //Menuliskan ke direktori
        $gambar->move(WRITEPATH . '../../public_html/baim/assets-bendahara/img/foto-bukti', $namaGambar);

        // Simpan Data ke DataBase
        $data = [
            'title' => 'Tambah pengeluaran',
            'id_keuangan' => $uuid4->toString(),
            'tanggal_transaksi' => esc($this->request->getvar('tanggal_transaksi')),
            'id_akunkeuangan' => esc($this->request->getvar('akunkeuangan')),
            'id_akseskeuangan' => esc($this->request->getvar('akseskeuangan')),
            'keterangan' => esc($this->request->getvar('keterangan')),
            'keluar' => esc($this->request->getvar('keluar')),
            'jenis_keuangan' => '1',
            'foto_bukti' => $namaGambar,
            'slug' => $slug,
            'validation' => \Config\Services::validation(),
            'daftar_pengeluaran' => $daftar_pengeluaran,
            'daftar_akunkeuangan' => $this->AkunKeuanganModel->findAll(),
            'daftar_akseskeuangan' => $this->AksesKeuanganModel->findAll()
        ];

        $rules = $this->validate([
            'keluar' => 'required',
            'keterangan' => 'required',
            'akunkeuangan' => 'required',
            'akseskeuangan' => 'required',
            'tanggal_transaksi' => 'required'
        ]);

        if (!$rules) {
            session()->setFlashdata('failed', 'Data pengeluaran gagal ditambahkan !');
            return view('bendahara/pengeluaran/create', $data);
        } {
            $this->KeuanganModel->insert($data);
            return redirect()->to('keuangan')->with('success', 'Data pengeluaran Berhasil Ditambahkan');
        }
    }

    public function delete($id_keuangan)
    {
        $this->KeuanganModel->join('akunkeuangan', 'akunkeuangan.id_akunkeuangan = pengeluaran.id_akunkeuangan')->join('akseskeuangan', 'akseskeuangan.id_akseskeuangan = pengeluaran.id_akseskeuangan')->where('id_keuangan', $id_keuangan)->delete();
        return redirect()->back()->with('success', 'Data Berhasil Dihapus');
    }


    public function detail($id_keuangan)
    {
        $pengeluaran = $this->KeuanganModel->getKeuangan($id_keuangan);
        $data = [
            'title' => 'Detail pengeluaran',
            'pengeluaran' => $pengeluaran,
            // 'nama_lengkap' => esc($this->request->getvar('nama_lengkap'))
        ];

        if (empty($data['pengeluaran'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama pengeluaran dengan slug : ' . $id_keuangan . ' tidak ditemukan !');
        }
        return view('bendahara/pengeluaran/detail', $data);
    }

    public function form_update($id_keuangan)
    {

        $data = [
            'title' => "Edit Data pengeluaran",
            'daftar_pengeluaran' => $this->KeuanganModel->getKeuangan($id_keuangan),
            'daftar_akunkeuangan' => $this->AkunKeuanganModel->findAll(),
            'daftar_akseskeuangan' => $this->AksesKeuanganModel->findAll(),
            'validation' => \Config\Services::validation()
        ];

        if (empty($data['daftar_pengeluaran'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama pengeluaran dengan slug : ' . $id_keuangan . ' tidak ditemukan !');
        }
        return view('bendahara/pengeluaran/edit', $data);
    }

    public function update($id_keuangan)
    {
        $gambar = $this->request->getFile('foto_bukti');

        //Ambil Nama Gambar
        $namaGambar = $gambar->getName('');

        //Menuliskan ke direktori
        $gambar->move(WRITEPATH . '../../public_html/baim/assets-bendahara/img/foto-bukti', $namaGambar);

        $data = [
            'tanggal_transaksi' => esc($this->request->getvar('tanggal_transaksi')),
            'id_akunkeuangan' => esc($this->request->getvar('akunkeuangan')),
            'id_akseskeuangan' => esc($this->request->getvar('akseskeuangan')),
            'keterangan' => esc($this->request->getvar('keterangan')),
            'keluar' => esc($this->request->getvar('keluar')),
            'slug' => url_title($this->request->getvar('keterangan'), '-', TRUE),
            'validation' => \Config\Services::validation(),
            'foto_bukti' => $namaGambar,
        ];

        $rules = $this->validate([
            'keluar' => 'required',
            'keterangan' => 'required',
            'akunkeuangan' => 'required',
            'akseskeuangan' => 'required',
            'tanggal_transaksi' => 'required'
        ]);

        if (!$rules) {
            return redirect()->to(current_url())->with('failed', 'Data pengeluaran gagal diubah !');
        } {
            $this->KeuanganModel->update($id_keuangan, $data);
            return redirect()->to('pengeluaran')->with('success', 'Data Pengeluaran Berhasil Diubah');
        }
    }

    public function update_foto($id_keuangan)
    {
        // Ambil Gambar
        $gambar = $this->request->getFile('foto_bukti');

        //Ambil Nama Gambar
        $namaGambar = $gambar->getName('');

        $data = [
            'title' => 'Tambah Foto Bukti',
            'foto_bukti' => $namaGambar,
            'validation' => \Config\Services::validation()
        ];

        if (empty($namaGambar)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Anda tidak Mengupload Gambar Apapun!  - Silakan Pilih Foto Anda');
        }
        $this->KeuanganModel->update($id_keuangan, $data);
        $gambar->move(WRITEPATH . '../../public_html/baim/assets-bendahara/img/foto-bukti', $namaGambar);
        return redirect()->to('keuangan')->with('success', 'Data Kegiatan Berhasil Diubah');
    }
}
