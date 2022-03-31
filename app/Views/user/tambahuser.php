<?= $this->extend('pages/index'); ?>

<?= $this->section('content'); ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4"><?= $title; ?></h1>
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
            <form method="post" action="<?= site_url('/user'); ?>">
                <div class="mb-3">
                    <label for="username" class="form-label"> Username</label>
                    <input type="text" name="username" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" value="<?= old('username'); ?>" id="username">
                    <div class="invalid-feedback">
                        <?= $validation->getError('username'); ?>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label"> Password</label>
                    <input type="password" name="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" value="<?= old('password'); ?>" id="password">
                    <div class="invalid-feedback">
                        <?= $validation->getError('password'); ?>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="nama_user" class="form-label">Nama User</label>
                    <input type="text" name="nama_user" class="form-control <?= ($validation->hasError('nama_user')) ? 'is-invalid' : ''; ?>" value="<?= old('nama_user'); ?>" id="nama_user">
                    <div class="invalid-feedback">
                        <?= $validation->getError('nama_user'); ?>
                    </div>
                </div>

                <div class="mb-3">
                    <tr>
                        <label for="id_level" class="form-label">Posisi</label>
                        <select name="id_level" class="form-control <?= ($validation->hasError('id_level')) ? 'is-invalid' : ''; ?>" id="id_level">
                            <option selected disabled value="-">Pilih Posisi</option>
                            <option value="2">Admin</option>
                            <option value="3">Kasir</option>
                            <option value="4">Mannager</option>
                        </select>
                        <div class=" invalid-feedback">
                            <?= $validation->getError('id_level'); ?>
                        </div>
                    </tr>
                </div>


                <button type="submit" class="btn btn-primary">Tambah User</button>
                <a href="<?= base_url('/user'); ?>" type="reset" class="btn btn-danger">Batal</a>
            </form>
        </div>
    </div>
</main>
<?= $this->endSection(); ?>