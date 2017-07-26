<?php
class Preference{
    
  function viewPreferences($learn_id){
        global $con;
       
$r = $con->prepare('SELECT * FROM preference WHERE  pre_id NOT IN (SELECT pre_id FROM learn_pre WHERE learn_id=?)');
$r->execute(array($learn_id));
return $r;
    
}

function viewPre($learn_id){
        global $con;
       
$r = $con->prepare('SELECT * FROM learn_pre lp,preference p WHERE lp.learn_id=? AND lp.pre_id=p.pre_id');
$r->execute(array($learn_id));
return $r;
    
}
function viewPre1($learn_id){
        global $con;
       
$r = $con->prepare('SELECT * FROM preference');
$r->execute();
return $r;
    
}
function viewPreference($browser){
        global $con;
       
$r = $con->prepare('SELECT * FROM preference WHERE pre_name=?');
$r->execute(array($browser));
return $r;
    
}

function addLearnPreference( $learn_id, $browser){
        $con=$GLOBALS['con']; 
        $sql="INSERT INTO learn_pre (pre_id,learn_id)"
                . "VALUES(?,?)";
        $r = $con->prepare($sql);
        
         $r->execute(array($browser,$learn_id));
         if($r ->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];
        }
        
    }

}
?>

