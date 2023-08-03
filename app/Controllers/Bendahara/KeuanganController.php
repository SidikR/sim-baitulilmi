<?php

namespace App\Controllers\Bendahara;

use App\Controllers\BaseController;
use App\Models\KeuanganModel;
use App\Models\AkunKeuanganModel;
use App\Models\AksesKeuanganModel;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

class KeuanganController extends BaseController
{
    protected $KeuanganModel;
    protected $AkunKeuanganModel;
    protected $AksesKeuanganModel;
    protected $helpers = ['form'];
    protected $directoriImageDevelopment = "../public/assets-bendahara/img/foto-bukti";
    protected $directoriImageProduction = "../../../public_html/baim/assets-bendahara/img/foto-bukti";

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
            'title' => 'Keuangan Masjid Baitul Ilmi ITERA',
            'validation' => \Config\Services::validation(),
            'daftar_keuangan' => $this->KeuanganModel->getAll(),
            'total_masuk' => $total_masuk[0]->masuk,
            'total_keluar' => $total_keluar[0]->keluar,
            'total_op' => $masuk_op[0]->masuk - $keluar_op[0]->keluar,
            'total_prs' => $masuk_prs[0]->masuk - $keluar_prs[0]->keluar,
            'total_pem' => $masuk_pem[0]->masuk - $keluar_pem[0]->keluar,
            'total_kas' => $total_masuk[0]->masuk - $total_keluar[0]->keluar,
            'daftar_akunkeuangan' => $this->AkunKeuanganModel->findAll(),
            'daftar_akseskeuangan' => $this->AksesKeuanganModel->findAll(),
            'daftar_pemasukan' => $this->KeuanganModel->getAllMasuk(),
            'daftar_pengeluaran' => $this->KeuanganModel->getAllKeluar()

        ];
        return view('bendahara/keuangan/index', $data);
    }

    // Fungsi Untuk Membuka Halaman Create/Tambah

    // Fungsi Tambah Data keuangan
    public function create()
    {
        $data = [
            'title' => 'Tambah Keuangan',
            'validation' => \Config\Services::validation(),
            'daftar_akunkeuangan' => $this->AkunKeuanganModel->findAll(),
            'daftar_akseskeuangan' => $this->AksesKeuanganModel->findAll()
        ];

        return view('bendahara/keuangan/create', $data);
    }

    // Fungsi Simpan 
    public function save()
    {
        // Deklarasi Nailai Slug Jabatan
        $slug = url_title($this->request->getvar('keterangan'), '-', TRUE);

        // Deklarasi Tabel Jabatan
        $daftar_keuangan = $this->KeuanganModel->orderBy('created_at', 'DESC')->getAll();

        // Ambil Gambar
        $gambar = $this->request->getFile('foto_bukti');

        //Ambil Nama Gambar
        $namaGambar = $gambar->getName('');

        $uuid4 = Uuid::uuid4();


        // Simpan Data ke DataBase
        $data = [
            'title' => 'Tambah keuangan',
            'id_keuangan' => $uuid4->toString(),
            'tanggal_transaksi' => esc($this->request->getvar('tanggal_transaksi')),
            'id_akunkeuangan' => esc($this->request->getvar('akunkeuangan')),
            'id_akseskeuangan' => esc($this->request->getvar('akseskeuangan')),
            'keterangan' => esc($this->request->getvar('keterangan')),
            'masuk' => esc($this->request->getvar('masuk')),
            'keluar' => esc($this->request->getvar('keluar')),
            'slug' => $slug,
            'foto_bukti' => $namaGambar,
            'validation' => \Config\Services::validation(),
            'daftar_keuangan' => $daftar_keuangan,
            'daftar_akunkeuangan' => $this->AkunKeuanganModel->findAll(),
            'daftar_akseskeuangan' => $this->AksesKeuanganModel->findAll()
        ];

        $rules = $this->validate([
            'keterangan' => 'required'
        ]);

        if (!$rules) {
            session()->setFlashdata('failed', 'Data keuangan gagal ditambahkan !');
            return view('bendahara/keuangan/create', $data);
        } {
            $this->KeuanganModel->insert($data);
            //Menuliskan ke direktori
            if ($this->development) {
                $gambar->move(WRITEPATH . $this->directoriImageDevelopment, $namaGambar);
            } else {
                $gambar->move(WRITEPATH . $this->directoriImageProduction, $namaGambar);
            }
            return redirect()->to('/keuangan')->with('success', 'Data keuangan Berhasil Ditambahkan');
        }
    }

    public function delete($id_keuangan)
    {
        $this->KeuanganModel->join('akunkeuangan', 'akunkeuangan.id_akunkeuangan = keuangan.id_akunkeuangan')->join('akseskeuangan', 'akseskeuangan.id_akseskeuangan = keuangan.id_akseskeuangan')->where('id_keuangan', $id_keuangan)->delete();
        return redirect()->back()->with('success', 'Data Berhasil Dihapus');
    }


    public function detail($slug_keuangan)
    {
        $keuangan = $this->KeuanganModel->getKeuangan($slug_keuangan);
        $data = [
            'title' => 'Detail keuangan',
            'keuangan' => $keuangan,
            // 'nama_lengkap' => esc($this->request->getvar('nama_lengkap'))
        ];

        if (empty($data['keuangan'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama keuangan dengan slug : ' . $slug_keuangan . ' tidak ditemukan !');
        }
        return view('bendahara/keuangan/detail', $data);
    }

    public function form_update($slug_keuangan)
    {

        $data = [
            'title' => "Edit Data keuangan",
            'keuangan' => $this->KeuanganModel->getKeuangan($slug_keuangan),
            'daftar_akunkeuangan' => $this->AkunKeuanganModel->findAll(),
            'daftar_akseskeuangan' => $this->AksesKeuanganModel->findAll()
        ];

        if (empty($data['keuangan'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama keuangan dengan slug : ' . $slug_keuangan . ' tidak ditemukan !');
        }
        return view('bendahara/keuangan/edit', $data);
    }

    public function update($id_keuangan)
    {
        // Ambil Gambar
        $gambar = $this->request->getFile('foto_bukti');

        //Ambil Nama Gambar
        $namaGambar = $gambar->getName('');

        $data = [
            'tanggal_transaksi' => esc($this->request->getvar('tanggal_transaksi')),
            'id_akunkeuangan' => esc($this->request->getvar('akunkeuangan')),
            'id_akseskeuangan' => esc($this->request->getvar('akseskeuangan')),
            'keterangan_keuangan' => esc($this->request->getvar('keterangan_keuangan')),
            'nominal_keuangan' => esc($this->request->getvar('nominal_keuangan')),
            'slug_keuangan' => url_title($this->request->getvar('keterangan_keuangan'), '-', TRUE),
            'foto_bukti' => $namaGambar,
        ];

        $this->KeuanganModel->update($id_keuangan, $data);

        //Menuliskan ke direktori
        if ($this->development) {
            $gambar->move(WRITEPATH . $this->directoriImageDevelopment, $namaGambar);
        } else {
            $gambar->move(WRITEPATH . $this->directoriImageProduction, $namaGambar);
        }
        return redirect()->back()->with('success', 'Data Keuangan Berhasil Diubah');
    }

    public function import()
    {
        $file = $this->request->getFile('import_keuangan');

        $id_max = $this->KeuanganModel->getMaxId();

        // Check if a file was uploaded
        if ($file === null) {
            return redirect()->back()->with('error', 'No file uploaded!');
        }

        // Check if the uploaded file is a valid Excel file
        if (!$file->isValid() || $file->getClientMimeType() !== 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet') {
            return redirect()->back()->with('error', 'Invalid file format!');
        }

        // Move the uploaded file to a writable directory
        $filePath = WRITEPATH . 'uploads/' . $file->getName();
        $file->move(WRITEPATH . 'uploads/', $file->getName());

        // Load the spreadsheet reader library
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($filePath);

        // Select the first worksheet
        $worksheet = $spreadsheet->getActiveSheet();

        // Get the highest row number in the worksheet
        $highestRow = $worksheet->getHighestRow();

        // Iterate through each row starting from row 3
        foreach ($worksheet->getRowIterator($startRow = 3) as $row) {
            // Get the cell values
            $Tanggal = $worksheet->getCell('B' . $row->getRowIndex())->getValue();
            $Akun = $worksheet->getCell('C' . $row->getRowIndex())->getValue();
            $Akses = $worksheet->getCell('D' . $row->getRowIndex())->getValue();
            $Keterangan = $worksheet->getCell('E' . $row->getRowIndex())->getValue();
            $Masuk = $worksheet->getCell('F' . $row->getRowIndex())->getValue();
            $Keluar = $worksheet->getCell('G' . $row->getRowIndex())->getValue();
            $uuid4 = Uuid::uuid4();
            $slug = $uuid4;

            if ($Akun == "pembangunan" || $Akun == "pem") {
                $setAkun = 1;
            } elseif ($Akun == "operasional" || $Akun == "op") {
                $setAkun = 2;
            } else $setAkun = 3;

            if ($Akses == "Cash") {
                $setAkses = 1;
            } else $setAkses = 2;


            $tanggalObj = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($Tanggal);
            $tanggal = $tanggalObj->format('Y-m-d');


            $data = [
                'id_keuangan' => $uuid4,
                'tanggal_transaksi' => $tanggal,
                'keterangan' => $Keterangan,
                'slug' => $slug,
                'masuk' => $Masuk,
                'keluar' => $Keluar,
                'id_akunkeuangan' => $setAkun,
                'id_akseskeuangan' => $setAkses,
            ];

            // Cek jika nilai keterangan kosong, lompati baris ini
            if (empty($Keterangan)) {
                continue;
            }

            // Insert the data into the database
            $this->KeuanganModel->insert($data);
        }

        // Delete the uploaded file after importing the data
        unlink($filePath);

        // Redirect or display a success message
        return redirect()->to('/keuangan')->with('success', 'Data imported successfully!');
    }
}
