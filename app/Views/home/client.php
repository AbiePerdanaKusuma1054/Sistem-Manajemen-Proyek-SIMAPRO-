<?= $this->extend('temp/template'); ?>

<?= $this->section('content'); ?>
<!-- Menu Bar -->
<div class="canvas">
    <div class="menu-list">
        <a href="<?= base_url() ?>/home/dashboard"><span class="menu-list-title">Dashboard</span></a>
        <div class="line"></div>
        <a href="<?= base_url() ?>/home/project"><span class="menu-list-title">Project</span></a>
        <div class="line"></div>
        <a href="<?= base_url() ?>/home/user"><span class="menu-list-title">User</span></a>
        <div class="line"></div>
        <a href="<?= base_url() ?>/home/client"><span class="menu-list-title active">Client</span></a>
    </div>
</div>
<!--  -->
<div class="canvas-2">
    <div class="lay">
        <!-- Button Triggered Modal Add Client -->
        <div class="d-grid gap-2 col-6 mx-auto add">
            <a>
                <button class="btn btn-outline-light add" type="button" name="addClient" id="addClient">
                    + Add Client
                </button>
            </a>
        </div>
        <!-- End -->

        <!-- Modal Add & Edit Client -->
        <div class="modal fade" name="clientModal" id="clientModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <form id="clientForm" style="text-align: left;" method="POST">

                            <!-- Script errornya blm bisa -->
                            <div class="col">
                                <label class="form-label">Client Name *</label>
                                <input type="text" name="client" id="client" class="form-control fc">
                                <span class="text-danger" id="client_error"></span>
                            </div>

                            <div class="col">
                                <label class="form-label">Email *</label>
                                <input type="text" name="email" id="email" class="form-control fc">
                                <span class="text-danger" id="email_error"></span>
                            </div>

                            <div class="col">
                                <label class="form-label">Address *</label>
                                <textarea class="form-control fc" id="exampleFormControlTextarea1" rows="3" placeholder="Client address"></textarea>
                                <span class="text-danger" id="address_error"></span>
                            </div>
                            <!--  -->

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
                    <th>Client Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Action</th>
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

        //Create Client

        $('#addClient').click(function() {
            $('#clientForm')[0].reset();
            $('#client_error').text('');
            $('#email_error').text('');
            $('.modal-title').html('<i class="fa fa-user-plus" style="color: white;"></i> Add Client');
            $('#address_error').text('');
            $('#action').val('create');
            $('#submitButton').val('Create');
            $('#clientModal').modal('show');
        });

        $('#clientForm').on('submit', function(event) {
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
                        $('#client_error').text(data.username_error);
                        $('#email_error').text(data.password_error);
                        $('#address_error').text(data.role_error);

                        if ($('#action').val() == 'create') {
                            Toast.fire({
                                icon: 'error',
                                title: 'failed to create a client'
                            })

                        } else {
                            Toast.fire({
                                icon: 'error',
                                title: 'failed to update the data'
                            })
                        }


                    } else {
                        $('#clientModal').modal('hide');
                        $('#table').DataTable().ajax.reload();


                        if ($('#action').val() == 'create') {
                            Toast.fire({
                                icon: 'success',
                                title: 'Client created'
                            })
                        } else {
                            Toast.fire({
                                icon: 'success',
                                title: 'Client data updated'
                            })
                        }
                    }
                }
            })

        });

        //Edit Data Client

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

                    $('#client_error').text('');
                    $('#email_error').text('');
                    $('#address_error').text('');
                    $('.modal-title').html('<i class="fa fa-pencil-square-o" style="color: white;"></i> Edit Data Client');
                    $('#action').val('edit');
                    $('#submitButton').val('Edit');
                    $('#clientModal').modal('show');
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
                        'Client has been deleted.',
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