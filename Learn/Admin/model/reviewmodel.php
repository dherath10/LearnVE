<?php
class Review{
    
  function viewReviews($course_id){
        global $con;
       
$r = $con->prepare('SELECT * FROM course_review cr,learner l WHERE cr.course_id=? AND l.learn_id=cr.learn_id ORDER BY cr.cr_id DESC');
$r->execute(array($course_id));
return $r;
    
}

  function viewReviewsKey($course_id,$key){
        global $con;
       
$r = $con->prepare('SELECT * FROM course_review cr,learner l WHERE cr.course_id=? AND l.learn_id=cr.learn_id AND cr.review LIKE ? ORDER BY cr.cr_id DESC');
$r->execute(array($course_id,"%$key%"));
if($r ->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];
}
return $r;
    
}

    function viewReview($course_id,$learn_id){
        global $con;
       
$r = $con->prepare('SELECT * FROM course_review WHERE course_id=? AND learn_id= ?');
$r->execute(array($course_id,$learn_id));
return $r;
    
}



 function addCourseReview($course_id,$learn_id,$star,$comments){
        $con=$GLOBALS['con']; 
        $sql="INSERT INTO course_review (cr_date,course_id,learn_id,cr_status,rating,review)"
                . "VALUES(NOW(),?,?,?,?,?)";
        $r = $con->prepare($sql);
        
         $r->execute(array($course_id,$learn_id,0,$star,$comments));
         if($r ->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];
        }
        
    }
    
    
 function getRating($course_id){
           global $con;       
$r = $con->prepare('SELECT SUM(rating) as sr,COUNT(*) as co FROM course_review WHERE course_id=?');
$r->execute(array($course_id));
return $r;
     
 }
 
 function getRatingStar($course_id,$star,$c){
           global $con;       
$r = $con->prepare('SELECT COUNT(*) as co FROM course_review WHERE course_id=? AND rating=?');
$r->execute(array($course_id,$star));
$row=$r->fetch(PDO::FETCH_ASSOC);
if($row['co']==0){
    return 0;
}else{
$per=round((($row['co']/$c)*100),2);
return sprintf('%.2f',$per);
}  
 }

}
?>

