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
        <!-- Button Triggered Modal Add User -->
        <div class="d-grid gap-2 col-6 mx-auto add">
            <a>
                <button class="btn btn-outline-light add" type="button" data-toggle="modal" data-target="#exampleModal">
                    + Add User
                </button>
            </a>
        </div>
        <!-- End -->

        <!-- Modal Add User -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="modal-title" id="exampleModalLabel">
                            <i class="fa fa-user-plus" style="color: white;">
                                <span class="add-back-text">
                                    Add User
                                </span>
                            </i>
                        </div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="needs-validation" novalidate style="text-align: left;">
                            <div class="col">
                                <label for="validationCustom01" class="form-label">Username *</label>
                                <input type="text" class="form-control fc" id="validationCustom01" value="" required>
                                <div class="invalid-feedback">
                                    Please input a name.
                                </div>
                            </div>
                            <div class="col">
                                <label for="validationCustom02" class="form-label">Role *</label>
                                <select class="form-select form-control fc" id="validationCustom02">
                                    <option value="1">Admin</option>
                                    <option value="2" selected>User</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="validationCustom02" class="form-label">Password *</label>
                                <input type="password" class="form-control fc" id="validationCustom02" value="" required>
                                <div class="invalid-feedback">
                                    Please input a password.
                                </div>
                            </div>
                        </form>
                        <div class="modal-footer">
                            <button class="btn btn-light plus" type="submit">Create</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End -->

        <!-- Data Tables -->
        <table id="example" class="table table-striped table-dark " style="cursor: default;">
            <thead class="attr">
                <tr>
                    <th hidden> ID</th>
                    <th>USERNAME</th>
                    <th>ROLE ID</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td hidden>1</td>
                    <td>Paul</td>
                    <td>User</td>
                    <td>
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#editModal">
                            Edit
                        </button>

                        <a href="">
                            <button type="button" class="btn btn-danger">
                                Delete
                            </button>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td hidden>2</td>
                    <td>Alexandeer</td>
                    <td>Admin</td>
                    <td>
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#editModal">
                            Edit
                        </button>

                        <a href="">
                            <button type="button" class="btn btn-danger">
                                Delete
                            </button>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td hidden>3</td>
                    <td>Frans</td>
                    <td>User</td>
                    <td>
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#editModal">
                            Edit
                        </button>

                        <a href="">
                            <button type="button" class="btn btn-danger">
                                Delete
                            </button>
                        </a>
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

<!-- Modal Edit User -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title" id="exampleModalLabel">
                    <i class="fa fa-pencil-square-o" style="color: white;">
                        <span class="add-back-text">
                            Edit User Account
                        </span>
                    </i>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" novalidate style="text-align: left;">
                    <div class="col">
                        <label for="validationCustom01" class="form-label">Username *</label>
                        <input type="text" class="form-control fc" id="validationCustom01" value="Paul" required>
                        <div class="invalid-feedback">
                            Please input a name.
                        </div>
                    </div>
                    <div class="col">
                        <label for="validationCustom02" class="form-label">Role *</label>
                        <select class="form-select form-control fc" id="validationCustom02">
                            <option value="1">Admin</option>
                            <option value="2" selected>User</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="validationCustom02" class="form-label">Password *</label>
                        <input type="password" class="form-control fc" id="validationCustom02" value="hahaha" required>
                        <div class="invalid-feedback">
                            Please input a password.
                        </div>
                    </div>
                </form>
                <div class="modal-footer">
                    <button class="btn btn-light plus" type="submit">Edit</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End -->

<script>
    $(document).ready(function() {
        $('#table').DataTable();
    });
</script>
<?= $this->endSection(); ?>