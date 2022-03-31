<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\MenuModel;
use App\Models\TransaksiModel;

class Home extends BaseController
{
    public function __construct()
    {

        $this->user = new UserModel();

        $this->transaksi = new TransaksiModel();

        //meload validation
        $this->validation = \Config\Services::validation();

        //meload session
        $this->session = \Config\Services::session();
    }


    public function index()
    {
        $this->user = new UserModel();
        $this->menu = new MenuModel();
        $data = [
            'title' => 'BAMS RESTO',
            'judul' => 'Dashboard',
            'user' => $this->user->jumlahUser(),
            'menu' => $this->menu->jumlahMenu(),
            'transaksi' => $this->transaksi->jumlahtransaksi()
        ];
        return view('home/index', $data);
    }
}
