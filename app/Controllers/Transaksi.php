<?php

namespace App\Controllers;

use App\Models\TransaksiModel;
use App\Models\OrderModel;

use App\Controllers\BaseController;

class Transaksi extends BaseController
{
    public function __construct()
    {
        $this->transaksi = new TransaksiModel();
        $this->order = new OrderModel();
    }
    public function index()
    {
        $builder = $this->db->table('transaksi');
        $builder->select('*');
        $builder->join('user', 'transaksi.id_user=user.id_user');
        $query = $builder->get()->getResult();

        $data = [
            'transaksi' => $query,
            'title' => 'BAMS RESTO',
            'judul' => 'Transaksi'
        ];

        return view('transaksi/index', $data);
    }
    public function hapus($id)
    {
        $hapus = $this->transaksi->delete($id);

        if ($hapus) {
            session()->setFlashData('pesan', '<div class="alert alert-danger" role="alert">Menu berhasil dihapus!</div>');
            return redirect()->to(site_url('/transaksi'));
        } else {
            session()->setFlashData('pesan', 'Menu gagal dihapus');
            return redirect()->to(site_url('/transkasi'));
        }
    }
    public function tambah($id)
    {
        $builder = $this->db->table('detail_order');
        $builder->select('*');
        $builder->join('masakan', 'detail_order.id_menu=masakan.id_menu');
        $builder->where('id_order', $id);
        $query = $builder->get()->getResultArray();

        $data = [
            'title' => 'Bayar',
            'detail' => $query
        ];

        return view('transaksi/tambahtransaksi', $data);
    }
    public function insert()
    {
        $id_order = $this->request->getVar('id_order');
        $bayar =  $this->request->getVar('total_bayar');
        $total = $this->request->getVar('total');

        $kembalian = $bayar - $total;

        $data = [
            'id_user' => $this->request->getVar('id_user'),
            'id_order' => $id_order,
            'total_bayar' => $bayar,
            'kembalian' => $kembalian
        ];

        if ($bayar < $total) {
            session()->setFlashData('pesan', '<div class="alert alert-success" role="alert">Uang nya kurang!</div>');
            return redirect()->back();
        }
        $insert = $this->transaksi->insert($data);

        if ($insert) {
            $status = [
                'id_order' => $id_order,
                'status_order' => 'Selesai'
            ];

            $this->order->save($status);
            session()->setFlashData('pesan', '<div class="alert alert-success" role="alert">Order Berhasil dibayar!</div>');
            return redirect()->to(site_url('/transaksi'));
        }
    }
}
