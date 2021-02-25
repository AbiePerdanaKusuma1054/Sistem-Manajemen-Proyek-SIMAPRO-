<?= $this->extend('temp/template'); ?>

<?= $this->section('content'); ?>
<div class="canvas-2">
    <div class="lay" style="text-align: left ;">
        <div class="menu-detail">
            <div class="table-responsive">
                <ul>
                    <li class=""><a href="<?= base_url() ?>/project/detail/<?= $id ?>">Project</a></li>
                    <li class="actived"><a href="<?= base_url() ?>/project/rab/<?= $id ?>">RAB</a></li>
                    <li class=""><a href="<?= base_url() ?>/project/team/<?= $id ?>">Team</a></li>
                    <li class=""><a href="<?= base_url() ?>/project/comment/<?= $id ?>">Comment</a></li>
                </ul>
            </div>
        </div>
        <div class="add-back">
            <i class="fa fa-calculator">
                <span class="add-back-text">
                    RAB
                </span>
            </i>
        </div>

        <div class="box">
            <div class="left-box">
                <div class="detail-box back-rab inclusion">
                    <!-- Pemasukkan -->
                    <div class="row sub" style="margin-bottom: -15px;">
                        <div class="col" style="margin-bottom: 0;">
                            <p class="category-rab">Inclusion</p>
                        </div>
                        <div class="col" style="text-align: right;">
                            <a>
                                <i class="fa fa-plus-circle add-rab" id="addInclu"></i>
                            </a>
                        </div>
                    </div>
                    <div class="back-detail" style="margin: 0 auto 16px auto;">
                        <!-- Looping disini -->
                        <div class="row sub-sub">
                            <div class="col">
                                <a class="btn btn-outline-light" style="border: none;" data-bs-toggle="collapse" href="#inclusion-1" role="button" aria-expanded="false" aria-controls="inclusion-1">
                                    <i class="fa fa-list-ol"></i>
                                </a>
                                <span class="date-rab">11/01/2021</span>
                            </div>
                            <div class="col" style="text-align: right;">
                                <p class="amount-day">Rp. 2.000.000</p>
                            </div>
                            <div class="row" style="padding:0;margin: 0;">
                                <!-- inclusion-1 "angka=1nya harus di looping juga biar pas dipencet tombol detailnya enggak muncul expenses lainnya(Intinya idnya harus beda)" -->
                                <div class="collapse multi-collapse" id="inclusion-1">
                                    <div class="table-responsive" style="margin-bottom: 5px;">
                                        <table id="example" class="table table-striped table-dark nowrap detail-rab" style="width:100%;">
                                            <thead>
                                                <tr hidden>
                                                    <th>No.</th>
                                                    <!-- <th>Quantity</th> -->
                                                    <th>What</th>
                                                    <!-- <th>Unit</th> -->
                                                    <th>Amount</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr style="vertical-align: text-bottom;">
                                                    <td class="no">1</td>
                                                    <!-- <td>1</td> -->
                                                    <td>DP 1</td>
                                                    <!-- <td>2 Unit</td> -->
                                                    <td>Rp. 500.000</td>
                                                    <td class="act-rab">
                                                        <i class="fa fa-pencil act icon-edit-member" id="editInlcu"></i>
                                                        <i class="fa fa-trash-o icon-del-team" id="deleteInclu"></i>
                                                    </td>
                                                </tr>
                                                <tr style="vertical-align: text-bottom;">
                                                    <td class="no">2</td>
                                                    <!-- <td>2</td> -->
                                                    <td>DP 2</td>
                                                    <!-- <td>1 Unit</td> -->
                                                    <td>Rp. 1.500.000</td>
                                                    <td class="act-rab">
                                                        <i class="fa fa-pencil act icon-edit-member" id="editInlcu"></i>
                                                        <i class="fa fa-trash-o icon-del-team" id="deleteInclu"></i>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--  -->
                        <div class="row sub-sub">
                            <div class="col">
                                <a class="btn btn-outline-light" style="border: none;" data-bs-toggle="collapse" href="#inclusion-2" role="button" aria-expanded="false" aria-controls="inclusion-2">
                                    <i class="fa fa-list-ol"></i>
                                </a>
                                <span class="date-rab">01/02/2021</span>
                            </div>
                            <div class="col" style="text-align: right;">
                                <p class="amount-day">Rp. 1750.000</p>
                            </div>
                            <div class="row" style="padding:0;margin: 0;">
                                <div class="collapse multi-collapse" id="inclusion-2">
                                    <div class="table-responsive" style="margin-bottom: 5px;">
                                        <table id="example" class="table table-striped table-dark nowrap detail-rab" style="width:100%;">
                                            <thead>
                                                <tr hidden>
                                                    <th>No.</th>
                                                    <!-- <th>Quantity</th> -->
                                                    <th>What</th>
                                                    <!-- <th>Unit</th> -->
                                                    <th>Amount</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr style="vertical-align: text-bottom;">
                                                    <td class="no">1</td>
                                                    <!-- <td>1</td> -->
                                                    <td>DP 3</td>
                                                    <!-- <td>1 Unit</td> -->
                                                    <td>Rp. 250.000</td>
                                                    <td class="act-rab">
                                                        <i class="fa fa-pencil act icon-edit-member" id="editInlcu"></i>
                                                        <i class="fa fa-trash-o icon-del-team" id="deleteInclu"></i>
                                                    </td>
                                                </tr>
                                                <tr style="vertical-align: text-bottom;">
                                                    <td class="no">2</td>
                                                    <!-- <td>2</td> -->
                                                    <td>DP 4</td>
                                                    <!-- <td>1 Unit</td> -->
                                                    <td>Rp. 1.500.000</td>
                                                    <td class="act-rab">
                                                        <i class="fa fa-pencil act icon-edit-member" id="editInlcu"></i>
                                                        <i class="fa fa-trash-o icon-del-team" id="deleteInclu"></i>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row total" style="text-align: right;">
                            <div class="col" style="height: fit-content;">
                                <p style="font-weight: 600;">Total</p>
                            </div>
                            <div class="col" style="height: fit-content;">
                                <p>Rp. 3.750.000</p>
                            </div>
                        </div>
                    </div>
                    <!-- Pengeluaran -->
                    <div class="row sub" style="margin-bottom: -15px;">
                        <div class="col" style="margin-bottom: 0;">
                            <p class="category-rab">Expenses</p>
                        </div>
                        <div class="col" style="text-align: right;">
                            <a>
                                <i class="fa fa-plus-circle add-rab" id="addExpen"></i>
                            </a>
                        </div>
                    </div>
                    <div class="back-detail" style="margin: 0 auto;">
                        <!-- Looping disini -->
                        <div class="row sub-sub">
                            <div class="col">
                                <a class="btn btn-outline-light" style="border: none;" data-bs-toggle="collapse" href="#expanses-1" role="button" aria-expanded="false" aria-controls="expanses-1">
                                    <i class="fa fa-list-ol"></i>
                                </a>
                                <span class="date-rab">11/01/2021</span>
                            </div>
                            <div class="col" style="text-align: right;">
                                <p class="amount-day">Rp. 2.000.000</p>
                            </div>
                            <div class="row" style="padding:0;margin: 0;">
                                <!-- expanses-1 "angka=1nya harus di looping juga biar pas dipencet tombol detailnya enggak muncul expenses lainnya(Intinya idnya harus beda)" -->
                                <div class="collapse multi-collapse" id="expanses-1">
                                    <div class="table-responsive" style="margin-bottom: 5px;">
                                        <table id="example" class="table table-striped table-dark nowrap detail-rab" style="width:100%;">
                                            <thead>
                                                <tr hidden>
                                                    <th>No.</th>
                                                    <!-- <th>Quantity</th> -->
                                                    <th>What</th>
                                                    <th>Unit</th>
                                                    <th>Amount</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr style="vertical-align: text-bottom;">
                                                    <td class="no">1</td>
                                                    <!-- <td>1</td> -->
                                                    <td>Server</td>
                                                    <td>2 Unit</td>
                                                    <td>Rp. 500.000</td>
                                                    <td class="act-rab">
                                                        <i class="fa fa-pencil act icon-edit-member" id="editExpen"></i>
                                                        <i class="fa fa-trash-o icon-del-team" id="deleteExpen"></i>
                                                    </td>
                                                </tr>
                                                <tr style="vertical-align: text-bottom;">
                                                    <td class="no">2</td>
                                                    <!-- <td>2</td> -->
                                                    <td>Salary</td>
                                                    <td>1 Unit</td>
                                                    <td>Rp. 1.500.000</td>
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
                        <!--  -->
                        <div class="row sub-sub">
                            <div class="col">
                                <a class="btn btn-outline-light" style="border: none;" data-bs-toggle="collapse" href="#expenses-2" role="button" aria-expanded="false" aria-controls="expenses-2">
                                    <i class="fa fa-list-ol"></i>
                                </a>
                                <span class="date-rab">01/02/2021</span>
                            </div>
                            <div class="col" style="text-align: right;">
                                <p class="amount-day">Rp. 1750.000</p>
                            </div>
                            <div class="row" style="padding:0;margin: 0;">
                                <div class="collapse multi-collapse" id="expenses-2">
                                    <div class="table-responsive" style="margin-bottom: 5px;">
                                        <table id="example" class="table table-striped table-dark nowrap detail-rab" style="width:100%;">
                                            <thead>
                                                <tr hidden>
                                                    <th>No.</th>
                                                    <!-- <th>Quantity</th> -->
                                                    <th>What</th>
                                                    <th>Unit</th>
                                                    <th>Amount</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="tab-rab">
                                                <tr style="vertical-align: text-bottom;">
                                                    <td class="no">1</td>
                                                    <!-- <td>1</td> -->
                                                    <td>Server</td>
                                                    <td>1 Unit</td>
                                                    <td>Rp. 250.000</td>
                                                    <td class="act-rab">
                                                        <i class="fa fa-pencil act icon-edit-member" id="editExpen"></i>
                                                        <i class="fa fa-trash-o icon-del-team" id="deleteExpen"></i>
                                                    </td>
                                                </tr>
                                                <tr style="vertical-align: text-bottom;">
                                                    <td class="no">2</td>
                                                    <!-- <td>2</td> -->
                                                    <td>Salary</td>
                                                    <td>1 Unit</td>
                                                    <td>Rp. 1.500.000</td>
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
                        <div class="row total" style="text-align: right;">
                            <div class="col" style="height: fit-content;">
                                <p style="font-weight: 600;">Total</p>
                            </div>
                            <div class="col" style="height: fit-content;">
                                <p>Rp. 3.750.000</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


            <!-- Modal Inlcus -->
            <div class="modal fade" id="incluModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <form id="incluForm" method="POST">
                                <div class="col">
                                    <label class="form-label">Name *</label>
                                    <input type="text" name="name" id="name" class="form-control fc">
                                    <span class="text-danger" id="name_error"></span>
                                </div>
                                <div class="col">
                                    <label class="form-label">Amount *</label>
                                    <input type="number" class="form-control fc" name="" value="" required>
                                    <span class="text-danger" id="amount_error"></span>
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
            <!-- Modal Expen -->
            <div class="modal fade" id="expenModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                    <label class="form-label">Name *</label>
                                    <input type="text" name="name" id="name" class="form-control fc">
                                    <span class="text-danger" id="name_error"></span>
                                </div>
                                <div class="col">
                                    <label class="form-label">Unit *</label>
                                    <input type="number" class="form-control fc" name="" value="" required>
                                    <span class="text-danger" id="unit_error"></span>
                                </div>
                                <div class="col">
                                    <label class="form-label">Amount *</label>
                                    <input type="number" class="form-control fc" name="" value="" required>
                                    <span class="text-danger" id="amount_error"></span>
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
<!-- <script>
    $(document).ready(function() {
        $('#example').DataTable({
            "scrollX": true,
            "paging": false,
            "filter": false,
            "ordering": false,
            "info": false
        });
    });
    $(document).ready(function() {
        var table = $('#example').DataTable();

        new $.fn.dataTable.Responsive(table);
    });
</script> -->
<script>
    //Create Inclu
    $('#addInclu').click(function() {
        $('#incluForm')[0].reset();
        $('#name_error').text('');
        $('#position_error').text('');
        $('.modal-title').html('<i class="fa fa-user-plus" style="color: white;"></i> Add a Inclusion');
        $('#action').val('create');
        $('#submitButton').val('Add');
        $('#incluModal').modal('show');
    })

    $('#incluForm').on('submit', function(event) {
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
                    $('#incluModal').modal('hide');

                    setTimeout(location.reload.bind(location), 2200);

                    Toast.fire({
                        icon: 'success',
                        title: 'New member added'
                    })
                }
            }
        })
    })

    //Edit Inclu

    $(document).on('click', '#editInclu', function() {

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
                $('.modal-title').html('<i class="fa fa-pencil-square-o" style="color: white;"></i> Edit a Inclusion');
                $('#action').val('edit');
                $('#submitButton').val('Edit');
                $('#inlcuModal').modal('show');
                $('#member_id').val(id);
            }
        })
    });

    //Delete Inclu
    $(document).on('click', '#deleteInclu', function() {
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
<script>
    //Create Expen
    $('#addExpen').click(function() {
        $('#expenForm')[0].reset();
        $('#name_error').text('');
        $('#position_error').text('');
        $('.modal-title').html('<i class="fa fa-user-plus" style="color: white;"></i> Add a Inclusion');
        $('#action').val('create');
        $('#submitButton').val('Add');
        $('#expenModal').modal('show');
    })

    $('#expenForm').on('submit', function(event) {
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
                    $('#expenModal').modal('hide');

                    setTimeout(location.reload.bind(location), 2200);

                    Toast.fire({
                        icon: 'success',
                        title: 'New member added'
                    })
                }
            }
        })
    })

    //Edit Expen

    $(document).on('click', '#editExpen', function() {

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
                $('.modal-title').html('<i class="fa fa-pencil-square-o" style="color: white;"></i> Edit a Inclusion');
                $('#action').val('edit');
                $('#submitButton').val('Edit');
                $('#expenModal').modal('show');
                $('#member_id').val(id);
            }
        })
    });

    //Delete Inclu
    $(document).on('click', '#deleteExpen', function() {
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