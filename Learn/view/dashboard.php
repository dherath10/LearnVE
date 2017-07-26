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

</style>
</head> 
<body>
<nav class="navbar navbar-default" ID="bcolor">
        <div class="navbar-header">
            <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="#" class="navbar-brand headertrans" id="navicolor">Learn</a>
        </div>
        <div id="navbarCollapse" class="collapse navbar-collapse">
            <form class="navbar-form navbar-left">
                <div class="form-group">
                    <input type="text" placeholder="Search" class="form-control">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
            <ul class="nav navbar-nav navbar-right" >
                <div class="dropdown" style="padding-top:7px; padding-right:5px">
    <button class="btn btn-default dropdown-toggle" id="menu1" type="button" data-toggle="dropdown">
       Learner Name
    <span class="caret"></span></button>
    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
        <li role="presentation"><a role="menuitem" tabindex="-1" href="profile.php" >Profile</a></li>
      
      <li role="presentation" class="divider"></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="signout.php">Sign Out</a></li>    
    </ul>
  </div>
            </ul>
        </div>
    </nav>
   <div class="container">
    
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="panel panel-default">
		<!-- Default panel contents -->
                <div class="panel-heading al">
                    <img src="../images/person-flat.png" width="35" />
                    <p>Elearner Name</p>
                    
                </div>
		
		<!-- List group -->
		<div class="list-group">
			<a href="myskilllevel.php" class="list-group-item">My Skill Level 
			</a>
			<a href="mycources.php" class="list-group-item">My Courses 
			</a>
			<a href="progress.php" class="list-group-item">Progress
			</a>  
			<a href="preferences.php" class="list-group-item">Preferences
			</a>
			<a href="recommendation.php" class="list-group-item">Recommendation
			</a>
		</div>
                <div class="panel-body">&nbsp;</div>
            </div>
            
        </div>
        <div class="col-md-9 col-sm-6 col-xs-12">A</div>
        
        
        
    </div>
<hr>
     <?php include '../common/footer.html'; ?>
   </div>
</body>
</html>                                		
