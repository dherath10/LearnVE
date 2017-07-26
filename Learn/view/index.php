<?php

include '../Admin/common/DBConnect.php';
include '../Admin/model/coursemodel.php';
include '../Admin/model/preferencemodel.php';
include '../common/session.php';
include '../Admin/model/reviewmodel.php';
$obr=new Review();
$obj=new Course();
$obp=new Preference();

if(isset($_POST['search'])){
    $key=$_POST['key'];
    $resultpre2=$obp->viewPreference($key);
    $nop=$resultpre2->rowCount();
    
   if($nop!=0){    
$result=$obj->searchCourse($key);
   }else{
       $output = preg_split("/\s|-\+/", $key );
       $str= implode("", $output);
       print_r($str);
   $result=$obj->searchCourse($str);   
   }
   
$noc=$result->rowCount();
}ELSE{
 $result=$obj->viewRandCourse(); 
 $noc=$result->rowCount();
}



$resultp=$obp->viewPre1($row['learn_id']);

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

</style>
<script src="js/ionic.bundle.js"></script>
    <link href="css/ionic.css" rel="stylesheet">
    <style>
        span.stars, span.stars span {
    display: block;
   /* Download the star image here: http://stackoverflow.com/questions/1987524/turn-a-number-into-star-rating-display-using-jquery-and-css */
    background: url('images/stars.png') 0 -16px repeat-x;
    width: 80px;
    height: 16px;
}

span.stars span {
    background-position: 0 0;
}

.alignright {
  float:right;
}
    </style>
    <script>
        angular.module('myApp', ['ionic'])

.controller('MyCtrl', function($scope) {
  
  $scope.ratings = [{ name: 'Service', number: '3.6' }];
 
  $scope.getStars = function(rating) {
    // Get the value
    var val = parseFloat(rating);
    // Turn value into number/100
    var size = val/5*100;
    return size + '%';
  }
  
});
        </script>
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
      <?php if(isset($_POST['search'])){
          
          ?>
       <div class="row text-info" >
           <div class="col-md-6">Course Searched By : <?php echo ucwords($_POST['key']); ?></div><div class="col-md-6" style="text-align: right">
               No of Courses: <?php echo $noc; ?>
           </div>
       </div>
       <div class="row">
           <div class="col-md-12">&nbsp;</div>
       </div>
      <?php } 
      if($noc!=0){
      ?>
       
    <div class="row">
        <?php        while ($rowx=$result->fetch(PDO::FETCH_BOTH)){
            
            $resultratings=$obr->getRating($rowx['course_id']);
$rowratings=$resultratings->fetch(PDO::FETCH_ASSOC);
if($rowratings['co']==0){
    $count=0;
    $rating=0;
}else{
$count=$rowratings['co'];
$rating= round(($rowratings['sr']/$count),2);
}
            
            if($rowx['course_image']==""){
                        $path="../images/course.jpg";
                    }else{
                        $path="../images/course_images/".$rowx['course_image'];
                    }
            
            ?>
        <a href="viewcourse.php?course_id=<?php echo $rowx['course_id']; ?>">
            <div class="col-md-3 col-sm-6 col-xs-12" style="height: 400px">
            <div class="panel panel-default al">
                <div class="panel-heading "><img src="<?php echo $path; ?>" width="250" height="150" class="responsive" /></div>
                <div class="panel-body"><h4><?php echo $rowx['course_name']; ?></h4></div>
                <div class="panel-body">
                Level : <?php echo $rowx['course_level']; ?><br />
                Commitment : <?php echo $rowx['commitment']; ?><br />
                Rating : <?php $rf=floor($rating); ?>
                
              <?php for($i=1;$i<=$rf;$i++){ ?>
                <img src="../images/star.png" />
                                        <?php } ?>
                </div>

            <div class="panel-heading"><?php echo $rowx['cat_name']; ?></div>
        </div>
              </div>
        </a>
        <?php }  ?>
        
        
        <?php }else { ?>
       <h3 class="al alert alert-danger">No records have been found</h3>
        <?php }  ?>
    </div>
       <div class="row">
           <h3 class="al">Popular Courses</h3>
       </div>
       <hr>
       <div class="row">
           <h3 class="al">Top Rated Courses</h3>
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
