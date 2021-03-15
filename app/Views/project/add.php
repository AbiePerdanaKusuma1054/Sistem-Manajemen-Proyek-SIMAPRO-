<?= $this->extend('temp/template'); ?>

<?= $this->section('content'); ?>
<div class="canvas-2">
    <div class="lay" style="text-align: left ;">
        <div class="add-back">
            <i class="fa fa-folder-open">
                <span class="add-back-text">
                    Add Your Project
                </span>
            </i>
        </div>
        <form class="row g-3 needs-validation" action="<?= base_url() ?>/project/addProject" method="POST">
            <div class="col-md-6">
                <label for="project_name" class="form-label">Project Name *</label>
                <input type="text" class="form-control fc <?= ($validator->hasError('project_name')) ? 'is-invalid' : ''; ?>" name="project_name" placeholder="Type here..." value="<?= old('project_name') ?>">
                <span class="text-danger"><?= ($validator->getError('project_name')); ?></span>
            </div>
            <div class="col-md-6">
                <label for="validationCustom02" class="form-label">Project Manager *</label>
                <div class="input-group">
                    <select class="form-select form-control fc <?= ($validator->hasError('project_manager')) ? 'is-invalid' : ''; ?>" name="project_manager">
                        <option disabled selected value=''>Choose one..</option>
                        <?php foreach ($employee as $e) : ?>
                            <option value="<?= $e['employee_name'] ?>">
                                <?= $e['employee_name'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <div class="input-group-append">
                        <!-- Button Triggered Modal Add Employee -->
                        <button class="btn btn-secondary" type="button" name="addEmployee" id="addEmployee">
                            + New Employee
                        </button>
                    </div>
                </div>
                <span class="text-danger"><?= ($validator->getError('project_manager')); ?></span>
            </div>
            <div class="col-md-6">
                <label for="validationCustom03" class="form-label">Client *</label>
                <div class="input-group">
                    <select class="form-select form-control fc <?= ($validator->hasError('client_id')) ? 'is-invalid' : ''; ?>" name="client_id">
                        <option disabled selected value=''>Choose client..</option>
                        <?php foreach ($client as $c) : ?>
                            <option value="<?= $c['id'] ?>">
                                <?= $c['client_name'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <div class="input-group-append">
                        <!-- Button Triggered Modal Add Client -->
                        <button class="btn btn-secondary" type="button" name="addClient" id="addClient">
                            + New Client
                        </button>
                    </div>
                </div>
                <span class="text-danger"><?= ($validator->getError('client_id')); ?></span>
            </div>
            <div class="col-md-4">
                <label for="validationCustom04" class="form-label">Contract Amount *</label>
                <input type="number" class="form-control fc <?= ($validator->hasError('contract_amount')) ? 'is-invalid' : ''; ?>" name="contract_amount" placeholder="Type a number..." value="<?= old('contract_amount') ?>">
                <span class="text-danger"><?= ($validator->getError('contract_amount')); ?></span>
            </div>
            <div class="col-md-6">
                <label for="validationCustom05" class="form-label">Project Start *</label>
                <input type="date" class="form-control fc <?= ($validator->hasError('project_start')) ? 'is-invalid' : ''; ?>" name="project_start" value="<?= old('project_start') ?>">
                <span class="text-danger"><?= ($validator->getError('project_start')); ?></span>
            </div>
            <div class="col-md-6">
                <label for="validationCustom06" class="form-label">Project Deadline *</label>
                <input type="date" class="form-control fc <?= ($validator->hasError('project_finish')) ? 'is-invalid' : ''; ?>" name="project_finish" value="<?= old('project_finish') ?>">
                <span class="text-danger"><?= ($validator->getError('project_finish')); ?></span>
            </div>
            <div class="col-md-6">
                <label class="form-label">Project Description</label>
                <textarea class="form-control fc" name="project_desc" rows="4" placeholder="Describe the project..." value="<?= old('project_desc') ?>"></textarea>
            </div>
            <div class="col-md-3">
                <label class="form-label">Project Status</label>
                <input disabled type="text" class="form-control fc" value="Waiting">
            </div>
            <div class="col-md-3">
                <label class="form-label">Project Progress</label>
                <input disabled type="number" class="form-control fc" value="0">
            </div>
            <div class="col-12">
                <button class="btn btn-light plus" type="submit">Create</button>
            </div>
        </form>

        <!-- Modal Add Client -->
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
                                <button class="btn btn-light plus" type="submit" name="submit" id="submitButton"></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End -->

        <!-- Modal Add Employee -->
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
                                <input type="text" name="name" id="employee_name" class="form-control fc">
                                <span class="text-danger" id="employee_name_error"></span>
                            </div>

                            <div class="col">
                                <label class="form-label">Email *</label>
                                <input type="text" name="email" id="employee_email" class="form-control fc">
                                <span class="text-danger" id="employee_email_error"></span>
                            </div>

                            <div class="col">
                                <label class="form-label">Gender *</label>
                                <select class="form-select form-control fc" name="gender" id="employee_gender">
                                    <option disabled selected>Select one...</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                                <span class="text-danger" id="employee_gender_error"></span>
                            </div>

                            <div class="col">
                                <label class="form-label">Address *</label>
                                <textarea class="form-control fc" id="employee_address" name="address" rows="3" placeholder="Employee's address"></textarea>
                                <span class="text-danger" id="employee_address_error"></span>
                            </div>

                            <div class="modal-footer">
                                <input type="hidden" name="action" id="actionEmployee" />
                                <button class="btn btn-light plus" type="submit" name="submit" id="submitButtonEmployee"></button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End -->

    </div>
    <div class="space">
        <p class="dot">.</p>
    </div>
</div>
</div>


<!-- Javascript -->
<script>
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

    $(document).ready(function() {

        //Create Client

        $('#addClient').click(function() {
            $('#clientForm')[0].reset();
            $('#name_error').text('');
            $('#email_error').text('');
            $('#address_error').text('');
            $('.modal-title').html('<i class="fa fa-user-plus" style="color: white;"></i> Add Client');
            $('#action').val('create');
            $('#submitButton').html('Create');
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
                    $('#submitButton').html('<i class="fa fa-spinner fa-spin" style="color: black;"></i>');
                    $('#submitButton').attr('disabled', 'disabled');
                },

                success: function(data) {

                    $('#submitButton').html('Create');
                    $('#submitButton').attr('disabled', false);

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

                    if (data.error == 'yes') {
                        $('#name_error').text(data.name_error);
                        $('#email_error').text(data.email_error);
                        $('#address_error').text(data.address_error);

                        Toast.fire({
                            icon: 'error',
                            title: 'failed to create a client'
                        })
                    } else {
                        $('#clientModal').modal('hide');

                        setTimeout(location.reload.bind(location), 2200);

                        Toast.fire({
                            icon: 'success',
                            title: 'New client created'
                        })
                    }
                }
            })
        });

        // Create Employee
        $('#addEmployee').click(function() {
            $('#employeeForm')[0].reset();
            $('#employee_name_error').text('');
            $('#employee_email_error').text('');
            $('#employee_gender_error').text('');
            $('#employee_address_error').text('');
            $('.modal-title').html('<i class="fa fa-user-plus" style="color: white;"></i> Add Employee');
            $('#actionEmployee').val('create');
            $('#submitButtonEmployee').html('Create');
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
                    $('#submitButtonEmployee').html('<i class="fa fa-spinner fa-spin" style="color: black;"></i>');
                    $('#submitButtonEmployee').attr('disabled', 'disabled');
                },

                success: function(data) {

                    $('#submitButtonEmployee').html('Create');
                    $('#submitButtonEmployee').attr('disabled', false);

                    if (data.error == 'yes') {
                        $('#employee_name_error').text(data.name_error);
                        $('#employee_email_error').text(data.email_error);
                        $('#employee_gender_error').text(data.gender_error);
                        $('#employee_address_error').text(data.address_error);

                        Toast.fire({
                            icon: 'error',
                            title: 'failed to create an employee'
                        })
                    } else {
                        $('#employeeModal').modal('hide');

                        setTimeout(location.reload.bind(location), 2200);

                        Toast.fire({
                            icon: 'success',
                            title: 'New data created'
                        })
                    }
                }
            })
        });
    });

    <?php if (session()->getFlashdata('msg') == 'error') { ?> Toast.fire({
            icon: 'error',
            title: 'failed to create project'
        }) <?php } ?>
</script>
<!-- End of JS -->

<?= $this->endSection(); ?>