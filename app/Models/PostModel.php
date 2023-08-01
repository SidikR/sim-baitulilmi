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
    public function getPost($slug_post = false)
    {
        if ($slug_post == false) {
            return $this->findAll();
        }
        return $this->where(['slug_post' => $slug_post])->first();
    }

    public function getTopThree()
    {
        $builder = $this->db->table('post');
        $builder->orderBy('created_at', 'DESC')->limit(3);
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

    public function getNameFoto($id)
    {
        $builder = $this->db->table('post');
        $builder->select('foto_post'); // Hanya mengambil kolom 'foto_petugas_ jumat'
        $builder->where(['id_post' => $id]);
        $query = $builder->get();

        // Pastikan ada hasil yang ditemukan sebelum mengambil data
        if ($query->getResult()) {
            // Jika Anda hanya ingin satu foto_post, gunakan getRow() daripada getResult()
            return $query->getRow()->foto_post;
        } else {
            // Jika data tidak ditemukan, Anda bisa mengembalikan nilai null atau pesan error sesuai kebutuhan
            return null;
        }
    }

    public function getSlug($id)
    {
        $builder = $this->db->table('post');
        $builder->select('slug_post'); // Hanya mengambil kolom 'slug_post'
        $builder->where(['id_post' => $id]);
        $query = $builder->get();

        // Pastikan ada hasil yang ditemukan sebelum mengambil data
        if ($query->getResult()) {
            // Jika Anda hanya ingin satu foto_post, gunakan getRow() daripada getResult()
            return $query->getRow()->slug_post;
        } else {
            // Jika data tidak ditemukan, Anda bisa mengembalikan nilai null atau pesan error sesuai kebutuhan
            return null;
        }
    }
}
