<?= $this->extend('temp/template'); ?>

<?= $this->section('content'); ?>
<div class="canvas-2">
    <div class="lay" style="text-align: left ;">
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
                    <?php foreach ($detail as $d) : ?>
                        <p class="date-text">Project start in: <span class="date">
                                <?= date('d/m/Y', strtotime($d['project_start'])) ?>
                            </span>
                        </p>
                </div>
            </div>
            <div class="back-date-dead">
                <div class="end">
                    <p class="date-text">Project deadline: <span class="date">
                            <?= date('d/m/Y', strtotime($d['project_finish'])) ?>
                        </span>
                    </p>
                </div>
            </div>
        </div>
        <div class="grid-box">
            <div class="left-box">

                <div class="detail-box">

                    <!-- button edit -->
                    <a href="<?= base_url() ?>/project/edit/<?= $d['id'] ?>">
                        <i class="fa fa-pencil-square-o act act-l fa-lg" aria-hidden="true"></i>
                    </a>
                    <!-- button delete -->

                    <i class="fa fa-trash act act-r fa-lg" aria-hidden="true" id="deleteProject" data-id="<?= $d['id'] ?>"></i>

                    <div class="grid">
                        <p>Project Name</p>
                        <span><?= $d['project_name'] ?></span>
                    </div>
                    <div class="grid">
                        <p>Project Manager</p>
                        <span><?= $d['project_manager'] ?></span>
                    </div>
                    <div class="grid">
                        <p>Client</p>
                        <span><?= $d['client_name'] ?></span>
                    </div>
                    <!-- <div class="grid">
                            <p>Contract Amount</p>
                            <span>Rp. 10.000.000</span>
                        </div> -->
                    <div class="grid">
                        <p>Project Description</p>
                        <span><?= $d['project_desc'] == '' ? '-' : $d['project_desc']; ?></span>
                    </div>
                    <div class="grid">
                        <p>Project Status</p>
                        <span><?= ucfirst($d['project_status']) ?></span>
                    </div>



                    <div class="add-team">
                        <i class="fa fa-users">
                            <span class="add-team-text">
                                Project Team
                            </span>
                        </i>

                        <!-- Button trigger modal -->

                        <a>
                            <i class="fa fa-plus-circle fa-lg btn-addteam" data-toggle="modal" data-target="#addteamModal"></i>
                        </a>
                    </div>


                    <div id="back-team">
                        <div class="inner grid-team">
                            <i class="fa fa-user name">
                                <span class="name-text">
                                    <?= $d['project_manager'] ?>
                                </span>
                            <?php endforeach; ?>
                            </i>
                            <span class="post-text">Project Manager
                                <a href="" style="margin-left: 10px;">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </span>
                        </div>
                        <div class="inner grid-team">
                            <i class="fa fa-user name">
                                <span class="name-text">
                                    Firaztori Yusuf Nurwanto
                                </span>
                            </i>
                            <span class="post-text">Programmer
                                <a href="" style="margin-left: 10px;">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </span>
                        </div>
                        <div class="inner grid-team">
                            <i class="fa fa-user name">
                                <span class="name-text">
                                    Abie Perdana Kusuma
                                </span>
                            </i>
                            <span class="post-text">Programmer
                                <a href="" style="margin-left: 10px;">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="right">
                <!-- comment -->
                <div class="borders">
                    <div class="responsive-html5-chat"></div>
                </div>
                <!-- end -->
            </div>

            <!-- Modal Add Team -->
            <div class="modal fade" id="addteamModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="modal-title" id="exampleModalLabel">
                                <i class="fa fa-user-plus">
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
    /*

        Name    : Responsive HTML5 Chat

        Responsive HTML5 Chat helps you to create useful chatbox on your website easly. 
        You can change skin and sizes. You can read the installation and support documentation 
        before you begin. If you do not find the answer, do not hesitate to send a message to me.

        Owner   : Vatanay Ozbeyli
        Web     : www.vatanay.com
        Support : hi@vatanay.com

        */

    function responsiveChat(element) {
        $(element).html('<form class="chat"><span></span><div class="messages"></div><div class="back-comment"><input type="text" class="form-control comment" placeholder="Comment..."><input type="submit" class="send" value=">"></form></div>');

        function showLatestMessage() {
            $(element).find('.messages').scrollTop($(element).find('.messages').height());
        }
        showLatestMessage();


        $(element + ' input[type="text"]').keypress(function(event) {
            if (event.which == 13) {
                event.preventDefault();
                $(element + ' input[type="submit"]').click();
            }
        });
        $(element + ' input[type="submit"]').click(function(event) {
            event.preventDefault();
            var message = $(element + ' input[type="text"]').val();
            if ($(element + ' input[type="text"]').val()) {
                var d = new Date();
                var clock = d.getHours() + ":" + d.getMinutes() + ":" + d.getSeconds();
                var month = d.getMonth() + 1;
                var day = d.getDate();
                var currentDate =
                    (("" + day).length < 2 ? "0" : "") +
                    day +
                    "." +
                    (("" + month).length < 2 ? "0" : "") +
                    month +
                    "." +
                    d.getFullYear() +
                    "&nbsp;&nbsp;" +
                    clock;
                $(element + ' div.messages').append(
                    '<div class="message"><div class="myMessage"><p>' +
                    message +
                    "</p><date>" +
                    currentDate +
                    "</date></div></div>"
                );
                setTimeout(function() {
                    $(element + ' > span').addClass("spinner");
                }, 100);
                setTimeout(function() {
                    $(element + ' > span').removeClass("spinner");
                }, 2000);
            }
            $(element + ' input[type="text"]').val("");
            showLatestMessage();
        });
    }

    function responsiveChatPush(element, sender, origin, date, message) {
        var originClass;
        if (origin == 'me') {
            originClass = 'myMessage';
        } else {
            originClass = 'fromThem';
        }
        $(element + ' .messages').append('<div class="message"><div class="' + originClass + '"><p>' + message + '</p><date><b>' + sender + '</b> ' + date + '</date></div></div>');
    }

    /* Activating chatbox on element */
    responsiveChat('.responsive-html5-chat');

    /* Let's push some dummy data */
    responsiveChatPush('.chat', 'Alexander', 'you', '08.03.2021 14:31:22', 'Ey, this chat section will be doomed right?');
    responsiveChatPush('.chat', 'Firaz', 'me', '08.03.2021 14:33:32', 'Yeah, we\'ll replace it with a comment plugin or something like that.');

    /* DEMO */
    if (parent == top) {
        $("a.article").show();
    }
</script>

<?= $this->endSection(); ?>