<?= $this->extend("pages/index"); ?>
<?= $this->section("content"); ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4"><?= $judul; ?></h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="<?= base_url('/home'); ?>">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('/order'); ?>">pesanan</a></li>
            <li class="breadcrumb-item active"><?= $judul; ?></li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                <?= $judul; ?>
            </div>
            <p><?= session()->getFlashdata('pesan'); ?></p>
            <form method="post" action="<?= site_url('/menuorder'); ?>">
                <div class="mb-3">
                    <input type="hidden" name="id_user" class="form-control " id="id_user" value="<?= session('id_user'); ?>">
                </div>
                <div class="mb-3">
                    <label for="no_meja" class="form-label">Nomor Meja</label>
                    <input type="text" name="no_meja" class="form-control" id="no_meja" value="">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="<?= base_url(); ?>/order" type="reset" class="btn btn-danger">Batal</a>
            </form>
        </div>

    </div>
</main>
<?= $this->endSection(); ?>