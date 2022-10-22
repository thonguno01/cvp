
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
    <!-- summernote -->
    <link rel="stylesheet" href="../../plugins/summernote/summernote-bs4.min.css">
  <style>
      div#dataid_filter label, .pagination {
            float: right;
        }
        .col-sm-12.col-md-6.fil{
            display: flex;
            margin-bottom: 1%;
        }
        img#myimg {
            width: 50%;
        }
        span.pip {
            display: grid;
        }
        span.error_message {
            color: red;
            font-style: italic;
            font-size: 14px;
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
            <h1>Thêm bài đăng cho Sale</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin-index">Trang Chủ</a></li>
              <li class="breadcrumb-item active">Quản lý bài viết</li>
              <li class="breadcrumb-item active">Thêm bài đăng cho Sale</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
    <form id="quickForm" name="a">
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Tiêu đề</label><span id="error_title"></span>
                <input type="email" name="title" class="form-control" id="title" placeholder="Tiêu đề tin">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Loại tin</label>
                <select class="form-control" name="" id="type">
                    <?php 
                    for($i = 1; $i < 4; $i++){
                    ?>
                    <option value="<?=$i?>"><?=$type_post[$i]?></option>
                    <?php 
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Chọn ảnh</label><span id="error_img"></span>
                <input class="btn btn-success col fileinput-button" type="file" id="imageFile"  accept=".jpg,.jpeg,.png,.gif">
            </div>
            
            <div class="form-group">
                <div class="chua_img" id="img_vd"></div> 
            </div>
        </div>
        <div class="row">
        <div class="col-md-12">
          <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">
                Nội dung
              </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <textarea id="summernote" required>
                
              </textarea>
            </div>
            

          </div>
        </div>
        <!-- /.col-->
      </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="button" class="btn btn-primary" onclick="validate()">Submit</button>
        </div>
    </form>

      <!-- ./row -->

      <!-- ./row -->
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
<!-- Summernote -->
<script src="../../plugins/summernote/summernote-bs4.min.js"></script>
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
  $(function () {
    // Summernote
    $('#summernote').summernote()

    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
      mode: "htmlmixed",
      theme: "monokai"
    });
  })
  $(document).ready(function() {
    if (window.File && window.FileList && window.FileReader) {
      $("#imageFile").on("change", function(e) {
        var files = e.target.files,
          filesLength = files.length; 
        for (var i = 0; i < filesLength; i++) { 
          var f = files[i]
          var fileReader = new FileReader();
          fileReader.onload = (function(e) {
            var file = e.target;
            $("<span class=\"pip\">" + 
            "<span class=\"remove\">×</span>" +
              "<img id=\"myimg\" class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
              "</span>").appendTo("#img_vd");
            $(".remove").click(function(){
              $(this).parent(".pip").remove();     
            });        
          });
          fileReader.readAsDataURL(f);
        }
      });
    } else {
      alert("Your browser doesn't support to File API")
    }
  });
  function validate(){
      let title = $("#title").val();
      let type = $("#type").val();
      let img = $("#imageFile").val();
      let content = $("#summernote").val();
      check = true; 
      if(title == ''){
        document.getElementById('error_title').innerHTML = `<span class="error_message"> *Không được bỏ trống tiêu đề</span>`;
        check = false;
      }
      else if(title != ''){
        document.getElementById('error_title').innerHTML = `<span class="error_message"></span>`;
      }
       if(img == ''){
        document.getElementById('error_img').innerHTML = `<span class="error_message"> *Thêm ít nhất 1 ảnh</span>`;
        check = false;
      }
      else if(img != ''){
        document.getElementById('error_img').innerHTML = `<span class="error_message"></span>`;
      }
      if(check == true){
        let data_json = { 
                title: title,
                type: type,
                img: img, 
                content: content,
            }
        let out = callAjax('/add-post-sale/php', 'post', data_json);
        if (out.rs == true) {
            alert(out.msg);
            window.location = 'admin-post';
        } 
      }
  }
</script>
</body>
</html>
