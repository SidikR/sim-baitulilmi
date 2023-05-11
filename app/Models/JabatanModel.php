<?php

namespace App\Models;

use CodeIgniter\Model;

class JabatanModel extends Model
{
    protected $table            = 'jabatan';
    protected $primaryKey       = 'id_jabatan';
    protected $returnType       = 'object';
    protected $protectFields    = true;
    protected $allowedFields    = ['id_jabatan', 'nama_jabatan', 'slug_jabatan', 'deskripsi_jabatan'];


    public function getJabatan($slug_jabatan = false)
    {
        if ($slug_jabatan == false) {
            return $this->findAll();
        }
        return $this->where(['slug_jabatan' => $slug_jabatan])->first();
    }
}
