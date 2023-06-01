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
    protected $allowedFields    = ['id_user', 'foto_kegiatan', 'instansi_peminjam', 'nama_penanggungjawab', 'nama_kegiatan', 'deskripsi_kegiatan', 'tanggal_dipinjam', 'tanggal_selesai', 'infaq', 'metode_infaq', 'agreement', 'foto_identitas', 'status_peminjaman', 'bukti_transfer', 'status_infaq', 'pesan'];

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
        $builder = $this->db->table('peminjaman_masjid');
        $builder->orderBy('id_peminjaman', 'DESC');
        $builder->join('users', 'users.id = peminjaman_masjid.id_user');
        $query = $builder->get();
        return $query->getResult();
    }

    public function getPeminjaman($id_peminjaman = false)
    {
        if ($id_peminjaman == false) {
            return $this->findAll();
        }
        return $this->join('users', 'users.id = peminjaman_masjid.id_user')->where(['id_peminjaman' => $id_peminjaman])->first();
    }

    public function getAllWithType($tipe)
    {
        $builder = $this->db->table('peminjaman_masjid');
        $builder->orderBy('id_peminjaman', 'DESC');
        $builder->join('users', 'users.id = peminjaman_masjid.id_user');
        $builder->where(['id_user' => $tipe]);
        $query = $builder->get();
        return $query->getResult();
    }

    public function getMaxId()
    {
        $builder = $this->db->table('peminjaman_masjid');
        $builder->selectMax('id_peminjaman');
        $query = $builder->get();
        return $query->getResult();
    }
}
