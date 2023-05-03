<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class DashboardController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard Admin - SIM BAIM'
        ];
        return view('admin/dashboard/index', $data);
    }
}
