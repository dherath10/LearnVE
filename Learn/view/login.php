<?php
include '../Admin/common/DBConnect.php';
include '../Admin/model/coursemodel.php';
include '../common/session.php';
include '../Admin/model/preferencemodel.php';

$obj=new Course();
$obp=new Preference();
$resultp=$obp->viewPre1($row['learn_id']);

//$result=$obj->viewRandCourse();

$url=$_GET['url'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Learn</title>
<link rel="stylesheet" href="../CSS/layout.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css">
.panel-heading {
    padding: 5px 15px;
}

.panel-footer {
	padding: 1px 15px;
	color: #A0A0A0;
}

.profile-img {
	width: 96px;
	height: 96px;
	margin: 0 auto 10px;
	display: block;
	-moz-border-radius: 50%;
	-webkit-border-radius: 50%;
	border-radius: 50%;
}
</style>
</head> 
<body>
<?php
include '../common/header.php';
?>
   <div class="container-fluid">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12" >
            <div class="panel">
    <div class="panel-heading"><h1 class="al"><span class="headertrans">Lean</span> Virtual Learning Environment </h1></div>
    
  </div>
           
        </div>
        
        
    </div>
        <div class="container" style="margin-top:20px">
		<div class="row">
			<div class="col-sm-6 col-md-4 col-md-offset-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						<strong> Log in to continue</strong>
					</div>
					<div class="panel-body">
						<form role="form" action="../controller/learnercontroller.php?action=Login&url=<?php echo $url; ?>" method="POST">
							<fieldset>
								<div class="row">
									<div class="center-block">
										<img class="profile-img"
                                                                                     src="../images/photo.jpg" alt="">
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12 col-md-10  col-md-offset-1 ">
                                                                            <div class="form-group">
                                                                                <div class="al alert-danger">
											 <?php
                        if(isset($_REQUEST['msg'])){
                            echo base64_decode($_REQUEST['msg']);
                            
                        }
                        ?>	
											</div>
										</div>
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="glyphicon glyphicon-user"></i>
												</span> 
                                                                                            <input class="form-control" placeholder="Registration No" name="reg_no" required="" type="text" autofocus>
											</div>
										</div>
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="glyphicon glyphicon-lock"></i>
												</span>
                                                                                            <input class="form-control" placeholder="Password" name="learner_pass" required="" type="password" value="">
											</div>
										</div>
										<div class="form-group">
											<input type="submit" class="btn btn-lg btn-primary btn-sm btn-block" value="Login In">
										</div>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
					
                </div>
			</div>
		</div>
	</div>
      
<hr>
     <?php include '../common/footer.html'; ?>
   </div>
            <!-- Modal -->

</body>
</html>                                		
