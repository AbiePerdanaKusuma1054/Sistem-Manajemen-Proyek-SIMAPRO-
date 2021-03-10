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
                    <li class=""><a href="<?= base_url() ?>/project/team/<?= $id ?>">Team</a></li>
                    <li class="actived"><a href="<?= base_url() ?>/project/comment/<?= $id ?>">Comment</a></li>
                </ul>
            </div>
        </div>
        <div class="add-back">
            <i class="fa fa-comments-o">
                <span class="add-back-text">
                    Comments
                </span>
            </i>
        </div>

        <div class="box">
            <div class="left-box">
                <div style="padding-bottom: 2rem;">
                    <!-- comment -->
                    <?php if (empty($comment)) : ?>
                        <p>Be the first to give a comment!</p>
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
    <div class="space">
        <p class="dot">.</p>
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
                        <span class="text-danger" id="comment_edit_error"></span>
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
        timer: 1700,
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
                    $('#comment_error').text(data.comment_error);

                    Toast.fire({
                        icon: 'error',
                        title: 'failed to upload your comment'
                    })

                } else {
                    setTimeout(location.reload.bind(location), 500);
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
                        title: 'failed to edit your comment'
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
    <?php } ?>

    <?php if (session()->getFlashdata('msg') == 'success_create') { ?>
        Toast.fire({
            icon: 'success',
            title: 'Comment Uploaded'
        })
    <?php } ?>
    /*

        Name    : Responsive HTML5 Chat

        Responsive HTML5 Chat helps you to create useful chatbox on your website easly. 
        You can change skin and sizes. You can read the installation and support documentation 
        before you begin. If you do not find the answer, do not hesitate to send a message to me.

        Owner   : Vatanay Ozbeyli
        Web     : www.vatanay.com
        Support : hi@vatanay.com

        */

    // function responsiveChat(element) {
    //     $(element).html('<form class="chat"><span></span><div class="messages"></div><div class="back-comment" style="display: inline;"><input type="text" class="form-control comment" placeholder="Comment..."><input type="submit" class="send" value=">"></div></form>');

    //     function showLatestMessage() {
    //         $(element).find('.messages').scrollTop($(element).find('.messages').height());
    //     }
    //     showLatestMessage();


    //     $(element + ' input[type="text"]').keypress(function(event) {
    //         if (event.which == 13) {
    //             event.preventDefault();
    //             $(element + ' input[type="submit"]').click();
    //         }
    //     });
    //     $(element + ' input[type="submit"]').click(function(event) {
    //         event.preventDefault();
    //         var message = $(element + ' input[type="text"]').val();
    //         if ($(element + ' input[type="text"]').val()) {
    //             var d = new Date();
    //             var clock = d.getHours() + ":" + d.getMinutes() + ":" + d.getSeconds();
    //             var month = d.getMonth() + 1;
    //             var day = d.getDate();
    //             var currentDate =
    //                 (("" + day).length < 2 ? "0" : "") +
    //                 day +
    //                 "." +
    //                 (("" + month).length < 2 ? "0" : "") +
    //                 month +
    //                 "." +
    //                 d.getFullYear() +
    //                 "&nbsp;&nbsp;" +
    //                 clock;
    //             $(element + ' div.messages').append(
    //                 '<div class="message"><div class="myMessage"><p>' +
    //                 message +
    //                 "</p><date>" +
    //                 currentDate +
    //                 "</date></div></div>"
    //             );
    //             setTimeout(function() {
    //                 $(element + ' > span').addClass("spinner");
    //             }, 100);
    //             setTimeout(function() {
    //                 $(element + ' > span').removeClass("spinner");
    //             }, 2000);
    //         }
    //         $(element + ' input[type="text"]').val("");
    //         showLatestMessage();
    //     });
    // }

    // function responsiveChatPush(element, sender, origin, date, message) {
    //     var originClass;
    //     if (origin == 'me') {
    //         originClass = 'myMessage';
    //     } else {
    //         originClass = 'fromThem';
    //     }
    //     $(element + ' .messages').append('<div class="message"><div class="' + originClass + '"><p>' + message + '</p><date><b>' + sender + '</b> ' + date + '</date></div></div>');
    // }

    // /* Activating chatbox on element */
    // responsiveChat('.responsive-html5-chat');

    // /* Let's push some dummy data */
    // responsiveChatPush('.chat', 'Alexander', 'you', '08.03.2021 14:31:22', 'Ey, this chat section will be doomed right?');
    // responsiveChatPush('.chat', 'Firaz', 'me', '08.03.2021 14:33:32', 'Yeah, we\'ll replace it with a comment plugin or something like that.');

    // /* DEMO */
    // if (parent == top) {
    //     $("a.article").show();
    // }
</script>

<?= $this->endSection(); ?>