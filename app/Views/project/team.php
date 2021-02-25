<?= $this->extend('temp/template'); ?>

<?= $this->section('content'); ?>
<div class="canvas-2">
    <div class="lay" style="text-align: left ;">
        <div class="menu-detail">
            <div class="table-responsive">
                <ul>
                    <li class=""><a href="<?= base_url() ?>/project/detail/<?= $id ?>">Project</a></li>
                    <li class=""><a href="<?= base_url() ?>/project/rab/<?= $id ?>">RAB</a></li>
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
                <!-- Button trigger modal -->

            </i>
            <a>
                <i class="fa fa-plus-circle fa-lg btn-addteam" id="addTeam"></i>
            </a>
            <!-- <div class="add-team">
            </div> -->
        </div>

        <div class="box">
            <div class="left-box">
                <div class="detail-box">


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
                            <div class="modal-title" id="exampleModalLabel" style="color: white;">
                            </div>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="teamForm" method="POST">
                            <div class="modal-body">
                                <div class="col">
                                    <label for="" class="form-label">Name</label>
                                    <select class="form-select form-control fc" name="name" id="name">
                                        <option disabled selected value=''>Choose one..</option>
                                        <?php foreach ($employee as $e) : ?>
                                            <option value="<?= $e['id'] ?>">
                                                <?= $e['employee_name'] ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
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
                                <input type="hidden" name="action" id="action" />
                                <input type="hidden" name="project_id" id="project_id" value="<?= $id ?>" />
                                <input type="hidden" name="member_id" id="member_id" />
                                <input class="btn btn-light plus" type="submit" name="submit" id="submitButton" />
                            </div>
                        </form>
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
    //Create Team Member
    $('#addTeam').click(function() {
        $('#teamForm')[0].reset();
        $('#name_error').text('');
        $('#position_error').text('');
        $('.modal-title').html('<i class="fa fa-user-plus" style="color: white;"></i> Add a Team Member');
        $('#action').val('create');
        $('#submitButton').val('Add');
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
                $('#submitButton').val('Wait...');
                $('#submitButton').attr('disabled', 'disabled');
            },

            success: function(data) {

                if ($('#action').val() == 'create') {
                    $('#submitButton').val('Add');
                } else {
                    $('#submitButton').val('Edit');
                }

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
                    $('#position_error').text(data.position_error);

                    Toast.fire({
                        icon: 'error',
                        title: 'failed to add a member'
                    })
                } else {
                    $('#teamModal').modal('hide');

                    setTimeout(location.reload.bind(location), 2200);

                    Toast.fire({
                        icon: 'success',
                        title: 'New member added'
                    })
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
                $('.modal-title').html('<i class="fa fa-pencil-square-o" style="color: white;"></i> Edit a Member');
                $('#action').val('edit');
                $('#submitButton').val('Edit');
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
</script>

<?= $this->endSection(); ?>