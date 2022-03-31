<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">


            <div class="nav">
                <div class="sb-sidenav-menu-heading">Dashboard</div>
                <a class="nav-link" href="<?php base_url(); ?>/home">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>


                <div class="sb-sidenav-menu-heading">Pelayanan</div>
                <?php if (session()->id_level == 4) : ?>
                    <a class="nav-link" href="<?= base_url(); ?>/menu">
                        <div class="sb-nav-link-icon"><i class="fas fa-solid fa-utensils"></i></div>
                        Menu
                    </a>
                <?php endif; ?>

                <?php if (session()->id_level == '2') : ?>
                    <a class="nav-link" href="<?= base_url(); ?>/user">
                        <div class="sb-nav-link-icon"><i class="fas fa solid fa-user"></i></div>
                        User
                    </a>
                <?php endif; ?>

                <?php if (session()->id_level != '2') : ?>
                    <a class="nav-link" href="<?= base_url() ?>/transaksi">
                        <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                        Transaksi
                        <i class="fa-solid fa-cart-shopping"></i>
                    </a>
                <?php endif; ?>
                <?php if (session()->id_level == '3') : ?>
                    <a class="nav-link" href="<?= base_url() ?>/order">
                        <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                        Pesan Menu
                    </a>
                <?php endif; ?>
                <?php if (session()->id_level != '3') : ?>
                    <a class="nav-link" href="<?= base_url() ?>/Log/index">
                        <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                        Aktifitas Log
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </nav>
</div>