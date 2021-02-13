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
                <button class="btn btn-outline-light add" type="button" name="addUser" id="addUser">
                    + Add User
                </button>
            </a>
        </div>
        <!-- End -->

        <!-- Modal Add User -->
        <div class="modal fade" name="addUserModal" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <form id="addUserForm" style="text-align: left;" method="POST">
                            <div class="col">
                                <label class="form-label">Username *</label>
                                <input type="text" name="username" id="username" class="form-control fc">
                                <!-- text warning masih kegedean -->
                                <span class="text-danger" id="username_error"></span>
                            </div>
                            <div class="col">
                                <label for="validationCustom02" class="form-label">Role *</label>
                                <select class="form-select form-control fc" name="role" id="role">
                                    <option value="admin">Admin</option>
                                    <option value="user" selected>User</option>
                                </select>
                            </div>
                            <div class="col">
                                <label class="form-label">Password *</label>
                                <input type="password" class="form-control fc" name="password" id="password">
                                <!-- text warning masih kegedean -->
                                <span class="text-danger" id="password_error"></span>
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" name="action" id="action" value="Create" />
                                <input class="btn btn-light plus" type="submit" name="submit" id="submitButtonCreate" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End -->

        <!-- Data Tables -->
        <table id="table" class="table table-striped table-dark" style="cursor: default;">
            <thead class="attr">
                <tr>
                    <th>USERNAME</th>
                    <th>ROLE</th>
                    <th>ACTION</th>
                </tr>
            </thead>

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
                            <option value="admin">Admin</option>
                            <option value="user" selected>User</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="validationCustom02" class="form-label">Password *</label>
                        <input type="password" class="form-control fc" id="validationCustom02" value="hahaha" required>
                        <div class="invalid-feedback">
                            Please input a password.
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-light plus" type="submit">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End -->

<script>
    $(document).ready(function() {
        $('#table').DataTable({
            "aoColumnDefs": [{
                "bSortable": false,
                "aTargets": [2]
            }],
            "order": [],
            "serverSide": true,
            "ajax": {
                url: "<?= base_url('/home/fetchUserData') ?>",
                type: 'POST'
            }
        });

        $('#addUser').click(function() {
            $('#addUserForm')[0].reset();
            $('#username_error').text('');
            $('#password_error').text('');
            $('#action').val('Create');
            $('#submitButtonCreate').val('Create');
            $('#addUserModal').modal('show');
        });

        $('#addUserForm').on('submit', function(event) {
            event.preventDefault();

            $.ajax({
                url: "<?= base_url('/home/saveUserData'); ?>",
                method: "POST",
                data: $(this).serialize(),
                dataType: "JSON",

                beforeSend: function() {
                    $('#submitButtonCreate').val('Wait...');
                    $('#submitButtonCreate').attr('disabled', 'disabled');
                },

                success: function(data) {
                    $('#submitButtonCreate').val('Create');
                    $('#submitButtonCreate').attr('disabled', false);

                    if (data.error == 'yes') {
                        $('#username_error').text(data.username_error);
                        $('#password_error').text(data.password_error);
                    } else {
                        $('#addUserModal').modal('hide');
                        $('#table').DataTable().ajax.reload();
                    }
                }
            })

        });

    });
</script>
<?= $this->endSection(); ?>