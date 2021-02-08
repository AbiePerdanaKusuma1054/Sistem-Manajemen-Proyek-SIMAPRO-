<?= $this->extend('temp/template'); ?>

<?= $this->section('content'); ?>
<div class="background">
    <nav class="navbar navbar-expand-sm navbar-dark header">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="/img/logo.png" alt="" style="margin-top: -4px;">
                <span class="brand">SIMAPRO</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav" style="max-width: 160px;">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <img src="/img/user-icons.png" alt="">
                            <span class="user">ALEXANDER</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/home/login">
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
                <a href="/home/dashboard"><span class="menu-list-title">Dashboard</span></a>
                <div class="line"></div>
                <a href="/home/project"><span class="menu-list-title">Project</span></a>
                <div class="line"></div>
                <a href="#"><span class="menu-list-title active">User</span></a>
                </ul>
            </div>
        </div>
        <!--  -->
        <div class="canvas-2">
            <div class="lay">
                <!-- Button Add -->
                <div class="d-grid gap-2 col-6 mx-auto add">
                    <button class="btn btn-outline-light add" type="button">
                        + Add User
                    </button>
                </div>
                <!-- End -->
                <table id="example" class="table table-striped table-dark " style="cursor: default;">
                    <thead class="attr">
                        <tr>
                            <th hidden> ID</th>
                            <th>USER NAME</th>
                            <th>EMAIL</th>
                            <th>POSITION</th>
                            <th>ROLE ID</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td hidden>1</td>
                            <td>Paul</td>
                            <td>Paul.jordan@gmail.com</td>
                            <td>Programmer</td>
                            <td>User</td>
                            <td>
                                <button type="button" class="btn btn-info">
                                    Detail
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td hidden>2</td>
                            <td>Alexandeer</td>
                            <td>Alexander.jacobs@gmail.com</td>
                            <td>Project Manager</td>
                            <td>Admin</td>
                            <td>
                                <button type="button" class="btn btn-info">
                                    Detail
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td hidden>3</td>
                            <td>Frans</td>
                            <td>Frans.michael@gmail.com</td>
                            <td>Designer</td>
                            <td>User</td>
                            <td>
                                <button type="button" class="btn btn-info">
                                    Detail
                                </button>
                            </td>
                        </tr>

                    </tbody>
                </table>
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