<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | DataTables</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/dist/css/adminlte.min.css">
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
        <a href="/document" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/document" class="nav-link">Contact</a>
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
                      <!-- Menu Footer-->
        <li class="user-footer">
            <div class="pull-right">
                <a href="/logout" class="btn btn-default btn-flat">Sign out</a>
            </div>
        </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/document" class="brand-link">
      <img src="/dist/img/AdminLTELogo.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="/dashboard" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="/document" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
                Document
                <i class="right fas fa-angle-left"></i>
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
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <div class="card-tools">
                      <!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add New</button> -->
                      <button class="btn btn-primary btn-sm btn-flat" data-toggle="modal" data-target="#modal-add"><i class="fa fa-plus"></i>Add New</button>
                  </div>
                  <br/>
                  <tr>
                    <th>No</th>
                    <th>Subjek Dokumen</th>
                    <th>Remark</th>
                    <th>Status</th>
                    @can('Approver')
                    <th>Actions</th>
                    @endcan
                  </tr>
                  </thead>
                  
                  <tbody>
                  @foreach($datas as $key=>$data)
                  <tr>
                     <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->document_subject}}</td>
                    <td>{{ $data->remark}}</td>
                    <td>{{ $data->status}}</td>
                    @can('Approver')
                    <td> 
                      <a class="btn btn-info btn-sm" href="{{ url ('approved',$data->id) }}">
                        <i class=""></i>Approve
                      </a>
                      <a class="btn btn-danger btn-sm" href="{{ url ('rejected',$data->id) }}">
                        <i class=""></i>Reject
                      </a>
                    </td>
                    @endcan
                  </tr>
                  @endforeach
                  </tbody>
                    <div class="modal inmodal fade" id="modal-add" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-xs">
                        <form name="frm_add" id="frm_add" class="form-horizontal" action="/document/store" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                             
                            <div class="modal-content">
                            
                                <div class="modal-header">
                                    <h4 class="modal-title">Tambah Data</h4>
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group"><label class="col-lg-4 control-label">No Document</label>
                                        <div class="col-lg-10"><input type="number" name="document_no" placeholder="no" class="form-control"></div>
                                    </div>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group"><label class="col-lg-4 control-label">Subject Document</label>
                                        <div class="col-lg-10"><input type="text" name="document_subject" placeholder="subject" class="form-control"></div>
                                    </div>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group"><label class="col-lg-4 control-label">Status</label>
                                        <div class="col-lg-10"><input type="text" name="status" placeholder="status" class="form-control"></div>
                                    </div>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group"><label class="col-lg-4 control-label">Remark</label>
                                        <div class="col-lg-10"><input type="text" name="remark" placeholder="remark" class="form-control"></div>
                                    </div>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group"><label class="col-lg-4 control-label">Created By</label>
                                        <div class="col-lg-10"><input type="text" name="created_by" placeholder="created by" class="form-control"></div>
                                    </div>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group"><label class="col-lg-4 control-label">Update By</label>
                                        <div class="col-lg-10"><input type="text" name="update_by" placeholder="update by" class="form-control"></div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-white" data-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.5
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
