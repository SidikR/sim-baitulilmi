<?php

namespace App\Models;

use CodeIgniter\Model;

class PeminjamanInventarisModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'peminjaman_inventaris';
    protected $primaryKey       = 'id_peminjaman';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_user', 'id_barang', 'qty', 'instansi_peminjam', 'nama_penanggungjawab', 'tanggal_dipinjam', 'tanggal_pengembalian', 'infaq', 'metode_infaq', 'foto_identitas', 'agreement', 'status_peminjaman'];

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

    public function getAll()
    {
        $builder = $this->db->table('peminjaman_inventaris');
        $builder->join('users', 'users.id = peminjaman_inventaris.id_user');
        $builder->join('inventaris', 'inventaris.id_inventaris = peminjaman_inventaris.id_barang');
        $query = $builder->get();
        return $query->getResult();
    }

    public function getPeminjaman($id_peminjaman = false)
    {
        if ($id_peminjaman == false) {
            return $this->findAll();
        }
        return $this->join('users', 'users.id = peminjaman_inventaris.id_user')->join('inventaris', 'inventaris.id_inventaris = peminjaman_inventaris.id_barang')->where(['id_peminjaman' => $id_peminjaman])->first();
    }


    public function get_stok()
    {
        $builder = $this->db->table('peminjaman_inventaris');
        $builder->join('users', 'users.id = peminjaman_inventaris.id_user');
        $builder->join('inventaris', 'inventaris.id_inventaris = peminjaman_inventaris.id_barang');
        $builder->select('stok_inventaris');
        $query = $builder->get();
        return $query;
    }
}
