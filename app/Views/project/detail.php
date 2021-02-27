<?= $this->extend('temp/template'); ?>

<?= $this->section('content'); ?>
<div class="canvas-2">
    <div class="lay" style="text-align: left ;">
        <div class="menu-detail">
            <div class="table-responsive">
                <ul>
                    <li class="actived"><a href="<?= base_url() ?>/project/detail/<?= $id ?>">Project</a></li>
                    <li class=""><a href="<?= base_url() ?>/project/rab/<?= $id ?>">RAB</a></li>
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
                        <i class="fa fa-pencil-square-o act act-l fa-lg" aria-hidden="true"></i>
                    </a>
                    <!-- button delete -->
                    <i class="fa fa-trash act act-r fa-lg" aria-hidden="true" id="deleteProject" data-id="<?= $detail['id'] ?>"></i>

                    <div class="back-detail">
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


            <!-- Modal Add Team -->
            <div class="modal fade" id="addteamModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="modal-title" id="exampleModalLabel">
                                <i class="fa fa-user-plus" style="color: white;">
                                    <span class="add-team-text">
                                        Add Members
                                    </span>
                                </i>
                            </div>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="col">
                                <label for="validationCustom01" class="form-label">Name</label>
                                <input type="text" class="form-control fc" id="validationCustom01" value="" required>
                                <div class="invalid-feedback">
                                    Please input a name.
                                </div>
                            </div>
                            <div class="col">
                                <label for="validationCustom02" class="form-label">Position</label>
                                <input type="text" class="form-control fc" id="validationCustom02" value="" required>
                                <div class="invalid-feedback">
                                    Please choose a position.
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light plus">Add</button>
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
                Swal.fire(
                    'Deleted!',
                    'Project has been deleted.',
                    'success',

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
                )
            }
        })
    });


    //     Name    : Responsive HTML5 Chat

    //     Responsive HTML5 Chat helps you to create useful chatbox on your website easly. 
    //     You can change skin and sizes. You can read the installation and support documentation 
    //     before you begin. If you do not find the answer, do not hesitate to send a message to me.

    //     Owner   : Vatanay Ozbeyli
    //     Web     : www.vatanay.com
    //     Support : hi@vatanay.com


    // function responsiveChat(element) {
    //     $(element).html('<form class="chat"><span></span><div class="messages"></div><div class="back-comment"><input type="text" class="form-control comment" placeholder="Comment..."><input type="submit" class="send" value=">"></form></div>');

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

    // // Activating chatbox on element
    // responsiveChat('.responsive-html5-chat');

    // // Let's push some dummy data
    // responsiveChatPush('.chat', 'Alexander', 'you', '08.03.2021 14:31:22', 'Ey, this chat section will be doomed right?');
    // responsiveChatPush('.chat', 'Firaz', 'me', '08.03.2021 14:33:32', 'Yeah, we\'ll replace it with a comment plugin or something like that.');

    // // DEMO
    // if (parent == top) {
    //     $("a.article").show();
    // }
</script>

<?= $this->endSection(); ?>