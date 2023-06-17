<?php

namespace App\Controllers\Pages;

use App\Controllers\BaseController;
use App\Models\KeuanganModel;
use App\Models\KegiatanModel;
use App\Models\InventarisModel;
use App\Models\PostModel;
use App\Models\FeedbackModel;
use App\Models\ProgramModel;
use PhpParser\Node\Stmt\Return_;

class HomeController extends BaseController
{

    protected $KeuanganModel;
    protected $KegiatanModel;
    protected $InventarisModel;
    protected $PostModel;
    protected $FeedbackModel;
    protected $ProgramModel;

    public function __construct()
    {
        $this->KeuanganModel = new KeuanganModel();
        $this->KegiatanModel = new KegiatanModel();
        $this->InventarisModel = new InventarisModel();
        $this->PostModel = new PostModel();
        $this->FeedbackModel = new FeedbackModel();
        $this->ProgramModel = new ProgramModel();
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
            'daftar_program' => $this->ProgramModel->findAll(),
            'daftar_filter' => $this->ProgramModel->getFilter(),
            'daftar_post' => $this->PostModel->getTopThree(),
            'validation' => \Config\Services::validation(),
        ];
        return view('pages/home', $data);
    }

    public function send_feedback()
    {
        $data = [
            'nama' => esc($this->request->getVar('name')),
            'no_telepon' => esc($this->request->getVar('no_telepon')),
            'email' => esc($this->request->getVar('email')),
            'subject' => esc($this->request->getVar('subject')),
            'feedback' => esc($this->request->getVar('feedback'))
        ];

        $this->FeedbackModel->insert($data);
        return redirect()->back()->with('succes', 'Feedback Anda Berhasil diKirim');
    }
}
