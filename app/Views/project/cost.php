<?= $this->extend('temp/template'); ?>

<?= $this->section('content'); ?>
<div class="canvas-2">
    <div class="lay" style="text-align: left ;padding-bottom: 2rem;">
        <div class="menu-detail text-center">
            <div class="table-responsive">
                <ul>
                    <li class=""><a href="<?= base_url() ?>/project/detail/<?= $id ?>">Details</a></li>
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
            <button style="float: right;transition-duration: 500ms;" type="button" class="btn btn-light" id="addCostCat"><i class="fa fa-plus-circle"><span style="font-size: 10pt;font-weight: 600;margin-left: 5px;">New Category</span></i></button>
        </div>

        <div class="box">
            <div class="left-box">
                <div class="detail-box back-rab inclusion" style="padding-bottom: 0rem;">
                    <?php if (empty($category)) : ?>
                        <div class="no-data">
                            <p>No data available</p>
                        </div>
                    <?php endif; ?>
                    <?php foreach ($category as $cat) : ?>
                        <div class="row sub" style="margin-bottom: -20px;margin-top: 10px;">
                            <div class="col" style="margin-bottom: 0;">
                                <p class="category-rab"><?= $cat['category_name'] ?>
                                    <i class="fa fa-pencil act icon-edit-member editCat" data-id="<?= $cat['id'] ?>"></i>
                                    <i class="fa fa-trash-o icon-del-team deleteCat" data-id="<?= $cat['id'] ?>"></i>
                                </p>
                            </div>
                            <div class="col" style="text-align: right;">
                                <a>
                                    <i class="fa fa-plus-circle add-rab addCost" data-id="<?= $cat['id'] ?>"></i>
                                </a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="table" class="table table-striped table-bordered table-dark display nowrap responsive detail-rab" style="width:100%;margin-bottom: 30px;">
                                <thead>
                                    <tr>
                                        <th class="text-center">Cost Description</th>
                                        <th class="text-center">Amount</th>
                                        <th class="text-center">Quantity</th>
                                        <th class="text-center">Unit Quantity</th>
                                        <th class="text-center">Duration</th>
                                        <th class="text-center">Unit Duration</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $cost = $costs->where('category_id', $cat['id'])->findAll() ?>
                                    <?php foreach ($cost as $c) : ?>
                                        <tr>
                                            <td><?= $c['pcost_desc'] ?></td>
                                            <td class="text-right">Rp<?= $c['pcost_amount'] ?></td>
                                            <td class="text-right"><?= $c['pcost_quantity'] ?></td>
                                            <td><?= $c['pcost_unit'] ?></td>
                                            <td class="text-right"><?= $c['pcost_duration'] ?></td>
                                            <td><?= $c['pcost_unit_duration'] ?></td>
                                            <td class="act-rab">
                                                <i class="fa fa-pencil act icon-edit-member editCost" data-id="<?= $c['id'] ?>"></i>
                                                <i class="fa fa-trash-o icon-del-team deleteCost" data-id="<?= $c['id'] ?>"></i>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal New Cost Category -->
    <div class="modal fade text-left" id="costCatModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <form id="costCatForm" method="POST">
                        <div class="col">
                            <label class="form-label">Category *</label>
                            <input type="text" name="name" id="name" class="form-control fc" placeholder="New category...">
                            <span class="text-danger" id="name_error"></span>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="action_costcat" id="action_costcat" />
                            <input type="hidden" name="project_id" value="<?= $id ?>" />
                            <input type="hidden" name="cat_id" id="cat_id" />
                            <button class="btn btn-light plus" type="submit" id="submitButtonCostCat"></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End -->

    <!-- Modal Cost Per Category -->
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
                            <label class="form-label">Cost Description *</label>
                            <input type="text" name="desc" id="desc" class="form-control fc">
                            <span class="text-danger" id="desc_error"></span>
                        </div>
                        <div class="col">
                            <label class="form-label">Amount *</label>
                            <input type="text" class="form-control fc" name="amount" id="amount" placeholder="Type a number...">
                            <span class="text-danger" id="amount_error"></span>
                        </div>
                        <div class="col">
                            <label class="form-label">Quantity *</label>
                            <input type="number" class="form-control fc" name="quantity" id="quantity" placeholder="Type a number...">
                            <span class="text-danger" id="quantity_error"></span>
                        </div>
                        <div class="col">
                            <label class="form-label">Unit Quantity *</label>
                            <input type="text" name="unitQuantity" id="unitQuantity" class="form-control fc">
                            <span class="text-danger" id="unitQuantity_error"></span>
                        </div>
                        <div class="col">
                            <label class="form-label">Duration *</label>
                            <input type="number" class="form-control fc" name="duration" id="duration" placeholder="Type a number...">
                            <span class="text-danger" id="duration_error"></span>
                        </div>
                        <div class="col">
                            <label class="form-label">Unit Duration *</label>
                            <input type="text" name="unitDuration" id="unitDuration" class="form-control fc">
                            <span class="text-danger" id="unitDuration_error"></span>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="category_id" id="category_id" />
                            <input type="hidden" name="cost_id" id="cost_id" />
                            <input type="hidden" name="action_cost" id="action_cost" />
                            <button class="btn btn-light plus" type="submit" name="submit" id="submitButtonCost"></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End -->
</div>
</div>

<!-- JQuery -->
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

    //Create New Cost Category
    $('#addCostCat').click(function() {
        $('#costCatForm')[0].reset();
        $('#name_error').text('');
        $('.modal-title').html('<i class="fa fa-list" style="color: white;"></i> Add a Category');
        $('#action_costcat').val('add');
        $('#submitButtonCostCat').html('Add');
        $('#costCatModal').modal('show');
    })

    $('#costCatForm').on('submit', function(event) {
        event.preventDefault();

        $.ajax({
            url: "<?= base_url(); ?>/project/saveCostCat",
            method: "POST",
            data: $(this).serialize(),
            dataType: "JSON",

            beforeSend: function() {
                $('#submitButtonCostCat').html('<i class="fa fa-spinner fa-spin" style="color: black;"></i>');
                $('#submitButtonCostCat').attr('disabled', 'disabled');
            },

            success: function(data) {
                if ($('#action_costcat').val() == 'add') {
                    $('#submitButtonCostCat').html('Add');

                } else {
                    $('#submitButtonCostCat').html('Edit');
                }

                $('#submitButtonCostCat').attr('disabled', false);

                if (data.error == 'yes') {
                    $('#name_error').text(data.name_error);

                    if ($('#action_costcat').val() == 'add') {
                        Toast.fire({
                            icon: 'error',
                            title: 'failed to add the category'
                        })
                    } else {
                        Toast.fire({
                            icon: 'error',
                            title: 'failed to edit the category'
                        })
                    }
                } else {
                    $('#costCatModal').modal('hide');

                    setTimeout(location.reload.bind(location));
                }
            }
        })
    })

    //Edit Cost Category
    $(document).on('click', '.editCat', function() {
        var id = $(this).data('id');

        $.ajax({
            url: "<?= base_url() ?>/project/fetchIdCategory",
            method: "POST",
            data: {
                id: id
            },
            dataType: "JSON",

            success: function(data) {
                $('#name').val(data.category_name);

                $('#name_error').text('');
                $('.modal-title').html('<i class="fa fa-pencil-square-o" style="color: white;"></i> Edit a Category');
                $('#action_costcat').val('edit');
                $('#submitButtonCostCat').html('Edit');
                $('#costCatModal').modal('show');
                $('#cat_id').val(id);
            }
        })
    });

    //Delete Cost Category
    $(document).on('click', '.deleteCat', function() {
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
                    url: "<?= base_url() ?>/project/deleteCostCat",
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

    //Create Cost Per Category
    $(document).on('click', '.addCost', function() {
        var id = $(this).data('id');
        $('#costForm')[0].reset();
        $('#desc_error').text('');
        $('#amount_error').text('');
        $('#quantity_error').text('');
        $('#unitQuantity_error').text('');
        $('#duration_error').text('');
        $('#unitDuration_error').text('');
        $('.modal-title').html('<i class="fa fa-list" style="color: white;"></i> Add the Cost Details');
        $('#action_cost').val('add');
        $('#costModal').modal('show');
        $('#submitButtonCost').html('Add')
        $('#category_id').val(id);
    })

    $('#costForm').on('submit', function(event) {
        event.preventDefault();

        $.ajax({
            url: "<?= base_url(); ?>/project/saveCostData",
            method: "POST",
            data: $(this).serialize(),
            dataType: "JSON",

            beforeSend: function() {
                $('#submitButtonCost').html('<i class="fa fa-spinner fa-spin" style="color: black;"></i>');
                $('#submitButtonCost').attr('disabled', 'disabled');
            },

            success: function(data) {
                if ($('#action_cost').val() == 'add') {
                    $('#submitButtonCost').html('Add');

                } else {
                    $('#submitButtonCost').html('Edit');
                }
                $('#submitButtonCost').attr('disabled', false);

                if (data.error == 'yes') {
                    $('#name_error').text(data.name_error);
                    $('#desc_error').text(data.desc_error);
                    $('#amount_error').text(data.amount_error);
                    $('#quantity_error').text(data.quantity_error);
                    $('#unitQuantity_error').text(data.unitQuantity_error);
                    $('#duration_error').text(data.duration_error);
                    $('#unitDuration_error').text(data.unitDuration_error);

                    if ($('#action_cost').val() == 'add') {
                        Toast.fire({
                            icon: 'error',
                            title: 'failed to add the details'
                        })
                    } else {
                        Toast.fire({
                            icon: 'error',
                            title: 'failed to update the details'
                        })
                    }
                } else {
                    $('#costModal').modal('hide');

                    setTimeout(location.reload.bind(location));
                }
            }
        })
    })

    //Edit Cost

    $(document).on('click', '.editCost', function() {

        var id = $(this).data('id');

        $.ajax({
            url: "<?= base_url() ?>/project/fetchIdCost",
            method: "POST",
            data: {
                id: id
            },
            dataType: "JSON",

            success: function(data) {
                $('#desc').val(data.pcost_desc);
                $('#amount').val(data.pcost_amount);
                $('#quantity').val(data.pcost_quantity);
                $('#unitQuantity').val(data.pcost_unit);
                $('#duration').val(data.pcost_duration);
                $('#unitDuration').val(data.pcost_unit_duration);

                $('#desc_error').text('');
                $('#amount_error').text('');
                $('#quantity_error').text('');
                $('#unitQuantity_error').text('');
                $('#duration_error').text('');
                $('#unitDuration_error').text('');
                $('.modal-title').html('<i class="fa fa-pencil-square-o" style="color: white;"></i> Edit a Cost');
                $('#action_cost').val('edit');
                $('#submitButtonCost').html('Edit');
                $('#costModal').modal('show');
                $('#cost_id').val(id);
            }
        })
    });

    //Delete Cost
    $(document).on('click', '.deleteCost', function() {
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
                    url: "<?= base_url() ?>/project/deleteCost",
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

    <?php if (session()->getFlashdata('msg') == 'create') { ?>
        Toast.fire({
            icon: 'success',
            title: 'New category added'
        })
    <?php } else if (session()->getFlashdata('msg') == 'edit') { ?>
        Toast.fire({
            icon: 'success',
            title: 'Category updated'
        })
    <?php } else if (session()->getFlashdata('msg') == 'delete') { ?>
        Swal.fire(
            'Deleted!',
            'Category has been deleted.',
            'success'
        )
    <?php } else if (session()->getFlashdata('msg') == 'create_cost') { ?>
        Toast.fire({
            icon: 'success',
            title: 'New details added'
        })
    <?php } else if (session()->getFlashdata('msg') == 'edit_cost') { ?>
        Toast.fire({
            icon: 'success',
            title: 'Details updated'
        })
    <?php } else if (session()->getFlashdata('msg') == 'delete_cost') { ?>
        Swal.fire(
            'Deleted!',
            'Cost details has been deleted.',
            'success'
        )
    <?php } ?>
</script>

<?= $this->endSection(); ?>