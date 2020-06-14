<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="<?= base_url('') ?>"><i class="fas fa-bars"></i></a>
            </li>

            <li class="nav-item d-sm-inline-block">
                <a href="<?= base_url() ?>" class="nav-link text-dark"><b>Edupon</b>maps</a>
            </li>

            <li class="nav-item d-none d-sm-inline-block">
                <a href="<?= base_url('bangunan/') ?>" class="nav-link">Bangunan</a>
            </li>

            <li class="nav-item d-none d-sm-inline-block">
                <a href="<?= base_url('tentang/') ?>" class="nav-link">Tentang</a>
            </li>


            <?php if ($title == "Eduponmaps") :  ?>
                <!-- SEARCH FORM -->
                <form class="form-inline ml-3" role="search">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="text" id="keyword" autocomplete="off" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="button" id="caribykeyword">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            <?php endif; ?>


            <li class="nav-item d-none d-sm-inline-block">
                <a href="<?= base_url('infographic') ?>" class="nav-link">Infographic</a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <?php if (!($this->session->userdata('username') <> "")) { ?>
                    <a href="<?= base_url('auth') ?>" class="nav-link text-dark">Login</a>
                <?php } else { ?>
                    <a href="<?= base_url('auth\logout') ?>" class="nav-link text-dark">Logout</a>
                <?php } ?>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->