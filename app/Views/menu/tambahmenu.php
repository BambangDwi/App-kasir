<?= $this->extend('pages/index'); ?>

<?= $this->section('content'); ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4"><?= $judul; ?></h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="<?= base_url('/home'); ?>">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('/menu'); ?>">Daftar Menu</a></li>
            <li class="breadcrumb-item active"><?= $judul; ?></li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                <?= $judul; ?>
            </div>
            <p><?= session()->getFlashdata('pesan'); ?></p>
            <form method="post" action="<?= site_url('/menu'); ?>" class="form-control">
                <div class="mb-3">
                    <label for="nama_menu" class="form-label"> Nama Menu</label>
                    <input type="text" name="nama_menu" class="form-control <?= ($validation->hasError('nama_menu')) ? 'is-invalid' : ''; ?>" id="nama_menu" value="<?= old('nama_menu'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('nama_menu'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="text" name="harga" class="form-control <?= ($validation->hasError('harga')) ? 'is-invalid' : ''; ?>" id="harga" value="<?= old('harga'); ?>">
                    <div class=" invalid-feedback">
                        <?= $validation->getError('harga'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <tr>
                        <label for="status_menu" class="form-label">Status Menu</label>
                        <select name="status_menu" class="form-control <?= ($validation->hasError('status_menu')) ? 'is-invalid' : ''; ?>" id="status_menu">
                            <option selected disabled value="-">Pilih Status</option>
                            <option value="tersedia">Tersedia</option>
                            <option value="tidak tersedia">Tidak Tersedia</option>
                        </select>
                        <div class=" invalid-feedback">
                            <?= $validation->getError('status_menu'); ?>
                        </div>
                    </tr>
                </div>
                <div class="invalid-feedback">
                    <?= $validation->getError('status_menu'); ?>
                </div>
                <button type="submit" class="btn btn-primary">Tambah Menu</button>
                <a href="<?= base_url('/menu'); ?>" type="reset" class="btn btn-danger">Batal</a>
            </form>
        </div>

    </div>
</main>
<?= $this->endSection(); ?>