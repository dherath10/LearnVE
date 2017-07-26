<?php
session_start();
?>

<?php
include '../common/DBConnect.php';
include '../model/questionmodel.php';
$obj=new Question();

if($_GET['action']=="Add"){
    $course_id=$_REQUEST['course_id'];
$concept_id=$_REQUEST['concept_id'];

    $lo_id=$_REQUEST['lo_id'];
    $q_des=$_POST['q_des'];
    $q_type=$_POST['q_type'];
    $lev_id=$_POST['lev_id'];
    $q_des=$_POST['q_des'];
    
    $a1=$_POST['a1'];$a2=$_POST['a2'];$a3=$_POST['a3'];$a4=$_POST['a4'];$a5=$_POST['a5'];
    $correct=$_POST['correct'];
     $ans_status1=0;
    if($correct==1){
        $ans_status1=1;
    }
    $ans_status2=0;
    if($correct==2){
        $ans_status2=1;
    }
    $ans_status3=0;
    if($correct==3){
        $ans_status3=1;
    }
    $ans_status4=0;
    if($correct==4){
        $ans_status4=1;
    }
    $ans_status5=0;
    if($correct==5){
        $ans_status5=1;
    }
    
    if($_FILES['q_image']['name']!=""){

    $q_image=$_FILES['q_image']['name'];
    $q_loc=$_FILES['q_image']['tmp_name'];
    $new_image=time()."_".$q_image;
    }else{
    $new_image="";
    $q_loc="";
    
    }
    $q_id=$obj->addQuestion($q_des, $new_image, $q_type, $lev_id, $q_loc, $lo_id);
    $obj->addAnswer($a1, $ans_status1, $q_id);
    $obj->addAnswer($a2, $ans_status2, $q_id);
    $obj->addAnswer($a3, $ans_status3, $q_id);
    $obj->addAnswer($a4, $ans_status4, $q_id);
    $obj->addAnswer($a5, $ans_status5, $q_id);
    
    header("Location:../view/addqa?course_id=$course_id&concept_id=$concept_id&lo_id=$lo_id");
    
}

?>