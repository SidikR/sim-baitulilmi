<?php

namespace App\Models;

use CodeIgniter\Model;

class CommentModel extends Model
{
    protected $table            = 'comment';
    protected $primaryKey       = 'id';
    protected $returnType       = 'object';
    protected $protectFields    = true;
    protected $allowedFields    = ['user_id', 'post_id', 'comment', 'parent_id', 'foto_user', 'nama_user'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    protected $useSoftDeletes = false;

    public function getCommentsByPostId($postId)
    {
        return $this->where('post_id', $postId)->where('parent_id', null)->findAll();
    }

    public function getRepliesByCommentId($commentId)
    {
        return $this->where('parent_id', $commentId)->findAll();
    }

    public function getCountCommentPost($id_post)
    {
        return $this->where('post_id', $id_post)->countAllResults();
    }
}
