
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
                <div class="title_str">
                    <?php
                    if($detail_post->type_post == 1){ 
                    ?>
                    <span>HƯỚNG DẪN SỬ DỤNG CƠM VĂN PHÒNG - VIECLAM123</span>
                    <?php
                    }
                    elseif($detail_post->type_post == 2){
                    ?>
                    <span>TIN TỨC DÀNH CHO MERCHANT</span>
                    <?php
                    }
                    else{
                    ?>
                    <span>CÂU HỎI THƯỜNG GẶP</span>
                    <?php
                    }
                    ?>
                    <h2><?= $detail_post->title?></h2>
                </div>
                <div class="box">
                    <div class="b01">
                        <div class="conntent">
                            <div class="imag">
                            <img onerror="this.src='/img/use_banner.png'" src="upload/admin/<?= $detail_post->img?>" alt="">
                            </div>
                            <div class="text_ct">
                            <?= $detail_post->content?>
                            </div>
                        </div>
                    </div>
                    <div class="b02">
                        <div class="tit_b02">Tin cùng chuyên mục</div>
                        <div class="tong">
                            <?php
                            $data_tin_lien_quan= $this->Generals_model->get_list_index_1('posts_index_merchant', ['type_post' => $detail_post->type_post, 'censorship' => 1]);
                            foreach($data_tin_lien_quan as $key => $v){
                            ?>
                            <div class="ct_bo2">
                                <div class="img">
                                <a href="chi-tiet-<?= $v["id"]?>"><img onerror="this.src='/img/use_banner.png'" src="upload/admin/<?= $v["img"]?>" alt=""></a>
                                </div>
                                <div class="text">
                                    <a href="chi-tiet-<?= $v["id"]?>"><h2><?= $v["title"]?></h2></a>
                                    <span><?= $v["content"]?></span>
                                </div>
                            </div>
                            <?php
                            }
                            ?>
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