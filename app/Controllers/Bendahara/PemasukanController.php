<?php

namespace App\Controllers\Bendahara;

use App\Controllers\BaseController;
use App\Database\Migrations\Pemasukan;
use App\Models\AksesKeuanganModel;
use App\Models\AkunKeuanganModel;
use App\Models\KeuanganModel;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

class PemasukanController extends BaseController
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
            'title' => 'Pemasukan BAIM',
            'daftar_pemasukan' => $this->KeuanganModel->getAllWithType(0)
        ];
        return view('bendahara/pemasukan/index', $data);
    }

    // Fungsi Untuk Membuka Halaman Create/Tambah

    // Fungsi Tambah Data pemasukan
    public function create()
    {
        $data = [
            'title' => 'Tambah Pemasukan',
            'validation' => \Config\Services::validation(),
            'daftar_akunkeuangan' => $this->AkunKeuanganModel->findAll(),
            'daftar_akseskeuangan' => $this->AksesKeuanganModel->findAll()
        ];

        return view('bendahara/pemasukan/create', $data);
    }

    // Fungsi Simpan 
    public function save()
    {
        // Deklarasi Nailai Slug Jabatan
        $slug = url_title($this->request->getvar('keterangan'), '-', TRUE);

        // Deklarasi Tabel Jabatan
        $daftar_pemasukan = $this->KeuanganModel->orderBy('created_at', 'DESC')->getAll();
        $uuid4 = Uuid::uuid4();

        // Simpan Data ke DataBase
        $data = [
            'title' => 'Tambah pemasukan',
            'id_keuangan' => $uuid4->toString(),
            'tanggal_transaksi' => esc($this->request->getvar('tanggal_transaksi')),
            'id_akunkeuangan' => esc($this->request->getvar('akunkeuangan')),
            'id_akseskeuangan' => esc($this->request->getvar('akseskeuangan')),
            'keterangan' => esc($this->request->getvar('keterangan')),
            'masuk' => esc($this->request->getvar('masuk')),
            'jenis_keuangan' => '0',
            'slug' => $slug,
            'validation' => \Config\Services::validation(),
            'daftar_pemasukan' => $daftar_pemasukan,
            'daftar_akunkeuangan' => $this->AkunKeuanganModel->findAll(),
            'daftar_akseskeuangan' => $this->AksesKeuanganModel->findAll()
        ];

        $rules = $this->validate([
            'masuk' => 'required',
            'keterangan' => 'required',
            'akunkeuangan' => 'required',
            'akseskeuangan' => 'required',
            'tanggal_transaksi' => 'required'
        ]);

        if (!$rules) {
            session()->setFlashdata('failed', 'Data pemasukan gagal ditambahkan !');
            return view('bendahara/pemasukan/create', $data);
        } {
            $this->KeuanganModel->insert($data);
            return redirect()->to('keuangan')->with('success', 'Data pemasukan Berhasil Ditambahkan');
        }
    }

    public function delete($id_keuangan)
    {
        $this->KeuanganModel->join('akunkeuangan', 'akunkeuangan.id_akunkeuangan = pemasukan.id_akunkeuangan')->join('akseskeuangan', 'akseskeuangan.id_akseskeuangan = pemasukan.id_akseskeuangan')->where('id_keuangan', $id_keuangan)->delete();
        return redirect()->back()->with('success', 'Data Berhasil Dihapus');
    }


    public function detail($id_keuangan)
    {
        $pemasukan = $this->KeuanganModel->getKeuangan($id_keuangan);
        $data = [
            'title' => 'Detail pemasukan',
            'pemasukan' => $pemasukan,
            // 'nama_lengkap' => esc($this->request->getvar('nama_lengkap'))
        ];

        if (empty($data['pemasukan'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama pemasukan dengan slug : ' . $id_keuangan . ' tidak ditemukan !');
        }
        return view('bendahara/pemasukan/detail', $data);
    }

    public function form_update($id_keuangan)
    {

        $data = [
            'title' => "Edit Data pemasukan",
            'daftar_pemasukan' => $this->KeuanganModel->getKeuangan($id_keuangan),
            'daftar_akunkeuangan' => $this->AkunKeuanganModel->findAll(),
            'daftar_akseskeuangan' => $this->AksesKeuanganModel->findAll(),
            'validation' => \Config\Services::validation()
        ];

        if (empty($data['daftar_pemasukan'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama pemasukan dengan slug : ' . $id_keuangan . ' tidak ditemukan !');
        }
        return view('bendahara/pemasukan/edit', $data);
    }

    public function update($id_keuangan)
    {

        $data = [
            'tanggal_transaksi' => esc($this->request->getvar('tanggal_transaksi')),
            'id_akunkeuangan' => esc($this->request->getvar('akunkeuangan')),
            'id_akseskeuangan' => esc($this->request->getvar('akseskeuangan')),
            'keterangan' => esc($this->request->getvar('keterangan')),
            'masuk' => esc($this->request->getvar('masuk')),
            'slug' => url_title($this->request->getvar('keterangan'), '-', TRUE),
            'validation' => \Config\Services::validation()
        ];

        $rules = $this->validate([
            'masuk' => 'required',
            'keterangan' => 'required',
            'akunkeuangan' => 'required',
            'akseskeuangan' => 'required',
            'tanggal_transaksi' => 'required'
        ]);

        if (!$rules) {
            return redirect()->to(current_url())->with('failed', 'Data pemasukan gagal ditambahkan !');
        } {
            $this->KeuanganModel->update($id_keuangan, $data);
            return redirect()->to('pemasukan')->with('success', 'Data Pemasukan Berhasil Diubah');
        }
    }
}
