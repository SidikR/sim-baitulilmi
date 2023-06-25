<?php

namespace App\Models;

use CodeIgniter\Model;

class PengurusModel extends Model
{
    protected $table            = 'pengurus';
    protected $primaryKey       = 'id_pengurus';
    protected $returnType       = 'object';
    protected $protectFields    = true;
    protected $allowedFields    = ['nama_lengkap', 'slug_pengurus', 'jenis_kelamin', 'jabatan', 'nomor_telepon', 'alamat_pengurus', 'foto_pengurus', 'instagram', 'linkedin'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    protected $useSoftDeletes = false;


    // Fungsi Untuk Mengambil Data sesuai Slug
    public function getPengurus($slug_pengurus = false)
    {
        if ($slug_pengurus == false) {
            return $this->orderBy()->findAll();
        }
        return $this->where(['slug_pengurus' => $slug_pengurus])->first();
    }

    public function getMaxId()
    {
        $builder = $this->db->table('pengurus');
        $builder->selectMax('id_pengurus');
        $query = $builder->get();
        return $query->getResult();
    }
}
