<?= $this->extend('temp/template'); ?>

<?= $this->section('content'); ?>
<div class="canvas-2">
    <div class="lay" style="text-align: left ;">
        <div class="menu-detail text-center">
            <div class="table-responsive">
                <ul>
                    <li class=""><a href="<?= base_url() ?>/project/detail/<?= $id ?>">Project</a></li>
                    <li class=""><a href="<?= base_url() ?>/project/cost/<?= $id ?>">Cost</a></li>
                    <li class="actived"><a href="<?= base_url() ?>/project/transaction/<?= $id ?>">Transaction</a></li>
                    <li class=""><a href="<?= base_url() ?>/project/team/<?= $id ?>">Team</a></li>
                    <li class=""><a href="<?= base_url() ?>/project/comment/<?= $id ?>">Comment</a></li>
                </ul>
            </div>
        </div>
        <div class="add-back">
            <i class="fa fa-calculator">
                <span class="add-back-text">
                    Transaction
                </span>
            </i>
        </div>

        <div class="box">
            <div class="left-box">
                <div class="detail-box back-rab inclusion">

                    <!-- Pemasukkan -->
                    <div class="row sub" style="margin-bottom: -15px;">
                        <div class="col" style="margin-bottom: 0;">

                            <p class="category-rab">
                                <a class="btn btn-light" style="border: none;margin-right: 5px;" data-toggle="collapse" href="#income" role="button" aria-expanded="false" aria-controls="income">
                                    <i class="fa fa-list-ol"></i>
                                </a>
                                Income
                            </p>
                        </div>
                        <div class="col" style="text-align: right;">
                            <a>
                                <i class="fa fa-plus-circle add-rab" id="addInclu"></i>
                            </a>
                        </div>
                    </div>
                    <div class="back-detail" style="margin: 0 auto 16px auto;">
                        <div class="" style="padding:0;margin: 0;">
                            <div class="collapse show multi-collapse" id="income">
                                <table id="example-1" class="table table-striped table-dark display nowrap detail-rab" style="width:100%;">
                                    <thead class="text-center">
                                        <tr>
                                            <th>Action</th>
                                            <th>Date</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="act-rab">
                                                <i class="fa fa-pencil act icon-edit-member" id="editInlcu"></i>
                                                <i class="fa fa-trash-o icon-del-team" id="deleteInclu"></i>
                                            </td>
                                            <td class="text-right">02/03/2021</td>
                                            <td>DP 1</td>
                                            <td class="text-center"><i class="fa fa-times-circle-o fa-lg incomplete-bedge" aria-hidden="true"><span>Incomplete</span></i></td>
                                            <td class="text-right">2000000</td>
                                        </tr>
                                        <tr>
                                            <td class="act-rab">
                                                <i class="fa fa-pencil act icon-edit-member" id="editInlcu"></i>
                                                <i class="fa fa-trash-o icon-del-team" id="deleteInclu"></i>
                                            </td>
                                            <td class="text-right">04/03/2021</td>
                                            <td>Pelunasan Biaya Proyek</td>
                                            <td class="text-center"><i class="fa fa-check-circle-o fa-lg complete-bedge" aria-hidden="true"><span>Complete</span></i></td>
                                            <td class="text-right">8000000</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row total">
                            <div class="col" style="height: fit-content;">
                                <p style="font-weight: 600;margin-left: 10px;">Total Amount</p>
                            </div>
                            <div class="col" style="height: fit-content;">
                                <p style="margin-right: 10px;text-align: right;">Rp. 10.000.000</p>
                            </div>
                        </div>
                    </div>
                    <!-- Pengeluaran -->
                    <div class="row sub" style="margin-bottom: -15px;">
                        <div class="col" style="margin-bottom: 0;">

                            <p class="category-rab">
                                <a class="btn btn-light" style="border: none;margin-right: 5px;" data-toggle="collapse" href="#outcome" role="button" aria-expanded="false" aria-controls="outcome">
                                    <i class="fa fa-list-ol"></i>
                                </a>
                                Outcome
                            </p>
                        </div>
                        <div class="col" style="text-align: right;">
                            <a>
                                <i class="fa fa-plus-circle add-rab" id="addOutcome"></i>
                            </a>
                        </div>
                    </div>
                    <div class="back-detail" style="margin: 0 auto;">
                        <div class="" style="padding:0;margin: 0;">
                            <div class="collapse show multi-collapse" id="outcome">
                                <table id="example-2" class="table table-striped table-dark display nowrap detail-rab" style="width:100%;">
                                    <thead class="text-center">
                                        <tr>
                                            <th>Action</th>
                                            <th>Date</th>
                                            <th>Item Cost</th>
                                            <th>Status</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="act-rab">
                                                <i class="fa fa-pencil act icon-edit-member" id="editInlcu"></i>
                                                <i class="fa fa-trash-o icon-del-team" id="deleteInclu"></i>
                                            </td>
                                            <td class="text-right">02/03/2021</td>
                                            <td>Server</td>
                                            <td class="text-center"><i class="fa fa-times-circle-o fa-lg incomplete-bedge" aria-hidden="true"><span>Incomplete</span></i></td>
                                            <td class="text-right">800000</td>
                                        </tr>
                                        <tr>
                                            <td class="act-rab">
                                                <i class="fa fa-pencil act icon-edit-member" id="editInlcu"></i>
                                                <i class="fa fa-trash-o icon-del-team" id="deleteInclu"></i>
                                            </td>
                                            <td class="text-right">04/03/2021</td>
                                            <td>Gaji Developer</td>
                                            <td class="text-center"><i class="fa fa-check-circle-o fa-lg complete-bedge" aria-hidden="true"><span>Complete</span></i></td>
                                            <td class="text-right">7000000</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!--  -->
                        <div class="row total">
                            <div class="col" style="height: fit-content;">
                                <p style="font-weight: 600;margin-left: 10px;">Total Amount</p>
                            </div>
                            <div class="col" style="height: fit-content;">
                                <p style="margin-right: 10px;text-align: right;">Rp. 7.800.000</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Modal Income -->
            <div class="modal fade" id="incomeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <form id="incomeForm" method="POST">
                                <div class="col">
                                    <label class="form-label">Date *</label>
                                    <input type="date" class="form-control fc" name="" value="" required>
                                    <span class="text-danger" id="unit_error"></span>
                                </div>
                                <div class="col">
                                    <label class="form-label">Description *</label>
                                    <input type="text" name="description" id="description" class="form-control fc" placeholder="Description...">
                                    <span class="text-danger" id="description_error"></span>
                                </div>
                                <div class="col">
                                    <label class="form-label">Amount *</label>
                                    <input type="number" class="form-control fc" name="amount" placeholder="Type a number..." value="" required>
                                    <span class="text-danger" id="amount_error"></span>
                                </div>
                                <div class="col mb-4">
                                    <label class="form-label">Status *</label>
                                    <select class="form-select form-control fc" name="itemCost" id="itemCost">
                                        <option disabled selected>Select One...</option>
                                        <option value="Complete">Complete</option>
                                        <option value="Incomplete">Incomplete</option>
                                    </select>
                                    <span class="text-danger" id="itemCost_error"></span>
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
            <!-- Modal Outcome -->
            <div class="modal fade" id="outcomeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <form id="outcomeForm" method="POST">
                                <div class="col">
                                    <label class="form-label">Date *</label>
                                    <input type="date" class="form-control fc" name="" value="" required>
                                    <span class="text-danger" id="unit_error"></span>
                                </div>
                                <div class="col">
                                    <label class="form-label">Item Cost*</label>
                                    <select class="form-select form-control fc" name="itemCost" id="itemCost">
                                        <option disabled selected>Select Item...</option>
                                        <option value="server">Server</option>
                                        <option value="gaji">Gaji Developer</option>
                                    </select>
                                    <span class="text-danger" id="itemCost_error"></span>
                                </div>
                                <div class="col">
                                    <label class="form-label">Amount *</label>
                                    <input type="number" class="form-control fc" name="amount" placeholder="Type a number..." value="" required>
                                    <span class="text-danger" id="amount_error"></span>
                                </div>
                                <div class="col mb-4">
                                    <label class="form-label">Status *</label>
                                    <select class="form-select form-control fc" name="itemCost" id="itemCost">
                                        <option disabled selected>Select One...</option>
                                        <option value="Complete">Complete</option>
                                        <option value="Incomplete">Incomplete</option>
                                    </select>
                                    <span class="text-danger" id="itemCost_error"></span>
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
    <div class="space">
        <p class="dot">.</p>
    </div>
</div>
</div>

<!-- JS Data table -->
<script>
    $(document).ready(function() {
        $('#example-1').DataTable({
            "scrollX": true,
            "filter": false,
            "info": false
        });
    });

    $(document).ready(function() {
        $('#example-2').DataTable({
            "scrollX": true,
            "filter": false,
            "info": false
        });
    });

    // //Create Inclu
    // $('#addInclu').click(function() {
    //     $('#incomeForm')[0].reset();
    //     $('#name_error').text('');
    //     $('#position_error').text('');
    //     $('.modal-title').html('<i class="fa fa-user-plus" style="color: white;"></i> Add an Income');
    //     $('#action').val('create');
    //     $('#submitButton').val('Add');
    //     $('#incomeModal').modal('show');
    // })

    // $('#incomeForm').on('submit', function(event) {
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
    //                 $('#incomeModal').modal('hide');

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

    // //Create Expen
    // $('#addOutcome').click(function() {
    //     $('#outcomeForm')[0].reset();
    //     $('#name_error').text('');
    //     $('#position_error').text('');
    //     $('.modal-title').html('<i class="fa fa-user-plus" style="color: white;"></i> Add an Outcome');
    //     $('#action').val('create');
    //     $('#submitButton').val('Add');
    //     $('#outcomeModal').modal('show');
    // })

    // $('#outcomeForm').on('submit', function(event) {
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
    //                 $('#outcomeModal').modal('hide');

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
    //             $('#outcomeModal').modal('show');
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