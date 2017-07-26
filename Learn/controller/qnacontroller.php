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
include '../Admin/model/questionmodel.php';
include '../Admin/model/coursemodel.php';

$obc=new Course();
$obq=new Question();

if($_GET['action']=="Try"){
    $course_id=$_REQUEST['course_id'];
   $concept_id=$_REQUEST['concept_id'];
  $learn_id=$row['learn_id'];
  $entrolr=$obc->checkCourseEnrollment($course_id, $learn_id);
  $rowen=$entrolr->fetch(PDO::FETCH_ASSOC);
  $en_id=$rowen['en_id'];
  $type_id=$_REQUEST['type'];
  $attempt_id=$obq->addAttempt($en_id, $type_id,$concept_id);
 // echo $attempt_id;
  
  $arr=array(0);
  $resultq1=$obq->selectQuestions($concept_id, 1);
  $rowq1=$resultq1->fetch(PDO::FETCH_ASSOC);
  $q1=$rowq1['q_id'];
  array_push($arr, $q1);
  $resultq2=$obq->selectQuestions($concept_id, 2);
  $rowq2=$resultq2->fetch(PDO::FETCH_ASSOC);
  $q2=$rowq2['q_id'];
  array_push($arr, $q2);
  $resultq3=$obq->selectQuestions($concept_id, 3);
  $rowq3=$resultq3->fetch(PDO::FETCH_ASSOC);
  $q3=$rowq3['q_id'];
  array_push($arr, $q3);
  $resultq4=$obq->selectQuestions($concept_id, 4);
  $rowq4=$resultq4->fetch(PDO::FETCH_ASSOC);
  $q4=$rowq4['q_id'];
  array_push($arr, $q4);
  $resultq5=$obq->selectQuestions($concept_id, 5);
  $rowq5=$resultq5->fetch(PDO::FETCH_ASSOC);
  $q5=$rowq5['q_id'];
  array_push($arr, $q5);
  
  $_SESSION['q_pool']=$arr;
  header("Location:../view/skillquiz.php?course_id=$course_id&concept_id=$concept_id&en_id=$en_id&attempt_id=$attempt_id&q=1");
  
  

}

if($_GET['action']=="Ans"){
    $course_id=$_REQUEST['course_id'];
   $concept_id=$_REQUEST['concept_id'];
   $attempt_id=$_REQUEST['attempt_id'];
  $learn_id=$row['learn_id'];
  $en_id=$_REQUEST['en_id'];
  $q=$_REQUEST['q'];
  $ans_id=$_POST['radio'];
     $q_id=$_POST['q_id']; 
     $level_weight=$_POST['level_weight'];
     $resulta=$obq->viewAnswer($ans_id);
       $rowa=$resulta->fetch(PDO::FETCH_ASSOC);
       if($rowa['ans_status']==1){
           $ans_status=1;
       }else{
           $ans_status=0;
           $level_weight=0;
       }
       $obq->addResult($attempt_id, $q_id,$level_weight,$ans_id);
       if($q==5){
           $obq->updateResult($attempt_id);
           
           
       }
     header("Location:../view/skillquizview.php?course_id=$course_id&concept_id=$concept_id&en_id=$en_id&attempt_id=$attempt_id&q=$q&q_id=$q_id");
}
  ?>