<?php

namespace App\Models;

use CodeIgniter\Model;

class KegiatanModel extends Model
{
    protected $table            = 'kegiatan';
    protected $primaryKey       = 'id_kegiatan';
    protected $returnType       = 'object';
    protected $protectFields    = true;
    protected $allowedFields    = ['nama_kegiatan', 'waktu_mulai_kegiatan', 'waktu_berakhir_kegiatan', 'slug_kegiatan', 'penyelenggara_kegiatan', 'tempat_kegiatan', 'deskripsi_kegiatan', 'foto_kegiatan'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    protected $useSoftDeletes = false;


    // Fungsi Untuk Mengambil Data sesuai Slug
    public function getKegiatan($slug_kegiatan = false)
    {
        if ($slug_kegiatan == false) {
            return $this->findAll();
        }
        return $this->where(['slug_kegiatan' => $slug_kegiatan])->first();
    }

    public function getTopFour()
    {
        $builder = $this->db->table('kegiatan');
        $builder->orderBy('waktu_mulai_kegiatan', 'DESC')->limit(3);
        $query = $builder->get();
        return $query->getResult();
    }

    public function getMaxId()
    {
        $builder = $this->db->table('kegiatan');
        $builder->selectMax('id_kegiatan');
        $query = $builder->get();
        return $query->getResult();
    }

    public function getNameFoto($id)
    {
        $builder = $this->db->table('kegiatan');
        $builder->select('foto_kegiatan'); // Hanya mengambil kolom 'foto_petugas_ jumat'
        $builder->where(['id_kegiatan' => $id]);
        $query = $builder->get();

        // Pastikan ada hasil yang ditemukan sebelum mengambil data
        if ($query->getResult()) {
            // Jika Anda hanya ingin satu foto_kegiatan, gunakan getRow() daripada getResult()
            return $query->getRow()->foto_kegiatan;
        } else {
            // Jika data tidak ditemukan, Anda bisa mengembalikan nilai null atau pesan error sesuai kebutuhan
            return null;
        }
    }

    public function getSlug($id)
    {
        $builder = $this->db->table('kegiatan');
        $builder->select('slug_kegiatan'); // Hanya mengambil kolom 'slug_kegiatan'
        $builder->where(['id_kegiatan' => $id]);
        $query = $builder->get();

        // Pastikan ada hasil yang ditemukan sebelum mengambil data
        if ($query->getResult()) {
            // Jika Anda hanya ingin satu foto_kegiatan, gunakan getRow() daripada getResult()
            return $query->getRow()->slug_kegiatan;
        } else {
            // Jika data tidak ditemukan, Anda bisa mengembalikan nilai null atau pesan error sesuai kebutuhan
            return null;
        }
    }
}
