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
            return $this->orderBy()->findAll();
        }
        return $this->where(['slug_kegiatan' => $slug_kegiatan])->first();
    }
}
