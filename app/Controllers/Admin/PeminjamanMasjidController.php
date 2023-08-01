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
            'title' => 'Daftar Peminjaman Masjid',
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
}
