<?php

namespace App\Controllers\Pages;

use App\Controllers\BaseController;
use App\Models\PeminjamanMasjidModel;

class TransferController extends BaseController
{
    protected $PeminjamanMasjidModel;
    protected $helpers = ['form', 'auth'];

    public function __construct()
    {
        $this->PeminjamanMasjidModel = new PeminjamanMasjidModel();
    }

    public function index($id_peminjaman)
    {
        $daftar_peminjaman_masjid = $this->PeminjamanMasjidModel->getPeminjaman($id_peminjaman);
        $data = [
            'title' => "Transfer Infaq",
            'data_peminjaman_masjid' => $daftar_peminjaman_masjid,
        ];

        return view('pages/inventaris/transfer', $data);
    }
}
