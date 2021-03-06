<?= $this->extend('temp/template'); ?>

<?= $this->section('content'); ?>
<div class="canvas-2">
    <div class="lay" style="text-align: left ;">
        <div class="menu-detail text-center">
            <div class="table-responsive">
                <ul>
                    <li class=""><a href="<?= base_url() ?>/project/detail/<?= $id ?>">Details</a></li>
                    <li class=""><a href="<?= base_url() ?>/project/cost/<?= $id ?>">Cost</a></li>
                    <li class=""><a href="<?= base_url() ?>/project/transaction/<?= $id ?>">Transaction</a></li>
                    <li class=""><a href="<?= base_url() ?>/project/team/<?= $id ?>">Team</a></li>
                    <li class="actived"><a href="<?= base_url() ?>/project/comment/<?= $id ?>">Comment</a></li>
                </ul>
            </div>
        </div>
        <div class="add-back" style="margin-left: 10PX;">
            <i class="fa fa-comments-o">
                <span class="add-back-text">
                    Comments
                </span>
            </i>
        </div>

        <div class="box">
            <div class="left-box">
                <div>
                    <!-- comment -->
                    <?php if (empty($comment)) : ?>
                        <p style="margin-left: 10px;">Be the first to give a comment!</p>
                    <?php endif; ?>
                    <?php foreach ($comment as $c) : ?>
                        <div class="borders">
                            <div class="chat">
                                <span></span>
                                <div class="massages">
                                    <div class="message">
                                        <div class="<?= $c['username'] == session()->get('username')  ? 'fromThem myMessage' : 'fromThem'; ?>">
                                            <p class="text-comment"><?= $c['comment_text'] ?></p>
                                            <p class="date">
                                                <b><?= $c['username'] ?></b>
                                            </p>
                                            <p class="txt-date"><?= substr(date('d/m/Y', strtotime($c['created_at'])), 0, 10) ?>
                                                <span class="txt-time"><?= substr(date('d/m/Y H:i:s', strtotime($c['created_at'])), 11) ?></span>
                                                <?php if ($c['updated_at'] != $c['created_at']) : ?>
                                                    <span class="txt-date">(Updated <?= substr(date('d/m/Y', strtotime($c['updated_at'])), 0, 10) ?>
                                                        <span class="txt-time"><?= substr(date('d/m/Y H:i:s', strtotime($c['updated_at'])), 11) ?>)</span>
                                                    <?php endif ?>
                                                    <?php if ($c['username'] == session()->get('username')) : ?>
                                                        <i class="fa fa-pencil act icon-edit-member editComment" data-id="<?= $c['id'] ?>"></i>
                                                        <i class="fa fa-trash-o icon-del-team deleteComment" data-id="<?= $c['id'] ?>"></i>
                                                    <?php endif ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <form id="addComment" method="POST">
                        <div class="input-group p-2">
                            <input type="hidden" name="project_id" id="project_id" value="<?= $id ?>" />
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="comment" placeholder="Comment ..." style="background-color: #222121;border: none;color: white;font-size: 9pt;"></textarea>
                            <div class="input-group-append" style="height: 40px;width: 40px;">
                                <button class="btn btn-secondary sends" type="submit" id="submitButton"><i class="fa fa-paper-plane fa-lg" style="color: white;"></i></button>
                            </div>
                        </div>
                        <span class="text-danger" id="comment_error"></span>
                    </form>
                    <!-- end -->
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<!-- Modal Edit Comment -->
<div class="modal fade" name="editCommentModal" id="editCommentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <form id="editComment" style="text-align: left;" method="POST">
                    <div class="col">
                        <textarea class="form-control fc" id="comment_edit" name="comment_edit" rows="3" placeholder="Comment..."></textarea>
                    </div>

                    <div class="modal-footer">
                        <input type="hidden" name="comment_id" id="comment_id" />
                        <button class="btn btn-light plus" type="submit" id="submitEditButton">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End -->

<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })

    $('#addComment').on('submit', function(event) {
        event.preventDefault();

        $.ajax({
            url: "<?= base_url(); ?>/project/saveComment",
            method: "POST",
            data: $(this).serialize(),
            dataType: "JSON",

            beforeSend: function() {
                $('#submitButton').html('<i class="fa fa-spinner fa-spin" style="color: white;"></i>');
                $('#submitButton').attr('disabled', 'disabled');
            },

            success: function(data) {
                $('#submitButton').html('<i class="fa fa-paper-plane fa-lg" style="color: white;"></i>');
                $('#submitButton').attr('disabled', false);

                if (data.error == 'yes') {
                    Toast.fire({
                        icon: 'error',
                        title: 'Please type something'
                    })
                } else {
                    setTimeout(location.reload.bind(location));
                }
            }
        })
    })

    //Edit Comment

    $(document).on('click', '.editComment', function() {
        var id = $(this).data('id');

        $.ajax({
            url: "<?= base_url() ?>/project/fetchComment",
            method: "POST",
            data: {
                id: id
            },
            dataType: "JSON",

            success: function(data) {
                $('#comment_edit').val(data.comment_text);
                $('#comment_edit_error').text('');
                $('.modal-title').html('<i class="fa fa-user-plus" style="color: white;"></i> Edit Comment');
                $('#editCommentModal').modal('show');
                $('#comment_id').val(id);
            }
        })
    });

    $('#editComment').on('submit', function(event) {
        event.preventDefault();

        $.ajax({
            url: "<?= base_url(); ?>/project/editComment",
            method: "POST",
            data: $(this).serialize(),
            dataType: "JSON",

            beforeSend: function() {
                $('#submitEditButton').html('<i class="fa fa-spinner fa-spin" style="color: black;"></i>');
                $('#submitEditButton').attr('disabled', 'disabled');
            },

            success: function(data) {
                $('#submitEditButton').html('Edit');
                $('#submitEditButton').attr('disabled', false);

                if (data.error == 'yes') {
                    $('#comment_edit_error').text(data.comment_error);

                    Toast.fire({
                        icon: 'error',
                        title: 'Please type something'
                    })

                } else {
                    $('#editCommentModal').modal('hide');
                    setTimeout(location.reload.bind(location), 700);
                }
            }
        })
    })

    //Delete Comment
    $(document).on('click', '.deleteComment', function() {
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
                    url: "<?= base_url() ?>/project/deleteComment",
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

    <?php if (session()->getFlashdata('msg') == 'success_edit') { ?>
        Toast.fire({
            icon: 'success',
            title: 'Comment Updated'
        })
    <?php } else if (session()->getFlashdata('msg') == 'success_create') { ?>
        Toast.fire({
            icon: 'success',
            title: 'Comment Uploaded'
        })
    <?php } else if (session()->getFlashdata('msg') == 'success_delete') { ?>
        Swal.fire(
            'Deleted!',
            'Your comment has been deleted.',
            'success'
        )
    <?php } ?>
</script>

<?= $this->endSection(); ?>