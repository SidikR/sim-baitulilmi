<?php

namespace App\Models;

use CodeIgniter\Model;

class PeminjamanMasjidModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'peminjaman_masjid';
    protected $primaryKey       = 'id_peminjaman';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_user', 'instansi_peminjam', 'nama_penanggungjawab', 'nama_kegiatan', 'deskripsi_kegiatan', 'tanggal_dipinjam', 'tanggal_selesai', 'infaq', 'metode_infaq', 'agreement', 'foto_identitas'];

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
}
