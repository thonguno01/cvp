<div class="container">
    <div class="body">
        <div class="box-left">
            <div class="wrap-box-left">
                <div class="home">
                    <div class="wrap">
                        <img src="../img/home-2.svg" alt="Trang chủ">
                        <a href="/merchant-home">Trang chủ</a>
                    </div>
                </div>
                <hr>
                <div class="update-user active ">
                    <div class="wrap">
                        <img src="../img/user-edit.svg" alt="Cập nhật tài khoản ">
                        <a href="/thong-ke">Thống kê</a>
                    </div>
                </div>
                <div class="update-address "> 
                    <div class="wrap">
                        <img src="../img/status-up.svg" alt="Cập nhật địa chỉ ">
                        <a href="/don-hang-hom-nay">Đơn hàng hôm nay</a>
                    </div>
                </div>
                <div class="store-save">
                    <div class="wrap">
                        <img src="../img/bag-tick_list.svg" alt="Quán ăn đã lưu">
                        <a href="">Lịch sử đơn hàng</a>
                    </div>
                </div>
                <div class="admin_profile">
                    <div class="wrap">
                        <img src="../img/edit.svg" alt="Quán ăn đã lưu">
                        <a href="/ho-so-quan-an">Quản lý hồ sơ</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="box-right">
            <div class="row_1">
                <h2>Lịch sử đơn hàng</h2>
            </div>
            <form action="">
                <div class="row_2">
                    <div class="sl_status">
                        <span>Trạng thái:</span>
                        <select name="" id="status_fil">
                            <option value="4">Tất cả</option>
                            <option value="3">Đã hủy</option>
                            <option value="2">Hoàn tất</option>
                        </select>
                    </div>
                    <div class="day">
                        <span>Ngày:</span>
                        <input type="date">
                    </div>
                    <div class="start_day">
                        <span>Từ ngày:</span>
                        <input type="date" id="ngay_bd">
                    </div>
                    <div class="end_day">
                        <span>Đến ngày:</span>
                        <input type="date" id="ngay_kt">
                    </div>
                    <div class="search_his">
                        <button type="button" onclick="filter_history_order()">Tìm kiếm <span></span></button>
                    </div>
                </div>
            </form>
            <div class="row_3">
                <table>
                    <tr class="list">
                        <th>Mã đơn hàng</th>
                        <th>Thời gian</th>
                        <th>Tổng tiền </th>
                        <th>Trạng thái </th>
                        <th> Xem chi tiết</th>
                    </tr>
                    <?php
                    foreach ($data_page as $k => $value) {
                    ?>
                        <td class="code"><?= $value['code'] ?></td>
                        <td><?= $value['created_at'] ?></td>
                        <td><?= number_format($value['total_after']) . 'đ' ?></td>
                        <?php
                        if ($value['status'] == 0) {
                            echo '<td><span class="processing" >Chờ xử lý</span>';
                        } elseif ($value['status'] == '1') {
                            echo ' <td><span class="delivery" onclick="delivery(this)">Đang giao hàng</span></td>';
                        } elseif ($value['status'] == 2) {
                            echo ' <td><span class="status_done">Đã hoàn tất</span></td>';
                        } elseif ($value['status'] == 3) {
                            echo ' <td><span class="status">Đã hủy</span> </td>';
                        }
                        ?>
                        <!-- <td>
                            <span href="" class="done-feedback">Đánh giá</span>
                        </td> -->
                        <td>
                            <span class="show_more" onclick="return showPopup(this ,<?= $value['status'] ?> );">Xem chi tiết</span>
                        </td>


                    <?php
                    }
                    ?>
                </table>
            </div>
            <!-- <div class="date_375">
                <table>
                    <tr class="list">
                        <th>Mã ĐH</th> 
                        <th>Thời gian</th>
                        <th>Trạng thái</th>
                        <th></th>
                    </tr>
                    <tr class="data_list">
                        <th>355KCS</th>
                        <th>23/11/2021</th>
                        <th class="status">Đã hủy</th>
                        <th class="icon_data"></th>
                    </tr>
                </table>
            </div> -->
            <div class="t_paginate">
                <div class="t_paginate_group">
                    <?= $link; ?>
                </div>
            </div>
        </div>
    </div>

</div>



<div class="popup-detail" hidden>

</div>