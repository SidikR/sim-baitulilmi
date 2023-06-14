<?php

namespace App\Controllers\Pages;

use App\Controllers\BaseController;
use App\Models\KeuanganModel;
use App\Models\KegiatanModel;
use App\Models\InventarisModel;

class HomeController extends BaseController
{

    protected $KeuanganModel;
    protected $KegiatanModel;
    protected $InventarisModel;

    public function __construct()
    {
        $this->KeuanganModel = new KeuanganModel();
        $this->KegiatanModel = new KegiatanModel();
        $this->InventarisModel = new InventarisModel();
    }

    public function index()
    {
        $total_masuk = $this->KeuanganModel->sumMasuk();
        $total_keluar = $this->KeuanganModel->sumKeluar();
        $masuk_op = $this->KeuanganModel->sumAkunMasuk(2);
        $keluar_op = $this->KeuanganModel->sumAkunKeluar(2);
        $masuk_prs = $this->KeuanganModel->sumAkunMasuk(3);
        $keluar_prs = $this->KeuanganModel->sumAkunKeluar(3);
        $masuk_pem = $this->KeuanganModel->sumAkunMasuk(1);
        $keluar_pem = $this->KeuanganModel->sumAkunKeluar(1);
        $data = [
            'title' => 'Selamat Datang - SIM BAIM',
            'daftar_keuangan' => $this->KeuanganModel->getAll(),
            'daftar_akunkeuangan' => $this->AkunKeuanganModel->findAll(),
            'daftar_akseskeuangan' => $this->AksesKeuanganModel->findAll(),
            'daftar_pemasukan' => $this->KeuanganModel->getAllMasuk(),
            'daftar_pengeluaran' => $this->KeuanganModel->getAllKeluar(),
            'daftar_kegiatan' => $this->KegiatanModel->getTopFour(),
            'daftar_inventaris' => $this->InventarisModel->getTopFour(),
            'total_op' => $masuk_op[0]->masuk - $keluar_op[0]->keluar,
            'total_prs' => $masuk_prs[0]->masuk - $keluar_prs[0]->keluar,
            'total_pem' => $masuk_pem[0]->masuk - $keluar_pem[0]->keluar,
            'total_kas' => $total_masuk[0]->masuk - $total_keluar[0]->keluar,
            'validation' => \Config\Services::validation(),
        ];
        return view('pages/home', $data);
    }
}
