<?php
class User{
    
    function Login($un,$pw){
        global $con;
        $pw= sha1($pw);

$r = $con->prepare('SELECT * FROM user u,login l,role r WHERE u.role_id=r.role_id AND u.user_id=l.user_id AND l.username = ? AND l.password = ? AND u.user_status= ?');
$r->execute(array($un,$pw,"Active"));
return $r;
    }
    
    function viewModule(){
        global $con;
       
$r = $con->prepare('SELECT * FROM module');
$r->execute();
return $r;
    }
    
    function viewUsers(){
         global $con;
        $result= $con->prepare("Select * from user u,login l,role r WHERE u.User_id=l.User_id AND u.Role_id=r.Role_id");

$result->execute();
return $result;
    }
            
    
  function getUserModule($user_id){
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM module WHERE module_id IN(SELECT DISTINCT module_id FROM function WHERE fun_id IN (SELECT fun_id FROM function_user WHERE user_id= :id ))";
   
    $r = $con->prepare($sql);
    $r->bindValue(':id', $user_id);
    $r->execute();
    
    if($r->errorCode() != 0){
    $errors = $r->errorInfo();
    echo $errors[2];
    }


    return $r;
    }  
    
    function getCourseFacilitator($course_id,$role_id){
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM user WHERE role_id= :role_id AND user_id IN"
                . "(SELECT user_id FROM course_facilitator WHERE course_id= :course_id)";
   
    $r = $con->prepare($sql);
    $r->bindValue(':course_id', $course_id);
    $r->bindValue(':role_id', $role_id);
    $r->execute();
    
    return $r;
    } 
     function getQualifications($user_id){
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM qualification WHERE user_id= :user_id ORDER BY qua_id desc";
   
    $r = $con->prepare($sql);
    $r->bindValue(':user_id', $user_id);
  
    $r->execute();
    $arr=array();
   while($rowr=$r->fetch(PDO::FETCH_ASSOC)){ 
       array_push($arr, $rowr['qua_name']);
   }
   $q= implode(",", $arr);
   return $q;
    } 
    
    function getCurrentExp($user_id){
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM experience WHERE user_id= :user_id AND exp_status= :status";
   
    $r = $con->prepare($sql);
    $r->bindValue(':user_id', $user_id);
     $r->bindValue(':status', 1);
      $r->execute();
    
   return $r;
    } 
    
    
}


?>

