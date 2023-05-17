<?php

namespace App\Controllers\Pages;

use App\Controllers\BaseController;

class AboutController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'About Baitul Ilmi'
        ];
        return view('pages/about', $data);
    }
}
