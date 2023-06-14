<?php

namespace App\Models;

use CodeIgniter\Model;

class PostModel extends Model
{
    protected $table            = 'post';
    protected $primaryKey       = 'id_post';
    protected $returnType       = 'object';
    protected $protectFields    = true;
    protected $allowedFields    = ['nama_post', 'slug_post', 'penyelenggara_post', 'deskripsi_post', 'foto_post', 'kategori'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    protected $useSoftDeletes = false;


    // Fungsi Untuk Mengambil Data sesuai Slug
    public function getPost($id_post = false)
    {
        if ($id_post == false) {
            return $this->findAll();
        }
        return $this->where(['id_post' => $id_post])->first();
    }

    public function getTopFour()
    {
        $builder = $this->db->table('post');
        $builder->orderBy('waktu_mulai_post', 'DESC')->limit(4);
        $query = $builder->get();
        return $query->getResult();
    }

    public function getMaxId()
    {
        $builder = $this->db->table('post');
        $builder->selectMax('id_post');
        $query = $builder->get();
        return $query->getResult();
    }

    public function getNews($limit, $offset)
    {
        return $this->findAll($limit, $offset);
    }

    public function getKategori()
    {
        $query = $this->db->table('post')->select('kategori, COUNT(*) as total')->groupBy('kategori')->get();
        return $query->getResult();
    }

    public function countKategori($kategori)
    {
        $query = $this->db->table('post')->where('kategori', $kategori)->countAllResults();
        return $query;
    }
}
