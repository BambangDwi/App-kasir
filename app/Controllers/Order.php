<?php

namespace App\Controllers;

use App\Models\OrderModel;
use App\Models\DetailOrder;
use App\Models\MenuModel;


use App\Controllers\BaseController;

class Order extends BaseController
{
    public function __construct()
    {
        $this->order = new OrderModel();
        $this->menu = new MenuModel();
        $this->detail = new DetailOrder();
    }
    public function index()
    {
        $builder = $this->db->table('order');
        $builder->select('*');
        $builder->join('user', 'user.id_user = order.id_user');
        $builder->where('status_order', 'belum di bayar ');
        $query = $builder->get()->getResult();

        $data = [
            'order' => $query,
            'detail' => $this->detail = new DetailOrder(),
            'title' => 'BAMS RESTO',
            'judul' => 'Pesanan'
        ];
        return view('order/index',  $data);
    }
    public function pesan($id)
    {
        $dta = $this->detail->getDetail($id);
        $menu = $this->menu->findAll();

        $data =
            [
                'title' => 'BAMS RESTO',
                'detail' => $dta,
                'judul' => 'Pesan',
                'menu' => $menu,
                'Id' => $id
            ];
        return view('order/pesan', $data);
    }
    public function order()
    {
        $data =
            [
                'title' => 'BAMS RESTO',
                'judul' => 'Order'
            ];
        return view('order/order', $data);
    }
    public function insertpesan()
    {

        $id = $this->request->getVar('id_order');
        $menu = $this->request->getVar('id_menu');
        $jumlah = $this->request->getVar('qty');

        $data = [
            'id_order' => $id,
            'id_menu' => $menu,
            'qty' => $jumlah
        ];

        $insert = $this->detail->insert($data);

        if ($insert) {
            session()->setFlashData('pesan', '<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan!</div>');

            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }
    public function insert()
    {
        // $nama = $this->request->getVar('nama');
        $nomeja = $this->request->getVar('no_meja');
        $user = $this->request->getVar('id_user');
        $data = [
            // 'nama' => $nama,
            'no_meja' => $nomeja,
            'id_user' => $user,
            'status_order' => 'belum di bayar'
        ];

        $insert = $this->order->insert($data);

        if ($insert) {
            session()->setFlashData('pesan', '<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan!</div>');
            return redirect()->to(site_url('/order'));
        } else {
            session()->setFlashData('pesan', '<div class="alert alert-danger" role="alert">Data Gagal Ditambahkan!</div>');
            return redirect()->to(site_url('/order'));
        }
    }
    public function hapus($id)
    {
        $delete = $this->order->delete($id);
        if ($delete) {
            return redirect()->to(base_url('order'))->with('pesan', '<div class="alert alert-success" role="alert">Data Berhasil Dihapus!</div>');
        } else {
            return redirect()->back()->with('pesan', '<div class="alert alert-success" role="alert">Data Gagal Dihapus!</div>');
        }
    }
    public function hapusPesan($id)
    {
        $find = $this->order->where('id_order', $id)->first();
        $delete = $this->detail->delete($id);
        if ($delete) {
            return redirect()->to(base_url('/order/pesan/' . $id))->with('pesan', '<div class="alert alert-success" role="alert">Data Berhasil Dihapus!</div>');
        } else {
            return redirect()->back()->with('pesan', '<div class="alert alert-success" role="alert">Data Gagal Dihapus!</div>');
        }
    }
}
