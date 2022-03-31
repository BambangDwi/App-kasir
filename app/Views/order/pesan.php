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
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a href="<?= base_url(); ?>/order/order" class="btn btn-primary">Tambah menu</a>
                </div>
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Id TF</th>
                            <th>Id Order</th>
                            <th>Nama Menu</th>
                            <th>jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($detail as $key => $value) :
                            $id_order = $value->id_order
                        ?>
                            <tr>
                                <td><?= $key + 1; ?></td>
                                <td><?= $value->id_detail_order ?></td>
                                <td><?= $id_order ?></td>
                                <td><?= $value->nama_menu ?></td>
                                <td><?= $value->qty ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <form method="post" action="<?= site_url('/order/pesan'); ?>">
                        <input type="hidden" value="<?= $Id; ?>" name="id_order">
                        <div class="mb-3">
                            <label for="id_memu" class="form-label">Pilih Menu</label>
                            <select name="id_menu" class="form-control" id="id_menu" value="<?= old('id_menu') ?>">
                                <option selected disabled value="-">Pilih Menu</option>
                                <?php foreach ($menu as $key => $value) : ?>
                                    <option value="<?= $value->id_menu; ?>"><?= $value->nama_menu; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="qty" class="form-label">Jumlah</label>
                            <input type="number" name="qty" min="0" class="form-control" id="qty" value="">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="<?= base_url('/order'); ?>" type="reset" class="btn btn-danger">Bayar</a>
                    </form>
                </thead>
            </table>
        </div>
    </div>
</main>
<?= $this->endSection(); ?>