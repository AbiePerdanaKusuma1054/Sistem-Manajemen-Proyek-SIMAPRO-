<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/css/style.css">

    <!-- JS -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Fontawesome Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Sweet Alerts 2 -->
    <script src="<?= base_url() ?>/assets/sweetalert2.all.min.js"></script>

    <title>SIMAPRO</title>
</head>

<body>
    <div class="background">
        <?php if (session()->has('login') && session()->get('login') == TRUE) : ?>

            <!-- Navigation Bar -->
            <nav class="navbar navbar-expand-sm navbar-dark">
                <a class="navbar-brand li-head" href="<?= base_url() ?>/">
                    <img src="<?= base_url() ?>/img/logo.png" alt="" style="margin-top: -4px;">
                    <span class="brand">SIMAPRO</span></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link li-head" href="#">
                                <img src="<?= base_url() ?>/img/user-icons.png" alt="">
                                <span class="user"><?= session()->get('username') ?></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link li-head" href="<?= base_url() ?>/auth/logout" style="font-size: 12pt;">
                                <img src="<?= base_url() ?>/img/exit.png" alt="Log Out" style="margin-top: -2px;margin-right: 5px;">
                                <span class="quit">Log out</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- End -->

            <!-- Menu Bar -->
            <div class="canvas">
                <div class="menu-list">
                    <a href="<?= base_url() ?>/"><span class="menu-list-title <?= session()->get('dashboard_mode') == TRUE  ? 'active' : ''; ?>">Dashboard</span></a>
                    <div class="line"></div>
                    <a href="<?= base_url() ?>/project"><span class="menu-list-title <?= session()->get('project_mode') == TRUE  ? 'active' : ''; ?>">Project</span></a>
                    <div class="line"></div>
                    <?php if (session()->get('role') == 'admin') : ?>
                        <a href="<?= base_url() ?>/user"><span class="menu-list-title <?= session()->get('user_mode') == TRUE  ? 'active' : ''; ?>">User</span></a>
                        <div class="line"></div>
                    <?php endif ?>
                    <a href="<?= base_url() ?>/client"><span class="menu-list-title <?= session()->get('client_mode') == TRUE  ? 'active' : ''; ?>">Client</span></a>
                    <div class="line"></div>
                    <a href="<?= base_url() ?>/employee"><span class="menu-list-title <?= session()->get('employee_mode') == TRUE  ? 'active' : ''; ?>">Employee</span></a>
                    <div class="line"></div>
                    <a href="<?= base_url() ?>/position"><span class="menu-list-title <?= session()->get('position_mode') == TRUE  ? 'active' : ''; ?>">Positions</span></a>
                </div>
            </div>
            <!-- End -->
        <?php endif; ?>

        <div class="lock">

            <?= $this->renderSection('content'); ?>

            <?php if (session()->has('login') && session()->get('login') == TRUE) : ?>
                <div class="space">
                    <div class="dot">.</div>
                </div>
                <div class="footer">
                    <p class="foot1">
                        Sistem Manajemen Proyek (SIMAPRO)
                    </p>
                    <p class="foot2">
                        © 2021 - KP Ilmu Komputer FMIPA Unila
                    </p>
                </div>
            <?php endif; ?>
        </div>
</body>

</html>