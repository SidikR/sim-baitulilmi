<?php

namespace App\Models;

use CodeIgniter\Model;

class PengumumanModel extends Model
{
    protected $table            = 'pengumuman';
    protected $primaryKey       = 'id_pengumuman';
    protected $returnType       = 'object';
    protected $protectFields    = true;
    protected $allowedFields    = ['tanggal', 'judul', 'isi'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    protected $useSoftDeletes = false;


    // Fungsi Untuk Mengambil Data sesuai Slug
    public function getPengumuman($id_pengumuman = false)
    {
        if ($id_pengumuman == false) {
            return $this->orderBy()->findAll();
        }
        return $this->where(['id_pengumuman' => $id_pengumuman])->first();
    }
}
