<?= $this->extend('temp/template'); ?>

<?= $this->section('content'); ?>
<div class="canvas-2">
    <div class="lay">
        <!-- Button Triggered Modal Add Employee -->
        <div class="d-grid gap-2 col-6 mx-auto add">
            <a>
                <button class="btn btn-outline-light add" type="button" name="addEmployee" id="addEmployee">
                    + Add Employee
                </button>
            </a>
        </div>
        <!-- End -->

        <!-- Modal Add & Edit Employee -->
        <div class="modal fade" name="employeeModal" id="employeeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <form id="employeeForm" style="text-align: left;" method="POST">

                            <div class="col">
                                <label class="form-label">Employee Name *</label>
                                <input type="text" name="name" id="name" class="form-control fc" placeholder="Input name...">
                                <span class="text-danger" id="name_error"></span>
                            </div>

                            <div class="col">
                                <label class="form-label">Email *</label>
                                <input type="text" name="email" id="email" class="form-control fc" placeholder="Input email...">
                                <span class="text-danger" id="email_error"></span>
                            </div>

                            <div class="col">
                                <label class="form-label">Gender *</label>
                                <select class="form-select form-control fc" name="gender" id="gender">
                                    <option disabled selected>Select one...</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                                <span class="text-danger" id="gender_error"></span>
                            </div>

                            <div class="col">
                                <label class="form-label">Address *</label>
                                <textarea class="form-control fc" id="address" name="address" rows="3" placeholder="employee's address..."></textarea>
                                <span class="text-danger" id="address_error"></span>
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
                    <th class="text-center">Employee Name</th>
                    <th class="text-center">Gender</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Address</th>
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
                    targets: 2,
                    className: 'text-left'
                },
                {
                    targets: 3,
                    className: 'text-left'
                }, {
                    "bSortable": false,
                    "aTargets": [4]
                }
            ],
            "scrollX": true,
            "order": [],
            "serverSide": true,
            "responsive": true,
            "ajax": {
                url: "<?= base_url() ?>/employee/fetchEmployeeData",
                type: 'POST'
            }
        });

        //Create employee

        $('#addEmployee').click(function() {
            $('#employeeForm')[0].reset();
            $('#name_error').text('');
            $('#email_error').text('');
            $('#gender_error').text('');
            $('#address_error').text('');
            $('.modal-title').html('<i class="fa fa-user-plus" style="color: white;"></i> Add Employee');
            $('#action').val('create');
            $('#submitButton').html('Create');
            $('#employeeModal').modal('show');
        });

        $('#employeeForm').on('submit', function(event) {
            event.preventDefault();

            $.ajax({
                url: "<?= base_url(); ?>/employee/saveEmployeeData",
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
                        $('#email_error').text(data.email_error);
                        $('#gender_error').text(data.gender_error);
                        $('#address_error').text(data.address_error);

                        if ($('#action').val() == 'create') {
                            Toast.fire({
                                icon: 'error',
                                title: 'Failed to create an Employee'
                            })

                        } else {
                            Toast.fire({
                                icon: 'error',
                                title: 'Failed to update the data'
                            })
                        }


                    } else {
                        $('#employeeModal').modal('hide');
                        $('#table').DataTable().ajax.reload();


                        if ($('#action').val() == 'create') {
                            Toast.fire({
                                icon: 'success',
                                title: 'New data created'
                            })
                        } else {
                            Toast.fire({
                                icon: 'success',
                                title: 'Employee data updated'
                            })
                        }
                    }
                }
            })

        });

        //Edit employee Data

        $(document).on('click', '.edit', function() {

            var id = $(this).data('id');

            $.ajax({
                url: "<?= base_url() ?>/employee/fetchIdEmployee",
                method: "POST",
                data: {
                    id: id
                },
                dataType: "JSON",

                success: function(data) {
                    $('#name').val(data.employee_name);
                    $('#email').val(data.employee_email);
                    $('#gender').val(data.employee_gender);
                    $('#address').val(data.employee_address);

                    $('#name_error').text('');
                    $('#email_error').text('');
                    $('#gender_error').text('');
                    $('#address_error').text('');
                    $('.modal-title').html('<i class="fa fa-pencil-square-o" style="color: white;"></i> Edit Employee Data');
                    $('#action').val('edit');
                    $('#submitButton').html('Edit');
                    $('#employeeModal').modal('show');
                    $('#hidden_id').val(id);
                }
            })
        });

        //Delete Employee Data

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
                        'Employee has been deleted.',
                        'success',

                        $.ajax({
                            url: "<?= base_url() ?>/employee/deleteEmployee",
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