<?= $this->extend('temp/template'); ?>

<?= $this->section('content'); ?>

<div class="canvas-2">
    <div class="lay" style="text-align: left ;">
        <div class="add-back">
            <i class="fa fa-pencil-square-o">
                <span class="add-back-text">
                    Edit Your Project
                </span>
            </i>
        </div>
        <form class="row g-3 needs-validation" action="<?= base_url() ?>/project/saveEditProject/<?= $detail['id'] ?>">
            <div class="col-md-6">
                <label for="validationCustom01" class="form-label">Project Name *</label>
                <input type="text" class="form-control fc <?= ($validator->hasError('project_name')) ? 'is-invalid' : ''; ?>" name="project_name" value="<?= $detail['project_name'] ?>" required>
                <div class="invalid-feedback">
                    <?= ($validator->getError('project_name')); ?>
                </div>
            </div>
            <div class="col-md-6">
                <label for="validationCustom02" class="form-label">Project Manager *</label>
                <div class="input-group">
                    <select class="form-select form-control fc <?= ($validator->hasError('project_manager')) ? 'is-invalid' : ''; ?>" name="project_manager">
                        <option disabled selected value=''>Choose one..</option>
                        <?php foreach ($employee as $e) : ?>
                            <option value="<?= $e['employee_name'] ?>" <?= $e['employee_name'] == $detail['project_manager'] ? 'selected' : ''; ?>>
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
                <div class="invalid-feedback">
                    Please input a project manager.
                </div>
            </div>
            <div class="col-md-6">
                <label for="validationCustom03" class="form-label">Client *</label>
                <div class="input-group">
                    <select class="form-select form-control fc" name="client_id">
                        <?php foreach ($client as $c) : ?>
                            <option value="<?= $c['id'] ?>" <?= $c['id'] == $detail['client_id'] ? 'selected' : ''; ?>><?= $c['client_name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="invalid-feedback">
                    Please input a client.
                </div>
            </div>
            <!-- <div class="col-md-4">
                    <label for="validationCustom04" class="form-label">Contract Amount *</label>
                    <input type="number" class="form-control fc" name="" value="10000000" required>
                    <div class="invalid-feedback">
                        Please input a contract amount.
                    </div>
                </div> -->
            <div class="col-md-3">
                <label for="validationCustom04" class="form-label">Project Status</label>
                <select class="form-select form-control fc <?= ($validator->hasError('project_status')) ? 'is-invalid' : ''; ?>" name="project_status">
                    <option value="waiting" <?= $detail['project_status'] == 'waiting' ? 'selected' : ''; ?>>Waiting</option>
                    <option value="on progress" <?= $detail['project_status'] == 'on progress' ? 'selected' : ''; ?>>On Progress</option>
                    <option value="hold" <?= $detail['project_status'] == 'hold' ? 'selected' : ''; ?>>Hold</option>
                    <option value="finish" <?= $detail['project_status'] == 'finish' ? 'selected' : ''; ?>>Finished</option>
                    <option value="cancelled" <?= $detail['project_status'] == 'cancelled' ? 'selected' : ''; ?>>Cancelled</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="validationCustom05" class="form-label">Project Start *</label>
                <input type="date" class="form-control fc <?= ($validator->hasError('project_start')) ? 'is-invalid' : ''; ?>" name="project_start" value="<?= $detail['project_start'] ?>" required>
                <div class="invalid-feedback">
                    Please input a valid start date.
                </div>
            </div>
            <div class="col-md-6">
                <label for="validationCustom06" class="form-label">Project Deadline *</label>
                <input type="date" class="form-control fc <?= ($validator->hasError('project_finish')) ? 'is-invalid' : ''; ?>" name="project_finish" value="<?= $detail['project_finish'] ?>" required>
                <div class="invalid-feedback">
                    Please input a valid date for deadline.
                </div>
            </div>
            <div class="col-md-6">
                <label class="form-label">Project Description</label>
                <textarea class="form-control fc" id="exampleFormControlTextarea1" rows="4" name="project_desc" placeholder="Describe the project..."><?= $detail['project_desc'] ?></textarea>
            </div>
            <div class="col-12">
                <button class="btn btn-light plus" type="submit">Save</button>
            </div>
        </form>
    </div>

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
                            <input type="text" name="name" id="name" class="form-control fc">
                            <span class="text-danger" id="name_error"></span>
                        </div>

                        <div class="col">
                            <label class="form-label">Email *</label>
                            <input type="text" name="email" id="email" class="form-control fc">
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
                            <textarea class="form-control fc" id="address" name="address" rows="3" placeholder="Employee's address"></textarea>
                            <span class="text-danger" id="address_error"></span>
                        </div>

                        <div class="modal-footer">
                            <input type="hidden" name="action" id="action" />
                            <input class="btn btn-light plus" type="submit" name="submit" id="submitButton" />
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End -->

    <div class="space">
        <p class="dot">.</p>
    </div>
</div>
</div>

<script>
    $(document).ready(function() {

        //Create Employee

        $('#addEmployee').click(function() {
            $('#employeeForm')[0].reset();
            $('#name_error').text('');
            $('#email_error').text('');
            $('#gender_error').text('');
            $('#address_error').text('');
            $('.modal-title').html('<i class="fa fa-user-plus" style="color: white;"></i> Add Employee');
            $('#action').val('create');
            $('#submitButton').val('Create');
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
                    $('#submitButton').val('Wait...');
                    $('#submitButton').attr('disabled', 'disabled');
                },

                success: function(data) {

                    $('#submitButton').val('Create');
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
                        $('#gender_error').text(data.gender_error);
                        $('#address_error').text(data.address_error);

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
</script>

<?= $this->endSection(); ?>