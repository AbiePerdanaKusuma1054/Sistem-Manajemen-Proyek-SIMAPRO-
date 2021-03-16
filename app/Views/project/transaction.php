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
                    <div class="row sub" style="margin-bottom: -15px;margin-top: 0.5rem;">
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
                                <i class="fa fa-plus-circle add-rab fa-lg" id="addIncome"></i>
                            </a>
                        </div>
                    </div>
                    <div class="back-detail" style="margin: 0 auto 16px auto;">
                        <div class="" style="padding:0;margin: 0;">
                            <div class="collapse show multi-collapse" id="income">
                                <table id="revenuestable" class="table table-striped table-dark display nowrap detail-rab" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Action</th>
                                            <th class="text-center">Date</th>
                                            <th class="text-center">Description</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Amount</th>
                                        </tr>
                                    </thead>
                                    <!-- <tbody>
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
                                    </tbody> -->
                                </table>
                            </div>
                        </div>
                        <div class="row total">
                            <div class="col" style="height: fit-content;">
                                <p style="font-weight: 600;margin-left: 10px;">Total Amount</p>
                            </div>
                            <div class="col" style="height: fit-content;">
                                <?php foreach ($revenues_sum as $sum) : ?>
                                    <p style="margin-right: 10px;text-align: right;">Rp<?= ($sum['prevenues_amount'] == NULL) ? '0' : $sum['prevenues_amount'] ?></p>
                                <?php endforeach ?>
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
                                <i class="fa fa-plus-circle add-rab fa-lg" id="addOutcome"></i>
                            </a>
                        </div>
                    </div>
                    <div class="back-detail" style="margin: 0 auto;">
                        <div class="" style="padding:0;margin: 0;">
                            <div class="collapse show multi-collapse" id="outcome">
                                <table id="transactiontable" class="table table-striped table-dark display nowrap detail-rab" style="width:100%;">
                                    <thead class="text-center">
                                        <tr>
                                            <th class="text-center">Action</th>
                                            <th class="text-center">Date</th>
                                            <th class="text-center">Description</th>
                                            <th class="text-center">Item</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Amount</th>
                                        </tr>
                                    </thead>
                                    <!-- <tbody>
                                        <tr>
                                            <td class="act-rab">
                                                <i class="fa fa-pencil act icon-edit-member" id="editInlcu"></i>
                                                <i class="fa fa-trash-o icon-del-team" id="deleteInclu"></i>
                                            </td>
                                            <td class="text-right">02/03/2021</td>
                                            <td>Server</td>
                                            <td>Perawatan</td>
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
                                            <td>A</td>
                                            <td class="text-center"><i class="fa fa-check-circle-o fa-lg complete-bedge" aria-hidden="true"><span>Complete</span></i></td>
                                            <td class="text-right">7000000</td>
                                        </tr>
                                    </tbody> -->
                                </table>
                            </div>
                        </div>
                        <!--  -->
                        <div class="row total">
                            <div class="col" style="height: fit-content;">
                                <p style="font-weight: 600;margin-left: 10px;">Total Amount</p>
                            </div>
                            <div class="col" style="height: fit-content;">
                                <?php foreach ($transaction_sum as $sum) : ?>
                                    <p style="margin-right: 10px;text-align: right;">Rp<?= ($sum['cost_amount'] == NULL) ? '0' : $sum['cost_amount'] ?></p>
                                <?php endforeach ?>
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
                                    <input type="date" class="form-control fc" name="date" id="date">
                                    <span class="text-danger" id="date_error"></span>
                                </div>
                                <div class="col">
                                    <label class="form-label">Description *</label>
                                    <input type="text" name="desc" id="desc" class="form-control fc" placeholder="Description...">
                                    <span class="text-danger" id="desc_error"></span>
                                </div>
                                <div class="col">
                                    <label class="form-label">Amount *</label>
                                    <input type="number" class="form-control fc" name="amount" id="amount" placeholder="Type a number...">
                                    <span class="text-danger" id="amount_error"></span>
                                </div>
                                <div class="col mb-4">
                                    <label class="form-label">Status *</label>
                                    <select class="form-select form-control fc" name="status" id="status">
                                        <option disabled selected>Select One...</option>
                                        <option value="complete">Complete</option>
                                        <option value="incomplete">Incomplete</option>
                                    </select>
                                    <span class="text-danger" id="status_error"></span>
                                </div>
                                <div class="modal-footer">
                                    <input type="hidden" name="action_income" id="action_income" />
                                    <input type="hidden" name="project_id" id="project_id" value="<?= $id ?>" />
                                    <input type="hidden" name="income_id" id="income_id" />
                                    <button class="btn btn-light plus" type="submit" name="submit" id="submitButtonIncome"></button>
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
                                    <input type="date" class="form-control fc" name="outcome_date" id="outcome_date">
                                    <span class="text-danger" id="outcome_date_error"></span>
                                </div>
                                <div class="col">
                                    <label class="form-label">Cost Description*</label>
                                    <select class="form-select form-control fc" name="cost_desc" id="cost_desc">
                                        <option disabled selected>Select Item...</option>
                                        <?php foreach ($desc as $d) : ?>
                                            <option value="<?= $d['id'] ?>"><?= $d['pcost_desc'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <span class="text-danger" id="cost_desc_error"></span>
                                </div>
                                <div class="col">
                                    <label class="form-label">Cost Item *</label>
                                    <input type="text" class="form-control fc" name="cost_item" id="cost_item">
                                    <span class="text-danger" id="cost_item_error"></span>
                                </div>
                                <div class="col">
                                    <label class="form-label">Amount *</label>
                                    <input type="number" class="form-control fc" name="outcome_amount" id="outcome_amount" placeholder="Type a number...">
                                    <span class="text-danger" id="outcome_amount_error"></span>
                                </div>
                                <div class="col mb-4">
                                    <label class="form-label">Status *</label>
                                    <select class="form-select form-control fc" name="outcome_status" id="outcome_status">
                                        <option disabled selected>Select One...</option>
                                        <option value="complete">Complete</option>
                                        <option value="incomplete">Incomplete</option>
                                    </select>
                                    <span class="text-danger" id="outcome_status_error"></span>
                                </div>
                                <div class="modal-footer">
                                    <input type="hidden" name="action_outcome" id="action_outcome" />
                                    <input type="hidden" name="outcome_id" id="outcome_id" />
                                    <button class="btn btn-light plus" type="submit" name="submit" id="submitButtonOutcome"></button>
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
        $('#revenuestable').DataTable({
            "aoColumnDefs": [{
                    targets: 4,
                    className: 'text-right'
                },
                {
                    targets: 3,
                    className: 'text-center'
                },
                {
                    targets: 2,
                    className: 'text-left'
                },
                {
                    targets: 1,
                    className: 'text-right'
                },
                {
                    targets: 0,
                    className: 'text-center'
                },
                {
                    responsivePriority: 3,
                    targets: 0
                },
                {
                    responsivePriority: 2,
                    targets: 2
                },
                {
                    responsivePriority: 1,
                    targets: 1
                },
                {
                    "bSortable": false,
                    "aTargets": [0]
                }
            ],
            // "scrollX": true,
            "order": [],
            "serverSide": true,
            "responsive": true,
            "filter": false,
            "info": false,
            "ajax": {
                url: "<?= base_url() ?>/project/fetchRevenues/<?= $id ?>",
                type: 'POST'
            }
        });
    });

    $(document).ready(function() {
        $('#transactiontable').DataTable({
            "aoColumnDefs": [{
                    targets: 5,
                    className: 'text-right'
                },
                {
                    targets: 4,
                    className: 'text-center'
                },
                {
                    targets: 3,
                    className: 'text-left'
                },
                {
                    targets: 2,
                    className: 'text-left'
                },
                {
                    targets: 1,
                    className: 'text-right'
                },
                {
                    targets: 0,
                    className: 'text-center'
                },
                {
                    responsivePriority: 3,
                    targets: 0
                },
                {
                    responsivePriority: 2,
                    targets: 1
                },
                {
                    responsivePriority: 1,
                    targets: 2
                },
                {
                    "bSortable": false,
                    "aTargets": [0]
                }
            ],
            // "scrollX": true,
            "order": [],
            "serverSide": true,
            "responsive": true,
            "filter": false,
            "info": false,
            "ajax": {
                url: "<?= base_url() ?>/project/fetchOutcome/<?= $id ?>",
                type: 'POST'
            }
        });
    });

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

    //Create Income
    $('#addIncome').click(function() {
        $('#incomeForm')[0].reset();
        $('#date_error').text('');
        $('#desc_error').text('');
        $('#amount_error').text('');
        $('#status_error').text('');
        $('.modal-title').html('<i class="fa fa-user-plus" style="color: white;"></i> Add an Income');
        $('#action_income').val('create');
        $('#submitButtonIncome').html('Add');
        $('#incomeModal').modal('show');
    })

    $('#incomeForm').on('submit', function(event) {
        event.preventDefault();

        $.ajax({
            url: "<?= base_url(); ?>/project/saveIncome",
            method: "POST",
            data: $(this).serialize(),
            dataType: "JSON",

            beforeSend: function() {
                $('#submitButtonIncome').html('<i class="fa fa-spinner fa-spin" style="color: black;"></i>');
                $('#submitButtonIncome').attr('disabled', 'disabled');
            },

            success: function(data) {

                if ($('#action_income').val() == 'create') {
                    $('#submitButtonIncome').html('Add');
                } else {
                    $('#submitButtonIncome').html('Edit');
                }

                $('#submitButtonIncome').attr('disabled', false);

                if (data.error == 'yes') {
                    $('#date_error').text(data.date_error);
                    $('#desc_error').text(data.desc_error);
                    $('#amount_error').text(data.amount_error);
                    $('#status_error').text(data.status_error);

                    if ($('#action_income').val() == 'create') {
                        Toast.fire({
                            icon: 'error',
                            title: 'failed to add an income'
                        })
                    } else {
                        Toast.fire({
                            icon: 'error',
                            title: 'failed to update an income'
                        })
                    }
                } else {
                    $('#incomeModal').modal('hide');
                    $('#revenuestable').DataTable().ajax.reload();

                    if ($('#action_income').val() == 'create') {
                        Toast.fire({
                            icon: 'success',
                            title: 'Income data added'
                        })
                    } else {
                        Toast.fire({
                            icon: 'success',
                            title: 'Income data updated'
                        })
                    }
                }
            }
        })
    })

    //Edit Income
    $(document).on('click', '.editIncome', function() {

        var id = $(this).data('id');

        $.ajax({
            url: "<?= base_url() ?>/project/fetchIdIncome",
            method: "POST",
            data: {
                id: id
            },
            dataType: "JSON",

            success: function(data) {
                $('#date').val(data.prevenues_date);
                $('#desc').val(data.prevenues_desc);
                $('#amount').val(data.prevenues_amount);
                $('#status').val(data.prevenues_status);

                $('#date_error').text('');
                $('#desc_error').text('');
                $('#amount_error').text('');
                $('#status_error').text('');
                $('.modal-title').html('<i class="fa fa-pencil-square-o" style="color: white;"></i> Edit an Income');
                $('#action_income').val('edit');
                $('#submitButtonIncome').html('Edit');
                $('#incomeModal').modal('show');
                $('#income_id').val(id);
            }
        })
    });

    //Delete Income
    $(document).on('click', '.deleteIncome', function() {
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
                    'Income data has been deleted.',
                    'success',

                    $.ajax({
                        url: "<?= base_url() ?>/project/deleteIncome",
                        method: "POST",
                        data: {
                            id: id
                        },

                        success: function(data) {
                            $('#revenuestable').DataTable().ajax.reload();
                        }

                    })
                )
            }
        })
    });

    //Create Outcome
    $('#addOutcome').click(function() {
        $('#outcomeForm')[0].reset();
        $('#outcome_date_error').text('');
        $('#cost_desc_error').text('');
        $('#cost_item_error').text('');
        $('#outcome_amount_error').text('');
        $('#outcome_status_error').text('');
        $('.modal-title').html('<i class="fa fa-user-plus" style="color: white;"></i> Add an Outcome');
        $('#action_outcome').val('create');
        $('#submitButtonOutcome').html('Add');
        $('#outcomeModal').modal('show');
    })

    $('#outcomeForm').on('submit', function(event) {
        event.preventDefault();

        $.ajax({
            url: "<?= base_url(); ?>/project/saveOutcome",
            method: "POST",
            data: $(this).serialize(),
            dataType: "JSON",

            beforeSend: function() {
                $('#submitButtonOutcome').html('<i class="fa fa-spinner fa-spin" style="color: black;"></i>');
                $('#submitButtonOutcome').attr('disabled', 'disabled');
            },

            success: function(data) {
                if ($('#action_outcome').val() == 'create') {
                    $('#submitButtonOutcome').html('Add');
                } else {
                    $('#submitButtonOutcome').html('Edit');
                }

                $('#submitButtonOutcome').attr('disabled', false);

                if (data.error == 'yes') {
                    $('#outcome_date_error').text(data.outcome_date_error);
                    $('#cost_desc_error').text(data.cost_desc_error);
                    $('#cost_item_error').text(data.cost_item_error);
                    $('#outcome_amount_error').text(data.outcome_amount_error);
                    $('#outcome_status_error').text(data.outcome_status_error);

                    if ($('#action_outcome').val() == 'create') {
                        Toast.fire({
                            icon: 'error',
                            title: 'failed to add an outcome'
                        })
                    } else {
                        Toast.fire({
                            icon: 'error',
                            title: 'failed to update an outcome'
                        })
                    }

                } else {
                    $('#outcomeModal').modal('hide');
                    $('#transactiontable').DataTable().ajax.reload();

                    if ($('#action_outcome').val() == 'create') {
                        Toast.fire({
                            icon: 'success',
                            title: 'Outcome data added'
                        })
                    } else {
                        Toast.fire({
                            icon: 'success',
                            title: 'Outcome data updated'
                        })
                    }
                }
            }
        })
    })

    //Edit Outcome

    $(document).on('click', '.editOutcome', function() {

        var id = $(this).data('id');

        $.ajax({
            url: "<?= base_url() ?>/project/fetchIdOutcome",
            method: "POST",
            data: {
                id: id
            },
            dataType: "JSON",

            success: function(data) {
                $('#outcome_date').val(data.cost_date);
                $('#cost_item').val(data.cost_item);
                $('#cost_desc').val(data.id);
                $('#outcome_amount').val(data.cost_amount);
                $('#outcome_status').val(data.cost_status);

                $('#outcome_date_error').text('');
                $('#cost_desc_error').text('');
                $('#cost_item_error').text('');
                $('#outcome_amount_error').text('');
                $('#outcome_status_error').text('');
                $('.modal-title').html('<i class="fa fa-pencil-square-o" style="color: white;"></i> Edit an Outcome');
                $('#action_outcome').val('edit');
                $('#submitButtonOutcome').html('Edit');
                $('#outcomeModal').modal('show');
                $('#outcome_id').val(id);
            }
        })
    });

    //Delete Outcome
    $(document).on('click', '.deleteOutcome', function() {
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
                    'Outcome data has been deleted.',
                    'success',

                    $.ajax({
                        url: "<?= base_url() ?>/project/deleteOutcome",
                        method: "POST",
                        data: {
                            id: id
                        },

                        success: function(data) {
                            $('#transactiontable').DataTable().ajax.reload();
                        }
                    })
                )
            }
        })
    });
</script>

<?= $this->endSection(); ?>