<?php

namespace App\Models;

use CodeIgniter\Model;

class PengurusModel extends Model
{
    protected $table            = 'pengurus';
    protected $primaryKey       = 'id_pengurus';
    protected $returnType       = 'object';
    protected $protectFields    = true;
    protected $allowedFields    = ['id_pengurus', 'nama_lengkap', 'slug_pengurus', 'jenis_kelamin', 'id_jabatan', 'nomor_telepon', 'alamat_pengurus', 'foto_pengurus'];

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
            return $this->findAll();
        }
        return $this->where(['slug_pengurus' => $slug_pengurus])->first();
    }

    // Join Tabel Pengurus dan Jabatan
    public function getAll()
    {
        $builder = $this->db->table('pengurus');
        $builder->join('jabatan', 'jabatan.id_jabatan = pengurus.id_jabatan');
        $query = $builder->get();
        return $query->getResult();
    }
}
