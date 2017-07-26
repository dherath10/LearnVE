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
$obj=new Course();
$course_id=$_REQUEST['course_id'];$concept_id=$_REQUEST['concept_id'];$en_id=$_REQUEST['en_id'];
$attempt_id=$_REQUEST['attempt_id'];
$result=$obj->viewACourse($course_id);
$rowx=$result->fetch(PDO::FETCH_BOTH);

$resultconcept=$obj->viewAConcept($concept_id);
$rowconcept=$resultconcept->fetch(PDO::FETCH_BOTH);

$rc=$obj->viewConcept($course_id);

$ob=new User();
$resultr=$ob->getCourseFacilitator($course_id, 2);
$resultt=$ob->getCourseFacilitator($course_id, 3);
//echo $URL;

$obr=new Review();
$resultrev=$obr->viewReview($course_id, $row['learn_id']);
$norev=$resultrev->rowCount();
$poorarr=array();
$partialarr=array();

?>
<?php if($co==1){ 
    $entrolr=$obj->checkCourseEnrollment($course_id, $row['learn_id']);
     $entrol=$entrolr->rowCount();
     if($entrol==0){
         $escount=0;
         $es="<a href='../controller/coursecontroller.php?course_id=$course_id&action=enroll'><button type='button' class='btn btn-success'>Enroll</button></a>";
     }else{
         $rowen=$entrolr->fetch(PDO::FETCH_ASSOC);
         $es="Date of Entrollment : ".$rowen['en_date']; 
         $escount=1;
     }
    ?>
                        
                        
                        <?php }else{ 
                        $escount=0;
            $es="<a href='login.php?url=$URL'><button type='button' class='btn btn-success'>Enroll</button></a>";
} 
if(isset($_POST['search'])){
    //echo $_POST['rev'];
$resultrevs=$obr->viewReviewsKey($course_id,$_POST['rev']);
} else {
 $resultrevs=$obr->viewReviews($course_id);   
}

$resultratings=$obr->getRating($course_id);
$rowratings=$resultratings->fetch(PDO::FETCH_ASSOC);
if($rowratings['co']==0){
    $count=0;
    $rating=0;
}else{
$count=$rowratings['co'];
$rating=($rowratings['sr']/$count);
}

$rat=floor($rating);

$star5=$obr->getRatingStar($course_id,5,$count);
$star4=$obr->getRatingStar($course_id,4,$count);
$star3=$obr->getRatingStar($course_id,3,$count);
$star2=$obr->getRatingStar($course_id,2,$count);
$star1=$obr->getRatingStar($course_id,1,$count);

$obp=new Preference();
$resultp=$obp->viewPreferences($row['learn_id']);
$resultpre=$obp->viewPre($row['learn_id']);
$resultpre1=$obp->viewPre1($row['learn_id']);


$obq=new Question();

$score=$obq->getScore($attempt_id);

$ccount=$obq->getCCount($attempt_id);

$resultresult=$obq->viewResults($attempt_id);

$resultlo=$obq->viewResultLO($attempt_id);

if($rowar['score']==0){
    $str="<span class='alert-danger'>Incorrect</span>";
}else{
    $str="<span class='alert-success'>Correct</span>";
}

   $sl=get_EP($score);
  
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
.progress-bar { text-align: center; }
.rating-desc .col-md-3 {padding-right: 0px;}
.sr-only { margin-left: 5px;overflow: visible;clip: auto; }
.img-responsive {
    margin: 0 auto;
}
.pagination>li>a, .pagination>li>span { border-radius: 50% !important;margin: 0 2px;}



.funkyradio div {
  clear: both;
  overflow: hidden;
}

.funkyradio label {
  width: 100%;
  border-radius: 3px;
  border: 1px solid #D1D3D4;
  font-weight: normal;
}

.funkyradio input[type="radio"]:empty,
.funkyradio input[type="checkbox"]:empty {
  display: none;
}

.funkyradio input[type="radio"]:empty ~ label,
.funkyradio input[type="checkbox"]:empty ~ label {
  position: relative;
  line-height: 2.5em;
  text-indent: 3.25em;
  margin-top: 2em;
  cursor: pointer;
  -webkit-user-select: none;
     -moz-user-select: none;
      -ms-user-select: none;
          user-select: none;
}

.funkyradio input[type="radio"]:empty ~ label:before,
.funkyradio input[type="checkbox"]:empty ~ label:before {
  position: absolute;
  display: block;
  top: 0;
  bottom: 0;
  left: 0;
  content: '';
  width: 2.5em;
  background: #D1D3D4;
  border-radius: 3px 0 0 3px;
}

.funkyradio input[type="radio"]:hover:not(:checked) ~ label,
.funkyradio input[type="checkbox"]:hover:not(:checked) ~ label {
  color: #888;
}

.funkyradio input[type="radio"]:hover:not(:checked) ~ label:before,
.funkyradio input[type="checkbox"]:hover:not(:checked) ~ label:before {
  content: '\2714';
  text-indent: .9em;
  color: #C2C2C2;
}

.funkyradio input[type="radio"]:checked ~ label,
.funkyradio input[type="checkbox"]:checked ~ label {
  color: #777;
}

.funkyradio input[type="radio"]:checked ~ label:before,
.funkyradio input[type="checkbox"]:checked ~ label:before {
  content: '\2714';
  text-indent: .9em;
  color: #333;
  background-color: #ccc;
}

.funkyradio input[type="radio"]:focus ~ label:before,
.funkyradio input[type="checkbox"]:focus ~ label:before {
  box-shadow: 0 0 0 3px #999;
}

.funkyradio-default input[type="radio"]:checked ~ label:before,
.funkyradio-default input[type="checkbox"]:checked ~ label:before {
  color: #333;
  background-color: #ccc;
}

.funkyradio-primary input[type="radio"]:checked ~ label:before,
.funkyradio-primary input[type="checkbox"]:checked ~ label:before {
  color: #fff;
  background-color: #337ab7;
}

.funkyradio-success input[type="radio"]:checked ~ label:before,
.funkyradio-success input[type="checkbox"]:checked ~ label:before {
  color: #fff;
  background-color: #5cb85c;
}

.funkyradio-danger input[type="radio"]:checked ~ label:before,
.funkyradio-danger input[type="checkbox"]:checked ~ label:before {
  color: #fff;
  background-color: #d9534f;
}

.funkyradio-warning input[type="radio"]:checked ~ label:before,
.funkyradio-warning input[type="checkbox"]:checked ~ label:before {
  color: #fff;
  background-color: #f0ad4e;
}

.funkyradio-info input[type="radio"]:checked ~ label:before,
.funkyradio-info input[type="checkbox"]:checked ~ label:before {
  color: #fff;
  background-color: #5bc0de;
}

/* SCSS STYLES */
/*
.funkyradio {

    div {
        clear: both;
        overflow: hidden;
    }

    label {
        width: 100%;
        border-radius: 3px;
        border: 1px solid #D1D3D4;
        font-weight: normal;
    }

    input[type="radio"],
    input[type="checkbox"] {

        &:empty {
            display: none;

            ~ label {
                position: relative;
                line-height: 2.5em;
                text-indent: 3.25em;
                margin-top: 2em;
                cursor: pointer;
                user-select: none;

                &:before {
                    position: absolute;
                    display: block;
                    top: 0;
                    bottom: 0;
                    left: 0;
                    content: '';
                    width: 2.5em;
                    background: #D1D3D4;
                    border-radius: 3px 0 0 3px;
                }
            }
        }

        &:hover:not(:checked) ~ label {
            color: #888;

            &:before {
                content: '\2714';
                text-indent: .9em;
                color: #C2C2C2;
            }
        }

        &:checked ~ label {
            color: #777;

            &:before {
                content: '\2714';
                text-indent: .9em;
                color: #333;
                background-color: #ccc;
            }
        }

        &:focus ~ label:before {
            box-shadow: 0 0 0 3px #999;
        }
    }

    &-default {
        input[type="radio"],
        input[type="checkbox"] {
            &:checked ~ label:before {
                color: #333;
                background-color: #ccc;
            }
        }
    }

    &-primary {
        input[type="radio"],
        input[type="checkbox"] {
            &:checked ~ label:before {
                color: #fff;
                background-color: #337ab7;
            }
        }
    }

    &-success {
        input[type="radio"],
        input[type="checkbox"] {
            &:checked ~ label:before {
                color: #fff;
                background-color: #5cb85c;
            }
        }
    }

    &-danger {
        input[type="radio"],
        input[type="checkbox"] {
            &:checked ~ label:before {
                color: #fff;
                background-color: #d9534f;
            }
        }
    }

    &-warning {
        input[type="radio"],
        input[type="checkbox"] {
            &:checked ~ label:before {
                color: #fff;
                background-color: #f0ad4e;
            }
        }
    }

    &-info {
        input[type="radio"],
        input[type="checkbox"] {
            &:checked ~ label:before {
                color: #fff;
                background-color: #5bc0de;
            }
        }
    }
}
*/


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
  <li class="breadcrumb-item active"><?php echo $rowx['course_name']; ?></li>
  <li class="breadcrumb-item active"><?php echo $rowconcept['concept_name']; ?></li>
  <li class="breadcrumb-item active">Skill Level Test</li>
</ol>  
        
     
    <div class="row">
       
        
        
        
       
        <div class="col-md-9 col-sm-12 col-xs-12">
           
            <h4 class="al">You Got <span class="alert-info"><?php echo $ccount; ?></span> out of <big>5</big> correct answers on <?php echo $rowconcept['concept_name']; ?></h4>     
            <h4>What You Know</h4>
             <div class="row">
                 <div class="col-md-6"><h4>Question</h4></div>
                 <div class="col-md-2"><h4>Proficiency</h4></div>
                 <div class="col-md-1"><h4>Answer </h4>        
                     
                 </div>
                 <div class="col-md-1"><h4>Score  </h4>      
                     
                 </div>
                 <div class="col-md-2"><h4>Learning Object</h4></div>
            </div>
               <div class="col-md-12"><hr /></div>
            <?php 
            $count=0;
            while($rowresult=$resultresult->fetch(PDO::FETCH_ASSOC)){ 
                $count++;
                ?>
           
         
            <div class="row <?php if($rowresult['score']==0){ echo 'text-warning'; }else{ echo 'text-success';} ?>">
                <div class="col-md-6"><?php echo "(".$count.") ".$rowresult['q_des'];  ?></div>
                 <div class="col-md-2"><?php echo $rowresult['proficiency'];  ?></div>
                 <div class="col-md-1">
                     <?php
                     if($rowresult['score']==0){
                        $class="glyphicon glyphicon-remove text-danger";
                     }else{
                         $class="glyphicon glyphicon-ok text-primary";
                     }
                     ?>
                     <span class="<?php echo $class; ?>"></span>
                 </div>
                 <div class="col-md-1"><?php echo $rowresult['score'];  ?></div>
                  <div class="col-md-2"><?php echo $rowresult['lo_name'];  ?></div>
            </div>
            <div class="row">
               
                 
                <div class="col-md-12"><hr /></div>
            </div>
            <?php } ?>
        
            <div class="row">
                 <div class="col-md-6"><h4>Learning Object</h4></div>
                 <div class="col-md-2"><h4>No of Questions</h4></div>
                 <div class="col-md-1"><h4>Correct </h4>        
                     
                 </div>
                 <div class="col-md-1"><h4>Incorrect  </h4>      
                     
                 </div>
                 <div class="col-md-2"><h4>Knowledge Status</h4></div>
            </div>
               <div class="col-md-12"><hr /></div>
            <?php 
            $count=0;
            while($rowlo=$resultlo->fetch(PDO::FETCH_ASSOC)){ 
                $count++;
                ?>
           
         
            <div class="row">
                <div class="col-md-6"><?php echo $rowlo['lo_name'];  ?></div>
                 <div class="col-md-2"><?php echo $no=$rowlo['noq'];  ?></div>
                 <div class="col-md-1">
                     <?php
                     $noclo=$obq->viewResultcLO($attempt_id, $rowlo['lo_id']);
                      $noilo=$obq->viewResultiLO($attempt_id, $rowlo['lo_id']);
                      
                     
                      $stat=$noclo/$no;
                      if($stat==1){
                          $status="Good";
                          $statu="100";
                      }elseif($stat==0){
                          $status="Poor";
                          $statu="0";
                          $strp=$rowlo['lo_id']."#".$rowlo['lo_name']."#".$rowlo['lo_page'];
                          array_push($poorarr, $strp);
                      }else{
                          $status="Partial";
                          $statu= round($stat,2)*100;
                          $strp=$rowlo['lo_id']."#".$rowlo['lo_name']."#".$rowlo['lo_page'];
                          array_push($partialarr, $strp);
                      }
                      
                     ?>
                     <span class=""><?php echo $noclo; ?></span>
                 </div>
                 <div class="col-md-1"><?php echo $noilo;  ?></div>
                  <div class="col-md-2"><?php echo $status;  ?> (<?php echo $statu;  ?>%)</div>
            </div>
            <div class="row">
               
                 
                <div class="col-md-12"><hr /></div>
            </div>
            <?php } ?>
           
            
        </div> 
         <div class="col-md-3 col-sm-6 col-xs-12">
           
            
            <div class="container">
    <div class="row">
        <div class="col-md-3 col-sm-6">
             <div class="panel panel-default al">
                 <div class="panel panel-body">
                     <h4>Your Skill Level : <span class="alert-info"><?php  echo $sl; ?></span></h4>
                     
                 </div>
                  <div class="panel panel-body">
                      <div class="container-fluid">
                          <div class="progress">
    <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $score; ?>%">
      <?php echo round($score,2); ?>
    </div>
  </div>
                      </div>
            Your Energy Point
                  </div>
                
             </div>
            <div class="panel panel-default">
                 <div class="panel panel-body">
                     <h4 class="al">Recommendation:</h4>
                     
                 </div>
                  <div class="panel panel-body">
                     
                     
                          <?php
                               foreach ($poorarr as $v) {
                                   $a=explode("#", $v);
                              ?>
                          <div class="alert alert-danger">
                              <?php echo $a[1]; ?>
                              <a href="../content/<?php echo $rowconcept['concept_code']; ?>.php#<?php echo $a[2]; ?>"> Visit Contents </a>
                        </div>
                               <?php } ?>
                      
                      <?php
                               foreach ($partialarr as $v) {
                                   $a=explode("#", $v);
                              ?>
                          <div class="alert alert-warning">
                              <?php echo $a[1]; ?>
                              <a href="../content/<?php echo $rowconcept['concept_code']; ?>.php#<?php echo $a[2]; ?>"> Visit Contents </a>
                        </div>
                               <?php } ?>
                      
            
                  </div>
                
             </div>
        </div>
       
    </div>
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
