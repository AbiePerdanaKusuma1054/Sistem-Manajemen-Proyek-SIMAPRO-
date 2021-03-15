<?= $this->extend('temp/template'); ?>

<?= $this->section('content'); ?>
<div class="canvas-2">
    <div class="lay" style="text-align: left ;">
        <div class="menu-detail text-center">
            <div class="table-responsive">
                <ul>
                    <li class=""><a href="<?= base_url() ?>/project/detail/<?= $id ?>">Project</a></li>
                    <li class=""><a href="<?= base_url() ?>/project/cost/<?= $id ?>">Cost</a></li>
                    <li class=""><a href="<?= base_url() ?>/project/transaction/<?= $id ?>">Transaction</a></li>
                    <li class="actived"><a href="<?= base_url() ?>/project/team/<?= $id ?>">Team</a></li>
                    <li class=""><a href="<?= base_url() ?>/project/comment/<?= $id ?>">Comment</a></li>
                </ul>
            </div>
        </div>
        <div class="add-back">
            <i class="fa fa-users">
                <span class="add-team-text">
                    Project Team
                </span>
            </i>
        </div>

        <div class="box">
            <div class="left-box">
                <div class="detail-box anim">
                    <button style="float: right;" type="button" class="btn btn-light" id="addTeam"><i class="fa fa-plus-circle"><span style="font-size: 10pt;font-weight: 600;margin-left: 5px;">New Member</span></i></button>
                    <div id="back-team" style="padding: 20px 1.5rem 0 1.5rem;">
                        <div class="row">
                            <div class="col">
                                <i class="fa fa-user-circle white"><span class="name-text"><?= $pm['project_manager'] ?>
                                    </span></i>
                            </div>
                            <div class="col-md-auto">
                                <p class="post-text">Project Manager</p>
                            </div>
                            <div class="col col-lg-2" style="text-align: right;">
                            </div>
                        </div>

                        <?php foreach ($members as $m) : ?>
                            <div class="row memberList">
                                <div class="col">
                                    <i class="fa fa-user-circle white"><span class="name-text"><?= $m['employee_name'] ?></span></i>
                                </div>
                                <div class="col-md-auto">
                                    <p class="post-text"><?= ucwords($m['position_name']) ?></p>
                                </div>
                                <div class="col col-lg-2" style="text-align: right;display: inline;">
                                    <i class="fa fa-pencil act icon-edit-member editMember" data-id="<?= $m['id'] ?>"></i>
                                    <i class="fa fa-trash-o icon-del-team deleteMember" data-id="<?= $m['id'] ?>"></i>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>


            <!-- Modal Add Team -->
            <div class="modal fade" id="teamModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="modal-title" id="teamModalLabel" style="color: white;">
                            </div>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="teamForm" method="POST">
                            <div class="modal-body">
                                <div class="col">
                                    <label for="" class="form-label">Name</label>
                                    <div class="input-group">
                                        <select class="form-select form-control fc" name="name" id="name">
                                            <option disabled selected value=''>Choose one..</option>
                                            <?php foreach ($employee as $e) : ?>
                                                <option value="<?= $e['id'] ?>">
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
                                    <span class="text-danger" id="name_error"></span>
                                </div>
                                <div class="col">
                                    <label for="" class="form-label">Position</label>
                                    <select class="form-select form-control fc" name="position" id="position">
                                        <option disabled selected value=''>Choose one..</option>
                                        <?php foreach ($position as $p) : ?>
                                            <option value="<?= $p['id'] ?>">
                                                <?= ucwords($p['position_name']) ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <span class="text-danger" id="position_error"></span>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" name="action" id="action_member" />
                                <input type="hidden" name="project_id" id="project_id" value="<?= $id ?>" />
                                <input type="hidden" name="member_id" id="member_id" />
                                <button class="btn btn-light plus" type="submit" name="submit" id="submitButtonMember"></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- End -->

            <!-- Modal Add & Edit Employee -->
            <div class="modal fade" name="employeeModal" id="employeeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="modal-title" id="employeeModalLabel" style="color: white;">
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
                                    <button class="btn btn-light plus" type="submit" name="submit" id="submitButtonEmployee"></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End -->

        </div>
    </div>
    <div class="space">
        <p class="dot">.</p>
    </div>
</div>
</div>

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

    //Create Team Member
    $('#addTeam').click(function() {
        $('#teamForm')[0].reset();
        $('#name_error').text('');
        $('#position_error').text('');
        $('#teamModalLabel').html('<i class="fa fa-user-plus" style="color: white;"></i> Add a Team Member');
        $('#action_member').val('create');
        $('#submitButtonMember').html('Add');
        $('#teamModal').modal('show');
    })

    $('#teamForm').on('submit', function(event) {
        event.preventDefault();

        $.ajax({
            url: "<?= base_url(); ?>/project/saveMemberData",
            method: "POST",
            data: $(this).serialize(),
            dataType: "JSON",

            beforeSend: function() {
                $('#submitButtonMember').html('<i class="fa fa-spinner fa-spin" style="color: black;"></i>');
                $('#submitButtonMember').attr('disabled', 'disabled');
            },

            success: function(data) {

                if ($('#action_member').val() == 'create') {
                    $('#submitButtonMember').html('Add');
                } else {
                    $('#submitButtonMember').html('Edit');
                }

                $('#submitButtonMember').attr('disabled', false);

                if (data.error == 'yes') {
                    $('#name_error').text(data.name_error);
                    $('#position_error').text(data.position_error);

                    Toast.fire({
                        icon: 'error',
                        title: 'failed to add a member'
                    })
                } else {
                    $('#teamModal').modal('hide');

                    setTimeout(location.reload.bind(location));
                }
            }
        })
    })

    //Edit Member

    $(document).on('click', '.editMember', function() {

        var id = $(this).data('id');

        $.ajax({
            url: "<?= base_url() ?>/project/fetchIdPteam",
            method: "POST",
            data: {
                id: id
            },
            dataType: "JSON",

            success: function(data) {
                $('#name').val(data.employee_id);
                $('#position').val(data.position_id);

                $('#name_error').text('');
                $('#position_error').text('');
                $('#teamModalLabel').html('<i class="fa fa-pencil-square-o" style="color: white;"></i> Edit a Member');
                $('#action_member').val('edit');
                $('#submitButtonMember').html('Edit');
                $('#teamModal').modal('show');
                $('#member_id').val(id);
            }
        })
    });

    //Delete Team Member
    $(document).on('click', '.deleteMember', function() {
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
                $.ajax({
                    url: "<?= base_url() ?>/project/deleteTeamMember",
                    method: "POST",
                    data: {
                        id: id
                    },

                    success: function(data) {
                        setTimeout(location.reload.bind(location));
                    }
                })
            }
        })
    });

    //Add employee

    $('#addEmployee').click(function() {
        $('#employeeForm')[0].reset();
        $('#name_error').text('');
        $('#email_error').text('');
        $('#gender_error').text('');
        $('#address_error').text('');
        $('#employeeModalLabel').html('<i class="fa fa-user-plus" style="color: white;"></i> Add Employee');
        $('#action').val('create');
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

                $('#submitButtonEmployee').html('Create');
                $('#submitButtonEmployee').attr('disabled', false);

                if (data.error == 'yes') {
                    $('#name_error').text(data.name_error);
                    $('#email_error').text(data.email_error);
                    $('#gender_error').text(data.gender_error);
                    $('#address_error').text(data.address_error);

                    Toast.fire({
                        icon: 'error',
                        title: 'Failed to create an Employee'
                    })

                } else {
                    $('#employeeModal').modal('hide');
                    $('#teamModal').modal('hide');
                    setTimeout(location.reload.bind(location));
                }
            }
        })
    });

    <?php if (session()->getFlashdata('msg') == 'create') { ?>
        Toast.fire({
            icon: 'success',
            title: 'New member added'
        })
    <?php } else if (session()->getFlashdata('msg') == 'edit') { ?>
        Toast.fire({
            icon: 'success',
            title: 'Member Updated'
        })
    <?php } else if (session()->getFlashdata('msg') == 'delete') { ?>
        Swal.fire(
            'Deleted!',
            'A member has been deleted.',
            'success'
        )
    <?php } else if (session()->getFlashdata('msg') == 'create_employee') { ?>
        Toast.fire({
            icon: 'success',
            title: 'New data created'
        })
    <?php } ?>
</script>

<?= $this->endSection(); ?>