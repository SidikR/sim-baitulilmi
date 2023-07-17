<?php

namespace App\Controllers\Pages;

use App\Controllers\BaseController;
use App\Models\FeedbackModel;

class AboutController extends BaseController
{
    protected $FeedbackModel;

    public function __construct()
    {
        $this->FeedbackModel = new FeedbackModel();
    }

    public function index()
    {
        $data = [
            'title' => 'About Baitul Ilmi'
        ];
        return view('pages/about', $data);
    }

    public function send_feedback()
    {
        $data = [
            'nama' => esc($this->request->getVar('name')),
            'no_telepon' => esc($this->request->getVar('no_telepon')),
            'email' => esc($this->request->getVar('email')),
            'subject' => esc($this->request->getVar('subject')),
            'feedback' => esc($this->request->getVar('feedback'))
        ];

        $this->FeedbackModel->insert($data);
        return redirect()->back()->with('success', 'Feedback Anda Berhasil diKirim');
    }
}
