<?= $this->extend('temp/template'); ?>

<?= $this->section('content'); ?>
<div class="canvas-2">
    <div class="lay" style="text-align: left ;">
        <div class="menu-detail text-center">
            <div class="table-responsive">
                <ul>
                    <li class="actived"><a href="<?= base_url() ?>/project/detail/<?= $id ?>">Details</a></li>
                    <li class=""><a href="<?= base_url() ?>/project/cost/<?= $id ?>">Cost</a></li>
                    <li class=""><a href="<?= base_url() ?>/project/transaction/<?= $id ?>">Transaction</a></li>
                    <li class=""><a href="<?= base_url() ?>/project/team/<?= $id ?>">Team</a></li>
                    <li class=""><a href="<?= base_url() ?>/project/comment/<?= $id ?>">Comment</a></li>
                </ul>
            </div>
        </div>
        <div class="add-back">
            <i class="fa fa-desktop">
                <span class="add-back-text">
                    Project Details
                </span>
            </i>
        </div>
        <div class="date-project grids">
            <div class="back-date">
                <div class="start">
                    <p class="date-text">Project start in: <span class="date">
                            <?= date('d/m/Y', strtotime($detail['project_start'])) ?>
                        </span>
                    </p>
                </div>
            </div>
            <div class="back-date-dead">
                <div class="end">
                    <p class="date-text">Project deadline: <span class="date">
                            <?= date('d/m/Y', strtotime($detail['project_finish'])) ?>
                        </span>
                    </p>
                </div>
            </div>
        </div>
        <div class="box">
            <div class="left-box">

                <div class="detail-box" style="padding-top: 2.5rem;">


                    <!-- button edit -->
                    <a href="<?= base_url() ?>/project/edit/<?= $detail['id'] ?>">
                        <i class="fa fa-pencil-square-o act act-l fa-lg det-action"></i>
                    </a>
                    <!-- button delete -->
                    <i class="fa fa-trash act act-r fa-lg det-action" id="deleteProject" data-id="<?= $detail['id'] ?>"></i>

                    <div class="back-detail anim">
                        <div class="detail-row">
                            <p><i class="fa fa-cubes"><span class="l">Project Name</span></i></p>
                            <div class="line-horizontal"></div>
                            <p class="r"><?= $detail['project_name'] ?></p>
                            <div class="enter"></div>
                        </div>
                        <div class="detail-row">
                            <p><i class="fa fa-id-card"><span class="l">Project Manager</span></i></p>
                            <div class="line-horizontal"></div>
                            <p class="r"><?= $detail['project_manager'] ?></p>
                            <div class="enter"></div>
                        </div>
                        <div class="detail-row">
                            <p><i class="fa fa-handshake-o"><span class="l">Client</span></i></p>
                            <div class="line-horizontal"></div>
                            <p class="r"><?= $detail['client_name'] ?></p>
                            <div class="enter"></div>
                        </div>
                        <div class="detail-row">
                            <p><i class="fa fa-money"><span class="l">Contract Amount</span></i></p>
                            <div class="line-horizontal"></div>
                            <p class="r">Rp<?= $detail['contract_amount'] ?></p>
                            <div class="enter"></div>
                        </div>
                        <div class="detail-row">
                            <p><i class="fa fa-flag"><span class="l">Project Status</span></i></p>
                            <div class="line-horizontal"></div>
                            <p class="r"><?= ucwords($detail['project_status']) ?></p>
                            <div class="enter"></div>
                        </div>
                        <div class="detail-row">
                            <p><i class="fa fa-hashtag"><span class="l">Project Description</span></i></p>
                            <div class="line-horizontal"></div>
                            <p class="r"><?= $detail['project_desc'] == '' ? '-' : $detail['project_desc']; ?></p>
                            <div class="enter"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script>
    $('#deleteProject').click(function() {
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
                    url: "<?= base_url() ?>/project/delete",
                    method: "POST",
                    data: {
                        id: id
                    },

                    success: function(data) {
                        location.href = "<?= base_url() ?>/project"
                    }
                })
            }
        })
    });

    <?php if (session()->getFlashdata('msg') == 'success') { ?>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top',
            showConfirmButton: false,
            timer: 1700,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'success',
            title: 'Details of project updated'
        })
    <?php } ?>
</script>

<?= $this->endSection(); ?>