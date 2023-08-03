<?php

namespace App\Controllers\Pages;

use App\Controllers\BaseController;
use App\Database\Migrations\PeminjamanInventaris;
use App\Models\InventarisModel;
use App\Models\PeminjamanInventarisModel;
use App\Models\PeminjamanMasjidModel;
use Intervention\Image\ImageManagerStatic as Image;

class PeminjamanInventarisController extends BaseController
{
    protected $InventarisModel;
    protected $PeminjamanInventarisModel;
    protected $PeminjamanMasjidModel;
    protected $helpers = ['form', 'auth'];
    protected $directoriImageDevelopment = "../public/assets-admin/img/peminjaman/foto-identitas";
    protected $directoriImageProduction = "../../../public_html/baim/assets-admin/img/peminjaman/foto-identitas";
    protected $directoriImageDevelopmentBukti = "../public/assets-admin/img/peminjaman-masjid/bukti-transfer";
    protected $directoriImageProductionBukti = "../../../public_html/baim/assets-admin/img/peminjaman-masjid/bukti-transfer";


    public function __construct()
    {
        $this->InventarisModel = new InventarisModel();
        $this->PeminjamanMasjidModel = new PeminjamanMasjidModel();
        $this->PeminjamanInventarisModel = new PeminjamanInventarisModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Peminjaman',
            'daftar_inventaris' => $this->InventarisModel->orderBy('created_at', 'DESC')->findAll(),
            'validation' => \Config\Services::validation(),

        ];
        return view('pages/inventaris/index', $data);
    }


    public function save()
    {
        $id_max = $this->PeminjamanInventarisModel->getMaxId();
        $metode_infaq = esc($this->request->getvar('metode_infaq'));
        // Deklarasi Nailai Slug Pengurus
        $slugy = url_title($this->request->getvar('nama_penanggungjawab'), '-', TRUE);
        $slug = $slugy . '-' . $id_max[0]->id_peminjaman + 1;
        $gambar = $this->request->getVar('croppedImageInventaris');
        $namaGambar = $slug . '.webp';
        $data_start_index = strpos($gambar, ',') + 1;
        $base64_data = substr($gambar, $data_start_index);
        $decoded_data = base64_decode($base64_data);


        $data = [
            'title' => 'Pinjam Inventaris',
            'id_user' => user_id(),
            'id_barang' => esc($this->request->getvar('nama_inventaris')),
            'qty' => esc($this->request->getvar('qty')),
            'instansi_peminjam' => esc($this->request->getvar('instansi_peminjam')),
            'nama_penanggungjawab' => esc($this->request->getvar('nama_penanggungjawab')),
            'tanggal_dipinjam' => esc($this->request->getvar('tanggal_dipinjam')),
            'tanggal_pengembalian' => esc($this->request->getvar('tanggal_kembali')),
            'infaq' => esc($this->request->getvar('infaq')),
            'metode_infaq' => esc($this->request->getvar('metode_infaq')),
            'foto_identitas' => $namaGambar,
            'validation' => \Config\Services::validation(),
            'daftar_inventaris' => $this->InventarisModel->orderBy('created_at', 'DESC')->findAll()
        ];

        $rules = $this->validate([
            'nama_inventaris' => 'required',
            'qty' => 'required',
            'instansi_peminjam' => 'required',
            'nama_penanggungjawab' => 'required',
            'tanggal_dipinjam' => 'required',
            'tanggal_kembali' => 'required',
            'infaq' => 'required',
            'metode_infaq' => 'required'
        ]);

        if (!$rules) {
            session()->setFlashdata('failed', 'Data inventaris gagal ditambahkan !');
            return view('pages/inventaris/index', $data);
        } {
            $this->PeminjamanInventarisModel->insert($data);
            $img = Image::make($decoded_data);
            if ($this->development) {
                $img->save(WRITEPATH . $this->directoriImageDevelopment . '/' . $namaGambar);
            } else {
                $img->save(WRITEPATH . $this->directoriImageProduction . '/' . $namaGambar);
            }
            if ($metode_infaq == "TRANSFER") {
                $id = $id_max[0]->id_peminjaman + 1;
                return redirect()->to(base_url("invoice-peminjaman-inventaris/" . $id))->with('success', 'Permintaan Telah dikirim, Silakan cek Log Peminjaman di Profile Anda!');
            } {
                return redirect()->to(base_url('peminjaman'))->with('success', 'Permintaan Telah dikirim, Silakan cek Log Peminjaman di Profile Anda!');
            }
        }
    }

    public function index_transfer($id_peminjaman)
    {
        $daftar_peminjaman_inventaris = $this->PeminjamanInventarisModel->getPeminjaman($id_peminjaman);
        $data = [
            'title' => "Transfer Infaq",
            'data_peminjaman_inventaris' => $daftar_peminjaman_inventaris,
        ];

        return view('pages/inventaris/transfer_peminjamaninventaris', $data);
    }

    public function bukti_transfer($id_peminjaman)
    {
        // Ambil Gambar
        $gambar = $this->request->getFile('bukti_transfer');

        //Ambil Nama Gambar
        $namaGambar = $gambar->getName('');

        $data = [
            'title' => 'Tambah Bukti Transfer',
            'bukti_transfer' => $namaGambar,
        ];

        if (empty($namaGambar)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Anda tidak Mengupload Gambar Apapun!  - Silakan Pilih Foto Anda');
        }
        $this->PeminjamanInventarisModel->update($id_peminjaman, $data);
        if ($namaGambar != null) {
            //Menuliskan ke direktori
            if ($this->development) {
                $gambar->move(WRITEPATH . $this->directoriImageDevelopmentBukti, $namaGambar);
            } else {
                $gambar->move(WRITEPATH . $this->directoriImageProductionBukti, $namaGambar);
            }
        }
        return redirect()->to('akun')->with('success', 'Bukti Transfer Berhasil Dikirim');
    }
}
