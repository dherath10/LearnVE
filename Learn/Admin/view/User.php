<!-- Session Check and Start -->
<?php
session_start();
if(isset($_SESSION['logged_admin'])){
    $userInfo=$_SESSION['userInfo'];
     if($userInfo['user_image']==""){
                        $path1="../dist/img/avatar5.png";
                    }else{
                        $path1=$userInfo['user_image'];
                    }
                    $user_id=$userInfo['user_id'];
}
else{
	header('Location: ../view/login.php');
	}
        
        include '../common/DBConnect.php';
include '../model/usermodel.php';
$obj=new User();
$r=$obj->getUserModule($user_id);
?>
<!-- End -->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Learn</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
     <link rel="stylesheet" href="../css/layout.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <header class="main-header" style="background-color: #375566">
        <!-- Logo -->
        <a href="index.php" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>Learn</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg" ><b style="color: #FFF">Lean</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation" >
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button" style="color: #FFF">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
             
              <!-- Notifications: style can be found in dropdown.less --><!-- Tasks: style can be found in dropdown.less --><!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
               <?php include '../common/dropdown.php'; ?>
              </li>
              
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <?php include '../common/panel.php'; ?>
          </div>
          <!-- search form -->
        
          <!-- /.search form -->
          <!-- sidebar menu: : s tyle can be found in sidebar.less -->
          <ul class="sidebar-menu" >
            <li class="header">DASHBOARD </li>
            <li class="active treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Main Modules</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="active"></li>
                <?php include '../common/mainnavigation.php'; ?>
              </ul>
            </li>
            
           
            
            
           
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" style="background-color: #FFF">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
              &nbsp;
          </h1>
          <ol class="breadcrumb">
           
            <li><a href="#">Dashboard</a></li>

          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12"><!-- /.box -->

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">DDD</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  
                
                    
                    
                    
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div>
            <?php include '../common/footer.php'; ?>
        </div>
          
      </footer>

     
    
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>
    <!-- page script -->
    <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
  </body>
</html>
