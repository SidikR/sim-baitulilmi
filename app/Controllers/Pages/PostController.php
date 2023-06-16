<?php

namespace App\Controllers\Pages;

use CodeIgniter\Database\Database;
use App\Controllers\BaseController;
use App\Models\PostModel;
use App\Models\CommentModel;
use CodeIgniter\Commands\Utilities\Publish;
use CodeIgniter\Validation\Rules;
use Config\App;
use JetBrains\PhpStorm\Internal\ReturnTypeContract;


class PostController extends BaseController
{
    protected $PostModel;
    protected $commentModel;
    protected $helpers = ['form', 'auth'];


    public function __construct()
    {
        $this->PostModel = new PostModel();
        $this->commentModel = new CommentModel();
    }

    public function index()
    {
        $commentModel = new CommentModel();

        $data = [
            'title' => 'Daftar Post',
            'daftar_post' => $this->PostModel->paginate(6),
            'pager' => $this->PostModel->pager,
            'uniqe_kategori' => $this->PostModel->getKategori(),
            'commentModel' => $commentModel,
        ];

        return view('pages/post/index', $data);
    }


    public function detail($id)
    {
        $u_kategori = $this->PostModel->getKategori();
        $comments = $this->commentModel->getCommentsByPostId($id);
        $commentModel = new CommentModel();
        $countComment = $this->commentModel->getCountCommentPost($id);

        $data = [
            'title' => 'Detail Post',
            'post' => $this->PostModel->getPost($id),
            'daftar_post' => $this->PostModel->paginate(6),
            'uniqe_kategori' => $u_kategori,
            'comments' => $comments,
            'commentModel' => $commentModel,
            'countComment' => $countComment

        ];

        // dd($data);

        if (empty($data['post'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama Post dengan slug : ' . $id . ' tidak ditemukan !');
        }
        // dd($data);
        return view('pages/post/detail', $data);
    }

    public function store($id)
    {
        $postID = $this->request->getVar('post_id');
        $userID = $this->request->getVar('user_id');
        $comment = $this->request->getVar('comment');
        $parentID = $this->request->getVar('parent_id'); // ID komentar yang dibalas, jika ada
        $createdAt = date('Y-m-d');

        $data = [
            'post_id' => $postID,
            'user_id' => $userID,
            'foto_user' => user()->foto_user,
            'nama_user' => user()->nama_lengkap,
            'comment' => $comment,
            'parent_id' => $parentID,
            'created_at' => $createdAt
        ];
        // dd($data);
        $this->commentModel->insert($data);

        return redirect()->back()->with('success', 'Komentar Berhasil Ditambahkan');;
    }
}
