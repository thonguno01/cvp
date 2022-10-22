// alert()
$(document).ready(function() {
    $('button.more').click(function() {
        $('.report').addClass('d-block');
    });
});

window.onclick = function(e) {
    let modal = document.querySelector("#report");
    if (e.target == modal) {
        $('#report').removeClass('d-block');
        $('.report').removeClass('d-block');
    }
}
$('.cancle').click(function() {
    $('#report').removeClass('d-block');
    $('.report').removeClass('d-block');
});
$('.save').click(function() {
    $('#report').removeClass('d-block');
    $('.report').removeClass('d-block');
});

function send(e, postId) {
    let textComment = $(e).parent().parent().find('.comtent_comment').val().trim();
    console.log(textComment);
    if (textComment != '') {
        let dataJson = {
            comment: textComment,
            idPost: postId,
        }

        let check = callAjax('customer-send-comment', 'post', dataJson);
        if (check.result == true) {
            let renderCmt = `<div class="comment">
            <div class="img-cmt">
                <img src="upload/information/` + check.img + `" alt="Ảnh đại diện comment">
            </div>
            <div class="wrap-comment">
                <div class="info-cmt">
                    <div class="name-cmt">
                        <a href="">` + check.name_cus + `</a>
                    </div>
                    <div class="nd-comt">
                        <p>` + check.content + `</p>
                    </div>
                </div>
                <div class="a-like-cmt">
                    <a href="">Thích</a>
                    <span onclick="replyParent(this,` + Number(check.idComment) + `,` + Number(postId) + `)">Phản hồi</span>
                    <a href="">
                        <li>0 phút</li>
                    </a>
                </div>
                <div class="wrap-sub-cmt"></div>
                <div class="renderSubCmtIput"></div>
            </div>
        </div>`;
            $(e).parent().parent().parent().find('.wrap-cmt').append(renderCmt);
            $(e).parent().parent().find('.comtent_comment').val('');
        }
    } else {
        alert('Bạn chưa ghi nội dung bình luận ');
    }
}

function replyParent(e, idComment, idPost) {
    let getInfomation = callAjax('get-infomation-customer-post', 'post', '');
    let renderInputReply = `<div class="binh_luan">
    <div class="anh_nguoi_binh_luan">
        <img src="upload/information/` + getInfomation.img_avata + `" alt="Ảnh đại diện comment">
    </div>
    <div class="input_comment">
        <input type="text" class="comtent_comment" placeholder="Viết bình luận...">
        <button type="button" onclick="sendReply(this,` + idPost + ` , ` + idComment + ` )">Gửi</button>
        <!-- <button>
            <div class="icon-binh-luan"></div>
        </button> -->
    </div>
</div>`;
    $(e).parent().parent().parent().find('.renderSubCmtIput').html(renderInputReply);
}

function replyParentChild(e, idComment, idPost) {
    let getInfomation = callAjax('get-infomation-customer-post', 'post', '');
    let renderInputReply = `<div class="binh_luan">
    <div class="anh_nguoi_binh_luan">
        <img src="upload/information/` + getInfomation.img_avata + `" alt="Ảnh đại diện comment">
    </div>
    <div class="input_comment">
        <input type="text" class="comtent_comment" placeholder="Viết bình luận...">
        <button type="button" onclick="sendReply(this,` + idPost + ` , ` + idComment + ` )">Gửi</button>
        <!-- <button>
            <div class="icon-binh-luan"></div>
        </button> -->
    </div>
</div>`;
    $(e).parent().parent().parent().parent().parent().find('.renderSubCmtIput').html(renderInputReply);
    console.log(idComment);
}

function sendReply(e, idPost, idComment) {
    let textComment = $(e).parent().parent().find('.comtent_comment').val().trim();
    let dataJson = {
        content: textComment,
        idPost: idPost,
        idComment: idComment,
    };
    let sendRep = callAjax('customer-send-reply-comment', 'post', dataJson);
    if (sendRep.result == true) {
        let renderCmtReply = `<div class="comment">
        <div class="img-cmt">
            <img src="upload/information/` + sendRep.img + `" alt="Ảnh đại diện comment">
        </div>
        <div class="wrap-comment">
            <div class="info-cmt">
                <div class="name-cmt">
                    <a href="">` + sendRep.name_cus + `</a>
                </div>
                <div class="nd-comt">
                    <p>` + sendRep.content + `</p>
                </div>
            </div>
            <div class="a-like-cmt">
                <a href="">Thích</a>
                <span onclick="replyParentChild(this , ` + idComment + ` , ` + idPost + `  )">Phản hồi</span>
                <a href="">
                    <li>0 phút</li>
                </a>
            </div>
        </div>
    </div>`;
        $(e).parent().parent().parent().parent().find('.wrap-sub-cmt').append(renderCmtReply);
        $(e).parent().parent().find('.comtent_comment').val('');
        $(e).parent().parent().remove();
    }
}


function like(e, idPost) {
    let likePost = callAjax('customer-like-post', 'post', { idPost: idPost });
    if (likePost.rs == 'add') {
        let like = Number($(e).find('.num-like').text());
        like++;
        $(e).find('.img_like').attr('src', '../img/like_red.svg');
        $(e).parent().parent().find('.num-like').text(like)
    } else {
        let like = Number($(e).find('.num-like').text());
        like--;
        $(e).find('.img_like').attr('src', '../img/like-food.svg');
        $(e).parent().parent().find('.num-like').text(like)

    }

}

function report(e, idPost) {
    $('#report').addClass('d-block');
    $('.saveReport').click(() => {
        let reason1 = $('#reason1').val();
        let reason2 = $('textarea#reason2').val();
        let dataJson = {
            reason1: reason1,
            reason2: reason2,
            idPost: idPost,
        }
        let saveReport = callAjax('save-report-post', 'post', dataJson);
        if (saveReport.rs == true) {
            $('#reason1').val('0');
            $('textarea#reason2').val('');
            $('#report').removeClass('d-block');
        }
    });
}