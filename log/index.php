<?= $this->extend('pages/index'); ?>

<?= $this->section('content'); ?>
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
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Log</th>
                            <th>Id User</th>
                            <th>Waktu</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($log as $key => $value) : ?>
                            <tr>
                                <th><?= $key + 1 ?></th>
                                <th><?= $value->id_log ?></th>
                                <th><?= $value->id_user ?></th>
                                <th><?= $value->waktu ?></th>
                                <th><?= $value->aksi; ?></th>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
<?= $this->endSection(); ?>