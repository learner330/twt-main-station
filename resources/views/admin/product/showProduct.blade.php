<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>主站后台管理</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('admin-lte/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin-lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('admin-lte/dist/css/adminlte.min.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{asset('admin-lte/index3.html')}}" class="nav-link">Home</a>
            </li>
        </ul>

        <!-- SEARCH FORM -->
        <form class="form-inline ml-3">
            <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Messages Dropdown Menu -->

            <!-- Notifications Dropdown Menu -->
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{asset('admin-lte/index3.html')}}" class="brand-link">
            <img src="{{asset('admin-lte/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">主站后台管理</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{asset('admin-lte/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{Auth::user()->name}}</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item has-treeview menu-open">
                        <a href="" class="nav-link active">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                首页管理
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{url('admin/navigation')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>顶部导航栏</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('admin/banner')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>banner及底图</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('admin/link')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>外部链接入口</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>主题皮肤(未开发)</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview menu-open">
                        <a href="#" class="nav-link active">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                工作室成员内容
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{url('admin/league')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>相册轮播图</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('admin/group')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>组信息管理</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('admin/member/4')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>产品组</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('admin/member/5')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>设计组</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('admin/member/3')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>前端组</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('admin/member/1')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>程序组</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('admin/member/2')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>移动组</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview menu-open">
                        <a href="#" class="nav-link active">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                工作室简介
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{url('admin/synopsis')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>工作室简介</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('admin/activity')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>活动轮播图管理</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview menu-open">
                        <a href="#" class="nav-link active">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                通知公告
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{url('admin/notice')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>通知列表</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('admin/label')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>标签管理</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview menu-open">
                        <a href="#" class="nav-link active">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                产品列表管理
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{url('admin/product')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>产品列表</p>
                                </a>
                            </li>
                        </ul>
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
                        <h1 class="m-0 text-dark">产品信息</h1>
                    </div><!-- /.col -->

                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">产品信息</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>产品名</th>
                                        <th>图标</th>
                                        <th>产品简介</th>
                                        <th>产品主页链接</th>
                                        <th>操作</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $d)
                                        <tr>
                                            <td>{{$d->name}}</td>
                                            <td>
                                                <img src="{{url($d->image_url)}}"/>
                                            </td>
                                            <td>{{$d->introduction}}</td>
                                            <td>{{$d->target_url}}</td>
                                            <td>
                                                <form method="POST" action="{{url('admin/product/self')}}">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="id" value="{{$d->id}}">
                                                    <div class="btn-group">
                                                        <button type="button" onclick="window.location.href='#'" class="btn btn-sm btn-outline-info">
                                                            编辑
                                                        </button>
                                                        <button type="submit" onclick="return confirm('确定删除吗，将无法恢复？')" class="btn btn-sm btn-outline-danger">
                                                            删除
                                                        </button>
                                                    </div>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <button type="button" onclick="window.location.href='{{url('admin/product/self')}}'" class="btn btn-danger">
                                    添加
                                </button>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        <div class="p-3">
            <h5>Title</h5>
            <p>Sidebar content</p>
        </div>
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset('admin-lte/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('admin-lte/dist/js/adminlte.min.js')}}"></script>
<!-- DataTables -->
<script src="{{asset('admin-lte/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin-lte/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('admin-lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin-lte/dist/js/demo.js')}}"></script>
<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
    });
</script>
</body>
</html>

