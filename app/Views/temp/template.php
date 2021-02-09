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
    <link rel="stylesheet" href="<?= base_url() ?>/css/style.css">
    <!-- JS -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <title>SIMAPRO</title>
</head>

<body>
    <div class="background">
        <!-- IF not logged in -> this won't appear -->
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
            <!-- ENDIF -->

            <?= $this->renderSection('content'); ?>

            <!-- IF not logged in -> this won't appear -->
            <div class="footer">
                <p class="foot1">
                    Sistem Manajemen Proyek (SIMAPRO)
                </p>
                <p class="foot2">
                    Copyright @ 2021 by ABAY
                </p>
            </div>
        </div>
        <!-- ENDIF -->

</body>

</html>