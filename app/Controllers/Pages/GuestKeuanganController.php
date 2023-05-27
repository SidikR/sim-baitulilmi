<?php

namespace App\Controllers\Pages;

use App\Controllers\BaseController;
use App\Models\KeuanganModel;
use App\Models\AkunKeuanganModel;
use App\Models\AksesKeuanganModel;

class GuestKeuanganController extends BaseController
{
    protected $KeuanganModel;
    protected $AkunKeuanganModel;
    protected $AksesKeuanganModel;
    protected $helpers = ['form', 'auth'];

    public function __construct()
    {
        $this->KeuanganModel = new KeuanganModel();
        $this->AkunKeuanganModel = new AkunKeuanganModel();
        $this->AksesKeuanganModel = new AksesKeuanganModel();
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
            'title' => 'Transparansi Keuangan',
            'daftar_keuangan' => $this->KeuanganModel->getAll(),
            'daftar_akunkeuangan' => $this->AkunKeuanganModel->findAll(),
            'daftar_akseskeuangan' => $this->AksesKeuanganModel->findAll(),
            'daftar_pemasukan' => $this->KeuanganModel->getAllMasuk(),
            'daftar_pengeluaran' => $this->KeuanganModel->getAllKeluar(),
            'total_op' => $masuk_op[0]->masuk - $keluar_op[0]->keluar,
            'total_prs' => $masuk_prs[0]->masuk - $keluar_prs[0]->keluar,
            'total_pem' => $masuk_pem[0]->masuk - $keluar_pem[0]->keluar,
            'total_kas' => $total_masuk[0]->masuk - $total_keluar[0]->keluar

            // 'daftar_keuangan' => $this->KeuanganModel->orderBy('created_at', 'DESC')->getAll()
        ];
        // dd('daftar_keuangan');
        return view('pages/keuangan', $data);
    }
}
