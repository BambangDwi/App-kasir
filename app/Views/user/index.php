<?= $this->extend('pages/index'); ?>

<?= $this->section('content'); ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4"><?= $judul; ?></h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="<?= base_url('/home'); ?>">Dashboard</a></li>
            <li class="breadcrumb-item active"><?= $judul; ?>
            </li>
        </ol>
        <div>
            <?= session()->getFlashdata('pesan'); ?>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                <?= $judul; ?>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a class="btn btn-primary" href="<?= base_url(); ?>/user/tambah">Tambah User</a>
                </div>
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Level</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($user as $key => $value) : ?>
                            <tr>
                                <td><?= $key + 1; ?></td>
                                <td><?= $value->nama_user ?></td>
                                <td><?= $value->username ?></td>
                                <td><?= $value->nama_level ?></td>
                                <td class="text-center">
                                    <a href="<?= base_url('user/edituser/' . $value->id_user); ?>" class="btn btn-warning">Edit</a>
                                    |
                                    <a href="<?= base_url('User/deleteuser/' . $value->id_user); ?>" onclick="return confirm('data akan dihapus?')" class="btn btn-danger">Hapus</a>
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