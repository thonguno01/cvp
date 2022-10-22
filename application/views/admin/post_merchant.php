
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
  <style>
    div#dataid_filter label, .pagination {
            float: right;
        }
        .col-sm-12.col-md-6.fil {
            display: flex;
            margin-bottom: 1%;
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
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Quản lý bài viết của quán ăn</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin-index">Trang Chủ</a></li>
              <li class="breadcrumb-item active">Quản lý bài viết</li>
              <li class="breadcrumb-item active">Quản lý bài viết của quán ăn</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <?php
        $time_start = $this->input->post('time_start');
        $time_end = $this->input->post('time_end');
      ?>
    <section class="content">
        <div class="row">
          <form action="" method="post" style="width:100%">
            <div class="col-sm-12 col-md-6 fil">
                <div class="col-md-3">
                  <input type="date" class="form-control form_search from-date" value="<?=$time_start?>" name="time_start" onchange='if(this.value != 0) { this.form.submit(); }'>
                </div>
                <div class="col-md-3">
                  <input type="date" class="form-control form_search from-date" value="<?=$time_end?>" name="time_end" onchange='if(this.value != 0) { this.form.submit(); }'>
                </div>
            </div> 
            <!-- <div class="col-md-6">
              <button type="button" onclick="them_quan_an()" class="btn btn-primary pull-right add-user" id="popup-btn" >
                <i class="fas fa-user-plus"></i>
                Thêm quán ăn
              </button>
            </div> -->
          </form>
        </div>
        
        <div class="container-fluid">
      <div class="rowa">
        
        <div class="con">
        <div class="table-responsive">
        <div class="col-sm-12 col-md-6">
          <div class="dt-buttons btn-group flex-wrap">    
            <form action="xuat-excel-merchant" method="post">
              <button type="submit" class="btn btn-primary" id="export" name="export" style="margin-bottom: 30px;">Xuất excel</button>   
            </form>
          </div>
        </div>
        <table id="dataid" class="table table-striped table-bordered" style="width: 100%;">
        <thead>
          <tr>
          <th width="5%">STT</th>
          <th width="5%">ID quán ăn</th>
          <th width="35%">Nội dung</th>
          <th width="20%">Ảnh / Video</th>
          <th width="5%">Lượt thích</th>
          <th width="10%">Ngày tạo</th>
          <th width="10%">Duyệt</th>

          </tr>
        </thead>
        <tbody>
          <?php
          // $data_merchant =  $this->Generals_model->get_list('merchant');
          // $data_merchant =  $this->Generals_model->notifi('merchant',['created_at >=' => $time_start]);
          if($time_start != '' && $time_end == ''){
            $sql = $this->Generals_model->notifi('post',['created_at >=' => $time_start]);
          }
          elseif($time_start == '' && $time_end != ''){
            $sql = $this->Generals_model->notifi('post',['created_at >=' => $time_end]);
          }
          elseif($time_start != '' && $time_end != ''){
            $sql = $this->Generals_model->notifi('post',['created_at >=' => $time_start, 'created_at <=' => $time_end]);
          }
          else{
            $sql = $this->Generals_model->get_list_orderby('post');
          }
          foreach($sql as $key => $v){
            $tach_img_vid = explode(",", $v["img_video"]);
          ?>
         <tr>
            <td><?= $v["id"]?></td>
            <td><?= $v["merchant_id"]?></td>
            <td><?= $v["content"]?></td>
            <td>
            <?php
            foreach($tach_img_vid as $data_img){
            ?>
                <img src="upload/merchant/food/<?= $data_img?>" alt="">
            <?php
            }
            ?>
            </td>
            <td><?= $v["like"]?></td>
            <td><?= $v["created_at"]?></td>
            <td><input id="check_censorship" type="checkbox" <? if($v['censorship'] == 1) echo "checked"; ?> value="<?= $v['censorship']?>" onclick="update_censorship(this,<?= $v['id']?>)"></td>
        </tr>
          <?php
          }
          ?>
        </tbody>
        </table>
      </div>
      
    </div>
    </section>
    <!-- /.content -->
  </div>
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
<script>
  function them_quan_an(){
    window.location = 'admin-them-quan-an'
  }
</script>
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
<script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.0/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
    var datatablephp = $('#dataid').DataTable();
  });
  function update_censorship(e,id){

      let censorship = $(e).val();
        let data_json = {
            id: id,
            censorship: censorship
        }
        let checkcensorship = callAjax('/check-censorship', 'post', data_json);
        if(checkcensorship.rs == true){
            alert(checkcensorship.msg)
        }
  }
</script>
</body>
</html>
