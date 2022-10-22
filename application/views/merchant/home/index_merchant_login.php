<?php
// var_dump($data_index)
?>
<div class="container">
    <div class="body">
        <div class="banner">
            <div id="slideshow">
                <div class="slide-wrapper">
                    <div class="mySlides w3-animate-fading banner1"></div>
                    <div class="mySlides w3-animate-fading banner2"></div>
                    <div class="mySlides w3-animate-fading banner3"></div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="tutorial_use">
                <div class="title_use"> 
                    <h2>Hướng dẫn sử dụng Cơm văn phòng - Vieclam123</h2>
                </div>
                <div class="use_all">
                    <?php
                    $data_index_2 = $this->Generals_model->notifi_object('posts_index_merchant', ['type_post' => 1, 'censorship' => 1]);
                    ?>
                    <div class="box1_use">
                        <div class="banner_use">
                            <a href="chi-tiet-<?php $slug = $data_index_2->title;
                                        echo   create_slug($slug); ?>-<?= $data_index_2->id ?>" target="blank"><img onerror="this.src='/img/use_banner.png'" src="upload/admin/<?= $data_index_2->img ?>" alt=""></a>
                        </div>
                        <div class="tit_content">
                            <a href="chi-tiet-<?php $slug = $data_index_2->title;
                                        echo   create_slug($slug); ?>-<?= $data_index_2->id ?>" target="blank">
                                <h2><?= $data_index_2->title ?></h2>
                            </a>
                            <span><?= $data_index_2->content ?></span>
                        </div>
                    </div>
                    <div class="box2_use">
                        <?php
                        foreach ($data_index as $key => $v) {
                            if ($v["type_post"] == 1) {
                        ?>
                                <div class="list_use">
                                    <div class="img_use">
                                        <a href="chi-tiet-<?php $slug = $v["title"];
                                        echo   create_slug($slug); ?>-<?= $v["id"] ?>" target="blank"><img onerror="this.src='/img/use_banner.png'" src="upload/admin/<?= $v["img"] ?>" alt=""></a>
                                    </div>
                                    <div class="content_use">
                                        <a href="chi-tiet-<?php $slug = $v["title"];
                                        echo   create_slug($slug); ?>-<?= $v["id"] ?>" target="blank">
                                            <h2><?= $v["title"] ?></h2>
                                        </a>
                                        <span><?= $v["content"] ?></span>
                                    </div>
                                </div>
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>
                <div class="view_all"><a href="chi-tiet-<?= $data_index_2->id ?>">Xem tất cả</a></div>
            </div>
            <div class="news_merchant">
                <div class="title_news_merchant">
                    <h2>Tin tức dành cho merchant</h2>
                </div>
                <div class="news_merchant_all">
                    <?php
                    $data_index_2_new = $this->Generals_model->notifi_object('posts_index_merchant', ['type_post' => 2, 'censorship' => 1]);
                    ?>
                    <div class="box1_news_merchant">
                        <div class="banner_news_merchant">
                            <a href="chi-tiet-<?php $slug = $data_index_2_new->title;
                                        echo   create_slug($slug); ?>-<?= $data_index_2_new->id ?>" target="blank"><img onerror="this.src='/img/use_banner.png'" src="upload/admin/<?= $data_index_2_new->img ?>" alt=""></a>
                        </div>
                        <div class="tit_content_mer">
                            <a href="chi-tiet-<?php $slug = $data_index_2_new->title;
                                        echo   create_slug($slug); ?>-<?= $data_index_2_new->id ?>" target="blank">
                                <h2><?= $data_index_2_new->title ?></h2>
                            </a>
                            <span><?= $data_index_2_new->content ?></span>
                        </div>
                    </div>
                    <div class="box2_news_merchant">
                        <?php
                        foreach ($data_index as $key => $v) {
                            if ($v["type_post"] == 2) {
                        ?>
                                <div class="list_news_merchant">
                                    <div class="img_news_merchant">
                                        <a href="chi-tiet-<?php $slug = $v["title"];
                                        echo   create_slug($slug); ?>-<?= $v["id"] ?>" target="blank"><img onerror="this.src='/img/use_banner.png'" src="upload/admin/<?= $v["img"] ?>" alt=""></a>
                                    </div>
                                    <div class="content_news_merchant">
                                        <a href="chi-tiet-<?php $slug = $v["title"];
                                        echo   create_slug($slug); ?>-<?= $v["id"] ?>" target="blank">
                                            <h2><?= $v["title"] ?></h2>
                                        </a>
                                        <span><?= $v["content"] ?></span>
                                    </div>
                                </div>
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>
                <div class="view_all"><a href="chi-tiet-<?= $data_index_2_new->id ?>">Xem tất cả</a></div>
            </div>
            <div class="question_al">
                <div class="title_question">
                    <h2>Câu hỏi thường gặp</h2>
                </div>
                <div class="news_question">
                    <?php
                    $data_index_2_ques = $this->Generals_model->notifi_object('posts_index_merchant', ['type_post' => 3, 'censorship' => 1]);
                    ?>
                    <div class="box1_question">
                        <div class="banner_question">
                            <a href="chi-tiet-<?php $slug = $data_index_2_ques->title;
                                        echo   create_slug($slug); ?>-<?= $data_index_2_ques->id ?>" target="blank"><img onerror="this.src='/img/use_banner.png'" src="upload/admin/<?= $data_index_2_new->img ?>" alt=""></a>
                        </div>
                        <div class="tit_question">
                            <a href="chi-tiet-<?php $slug = $data_index_2_ques->title;
                                        echo   create_slug($slug); ?>-<?= $data_index_2_ques->id ?>" target="blank">
                                <h2><?= $data_index_2_ques->title ?></h2>
                            </a>
                            <span><?= $data_index_2_ques->content ?></span>
                        </div>
                    </div>
                    <div class="box2_question">
                        <?php
                        foreach ($data_index as $key => $v) {
                            if ($v["type_post"] == 3) {
                        ?>
                                <div class="list_question">
                                    <div class="img_question">
                                        <a href="chi-tiet-<?php $slug = $v["title"];
                                        echo   create_slug($slug); ?>-<?= $v["id"] ?>" target="blank"><img onerror="this.src='/img/use_banner.png'" src="upload/admin/<?= $v["img"] ?>" alt=""></a>
                                    </div>
                                    <div class="content_question">
                                        <a href="chi-tiet-<?php $slug = $v["title"];
                                        echo   create_slug($slug); ?>-<?= $v["id"] ?>" target="blank">
                                            <h2><?= $v["title"] ?></h2>
                                        </a>
                                        <span><?= $v["content"] ?></span>
                                    </div>
                                </div>
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>
                <div class="view_all"><a href="chi-tiet-<?= $data_index_2_ques->id ?>">Xem tất cả</a></div>
            </div>
            <div class="partner">
                <div class="title_partner">
                    <h2>Đối tác nói gì về cơm văn phòng - vieclam123</h2>
                </div>
                <div class="content_partner">
                    <div class="block">
                        <div class="block_on">
                            <div class="img"></div>
                            <div class="tit_block">
                                <h2>Sườn Mười</h2>
                                <div class="evaluae">
                                    <span>Đánh giá</span>
                                    <div class="star">
                                        <div class="star1"></div>
                                        <div class="star1"></div>
                                        <div class="star1"></div>
                                        <div class="star1"></div>
                                        <div class="star1"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block_under"><span>Website tiện lợi, giúp chúng tôi tiếp cận khách hàng nhanh hơn</span></div>
                    </div>
                    <div class="block">
                        <div class="block_on">
                            <div class="img"></div>
                            <div class="tit_block">
                                <h2>Sườn Mười</h2>
                                <div class="evaluae">
                                    <span>Đánh giá</span>
                                    <div class="star">
                                        <div class="star1"></div>
                                        <div class="star1"></div>
                                        <div class="star1"></div>
                                        <div class="star1"></div>
                                        <div class="star1"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block_under"><span>Website tiện lợi, giúp chúng tôi tiếp cận khách hàng nhanh hơn</span></div>
                    </div>
                    <div class="block">
                        <div class="block_on">
                            <div class="img"></div>
                            <div class="tit_block">
                                <h2>Sườn Mười</h2>
                                <div class="evaluae">
                                    <span>Đánh giá</span>
                                    <div class="star">
                                        <div class="star1"></div>
                                        <div class="star1"></div>
                                        <div class="star1"></div>
                                        <div class="star1"></div>
                                        <div class="star1"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block_under"><span>Website tiện lợi, giúp chúng tôi tiếp cận khách hàng nhanh hơn</span></div>
                    </div>
                </div>
            </div>
            <div class="tutorial">
                <div class="tu_title">
                </div>
                <div class="tu_content">
                    <div class="video"></div>
                    <div class="question">
                        <div class="chtg">
                            <button>Câu hỏi thường gặp ?</button>
                        </div>
                        <div class="title">Đặt câu hỏi cho Cơm Văn Phòng - Vieclam123</div>
                        <input class="input" type="text" placeholder="Họ và tên" value="<?= $check_ath->name ?>" readonly>
                        <input class="input" type="text" placeholder="Email" value="<?= $check_ath->email ?>" readonly>
                        <textarea class="input_2" type="text" placeholder="Viết câu hỏi của bạn"></textarea>
                        <input class="input_cap" type="text" placeholder="Nhập mã captcha">
                        <div class="captcha"><span>CaptCha</span></div>
                        <div class="load"><button></button></div>
                        <div class="send_mail_div"><button class="send_mail">
                                <div class="text">GỬI EMAIL</div>
                                <div class="icon"></div>
                            </button></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var myIndex = 0;
    carousel();

    function carousel() {
        var i;
        var x = document.getElementsByClassName("mySlides");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        myIndex++;
        if (myIndex > x.length) {
            myIndex = 1
        }
        x[myIndex - 1].style.display = "block";
        setTimeout(carousel, 7000);
    }
</script>