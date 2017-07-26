<?php
class Course{
    

    
    function viewCourse(){
        global $con;
       
$r = $con->prepare('SELECT * FROM course c,category ca WHERE c.cat_id=ca.cat_id ORDER BY course_id DESC');
$r->execute();
return $r;
    }
  function viewRandCourse(){
        global $con;
       
$r = $con->prepare('SELECT * FROM course c,category ca WHERE c.cat_id=ca.cat_id ORDER BY RAND()');
$r->execute();
return $r;
    }
    
    function searchCourse($key){
        global $con;
       
$r = $con->prepare('SELECT * FROM course c,category ca WHERE c.cat_id=ca.cat_id AND (c.course_name LIKE ? OR c.course_id IN (SELECT cp.course_id FROM course_pre cp,preference p WHERE cp.pre_id=p.pre_id AND p.pre_name LIKE ?))');
$r->execute(array("%$key%","%$key%"));
if($r ->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];
}
return $r;
    }

    function viewACourse($course_id){
        global $con;
       
$r = $con->prepare('SELECT * FROM course c,category ca WHERE c.cat_id=ca.cat_id AND c.course_id=?');
$r->execute(array($course_id));
return $r;
    
}

function viewAConcept($concept_id){
        global $con;
       
$r = $con->prepare('SELECT * FROM concept WHERE concept_id=?');
$r->execute(array($concept_id));
return $r;
    
}

function viewALO($lo_id){
        global $con;
       
$r = $con->prepare('SELECT * FROM learningObject WHERE lo_id=?');
$r->execute(array($lo_id));
return $r;
    
}

function viewConcept($course_id){
        global $con;
       
$r = $con->prepare('SELECT * FROM concept WHERE course_id=?');
$r->execute(array($course_id));
return $r;
    
}

function viewLearningObjects($concept_id){
        global $con;
       
$r = $con->prepare('SELECT * FROM learningObject WHERE concept_id=?');
$r->execute(array($concept_id));
return $r;
    
}
function viewCOCONLO($lo_id){
        global $con;
       
$r = $con->prepare('SELECT * FROM learningObject lo,course c,concept co WHERE lo.concept_id=co.concept_id AND '
        . 'c.course_id=co.course_id AND lo.lo_id=?');
$r->execute(array($lo_id));
return $r;
    
}
function checkCourseEnrollment($course_id,$learn_id){
        global $con;
       
$r = $con->prepare('SELECT * FROM enroll WHERE course_id=? AND learn_id=? AND en_status=?');
$r->execute(array($course_id,$learn_id,'Active'));
return $r;
    
}
 function enrollment($course_id,$learn_id){
        $con=$GLOBALS['con']; 
        $sql="INSERT INTO enroll (en_date,course_id,learn_id,en_status)  VALUES(CURDATE(),?,?,?)";
        $r = $con->prepare($sql);
        
         $r->execute(array($course_id,$learn_id,"Active"));
         if($r ->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];
        }
        
    }

}
?>

