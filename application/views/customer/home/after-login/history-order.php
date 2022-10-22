<div class="body">
    <div class="title-p">
        <p>Lịch sử đơn hàng</p>
    </div>
    <div class="wrap-search">
        <div class="search">
            <div class="status">
                <div class="title">
                    <span>Trạng thái </span>
                </div>
                <select name="" id="status_fil">
                    <option value="4">Tất cả</option>
                    <option value="3">Đã hủy</option>
                    <option value="2">Hoàn tất</option>
                    <option value="1">Đang giao</option>
                    <option value="0">Chờ xử lý</option>
                </select>
                <div class="img-select-drop-down">
                    <img src="../img/drop-down.svg" alt="">
                </div>
            </div>
            <div class="ngay_bd">
                <div class="title">
                    <span>Từ ngày</span>
                </div>
                <input type="date" id="ngay_bd" name="ngay_bd" value="">
            </div>
            <div class="ngay_kt">
                <div class="title">
                    <span>Đến ngày</span>
                </div>
                <input type="date" id="ngay_kt" name="ngay_kt" value="">
            </div>
            <div class="button-search">
                <button class="filter" onclick="filter_history_order()">
                    <span class="name">Tìm kiếm </span>
                    <!-- <img src="../img/search-status.png" alt="Tìm kiếm"> -->
                    <div class="icon-search"></div>
                </button>
            </div>
        </div>
    </div>
    <div class="table-reciever">
        <!-- Tất cả -->
        <table>
            <tr>
                <th>STT</th>
                <th>Mã đơn hàng</th>
                <th>Thời gian</th>
                <th>Địa điểm</th>
                <th>Tổng tiền </th>
                <th>Trạng thái </th>
                <th>Đánh giá </th>
                <th> Xem chi tiết</th>
                <th> Yêu thích</th>
            </tr>
            <?php foreach ($orders as $k => $value) { ?>
                <tr>
                    <!-- vd id = 5 -->
                    <td><?= $k + 1 ?></td>
                    <td class="code"><?= $value['code'] ?></td>
                    <td><?= $value['created_at'] ?></td>
                    <td><?= $value['address'] ?></td>
                    <td><?= number_format($value['total_after']) . 'đ' ?></td>
                    <?php
                    if ($value['status'] == 0) {
                        echo '<td><span class="processing" >Chờ xử lý</span>';
                    } elseif ($value['status'] == '1') {
                        echo ' <td><span class="delivery" onclick="delivery(this)">Đang giao hàng</span></td>';
                    } elseif ($value['status'] == 2) {
                        echo ' <td><span class="done">Đã hoàn tất</span></td>';
                    } elseif ($value['status'] == 3) {
                        echo ' <td><span class="text-destroy">Đã hủy</span> </td>';
                    }
                    ?>
                    <!-- <td><span class="done">Đã hoàn tất</span></td> -->
                    <?php if ($value['status'] == 2) {
                        if ($value['check_feed_back'] == 0) {
                            echo  '<td><span  class="done-feedback" onclick="feedBack(this);codeFeedBack(this)">Đánh giá</span></td> ';
                        } else {
                            echo  '<td><span  class="" >Đã đánh giá</span></td> ';
                        }
                    } else {
                        echo  '<td><span  class="" ></span></td> ';
                    } ?>
                    <!-- <td>
                            <span href="" class="done-feedback">Đánh giá</span>
                        </td> -->
                    <td>
                        <span class="td-see-detail" onclick="return showPopup(this ,<?= $value['status'] ?> );">Xem chi tiết</span>
                    </td>
                    <td class="option">
                        <button class="active"><img src="../img/like.svg" alt="Yêu thích"></button>
                    </td>



                </tr>

            <?php }  ?>


        </table>


    </div>
    <div class="pagination">
        <div class="size">
            <?= $link ?>
        </div>
    </div>
    <!-- <div class="note">
        <p>Lưu ý ! Nếu bạn Boom hàng quá 5 lần bạn sẽ bị hạn chế đặt hàng trên hệ thống </p>
    </div> -->
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
<div class="popup-assess" hidden>
    <form id="uploadForm" action="save-feedback-history" enctype="multipart/form-data" method="POST">
        <div class="wrap-popup-assess">
            <div class="pp-assess-title">
                <div class="icon-title"></div>
                <div class="title-assess">Đánh giá đơn hàng</div>
            </div>
            <div class="box01-assess">

            </div>
            <div class="see-more">
                <a href="">Xem thêm</a>
            </div>

            <div class="feedback-tieu-chi">
                <div class="name_tieu_chi">
                    <p>Tiêu chí đánh giá</p>
                </div>
                <div class="fb-star">
                    <div class="quality">
                        <span>Chất lượng </span>
                        <!-- <form class="ratting_quality"> -->
                        <div class="star">
                            <input type="radio" id="star5" name="rating" value="5">
                            <label class="full" for="star5" title="Awesome - 5 stars" data-id-star5="5" id="star_05"></label>
                            <input type="radio" id="star4" name="rating" value="4">
                            <label class="full" for="star4" title="Pretty good - 4 stars" data-id-star4="4" id="star_04"></label>

                            <input type="radio" id="star3" name="rating" value="3">
                            <label class="full" for="star3" title="Meh - 3 stars" data-id-star3="3" id="star_03"></label>

                            <input type="radio" id="star2" name="rating" value="2">
                            <label class="full" for="star2" title="Kinda bad - 2 stars" data-id-star2="2" id="star_02"></label>

                            <input type="radio" id="star1" name="rating" value="1">
                            <label class="full" for="star1" title="Sucks big time - 1 star" data-id-star1="1" id="star_01"></label>

                        </div>
                        <!-- </form> -->
                    </div>
                    <div class="waitress">
                        <span>Phục vụ</span>
                        <!-- <form class="ratting_service"> -->
                        <div class="star">
                            <input type="radio" id="waitress5" name="waitress" value="5">
                            <label class="full" for="waitress5" title="Awesome - 5 stars" data-id-star5="5" id="star_05"></label>
                            <input type="radio" id="waitress4" name="waitress" value="4">
                            <label class="full" for="waitress4" title="Pretty good - 4 stars" data-id-star4="4" id="star_04"></label>

                            <input type="radio" id="waitress3" name="waitress" value="3">
                            <label class="full" for="waitress3" title="Meh - 3 stars" data-id-star3="3" id="star_03"></label>

                            <input type="radio" id="waitress2" name="waitress" value="2">
                            <label class="full" for="waitress2" title="Kinda bad - 2 stars" data-id-star2="2" id="star_02"></label>

                            <input type="radio" id="waitress1" name="waitress" value="1">
                            <label class="full" for="waitress1" title="Sucks big time - 1 star" data-id-star1="1" id="star_01"></label>
                        </div>
                        <!-- </form> -->
                    </div>
                    <div class="price">
                        <span>Giá cả </span>
                        <!-- <form class="ratting_price"> -->
                        <div class="star">
                            <input type="radio" id="price5" name="price" value="5">
                            <label class="full" for="price5" title="Awesome - 5 stars" data-id-star5="5" id="star_05"></label>

                            <input type="radio" id="price4" name="price" value="4">
                            <label class="full" for="price4" title="Pretty good - 4 stars" data-id-star4="4" id="star_04"></label>

                            <input type="radio" id="price3" name="price" value="3">
                            <label class="full" for="price3" title="Meh - 3 stars" data-id-star3="3" id="star_03"></label>

                            <input type="radio" id="price2" name="price" value="2">
                            <label class="full" for="price2" title="Kinda bad - 2 stars" data-id-star2="2" id="star_02"></label>

                            <input type="radio" id="price1" name="price" value="1">
                            <label class="full" for="price1" title="Sucks big time - 1 star" data-id-star1="1" id="star_01"></label>
                        </div>
                        <!-- </form> -->

                    </div>
                </div>
            </div>
            <div class="comment">
                <div class="title-cmt">
                    <p>Bình luận</p>
                </div>
                <div class="content-cmt">
                    <textarea name="comment" id="comment" cols="30" rows="3" placeholder="nhập comment của bạn vào đây "></textarea>
                </div>
            </div>
            <div class="add-vide-image">
                <div class="title-vide-img">
                    <p>Thêm hình ảnh, Video</p>
                </div>
                <div class="appenImgVideo"></div>
                <div class="addimg">
                    <button class="add_img">
                        <div class="icon-add-img"></div>
                    </button>
                    <button>Thêm Ảnh
                        <input type="file" name="fileImg[]" onchange="chooseFile(this)" id="anh_dai_dien" accept=".jpg,.jpeg,.png,.gif" multiple></button>
                </div>
                <button class="add_video">
                    <div class="icon-add-video"></div>
                    <span>Thêm video<input type="file" id="imageFileVD" name="imageFileVD[]" multiple accept=".mp4"></< /span>
                </button>
                <div class="add-list-like">
                    <span class="name-add-list-like">Thêm vào danh sách yêu thích</span>
                    <button onclick="likeDish(this)">
                        <div class="icon-img-like">
                            <img src="../img/like-food.svg" alt="like-mechant">
                        </div>
                    </button>
                </div>
                <div class="btn_submit">
                    <button class="cancle">Hủy</button>
                    <!-- <button class="save" onclick="saveFeedBack(this)">Lưu đánh giá</button> -->
                    <button type="submit" name="btn_savefeedback" class="save">Lưu đánh giá</button>
                </div>
            </div>
        </div>
    </form>
</div>

<div class="popup-detail" hidden>

</div>
<div class="popup_no" id="popup_no">

</div>