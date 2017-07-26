<?php
class Question{
    
    function viewQuestion(){
        global $con;
       
$r = $con->prepare('SELECT * FROM question q,level l WHERE q.lev_id=l.level_id ORDER BY q.q_id DESC');
$r->execute();
return $r;
    }
    
    function viewAQuestion($q_id){
        global $con;
       
$r = $con->prepare('SELECT * FROM question q,level l WHERE q.lev_id=l.level_id AND q.q_id=?');
$r->execute(array($q_id));
return $r;
    }
    
function viewQuestionLO($lo_id){
        global $con;
       
$r = $con->prepare('SELECT * FROM question q,level l WHERE q.lev_id=l.level_id AND q.lo_id=?');
$r->execute(array($lo_id));
return $r;
    }
    
function viewLevel(){
        global $con;
       
$r = $con->prepare('SELECT * FROM level');
$r->execute();
return $r;
    }
    
    function viewAnswerQ($q_id){
        global $con;
       
$r = $con->prepare('SELECT * FROM answer WHERE q_id=?');
$r->execute(array($q_id));
return $r;
    }
        function viewAnswer($ans_id){
        global $con;
       
$r = $con->prepare('SELECT * FROM answer WHERE ans_id=?');
$r->execute(array($ans_id));
return $r;
    }
 
 function addQuestion($q_des,$q_image,$q_type,$lev_id,$q_loc,$lo_id){
        $con=$GLOBALS['con']; 
        $sql="INSERT INTO question (q_date,q_des,q_type,lev_id,lo_id,q_image)  VALUES(CURDATE(),?,?,?,?,?)";
        $r = $con->prepare($sql);
        
         $r->execute(array($q_des,$q_type,$lev_id,$lo_id,$q_image));
         if($r ->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];
        }
        $q_id=$con->lastInsertId();
        
        if($q_image!=""){
    $destination="../../images/q_images/$q_image";
    move_uploaded_file($q_loc, $destination);
    
}
        return $q_id;
        
    }
    
    
    function addAttempt($en_id,$type_id,$concept_id){
        $con=$GLOBALS['con']; 
        $sql="INSERT INTO attempt (attempt_sdate,attempt_type,attempt_status,attempt_time,en_id,concept_id)  VALUES(NOW(),?,?,?,?,?)";
        $r = $con->prepare($sql);
        
         $r->execute(array($type_id,0,1,$en_id,$concept_id));
         if($r ->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];
        }
        $attempt_id=$con->lastInsertId();
        return $attempt_id;
    }
    
    function addAnswer($ans_des,$ans_status,$q_id){
        $con=$GLOBALS['con']; 
        $sql="INSERT INTO answer (ans_des,ans_status,q_id)  VALUES(?,?,?)";
        $r = $con->prepare($sql);
        
         $r->execute(array($ans_des,$ans_status,$q_id));
         if($r ->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];
        }
        $ans_id=$con->lastInsertId();
        return $ans_id;
    }
    
      function selectQuestions($concept_id,$level_id){
        global $con;
       
$r = $con->prepare('SELECT * FROM question WHERE lev_id=? AND lo_id IN '
        . '(SELECT lo_id FROM learningObject WHERE concept_id=?) ORDER BY RAND()');
$r->execute(array($level_id,$concept_id));
return $r;
    }
    
    function addResult($attempt_id, $q_id,$level_weight,$ans_id){
        $con=$GLOBALS['con']; 
        $sql="INSERT INTO result (attempt_id,question_id,score,ans_id)  VALUES(?,?,?,?)";
        $r = $con->prepare($sql);
        
         $r->execute(array($attempt_id, $q_id,$level_weight,$ans_id));
         if($r ->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];
        }
        
    }
    
    function viewResult($attempt_id,$q_id){
        global $con;
       
$r = $con->prepare('SELECT * FROM answer a,result r WHERE r.attempt_id=? AND r.question_id=? AND a.ans_id=r.ans_id');
$r->execute(array($attempt_id,$q_id));
 if($r ->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];
        }
return $r;
    }
    
    function viewResults($attempt_id){
        global $con;
       
$r = $con->prepare('SELECT * FROM question q,result r,level l,learningObject lo WHERE r.attempt_id=? '
        . 'AND q.q_id=r.question_id and q.lev_id=l.level_id AND lo.lo_id=q.lo_id');
$r->execute(array($attempt_id));
 if($r ->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];
        }
return $r;
    }
    
    function viewResultLO($attempt_id){
        global $con;
       
$r = $con->prepare('SELECT count(r.question_id) noq,lo.lo_name,lo.lo_id,lo.lo_page FROM question q,result r,learningObject lo WHERE r.attempt_id=? '
        . 'AND q.q_id=r.question_id AND lo.lo_id=q.lo_id group by q.lo_id');
$r->execute(array($attempt_id));
 if($r ->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];
        }
return $r;
    }
    function viewResultcLO($attempt_id,$lo_id){
        global $con;
       
$r = $con->prepare('SELECT * FROM question q,result r,learningObject lo WHERE r.attempt_id=? AND q.lo_id=? AND q.q_id=r.question_id AND lo.lo_id=q.lo_id AND r.score>0');
$r->execute(array($attempt_id,$lo_id));
 if($r ->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];
        }
return $r->rowCount();
    }
    
    function viewResultiLO($attempt_id,$lo_id){
        global $con;
       
$r = $con->prepare('SELECT * FROM question q,result r,learningObject lo WHERE r.attempt_id=? '
        . 'AND q.q_id=r.question_id AND lo.lo_id=q.lo_id AND q.lo_id=? AND r.score=0');
$r->execute(array($attempt_id,$lo_id));
 if($r ->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];
        }
        $n=$r->rowCount();
return $n;
    }
    
        function getScore($attempt_id){
        global $con;
       
$r = $con->prepare('SELECT SUM(score) as sco FROM result WHERE attempt_id=?');
$r->execute(array($attempt_id));
 if($r ->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];
        }
        $row=$r->fetch(PDO::FETCH_ASSOC);
return $row['sco'];
    }
    
    function getCCount($attempt_id){
        global $con;
       
$r = $con->prepare('SELECT COUNT(*) AS co FROM result WHERE attempt_id=? AND score>0');
$r->execute(array($attempt_id));
 if($r ->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];
        }
        $row=$r->fetch(PDO::FETCH_ASSOC);
return $row['co'];
    }
    
    function updateResult($attempt_id){
        $con=$GLOBALS['con']; 
        $sql="UPDATE attempt set attempt_fdate=NOW(),attempt_status=? WHERE attempt_id=?";
        $r = $con->prepare($sql);
        
         $r->execute(array(1,$attempt_id));
         if($r ->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];
        }
        
    }
    
    function getAResult($en_id,$concept_id){
        global $con;
       
$r = $con->prepare('SELECT * FROM attempt a,enroll e WHERE a.en_id=e.en_id AND a.concept_id=? AND e.en_id=? AND a.attempt_status=?');
$r->execute(array($concept_id,$en_id,1));
 if($r ->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];
        }
return $r;
    }
    
    function getAScore($en_id,$concept_id){
        global $con;
       
$r = $con->prepare('SELECT SUM(score) as sco FROM result WHERE attempt_id IN '
        . '(SELECT attempt_id FROM attempt a,enroll e WHERE a.en_id=e.en_id AND a.concept_id=? AND e.en_id=?)');
$r->execute(array($concept_id,$en_id));
 if($r ->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];
        }
$row=$r->fetch(PDO::FETCH_ASSOC);
return $row['sco'];
    }
    
      function getScoreConcept($concept_id){
        global $con;
       
$r = $con->prepare('SELECT SUM(score) as sco FROM result WHERE attempt_id IN '
        . '(SELECT attempt_id FROM attempt WHERE concept_id=?)');
$r->execute(array($concept_id));
 if($r ->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];
        }
$row=$r->fetch(PDO::FETCH_ASSOC);
return $row['sco'];
    }
    function noOfConceptAttempt($concept_id){
        global $con;
       
$r = $con->prepare('SELECT * FROM attempt WHERE concept_id=? AND attempt_type=?');
$r->execute(array($concept_id,1));
 if($r ->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];
        }
return $r;
    }
    //Add to skill Result
    function addSkillResult($leaner_id, $concept_id,$ep,$skill_level,$course_id){
        $con=$GLOBALS['con']; 
        $sql="INSERT INTO skill_result (datetime,learner_id,concept_id,ep,skill_level,course_id)  VALUES(NOW(),?,?,?,?,?)";
        $r = $con->prepare($sql);
        
         $r->execute(array($leaner_id, $concept_id,$ep,$skill_level,$course_id));
         if($r ->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];
        }
        
    }
    
    
}
?>

