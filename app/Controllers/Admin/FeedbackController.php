<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Database\Migrations\Feedback;
use App\Models\FeedbackModel;

class FeedbackController extends BaseController
{
    protected $FeedbackModel;
    protected $helpers = ['form'];

    public function __construct()
    {
        $this->FeedbackModel = new FeedbackModel();
    }

    public function index()
    {

        $data = [
            'title' => "Feedback",
            'daftar_feedback' => $this->FeedbackModel->findAll()
        ];
        return view('admin/feedback/index', $data);
    }
}
