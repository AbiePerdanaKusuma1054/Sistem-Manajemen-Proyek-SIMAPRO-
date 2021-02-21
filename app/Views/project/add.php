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
                <input type="text" class="form-control fc <?= ($validator->hasError('project_name')) ? 'is-invalid' : ''; ?>" name="project_name" value="<?= old('project_name') ?>" required>
                <div class="invalid-feedback">
                    <?= ($validator->getError('project_name')); ?>
                </div>
            </div>
            <div class="col-md-6">
                <label for="validationCustom02" class="form-label">Project Manager *</label>
                <input type="text" class="form-control fc <?= ($validator->hasError('project_manager')) ? 'is-invalid' : ''; ?>" name="project_manager" value="<?= old('project_manager') ?>" required>
                <div class="invalid-feedback">
                    <?= ($validator->getError('project_manager')); ?>
                </div>
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
                <div class="invalid-feedback">
                    <?= ($validator->getError('client_id')); ?>
                </div>
            </div>
            <!-- <div class="col-md-4">
                <label for="validationCustom04" class="form-label">Contract Amount *</label>
                <input type="number" class="form-control fc" name="" value="" required>
                <div class="invalid-feedback">
                    Please input a contract amount.
                </div>
            </div> -->
            <div class="col-md-3">
                <label class="form-label">Project Status</label>
                <input disabled type="text" class="form-control fc" value="waiting">
            </div>
            <div class="col-md-6">
                <label for="validationCustom05" class="form-label">Project Start *</label>
                <input type="date" class="form-control fc <?= ($validator->hasError('project_start')) ? 'is-invalid' : ''; ?>" name="project_start" value="<?= old('project_start') ?>" required>
                <div class="invalid-feedback">
                    <?= ($validator->getError('project_start')); ?>
                </div>
            </div>
            <div class="col-md-6">
                <label for="validationCustom06" class="form-label">Project Deadline *</label>
                <input type="date" class="form-control fc <?= ($validator->hasError('project_finish')) ? 'is-invalid' : ''; ?>" name="project_finish" value="<?= old('project_finish') ?>" required>
                <div class="invalid-feedback">
                    <?= ($validator->getError('project_finish')); ?>
                </div>
            </div>
            <div class="col-md-6">
                <label class="form-label">Project Description</label>
                <textarea class="form-control fc" name="project_desc" rows="4" placeholder="Describe the project..." value="<?= old('project_desc') ?>"></textarea>
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
                                <input class="btn btn-light plus" type="submit" name="submit" id="submitButton" />
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
    $(document).ready(function() {

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
    });
</script>
<!-- End of JS -->

<?= $this->endSection(); ?>