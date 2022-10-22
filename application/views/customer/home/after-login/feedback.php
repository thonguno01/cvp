<div class="content">
    <div class="box-1">
        <?php
        foreach ($merchants as $key => $merchant) {

        ?>
            <div class="box-left">
                <div class="image">
                    <div class="size">
                        <img src="<?= 'upload/merchant/infor/' . $merchant['img_avatar'] ?>" alt="Ảnh đại diện quán ">
                    </div>
                </div>
                <div class="information">
                    <div class="info-head">
                        <button class="like"><img src="../img/like.png" alt="yêu thích"><span>Được yêu thích</span></button>
                        <span><?= $merchant['type_merchant'] ?></span>
                    </div>
                    <input type="hidden" id="idMerchant" name="idMerchant" value="<?= $merchant['id'] ?>">
                    <div class="infor-name">
                        <p><?= $merchant['name_merchant'] ?> </p>
                    </div>
                    <div class="location">
                        <div class="icon-location">
                            <img src="../img/location.svg" alt="Địa chỉ quán">
                        </div>
                        <div class="name-location">
                            <span><?= $merchant['address'] . ',' .  $merchant['id_district'] . ',' . $merchant['id_city'] ?></span>
                        </div>
                    </div>
                    <div class="feed-back">
                        <div class="star-fback">
                            <img src="../img/star_feedback.svg" alt="Đánh giáo theo sao">
                            <img src="../img/star_feedback.svg" alt="Đánh giáo theo sao">
                            <img src="../img/star_feedback.svg" alt="Đánh giáo theo sao">
                            <img src="../img/star_feedback.svg" alt="Đánh giáo theo sao">
                            <img src="../img/star_feedback_rong.png" alt="Đánh giáo theo sao">
                        </div>
                        <div class="number_feedback">
                            <span>9999+</span>
                        </div>
                        <span class="name-feedback"> Đánh giá trên CVP - Vieclam123</span>
                    </div>
                    <div class="contact">
                        <p>Liên hệ: <span class="phone"><?= $merchant['phone'] ?></span></p>
                    </div>
                    <div class="info_status">
                        <div class="status">
                            <img src="../img/on.svg" alt="Mở cửa">
                            <span> Mở cửa</span>
                        </div>
                        <div class="time-on">
                            <img src="../img/clock.svg" alt="Thời gian mở cửa ">
                            <span><?= $merchant['time_start'] . '-' . $merchant['time_end'] ?></span>
                        </div>
                    </div>
                    <div class="wrap-money-feeship">

                        <div class="money">
                            <img src="../img/dollar-circle.svg" alt="Thu nhập ">
                            <p><?= $merchant['time_start'] . '- ' . $merchant['time_end'] ?></p>
                        </div>
                        <div class="fee-ship">
                            <?php $ship = $merchant['fee_ship']; ?>
                            <p>Phí ship: <span><?= number_format($merchant['fee_ship']) . 'đ' ?>/ 1km</span></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-right">
                <div class="address-store">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d7838.684254869503!2d106.70676642475235!3d10.785086936675276!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1547181657956" width="100%" height="100%" frameborder="0" style="border:0; border-radius: 20px;" allowfullscreen=""></iframe>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
    <div class="hr">
        <hr>
    </div>
    <div class="box-2">
        <div class="sidebar-left">
            <div class="block-1">
                <div class="title-1 ">
                    <a href="customer-post-p<?= $idMer ?>">Bài viết gần đây </a>
                    <hr>
                </div>
                <div class="title-2">
                    <a href="detail-merchant-m<?= $idMer ?>">Thực đơn </a>
                    <hr>
                </div>
                <div class="title-3 active">
                    <a href="customer-feedback-f<?= $idMer ?>">Đánh giá</a>
                    <hr>
                </div>
            </div>
            <div class="block-02">
                <div class="wrap-block-02">
                    <div class="feed-back">
                        <p class="title">Tổng số đánh giá đã được đăng</p>
                        <hr>
                        <div class="see-feedback">
                            <div class="img_fback">
                                <img src="../img/star_feedback.svg" alt="Đánh giá">
                                <img src="../img/star_feedback_rong.png" alt="Đánh giá">
                                <img src="../img/star_feedback_rong.png" alt="Đánh giá">
                                <img src="../img/star_feedback_rong.png" alt="Đánh giá">
                                <img src="../img/star_feedback_rong.png" alt="Đánh giá">
                            </div>
                            <span> <?= $countStar['star1'] . ' ' ?>lượt đánh giá </span>
                        </div>
                        <div class="see-feedback">
                            <div class="img_fback">
                                <img src="../img/star_feedback.svg" alt="Đánh giá">
                                <img src="../img/star_feedback.svg" alt="Đánh giá">
                                <img src="../img/star_feedback_rong.png" alt="Đánh giá">
                                <img src="../img/star_feedback_rong.png" alt="Đánh giá">
                                <img src="../img/star_feedback_rong.png" alt="Đánh giá">
                            </div>
                            <span> <?= $countStar['star2']  ?> lượt đánh giá </span>
                        </div>
                        <div class="see-feedback">
                            <div class="img_fback">
                                <img src="../img/star_feedback.svg" alt="Đánh giá">
                                <img src="../img/star_feedback.svg" alt="Đánh giá">
                                <img src="../img/star_feedback.svg" alt="Đánh giá">
                                <img src="../img/star_feedback_rong.png" alt="Đánh giá">
                                <img src="../img/star_feedback_rong.png" alt="Đánh giá">
                            </div>
                            <span> <?= $countStar['star3']  ?> lượt đánh giá </span>
                        </div>
                        <div class="see-feedback">
                            <div class="img_fback">
                                <img src="../img/star_feedback.svg" alt="Đánh giá">
                                <img src="../img/star_feedback.svg" alt="Đánh giá">
                                <img src="../img/star_feedback.svg" alt="Đánh giá">
                                <img src="../img/star_feedback.svg" alt="Đánh giá">
                                <img src="../img/star_feedback_rong.png" alt="Đánh giá">
                            </div>
                            <span> <?= $countStar['star4']  ?> lượt đánh giá </span>
                        </div>
                        <div class="see-feedback">
                            <div class="img_fback">
                                <img src="../img/star_feedback.svg" alt="Đánh giá">
                                <img src="../img/star_feedback.svg" alt="Đánh giá">
                                <img src="../img/star_feedback.svg" alt="Đánh giá">
                                <img src="../img/star_feedback.svg" alt="Đánh giá">
                                <img src="../img/star_feedback.svg" alt="Đánh giá">
                            </div>
                            <span> <?= $countStar['star5']  ?> lượt đánh giá </span>
                        </div>
                        <div class="total">
                            <span><?php echo  array_sum($countStar); ?> lượt đánh giá</span>
                        </div>
                    </div>
                    <hr>
                    <div class="criteria-feedback">
                        <div class="title-criteria">
                            <p>Tiêu chí đánh giá</p>
                        </div>
                        <div class="wrap-criteria-feedback">
                            <div class="see-feedback">
                                <span> Chất lượng </span>
                                <div class="img_fback">
                                    <img src="../img/star_feedback.svg" alt="Đánh giá">
                                    <img src="../img/star_feedback.svg" alt="Đánh giá">
                                    <img src="../img/star_feedback.svg" alt="Đánh giá">
                                    <img src="../img/star_feedback_rong.png" alt="Đánh giá">
                                    <img src="../img/star_feedback_rong.png" alt="Đánh giá">
                                </div>
                            </div>
                            <div class="see-feedback">
                                <span>Phục vụ </span>
                                <div class="img_fback">
                                    <img src="../img/star_feedback.svg" alt="Đánh giá">
                                    <img src="../img/star_feedback.svg" alt="Đánh giá">
                                    <img src="../img/star_feedback.svg" alt="Đánh giá">
                                    <img src="../img/star_feedback.svg" alt="Đánh giá">
                                    <img src="../img/star_feedback_rong.png" alt="Đánh giá">
                                </div>
                            </div>
                            <div class="see-feedback">
                                <span> Giá cả</span>
                                <div class="img_fback">
                                    <img src="../img/star_feedback.svg" alt="Đánh giá">
                                    <img src="../img/star_feedback.svg" alt="Đánh giá">
                                    <img src="../img/star_feedback.svg" alt="Đánh giá">
                                    <img src="../img/star_feedback.svg" alt="Đánh giá">
                                    <img src="../img/star_feedback.svg" alt="Đánh giá">
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="feedback-average">
                        <div class="title">
                            <p>Đánh giá trung bình</p>
                        </div>

                        <div class="average">
                            <div class="see-feedback">
                                <?php
                                $average =   (int)$countStar['star1'] + 2 * (int)$countStar['star2'] + 3 * (int)$countStar['star3'] +  4 * (int)$countStar['star4'] + 5 * (int)$countStar['star5']
                                ?>
                                <span class="point"> <?php if ($average != 0) {
                                                            echo $average / array_sum($countStar);
                                                        } else {
                                                            echo array_sum($countStar);
                                                        } ?> <span class="all">/5</span></span>
                                <div class="img_fback">
                                    <img src="../img/star_feedback.svg" alt="Đánh giá">
                                    <img src="../img/star_feedback.svg" alt="Đánh giá">
                                    <img src="../img/star_feedback.svg" alt="Đánh giá">
                                    <img src="../img/star_feedback.svg" alt="Đánh giá">
                                    <img src="../img/star_feedback.svg" alt="Đánh giá">
                                </div>
                                <div class="percent_feedback">
                                    <div class="wrap-percent-5-star">
                                        <div class="wrap-five-star">
                                            <img src="../img/star_feedback.svg" alt="Đánh giá">
                                            <img src="../img/star_feedback.svg" alt="Đánh giá">
                                            <img src="../img/star_feedback.svg" alt="Đánh giá">
                                            <img src="../img/star_feedback.svg" alt="Đánh giá">
                                            <img src="../img/star_feedback.svg" alt="Đánh giá">
                                        </div>
                                        <div class="line-five-star">
                                            <input type="range" min="0" value="<?= $countStar['star5']  ?>" max="<?= array_sum($countStar) ?>">
                                        </div>
                                    </div>

                                    <div class="wrap-percent-4-star">
                                        <div class="wrap-four-star">
                                            <img src="../img/star_feedback.svg" alt="Đánh giá">
                                            <img src="../img/star_feedback.svg" alt="Đánh giá">
                                            <img src="../img/star_feedback.svg" alt="Đánh giá">
                                            <img src="../img/star_feedback.svg" alt="Đánh giá">
                                        </div>
                                        <div class="line-four-star">
                                            <input type="range" min="0" value="<?= $countStar['star4']  ?>" max="<?= array_sum($countStar) ?>">
                                        </div>
                                    </div>
                                    <div class="wrap-percent-3-star">
                                        <div class="wrap-three-star">
                                            <img src="../img/star_feedback.svg" alt="Đánh giá">
                                            <img src="../img/star_feedback.svg" alt="Đánh giá">
                                            <img src="../img/star_feedback.svg" alt="Đánh giá">
                                        </div>
                                        <div class="line-three-star">
                                            <input type="range" min="0" value="<?= $countStar['star3']  ?>" max="<?= array_sum($countStar) ?>">
                                        </div>
                                    </div>
                                    <div class="wrap-percent-2-star">
                                        <div class="wrap-tow-star">
                                            <img src="../img/star_feedback.svg" alt="Đánh giá">
                                            <img src="../img/star_feedback.svg" alt="Đánh giá">
                                        </div>
                                        <div class="line-four-star">
                                            <input type="range" min="0" value="<?= $countStar['star2']  ?>" max="<?= array_sum($countStar) ?>">
                                        </div>
                                    </div>
                                    <div class="wrap-percent-1-star">
                                        <div class="wrap-one-star">
                                            <img src="../img/star_feedback.svg" alt="Đánh giá">
                                        </div>
                                        <div class="line-one-star">
                                            <input type="range" min="0" value="<?= $countStar['star1']  ?>" max="<?= array_sum($countStar) ?>">
                                        </div>
                                    </div>
                                    <div class="num-feedback">
                                        <span><?= array_sum($countStar) ?> lượt đánh giá </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <button class="btn_like_store">
                        <img src="../img/like.svg" alt="Yêu Thích">
                        <span><?= count($merYeuThich) ?> lượt yêu thích</span>
                    </button>
                </div>
            </div>
        </div>
        <div class="box02-right">
            <div class="menu">
                <div class="menu-left">
                    <p>Tất cả hình ảnh</p>
                </div>
                <div class="menu-right">
                    <span class="menu-img" onclick="getImgAll(this,'video' , 'menu_active' , <?= $idMer ?> )">Video
                        <hr>
                    </span>
                    <span class="menu-img" onclick="getImgAll(this,'1' , 'menu_active' , <?= $idMer ?> )">không gian
                        <hr>
                    </span>
                    <span class="menu-img " onclick="getImgAll(this,'2' , 'menu_active' , <?= $idMer ?> )">món ăn
                        <hr>
                    </span>
                    <span class="menu-img" onclick="getImgAll(this,'3' , 'menu_active' , <?= $idMer ?> )">thực đơn
                        <hr>
                    </span>
                </div>
            </div>
            <hr>
            <div class="menu-image">
                <div class="image" id="image">
                    <?php
                    foreach ($imgAlls as $img) {
                        if ($img != null) {
                            foreach ($img as $item) {
                                echo '<img src="/upload/feed-back/' . $item . '" alt="Tất cả ảnh ">';
                            }
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="bar-menu-feedback">
                <div class="menu-feedback">
                    <div class="menu-fback-left">
                        <a href="../home/feed-back-stored-customer-after-lohin.html">Đánh giá</a>
                    </div>
                    <div class="menu-fback-right">
                        <span onclick="getFeedBack(this, '0', 'mnfbr-active',<?= $idMer ?>)" class="mnfbr">Đánh giá không hình ảnh
                            <hr>
                        </span>
                        <span onclick="getFeedBack(this, '1','mnfbr-active' ,<?= $idMer ?>)" class="mnfbr ">Đánh giá Có hình ảnh
                            <hr>
                        </span>
                        <span onclick="getFeedBack(this, 'vi','mnfbr-active' ,<?= $idMer ?>)" class="mnfbr">Đánh giá Có video
                            <hr>
                        </span>
                    </div>
                    <div class="wrap-buton">
                        <button class="arrow-left"></button>
                        <button class="arrow-right"></button>
                    </div>
                </div>
            </div>
            <hr class="hr2">
            <div class="wrap-comment">

                <?php
                if (!empty($feedbacks)) {
                    foreach ($feedbacks as $feedback) {
                ?>
                        <div class="comment">
                            <div class="avat-comment">
                                <img src="upload/information/<?= $feedback['infoCus']['img_avata'] ?>" alt="ảnh đại diện người comment ">
                            </div>
                            <div class="info-commenter">
                                <div class="name-commenter">
                                    <span class="name_cmter"><?= $feedback['infoCus']['name'] ?></span>
                                    <div class="num-img">
                                        <img src="../img/more.svg" alt="Tùy chọn">
                                    </div>
                                </div>
                                <div class="cmt-start">
                                    <?php
                                    // for($i = 0 ; $i < )
                                    ?>
                                    <img src="../img/star_feedback.svg" alt="comment sao">
                                    <img src="../img/star_feedback.svg" alt="comment sao">
                                    <img src="../img/star_feedback.svg" alt="comment sao">
                                    <img src="../img/star_feedback.svg" alt="comment sao">
                                    <img src="../img/star_feedback.svg" alt="comment sao">
                                </div>
                                <div class="cmt-contnet">
                                    <p><?= $feedback['comment'] ?></p>
                                </div>
                                <div class="toppic-cmt">
                                    <span><?= $feedback['label'] ?></span>
                                </div>
                                <div class="detail-order">
                                    <div class="thea">
                                        <a href=""> Chi tiết đơn hàng </a>
                                    </div>
                                    <div class="img-detail-order">
                                        <?php
                                        if ($feedback['img_order'] != null) {
                                            $imgFeed = explode(',', $feedback['img_order']);
                                            foreach ($imgFeed as $v) {
                                                echo  '<img src="/upload/feed-back/' . $v . '" alt="">';
                                            }
                                        }
                                        if ($feedback['video_order'] != null) {
                                            $imgFeed = explode(',', $feedback['video_order']);
                                            foreach ($imgFeed as $v) {
                                                echo ' <video controls><source src="' . $v . '" type=""></video>';
                                            }
                                        }
                                        ?>

                                    </div>
                                </div>
                                <!-- <div class="button-like-cmt">
                                    <button class="button-like">
                                        <img src="../img/like-food.svg" alt="Lượt thích">
                                        <span class="num-like">10</span>
                                    </button>
                                    <button class="button-cmt">
                                        <img src="../img/cmt-post.svg" alt="Lượt comment">
                                        <span class="num-cmt">10</span>
                                    </button>
                                </div> -->
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

                <?php }
                } ?>
            </div>
            <div class="pagination">
                <div class="size">
                    <?= $link ?>

                </div>
            </div>
        </div>
    </div>

</div>