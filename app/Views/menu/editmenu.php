<?= $this->extend('pages/index'); ?>

<?= $this->section('content'); ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4"><?= $judul; ?></h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="<?= base_url('/home'); ?>">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('/user'); ?>">Daftar Menu</a></li>
            <li class="breadcrumb-item active"><?= $judul; ?></li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                <?= $judul; ?>
            </div>
            <form method="post" action="/menu/editdata/<?= $menu->id_menu ?>" class="form-control">
                <div class="mb-3">
                    <label for="nama_menu" class="form-label">Nama Menu</label>
                    <input type="text" name="nama_menu" class="form-control" id="nama_menu" value="<?= $menu->nama_menu ?>">
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="text" name="harga" class="form-control" id="harga" value="<?= $menu->harga ?>">
                </div>
                <div class="mb-3">
                    <tr>
                        <label for="status_menu" class="form-label">Keterangan</label>
                        <select name="status_menu" class="form-control" id="status_menu" value="<?= $menu->status_menu ?>">
                            <option selected disabled value="-">Pilih Status</option>
                            <option value="tersedia" <?= ($menu->status_menu == 'tersedia') ? "selected" : "" ?>>Tersedia</option>
                            <option value="tidak tersedia" <?= ($menu->status_menu == 'tidak tersedia') ? "selected" : "" ?>>Tidak Tersedia</option>
                        </select>
                    </tr>
                </div>
                <button type="submit" class="btn btn-primary">ubah</button>
                <a href="<?= base_url('/menu'); ?>" type="reset" class="btn btn-danger">Batal</a>
            </form>
        </div>
    </div>
</main>
<?= $this->endSection(); ?>