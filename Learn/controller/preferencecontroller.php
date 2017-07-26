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
include '../Admin/model/preferencemodel.php';
include '../common/session.php';
$obj=new Preference();
if($_GET['action']=="Add"){
    $course_id=$_REQUEST['course_id'];
   $browser=trim($_POST['browser']);
  $learn_id=$row['learn_id'];
  $re=$obj->viewPreference($browser);
  $ro=$re->fetch(PDO::FETCH_ASSOC);
  $pre_id=$ro['pre_id'];
$result=$obj->addLearnPreference( $learn_id, $pre_id);
header("Location:../view/viewcourse.php?course_id=$course_id");

}

