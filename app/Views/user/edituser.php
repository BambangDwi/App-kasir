<?= $this->extend('pages/index'); ?>

<?= $this->section('content'); ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4"><?= $judul; ?></h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="<?= base_url('/home'); ?>">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('/user'); ?>">Data User</a></li>
            <li class="breadcrumb-item active"><?= $judul; ?></li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                <?= $judul; ?>
            </div>
            <form method="post" action="<?= site_url('user/editdatauser/' . $user->id_user); ?>">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" id="username" value="<?= $user->username; ?>">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password">
                </div>
                <div class="mb-3">
                    <label for="nama_user" class="form-label">nama user</label>
                    <input type="text" name="nama_user" class="form-control" id="nama_user" value="<?= $user->nama_user ?>">
                </div>
                <div class="mb-3">
                    <tr>
                        <label for="id_level" class="form-label">Posisi</label>
                        <select name="id_level" class="form-control" id="id_level" value="<?= $user->id_level ?>">
                            <option selected disabled value="">Posisi</option>
                            <option value="2" <?= ($user->id_level == '2') ? "selected" : "" ?>>Admin</option>
                            <option value="3" <?= ($user->id_level == '3') ? "selected" : "" ?>>Kasir</option>
                            <option value="4" <?= ($user->id_level == '4') ? "selected" : "" ?>>Manager</option>
                        </select>
                    </tr>
                </div>
                <button type="submit" class="btn btn-primary">ubah</button>
                <a href="<?= base_url('/user'); ?>" type="reset" class="btn btn-danger">Batal</a>
            </form>
        </div>
    </div>
</main>
<?= $this->endSection(); ?>