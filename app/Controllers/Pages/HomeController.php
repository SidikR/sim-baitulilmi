<?php

namespace App\Controllers\Pages;

use App\Controllers\BaseController;

class HomeController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard Bendahara - SIM BAIM'
        ];
        return view('pages/home', $data);
    }
}
