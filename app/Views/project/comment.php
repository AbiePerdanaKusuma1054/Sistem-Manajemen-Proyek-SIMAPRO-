<?= $this->extend('temp/template'); ?>

<?= $this->section('content'); ?>
<div class="canvas-2">
    <div class="lay" style="text-align: left ;">
        <div class="menu-detail">
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
                    <div class="borders">
                        <div class="chat">
                            <span></span>
                            <div class="massages">
                                <div class="message">
                                    <div class="fromThem">
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio cupiditate aut pariatur maxime accusantium necessitatibus laboriosam architecto quae, rerum molestias debitis inventore aspernatur voluptate exercitationem quibusdam deleniti cum consectetur repellat?</p>
                                        <p class="date">
                                            <b>Firax</b>
                                        <p class="txt-date">01.02.2021<span class="txt-time">12.76</span></p>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="chat">
                            <span></span>
                            <div class="massages">
                                <div class="message">
                                    <div class="fromThem">
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio cupiditate aut pariatur maxime accusantium necessitatibus laboriosam architecto quae, rerum molestias debitis inventore aspernatur voluptate exercitationem quibusdam deleniti cum consectetur repellat?</p>
                                        <p class="date">
                                            <b>Firax</b>
                                        <p class="txt-date">01.02.2021<span class="txt-time">12.76</span></p>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="input-group p-2">
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Comment ..." style="background-color: #222121;border: none;color: white;font-size: 9pt;"></textarea>
                        <div class="input-group-append" style="height: 40px;width: 40px;">
                            <button class="btn btn-secondary sends" type="button" id="button-addon2"><i class="fa fa-paper-plane fa-lg" style="color: white;"></i></button>
                        </div>
                    </div>
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

<script>
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