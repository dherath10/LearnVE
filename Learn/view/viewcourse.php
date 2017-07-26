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
$course_id=$_REQUEST['course_id'];
$result=$obj->viewACourse($course_id);
$rowx=$result->fetch(PDO::FETCH_BOTH);

$rc=$obj->viewConcept($course_id);

$ob=new User();
$resultr=$ob->getCourseFacilitator($course_id, 2);
$resultt=$ob->getCourseFacilitator($course_id, 3);
//echo $URL;

$obr=new Review();
$resultrev=$obr->viewReview($course_id, $row['learn_id']);
$norev=$resultrev->rowCount();


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
  <li class="breadcrumb-item active"><?php echo $rowx['course_name']; ?></li>
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
        
        <?php       
            
            if($rowx['course_image']==""){
                        $path="../images/course.jpg";
                    }else{
                        $path="../images/course_images/".$rowx['course_image'];
                    }
            
            ?>
       
        <div class="col-md-8 col-sm-6 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading"><img src="<?php echo $path; ?>" class="img-responsive" width="400" height=225" /></div>
                <div class="panel-body"><h3 class="al"><?php echo $rowx['course_name']; ?></h3>
                    <h4>About the Course</h4>
                    <div class="jus">
                        <?php echo $rowx['course_des']; ?>
                        
                    </div>
                </div>
                <div class="panel-body">
                    <h5> Created By </h5>
                   
                    <?php while($rowr=$resultr->fetch(PDO::FETCH_ASSOC)){ 
                        
                        
                        ?>
                    <div class="row">
                        <div class="col-md-1">
                    <img src="../images/user_images/<?php echo $rowr['user_image']; ?>" 
                         width="40" height="40" class="rou"/>&nbsp;
                        </div>
                        <div class="col-md-11">
                             <?php echo $rowr['user_fname']." ".$rowr['user_lname']; ?>&nbsp;
                    (<?php
                    $strq=$ob->getQualifications($rowr['user_id']);
                    echo $strq;
                    ?>) - 
                    <?php
                    $rex=$ob->getCurrentExp($rowr['user_id']);
                    $rowex=$rex->fetch(PDO::FETCH_ASSOC);
                    echo $rowex['position']." @ ".$rowex['com_name'];
                    ?>
                        </div>
                    </div>
                   
                        <?php } ?>
                    
                </div>
                <div class="panel-body">
                    <h5> Tought By </h5>
                <?php while($rowt=$resultt->fetch(PDO::FETCH_ASSOC)){ ?>
                    <div class="row">
                        <div class="col-md-1">
                    <img src="../images/user_images/<?php echo $rowt['user_image']; ?>" 
                         width="40" height="40" class="rou"/>&nbsp;
                        </div>
                        <div class="col-md-11">
                             <?php echo $rowt['user_fname']." ".$rowt['user_lname']; ?>&nbsp;
                    (<?php
                    $strq=$ob->getQualifications($rowt['user_id']);
                    echo $strq;
                    ?>) - 
                    <?php
                    $rex=$ob->getCurrentExp($rowt['user_id']);
                    $rowex=$rex->fetch(PDO::FETCH_ASSOC);
                    echo $rowex['position']." @ ".$rowex['com_name'];
                    ?>
                        </div>
                    </div>
                        <?php } ?>
                </div>
                <div class="panel-body al">
                    <div class="col-md-2">
                        Level : <?php echo $rowx['course_level']; ?></div>
                     <div class="col-md-4">
                         Commitment : <?php echo $rowx['commitment']; ?> Hours
                     </div>
                     <div class="col-md-6">
                         Category : <?php echo $rowx['cat_name']; ?>
                     </div>
                    
                     
              </div>
                <div class="panel-body">
                    <h4>Curriculum For This Course</h4>
                    <hr />
                    <?php 
                    $count=0;
                    while($rowc=$rc->fetch(PDO::FETCH_ASSOC)){ 
                        $concept_id=$rowc['concept_id'];
                        $rlo=$obj->viewLearningObjects($concept_id);
                        $count++ ;
                        
                        $scoc=$obq->getScoreConcept($rowc['concept_id']);
                               $resultnca=$obq->noOfConceptAttempt($rowc['concept_id']);
                               $nca=$resultnca->rowCount();
                               if($nca>=1){
                              $os=round(($scoc/$nca),2);
                               }else{
                                  $os=0;  
                               }
                        ?>
                    
                    <div class="panel-group">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" href="#collapse<?php echo $count; ?>">
                              <i class="glyphicon glyphicon-plus"></i>&nbsp;<?php echo $rowc['concept_name']; ?></a>
                              <?php //echo $rowc['duration']; ?>
                        </h4>
                      </div>
                      <div id="collapse<?php echo $count; ?>" class="panel-collapse collapse">
                          <div class="panel-body">
                              <div class="jus"><?php echo $rowc['concept_des']; ?></div>
                              <div class="jus">&nbsp;</div>
                              <table class="table table-responsive table-condensed">
                                  <tr><th>Content</th><th>Hours</th></tr>
                              <?php
                              while($rowlo=$rlo->fetch(PDO::FETCH_ASSOC)){  ?>
                                  <tr>
                                      <td width="90%" ><i class="glyphicon glyphicon-file"></i>&nbsp;<?php echo $rowlo['lo_name']; ?></td>
                                  <td><?php echo $rowlo['lo_duration']; ?>:00:00</td>
                              </tr>
                              <?php } ?>
                              </table>
                          </div>
                          <div class="panel-footer al">
                              <?php if($co!=0 ){ 
                        if($escount!=0){ 
                            $resultar=$obq->getAResult( $rowen['en_id'], $rowc['concept_id']);
                           $noar=$resultar->rowCount();
                           if($noar!=0){ 
                               $rowsco=$obq->getAScore($rowen['en_id'], $rowc['concept_id']);
                               //$rowsco=$resultsco->fetch(PDO::FETCH_ASSOC);
                               $sl=get_EP($rowsco);
                               
                               
                             
                            ?>
                              <div class="row">
                                  <div class="col-md-4">Your Skill Level :<span style="font-size:16px" class="badge alert-info"><?php echo $sl; ?> </span></div>
                                  <div class="col-md-4">Your Energy Point : <span style="font-size:16px" class="badge alert-info">
                                      <?php  echo round($rowsco,2);?> </span></div>
                                  <div class="col-md-4">Overall Energy Point :<span style="font-size:16px" class="badge alert-info"><?php echo $os; ?></span></div>
                              </div><br />
                              <div class="row">
                                <a href="coursecontent.php?concept_id=<?php echo $rowc['concept_id']; ?>&course_id=<?php echo $course_id; ?>&action=Access&type=1">
                              <button class="btn btn-success xxs">Access Concept Content</button>
                              </a>
                              </div>
                           <?php }else{ ?>
                              <div class="row">
                               <div class="col-md-4">&nbsp;</div>
                                  <div class="col-md-4"><a href="../controller/qnacontroller.php?concept_id=<?php echo $rowc['concept_id']; ?>&course_id=<?php echo $course_id; ?>&action=Try&type=1">
                              <button class="btn btn-success xxs">Take Your Skill Test To Begin</button>
                              </a></div>
                                  <div class="col-md-4">Overall Energy Point :<span style="font-size:16px" class="badge alert-info"><?php echo $os; ?></span></div>
                              </div>
                              
                           <?php } ?>
                        <?php } else{ ?>
                           <div class="row">
                               <div class="col-md-4">&nbsp;</div>
                                  <div class="col-md-4">Please Enroll</div>
                                  <div class="col-md-4">Overall Energy Point :<span style="font-size:16px" class="badge alert-info"><?php echo $os; ?></span></div>
                              </div><?php
                        }
                              }else{ ?>
                              <div class="row">
                                 <div class="col-md-4">&nbsp;</div>
                                  <div class="col-md-4">Please Login</div>
                                  <div class="col-md-4">Overall Energy Point :<span style="font-size:16px" class="badge alert-info"><?php echo $os; ?></span></div>
                              </div>
                          <?php
                              }
                        ?>
                          </div>
                      </div>
                    </div>
                  </div>
                    <?php } ?>
                    <div class="al">
                          <?php echo $es; ?>
                        
                    </div>
                </div><hr />
                
                <div class="panel-body">
                    <?php if($co!=0 ){ 
                        if($entrol!=0){ 
                        if($norev==0){
                      
                        ?>
                    <div class="row">
                             <form method="post" 
     action="../controller/reviewcontroller.php?id=<?php echo $course_id ?>&action=addreview">
                        <!-- Ratings-->
                        <div class="col-md-5">
                        <h4> Your Rating</h4>
                        <div class="stars">
                       
                            <input class="star star-5" id="star-5" title="Excellent" type="radio" name="star" value="5" onclick="showRating(this.title)"/>
    <label class="star star-5" for="star-5" title="Excellent" onmouseout="outRating()"></label>
    <input class="star star-4" id="star-4" type="radio" name="star" value="4" title="Above Average" onclick="showRating(this.title)"/>
    <label class="star star-4" for="star-4" title="Above Average" onmouseout="outRating()"></label>
    <input class="star star-3" id="star-3" type="radio" name="star" value="3" title="Average" onclick="showRating(this.title)"/>
    <label class="star star-3" for="star-3" title="Average"onmouseout="outRating()"></label>
    <input class="star star-2" id="star-2" type="radio" name="star" value="2" title="Below Average" onclick="showRating(this.title)"/>
    <label class="star star-2" for="star-2" title="Below Average" onmouseout="outRating()"></label>
    <input class="star star-1" id="star-1" type="radio" name="star" value="1" title="Poor" onclick="showRating(this.title)"/>
    <label class="star star-1" for="star-1" title="Poor"  onmouseout="outRating()"></label>
  
</div>
                         <div id="showR"></div>
                        </div>
                        <div class="col-md-5">
                        <h4> Your Comment</h4>
                        <textarea class="form-control" required="" name="comments" placeholder="Type a comment"></textarea>
                        </div>
                        <div class="col-md-2">
                            <h4>&nbsp;</h4>
                            <button class="btn btn-success xxs">Submit</button>
                        
                        </div>
                             </form>
                    
                </div>
                     <?php
                        }else{ 
                           $rowrev=$resultrev->fetch(PDO::FETCH_ASSOC);
                           
                           ?>
                    <div class="row">
                        <div class="col-md-12"><h4>Your Feedback</h4></div>
                        <!-- Ratings-->
                        <div class="col-md-6">
                    
                        <div class="rating-block">
					<h4>Your rating</h4>
					<h2 class="bold padding-bottom-7"><?php echo $n=$rowrev['rating']; ?> <small>/ 5</small></h2>
					<?php for($i=1;$i<=$n;$i++){ ?>
                                        <button type="button" class="btn btn-warning btn-sm" aria-label="Left Align">
					  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
					</button>
                                        <?php } ?>
                                        <?php for($i=1;$i<=(5-$n);$i++){ ?>
					<button type="button" class="btn btn-default btn-grey btn-sm" aria-label="Left Align">
					  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
					</button>
                                        <?php } ?>
					
				</div>
                       
                        </div>
                        <div class="col-md-5 rating-block">
                            <div class="review-block-rate">
                        <h4> Your Comment</h4>
                        <?php echo $rowrev['review']; ?>
                            </div></div>
                        
                    
                    
                </div>
                    <?php
                        }
                        }else{ ?>
                            <div class="row">
                        <!-- Ratings-->
                        <div class="col-md-12">Enroll and then add your feedback </div>
                    </div>
                        <?php }
                     
                     
                     
                        }else{ ?>
                    <div class="row">
                        <!-- Ratings-->
                        <div class="col-md-12">First Login and enroll and then add your feedback </div>
                    </div>
                     <?php } ?>
                    <hr />
                   
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                        <h4>Learner Feedback</h4>
                        <div class="row">
			<div class="col-sm-6">
                            
                                
                                    <div class="rating-block">
					<h4>Average user rating</h4>
					<h2 class="bold padding-bottom-7"><?php echo round($rating,2); ?> <small>/ 5</small></h2>
					<?php for($i=1;$i<=$rat;$i++){ ?>
                                        <button type="button" class="btn btn-warning btn-sm" aria-label="Left Align">
					  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
					</button>
                                        <?php } ?>
                                        <?php for($i=1;$i<=(5-$rat);$i++){ ?>
					<button type="button" class="btn btn-default btn-grey btn-sm" aria-label="Left Align">
					  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
					</button>
                                        <?php } ?>
				</div>
					
				
                                
                            
			</div>
                            	<div class="col-sm-6">
                                    
                                    <h4>Rating breakdown</b></h4>
				<div class="row rating-desc">
                            <div class="col-xs-3 col-md-3 text-right">
                                <span class="glyphicon glyphicon-star"></span>5
                            </div>
                            <div class="col-xs-8 col-md-9">
                                <div class="progress progress-striped">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20"
                                        aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $star5; ?>%">
                                        <span class="sr-only"><?php echo $star5; ?>%</span>
                                    </div>
                                </div>
                            </div>
                            <!-- end 5 -->
                            <div class="col-xs-3 col-md-3 text-right">
                                <span class="glyphicon glyphicon-star"></span>4
                            </div>
                            <div class="col-xs-8 col-md-9">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20"
                                        aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $star4; ?>%">
                                        <span class="sr-only"><?php echo $star4; ?>%</span>
                                    </div>
                                </div>
                            </div>
                            <!-- end 4 -->
                            <div class="col-xs-3 col-md-3 text-right">
                                <span class="glyphicon glyphicon-star"></span>3
                            </div>
                            <div class="col-xs-8 col-md-9">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20"
                                        aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $star3; ?>%">
                                        <span class="sr-only"><?php echo $star3; ?>%</span>
                                    </div>
                                </div>
                            </div>
                            <!-- end 3 -->
                            <div class="col-xs-3 col-md-3 text-right">
                                <span class="glyphicon glyphicon-star"></span>2
                            </div>
                            <div class="col-xs-8 col-md-9">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="20"
                                        aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $star2; ?>%">
                                        <span class="sr-only"><?php echo $star2; ?>%</span>
                                    </div>
                                </div>
                            </div>
                            <!-- end 2 -->
                            <div class="col-xs-3 col-md-3 text-right">
                                <span class="glyphicon glyphicon-star"></span>1
                            </div>
                            <div class="col-xs-8 col-md-9">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80"
                                        aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $star1; ?>%">
                                        <span class="sr-only"><?php echo $star1; ?>%</span>
                                    </div>
                                </div>
                            </div>
                            <!-- end 1 -->
                        </div>
                                
			</div>
                        </div>
                                </div>
                            
                        
                        </div>
                        <div class="col-md-12">&nbsp;</div>
                        <div class="row">
                            <a name="se"></a>
                            <div class="col-md-8"><h4>Reviews</h4></div><div class="col-md-4">
                                <form action="viewcourse.php#se" method="post">
                               <div id="custom-search-input">
                <div class="input-group col-md-12">
                    <input type="hidden" value="<?php echo $course_id; ?>" name="course_id" />
                        <input type="text" name="rev" class="form-control input-sm" placeholder="Search Reviews" required="" />
                    <span class="input-group-btn">
                        <button class="btn btn-info btn-sm" name="search">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                    </span>
                </div>
            </div>                      </form>
                              
                            </div>
                        </div>
                        <?php
                              while($rowrevs=$resultrevs->fetch(PDO::FETCH_ASSOC)){  ?>
                           <div class="row">
                               
                                <div class="col-md-12">
                                    
                            	<div class="col-sm-3">
                                    <img src="../images/learner_images/<?php echo $rowrevs['learn_image']; ?>" width="50" height="50" class="img-rounded">
							<div class="review-block-name"><a href="#"><?php echo $rowrevs['learn_fname']; ?></a></div>
							<div class="review-block-date"><?php echo $rowrevs['cr_date']; ?><br/> day ago</div>
						</div>
						<div class="col-sm-9 rating-block">
							<div class="review-block-rate">
								<?php for($i=1;$i<=$rowrevs['rating'];$i++){ ?>
                                        <button type="button" class="btn btn-warning btn-sm" aria-label="Left Align">
					  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
					</button>
                                        <?php } ?>
                                        <?php for($i=1;$i<=(5-$rowrevs['rating']);$i++){ ?>
					<button type="button" class="btn btn-default btn-grey btn-sm" aria-label="Left Align">
					  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
					</button>
                                        <?php } ?>
							</div>
							<div class="review-block"><?php echo $rowrevs['review']; ?></div>
							
						</div>
                            
                              
                            
                                </div>
                               
                               
                               
                               
                        </div>
                        <?php } ?>
                    </div>
           
        </div>
            </div></div>
        
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
