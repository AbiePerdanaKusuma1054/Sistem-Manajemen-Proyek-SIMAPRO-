<?= $this->extend('temp/template'); ?>

<?= $this->section('content'); ?>


<div class="canvas">
    <div class="menu-list">
        <a href="<?= base_url() ?>/"><span class="menu-list-title">Dashboard</span></a>
        <div class="line"></div>
        <a href="<?= base_url() ?>/project"><span class="menu-list-title active">Project</span></a>
        <div class="line"></div>
        <a href="<?= base_url() ?>/user"><span class="menu-list-title">User</span></a>
        <div class="line"></div>
        <a href="<?= base_url() ?>/client"><span class="menu-list-title">Client</span></a>
    </div>
</div>
<!--  -->
<div class="canvas-2">
    <div class="lay" style="text-align: left ;">
        <div class="add-back">
            <i class="fa fa-pencil-square-o">
                <span class="add-back-text">
                    Edit Your Project
                </span>
            </i>
        </div>
        <form class="row g-3 needs-validation" novalidate>
            <div class="col-md-6">
                <label for="validationCustom01" class="form-label">Project Name *</label>
                <input type="text" class="form-control fc" id="validationCustom01" value="Website" required>
                <div class="invalid-feedback">
                    Please input a project name.
                </div>
            </div>
            <div class="col-md-6">
                <label for="validationCustom02" class="form-label">Project Master *</label>
                <input type="text" class="form-control fc" id="validationCustom02" value="Alexander" required>
                <div class="invalid-feedback">
                    Please input a project master.
                </div>
            </div>
            <div class="col-md-6">
                <label for="validationCustom03" class="form-label">Client *</label>
                <div class="input-group">
                    <select class="form-select form-control fc" id="validationCustom03">
                        <option disabled>Choose client..</option>
                        <option value="Dacoda" selected>Dacoda</option>
                        <option value="Shopii">Shopii</option>
                        <option value="XXI">XXI</option>
                        <option value="Tokotoko Team">Tokotoko Team</option>
                        <option value="Unila">Unila</option>
                    </select>
                    <div class="input-group-append">
                        <!-- Button Triggered Modal Add Client -->
                        <button class="btn btn-secondary" type="button" name="addClient" id="addClient">
                            Other Client
                        </button>
                    </div>
                </div>
                <div class="invalid-feedback">
                    Please input a client.
                </div>
            </div>
            <div class="col-md-4">
                <label for="validationCustom04" class="form-label">Contract Amount *</label>
                <input type="number" class="form-control fc" id="validationCustom04" value="10000000" required>
                <div class="invalid-feedback">
                    Please input a contract amount.
                </div>
            </div>
            <div class="col-md-6">
                <label for="validationCustom05" class="form-label">Project Start *</label>
                <input type="date" class="form-control fc" id="validationCustom05" value="" required>
                <div class="invalid-feedback">
                    Please input a date start project.
                </div>
            </div>
            <div class="col-md-6">
                <label for="validationCustom06" class="form-label">Project Deadline *</label>
                <input type="date" class="form-control fc" id="validationCustom06" value="" required>
                <div class="invalid-feedback">
                    Please input a deadline.
                </div>
            </div>
            <div class="col-md-8">
                <label class="form-label">Project Description</label>
                <textarea class="form-control fc" id="exampleFormControlTextarea1" rows="4" placeholder="Desc project..."></textarea>
            </div>
            <div class="col-md-4">
                <label for="validationCustom04" class="form-label">Status Project</label>
                <select class="form-select form-control fc" id="validationCustom03">
                    <option value="1" selected>Waiting</option>
                    <option value="2">On Progress</option>
                    <option value="3">Hold</option>
                    <option value="4">Finished</option>
                    <option value="5">Cancelled</option>
                </select>
            </div>
            <div class="col-12">
                <button class="btn btn-light plus" type="submit">Save</button>
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
    });
</script>
<!-- End of JS -->

<?= $this->endSection(); ?>