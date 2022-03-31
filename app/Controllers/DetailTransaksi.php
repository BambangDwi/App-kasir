<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class DetailTransaksi extends BaseController
{
    public function index()
    {
        $data =
            [
                'title' => 'BAMS RESTO'
            ];
        return view('detail transaksi/index', $data);
    }
}
