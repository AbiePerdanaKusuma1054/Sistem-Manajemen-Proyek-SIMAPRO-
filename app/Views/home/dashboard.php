<?= $this->extend('temp/template'); ?>

<?= $this->section('content'); ?>
<div class="background">
    <nav class="navbar navbar-expand-sm navbar-dark header">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="<?= base_url() ?>/img/logo.png" alt="" style="margin-top: -4px;">
                <span class="brand">SIMAPRO</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav" style="max-width: 160px;">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <img src="<?= base_url() ?>/img/user-icons.png" alt="">
                            <span class="user">ALEXANDER</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url() ?>/auth/login">
                            <img src="/img/exit.png" alt="" style="margin-top: -2px;">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="lock">
        <!-- Menu Bar -->
        <div class="canvas">
            <div class="menu-list">
                <a href="<?= base_url() ?>/home/dashboard"><span class="menu-list-title active">Dashboard</span></a>
                <div class="line"></div>
                <a href="<?= base_url() ?>/home/project"><span class="menu-list-title">Project</span></a>
                <div class="line"></div>
                <a href="<?= base_url() ?>/home/user"><span class="menu-list-title">User</span></a>
                </ul>
            </div>
        </div>
        <!-- End -->
        <div class="canvas-2">
            <div class="status">
                <div class="back-text">
                    <p class="text">Project Status</p>
                </div>
            </div>
            <div class="backg">
                <a href="#" class="card waiting">
                    <div class="overlay"></div>
                    <div class="circle">
                        <p class="quantity">2</p>
                    </div>
                    <p>Waiting</p>
                </a>
                <a href="#" class="card on-progress">
                    <div class="overlay"></div>
                    <div class="circle">
                        <p class="quantity">10</p>
                    </div>
                    <p>On Progress</p>
                </a>

                <a href="#" class="card hold">
                    <div class="overlay"></div>
                    <div class="circle">
                        <p class="quantity">7</p>
                    </div>
                    <p>Hold</p>
                </a>

                <a href="#" class="card finish">
                    <div class="overlay"></div>
                    <div class="circle">
                        <p class="quantity">76</p>
                    </div>
                    <p>Finish</p>
                </a>

                <a href="#" class="card cancel">
                    <div class="overlay"></div>
                    <div class="circle">
                        <p class="quantity">15</p>
                    </div>
                    <p>Cancel</p>
                </a>
            </div>
            <div class="status">
                <div class="back-text">
                    <p class="text">Payment Status</p>
                </div>
            </div>
            <div class="backg">
                <a href="#" class="card cards notyet">
                    <div class="overlay overlays"></div>
                    <div class="circle">
                        <p class="quantity">7</p>
                    </div>
                    <p>Not Yet</p>
                </a>
                <a href="#" class="card cards pending">
                    <div class="overlay overlays"></div>
                    <div class="circle">
                        <p class="quantity">10</p>
                    </div>
                    <p>Pending</p>
                </a>

                <a href="#" class="card cards complete">
                    <div class="overlay overlays"></div>
                    <div class="circle">
                        <p class="quantity">76</p>
                    </div>
                    <p>Complete</p>
                </a>
            </div>
            <div class="space">
                <p class="dot">.</p>
            </div>
        </div>
    </div>
    <div class="footer">
        <p class="foot1">
            Sistem Manajemen Proyek (SIMAPRO)
        </p>
        <p class="foot2">
            Copyright @ 2021 by ABAY
        </p>
    </div>
</div>

<?= $this->endSection(); ?>