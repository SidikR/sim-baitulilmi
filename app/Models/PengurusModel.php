<?php

namespace App\Models;

use CodeIgniter\Model;

class PengurusModel extends Model
{
    protected $table            = 'pengurus';
    protected $primaryKey       = 'id_pengurus';
    protected $returnType       = 'object';
    protected $protectFields    = true;
    protected $allowedFields    = ['nama_lengkap', 'slug_pengurus', 'jenis_kelamin', 'jabatan', 'nomor_telepon', 'alamat_pengurus', 'foto_pengurus', 'instagram', 'linkedin'];

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
            return $this->orderBy()->findAll();
        }
        return $this->where(['slug_pengurus' => $slug_pengurus])->first();
    }

    public function getMaxId()
    {
        $builder = $this->db->table('pengurus');
        $builder->selectMax('id_pengurus');
        $query = $builder->get();
        return $query->getResult();
    }

    public function getNameFoto($id)
    {
        $builder = $this->db->table('pengurus');
        $builder->select('foto_pengurus'); // Hanya mengambil kolom 'foto_pengurus'
        $builder->where(['id_pengurus' => $id]);
        $query = $builder->get();

        // Pastikan ada hasil yang ditemukan sebelum mengambil data
        if ($query->getResult()) {
            // Jika Anda hanya ingin satu foto_pengurus, gunakan getRow() daripada getResult()
            return $query->getRow()->foto_pengurus;
        } else {
            // Jika data tidak ditemukan, Anda bisa mengembalikan nilai null atau pesan error sesuai kebutuhan
            return null;
        }
    }

    public function getSlug($id)
    {
        $builder = $this->db->table('pengurus');
        $builder->select('slug_pengurus'); // Hanya mengambil kolom 'foto_pengurus'
        $builder->where(['id_pengurus' => $id]);
        $query = $builder->get();

        // Pastikan ada hasil yang ditemukan sebelum mengambil data
        if ($query->getResult()) {
            // Jika Anda hanya ingin satu foto_pengurus, gunakan getRow() daripada getResult()
            return $query->getRow()->slug_pengurus;
        } else {
            // Jika data tidak ditemukan, Anda bisa mengembalikan nilai null atau pesan error sesuai kebutuhan
            return null;
        }
    }
}
