function getImgAll(e, checkTitle, active, idMer) {

    if (checkTitle == 'video') {
        $(e).parent().find('span').removeClass(active);
        $(e).addClass(active);
        let ResAjax = callAjax('get-image-all-feedback', 'post', { idMer: idMer, checkTit: 'video' });
        $('#image').html(renderImg(ResAjax))

    } else if (checkTitle == '2') {
        $(e).parent().find('span').removeClass(active);
        $(e).addClass(active);
        let ResAjax = callAjax('get-image-all-feedback', 'post', { idMer: idMer, checkTit: '2' });
        $('#image').html(renderImg(ResAjax))


    } else if (checkTitle == '1') {
        $(e).parent().find('span').removeClass(active);
        $(e).addClass(active);
        let ResAjax = callAjax('get-image-all-feedback', 'post', { idMer: idMer, checkTit: '1' });
        $('#image').html(renderImg(ResAjax))

    } else if (checkTitle == '3') {
        $(e).parent().find('span').removeClass(active);
        $(e).addClass(active);
        let ResAjax = callAjax('get-image-all-feedback', 'post', { idMer: idMer, checkTit: '3' });
        $('#image').html(renderImg(ResAjax))



    }

}

function renderImg(ResAjax) {
    let text = '';
    for (let i = 0; i < (ResAjax).length; i++) {
        for (let j = 0; j < (ResAjax[i]).length; j++) {
            if (ResAjax[i][j] == '') {
                text = '';
            } else {
                let x = Number((ResAjax[i][j]).length);
                let check = ResAjax[i][j].slice(x - 3, x);
                if (check == 'mp4' || check == 'avi' || check == 'wmv' || check == 'mp3' || check == 'wav') {
                    text += `<video controls><source src="/upload/feed-back/` + ResAjax[i][j] + `" type=""></video>`;

                } else {
                    text += `<img src="/upload/feed-back/` + ResAjax[i][j] + `" alt="Tất cả ảnh "></img>`;
                }
            }
        }
    }
    return text;
}

function getFeedBack(e, checkTitle, active, idMer) {
    if (checkTitle == '0') {
        $(e).parent().find('span').removeClass(active);
        $(e).addClass(active);
        let feedBackAjax1 = callAjax('get-feedback-customer', 'post', { idMer: idMer, checkTitle: '0' })
        $('.wrap-comment').html(renderFeedBackNoImg(feedBackAjax1));
    } else if (checkTitle == '1') {
        $(e).parent().find('span').removeClass(active);
        $(e).addClass(active);
        let feedBackAjax = callAjax('get-feedback-customer', 'post', { idMer: idMer, checkTitle: '1' })
        $('.wrap-comment').html(renderFeedBack(feedBackAjax));
    } else if (checkTitle == 'vi') {
        $(e).parent().find('span').removeClass(active);
        $(e).addClass(active);
        let feedBackAjax = callAjax('get-feedback-customer', 'post', { idMer: idMer, checkTitle: 'vi' })
        $('.wrap-comment').html(renderFeedBack(feedBackAjax));
    }
}

function renderFeedBack(feedBackAjax) {

    let text = '';
    let textImg = '';
    let textComent = '';
    if (feedBackAjax == []) {
        text = 'không có dữ liệu';
    } else {
        for (let i = 0; i < feedBackAjax.length; i++) {
            if (feedBackAjax[i].img_order != null) {
                let img = (feedBackAjax[i].img_order).split(",");
                for (let j = 0; j < img.length; j++) {
                    textImg += `<img src="/upload/feed-back/` + img[j] + `" alt="">`
                }
            }
            if (feedBackAjax[i].video_order != null) {
                let video = (feedBackAjax[i].video_order).split(",");
                for (let j = 0; j < video.length; j++) {
                    if (video[j] != '') {
                        textImg += `<video controls><source src="/upload/feed-back/` + video[j] + `" type=""></video>`;
                    }
                }
            }
            if (feedBackAjax[i].comment == null) {
                textComent == '';
            }
            text += `
           <div class="comment">
           <div class="avat-comment">
               <img src="upload/information/` + feedBackAjax[i].infoCus['img_avata'] + `" alt="ảnh đại diện người comment ">
           </div>
           <div class="info-commenter">
               <div class="name-commenter">
                   <span class="name_cmter">` + feedBackAjax[i].infoCus['name'] + `</span>
                   <div class="num-img">
                       <img src="../img/more.svg" alt="Tùy chọn">
                   </div>
               </div>
               <div class="cmt-start">
                   <img src="../img/star_feedback.svg" alt="comment sao">
                   <img src="../img/star_feedback.svg" alt="comment sao">
                   <img src="../img/star_feedback.svg" alt="comment sao">
                   <img src="../img/star_feedback.svg" alt="comment sao">
                   <img src="../img/star_feedback.svg" alt="comment sao">
               </div>
               <div class="cmt-contnet">
                   <p>` + textComent + `</p>
               </div>
               <div class="toppic-cmt">
                   <span>` + feedBackAjax[i].label + `</span>
               </div>
               <div class="detail-order">
                   <div class="thea">
                       <a href=""> Chi tiết đơn hàng </a>
                   </div>
                   <div class="img-detail-order">
                    ` + textImg + `
                   </div>
               </div>
               <div class="button-like-cmt">
                   <button class="button-like">
                       <img src="../img/like-food.svg" alt="Lượt thích">
                       <span class="num-like">10</span>
                   </button>
                   <button class="button-cmt">
                       <img src="../img/cmt-post.svg" alt="Lượt comment">
                       <span class="num-cmt">10</span>
                   </button>
               </div>
               <div class="reply-store">
                   <div class="store">
                       <a href="">Phản hồi của quán </a>
                   </div>
                   <div class="cmt-store">
                       <p>Dạ, cảm ơn bạn đã tin tưởng và ủng hộ SƯỜN MƯỜI. Hẹn gặp bặn vào những đặt đồ ăn tiếp theo tại SƯỜN MƯỜI nhé !!!</p>
                   </div>
               </div>
           </div>
       </div>
       <hr>
           `
            textImg = '';
        }
    }
    return text;
}

function renderFeedBackNoImg(feedBackAjax) {

    let text = '';
    let textComent = '';
    if (feedBackAjax == []) {
        text = 'không có dữ liệu';
    } else {
        for (let i = 0; i < feedBackAjax.length; i++) {
            if (feedBackAjax[i].comment == null) {
                textComent == '';
            }
            text += `
           <div class="comment">
           <div class="avat-comment">
               <img src="upload/information/` + feedBackAjax[i].infoCus['img_avata'] + `" alt="ảnh đại diện người comment ">
           </div>
           <div class="info-commenter">
               <div class="name-commenter">
                   <span class="name_cmter">` + feedBackAjax[i].infoCus['name'] + `</span>
                   <div class="num-img">
                       <img src="../img/more.svg" alt="Tùy chọn">
                   </div>
               </div>
               <div class="cmt-start">
                   <img src="../img/star_feedback.svg" alt="comment sao">
                   <img src="../img/star_feedback.svg" alt="comment sao">
                   <img src="../img/star_feedback.svg" alt="comment sao">
                   <img src="../img/star_feedback.svg" alt="comment sao">
                   <img src="../img/star_feedback.svg" alt="comment sao">
               </div>
               <div class="cmt-contnet">
                   <p>` + textComent + `</p>
               </div>
               <div class="toppic-cmt">
                   <span>` + feedBackAjax[i].label + `</span>
               </div>
               <div class="detail-order">
                   <div class="thea">
                       <a href=""> Chi tiết đơn hàng </a>
                   </div>
                   
               </div>
               <div class="button-like-cmt">
                   <button class="button-like">
                       <img src="../img/like-food.svg" alt="Lượt thích">
                       <span class="num-like">10</span>
                   </button>
                   <button class="button-cmt">
                       <img src="../img/cmt-post.svg" alt="Lượt comment">
                       <span class="num-cmt">10</span>
                   </button>
               </div>
               <div class="reply-store">
                   <div class="store">
                       <a href="">Phản hồi của quán </a>
                   </div>
                   <div class="cmt-store">
                       <p>Dạ, cảm ơn bạn đã tin tưởng và ủng hộ SƯỜN MƯỜI. Hẹn gặp bặn vào những đặt đồ ăn tiếp theo tại SƯỜN MƯỜI nhé !!!</p>
                   </div>
               </div>
           </div>
       </div>
       <hr>
           `
        }
    }
    return text;
}