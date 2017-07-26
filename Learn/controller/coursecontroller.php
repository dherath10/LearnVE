<?php
//Start the session
if(!isset($_SESSION)){
    session_start();
}
date_default_timezone_set("Asia/Colombo"); //To change time zone
//Login Controller
//Server Side Include - to include a file
include '../Admin/common/DBConnect.php';
include '../Admin/model/coursemodel.php';
include '../common/session.php';

if($_GET['action']=="enroll"){
   echo $course_id=trim($_GET['course_id']);


$obj=new Course(); //To create object using login class
$result=$obj->enrollment($course_id, $row['learn_id']);
header("Location:../view/viewcourse.php?course_id=$course_id");



}

