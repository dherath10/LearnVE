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
          
                <?php include '../common/mainnavigation.php'; ?>
              
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
    </div>