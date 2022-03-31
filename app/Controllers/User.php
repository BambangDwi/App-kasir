<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class User extends BaseController
{
    public function __construct()
    {
        $this->user = new UserModel();
        $this->session = session();
    }

    public function index()
    {
        $data = [
            'title' => 'BAMS RESTO',
            'user' => $this->user->dataUser(),
            'judul' => 'Data User',
            'jumlah' => $this->user->jumlahUser()
        ];
        return view("user/index", $data);
    }

    public function tambahuser()
    {
        $data = [
            'title' => 'BAMS RESTO',
            'judul' => 'Tambah User',
            'validation' => \config\services::validation()
        ];
        return view('user/tambahuser', $data);
    }
    public function insertuser()
    {
        if (!$this->validate(
            [
                'username' => [
                    'rules' => 'required|is_unique[user.username]',
                    'errors' => [
                        'required' => '{field} Wajib di isi',
                        'is_unique' => '{field} sudah di gunakan'
                    ]
                ],
                'password' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Wajib di isi'
                    ]
                ],
                'nama_user' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Wajib di isi'
                    ]
                ],
                'id_level' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Posisi Wajib di isi'
                    ]
                ]
            ]
        )) {
            $validation = \config\services::validation();

            return redirect()->to('/user/tambahuser')->withInput('validation', $validation);
        }
        $pass = $this->request->getVar('password');
        $data = [
            'username' => $this->request->getVar('username'),
            'password' => password_hash($pass, PASSWORD_BCRYPT),
            'nama_user' => $this->request->getVar('nama_user'),
            'id_level' => $this->request->getVar('id_level')
        ];

        $this->db->table('user')->insert($data);

        if ($this->db->affectedRows() > 0) {
            session()->setFlashData('pesan', '<div class="alert alert-success" role="alert">User berhasil ditambahkan!</div>');
            return redirect()->to(site_url('/user'));
        } else {
            session()->setFlashData('pesan', '<div class="alert alert-danger" role="alert">User gagal ditambahkan!</div>');
            return redirect()->to(site_url('/user/tambah'));
        }
    }

    public function edituser($id = NULL)
    {
        $dataedit = $this->user->where('id_user', $id)->first();
        $dataubah =
            [
                'title' => 'BAMS RESTO',
                'user' => $dataedit,
                'judul' => 'Edit User'
            ];
        return view('user/edituser', $dataubah);
    }

    public function editdatauser($id = NULL)
    {
        $pass = $this->request->getVar('password');

        $editdatauser = [
            'username' => $this->request->getVar('username'),
            'password' => password_hash($pass, PASSWORD_BCRYPT),
            'nama_user' => $this->request->getVar('nama_user'),
            'id_level' => $this->request->getVar('id_level')
        ];

        $update = $this->user->update($id, $editdatauser);

        if ($update) {
            session()->setFlashData('pesan', '<div class="alert alert-success" role="alert">User berhasil diubah!</div>');
            return redirect()->to(site_url('/user'));
        } else {
            session()->setFlashData('pesan', '<div class="alert alert-danger" role="alert">User berhasil diubah!</div>');
            return redirect()->to(site_url('/user/edit'));
        }
    }

    public function deleteuser($id)
    {
        $delete = $this->user->delete($id);
        if ($delete) {
            session()->setFlashData('pesan', '<div class="alert alert-success" role="alert">User berhasil dihapus!</div>');
            return redirect()->to(site_url('/user'));
        }
    }
}
