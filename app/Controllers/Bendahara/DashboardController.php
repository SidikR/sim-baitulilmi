<?php

namespace App\Controllers\Bendahara;

use App\Controllers\BaseController;

class DashboardController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard Bendahara - SIM BAIM'
        ];
        return view('bendahara/dashboard/index', $data);
    }
}
