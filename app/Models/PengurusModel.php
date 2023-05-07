<?php

namespace App\Models;

use CodeIgniter\Model;

class PengurusModel extends Model
{
    //  protected $DBGroup          = 'default';
    protected $table            = 'pengurus';
    protected $primaryKey       = 'id_pengurus';
    protected $returnType       = 'object';
    protected $protectFields    = true;
    protected $allowedFields    = ['nama_lengkap', 'slug_pengurus', 'jenis_kelamin', 'nomor_telepon', 'alamat_pengurus', 'foto_pengurus'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // // Validation
    // protected $validationRules      = [];
    // protected $validationMessages   = [];
    // protected $skipValidation       = false;
    // protected $cleanValidationRules = true;

    // // Callbacks
    // protected $allowCallbacks = true;
    // protected $beforeInsert   = [];
    // protected $afterInsert    = [];
    // protected $beforeUpdate   = [];
    // protected $afterUpdate    = [];
    // protected $beforeFind     = [];
    // protected $afterFind      = [];
    // protected $beforeDelete   = [];
    // protected $afterDelete    = [];

    public function getPengurus($slug_pengurus = false)
    {
        if ($slug_pengurus == false) {
            return $this->findAll();
        }
        return $this->where(['slug_pengurus' => $slug_pengurus])->first();
    }
}
