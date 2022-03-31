<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MenuModel;

class Menu extends BaseController
{
    public function __construct()
    {
        $this->menu = new MenuModel();
    }

    public function index()
    {
        $data = [
            'title' => 'BAMS RESTO',
            'judul' => 'Daftar Menu',
            'menu' => $this->menu->findAll()
        ];
        return view('menu/index', $data);
    }

    public function tambahmenu()
    {
        session();
        $data = [
            'title' => 'BAMS RESTO',
            'judul' => 'Tambah Menu',
            'validation' => \config\Services::validation()
        ];
        return view('menu/tambahmenu', $data);
    }

    public function insertmenu()
    {
        if (!$this->validate(
            [
                'nama_menu' => [
                    'rules' => 'required|is_unique[masakan.nama_menu]',
                    'errors' => [
                        'required' => '{field} Wajib di isi',
                        'is_unique' => '{field} sudah di gunakan'
                    ]
                ],
                'harga' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Wajib di isi'
                    ]
                ],
                'status_menu' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Wajib di isi'
                    ]
                ]
            ]
        )) {
            $validation = \config\services::validation();

            return redirect()->to('/menu/tambahmenu')->withInput('validation', $validation);
        }
        $data = [
            'nama_menu' => $this->request->getVar('nama_menu'),
            'harga' => $this->request->getVar('harga'),
            'status_menu' => $this->request->getVar('status_menu')
        ];

        $query = $this->db->table('masakan')->insert($data);

        if ($this->db->affectedRows() > 0) {
            session()->setFlashData('pesan', '<div class="alert alert-success" role="alert">Menu berhasil ditambahkan!</div>');
            return redirect()->to(site_url('/menu'));
        } else {
            session()->setFlashData('pesan', '<div class="alert alert-danger" role="alert">Menu Gagal ditambahkan!</div>');
            return redirect()->to(site_url('/menu/tambah'));
        }
    }

    public function editmenu($id = NULL)
    {
        $dta = $this->menu->where('id_menu', $id)->first();
        $data =
            [
                'title' => 'BAMS RESTO',
                'menu' => $dta,
                'judul' => 'Edit Menu'
            ];
        return view('menu/editmenu', $data);
    }

    public function editdata($id)
    {
        $data = [
            'nama_menu' => $this->request->getVar('nama_menu'),
            'harga' => $this->request->getVar('harga'),
            'status_menu' => $this->request->getVar('status_menu')
        ];

        $update = $this->menu->update($id, $data);

        if ($update) {
            session()->setFlashData('pesan', '<div class="alert alert-success" role="alert">Menu berhasil diubah!</div>');
            return redirect()->to(site_url('/menu'));
        } else {
            session()->setFlashData('pesan', 'pesan', '<div class="alert alert-danger" role="alert">Menu gagal diubah silahkan cek kembali!</div>');
            return redirect()->to(site_url('/menu/edit'));
        }
    }
    public function deletemenu($id)
    {
        $this->menu->delete($id);
        session()->setFlashData('pesan', '<div class="alert alert-danger" role="alert">Menu berhasil dihapus!</div>');
        return redirect()->to(site_url('/menu'));
    }
}
