<?php
//Start the session
if(!isset($_SESSION)){
    session_start();
}
date_default_timezone_set("Asia/Colombo"); //To change time zone
//Login Controller
//Server Side Include - to include a file
include '../Admin/common/DBConnect.php';
include '../Admin/model/learnermodel.php';
include '../common/commonfunctions.php';

if($_GET['action']=="Login"){
   $url=$_GET['url'];
$reg_no=trim($_POST['reg_no']);
$learner_pass=trim($_POST['learner_pass']);
$pass=sha1($learner_pass); //To encrypt using secure hash algorithm


//Server side validation

if($reg_no=="" and $learner_pass==""){
    $msg="Registration and Password are Empty";
    $msg=  base64_encode($msg); //To encode the message
    //Redirecting and passing data through URL
    header("Location:../view/login.php?msg=$msg&url=$url");   
}else{

$obj=new Learn(); //To create object using login class
$result=$obj->validateLogin($reg_no, $pass); //To call a funtion
$nor=$result->rowCount();
echo $nor;
if($nor==0){
    $msg="Registration Number or Password Invalid";
    $msg=  base64_encode($msg);
    header("Location:../view/login.php?msg=$msg&url=$url"); 
}else{ //Valid user name and password
    
$row=$result->fetch(PDO::FETCH_BOTH);
    
    
    
    //To get remote ip address - http://stackoverflow.com/questions/15699101/get-the-client-ip-address-using-php
    
    
    $log_ip=get_ip_address();
    
    
    $log_id=$obj->insertLog($log_ip, $row['learn_id']); //Maintaining logs
    
    //$rowuser['log_id']=$log_id;
    array_push($row, $log_id);
    //print_r($rowuser);
    //print_r($rowmodule);
    $_SESSION['row']=$row;
    //Role Modules
 
    header("Location:$url"); 
    
}


}
}