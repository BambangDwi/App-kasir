<?= $this->extend('pages/index'); ?>

<?= $this->section('content'); ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4"><?= $judul; ?></h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>/home">Dashboard</a></li>
            <li class="breadcrumb-item active"></li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                <?= $judul; ?>
            </div>
            <?php if (session()->id_level != '3') : ?>
                <div class="row">
                    <div class="col-xl-3 col-md-6 m-2">
                        <div class="card bg-primary text-white  text-center mb-4">
                            <div class="card-body">Jumlah User</div>
                            <div class="card-footer">
                                <p class="text-center  d-flex align-items-center justify-content-between"><?= $user; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 m-2">
                        <div class="card bg-success text-white  text-center mb-4">
                            <div class="card-body">Jumlah Menu</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <p class="text-center"><?= $menu; ?></p>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if (session()->id_level == '3') : ?>
                    <div class="col-xl-3 col-md-6 m-2">
                        <div class="card bg-danger text-white  text-center mb-4">
                            <div class="card-body">Jumlah Transaksi</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <p class="text-center"><?= $transaksi; ?></p>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                </div>

</main>
<?= $this->endSection(); ?>