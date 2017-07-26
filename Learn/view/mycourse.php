<?php
include '../Admin/common/DBConnect.php';
include '../common/commonfunctions.php';
include '../Admin/model/coursemodel.php';
include '../Admin/model/usermodel.php';
include '../Admin/model/reviewmodel.php';
include '../Admin/model/preferencemodel.php';
include '../Admin/model/questionmodel.php';
include '../Admin/model/recommendationmodel.php';
include '../common/session.php';




?>
<?php




$obp=new Preference();
$resultp=$obp->viewPreferences($row['learn_id']);
$resultpre=$obp->viewPre($row['learn_id']);
$resultpre1=$obp->viewPre1($row['learn_id']);
$obq=new Question();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Learn</title>
<link rel="stylesheet" href="../CSS/layout.css" />
<link rel="stylesheet" href="../Admin/bootstrap/css/bootstrap.min.css">
<script src="../Admin/JQuery/jquery-1.12.4.js"></script>
<script src="../Admin/bootstrap/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="../CSS/font-awesome.min.css">
<style>
    div.stars {
  width: 200px;
  display: inline-block;
}

input.star { display: none; }

label.star {
  float: right;
  padding: 8px;
  font-size: 24px;
  color: #0F0;
  transition: all .2s;
}

input.star:checked ~ label.star:before {
  content: '\f005';
  color: #0F0;
  transition: all .25s;
}

input.star-5:checked ~ label.star:before {
  color: #0f0;
  text-shadow: 0 0 20px #000;
}

input.star-1:checked ~ label.star:before { color: #F62; }



label.star:before {
  content: '\f006';
  font-family: FontAwesome;
}

.btn-grey{
    background-color:#D8D8D8;
	color:#FFF;
}
.rating-block{
	background-color:#FAFAFA;
	border:1px solid #EFEFEF;
	padding:15px 15px 20px 15px;
	border-radius:3px;
}
.bold{
	font-weight:700;
}
.padding-bottom-7{
	padding-bottom:7px;
}

.review-block{
	background-color:#FAFAFA;
	border:1px solid #EFEFEF;
	padding:15px;
	border-radius:3px;
	margin-bottom:15px;
}
.review-block-name{
	font-size:12px;
	margin:10px 0;
}
.review-block-date{
	font-size:12px;
}
.review-block-rate{
	font-size:13px;
	margin-bottom:15px;
}
.review-block-title{
	font-size:15px;
	font-weight:700;
	margin-bottom:10px;
}
.review-block-description{
	font-size:13px;
}
.glyphicon { margin-right:5px;}
.rating .glyphicon {font-size: 22px;}
.rating-num { margin-top:0px;font-size: 54px; }
.progress { margin-bottom: 5px;}
.progress-bar { text-align: left; }
.rating-desc .col-md-3 {padding-right: 0px;}
.sr-only { margin-left: 5px;overflow: visible;clip: auto; }
.img-responsive {
    margin: 0 auto;
}

    </style>
    <script>
        function showRating(str){
            document.getElementById('showR').innerHTML=str;
        }
        </script>
        <script>
function showPre(str) {
  var xhttp;    
  if (str == "") {
    document.getElementById("txtHint").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("txtHint").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "getPre.php?q="+str, true);
  xhttp.send();
}
</script>
</head> 
<body>
<?php
include '../common/header.php';
?>
    <div class="container-fluid">
       <div>
        <div class="col-md-12 col-sm-12 col-xs-12" >
        <div class="panel">
    <div class="panel-heading"><h1 class="al"><span class="headertrans">Lean</span> Virtual Learning Environment </h1></div>
        </div>           
        </div>      
    </div>
     
    <div class="container-fluid">
           <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="index.php">Home</a></li>
  <li class="breadcrumb-item active">My Courses</li>
</ol>  
        
     
    <div class="row">
        <div class="col-md-2 col-sm-6 col-xs-12">
           
            <div class="panel panel-default al">
            
               
                  
                <div class="panel panel-body">
                    <?php if($co==1){ ?>
                    <ul class="list-group">
                    <li class="list-group-item"><a href="skilllevel.php"> Skill Level</a></li>
                    <li class="list-group-item"><a href="mycourse.php"> My Course</a></li>
                    <li class="list-group-item"><a href="progress.php"> Progress</a></li>
                    <li class="list-group-item"><a href="preferences.php"> Preferences</a></li>
                    <li class="list-group-item"><a href="recommendations.php"> Recommendations</a></li>
                     <li class="list-group-item"><a href="bookmarks.php"> BookMarks </a></li>
                    <li class="list-group-item"><a href="faq.php"> FAQ</a></li>
                    <li class="list-group-item"><a href="ep.php"> Energy Point </a></li>
                    
                    <?php }else{ ?>
                        <li class="list-group-item"><a href="faq.php"> FAQ</a></li>
                    <li class="list-group-item"><a href="ep.php"> Energy Point </a></li>
                <?php } ?>
                    </ul>
                    <div class="al">
                        <br />
                        <?php echo $es; ?>
                    
                    </div>
                    
                </div>
              
        </div>
              </div>
        
       
       
        <div class="col-md-8 col-sm-6 col-xs-12">
            
            <h3 class="al">My Courses</h3>
        </div>
        
       <div class="col-md-2 col-sm-6 col-xs-12">
           
       
          <?php include '../common/recommendation.php'; ?>
            <div class="panel panel-default al">
                <div class="panel panel-heading">
                    Preferences</div>
                <?php if($co==1){ ?>
                <div class="panel panel-body">
                    <div id="txtHint">
                        <form action="../controller/preferencecontroller.php?action=Add&course_id=<?php echo $course_id; ?>" method="post">
                           <input list="browsers" id="browser" name="browser" class="form-control input-sm" 
                                  placeholder="Enter Your Preference" autocomplete="no">
  <datalist id="browsers">
      <?php while($rowp=$resultp->fetch(PDO::FETCH_ASSOC)){ ?>
    <option value="<?php echo $rowp['pre_name']; ?>">
  
         <?php } ?>
  </datalist>
                      <br />   
                           
                      <button type="submit" class="btn btn-success btn-sm">Add</button>

                        </form>
                    </div>
                    <div>        
                       <div class="panel panel-title">
                           <h5>Your Preferences</h5></div> <br />
                    <ul class="list-group">
        <?php while($rowpre=$resultpre->fetch(PDO::FETCH_ASSOC)){ ?>                 
                        <li class="list-group-item"><?php echo ucwords($rowpre['pre_name']); ?></li>
   
        <?php } ?>          
  </ul>
                </div>
                           
                           
                   
            
                </div>
                <?php }else{ ?>
                <ul class="list-group">
        <?php while($rowpre1=$resultpre1->fetch(PDO::FETCH_ASSOC)){ ?>                 
                        <li class="list-group-item"><?php echo ucwords($rowpre1['pre_name']); ?></li>
   
        <?php } ?>          
  </ul>
                <?php } ?>
            </div>
              </div>
        
        
        
       
    </div>
          
       </div> 
        
<hr>
     <?php include '../common/footer.html'; ?>
   </div>
            <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">E-learner Login</h4>
      </div>
      <div class="modal-body">
          <form action="../controller/validate.php" method="post" onsubmit="return validate()">
              <p id="show"></p>
          <h4>
              <input type="text" name="uname" id="uname" required="" 
                     placeholder="Email Address" class="form-control" />
          </h4>
          
          <h4>
              <input type="password" name="pass" id="pass" required="" 
                     placeholder="Password" class="form-control" />
          </h4>
          <h4>
              <button type="submit" class="btn btn-success">
                  Login
              </button>
          </h4>
          <p><a href="forgotpassword.html">Forgot Password </a></p>
          <p><a href="signup.php">Sign Up </a></p>
          </form>
          
      </div>
      
    </div>

  </div>
</div>
</body>
</html>                                		
