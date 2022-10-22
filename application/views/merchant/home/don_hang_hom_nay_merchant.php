
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
                            <a href="thong-ke">Thống kê</a>
                        </div>
                    </div>
                    <div class="update-address ">
                        <div class="wrap">
                            <img src="../img/status-up.svg" alt="Cập nhật địa chỉ ">
                            <a href="">Đơn hàng hôm nay</a>
                        </div>
                    </div>
                    <div class="store-save">
                        <div class="wrap">
                            <img src="../img/bag-tick_list.svg" alt="Quán ăn đã lưu">
                            <a href="lich-su-don-hang">Lịch sử đơn hàng</a>
                        </div>
                    </div>
                    <div class="admin_profile">
                        <div class="wrap">
                            <img src="../img/edit.svg" alt="Quán ăn đã lưu">
                            <a href="ho-so-quan-an">Quản lý hồ sơ</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="box-right">
                <div class="row_1">
                    <h2>Đơn hàng hôm nay</h2>
                </div>
                <div id="form1">
                    <!-- Đơn hàng đang xử lý màn nhỏ -->
                    <div class="row_2">
                        <div class="drop_item_01" id="drop_item_01">
                          <div class="item_01">
                              <div class="icon_01"></div>
                              <div class="content">
                                  <h2>Đơn hàng đang xử lý</h2>
                                  <?php
                                  $count_order_0 =  $this->Generals_model->get_list2('order_dish', ['merchant_id' => $check_ath->id, 'status' => 0]);
                                  $count_order_1 =  $this->Generals_model->get_list2('order_dish', ['merchant_id' => $check_ath->id, 'status' => 1]);
                                  $count_order_2 =  $this->Generals_model->get_list2('order_dish', ['merchant_id' => $check_ath->id, 'status' => 2]);
                                  $count_order_3 =  $this->Generals_model->get_list2('order_dish', ['merchant_id' => $check_ath->id, 'status' => 3]);
                                    $total_0_1 = count($count_order_0) + count($count_order_1);
                                  ?>
                                  <span><?php echo $total_0_1?></span><span>đơn</span>
                              </div>
                          </div>
                          <div class="drop_table_item_01">
                              <table>
                              
                                  <tr class="list">
                                      <th>Mã ĐH</th>
                                      <th>Thời gian</th>
                                      <th>Trạng thái</th>
                                      <th></th>
                                  </tr>
                                  <?php
                                foreach($data_order as $key => $order){
                                ?>
                                  <?php
                                  if($order["status"] == 0){
                                  ?>
                                  <tr class="data_list">
                                      <th><?= $order["id"]?></th>
                                      <th><?= $order["created_at"]?></th>
                                      <th class="#FBAD2B">Chờ xử lý</th>
                                      <th class="icon_data" id="popup-btn-giaoing2"></th>
                                  </tr>
                                  <?php
                                    }
                                    elseif ($order["status"] == 1) {
                                    ?>
                                    <tr class="data_list">
                                      <th><?= $order["id"]?></th>
                                      <th><?= $order["created_at"]?></th>
                                      <th class="#4C5BD4">Đang giao</th>
                                      <th class="icon_data" id="popup-btn-giaoing2"></th>
                                  </tr>
                                    <?php
                                    }
                                    ?>
                                    <?php
                                    }
                                    ?>
                              </table>
                          </div>
                        </div>    
                          <div class="drop_item_02" id="drop_item_02">
                              <div class="item_02">
                                  <div class="icon_02"></div>
                                  <div class="content">
                                      <h2>Đơn hàng đã hoàn tất</h2>
                                      <span><?php echo count($count_order_2)?></span><span>đơn</span>
                                  </div>
                              </div>
                          </div>
                          <div class="drop_item_03" id="drop_item_03">
                              <div class="item_03">
                                  <div class="icon_03"></div>
                                  <div class="content">
                                      <h2>Đơn hàng đã hủy</h2>
                                      <span><?php echo count($count_order_3)?></span><span>đơn</span>
                                  </div>
                              </div>
                          </div>
                      </div>

                      <!-- Đơn hàng chờ xử lý -->

                      <div class="row_3">
                          <table>
                              <tr class="list">
                                  <th>Mã đơn hàng</th>
                                  <th>Thời gian</th>
                                  <th>Tổng tiền</th>
                                  <th class="dis">Khuyến mãi</th>
                                  <th>Trạng thái</th>
                                  <th></th>
                              </tr>
                    <?php
                    foreach($data_order as $key => $order){
                    ?>
                              <?php
                                  if($order["status"] == 0){
                                  ?>
                                  <tr class="data_list">
                                      <th class="code_xu_ly"><?= $order["code"]?></th>
                                      <th><?= $order["created_at"]?></th>
                                      <th class="font"><?= number_format($order["total_after"])?>đ</th>
                                      <th class="font dis"><?= number_format($order["sale"])?>Đ</th>
                                      <th class="#FBAD2B">Chờ xử lý</th>
                                      <input type="hidden" id="name_merchant" value="<?= $check_ath->name_merchant?>">
                                      <?php
                                      $data_city = $this->Generals_model->get_one_where('city2', ['cit_id' => $check_ath->id_city]);
                                      ?>
                                      <input type="hidden" id="address_merchant" value="<?= $check_ath->address?>, <?= $data_city->cit_name?>">
                                      <th class="show_more"><button onclick="return popup_cho_xuly(this ,<?= $order['id'] ?> );">Xem chi tiết</button></th>
                                  </tr>
                                  <?php
                                    }
                                    elseif ($order["status"] == 1) {
                                    ?>
                                    <tr class="data_list">
                                      <th class="code_dang_giao"><?= $order["code"]?></th>
                                      <th><?= $order["created_at"]?></th>
                                      <th class="font"><?= number_format($order["total_after"])?>đ</th>
                                      <th class="font dis"><?= number_format($order["sale"])?>Đ</th>
                                      <th class="#4C5BD4">Đang giao</th>
                                      <th class="show_more"><button onclick="return showPopup_dang_giao(this ,<?= $order['status'] ?> );">Xem chi tiết</button></th>
                                  </tr>
                                    <?php
                                    }
                                    ?>
                    <?php
                    }
                    ?>
                          </table>
                      </div>
                </div>
                <div id="form2">
                    <div class="row_2a">
                        <div class="drop_item_01" id="drop_item_01a">
                          <div class="item_01">
                              <div class="icon_01"></div>
                              <div class="content">
                                  <h2>Đơn hàng đang xử lý</h2>
                                  <span><?php echo $total_0_1?></span><span>đơn</span>
                              </div>
                          </div>
                        </div>  
                        <!-- Đơn hàng đã hoàn tất màn nhỏ-->  
                          <div class="drop_item_02" id="drop_item_02a">
                              <div class="item_02">
                                  <div class="icon_02"></div>
                                  <div class="content">
                                      <h2>Đơn hàng đã hoàn tất</h2>
                                      <span><?php echo count($count_order_2)?></span><span>đơn</span>
                                  </div>
                              </div>
                              <div class="drop_table_item_02">
                                  <table>
                                      <tr class="list">
                                          <th>Mã ĐH</th>
                                          <th>Thời gian</th>
                                          <th>Trạng thái</th>
                                          <th></th>
                                      </tr>
                    <?php
                    foreach($data_order as $key => $order){
                        if($order["status"] == 2){
                    ?>
                            <tr class="data_list">
                                <th><?= $order["id"]?></th>
                                <th><?= $order["created_at"]?></th>
                                <th class="#68BB59">Hoàn tất</th>
                                <th class="icon_data" id="hoan_tat2"></th>
                            </tr>
                        <?php
                        }
                        ?>
                    <?php
                    }
                    ?>
                                  </table>
                              </div>
                          </div>
                          <div class="drop_item_03" id="drop_item_03a">
                              <div class="item_03">
                                  <div class="icon_03"></div>
                                  <div class="content">
                                      <h2>Đơn hàng đã hủy</h2>
                                      <span><?php echo count($count_order_3)?></span><span>đơn</span>
                                  </div>
                              </div>
                          </div>
                      </div>

                      <!-- Đơn hàng đã hoàn tất -->

                    <div class="row_3a">
                        <table>
                            <tr class="list">
                                <th>Mã đơn hàng</th>
                                <th>Thời gian</th>
                                <th>Tổng tiền</th>
                                <th class="dis">Khuyến mãi</th>
                                <th>Trạng thái</th>
                                <th></th>
                            </tr>
                    <?php
                    foreach($data_order as $key => $order){
                        if($order["status"] == 2){
                    ?>
                            <tr class="data_list">
                                <th class="code"><?= $order["code"]?></th>
                                <th><?= $order["created_at"]?></th>
                                <th class="font"><?= $order["total_after"]?>đ</th>
                                <th class="font dis"><?= $order["sale"]?>Đ</th>
                                <th class="#68BB59">Hoàn tất</th>
                                <input type="hidden" id="code_id_done" value="<?= $order["code"]?>">
                                <th class="show_more"><button type="button" onclick="return showPopup_done(this ,<?= $order['status'] ?> );">Xem chi tiết</button></th>
                            </tr>
                        <?php
                        }
                        ?>
                    <?php
                    }
                    ?>
                        </table>
                    </div>
                </div>
                <div id="form3">
                    <div class="row_2b">
                        <div class="drop_item_01" id="drop_item_01b">
                          <div class="item_01">
                              <div class="icon_01"></div>
                              <div class="content">
                                  <h2>Đơn hàng đang xử lý</h2>
                                  <span><?php echo $total_0_1?></span><span>đơn</span>
                              </div>
                          </div>
                        </div>    
                          <div class="drop_item_02" id="drop_item_02b">
                              <div class="item_02">
                                  <div class="icon_02"></div>
                                  <div class="content">
                                      <h2>Đơn hàng đã hoàn tất</h2>
                                      <span><?php echo count($count_order_2)?></span><span>đơn</span>
                                  </div>
                              </div> 
                          </div>
                          <!-- Đơn hàng đã hủy màn nhỏ -->
                          <div class="drop_item_03" id="drop_item_03b">
                              <div class="item_03">
                                  <div class="icon_03"></div>
                                  <div class="content">
                                      <h2>Đơn hàng đã hủy</h2>
                                      <span><?php echo count($count_order_3)?></span><span>đơn</span>
                                  </div>
                              </div>
                              <div class="drop_table_item_03">
                                  <table>
                                      <tr class="list">
                                          <th>Mã ĐH</th>
                                          <th>Thời gian</th>
                                          <th>Trạng thái</th>
                                          <th></th>
                                      </tr>
                    <?php
                    foreach($data_order as $key => $order){
                        if($order["status"] == 3){
                    ?>
                            <tr class="data_list">
                                <th><?= $order["id"]?></th>
                                <th><?= $order["created_at"]?></th>
                                <th class="status">Đã hủy</th>
                                <th class="icon_data" id="da_huy2"></th>
                            </tr>
                        <?php
                        }
                        ?>
                    <?php
                    }
                    ?>
                                  </table>
                              </div>
                          </div>
                      </div>

                      <!-- Đơn hàng đã hủy -->

                    <div class="row_3b">
                        <table>
                            <tr class="list">
                                <th>Mã đơn hàng</th>
                                <th>Thời gian</th>
                                <th>Tổng tiền</th>
                                <th class="dis">Khuyến mãi</th>
                                <th>Trạng thái</th>
                                <th></th>
                            </tr>
                    <?php
                    var_dump($data_order);
                    foreach($data_order as $key => $order){
                        if($order["status"] == 3){  
                    ?> 
                            <tr class="data_list">
                                <th class="code_huy"><?= $order["code"]?></th>
                                <th><?= $order["created_at"]?></th>
                                <th class="font"><?= $order["total_after"]?>đ</th>
                                <th class="font dis"><?= $order["sale"]?>Đ</th>
                                <th class="status">Đã hủy</th>
                                <th class="show_more"><button onclick="return showPopup_huy(this ,<?= $order['status'] ?> );">Xem chi tiết</button></th>
                            </tr>
                        <?php
                        }
                        ?>
                    <?php
                    }
                    ?>
                        </table>
                    </div>
                </div>
                <div class="row_4">
                    <div class="total_done">
                        <div class="icon_total"></div>
                        <div class="content">
                            <h2>Tổng số đơn đã hoàn tất</h2>
                            <?php
                            if($data_order != NULL){
                                $data_order2 = $this->Generals_model->get_where('order_dish', ['merchant_id' => $order["merchant_id"], 'status' => 2]);
                                $count = count($data_order2);
                            }
                            ?>
                            <span>
                            <?php 
                            if($data_order != NULL){
                                echo $count;
                            }
                            else{
                                echo 0;
                            }
                            ?>
                            </span>
                        </div>
                    </div>
                    <div class="turnover">
                        <div class="icon_turnover"></div>
                        <div class="content">
                            <h2>Doanh thu của cửa hàng</h2>
                            <?php
                            if($data_order != NULL){
                                $data_order3 = $this->Generals_model->get_one_where_select_ar('order_dish','total_after', ['merchant_id' => $order["merchant_id"], 'status' => 2]);
                                $total = 0;
                                foreach ($data_order3 as $val) {
                                    $total += (int)$val['total_after'];
                                }
                            }
                            ?>
                            <span>
                            <?php 
                            if($data_order != NULL){
                                echo number_format($total);
                            }
                            else{
                                echo 0;
                            }
                            ?>
                             VND</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="popup" id="popup">
                <div class="popup_cancel">
                    <div class="title">
                        <h2>Chi tiết đơn hàng bị hủy</h2>
                        <span class="close-btn" id="close_da_huy">×</span>
                    </div>
                    <div class="content">
                        <div class="fet_01">
                            <div class="map">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d7838.684254869503!2d106.70676642475235!3d10.785086936675276!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1547181657956" width="100%" height="420" frameborder="0" style="border:0; border-radius: 20px;"
                                            allowfullscreen></iframe>
                            </div>
                            <div class="dan_duong">
                                <div class="add_dd">
                                    <div class="icon_dd"></div>
                                    <div class="ct_dd">
                                        <div class="add_01">
                                            <h2>Sườn nướng BBQ - Sườn Mười </h2>
                                            <span>264 Hoàng Văn Thái, 562 Trần Khát Chân, Hà Nội</span>
                                        </div>
                                        <div class="add_02">
                                            <h2>Đặng Diệp Thảo</h2>
                                            <span>264 Hoàng Văn Thái, 562 Trần Khát Chân, Hà Nội</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="khoang_cach">
                                    <span>Khoảng cách: </span><span style="color: red;"> 2.4 </span><span style="color: red;"> km</span>
                                </div>
                            </div>
                        </div>
                        <div class="fet_02">
                            <h2>Chi tiết đơn hàng</h2>
                            <div class="list_moned">
                                <div class="mon_01">
                                    <div class="stt">1</div>
                                    <div class="name">Combo Family - Plus</div>
                                    <div class="gia">546.000<span>đ</span></div>
                                </div>
                            </div>
                            <div class="bill">
                                <div class="tit_bill">
                                    <span>Tổng <span style="font-weight: 500;"> 4 </span> suất</span>
                                    <span>Phí ship</span>
                                    <span>Khuyến mại</span>
                                    <span>Giảm thêm</span>
                                </div>
                                <div class="gia_bill">
                                    <span>2.184.000đ</span>
                                    <span>20.000đ</span>
                                    <span style="color: red;">-25<span style="color: red;">%</span></span>
                                    <span>200.000đ</span>
                                </div>
                            </div>
                            <div class="total_bill">
                                <span>Tổng tiền:</span>
                                <a>1.453.000đ</a>
                            </div>
                            <div class="detail">
                                <span>Chi tiết: <span>Không dùng đồ nhựa/Xin thêm thìa đũa</span></span>
                                <div class="ly_do">
                                    <b>Lý do hủy đơn:</b> <a>Đơn hủy do nhà hàng hay đơn hủy do khách hàng</a>
                                </div>
                            </div>
                            <div class="xac_nhan">
                                <button id="done_da_huy">Xác nhận</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="popup_02" id="popup_02">
                <!-- <div class="popup_complete">
                    <div class="title">
                        <h2>Chi tiết đơn hàng đã hoàn tất</h2>
                        <span class="close-btn-com" id="close_hoan_tat">×</span>
                    </div>
                    <div class="content">
                        <div class="fet_01">
                            <div class="map">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d7838.684254869503!2d106.70676642475235!3d10.785086936675276!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1547181657956" width="100%" height="420" frameborder="0" style="border:0; border-radius: 20px;"
                                            allowfullscreen></iframe>
                            </div>
                            <div class="dan_duong">
                                <div class="add_dd">
                                    <div class="icon_dd"></div>
                                    <div class="ct_dd">
                                        <div class="add_01">
                                            <h2>Sườn nướng BBQ - Sườn Mười </h2>
                                            <span>264 Hoàng Văn Thái, 562 Trần Khát Chân, Hà Nội</span>
                                        </div>
                                        <div class="add_02">
                                            <h2>Đặng Diệp Thảo</h2>
                                            <span>264 Hoàng Văn Thái, 562 Trần Khát Chân, Hà Nội</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="khoang_cach">
                                    <span>Khoảng cách: </span><span style="color: red;"> 2.4 </span><span style="color: red;"> km</span>
                                </div> 
                            </div>
                        </div>
                        <div class="fet_02">
                            <h2>Chi tiết đơn hàng</h2>
                            <div class="list_moned">
                                <div class="mon_01">
                                    <div class="stt">1</div>
                                    <div class="name">Combo Family - Plus</div>
                                    <div class="gia">546.000<span>đ</span></div>
                                </div>
                            </div>
                            <div class="bill">
                                <div class="tit_bill">
                                    <span>Tổng <span style="font-weight: 500;"> 4 </span> suất</span>
                                    <span>Phí ship</span>
                                    <span>Khuyến mại</span>
                                    <span>Giảm thêm</span>
                                </div>
                                <div class="gia_bill">
                                    <span>2.184.000đ</span>
                                    <span>20.000đ</span>
                                    <span style="color: red;">-25<span style="color: red;">%</span></span>
                                    <span>200.000đ</span>
                                </div>
                            </div>
                            <div class="total_bill">
                                <span>Tổng tiền:</span>
                                <a>1.453.000đ</a>
                            </div>
                            <div class="done">
                                <span>Đơn hàng được giao thành công !</span>
                            </div>
                            <div class="xac_nhan">
                                <button id="done_hoan_tat">Xác nhận</button>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
  
            <div class="popup_03" id="popup_03">
                <!-- <div class="popup_dang_giao">
                    <div class="title">
                        <h2>Xác nhận đơn giao</h2>
                        <span class="close-dang-giao" id="close-dang-giao">×</span>
                    </div>
                    <div class="content">
                        <div class="fet_01">
                            <div class="map">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d7838.684254869503!2d106.70676642475235!3d10.785086936675276!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1547181657956" width="100%" height="420" frameborder="0" style="border:0; border-radius: 20px;"
                                            allowfullscreen></iframe>
                            </div>
                            <div class="dan_duong">
                                <div class="add_dd">
                                    <div class="icon_dd"></div>
                                    <div class="ct_dd">
                                        <div class="add_01">
                                            <h2>Sườn nướng BBQ - Sườn Mười </h2>
                                            <span>264 Hoàng Văn Thái, 562 Trần Khát Chân, Hà Nội</span>
                                        </div>
                                        <div class="add_02">
                                            <h2>Đặng Diệp Thảo</h2>
                                            <span>264 Hoàng Văn Thái, 562 Trần Khát Chân, Hà Nội</span>
                                            <h3>Thay đổi địa chỉ</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="khoang_cach">
                                    <span>Khoảng cách: </span><span style="color: red;"> 2.4 </span><span style="color: red;"> km</span>
                                </div>
                            </div>
                        </div>
                        <div class="fet_02">
                            <h2>Chi tiết đơn hàng</h2>
                            <div class="list_moned">
                                <div class="mon_01">
                                    <div class="stt">1</div>
                                    <div class="name">Combo Family - Plus</div>
                                    <div class="gia">546.000<span>đ</span></div>
                                </div>
                            </div>
                            <div class="bill">
                                <div class="tit_bill">
                                    <span>Tổng <span style="font-weight: 500;"> 4 </span> suất</span>
                                    <span>Phí ship</span>
                                    <span>Khuyến mại</span>
                                    <span>Giảm thêm</span>
                                </div>
                                <div class="gia_bill">
                                    <span>2.184.000đ</span>
                                    <span>20.000đ</span>
                                    <span style="color: red;">-25<span style="color: red;">%</span></span>
                                    <span>200.000đ</span>
                                </div>
                            </div>
                            <div class="total_bill">
                                <span>Tổng tiền:</span>
                                <a>1.453.000đ</a>
                            </div>
                            <div class="detail">
                                <span>Chi tiết: <span>Không dùng đồ nhựa/Xin thêm thìa đũa</span></span>
                                <div class="ly_do">
                                    <a>Thêm lưu ý cho người bán ( Ví dụ không dùng đồ nhựa,...)</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="xac_nhan">
                        <button class="not_done">Giao hàng không thành công</button>
                        <button class="done" id="popup-close">Giao hàng thành công</button>
                    </div>
                </div> -->
            </div>
            <div class="popup_04" id="popup_04">
                <!-- <div class="popup_cho_xuly">
                    <div class="title">
                        <h2>Xác nhận đơn hàng</h2>
                        <span class="close-cho-xuly" id="close-cho-xuly">×</span>
                    </div>
                    <div class="content">
                        <div class="fet_01">
                            <div class="map">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d7838.684254869503!2d106.70676642475235!3d10.785086936675276!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1547181657956" width="100%" height="420" frameborder="0" style="border:0; border-radius: 20px;"
                                            allowfullscreen></iframe>
                            </div>
                            <div class="dan_duong">
                                <div class="add_dd">
                                    <div class="icon_dd"></div>
                                    <div class="ct_dd">
                                        <div class="add_01">
                                            <h2>Sườn nướng BBQ - Sườn Mười </h2>
                                            <span>264 Hoàng Văn Thái, 562 Trần Khát Chân, Hà Nội</span>
                                        </div>
                                        <div class="add_02">
                                            <h2>Đặng Diệp Thảo</h2>
                                            <span>264 Hoàng Văn Thái, 562 Trần Khát Chân, Hà Nội</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="khoang_cach">
                                    <span>Khoảng cách: </span><span style="color: red;"> 2.4 </span><span style="color: red;"> km</span><br>
                                    <button class="shipper" id="shipper">Thêm thông tin shipper</button>
                                </div>
                            </div>
                        </div>
                        <div class="fet_02">
                            <h2>Chi tiết đơn hàng</h2>
                            <div class="list_moned">
                                <div class="mon_01">
                                    <div class="stt">1</div>
                                    <div class="name">Combo Family - Plus</div>
                                    <div class="gia">546.000<span>đ</span></div>
                                </div>
                            </div>
                            <div class="bill">
                                <div class="tit_bill">
                                    <span>Tổng <span style="font-weight: 500;"> 4 </span> suất</span>
                                    <span>Phí ship</span>
                                    <span>Khuyến mại</span>
                                    <span>Giảm thêm</span>
                                </div>
                                <div class="gia_bill">
                                    <span id="total_before_pop">đ</span>
                                    <span>20.000đ</span>
                                    <span style="color: red;" id="sale_pop"><span style="color: red;">%</span></span>
                                    <span>200.000đ</span>
                                </div>
                            </div>
                            <div class="total_bill">
                                <span>Tổng tiền:</span>
                                <a>1.453.000đ</a>
                            </div>
                            <div class="detail">
                                <div class="ly_do">
                                    <a id="note_pop"></a>
                                </div>
                            </div>
                            <div class="xac_nhan">
                                <button class="not_done" id="not_done">Hủy đơn</button>
                                <button class="done" id="xac_nhan">Xác nhận đơn hàng</button>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
            <div class="popup_huy" id="popup_huy">
                <!-- <div class="popup_huy_don">
                    <div class="tit_huy">
                        <div class="icon"></div>
                        <h2>Lý do hủy đơn</h2>
                    </div>
                    <div class="select_lydo">
                        <span>Chọn lý do báo cáo:</span>
                        <select name="" id="">
                            <option value="">Nhà hàng hết nguyên liệu</option>
                            <option value="">Món này đã bán hết</option>
                            <option value="">Nhà hàng không bán hàng hôm nay</option>
                            <option value="">Nhà hàng đã đóng cửa</option>
                            <option value="">Nhà hàng trong khu vực phong tỏa</option>
                        </select>
                    </div>
                    <div class="lydo_more">
                        <span>Lý do khác:</span>
                        <textarea name="" id="" cols="60%" rows="5%" placeholder="Nhập lý do khác..."></textarea>
                    </div>
                    <div class="canh_bao">
                        <span>Lưu ý! Nếu bạn hủy đơn quá nhiều lần trong tuần hệ thống sẽ hạn chế đơn hàng của bạn</span>
                    </div>
                    <div class="action">
                        <button class="huy" id="huy_lydo">Hủy</button>
                        <button class="luu" id="huy_done">Lưu</button>
                    </div>
                </div> -->
            </div>
            <div class="popup_succes" id="popup_succes">
                <!-- <div class="popup_sc_don">
                    <div class="gif_succes">
                        <div class="gif"></div>
                        <h2>Bạn đã xác nhận đơn thành công</h2>
                    </div>
                    <div class="dan_duong">
                        <div class="add_dd">
                            <div class="icon_dd"></div>
                            <div class="ct_dd">
                                <div class="add_01">
                                    <h2>Sườn nướng BBQ - Sườn Mười </h2>
                                    <span>264 Hoàng Văn Thái, 562 Trần Khát Chân, Hà Nội</span>
                                </div>
                                <div class="add_02">
                                    <h2>Đặng Diệp Thảo</h2>
                                    <span>264 Hoàng Văn Thái, 562 Trần Khát Chân, Hà Nội</span>
                                </div>
                            </div>
                        </div>
                        <div class="khoang_cach">
                            <span>Khoảng cách: </span><span style="color: red;"> 2.4 </span><span style="color: red;"> km</span><br>
                        </div>
                    </div>
                    <div class="fet_02">
                        <h2>Chi tiết đơn hàng</h2>
                        <div class="list_moned">
                            <div class="mon_01">
                                <div class="stt">1</div>
                                <div class="name">Combo Family - Plus</div>
                                <div class="gia">546.000<span>đ</span></div>
                            </div>
                        </div>
                        <div class="bill">
                            <div class="tit_bill">
                                <span>Tổng <span style="font-weight: 500;"> 4 </span> suất</span>
                                <span>Phí ship</span>
                                <span>Khuyến mại</span>
                                <span>Giảm thêm</span>
                            </div>
                            <div class="gia_bill">
                                <span>2.184.000đ</span>
                                <span>20.000đ</span>
                                <span style="color: red;">-25<span style="color: red;">%</span></span>
                                <span>200.000đ</span>
                            </div>
                        </div>
                        <div class="total_bill">
                            <span>Tổng tiền:</span>
                            <a>1.453.000đ</a>
                        </div>  
                    </div>
                    <div class="popup_succes_done">
                        <button id="xac_nhan_done">Xác nhận</button>
                    </div>
                </div> -->
            </div>
            <div class="popup_no" id="popup_no">
                <!-- <div class="popup_huy_don">
                    <div class="gif_huy">
                        <div class="gif"></div>
                        <h2>Hủy đơn thành công</h2>
                    </div>
                    <div class="dan_duong">
                        <div class="add_dd">
                            <div class="icon_dd"></div>
                            <div class="ct_dd">
                                <div class="add_01">
                                    <h2>Sườn nướng BBQ - Sườn Mười </h2>
                                    <span>264 Hoàng Văn Thái, 562 Trần Khát Chân, Hà Nội</span>
                                </div>
                                <div class="add_02">
                                    <h2>Đặng Diệp Thảo</h2>
                                    <span>264 Hoàng Văn Thái, 562 Trần Khát Chân, Hà Nội</span>
                                </div>
                            </div>
                        </div>
                        <div class="khoang_cach">
                            <span>Khoảng cách: </span><span style="color: red;"> 2.4 </span><span style="color: red;"> km</span><br>
                        </div>
                    </div>
                    <div class="fet_02">
                        <h2>Chi tiết đơn hàng</h2>
                        <div class="list_moned">
                            <div class="mon_01">
                                <div class="stt">1</div>
                                <div class="name">Combo Family - Plus</div>
                                <div class="gia">546.000<span>đ</span></div>
                            </div>
                        </div>
                        <div class="bill">
                            <div class="tit_bill">
                                <span>Tổng <span style="font-weight: 500;"> 4 </span> suất</span>
                                <span>Phí ship</span>
                                <span>Khuyến mại</span>
                                <span>Giảm thêm</span>
                            </div>
                            <div class="gia_bill">
                                <span>2.184.000đ</span>
                                <span>20.000đ</span>
                                <span style="color: red;">-25<span style="color: red;">%</span></span>
                                <span>200.000đ</span>
                            </div>
                        </div>
                        <div class="total_bill">
                            <span>Tổng tiền:</span>
                            <a>1.453.000đ</a>
                        </div>  
                    </div>
                    <div class="popup_no_done">
                        <button id="xac_nhan_huy">Xác nhận</button>
                    </div>
                </div> -->
            </div>
            <div class="popup_shipper" id="popup_shipper">
                <!-- <div class="infor_shipper">
                    <div class="infor">
                        <h2>Thêm thông tin shipper</h2>
                        <span class="h2">Vui lòng nhập đủ các trường thông tin !</span>
                        <div class="name_ship">
                            <span>Họ và tên<span style="color: red;">*</span><span id="error_message_name"></span></span>
                            <input type="text" placeholder="Nhập họ và tên" id="name">
                        </div>
                        <div class="phone">
                            <span>Số điện thoại<span style="color: red;">*</span><span id="error_message_sdt"></span></span>
                            <input type="number" placeholder="Nhập số điện thoại" id="phone">
                        </div>
                        <div class="action">
                            <button class="back" id="back_shipper">Quay lại</button>
                            <button class="save" type="button" onclick="return form_validate_shipper()">Lưu</button>
                        </div>
                    </div>
                    <div class="banner_ship">
                        <div class="close"><span class="close-btn" id="close_shipper">×</span></div>
                        <div class="banner"></div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>



              
<div class="popup-detail" hidden>

</div>