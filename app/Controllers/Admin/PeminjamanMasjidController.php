<?php

namespace App\Controllers\Admin;

use CodeIgniter\Database\Database;
use App\Controllers\BaseController;
use CodeIgniter\Commands\Utilities\Publish;
use CodeIgniter\Validation\Rules;
use Config\App;
use JetBrains\PhpStorm\Internal\ReturnTypeContract;
use App\Models\PeminjamanMasjidModel;
use App\Models\KegiatanModel;
use App\Models\KeuanganModel;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;


class PeminjamanMasjidController extends BaseController
{
    protected $PeminjamanMasjidModel;
    protected $KegiatanModel;
    protected $KeuanganModel;
    protected $helpers = ['form', 'auth'];



    public function __construct()
    {
        $this->PeminjamanMasjidModel = new PeminjamanMasjidModel();
        $this->KegiatanModel = new KegiatanModel();
        $this->KeuanganModel = new KeuanganModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Peminjaman',
            'daftar_peminjaman_masjid' => $this->PeminjamanMasjidModel->getAll(),
        ];

        return view('admin/peminjaman-masjid/index', $data);
    }

    public function accept($id_peminjaman)
    {

        $dpi = $this->PeminjamanMasjidModel->getPeminjaman($id_peminjaman);
        $data = [
            'status_peminjaman' => 'accepted',
        ];
        $data_kegiatan = [
            'nama_kegiatan' => $dpi->nama_kegiatan,
            'slug_kegiatan' => url_title($dpi->nama_kegiatan, '-', TRUE),
            'waktu_mulai_kegiatan' => $dpi->tanggal_dipinjam,
            'waktu_berakhir_kegiatan' => $dpi->tanggal_selesai,
            'penyelenggara_kegiatan' => $dpi->instansi_peminjam,
            'tempat_kegiatan' => 'Masjid Baitul Ilmi ITERA',
            'deskripsi_kegiatan' => $dpi->deskripsi_kegiatan,
            'foto_kegiatan' => $dpi->foto_kegiatan,
        ];
        $this->PeminjamanMasjidModel->update($id_peminjaman, $data);
        $this->KegiatanModel->insert($data_kegiatan);
        return redirect()->back();
    }

    public function done($id_peminjaman)
    {
        $dpi = $this->PeminjamanMasjidModel->getPeminjaman($id_peminjaman);
        $data = [
            'daftar_peminjaman_inventaris' => $this->PeminjamanMasjidModel->getAll(),
            'status_peminjaman' => 'done',
        ];

        $this->PeminjamanMasjidModel->update($id_peminjaman, $data);
        return redirect()->back();
    }

    public function infaqok($id_peminjaman)
    {
        $dpi = $this->PeminjamanMasjidModel->getPeminjaman($id_peminjaman);

        $keterangan = 'Infaq Peminjaman Masjid dari Kegiatan ' . $dpi->nama_kegiatan;

        $slug = url_title($keterangan);

        $uuid4 = Uuid::uuid4();

        $id_akseskeuangan = 2;

        if ($dpi->metode_infaq == 'COD') {
            $id_akseskeuangan = 1;
        }


        // Simpan Data ke DataBase
        $data = [
            'status_infaq' => 'terbayar',
            'validation' => \Config\Services::validation(),
        ];

        $data_keuangan = [
            'id_keuangan' => $uuid4->toString(),
            'tanggal_transaksi' => $dpi->tanggal_dipinjam,
            'id_akunkeuangan' => 2,
            'id_akseskeuangan' => $id_akseskeuangan,
            'keterangan' => esc($keterangan),
            'masuk' => esc($dpi->infaq),
            'slug' => $slug,
        ];

        $this->KeuanganModel->insert($data_keuangan);
        $this->PeminjamanMasjidModel->update($id_peminjaman, $data);
        return redirect()->back();
    }

    public function no($id_peminjaman)
    {
        // $dpi = $this->PeminjamanMasjidModel->getPeminjaman($id_peminjaman);
        $data = [
            'daftar_peminjaman_inventaris' => $this->PeminjamanMasjidModel->getAll(),
            'status_peminjaman' => 'rejected',
            'pesan' => esc($this->request->getvar('pesan'))
        ];
        $this->PeminjamanMasjidModel->update($id_peminjaman, $data);
        return redirect()->back();
    }

    public function accept_BuktiTransfer()
    {
    }

    // // Tambah Data Pengurus
    // public function create()
    // {
    //     $daftar_jabatan = $this->JabatanModel->findAll();
    //     $data = [
    //         'daftar_pengurus' => $this->PengurusModel->orderBy('id_pengurus', 'DESC')->getAll(),
    //         'title' => 'Tambah Pengurus',
    //         'validation' => \Config\Services::validation(),
    //         'daftar_jabatan' => $daftar_jabatan
    //     ];

    //     return view('admin/pengurus/create', $data);
    // }



    // public function save()
    // {
    //     // $daftar_jabatan = $this->JabatanModel->findAll();
    //     $uuid4 = Uuid::uuid4();
    //     $id_pengurus = $uuid4->toString();

    //     // Deklarasi Nailai Slug Pengurus
    //     $slug = url_title($this->request->getvar('nama_lengkap'), '-', TRUE);

    //     // Ambil Gambar
    //     $gambar = $this->request->getFile('foto_pengurus');

    //     //Ambil Nama Gambar
    //     $namaGambar = $gambar->getName('');

    //     //Menuliskan ke direktori
    //     $gambar->move(WRITEPATH . '../../../public_html/baim/assets-admin/img/pengurus', $namaGambar);

    //     // Simpan Data ke DataBase
    //     $data = [
    //         'daftar_pengurus' => $this->PengurusModel->orderBy('id_pengurus', 'DESC')->getAll(),
    //         'daftar_jabatan' => $this->JabatanModel->orderBy('id_jabatan', 'DESC')->findAll(),
    //         'title' => 'Tambah Pengurus',
    //         'id_pengurus' => $id_pengurus,
    //         'nama_lengkap' => esc($this->request->getvar('nama_lengkap')),
    //         'slug_pengurus' => $slug,
    //         'jenis_kelamin' => esc($this->request->getvar('jenis_kelamin')),
    //         'id_jabatan' => esc($this->request->getvar('nama_jabatan')),
    //         'nomor_telepon' => esc($this->request->getvar('nomor_telepon')),
    //         'alamat_pengurus' => esc($this->request->getvar('alamat_pengurus')),
    //         'foto_pengurus' => $namaGambar,
    //         'validation' => \Config\Services::validation()
    //     ];

    //     $rules = $this->validate([
    //         'nama_lengkap' => 'required',
    //         'jenis_kelamin' => 'required',
    //         'nomor_telepon' => 'required',
    //         'nama_jabatan' => 'required',
    //         'alamat_pengurus' => 'required'
    //     ]);

    //     if (!$rules) {
    //         session()->setFlashdata('failed', 'Data pengurus gagal ditambahkan !');
    //         return view('admin/pengurus/create', $data);
    //     } {
    //         $this->PengurusModel->insert($data);
    //         return redirect()->to('/pengurus')->with('success', 'Data Pengurus Berhasil Ditambahkan');
    //     }
    // }


    // public function update($id_pengurus)
    // {
    //     // Ambil Gambar
    //     $gambar = $this->request->getFile('foto_pengurus');

    //     //Ambil Nama Gambar
    //     $namaGambar = $gambar->getName();

    //     //Menuliskan ke direktori
    //     $gambar->move(WRITEPATH . '../../../public_html/baim/assets-admin/img/pengurus', $namaGambar);
    //     $slug = url_title($this->request->getvar('nama_lengkap'), '-', TRUE);
    //     //$daftar_pengurus = $this->pengurusModel->getPengurus($slug_pengurus);
    //     $data = [
    //         'nama_lengkap' => esc($this->request->getvar('nama_lengkap')),
    //         'slug_pengurus' => $slug,
    //         'jenis_kelamin' => esc($this->request->getvar('jenis_kelamin')),
    //         'nomor_telepon' => esc($this->request->getvar('nomor_telepon')),
    //         'alamat_pengurus' => esc($this->request->getvar('alamat_pengurus')),
    //         'foto_pengurus' => $namaGambar
    //     ];
    //     $this->PengurusModel->update($id_pengurus, $data);
    //     // $this->PengurusModel->save($data);
    //     return redirect()->back()->with('success', 'Data Pengurus Berhasil Diubah');
    // }

    // public function form_update($slug_pengurus)
    // {
    //     $daftar_pengurus = $this->PengurusModel->getPengurus($slug_pengurus);

    //     $data = [
    //         'title' => "Edit Data Pengurus",
    //         'daftar_pengurus' => $this->PengurusModel->getPengurus($slug_pengurus),
    //     ];

    //     if (empty($data['daftar_pengurus'])) {
    //         throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama Pengurus dengan slug : ' . $slug_pengurus . ' tidak ditemukan !');
    //     }
    //     return view('admin/pengurus/edit', $data);
    // }


    // public function delete($id_pengurus)
    // {
    //     $this->PengurusModel->where('id_pengurus', $id_pengurus)->delete();
    //     return redirect()->back()->with('success', 'Data Berhasil Dihapus');
    // }



    // public function detail($slug_pengurus)
    // {
    //     $pengurus = $this->PengurusModel->getPengurus($slug_pengurus);
    //     $data = [
    //         'title' => 'Detail Pengurus',
    //         'pengurus' => $this->PengurusModel->getPengurus($slug_pengurus),
    //         'nama_lengkap' => esc($this->request->getvar('nama_lengkap'))
    //     ];

    //     if (empty($data['pengurus'])) {
    //         throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama Pengurus dengan slug : ' . $slug_pengurus . ' tidak ditemukan !');
    //     }
    //     return view('admin/pengurus/detail', $data);
    // }
}
