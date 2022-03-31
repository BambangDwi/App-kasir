<?= $this->extend('pages/index') ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>Dashboard/Transaksi</h4>

        <div class="section-body">
            <div class="card">
                <h5 class="card-header">Bayar <a href="<?= site_url('/order') ?>" class="btn btn-primary">
                        kembali
                    </a></h5>
                <?= session()->getFlashdata('pesan'); ?>
                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID ORDER</th>
                                    <th>Nama Masakan</th>
                                    <th>Jumlah</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $tot = 0;

                                foreach ($detail as $key => $value) :
                                    $harga = $value['harga'];
                                    $qty = $value['qty'];
                                    $total = $value['harga'] * $value['qty'];
                                    $tot += $total;
                                ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $value['id_order'] ?></td>
                                        <td><?= $value['nama_menu'] ?></td>
                                        <td class="text-center"><?= $value['qty'] ?></td>
                                        <td><?= $total ?></td>
                                    </tr>

                                <?php endforeach; ?>
                                <tr>
                                    <td colspan="4">Total Harga :</td>
                                    <td><?= $tot ?></td>
                                </tr>
                            </tbody>
                        </table>

                    </div>


                    <form method="post" action="<?= base_url('/transaksi/insert/'); ?>">
                        <div class=" form-group mb-2">
                            <input type="hidden" name="total" value="<?= $total ?>">
                            <input type="hidden" name="id_user" value="<?= session('id_user') ?>">
                            <input type="hidden" name="id_order" value="<?= $value['id_order'] ?>">

                            <div class="form-group mb-2">
                                <label for="exampleInputEmail3">total bayar</label>
                                <input type="number" min="0" name="total_bayar" class="form-control" id="exampleInputName2" placeholder="Harga" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Bayar</button>
                        </div>
                    </form>

                </div>
            </div>
</section>

<?= $this->endSection() ?>