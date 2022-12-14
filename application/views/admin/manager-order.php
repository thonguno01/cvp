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
                        <a href="#" class="d-block"><?= $data_admin->name ?></a>
                    </div>
                </div>

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
                Qu???n l?? ng?????i d??ng
                <i class="fas fa-angle-left right"></i>
               
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin-list-merchant" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh s??ch c???a h??ng</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin-list-customer" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh s??ch kh??ch h??ng</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/administrators" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh s??ch ADMIN</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
              <a href="#" class="nav-link">
                  <i class="fas fa-copy"></i>
                  <p>
                      Qu???n l?? ????ng k?? l???i
                      <i class="fas fa-angle-left right"></i>

                  </p>
              </a>
              <ul class="nav nav-treeview">
                  <li class="nav-item">
                      <a href="/list-customer-error" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Danh s??ch kh??ch h??ng</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="/list-merchant-error" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Danh s??ch c???a h??ng</p>
                      </a>
                  </li>
              </ul>
          </li>
          <li class="nav-item">
              <a href="#" class="nav-link">
                  <i class="fas fa-inbox"></i>
                  <p>
                      Qu???n l?? ????n h??ng
                      <i class="fas fa-angle-left right"></i>

                  </p>
              </a>
              <ul class="nav nav-treeview">
                  <li class="nav-item">
                      <a href="/admin-list-user-order" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Danh s??ch ng?????i ?????t h??ng</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="/admin-list-order" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Danh s??ch order</p>
                      </a>
                  </li>
              </ul>
          </li>
          <li class="nav-item">
              <a href="#" class="nav-link">
                  <i class="fas fa-edit"></i>
                  <p>
                      Qu???n l?? b??i vi???t
                      <i class="fas fa-angle-left right"></i>

                  </p>
              </a>
              <ul class="nav nav-treeview">
                  <li class="nav-item">
                      <a href="/post-merchant" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>B??i ????ng c???a c???a h??ng</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="/admin-post" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Sale ????ng qu???ng c??o</p>
                      </a>
                  </li>
              </ul>
          </li>
          <li class="nav-item">
              <a href="#" class="nav-link">
                  <i class="fas fa-bullhorn"></i>
                  <p>
                      Qu???n l?? Voucher
                      <i class="fas fa-angle-left right"></i>

                  </p>
              </a>
              <ul class="nav nav-treeview">
                  <li class="nav-item">
                      <a href="/voucher-merchant" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Voucher c???a c???a h??ng</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="/voucher-sale" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Voucher c???a Sale</p>
                      </a>
                  </li>
              </ul>
          </li>
          <li class="nav-item">
            <a href="logout-admin" class="nav-link">
              <i class="fas fa-power-off"></i>
              <p>
                ????ng xu???t
              </p>
            </a>
            
          </li>

        </ul>
      </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Danh s??ch Kh??ch h??ng</h1>
                            <div>Danh s??ch Kh??ch h??ng ????ng k?? t??? web : <span class="param">2323</span></div>
                            <div>Danh s??ch Kh??ch h??ng ????ng k?? t??? app : <span class="param">344</span></div>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="/admin-index">Trang Ch???</a></li>
                                <li class="breadcrumb-item active">Danh s??ch Kh??ch h??ng</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- Main content -->

            <section class="content">
                <div class="row">
                    <form action="" method="post" style="width:100%">
                        <div class="col-sm-12 col-md-6">
                            <div class="col-md-3 ">
                                <input type="date" class="form-control form_search from-date" value="<?= $time_start ?>" name="time_start" onchange='if(this.value != 0) { this.form.submit(); }'>
                            </div>
                            <div class="col-md-3 ">
                                <input type="date" class="form-control form_search from-date" value="<?= $time_end ?>" name="time_end" onchange='if(this.value != 0) { this.form.submit(); }'>
                            </div>
                        </div>

                    </form>
                </div>

                <div class="container-fluid">
                    <div class="rowa">

                        <div class="con">
                            <div class="table-responsive">
                                <div class="col-sm-12 col-md-6">
                                    <div class="dt-buttons btn-group flex-wrap">
                                        <form action="xuat-excel-order" method="post">
                                            <button type="submit" class="btn btn-primary" id="export" name="export" style="margin-bottom: 30px;">Xu???t excel</button>
                                        </form>
                                    </div>
                                </div>

                                <table id="dataid" class="table table-striped table-bordered" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th width="5%">Code</th>
                                            <th width="15%">Kh??ch h??ng</th>
                                            <th width="15%">QU??n ??n </th>
                                            <th width="20%">?????a ch??? nh???n h??ng </th>
                                            <th width="30%">M??n ??n </th>
                                            <th width="8%">Th??nh ti???n </th>
                                            <th width="8%">Khuy???n m???i</th>
                                            <th width="8%">Ph?? ship</th>
                                            <th width="8%">T???ng ti???n</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // $data_merchant =  $this->Generals_model->get_list('merchant');
                                        // $data_merchant =  $this->Generals_model->notifi('merchant',['created_at >=' => $time_start]);

                                        foreach ($sql as $key => $order) {
                                        ?>
                                            <tr>
                                                <td><?= $order['code'] ?></td>
                                                <td><?= $order['customer_id'] ?></td>
                                                <td><?= $order['merchant_id'] ?></td>
                                                <td><?= $order['addresss_id'] ?></td>
                                                <td>
                                                    <?php
                                                    $name = $this->Generals_model->selectData('dish_id', 'order_dish', '', ['id' => $order['id']], '', 'row');
                                                    $name = $name->dish_id;
                                                    $name = explode(',', $name);

                                                    $data_all = [];
                                                    foreach ($name as $key1 => $value1) {
                                                        $data = explode('-', $value1);
                                                        $data_all[] = $data;
                                                    }
                                                    $name_menu = [];
                                                    foreach ($data_all as $key2 => $value2) {
                                                        if ($value2[2] == 0) {
                                                            $name_menu1 = $this->Generals_model->selectData('name_food', 'detail_menu', '', ['id' => $value2[0]], '', 'row');
                                                            $money1 = $this->Generals_model->selectData('price_food', 'detail_menu', '', ['id' => $value2[0]], '', 'row');
                                                            $name_menu[] = $value2[1] . '-' . $name_menu1->name_food . '-' . number_format($money1->price_food) . '??';
                                                        } else {
                                                            $name_menu1 = $this->Generals_model->selectData('name_combo', 'combo', '', ['id' => $value2[0]], '', 'row');
                                                            $money1 = $this->Generals_model->selectData('price_combo', 'combo', '', ['id' => $value2[0]], '', 'row');
                                                            $name_menu[] = $value2[1] . '-' . $name_menu1->name_combo . '-' . number_format($money1->price_combo) . '??';
                                                        }
                                                    }
                                                    // $name_menu = implode(',', $name_menu);
                                                    foreach ($name_menu as $item) {
                                                        echo '<li>' . $item . '</li>';
                                                    }
                                                    ?>
                                                </td>

                                                <td><?= number_format($order['total_before']) . '??' ?></td>
                                                <td><?= number_format($order['sale']) . '??' ?></td>
                                                <td><?= number_format($order['fee_ship']) . '??' ?></td>
                                                <td><?= number_format($order['total_after']) . '??' ?></td>
                                            </tr>
                                        <?php } ?>
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
    <script>
        function them_khach_hang() {
            window.location = 'admin-add-customer'
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
    <script src="dist/js/pages/dashboard2.js"></script>
    <script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.0/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            var datatablephp = $('#dataid').DataTable();
        });
    </script>
</body>

</html>