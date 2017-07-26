<?php
class Learn{
    

    
    function viewLearner(){
        global $con;
       
$r = $con->prepare('SELECT * FROM learner ORDER BY learn_id DESC');
$r->execute();
return $r;
    }
  

    function validateLogin($rn,$p){
        $con=$GLOBALS['con']; //To get connection string
        
        $sql="SELECT * FROM learner WHERE reg_no= :reg_no AND learn_pass= :learner_pass";
        $r = $con->prepare($sql);
         $r->bindValue(':reg_no', $rn);
     $r->bindValue(':learner_pass', $p);
     $r->execute();
        return $r;
    }
 
    function insertLog($log_ip,$learn_id){
        $con=$GLOBALS['con']; 
        $sql="INSERT INTO learn_log VALUES('',CURDATE(),CURTIME(),'','$learn_id','$log_ip','in')";
        $r = $con->prepare($sql);
         $r->execute();
        $log_id=$con->lastInsertId();
        if($r ->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];
        }
       return $log_id;
        
    }
    
    function insertLogOut($log_id){
        $con=$GLOBALS['con']; 
        $sql="UPDATE learn_log SET ll_out=NOW(),ll_status=:s WHERE ll_log =:log_id";
        $r = $con->prepare($sql);
         $r->bindValue(':s', "out");
         $r->bindValue(':log_id', $log_id);
         $r->execute();
      
        if($r ->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];
        }
       
        
    }
    
    
}


?>

