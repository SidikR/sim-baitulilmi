<?php

namespace App\Models;

use CodeIgniter\Model;

class PetugasJumatModel extends Model
{
    protected $table            = 'petugas_jumat';
    protected $primaryKey       = 'id_petugas';
    protected $returnType       = 'object';
    protected $protectFields    = true;
    protected $allowedFields    = ['nama_imam', 'poster', 'jabatan_imam', 'nama_khatib', 'jabatan_khatib', 'nama_muadzin', 'jabatan_muadzin', 'tanggal'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    protected $useSoftDeletes = false;


    // Fungsi Untuk Mengambil Data sesuai Slug
    public function getPetugasJumat($id_petugas = false)
    {
        if ($id_petugas == false) {
            return $this->orderBy()->findAll();
        }
        return $this->where(['id_petugas' => $id_petugas])->first();
    }
}
