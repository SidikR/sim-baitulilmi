<?php

namespace App\Models;

use CodeIgniter\Model;

class PemasukanModel extends Model
{
    // protected $DBGroup          = 'default';
    protected $table            = 'pemasukan';
    protected $primaryKey       = 'id_pemasukan';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $allowedFields    = ['id_pemasukan', 'id_akseskeuangan', 'id_akunkeuangan', 'tanggal_transaksi', 'keterangan', 'nominal_pemasukan', 'slug_pemasukan'];

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
    // protected $allowCallbacks = true;petugas
    // protected $beforeInsert   = [];
    // protected $afterInsert    = [];
    // protected $beforeUpdate   = [];
    // protected $afterUpdate    = [];
    // protected $beforeFind     = [];
    // protected $afterFind      = [];
    // protected $beforeDelete   = [];
    // protected $afterDelete    = [];

    public function getPemasukan($slug_pemasukan = false)
    {
        if ($slug_pemasukan == false) {
            return $this->getAll();
        }

        return $this->join('akunkeuangan', 'akunkeuangan.id_akunkeuangan = pemasukan.id_akunkeuangan')->join('akseskeuangan', 'akseskeuangan.id_akseskeuangan = pemasukan.id_akseskeuangan')->where(['slug_pemasukan' => $slug_pemasukan])->first();
    }

    // Join Tabel Pemasukan dan Jabatan
    public function getAll()
    {
        $builder = $this->db->table('pemasukan');
        $builder->join('akunkeuangan', 'akunkeuangan.id_akunkeuangan = pemasukan.id_akunkeuangan');
        $builder->join('akseskeuangan', 'akseskeuangan.id_akseskeuangan = pemasukan.id_akseskeuangan');
        $query = $builder->get();
        return $query->getResult();
    }
}
