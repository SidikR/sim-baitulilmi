<?php

namespace App\Models;

use CodeIgniter\Model;

class KeuanganModel extends Model
{
    // protected $DBGroup          = 'default';
    protected $table            = 'keuangan';
    protected $primaryKey       = 'id_keuangan';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $allowedFields    = ['id_keuangan', 'id_akseskeuangan', 'id_akunkeuangan', 'tanggal_transaksi', 'keterangan', 'masuk', 'keluar', 'slug', 'foto_bukti', 'jenis_keuangan'];

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

    public function getKeuangan($id_keuangan = false)
    {
        if ($id_keuangan == false) {
            return $this->getAll();
        }

        return $this->join('akunkeuangan', 'akunkeuangan.id_akunkeuangan = keuangan.id_akunkeuangan')->join('akseskeuangan', 'akseskeuangan.id_akseskeuangan = keuangan.id_akseskeuangan')->where(['id_keuangan' => $id_keuangan])->first();
    }

    // Join Tabel Keuangan dan Jabatan
    public function getAllWithType($tipe)
    {
        $builder = $this->db->table('keuangan');
        $builder->join('akunkeuangan', 'akunkeuangan.id_akunkeuangan = keuangan.id_akunkeuangan');
        $builder->join('akseskeuangan', 'akseskeuangan.id_akseskeuangan = keuangan.id_akseskeuangan');
        if ($tipe != 2) {
            $builder->where(['jenis_keuangan' => $tipe]);
        }
        $query = $builder->get();
        return $query->getResult();
    }

    public function getAll()
    {
        $builder = $this->db->table('keuangan');
        $builder->join('akunkeuangan', 'akunkeuangan.id_akunkeuangan = keuangan.id_akunkeuangan');
        $builder->join('akseskeuangan', 'akseskeuangan.id_akseskeuangan = keuangan.id_akseskeuangan');
        $builder->orderBy('tanggal_transaksi', 'DESC');
        $query = $builder->get();
        return $query->getResult();
    }

    public function sumMasuk()
    {
        $builder = $this->db->table('keuangan');
        $builder->selectSum('masuk');
        $query = $builder->get();
        return $query->getResult();
    }

    public function sumKeluar()
    {
        $builder = $this->db->table('keuangan');
        $builder->selectSum('keluar');
        $query = $builder->get();
        return $query->getResult();
    }

    public function sumAkunMasuk($akun)
    {
        $builder = $this->db->table('keuangan');
        $builder->where(['id_akunkeuangan' => $akun]);
        $builder->selectSum('masuk');
        $query = $builder->get();
        return $query->getResult();
    }

    public function sumAkunKeluar($akun)
    {
        $builder = $this->db->table('keuangan');
        $builder->where(['id_akunkeuangan' => $akun]);
        $builder->selectSum('keluar');
        $query = $builder->get();
        return $query->getResult();
    }

    public function getAllMasuk()
    {
        $builder = $this->db->table('keuangan');
        $builder->join('akunkeuangan', 'akunkeuangan.id_akunkeuangan = keuangan.id_akunkeuangan');
        $builder->join('akseskeuangan', 'akseskeuangan.id_akseskeuangan = keuangan.id_akseskeuangan');
        $builder->where(['masuk !=' => null]);
        $builder->orderBy('tanggal_transaksi', 'DESC');
        $query = $builder->get();
        return $query->getResult();
    }

    public function getAllKeluar()
    {
        $builder = $this->db->table('keuangan');
        $builder->join('akunkeuangan', 'akunkeuangan.id_akunkeuangan = keuangan.id_akunkeuangan');
        $builder->join('akseskeuangan', 'akseskeuangan.id_akseskeuangan = keuangan.id_akseskeuangan');
        $builder->where(['keluar !=' => null]);
        $builder->orderBy('tanggal_transaksi', 'DESC');
        $query = $builder->get();
        return $query->getResult();
    }
}
