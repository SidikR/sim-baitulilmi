<?php

namespace App\Models;

use CodeIgniter\Model;

class InventarisModel extends Model
{
    // protected $DBGroup          = 'default';
    protected $table            = 'inventaris';
    protected $primaryKey       = 'id_inventaris';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_inventaris', 'nama_inventaris', 'slug_inventaris', 'stok_inventaris', 'deskripsi_inventaris', 'asal_inventaris', 'foto_inventaris'];

    // Dates
    protected $useTimestamps = false;
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

    public function getInventaris($slug_inventaris = false)
    {
        if ($slug_inventaris == false) {
            return $this->findAll();
        }

        return $this->where(['slug_inventaris' => $slug_inventaris])->first();
    }

    public function getTopFour()
    {
        $builder = $this->db->table('inventaris');
        $builder->orderBy('id_inventaris', 'DESC')->limit(4);
        $query = $builder->get();
        return $query->getResult();
    }
}
