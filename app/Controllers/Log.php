<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LogModel;

class Log extends BaseController
{
    public function __construct()
    {
        $this->log = new LogModel();
    }
    public function index()
    {
        $data = [
            'title' => 'BAMS RESTO',
            'log' => $this->log->findAll(),
            'judul' => 'Log aktifitas'
        ];
        return view('log/index', $data);
    }
}
