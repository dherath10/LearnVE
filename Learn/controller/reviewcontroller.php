<?php
//Start the session
if(!isset($_SESSION)){
    session_start();
}
include '../common/session.php';
date_default_timezone_set("Asia/Colombo"); //To change time zone
//Login Controller
//Server Side Include - to include a file
include '../Admin/common/DBConnect.php';
include '../Admin/model/reviewmodel.php';
include '../common/session.php';
$obj=new Review();
if($_GET['action']=="addreview"){
   $course_id=trim($_GET['id']);

$star=$_POST['star'];

$comments=$_POST['comments'];
$learn_id=$row['learn_id'];
$result=$obj->addCourseReview($course_id, $learn_id, $star, $comments);
header("Location:../view/viewcourse.php?course_id=$course_id");

}

