<?php

namespace App\Controllers;

use App\Models\OrderModel;

use App\Controllers\BaseController;

class Pesan extends BaseController
{
    public function index($id)
    {
        $this->order = new OrderModel();
        $order = $this->order->where('id_order', $id)->first();
        // dd($order);
        $data =
            [
                'title' => 'Edit',
                'order' => $order,
                'judul' => 'Edit order'
            ];
        return view('order/pesan', $data);
    }
}
