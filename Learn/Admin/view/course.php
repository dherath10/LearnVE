<!-- Session Check and Start -->
<?php
session_start();
if(isset($_SESSION['logged_admin'])){
    $userInfo=$_SESSION['userInfo'];
     if($userInfo['user_image']==""){
                        $path1="../dist/img/avatar5.png";
                    }else{
                        $path1="../../images/user_images/".$userInfo['user_image'];
                    }
                    $user_id=$userInfo['user_id'];
}
else{
	header('Location: ../view/login.php');
	}
        
        include '../common/DBConnect.php';
        include '../model/usermodel.php';
include '../model/coursemodel.php';
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
    <link href="../css/jquery.dataTables.min.css" rel="stylesheet">
    <style>
    div.dataTables_wrapper {
        margin-bottom: 3em;
    }
  </style>
    <script src="../JQuery/jquery-1.12.4.js"></script>
    <script src="../JQuery/jquery.dataTables.min.js"></script>
<script>  
            
$(document).ready(function() {
    $('table.display').DataTable();
} );
         
        </script>
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
           
            <li><a href="index.php">Dashboard</a></li>
            <li><a href="#" class="active">Course</a></li>

          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12"><!-- /.box -->

          
                
                <div class="box-body">
                  <div class="box">
                <div class="box-header">
                    <h3 class="al">Course Management</h3>
                </div><!-- /.box-header -->
                <div class="row" style="padding-bottom: 10px">
                <div class="col-md-6 col-sm-3">
                     <a href="../controller/learnercontroller?status=Add">
                         <button class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> &nbsp;Add</button></a>
                </div><div class="col-md-6 col-sm-3">&nbsp;</div>
                </div>
                  <table class="display">
                    <thead>
                      <tr>
                          <th>&nbsp;</th>  
            
            <th>Course Name&nbsp;</th> 
            <th>Code Code&nbsp;</th> 
            <th>Course Level&nbsp;</th> 
            <th>Category&nbsp;</th> 
            <th>Commitment&nbsp;</th> 
            <th>Status&nbsp;</th> 
            <th width="20%">&nbsp;</th>
                      </tr>
                    </thead>
                   
			<tbody> 
                             
				<?php
					
	$ob=new Course();
$result=$ob->viewCourse();

	
		
		while($rowx=$result->fetch(PDO::FETCH_BOTH))
		{
                    if($rowx['course_image']==""){
                        $path="../dist/img/avatar5.png";
                    }else{
                        $path="../../images/course_images/".$rowx['course_image'];
                    }
		if($rowx['course_status']=="Active"){
                    $status="Deactive";
                }else{
                    $status="Active";
                }
		?><tr <?php if(isset($_REQUEST['msg']) && $count==1){ ?>
                class="success" 
           <?php } ?>>
                <td>
                    <img src="<?php echo $path; ?>" width="75" 
                         height="auto" />
                </td>
                
                <td><?php echo $rowx['course_name']; ?></td>
                <td><?php echo $rowx['course_code']; ?></td>
                <td><?php echo $rowx['course_level']; ?></td>
                <td><?php echo $rowx['cat_name']; ?></td>
                <td><?php echo $rowx['commitment']; ?></td>
                <td><?php echo $rowx['course_status']; ?></td>
                <td>
              <a href="../controller/coursecontroller.php?id=<?php echo $rowx['course_id']; ?>&status=View">
                        <button class="btn btn-success">View</button>
                    </a>
                    <a href="../view/updatecourse.php?id=<?php echo $rowx['course_id']; ?>&status=Update">
                        <button class="btn btn-primary">Update</button>
                    </a>
                    <a href="../controller/coursecontroller.php?id=<?php echo $rowx['course_id']; ?>&status= <?php echo $status; ?>">
                        <button class="btn btn-danger" 
                                onclick="return disConfirm('<?php echo $status; ?>')">
                            <?php echo $status; ?></button>
                    </a>
                    
                </td>
            </tr>
							<?php
   				} 
				?>
                    
                    
                      
                    </tbody>
                    
                  </table>
                             
                    
                    
                    
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
