<?= $this->extend('temp/template'); ?>

<?= $this->section('content'); ?>
<!-- Menu Bar -->
<div class="canvas">
    <div class="menu-list">
        <a href="<?= base_url() ?>/home/dashboard"><span class="menu-list-title">Dashboard</span></a>
        <div class="line"></div>
        <a href="<?= base_url() ?>/home/project"><span class="menu-list-title">Project</span></a>
        <div class="line"></div>
        <a href="<?= base_url() ?>/home/user"><span class="menu-list-title active">User</span></a>
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
        <table id="table" class="table table-striped table-dark " style="cursor: default;">
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
<?= $this->endSection(); ?>