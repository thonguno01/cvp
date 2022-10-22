
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard 2</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="/css/cdn_css/cdn_select2.css">
  <style>
      .input {
            width: 100%;
            height: 45px;
            display: flex;
            align-items: center;
            margin-bottom: 1%;
        }
        .input span {
            width: 20%;
        }
        .input input, .input select{
            width: 40%;
            height: 90%;
            border-radius: 10px;
            border: none;
            padding-left: 2%;
        }
        .input.text {
            height: 100%;
        }
        .input.text textarea {
            width: 40%;
            border-radius: 10px;
            padding: 1% 2%;
        }
        .input.time select {
            width: 20%;
            height: 80%;
        }
        .select2-container--default .select2-selection--single {
            background-color: #fff;
            border: 1px solid #aaa;
            border-radius: 4px;
            width: 100%;
            height: 100%;
            border-radius: 10px;
        }
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            width: 100%;
            color: #444;
            line-height: 28px;
        }
        .input button {
            width: 10%;
            height: 100%;
            border: none;
            border-radius: 10px;
            background: cornflowerblue;
            color: #ffffff;
        }
        span.error_message {
            color: red;
            font-style: italic;
            font-size: 14px;
            padding-left: 6%;
        }
  </style>
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start --> 
            <div class="media">
              <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        
      </li>
      <li class="nav-item">
        
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <?php
                $email = $this->session->userdata('email');
                $data_admin =  $this->Generals_model->get_one_where('admin', ['email' => $email]);
            ?>
          <a href="#" class="d-block"><?= $data_admin->name?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
 

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            
            <ul class="nav nav-treeview">

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-users"></i>
              <p>
                Quản lý người dùng
                <i class="fas fa-angle-left right"></i>
               
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin-list-merchant" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách cửa hàng</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin-list-customer" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách khách hàng</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/administrators" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách ADMIN</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
              <a href="#" class="nav-link">
                  <i class="fas fa-copy"></i>
                  <p>
                      Quản lý Đăng ký lỗi
                      <i class="fas fa-angle-left right"></i>

                  </p>
              </a>
              <ul class="nav nav-treeview">
                  <li class="nav-item">
                      <a href="/list-customer-error" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Danh sách khách hàng</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="/list-merchant-error" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Danh sách cửa hàng</p>
                      </a>
                  </li>
              </ul>
          </li>
          <li class="nav-item">
              <a href="#" class="nav-link">
                  <i class="fas fa-inbox"></i>
                  <p>
                      Quản lý Đơn hàng
                      <i class="fas fa-angle-left right"></i>

                  </p>
              </a>
              <ul class="nav nav-treeview">
                  <li class="nav-item">
                      <a href="/admin-list-user-order" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Danh sách người đặt hàng</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="/admin-list-order" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Danh sách order</p>
                      </a>
                  </li>
              </ul>
          </li>
          <li class="nav-item">
              <a href="#" class="nav-link">
                  <i class="fas fa-edit"></i>
                  <p>
                      Quản lý bài viết
                      <i class="fas fa-angle-left right"></i>

                  </p>
              </a>
              <ul class="nav nav-treeview">
                  <li class="nav-item">
                      <a href="/post-merchant" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Bài đăng của cửa hàng</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="/admin-post" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Sale đăng quảng cáo</p>
                      </a>
                  </li>
              </ul>
          </li>
          <li class="nav-item">
              <a href="#" class="nav-link">
                  <i class="fas fa-bullhorn"></i>
                  <p>
                      Quản lý Voucher
                      <i class="fas fa-angle-left right"></i>

                  </p>
              </a>
              <ul class="nav nav-treeview">
                  <li class="nav-item">
                      <a href="/voucher-merchant" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Voucher của cửa hàng</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="/voucher-sale" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Voucher của Sale</p>
                      </a>
                  </li>
              </ul>
          </li>
          <li class="nav-item">
            <a href="logout-admin" class="nav-link">
              <i class="fas fa-power-off"></i>
              <p>
                Đăng xuất
              </p>
            </a>
            
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <?php
            $data =  $this->Generals_model->get_one_where('merchant', ['id' => $id]);
            ?>
            <h1 class="m-0">Sửa quán ăn </h1><h2 style="color: red;"><?= $data->name_merchant?> : <?= $data->email?></h2>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin-index">Home</a></li>
              <li class="breadcrumb-item active">Sửa quán ăn</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <form action="">
            <div class="input">
                <span>Tên chủ quán</span>
                <input type="text" id="name" placeholder="Nhập tên chủ quán" value="<?= $data->name?>">
                <span id="error_name"></span>
            </div>
            <div class="input">
                <span>Tên quán ăn</span>
                <input type="text" id="name_merchant" placeholder="Nhập tên quán ăn" value="<?= $data->name_merchant?>">
                <span id="error_name_mer"></span>
            </div>
            <div class="input">
                <span>Loại đồ ăn đặc trưng</span>
                <input type="text" id="typical_food" placeholder="Nhập loại đồ ăn đặc trưng" value="<?= $data->typical_food?>">
                <span id="error_type"></span>
            </div>
            <div class="input">
                <span>Số điện thoại</span>
                <input type="number" id="phone" placeholder="Nhập SĐT" value="<?= $data->phone?>">
                <span id="error_phone"></span>
            </div>
            <?php
            $city =  $this->Generals_model->get_one_where('city2', ['cit_id' => $data->id_city]);
            $district =  $this->Generals_model->get_one_where('city2', ['cit_id' => $data->id_district]);
            ?>
            <div class="input">
                <span>Tỉnh / Thành phố</span>
                <select class="form-select" name="" id="id_city">
                    <option value="<?= $data->id_city?>" selected><?= $city->cit_name?></option>
                    <?php
                    $city2 =  $this->Generals_model->get_city('city2');
                    foreach ($city2 as $key => $value) {
                    ?>
                    <option value="<?=$value['cit_id']?>"><?=$value['cit_name']?></option>
                    <?php 
                        }
                    ?>
                </select>
            </div>
            <div class="input">
                <span>Quận / Huyện</span>
                <select class="form-select" name="" id="id_district">
                    <option value="<?= $data->id_district?>" selected><?= $district->cit_name?></option>
                </select>
            </div>
            <div class="input">
                <span>Địa chỉ cụ thể</span>
                <input type="text" id="address" placeholder="Nhập địa chỉ" value="<?= $data->address?>">
                <span id="error_address"></span>
            </div>
            <div class="input">
                <span>Thời gian mở cửa</span>
                <select name="" id="day_open">
                    <option value="<?= $data->day_open?>" selected><?= $day[$data->day_open]?></option>
                    <option value="2">Thứ 2</option> 
                    <option value="3">Thứ 3</option> 
                    <option value="4">Thứ 4</option> 
                    <option value="5">Thứ 5</option> 
                    <option value="6">Thứ 6</option> 
                    <option value="7">Thứ 7</option> 
                    <option value="8">Chủ nhật</option> 
                    <option value="9">Cả tuần</option>  
                </select>
            </div>
            <div class="input time">
                <span>Khung giờ</span>
                <select class="form-select" name="" id="time_start">
                    <option value="<?= $data->time_start?>" selected><?= $hour[$data->time_start]?></option>
                    <?php 
                                                for($i = 0; $i < 49; $i++){
                                                ?>
                                                <option value="<?=$i?>"><?=$hour[$i]?></option>
                                            <?php 
                                            }
                                            ?>
                </select>
                 - 
                 <select class="form-select" name="" id="time_end">
                     <option value="<?= $data->time_end?>" selected><?= $hour[$data->time_end]?></option>
                     <?php 
                                                for($i = 0; $i < 49; $i++){
                                                ?>
                                                <option value="<?=$i?>"><?=$hour[$i]?></option>
                                            <?php 
                                            }
                                            ?>
                 </select>
            </div>
            <div class="input">
                <span>Ẩm thực</span>
                <select name="" id="culinary">
                    <option value="<?= $data->culinary?>" selected><?= $data->culinary?></option>
                    <option value="0">Món Việt</option>
                    <option value="1">Món Âu</option>
                    <option value="2">Món Hàn</option>
                    <option value="3">Món Nhật</option>
                </select>
            </div>
            <div class="input">
                <span>Từ khóa tìm kiếm</span>
                <input type="text" id="key_word" placeholder="Nhập từ khóa tìm kiếm" value="<?= $data->search_key?>">
                <span id="error_key"></span>
            </div>
            <div class="input">
                <span>Phí ship</span>
                <input type="number" placeholder="đ/1km" id="fee_ship" value="<?= $data->fee_ship?>">
                <span id="error_fee"></span>
            </div>
            <div class="input text">
                <span>Mô tả về quán</span>
                <textarea name="" id="description" cols="30" rows="10" placeholder="Nhập mô tả"><?= $data->description?></textarea>
                <span id="error_des"></span>
            </div>
            <div class="input">
                <span>Ảnh đại diện</span>
                <input type="file" id="img_avatar" value="<?= $data->img_avatar?>">
                <span id="error_avt"></span>
            </div>
            <div class="input">
                <span>Ảnh bìa</span>
                <input type="file" id="img_cover" value="<?= $data->img_cover?>">
                <span id="error_cover"></span>
            </div>
            <div class="input">
                <button type="button" onclick="validate_edit(<?= $data->id?>)">Hoàn Tất</button>
            </div>
        </form>
    </section>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="plugins/raphael/raphael.min.js"></script>
<script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>

<!-- AdminLTE for demo purposes -->
<!-- <script src="dist/js/demo.js"></script> -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard2.js"></script>
<script src="/script/js_cdn/cdn_select2.js"></script>
<script src="/script/showCity.js"></script>
<script src="/script/admin/them_quan_an.js"></script>
<script>
     $(document).ready(function() {
            $('.form-select').select2();
            });
</script>
</body>
</html>
