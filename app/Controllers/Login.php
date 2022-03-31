<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Login extends BaseController
{
    public function index()
    {
        if (session('id_user') != null) {
            return redirect()->to(site_url('/home'));
        }

        return view('login/index');
    }


    public function masuk()
    {
        $post = $this->request->getPost();
        $query = $this->db->table('user')->getWhere(['username' => $post['username']]);
        $user = $query->getRow();

        if ($user) {
            if (password_verify($post['password'], $user->password)) {
                $params = [
                    'id_user' => $user->id_user,
                    'nama_user' => $user->nama_user,
                    'id_level' => $user->id_level
                ];
                session()->set($params);
                return redirect()->to(site_url('/home'));
            } else {
                return redirect()->back()->withInput()->with('error', 'Password Tidak Valid!');
            }
        } else {
            return redirect()->back()->withInput()->with('error', 'Username Tidak Valid!');
        }
    }

    public function logout()
    {
        session()->remove('id_user');
        session()->remove('id_level');

        return redirect()->to(site_url('login'));
    }
}
