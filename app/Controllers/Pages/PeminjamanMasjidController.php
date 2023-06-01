<?php

namespace App\Controllers\Pages;

use App\Controllers\BaseController;
use App\Database\Migrations\PeminjamanMasjid;
use App\Models\PeminjamanMasjidModel;
use App\Models\InventarisModel;
use Dompdf\Dompdf;

class PeminjamanMasjidController extends BaseController
{
    protected $PeminjamanMasjidModel;
    protected $InventarisModel;
    protected $helpers = ['form', 'auth'];


    public function __construct()
    {
        $this->PeminjamanMasjidModel = new PeminjamanMasjidModel();
        $this->InventarisModel = new InventarisModel();
    }


    public function index_transfer($id_peminjaman)
    {
        $daftar_peminjaman_masjid = $this->PeminjamanMasjidModel->getPeminjaman($id_peminjaman);
        $data = [
            'title' => "Transfer Infaq",
            'data_peminjaman_masjid' => $daftar_peminjaman_masjid,
        ];

        return view('pages/inventaris/transfer', $data);
    }

    public function save_masjid()
    {
        // Ambil Gambar
        $gambaridentitas = $this->request->getFile('foto_identitas');
        $gambarkegiatan = $this->request->getFile('foto_kegiatan');

        //Ambil Nama Gambar
        $namaGambarIdentitas = $gambaridentitas->getName('');
        $namaGambarKegiatan = $gambarkegiatan->getName('');

        $metode_infaq = esc($this->request->getvar('metode_infaq'));


        $id_max = $this->PeminjamanMasjidModel->getMaxId();

        $data = [
            'title' => 'Pinjam Masjid',
            'id_user' => user_id(),
            'instansi_peminjam' => esc($this->request->getvar('instansi_peminjam')),
            'nama_kegiatan' => esc($this->request->getvar('nama_kegiatan')),
            'deskripsi_kegiatan' => esc($this->request->getvar('deskripsi_kegiatan')),
            'nama_penanggungjawab' => esc($this->request->getvar('nama_penanggungjawab')),
            'tanggal_dipinjam' => esc($this->request->getvar('tanggal_dipinjam')),
            'tanggal_selesai' => esc($this->request->getvar('tanggal_selesai')),
            'infaq' => esc($this->request->getvar('infaq')),
            'metode_infaq' => esc($this->request->getvar('metode_infaq')),
            'agreement' => esc($this->request->getvar('agreement')),
            'foto_identitas' => $namaGambarIdentitas,
            'foto_kegiatan' => $namaGambarKegiatan,
            'validation' => \Config\Services::validation(),
            'daftar_inventaris' => $this->InventarisModel->orderBy('created_at', 'DESC')->findAll(),
        ];

        $rules = $this->validate([
            'nama_kegiatan' => 'required',
            'deskripsi_kegiatan' => 'required',
            'instansi_peminjam' => 'required',
            'nama_penanggungjawab' => 'required',
            'tanggal_dipinjam' => 'required',
            'tanggal_selesai' => 'required',
            'infaq' => 'required',
            'metode_infaq' => 'required'
        ]);

        if (!$rules) {
            session()->setFlashdata('failed', 'Data Masjid gagal ditambahkan !');
            return view('pages/inventaris/index', $data);
        } {
            $this->PeminjamanMasjidModel->insert($data);
            $gambaridentitas->move(WRITEPATH . '../public/assets-admin/img/peminjaman-masjid/foto-identitas', $namaGambarIdentitas);
            $gambarkegiatan->move(WRITEPATH . '../public/assets-admin/img/kegiatan/', $namaGambarKegiatan);

            if ($metode_infaq == "TRANSFER") {
                $id = $id_max[0]->id_peminjaman + 1;
                return redirect()->to(base_url("transfer/" . $id))->with('success', 'Permintaan Telah dikirim, Silakan cek Log Peminjaman di Profile Anda!');
            } {
                return redirect()->to(base_url('peminjaman'))->with('success', 'Permintaan Telah dikirim, Silakan cek Log Peminjaman di Profile Anda!');
            }
        }
    }

    public function bukti_transfer($id_peminjaman)
    {
        // Ambil Gambar
        $gambar = $this->request->getFile('bukti_transfer');

        //Ambil Nama Gambar
        $namaGambar = $gambar->getName('');

        $data = [
            'title' => 'Tambah Foto Kegiatan',
            'bukti_transfer' => $namaGambar,
        ];

        if (empty($namaGambar)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Anda tidak Mengupload Gambar Apapun!  - Silakan Pilih Foto Anda');
        }
        $this->PeminjamanMasjidModel->update($id_peminjaman, $data);
        $gambar->move(WRITEPATH . '../public/assets-admin/img/peminjaman-masjid/bukti-transfer/', $namaGambar);
        return redirect()->to('akun')->with('success', 'Bukti Transfer Berhasil Dikirim');
    }

    public function pdfinvoice($id_peminjaman)
    {
        $daftar_peminjaman_masjid = $this->PeminjamanMasjidModel->getPeminjaman($id_peminjaman);
        $data = [
            'title' => "Transfer Infaq",
            'data_peminjaman_masjid' => $daftar_peminjaman_masjid,
        ];
        return view('pages/inventaris/pdfinvoice', $data);
    }

    public function generate($id_peminjaman)
    {
        $daftar_peminjaman_masjid = $this->PeminjamanMasjidModel->getPeminjaman($id_peminjaman);
        $data = [
            'title' => "Transfer Infaq",
            'data_peminjaman_masjid' => $daftar_peminjaman_masjid,
        ];

        return view('pages/inventaris/pdfinvoice', $data);

        $filename = date('y-m-d-H-i-s') . '-qadr-labs-report';

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();

        // load HTML content
        $dompdf->loadHtml(view('pages/inventaris/pdfinvoice', $data));

        // (optional) setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // render html as PDF
        $dompdf->render();

        // output the generated pdf
        $dompdf->stream($filename);
    }
}
