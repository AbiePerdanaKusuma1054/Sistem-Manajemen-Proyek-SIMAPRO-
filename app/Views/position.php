<?= $this->extend('temp/template'); ?>

<?= $this->section('content'); ?>
<div class="canvas-2">
    <div class="lay">
        <!-- Button Triggered Modal Add Position -->
        <div class="d-grid gap-2 col-6 mx-auto add">
            <a>
                <button class="btn btn-outline-light add" type="button" name="addPosition" id="addPosition">
                    + Add Position
                </button>
            </a>
        </div>
        <!-- End -->

        <!-- Modal Add & Edit Position -->
        <div class="modal fade" name="positionModal" id="positionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <form id="positionForm" style="text-align: left;" method="POST">

                            <div class="col">
                                <label class="form-label">Position Name *</label>
                                <input type="text" name="name" id="name" class="form-control fc" placeholder="Input an position...">
                                <span class="text-danger" id="name_error"></span>
                            </div>

                            <div class="col">
                                <label class="form-label">Description *</label>
                                <textarea class="form-control fc" id="position_desc" name="position_desc" rows="3" placeholder="Position's description..."></textarea>
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
        <table id="table" class="table table-striped table-dark display nowrap anim" style="cursor: default;  width: 100%;">
            <thead class="attr">
                <tr>
                    <th class="text-center">Position Name</th>
                    <th class="text-center">Description</th>
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
                    targets: 0,
                    className: 'text-left'
                },
                {
                    targets: 1,
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
                url: "<?= base_url() ?>/position/fetchPositionData",
                type: 'POST'
            }
        });

        //Create position

        $('#addPosition').click(function() {
            $('#positionForm')[0].reset();
            $('#name_error').text('');
            $('.modal-title').html('<i class="fa fa-user-plus" style="color: white;"></i> Add Position');
            $('#action').val('create');
            $('#submitButton').html('Create');
            $('#positionModal').modal('show');
        });

        $('#positionForm').on('submit', function(event) {
            event.preventDefault();

            $.ajax({
                url: "<?= base_url(); ?>/position/savePositionData",
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
                        $('#name_error').text(data.name_error);

                        if ($('#action').val() == 'create') {
                            Toast.fire({
                                icon: 'error',
                                title: 'Failed to create data'
                            })

                        } else {
                            Toast.fire({
                                icon: 'error',
                                title: 'Failed to update the data'
                            })
                        }


                    } else {
                        $('#positionModal').modal('hide');
                        $('#table').DataTable().ajax.reload();


                        if ($('#action').val() == 'create') {
                            Toast.fire({
                                icon: 'success',
                                title: 'New data created'
                            })
                        } else {
                            Toast.fire({
                                icon: 'success',
                                title: 'Data updated'
                            })
                        }
                    }
                }
            })

        });

        //Edit Position Data

        $(document).on('click', '.edit', function() {

            var id = $(this).data('id');

            $.ajax({
                url: "<?= base_url() ?>/position/fetchIdPosition",
                method: "POST",
                data: {
                    id: id
                },
                dataType: "JSON",

                success: function(data) {
                    $('#name').val(data.position_name);
                    $('#position_desc').val(data.position_desc);

                    $('#name_error').text('');
                    $('.modal-title').html('<i class="fa fa-pencil-square-o" style="color: white;"></i> Edit Position Data');
                    $('#action').val('edit');
                    $('#submitButton').html('Edit');
                    $('#positionModal').modal('show');
                    $('#hidden_id').val(id);
                }
            })
        });

        //Delete a Position

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
                        'Position has been deleted.',
                        'success',

                        $.ajax({
                            url: "<?= base_url() ?>/position/deletePosition",
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