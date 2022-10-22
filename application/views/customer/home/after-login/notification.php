<div class="body ">
    <div class="title-p">
        <p>Thông báo</p>
        <button class="more">
            <img src="../img/more.svg" alt="Tùy chọn">
        </button>
        <div class="report">
            <span onclick="seenAll()">Đánh giá đã xem tất cả</span>
        </div>
    </div>
    <div class="before">
        <!-- <p>Trước đó</p> -->
    </div>
    <div class="list">

        <?php
        // show($notifis);
        foreach ($notifis as $notice) { ?>
            <div class="item" onclick="seended(this)">
                <div class="item-notice">
                    <div class="notice-img">
                        <img src="../img/avta-poster.png" alt="Avata thông báo">
                    </div>
                    <div class="info-notice">
                        <div class="name-notice">
                            <div class="top">
                                <span class="name-alt"><?= $notice['name_mer'] ?></span>
                                <li>MĐH: <span class="code"><?= $notice['code'] ?></span> </li>
                            </div>
                            <div class="time-notice">
                                <span><?php echo changeMinute((getdate()[0] - $notice['created_at'])); ?></span>
                            </div>
                        </div>
                        <div class="notice-content">
                            <div class="content-detail">
                                <p><?= $notice['content'] ?></p>
                            </div>
                            <div class="see-detail">
                                <span onclick="seeDetail(this ,<?= $notice['content_cus'] ?> )">Xem chi tiết</span>
                            </div>
                        </div>

                    </div>
                    <?php if ($notice['status'] == 1) {
                        echo '<div class="notice-new"></div>';
                    } else {
                        echo '<div class=""></div>';
                    } ?>

                </div>
            </div>
        <?php } ?>
    </div>
    <div class="pagination">
        <div class="size">
            <img src="../img/pre.svg" alt="Lùi về 1 trang">
            <a class="pagnate-avtive" href="">1</a>
            <a class="pagnate-no-avtive" href="">2</a>
            <a class="pagnate-no-avtive" href="">3</a>
            <a class="pagnate-no-avtive" href="">4</a>
            <a class="pagnate-no-avtive" href="">5</a>
            <a class="pagnate-no-avtive" href="">6</a>
            <a class="pagnate-no-avtive" href="">7</a>
            <img src="../img/next.svg" alt="Tiến lên 1 trang">

        </div>
    </div>
</div>


<div class="popup-detail" hidden>

</div>

<div id="report" hidden>
    <div id="wrap-report">
        <div class="title-report">
            <div class="icon-report">

            </div>
            <p>
                Lý do hủy đơn
            </p>
        </div>
        <div class="content-report">
            <div class="choose-why-report">
                <label for="reason1">Chọn lý do báo cáo:</label>
                <select name="why-report" id="reason1">
                    <option value="0" selected>Chọn</option>
                    <option value="1">Tôi muốn thay đổi địa chỉ nhận hàng</option>
                    <option value="2">Tôi muốn thay đổi thông tin người nhận
                    </option>
                    <option value="3">Tôi nằm trong vùng bị phong tỏa
                    </option>
                    <option value="4">Tôi muốn thay đổi chi tiết đơn hàng
                    </option>
                </select>
                <div class="ic-drop-down"></div>
            </div>
            <div class="text-why">
                <div class="name-text-why">
                    <p>Lý do khác:</p>
                </div>
                <div class="textarea-why">
                    <textarea id="reason2" name=""></textarea>
                </div>
            </div>
        </div>
        <div class="bot-system ">
            <p>Hệ thống sẽ ghi nhận báo cáo của bạn!
            </p>
        </div>
        <div class="btn_cancle_saveReport">
            <button class="cancle">Quay lại</button>
            <button class="saveReport">Lưu Báo Cáo</button>
        </div>
    </div>
</div>