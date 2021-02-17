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
                                <input type="text" name="username" id="username" class="form-control fc">
                                <!-- TODO: text warning masih kegedean -->
                                <span class="text-danger" id="username_error"></span>
                            </div>
                            <div class="col">
                                <label class="form-label">Role *</label>
                                <select class="form-select form-control fc" name="role" id="role">
                                    <option value="" selected>Select role</option>
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>
                                </select>
                                <!-- TODO: text warning masih kegedean -->
                                <span class="text-danger" id="role_error"></span>
                            </div>
                            <div class="col">
                                <label class="form-label">Password *</label>
                                <input type="password" class="form-control fc" name="password" id="password">
                                <!-- TODO: text warning masih kegedean -->
                                <span class="text-danger" id="password_error"></span>
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" name="action" id="action" />
                                <input type="hidden" name="hidden_id" id="hidden_id" />
                                <input class="btn btn-light plus" type="submit" name="submit" id="submitButton" />
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

<!-- Javascript -->
<script>
    $(document).ready(function() {
        //Read Table w/ Datatables
        $('#table').DataTable({
            "aoColumnDefs": [{
                "bSortable": false,
                "aTargets": [2]
            }],
            "order": [],
            "serverSide": true,
            "ajax": {
                url: "<?= base_url() ?>/home/fetchUserData",
                type: 'POST'
            }
        });

        //Create User

        $('#addUser').click(function() {
            $('#userForm')[0].reset();
            $('#username_error').text('');
            $('#password_error').text('');
            $('.modal-title').html('<i class="fa fa-user-plus" style="color: white;"></i> Add User');
            $('#role_error').text('');
            $('#action').val('create');
            $('#submitButton').val('Create');
            $('#userModal').modal('show');
        });

        $('#userForm').on('submit', function(event) {
            event.preventDefault();

            $.ajax({
                url: "<?= base_url(); ?>/home/saveUserData",
                method: "POST",
                data: $(this).serialize(),
                dataType: "JSON",

                beforeSend: function() {
                    $('#submitButton').val('Wait...');
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
                        $('#submitButton').val('Create');
                    } else {
                        $('#submitButton').val('Edit');
                    }

                    $('#submitButton').attr('disabled', false);

                    if (data.error == 'yes') {
                        $('#username_error').text(data.username_error);
                        $('#password_error').text(data.password_error);
                        $('#role_error').text(data.role_error);

                        if ($('#action').val() == 'create') {
                            Toast.fire({
                                icon: 'error',
                                title: 'failed to create the data'
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
                url: "<?= base_url() ?>/home/fetchIdUser",
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
                    $('#submitButton').val('Edit');
                    $('#userModal').modal('show');
                    $('#hidden_id').val(id);
                }
            })
        });

        //Delete account

        $(document).on('click', '.delete', function() {
            var id = $(this).data('id');

            const swalWithBootstrapButtons = Swal.mixin({
                //TODO: Benerin kalau bisa, karena kalo 'buttonsStyling: true' 
                // buttonnya jadi jelek, tapi kalo seluruh 
                // const ini dihapus jadi gabisa dijalanin swalnya.

                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: true
            })

            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this action",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Delete',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    swalWithBootstrapButtons.fire(
                        'Deleted!',
                        'User has been deleted.',
                        'success',

                        $.ajax({
                            url: "<?= base_url() ?>/home/deleteUser",
                            method: "POST",
                            data: {
                                id: id
                            },

                            success: function(data) {
                                $('#table').DataTable().ajax.reload();
                            }

                        })

                    )
                } else if (
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    // Do Nothing
                }
            })
        });

    });
</script>
<!-- End of JS -->

<?= $this->endSection(); ?>