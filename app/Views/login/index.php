<!DOCTYPE html>
<html lang="en">

<head>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>BAMS RESTO</title>
        <link href="<?= base_url(); ?>/assets/css/style.css" rel="stylesheet" />
        <link href="<?= base_url(); ?>/assets/css/styles.css" rel="stylesheet" />
        <script src="<?= base_url(); ?>/assets/js/all.min.js" crossorigin="anonymous"></script>
    </head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Login</h3>
                                </div>
                                <div class="card-body">
                                    <form action="<?= site_url('login/masuk'); ?>" method="POST">
                                        <?php if (session()->get('error')) : ?>
                                            <div class="row">
                                                <div class="col-md">
                                                    <div class="alert alert-warning alert-dismissible show fade">
                                                        <div class="alert-body">
                                                            <?= session()->get('error'); ?>
                                                            <?php session()->remove('error'); ?>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                                <div class="form-floating mb-3">
                                                    <input class="form-control" name="username" type="text" placeholder="name@example.com" />
                                                    <label for="Masukkan username...">Username</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input class="form-control" id="inputPassword" name="password" type="password" placeholder="Password" />
                                                    <label for="Masukkan password...">Password</label>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                    <button type="submit" class="btn btn-primary">Login</button>
                                                </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Bambang Project <?= date('Y'); ?></div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="<?= base_url(); ?>/assets/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="<?= base_url(); ?>/assets/js/scripts.js"></script>
</body>

</html>