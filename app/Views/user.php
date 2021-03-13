<?= $this->extend('temp/template'); ?>

<?= $this->section('content'); ?>
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

        <!-- Modal Add & Edit User -->
        <div class="modal fade" name="userModal" id="userModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="modal-title" id="exampleModalLabel" style="color: white;">
                        </div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="userForm" style="text-align: left;" method="POST">
                            <div class="col">
                                <label class="form-label">Username *</label>
                                <input type="text" name="username" id="username" class="form-control fc" placeholder="Input a username...">
                                <span class="text-danger" id="username_error"></span>
                            </div>
                            <div class="col">
                                <label class="form-label">Role *</label>
                                <select class="form-select form-control fc" name="role" id="role">
                                    <option disabled selected>Select role</option>
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>
                                </select>
                                <span class="text-danger" id="role_error"></span>
                            </div>
                            <div class="col">
                                <label class="form-label">Password *</label>
                                <input type="password" class="form-control fc" name="password" id="password" placeholder="Input a password...">
                                <span class="text-danger" id="password_error"></span>
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" name="action" id="action" />
                                <input type="hidden" name="hidden_id" id="hidden_id" />
                                <button class="btn btn-light plus" type="submit" name="submit" id="submitButton"></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End -->

        <!-- Data Tables -->
        <table id="table" class="table table-striped table-dark display nowrap anim" style="cursor: default; width: 100%;">
            <thead class="attr">
                <tr>
                    <th class="text-center">Username</th>
                    <th class="text-center">Role</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
        </table>
    </div>
    <div class="space">
        <p class="dot">.</p>
    </div>
</div>
</div>

<!-- Javascript -->
<script>
    $(document).ready(function() {
        //Read Table w/ Datatables

        $('#table').DataTable({
            "aoColumnDefs": [{
                    targets: 1,
                    className: 'text-left'
                },
                {
                    targets: 0,
                    className: 'text-left'
                },
                {
                    responsivePriority: 2,
                    targets: -1
                },
                {
                    responsivePriority: 1,
                    targets: 0
                },
                {
                    "bSortable": false,
                    "aTargets": [2]
                }
            ],
            "scrollX": true,
            "order": [],
            "serverSide": true,
            "responsive": true,
            "ajax": {
                url: "<?= base_url() ?>/user/fetchUserData",
                type: 'POST'
            }
        });

        //Create User

        $('#addUser').click(function() {
            $('#userForm')[0].reset();
            $('#username_error').text('');
            $('#password_error').text('');
            $('#role_error').text('');
            $('.modal-title').html('<i class="fa fa-user-plus" style="color: white;"></i> Add User');
            $('#action').val('create');
            $('#submitButton').html('Create');
            $('#userModal').modal('show');
        });

        $('#userForm').on('submit', function(event) {
            event.preventDefault();

            $.ajax({
                url: "<?= base_url(); ?>/user/saveUserData",
                method: "POST",
                data: $(this).serialize(),
                dataType: "JSON",

                beforeSend: function() {
                    $('#submitButton').html('<i class="fa fa-spinner fa-spin" style="color: black;"></i>');
                    $('#submitButton').attr('disabled', 'disabled');
                },

                success: function(data) {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 1700,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })

                    if ($('#action').val() == 'create') {
                        $('#submitButton').html('Create');
                    } else {
                        $('#submitButton').html('Edit');
                    }

                    $('#submitButton').attr('disabled', false);

                    if (data.error == 'yes') {
                        $('#username_error').text(data.username_error);
                        $('#password_error').text(data.password_error);
                        $('#role_error').text(data.role_error);

                        if ($('#action').val() == 'create') {
                            Toast.fire({
                                icon: 'error',
                                title: 'failed to create a user'
                            })

                        } else {
                            Toast.fire({
                                icon: 'error',
                                title: 'failed to update the data'
                            })
                        }


                    } else {
                        $('#userModal').modal('hide');
                        $('#table').DataTable().ajax.reload();


                        if ($('#action').val() == 'create') {
                            Toast.fire({
                                icon: 'success',
                                title: 'User created'
                            })
                        } else {
                            Toast.fire({
                                icon: 'success',
                                title: 'User data updated'
                            })
                        }
                    }
                }
            })

        });

        //Edit Account

        $(document).on('click', '.edit', function() {

            var id = $(this).data('id');

            $.ajax({
                url: "<?= base_url() ?>/user/fetchIdUser",
                method: "POST",
                data: {
                    id: id
                },
                dataType: "JSON",

                success: function(data) {
                    $('#username').val(data.username);
                    $('#password').val(data.password);
                    $('#role').val(data.role);

                    $('#username_error').text('');
                    $('#password_error').text('');
                    $('#role_error').text('');
                    $('.modal-title').html('<i class="fa fa-pencil-square-o" style="color: white;"></i> Edit User Account');
                    $('#action').val('edit');
                    $('#submitButton').html('Edit');
                    $('#userModal').modal('show');
                    $('#hidden_id').val(id);
                }
            })
        });

        //Delete account

        $(document).on('click', '.delete', function() {
            var id = $(this).data('id');

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this action",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Delete',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Deleted!',
                        'User has been deleted.',
                        'success',

                        $.ajax({
                            url: "<?= base_url() ?>/user/deleteUser",
                            method: "POST",
                            data: {
                                id: id
                            },

                            success: function(data) {
                                $('#table').DataTable().ajax.reload();
                            }

                        })
                    )
                }
            })
        });

    });
</script>
<!-- End of JS -->

<?= $this->endSection(); ?>