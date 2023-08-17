<?php

namespace App\Controllers\Pages;

use App\Controllers\BaseController;

class OprecController extends BaseController
{
    public function index()
    {
        //
        $data = [
            'title' => 'Oprec Marbot Masjid'
        ];

        return view('pages/oprec_marbot', $data);
    }
}
