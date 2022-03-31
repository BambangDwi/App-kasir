<?= $this->extend("pages/index"); ?>
<?= $this->section("content"); ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4"><?= $judul; ?></h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="<?= base_url('/home'); ?>">Dashboard</a></li>
            <li class="breadcrumb-item active"><?= $judul; ?></li>
        </ol>
        <div>
            <?= session()->getFlashdata('pesan'); ?>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                <?= $judul; ?>
                <?php if (session()->id_level == '3') : ?>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="<?= base_url(); ?>/order/order" class="btn btn-primary">Halaman Transaksi</a>
                    </div>
                <?php endif; ?>
            </div>
            <div class="card-body">
                <table id="print" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Id TF</th>
                            <th>petugas</th>
                            <th>Id Order</th>
                            <th>tanggal</th>
                            <th>Total bayar</th>
                            <th>Kembalian</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($transaksi as $key => $value) : ?>
                            <tr>
                                <td><?= $key + 1; ?></td>
                                <td><?= $value->id_transaksi ?></td>
                                <td><?= $value->nama_user ?></td>
                                <td><?= $value->id_order ?></td>
                                <td><?= $value->tanggal ?></td>
                                <td><?= $value->total_bayar ?></td>
                                <td><?= $value->kembalian ?></td>
                            <?php endforeach; ?>
                    </tbody>
                    <tbody>
                        <?php
                        $SUB = 0;

                        foreach ($transaksi as $key => $value) :
                            $kembali = $value->kembalian;
                            $total = $value->total_bayar;
                            $SUB += $total - $kembali;
                        ?>
                            <tr>
                            <?php endforeach; ?>
                            <td colspan="5">Jumlah pemasukan</td>
                            <td><?= $SUB; ?></td>
                            </tr>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</main>
<?= $this->endSection(); ?>