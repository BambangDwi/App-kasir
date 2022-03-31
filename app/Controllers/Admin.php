<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Admin extends BaseController
{
    public function __construct()
    {
        $this->session = session();
        $this->user = new UserModel();

        //meload validation
        $this->validation = \Config\Services::validation();

        //meload session
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        // cek apakah ada session bernama isLogin
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/');
        }

        // cek id level dari session
        if ($this->session->get('id_level') != 2) {
            return redirect()->to('/home');
        }

        return view('/home');
    }
}
