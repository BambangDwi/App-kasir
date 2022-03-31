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
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a href="<?= base_url(); ?>/menu/tambah" class="btn btn-primary">Tambah menu</a>
                </div>
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Menu</th>
                            <th>Harga</th>
                            <th>Status Menu</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($menu as $key => $value) : ?>
                            <tr>
                                <td><?= $key + 1; ?></td>
                                <td><?= $value->nama_menu ?></td>
                                <td><?= $value->harga ?></td>
                                <td><?= $value->status_menu ?></td>
                                <td class="text-center">
                                    <a href="<?= base_url('menu/editmenu/' . $value->id_menu);  ?>" class="btn btn-warning">Edit</a>
                                    |
                                    <a href="<?= base_url('menu/deletemenu/' . $value->id_menu); ?>" onclick="return confirm('data akan dihapus?')" class="btn btn-danger">Hapus</a>
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