<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Database\Migrations\PeminjamanInventaris;
use App\Database\Migrations\Pengumuman;
use App\Database\Migrations\Pengurus;
use App\Database\Migrations\PetugasJumat;
use App\Models\PengurusModel;
use App\Models\PetugasJumatModel;
use App\Models\PostModel;
use App\Models\KegiatanModel;
use App\Models\InventarisModel;
use App\Models\PengumumanModel;
use App\Models\AkunModel;
use App\Models\FeedbackModel;
use App\Models\PeminjamanInventarisModel;
use App\Models\PeminjamanMasjidModel;
use App\Models\KeuanganModel;

class DashboardController extends BaseController
{
    protected $PengurusModel;
    protected $PetugasJumatModel;
    protected $PostModel;
    protected $KegiatanModel;
    protected $InventarisModel;
    protected $PengumumanModel;
    protected $AkunModel;
    protected $FeedbackModel;
    protected $PeminjamanInventarisModel;
    protected $PeminjamanMasjidModel;
    protected $KeuanganModel;

    public function __construct()
    {
        $this->PengurusModel = new PengurusModel();
        $this->PetugasJumatModel = new PetugasJumatModel();
        $this->PostModel = new PostModel();
        $this->KegiatanModel = new KegiatanModel();
        $this->InventarisModel = new InventarisModel();
        $this->PengumumanModel = new PengumumanModel();
        $this->AkunModel = new AkunModel();
        $this->FeedbackModel = new FeedbackModel();
        $this->PeminjamanInventarisModel = new PeminjamanInventarisModel();
        $this->PeminjamanMasjidModel = new PeminjamanMasjidModel();
        $this->KeuanganModel = new KeuanganModel();
    }

    public function index()
    {
        $data_card = [
            'data_pengurus' => [
                'count' => $this->PengurusModel->countAllResults(),
                'icon' => 'bi bi-person-badge-fill',
                'title_card' => 'Jumlah Pengurus',
                'color_card' => 'bg-primary',
                'link' => 'pengurus'
            ],
            'data_post' => [
                'count' => $this->PostModel->countAllResults(),
                'icon' => 'bi bi-file-post',
                'title_card' => 'Jumlah Post',
                'color_card' => 'bg-secondary',
                'link' => 'post'
            ],
            'data_kegiatan' => [
                'count' => $this->KegiatanModel->countAllResults(),
                'icon' => 'bi bi-calendar-event',
                'title_card' => 'Jumlah Kegiatan',
                'color_card' => 'bg-orange',
                'link' => 'kegiatan'
            ],
            'data_inventaris' => [
                'count' => $this->InventarisModel->countAllResults(),
                'icon' => 'bi bi-tools',
                'title_card' => 'Jumlah Inventaris',
                'color_card' => 'bg-indigo',
                'link' => 'inventaris'
            ],
            'data_pengumuman' => [
                'count' => $this->PengumumanModel->countAllResults(),
                'icon' => 'bi bi-megaphone-fill',
                'title_card' => 'Jumlah Pengumuman',
                'color_card' => 'bg-yellow',
                'link' => 'pengumuman'
            ],
            'data_feedback' => [
                'count' => $this->FeedbackModel->countAllResults(),
                'icon' => 'bi bi-send-plus',
                'title_card' => 'Jumlah Feedback',
                'color_card' => 'bg-teal',
                'link' => 'feedback'
            ],
            'data_peminjamaninventaris' => [
                'count' => $this->PeminjamanInventarisModel->countAllResults(),
                'icon' => 'bi bi-bag-plus-fill',
                'title_card' => 'Jumlah Peminjaman Inventaris',
                'color_card' => 'bg-green',
                'link' => 'list-peminjaman'
            ],
            'data_peminjamanmasjid' => [
                'count' => $this->PeminjamanMasjidModel->countAllResults(),
                'icon' => 'bi bi-bag-plus',
                'title_card' => 'Jumlah Peminjaman Masjid',
                'color_card' => 'bg-cyan',
                'link' => 'pengumuman-masjid'
            ]
        ];


        $total_masuk = $this->KeuanganModel->sumMasuk();
        $total_keluar = $this->KeuanganModel->sumKeluar();
        $masuk_op = $this->KeuanganModel->sumAkunMasuk(2);
        $keluar_op = $this->KeuanganModel->sumAkunKeluar(2);
        $masuk_prs = $this->KeuanganModel->sumAkunMasuk(3);
        $keluar_prs = $this->KeuanganModel->sumAkunKeluar(3);
        $masuk_pem = $this->KeuanganModel->sumAkunMasuk(1);
        $keluar_pem = $this->KeuanganModel->sumAkunKeluar(1);
        $data = [
            'title' => 'Dashboard Admin',
            'total_masuk' => $total_masuk[0]->masuk,
            'total_keluar' => $total_keluar[0]->keluar,
            'total_op' => $masuk_op[0]->masuk - $keluar_op[0]->keluar,
            'total_prs' => $masuk_prs[0]->masuk - $keluar_prs[0]->keluar,
            'total_pem' => $masuk_pem[0]->masuk - $keluar_pem[0]->keluar,
            'total_kas' => $total_masuk[0]->masuk - $total_keluar[0]->keluar,
            'data_card' => $data_card // Menggabungkan $data_card ke dalam $data
        ];

        // dd($data);
        return view('admin/dashboard/index', $data);
    }
}
