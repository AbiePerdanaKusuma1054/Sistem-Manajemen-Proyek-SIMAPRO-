<?= $this->extend('temp/template'); ?>

<?= $this->section('content'); ?>
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

                            <div class="col">
                                <label class="form-label">Client Name *</label>
                                <input type="text" name="name" id="name" class="form-control fc">
                                <span class="text-danger" id="name_error"></span>
                            </div>

                            <div class="col">
                                <label class="form-label">Email *</label>
                                <input type="text" name="email" id="email" class="form-control fc">
                                <span class="text-danger" id="email_error"></span>
                            </div>

                            <div class="col">
                                <label class="form-label">Address *</label>
                                <textarea class="form-control fc" id="address" name="address" rows="3" placeholder="Client's address"></textarea>
                                <span class="text-danger" id="address_error"></span>
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
        <table id="table" class="table table-striped table-dark display nowrap" style="cursor: default;  width: 100%;">
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
                    responsivePriority: 3,
                    targets: -1
                },
                {
                    responsivePriority: 2,
                    targets: 1
                },
                {
                    responsivePriority: 1,
                    targets: 0
                },
                {
                    "bSortable": false,
                    "aTargets": [2, 3]
                }
            ],
            "scrollX": true,
            "order": [],
            "serverSide": true,
            "responsive": true,
            "ajax": {
                url: "<?= base_url() ?>/client/fetchClientData",
                type: 'POST'
            }
        });

        //Create Client

        $('#addClient').click(function() {
            $('#clientForm')[0].reset();
            $('#name_error').text('');
            $('#email_error').text('');
            $('#address_error').text('');
            $('.modal-title').html('<i class="fa fa-user-plus" style="color: white;"></i> Add Client');
            $('#action').val('create');
            $('#submitButton').val('Create');
            $('#clientModal').modal('show');
        });

        $('#clientForm').on('submit', function(event) {
            event.preventDefault();

            $.ajax({
                url: "<?= base_url(); ?>/client/saveClientData",
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
                        $('#name_error').text(data.name_error);
                        $('#email_error').text(data.email_error);
                        $('#address_error').text(data.address_error);

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
                                title: 'New client created'
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

        //Edit Client Data

        $(document).on('click', '.edit', function() {

            var id = $(this).data('id');

            $.ajax({
                url: "<?= base_url() ?>/client/fetchIdClient",
                method: "POST",
                data: {
                    id: id
                },
                dataType: "JSON",

                success: function(data) {
                    $('#name').val(data.client_name);
                    $('#email').val(data.client_email);
                    $('#address').val(data.client_address);

                    $('#name_error').text('');
                    $('#email_error').text('');
                    $('#address_error').text('');
                    $('.modal-title').html('<i class="fa fa-pencil-square-o" style="color: white;"></i> Edit Client Data');
                    $('#action').val('edit');
                    $('#submitButton').val('Edit');
                    $('#clientModal').modal('show');
                    $('#hidden_id').val(id);
                }
            })
        });

        //Delete Client Data

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
                        'Client has been deleted.',
                        'success',

                        $.ajax({
                            url: "<?= base_url() ?>/client/deleteClient",
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