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
                <div class="title-1 active">
                    <a href="customer-post-p<?= $idMer ?>">Bài viết gần đây </a>
                    <hr>
                </div>
                <div class="title-2">
                    <a href="detail-merchant-m<?= $idMer ?>">Thực đơn </a>
                    <hr>
                </div>
                <div class="title-3">
                    <a href="customer-feedback-f<?= $idMer ?>">Đánh giá</a>
                    <hr>
                </div>
            </div>
            <hr>
        </div>
        <div class="post">
            <div class="wrap-post">
                <?php foreach ($posts as $k => $item) {
                    if ($item['censorship'] == 1) {
                ?>
                        <div class="block">
                            <div class="block-1">
                                <div class="wrap-block-1">
                                    <div class="avat-poster">
                                        <img src="upload/merchant/infor/<?= $item['img_merchant'] ?>" alt="ảnh đại diện người đăng ">
                                        <!-- <img src="upload/information/<?= $item['img_merchant'] ?>" alt="ảnh đại diện người đăng "> -->
                                    </div>
                                    <div class="info-poster">
                                        <div class="name-poster">
                                            <span class="name_pter"><?= $item['name_merchant'] ?></span>
                                            <div class="num-img">
                                                <?php
                                                if (!empty($item['img_video'])) {
                                                    echo "<li>Đã thêm " . count($item['img']) . " ảnh mới</li>";
                                                }
                                                ?>

                                            </div>
                                        </div>
                                        <div class="time-post">
                                            <span><?= $item['created_at'] ?></span>
                                        </div>
                                    </div>

                                </div>
                                <div class="option-report">
                                    <button class="more">
                                        <img src="../img/more.svg" alt="Tùy chọn">
                                    </button>
                                    <div class="report">
                                        <span>Báo cáo bài viết</span>
                                    </div>
                                </div>
                            </div>
                            <div class="block-2">
                                <div class="img-post">
                                    <?php if (!empty($item['img_video'])) {
                                        foreach ($item['img'] as $v) {
                                            echo '<div class="img-video"><img src="upload/merchant/food/' . $v . '" alt="Ảnh bài viết"></div>';
                                        }
                                    } ?>

                                </div>
                                <p class="content-post">
                                    <?= $item['content'] ?>
                                </p>
                            </div>
                            <hr>
                            <div class="block-3">
                                <?php
                                $countLike = 0;
                                $text = '';
                                foreach ($likePosts as $like) {
                                    if ($like['post_id'] == $item['id']) {
                                        $countLike += 1;
                                    }
                                }
                                ?>
                                <button class="button-like">
                                    <?php if (!empty($text)) {
                                        echo '<img src="../img/like_red.svg" alt="Lượt thích" class="img_like">';
                                    } else {
                                        echo '<img src="../img/like-food.svg" alt="Lượt thích" class="img_like">';
                                    } ?>
                                    <span class="num-like"><?= $countLike ?></span>
                                </button>
                                <?php
                                $countComent = 0;
                                foreach ($comments as $cmt) {
                                    if ($cmt['post_id'] == $item['id']) {
                                        $countComent += 1;
                                    }
                                }
                                ?>
                                <button class="button-cmt">
                                    <img src="../img/cmt-post.svg" alt="Lượt comment">
                                    <span class="num-cmt"><?= $countComent ?></span>
                                </button>
                            </div>
                            <div class="block-4">

                                <div class="wrap-cmt">
                                    <?php
                                    foreach ($comments as $comment) {
                                        if ($comment['post_id'] == $item['id'] && $comment['parent_id'] == 0) {
                                    ?>
                                            <div class="comment">
                                                <div class="img-cmt">
                                                    <?php if ($comment['merchant_id'] == null) {
                                                        echo '<img src="upload/information/' . $comment['cmtUser'][0]['img_avata'] . '" alt="Ảnh đại diện comment">';
                                                    } else {
                                                        echo '<img src="upload/merchant/infor/' . $comment['cmtUser'][0]['img_avatar'] . '" alt="Ảnh đại diện comment">';
                                                    } ?>

                                                </div>
                                                <div class="wrap-comment">
                                                    <div class="info-cmt">
                                                        <div class="name-cmt">
                                                            <?php if ($comment['merchant_id'] == null) {
                                                                echo "<a href=\"\">" . $comment['cmtUser'][0]['name'] . "</a>";
                                                            } else {
                                                                echo "<a href=\"\">" . $comment['cmtUser'][0]['name_merchant'] . "</a>";
                                                            } ?>
                                                        </div>
                                                        <div class="nd-comt">
                                                            <p><?= $comment['content'] ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="a-like-cmt">
                                                        <a href="">Thích</a>

                                                        <span onclick="clickToLogin()">Phản hồi</span>

                                                        <span><?= changeMinute(strtotime($comment['created_at'])) . ' '; ?></span>
                                                    </div>
                                                    <div class="wrap-sub-cmt">
                                                        <?php foreach ($comments as $cmt) {
                                                            if ($cmt['parent_id'] == $comment['id']) {
                                                        ?>
                                                                <div class="comment">
                                                                    <div class="img-cmt">
                                                                        <?php if ($comment['merchant_id'] == null) {
                                                                            echo '<img src="upload/information/' . $comment['cmtUser'][0]['img_avata'] . '"  alt="Ảnh đại diện comment">';
                                                                        } else {
                                                                            echo '<img src="upload/merchant/infor/' . $comment['cmtUser'][0]['img_avatar'] . '" alt="Ảnh đại diện comment">';
                                                                        } ?>

                                                                    </div>
                                                                    <div class="wrap-comment">
                                                                        <div class="info-cmt">
                                                                            <div class="name-cmt">
                                                                                <?php if ($comment['merchant_id'] == null) {
                                                                                    echo "<a href=\"\">" . $comment['cmtUser'][0]['name'] . "</a>";
                                                                                } else {
                                                                                    echo "<a href=\"\">" . $comment['cmtUser'][0]['name_merchant'] . "</a>";
                                                                                } ?>
                                                                            </div>
                                                                            <div class="nd-comt">
                                                                                <p><?= $cmt['content'] ?></p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="a-like-cmt">
                                                                            <a onclick="clickToLogin()">Thích</a>

                                                                            <span onclick="clickToLogin()">Phản hồi</span>

                                                                            <span><?= changeMinute(strtotime($comment['created_at'])) . ' '; ?></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                        <?php
                                                            }
                                                        } ?>
                                                    </div>
                                                    <div class="renderSubCmtIput"></div>
                                                </div>
                                            </div>
                                    <?php
                                        }
                                    } ?>

                                </div>
                            </div>
                        </div>
                        <hr>
                <?php }
                } ?>


            </div>
        </div>

    </div>

</div>