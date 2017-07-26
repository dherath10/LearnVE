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

$ob=new Course();
$resultc=$ob->viewCourse();

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
<link rel="stylesheet" href="../css/progress.css">
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
        <script type="text/javascript">        
 function showConcept(str) {
  var xhttp; 
  if (str == "") {
    document.getElementById("showConcept").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
     // document.getElementById("showFun").innerHTML = '<img src="../images/loading.gif" alt="Please Wait" />';
    if (this.readyState == 4 && this.status == 200) {
    document.getElementById("showConcept").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "ajax.php?c="+str, true);
  xhttp.send();
}

function showLO(str) {
  var xhttp; 
  if (str == "") {
    document.getElementById("showLO").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
     // document.getElementById("showFun").innerHTML = '<img src="../images/loading.gif" alt="Please Wait" />';
    if (this.readyState == 4 && this.status == 200) {
    document.getElementById("showLO").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "ajax.php?co="+str, true);
  xhttp.send();
}
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
            <li><a href="questionandanswer.php" class="active">Questions &amp; Answers</a></li>
            <li><a href="#" class="active">Select Course, Concept &amp; Learning Object</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12"><!-- /.box -->

          
                
                <div class="box-body">
                  <div class="box">
                <div class="box-header">
                    <h3 class="al">Select Course, Concept &amp; Learning Object</h3>
                </div><!-- /.box-header -->
                <div class="stepwizard">
    <div class="stepwizard-row setup-panel">
        <div class="stepwizard-step">
            <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
            <p>Select</p>
        </div>
        <div class="stepwizard-step">
            <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
            <p>Add</p>
        </div>
        
    </div>
</div>
                  <div class="row"> 
    <div class="col-md-6 col-md-offset-3">
        <form class="form-horizontal" role="form" action="addqa" method="post">
        <fieldset>

          <!-- Form Name -->
        

         
          <div class="form-group">
            <label class="col-sm-4 control-label" for="textinput">Course Name </label>
            <div class="col-sm-8">
                <select name="course_id" id="course_id" class="form-control" required="" 
                                onchange="showConcept(this.value)">
                            <option value="">Select a Course</option>
                 <?php while($rowc=$resultc->fetch(PDO::FETCH_ASSOC)) {
 echo "<option value=".$rowc['course_id'].">".$rowc['course_name'].
         "</option>";
                     
                     
                 }
                 ?>       
                        </select>
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-sm-4 control-label" for="textinput">Concept Name </label>
            <div class="col-sm-8">
                <div id="showConcept">
                    <select name="concept_id" id="concept_id" class="form-control" disabled="" 
                                >
                               
                        </select>
                </div>
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-sm-4 control-label" for="textinput">Learning Object</label>
            <div class="col-sm-8">
              <div id="showLO">
                    <select name="lo_id" id="lo_id" class="form-control" disabled="" 
                                >
                               
                        </select>
                </div>
            </div>
          </div>

          
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <div class="pull-right">
                <button type="submit" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
            </div>
          </div>

        </fieldset>
      </form>
    </div><!-- /.col-lg-12 -->
</div><!-- /.row -->
                  
                             
                    
                    
                    
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
