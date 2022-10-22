<?php
// ĐƠN HÀNG ĐÃ HOÀN TẤT
$created_at = $this->Generals_model->distinct('order_dish', 'created_at', ['merchant_id' => $check_ath->id, 'status' => 2]);
foreach ($created_at as $key => $data_cr) {
    $data_total_done = $data_cr["created_at"];
    $data_created[] =  substr($data_cr["created_at"], -10, -5);

    $total_don = $this->Generals_model->get_list2('order_dish', ['created_at' => $data_total_done, 'status' => 2]);
    $total_done[] = count($total_don);
}
// ĐƠN HÀNG ĐÃ HỦY
$created_at_2 = $this->Generals_model->distinct('order_dish', 'created_at', ['merchant_id' => $check_ath->id, 'status' => 3]);
foreach ($created_at_2 as $key => $data_cr) {
    $data_total_done = $data_cr["created_at"];
    $data_created_huy[] =  substr($data_cr["created_at"], -10, -5);

    $total_don = $this->Generals_model->get_list2('order_dish', ['created_at' => $data_total_done, 'status' => 3]);
    $total_huy[] = count($total_don);
}
?>

<body>
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
                            <a href="">Thống kê</a>
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
                            <a href="/lich-su-don-hang">Lịch sử đơn hàng</a>
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
                <div class="wrap-box-right">
                    <div class="info-detail">
                        <div class="title">
                            <p class="name-title">Thống kê</p>
                        </div>
                    </div>
                    <div class="search">
                        <div class="ngay_bd">
                            <div class="title">
                                <span>Từ ngày</span>
                            </div>
                            <input type="date">
                        </div>
                        <div class="ngay_kt">
                            <div class="title">
                                <span>Đến ngày</span>
                            </div>
                            <input type="date">
                        </div>
                        <!-- <div class="month">
                            <div class="title">
                                <span>Tháng </span>
                            </div>
                            <select name="" id="">
                                <option value="">T1-T12</option>
                            </select>
                            <div class="img-select-drop-down">
                                <img src="../img/drop-down.svg" alt="">
                            </div>
                        </div>
                        <div class="year">
                            <div class="title">
                                <span>Năm </span>
                            </div>
                            <select name="" id="">
                                <option value="">2021</option>
                            </select>
                            <div class="img-select-drop-down">
                                <img src="../img/drop-down.svg" alt="">
                            </div>
                        </div> -->
                        <button class="filter">
                            <span class="name">Lọc </span>
                            <img src="../img/setting.svg" alt="Bộ lọc">
                        </button>
                    </div>
                </div>
                <div class="block-01">
                    <div class="bl01-left">
                        <div class="total-money">
                            <div class="title">
                                <img src="../img/arrow-down-red.svg" alt="">
                                <p>Tổng doanh thu</p>
                            </div>
                            <div class="content-total-money">
                                <div class="total-all-done">
                                    <div class="icon-total-done">
                                        <img src="../img/bag-tick.svg" alt="Tổng đơn đã hoàn tất">
                                    </div>
                                    <div>
                                        <p>Tổng số đơn đã hoàn tất</p>
                                        <?php
                                        $count_ht = $this->Generals_model->get_list2('order_dish', ['merchant_id' => $check_ath->id, 'status' => 2]);
                                        $count_huy = $this->Generals_model->get_list2('order_dish', ['merchant_id' => $check_ath->id, 'status' => 3]);
                                        $count_cxl = $this->Generals_model->get_list2('order_dish', ['merchant_id' => $check_ath->id, 'status' => 0]);
                                        $count = count($count_ht);
                                        $count_huy = count($count_huy);
                                        $count_cxl = count($count_cxl);
                                        ?>
                                        <span><?= $count ?></span>
                                        <input type="hidden" id="done_count" value="<?= $count ?>">
                                        <input type="hidden" id="huy_count" value="<?= $count_huy ?>">
                                        <input type="hidden" id="cxl_count" value="<?= $count_cxl ?>">
                                    </div>
                                </div>
                                <div class="total-store">
                                    <div class="icon-total-store">
                                        <img src="../img/wallet-money.svg" alt="Tổng doanh thu của cửa hàng ">
                                    </div>
                                    <div>
                                        <p>Doanh thu của cửa hàng</p>
                                        <?php
                                        $sl_dt = $this->Generals_model->get_one_where_select_ar('order_dish', 'total_after', ['merchant_id' => $check_ath->id, 'status' => 2]);
                                        $total = 0;
                                        foreach ($sl_dt as $val) {
                                            $total += (int)$val['total_after'];
                                        }
                                        ?>
                                        <span><?= number_format($total) ?> VND</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="thong-ke-detail">
                            <div class="wrap-thong-ke">
                                <div class="thong-ke-left">
                                    <img src="../img/drop-down-greensvg.svg" alt="">
                                </div>
                                <div class="thong-ke-right">
                                    <div class="name-thong-ke">
                                        Thống kê chi tiết
                                    </div>
                                    <div class="thong-ke-1">
                                        <div class="top">
                                            <img src="../img/bag-tick-done.svg" alt="Hoàn thành đơn">
                                            <span>Đơn hàng đã hoàn tất</span>
                                        </div>
                                        <div class="order-done-chart">
                                            <canvas id="line_chart" style="height: 180px;width: 100%;"></canvas>
                                        </div>
                                    </div>
                                    <div class="thong-ke-1">
                                        <div class="top">
                                            <img src="../img/bag-cross.svg" alt="Hoàn thành đơn">
                                            <span>Đơn hàng đã hủy</span>
                                        </div>
                                        <div class="order-done-chart">
                                            <canvas id="line_chart_2" style="height: 180px;width: 100%;"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bl01-right">
                        <div class="total-staus">
                            <div class="title">
                                <img src="../img/arrow-down-violet.svg" alt="">
                                <p>Trạng thái đơn hàng</p>
                            </div>
                            <div class="chart">
                                <div class="title-chart">
                                    <p>Biểu đồ</p>
                                </div>
                                <div class="menu-chart">
                                    <div class="list-chart">
                                        <div class="list-menu">
                                            <img src="../img/circle-red.svg" alt="chấm đỏ ">
                                            <span>Đã hủy </span>
                                        </div>
                                        <div class="list-menu">
                                            <img src="../img/circle-blue.svg" alt="chấm xanh biển ">
                                            <span>Xử lý </span>
                                        </div>
                                        <div class="list-menu">
                                            <img src="../img/circle-green.svg" alt="chấm xanh lõm chuối ">
                                            <span>Hoàn tất </span>
                                        </div>
                                    </div>
                                    <div class="img-chart" id="chart-container">
                                        <?php
                                        $count_total = $this->Generals_model->get_list2('order_dish', ['merchant_id' => $check_ath->id]);
                                        $count_total_all = count($count_total);
                                        ?>
                                        <div class="total"><span><?= $count_total_all ?></span></div>
                                        <canvas id="myChart" style="height: 180px;width: 180px; position: relative;"></canvas>
                                    </div>
                                </div>
                            </div>
                            <?php
                            $total_ptram = $count + $count_huy + $count_cxl;
                            $count_ptram = ($count * 100) / $total_ptram;
                            $count_huy_ptram = ($count_huy * 100) / $total_ptram;
                            $count_cxl_ptram = ($count_cxl * 100) / $total_ptram;
                            ?>
                            <div class="handling">
                                <div class="row_01">
                                    <button></button>
                                </div>
                                <div class="row_02">
                                    <div class="content">
                                        <span class="sp1">Đơn hàng đang xử lý</span>
                                        <span class="sp2"><?= round($count_cxl_ptram, 1) ?>% </span>
                                        <!-- <span class="sp2"> trong tháng</span> -->
                                    </div>
                                    <div class="line"></div>
                                </div>
                            </div>
                            <div class="cancelled">
                                <div class="row_01">
                                    <button></button>
                                </div>
                                <div class="row_02">
                                    <div class="content">
                                        <span class="sp1">Đơn hàng đã hủy</span>
                                        <span class="sp2"><?= round($count_huy_ptram, 1) ?>% </span>
                                        <!-- <span class="sp2"> trong tháng</span> -->
                                    </div>
                                    <div class="line2"></div>
                                </div>
                            </div>
                            <div class="completed">
                                <div class="row_01">
                                    <button></button>
                                </div>
                                <div class="row_02">
                                    <div class="content">
                                        <span class="sp1">Đơn hàng đã hoàn tất</span>
                                        <span class="sp2"><?= round($count_ptram, 1) ?>% </span>
                                        <!-- <span class="sp2"> trong tháng</span> -->
                                    </div>
                                    <div class="line3"></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="script/js_cdn/chart.min.js"></script>
    <script src="script/js_cdn/chart_3.8.min.js"></script>
    <script>
        var done_count = document.getElementById('done_count').value;
        var huy_count = document.getElementById('huy_count').value;
        var cxl_count = document.getElementById('cxl_count').value;
        var data_created = <?php echo json_encode($data_created); ?>;
        var total_done = <?php echo json_encode($total_done); ?>;

        var data_created_huy = <?php echo json_encode($data_created_huy); ?>;
        var total_huy = <?php echo json_encode($total_huy); ?>;

        var ctx = document.getElementById('myChart').getContext('2d');
        var line = document.getElementById('line_chart').getContext('2d');
        var line2 = document.getElementById('line_chart_2').getContext('2d');


        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                // labels: ["Đã hủy","Đã nhận","Đang xử lý"],
                datasets: [{
                    label: ["Đã hủy", "Đã nhận", "Đang xử lý"],
                    data: [huy_count, done_count, cxl_count],
                    backgroundColor: ["#FF837C", "#88E877", "#748EEC"],
                    doughnutHoleSize: 1
                }, ]
            }
        });
        var myChart = new Chart(line, {
            type: 'line',
            data: {
                labels: data_created,
                datasets: [{
                    label: '',
                    data: total_done,
                    backgroundColor: [
                        '#88E877'
                    ],
                    borderColor: [
                        '#88E877'
                    ],
                    borderWidth: 1
                }, ]
            }
        });
        var myChart = new Chart(line2, {
            type: 'line',
            data: {
                labels: data_created_huy,
                datasets: [{
                    label: '',
                    data: total_huy,
                    backgroundColor: [
                        "#FF837C"
                    ],
                    borderColor: [
                        "#FF837C"
                    ],
                    borderWidth: 1
                }, ]
            }
        });
    </script>