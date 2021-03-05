<?= $this->extend('temp/template'); ?>

<?= $this->section('content'); ?>
<div class="canvas-2">
    <div class="lay" style="text-align: left ;padding-bottom: 2rem;">
        <!-- tolong dikasih class text-center untuk disetiap halaman yg ada menu ini, cuma div class dibawah ini doang -->
        <div class="menu-detail text-center">
            <div class="table-responsive">
                <ul>
                    <li class=""><a href="<?= base_url() ?>/project/detail/<?= $id ?>">Project</a></li>
                    <li class="actived"><a href="<?= base_url() ?>/project/cost/<?= $id ?>">Cost</a></li>
                    <li class=""><a href="<?= base_url() ?>/project/transaction/<?= $id ?>">Transaction</a></li>
                    <li class=""><a href="<?= base_url() ?>/project/team/<?= $id ?>">Team</a></li>
                    <li class=""><a href="<?= base_url() ?>/project/comment/<?= $id ?>">Comment</a></li>
                </ul>
            </div>
        </div>
        <div class="add-back">
            <i class="fa fa-book">
                <span class="add-back-text">
                    Costs
                </span>
            </i>
            <button style="float: right;" type="button" class="btn btn-light" id="addCost"><i class="fa fa-plus-circle"><span style="font-size: 10pt;font-weight: 600;margin-left: 5px;">New Category</span></i></button>
        </div>

        <div class="box">
            <div class="left-box">
                <div class="detail-box back-rab inclusion">
                    <div class="row sub" style="margin-bottom: -20px;">
                        <div class="col" style="margin-bottom: 0;">
                            <p class="category-rab">Personnel</p>
                        </div>
                        <div class="col" style="text-align: right;">
                            <a>
                                <i class="fa fa-plus-circle add-rab" id="addCostCategory"></i>
                            </a>
                        </div>
                    </div>
                    <table id="example-1" class="table table-striped table-dark display nowrap responsive detail-rab" style="width:100%;margin-bottom: 50px;">
                        <thead>
                            <tr>
                                <th>Cost Description</th>
                                <th>Quantity</th>
                                <th>Unit Quantity</th>
                                <th>Duration</th>
                                <th>Unit Duration</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Gaji Developer</td>
                                <td class="text-right">2</td>
                                <td>Orang</td>
                                <td class="text-right">1</td>
                                <td>Bulan</td>
                                <td class="act-rab">
                                    <i class="fa fa-pencil act icon-edit-member" id="editExpen"></i>
                                    <i class="fa fa-trash-o icon-del-team" id="deleteExpen"></i>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="row sub" style="margin-bottom: -20px;margin-top: 15px;">
                        <div class="col" style="margin-bottom: 0;">
                            <p class="category-rab">Non Personnel</p>
                        </div>
                        <div class="col" style="text-align: right;">
                            <a>
                                <i class="fa fa-plus-circle add-rab" id="addCostCategory"></i>
                            </a>
                        </div>
                    </div>
                    <table id="example-2" class="table table-striped table-dark display nowrap responsive detail-rab" style="width:100%;">
                        <thead>
                            <tr>
                                <th>Cost Description</th>
                                <th>Quantity</th>
                                <th>Unit Quantity</th>
                                <th>Duration</th>
                                <th>Unit Duration</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Sewa Server</td>
                                <td class="text-right">2</td>
                                <td>Unit</td>
                                <td class="text-right">1</td>
                                <td>Tahun</td>
                                <td class="act-rab">
                                    <i class="fa fa-pencil act icon-edit-member" id="editExpen"></i>
                                    <i class="fa fa-trash-o icon-del-team" id="deleteExpen"></i>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Add New Category Cost -->

    <div class="modal fade text-left" id="costModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <form id="costForm" method="POST">
                        <div class="col">
                            <label class="form-label">Category *</label>
                            <input type="text" name="category" id="category" class="form-control fc" placeholder="New Category...">
                            <span class="text-danger" id="category_error"></span>
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
    <!-- Modal Add Cost Per Category -->

    <div class="modal fade text-left" id="expenModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <form id="expenForm" method="POST">
                        <div class="col">
                            <label class="form-label">Cost Description *</label>
                            <input type="text" name="costdec" id="costdec" class="form-control fc">
                            <span class="text-danger" id="costdec_error"></span>
                        </div>
                        <div class="col">
                            <label class="form-label">Quantity *</label>
                            <input type="number" class="form-control fc" name="quantity" placeholder="Type a number..." value="" required>
                            <span class="text-danger" id="quantity_error"></span>
                        </div>
                        <div class="col">
                            <label class="form-label">Unit Quantity *</label>
                            <input type="text" name="unitQuantity" id="unitQuantity" class="form-control fc">
                            <span class="text-danger" id="unitQuantity_error"></span>
                        </div>
                        <div class="col">
                            <label class="form-label">Duration *</label>
                            <input type="number" class="form-control fc" name="duration" placeholder="Type a number..." value="" required>
                            <span class="text-danger" id="duration_error"></span>
                        </div>
                        <div class="col">
                            <label class="form-label">Unit Duration *</label>
                            <input type="text" name="unitDuration" id="unitDuration" class="form-control fc">
                            <span class="text-danger" id="unitDuration_error"></span>
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

</div>
</div>
<div class="space text-center">
    <p class="dot">.</p>
</div>
</div>

<!-- JS Data table -->
<script>
    $(document).ready(function() {
        $('#example-1').DataTable({
            // "scrollX": true,
            "paging": false,
            "filter": false,
            "info": false
        });
    });

    $(document).ready(function() {
        $('#example-2').DataTable({
            // "scrollX": true,
            "paging": false,
            "filter": false,
            "info": false
        });
    });

    // //Create New Cost Category
    // $('#addCost').click(function() {
    //     $('#costForm')[0].reset();
    //     $('#name_error').text('');
    //     $('#position_error').text('');
    //     $('.modal-title').html('<i class="fa fa-list" style="color: white;"></i> Add an Category Cost');
    //     $('#action').val('create');
    //     $('#submitButton').val('Add');
    //     $('#costModal').modal('show');
    // })

    // $('#costForm').on('submit', function(event) {
    //     event.preventDefault();

    //     $.ajax({
    //         url: "<?= base_url(); ?>/project/saveMemberData",
    //         method: "POST",
    //         data: $(this).serialize(),
    //         dataType: "JSON",

    //         beforeSend: function() {
    //             $('#submitButton').val('Wait...');
    //             $('#submitButton').attr('disabled', 'disabled');
    //         },

    //         success: function(data) {

    //             if ($('#action').val() == 'create') {
    //                 $('#submitButton').val('Add');
    //             } else {
    //                 $('#submitButton').val('Edit');
    //             }

    //             $('#submitButton').attr('disabled', false);

    //             const Toast = Swal.mixin({
    //                 toast: true,
    //                 position: 'top-end',
    //                 showConfirmButton: false,
    //                 timer: 1700,
    //                 didOpen: (toast) => {
    //                     toast.addEventListener('mouseenter', Swal.stopTimer)
    //                     toast.addEventListener('mouseleave', Swal.resumeTimer)
    //                 }
    //             })

    //             if (data.error == 'yes') {
    //                 $('#name_error').text(data.name_error);
    //                 $('#position_error').text(data.position_error);

    //                 Toast.fire({
    //                     icon: 'error',
    //                     title: 'failed to add a member'
    //                 })
    //             } else {
    //                 $('#costModal').modal('hide');

    //                 setTimeout(location.reload.bind(location), 2200);

    //                 Toast.fire({
    //                     icon: 'success',
    //                     title: 'New member added'
    //                 })
    //             }
    //         }
    //     })
    // })

    // //Edit Inclu

    // $(document).on('click', '#editInclu', function() {

    //     var id = $(this).data('id');

    //     $.ajax({
    //         url: "<?= base_url() ?>/project/fetchIdPteam",
    //         method: "POST",
    //         data: {
    //             id: id
    //         },
    //         dataType: "JSON",

    //         success: function(data) {
    //             $('#name').val(data.employee_id);
    //             $('#position').val(data.position_id);

    //             $('#name_error').text('');
    //             $('#position_error').text('');
    //             $('.modal-title').html('<i class="fa fa-pencil-square-o" style="color: white;"></i> Edit an Income');
    //             $('#action').val('edit');
    //             $('#submitButton').val('Edit');
    //             $('#inlcuModal').modal('show');
    //             $('#member_id').val(id);
    //         }
    //     })
    // });

    // //Delete Inclu
    // $(document).on('click', '#deleteInclu', function() {
    //     var id = $(this).data('id');

    //     Swal.fire({
    //         title: 'Are you sure?',
    //         text: "You won't be able to revert this action",
    //         icon: 'warning',
    //         showCancelButton: true,
    //         confirmButtonText: 'Delete',
    //         cancelButtonText: 'Cancel'
    //     }).then((result) => {
    //         if (result.isConfirmed) {
    //             $.ajax({
    //                 url: "<?= base_url() ?>/project/deleteTeamMember",
    //                 method: "POST",
    //                 data: {
    //                     id: id
    //                 },

    //                 success: function(data) {
    //                     setTimeout(location.reload.bind(location));
    //                 }
    //             })
    //         }
    //     })
    // });

    // //Create Cost Per Category
    // $('#addCostCategory').click(function() {
    //     $('#expenForm')[0].reset();
    //     $('#name_error').text('');
    //     $('#position_error').text('');
    //     $('.modal-title').html('<i class="fa fa-user-plus" style="color: white;"></i> Add an Expenses');
    //     $('#action').val('create');
    //     $('#submitButton').val('Add');
    //     $('#expenModal').modal('show');
    // })

    // $('#expenForm').on('submit', function(event) {
    //     event.preventDefault();

    //     $.ajax({
    //         url: "<?= base_url(); ?>/project/saveMemberData",
    //         method: "POST",
    //         data: $(this).serialize(),
    //         dataType: "JSON",

    //         beforeSend: function() {
    //             $('#submitButton').val('Wait...');
    //             $('#submitButton').attr('disabled', 'disabled');
    //         },

    //         success: function(data) {

    //             if ($('#action').val() == 'create') {
    //                 $('#submitButton').val('Add');
    //             } else {
    //                 $('#submitButton').val('Edit');
    //             }

    //             $('#submitButton').attr('disabled', false);

    //             const Toast = Swal.mixin({
    //                 toast: true,
    //                 position: 'top-end',
    //                 showConfirmButton: false,
    //                 timer: 1700,
    //                 didOpen: (toast) => {
    //                     toast.addEventListener('mouseenter', Swal.stopTimer)
    //                     toast.addEventListener('mouseleave', Swal.resumeTimer)
    //                 }
    //             })

    //             if (data.error == 'yes') {
    //                 $('#name_error').text(data.name_error);
    //                 $('#position_error').text(data.position_error);

    //                 Toast.fire({
    //                     icon: 'error',
    //                     title: 'failed to add a member'
    //                 })
    //             } else {
    //                 $('#expenModal').modal('hide');

    //                 setTimeout(location.reload.bind(location), 2200);

    //                 Toast.fire({
    //                     icon: 'success',
    //                     title: 'New member added'
    //                 })
    //             }
    //         }
    //     })
    // })

    // //Edit Expen

    // $(document).on('click', '#editExpen', function() {

    //     var id = $(this).data('id');

    //     $.ajax({
    //         url: "<?= base_url() ?>/project/fetchIdPteam",
    //         method: "POST",
    //         data: {
    //             id: id
    //         },
    //         dataType: "JSON",

    //         success: function(data) {
    //             $('#name').val(data.employee_id);
    //             $('#position').val(data.position_id);

    //             $('#name_error').text('');
    //             $('#position_error').text('');
    //             $('.modal-title').html('<i class="fa fa-pencil-square-o" style="color: white;"></i> Edit an Expenses');
    //             $('#action').val('edit');
    //             $('#submitButton').val('Edit');
    //             $('#expenModal').modal('show');
    //             $('#member_id').val(id);
    //         }
    //     })
    // });

    // //Delete Inclu
    // $(document).on('click', '#deleteExpen', function() {
    //     var id = $(this).data('id');

    //     Swal.fire({
    //         title: 'Are you sure?',
    //         text: "You won't be able to revert this action",
    //         icon: 'warning',
    //         showCancelButton: true,
    //         confirmButtonText: 'Delete',
    //         cancelButtonText: 'Cancel'
    //     }).then((result) => {
    //         if (result.isConfirmed) {
    //             $.ajax({
    //                 url: "<?= base_url() ?>/project/deleteTeamMember",
    //                 method: "POST",
    //                 data: {
    //                     id: id
    //                 },

    //                 success: function(data) {
    //                     setTimeout(location.reload.bind(location));
    //                 }
    //             })
    //         }
    //     })
    // });
</script>

<?= $this->endSection(); ?>