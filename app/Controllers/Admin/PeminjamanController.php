<?php

namespace App\Controllers\Admin;

use CodeIgniter\Database\Database;
use App\Controllers\BaseController;
use CodeIgniter\Commands\Utilities\Publish;
use CodeIgniter\Validation\Rules;
use Config\App;
use JetBrains\PhpStorm\Internal\ReturnTypeContract;
use App\Models\PeminjamanInventarisModel;
use App\Models\InventarisModel;
use App\Models\KeuanganModel;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;


class PeminjamanController extends BaseController
{
    protected $PeminjamanInventarisModel;
    protected $InventarisModel;
    protected $KeuanganModel;
    protected $helpers = ['form', 'auth'];



    public function __construct()
    {
        $this->PeminjamanInventarisModel = new PeminjamanInventarisModel();
        $this->InventarisModel = new InventarisModel();
        $this->KeuanganModel = new KeuanganModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Peminjaman Inventaris',
            'daftar_peminjaman_inventaris' => $this->PeminjamanInventarisModel->getAll(),
            // 'validation' => \Config\Services::validation()
        ];

        return view('admin/peminjaman/index', $data);
    }

    public function accept($id_peminjaman)
    {
        $dpi = $this->PeminjamanInventarisModel->getPeminjaman($id_peminjaman);
        $stok = $dpi->stok_inventaris;
        $qty1 = $dpi->qty;
        $temp = $stok - $qty1;
        $data = [
            'status_peminjaman' => 'accepted',
            'stok_inventaris' => $temp
        ];
        $this->PeminjamanInventarisModel->update($id_peminjaman, $data);
        $this->InventarisModel->update($dpi->id_inventaris, $data);
        return redirect()->back();
    }

    public function done($id_peminjaman)
    {
        $dpi = $this->PeminjamanInventarisModel->getPeminjaman($id_peminjaman);
        $stok = $dpi->stok_inventaris;
        $qty1 = $dpi->qty;
        $temp = $stok + $qty1;
        $data = [
            'daftar_peminjaman_inventaris' => $this->PeminjamanInventarisModel->getAll(),
            'status_peminjaman' => 'done',
            'stok_inventaris' => $temp
        ];

        $this->PeminjamanInventarisModel->update($id_peminjaman, $data);
        $this->InventarisModel->update($dpi->id_inventaris, $data);
        return redirect()->back();
    }

    public function infaqok($id_peminjaman)
    {
        $dpi = $this->PeminjamanInventarisModel->getPeminjaman($id_peminjaman);
        $dk  = $this->KeuanganModel->getAll();
        // Deklarasi Nailai Slug Jabatan

        $keterangan = 'Infaq Peminjaman Inventaris dari ' . $dpi->nama_penanggungjawab;

        $slug = url_title($keterangan);

        $id_akseskeuangan = 2;

        if ($dpi->metode_infaq == 'COD') {
            $id_akseskeuangan = 1;
        }

        $uuid4 = Uuid::uuid4();


        // Simpan Data ke DataBase
        $data = [
            'id_keuangan' => $uuid4->toString(),
            'tanggal_transaksi' => date('Y-m-d'),
            'id_akunkeuangan' => 2,
            'id_akseskeuangan' => $id_akseskeuangan,
            'keterangan' => esc($keterangan),
            'masuk' => esc($dpi->infaq),
            'slug' => $slug,
            'status_infaq' => 'terbayar',
            'validation' => \Config\Services::validation(),
        ];

        $this->KeuanganModel->insert($data);
        $this->PeminjamanInventarisModel->update($id_peminjaman, $data);
        return redirect()->back();
    }

    public function no($id_peminjaman)
    {
        // $dpi = $this->PeminjamanInventarisModel->getPeminjaman($id_peminjaman);
        $data = [
            'daftar_peminjaman_inventaris' => $this->PeminjamanInventarisModel->getAll(),
            'status_peminjaman' => 'rejected',
            'pesan' => esc($this->request->getvar('pesan'))
        ];
        $this->PeminjamanInventarisModel->update($id_peminjaman, $data);
        return redirect()->back();
    }
}
