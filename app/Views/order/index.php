<?= $this->extend("pages/index"); ?>
<?= $this->section("content"); ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4"><?= $judul; ?></h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="<?= base_url('/home'); ?>">Dashboard</a></li>
            <li class="breadcrumb-item active">pesanan</li>
        </ol>
        <div>
            <?= session()->getFlashdata('pesan'); ?>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                <?= $judul; ?>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a href="<?= base_url('/Order/orderbaru'); ?>" class="btn btn-primary">Tambah order</a>
                </div>
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Id Order</th>
                            <th>nama</th>
                            <!-- <th>Customer</th> -->
                            <th>Petugas</th>
                            <th>Tanggal</th>
                            <th>Id User</th>
                            <th>Status Order</th>
                            <th class="text-center">Bayar</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($order as $key => $value) :
                            $id = $value->id_order;
                        ?>
                            <tr>
                                <td><?= $key + 1; ?></td>
                                <td><?= $value->id_order ?></td>
                                <td><?= $value->no_meja ?></td>
                                <td><?= $value->nama_user; ?></td>
                                <td><?= $value->tanggal ?></td>
                                <td><?= $value->id_user ?></td>
                                <td><?= $value->status_order ?></td>
                                <td class="text-center">
                                    <?php
                                    $result = $detail->getDataIdBayar($id);
                                    foreach ($result as $key => $value) :
                                        $record = $value->record;
                                    ?>
                                        <?php if ($record != 0) : ?>
                                            <a href="<?= base_url('/transaksi/tambah/' . $id) ?>" class="btn btn-primary">Bayar</a>
                                        <?php endif; ?>
                                </td>
                                <td>
                                    <?php if ($record != 0); ?>
                                    <a href="<?= base_url('/order/pesan/' . $id);  ?>" class="btn btn-warning">Pesan Menu</a>
                                    |
                                    <a href="<?= base_url('/order/hapus/' . $id) ?>" class="btn btn-danger">Hapus Pesanan</a>
                                <?php endforeach; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
<?= $this->endSection(); ?>