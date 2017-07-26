<?php
class Recommendation{
    


function addRecommendation( $learn_id, $rec_type,$id,$status,$rec_cat,$stat){
        $con=$GLOBALS['con']; 
        $sql="INSERT INTO recommendation (rec_date,rec_type,id,learn_id,rec_status,rec_cat,rec_score)"
                . "VALUES(CURDATE(),?,?,?,?,?,?)";
        $r = $con->prepare($sql);
        
         $r->execute(array($rec_type,$id,$learn_id,$status,$rec_cat,$stat));
         if($r ->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];
        }
        
    }
    
  function showSkillRecommendation( $learn_id, $course_id){
        $con=$GLOBALS['con']; 
       // $sql="SELECT c.concept_name FROM recommendation r,learningObject l,concept c,course co where r.id=l.lo_id AND l.concept_id=c.concept_id AND c.course_id=co.course_id AND co.course_id=1 AND r.learn_id=1 group by c.concept_id";
        $sql="SELECT c.concept_id,c.concept_name,c.concept_code FROM recommendation r,learningObject l,concept c,course co where "
                . "r.id=l.lo_id AND l.concept_id=c.concept_id AND c.course_id=co.course_id "
                . "AND co.course_id=? AND r.learn_id=? AND r.rec_type=? AND r.rec_cat=? GROUP BY c.concept_id ORDER BY c.concept_id DESC";
        $r = $con->prepare($sql);
        
         $r->execute(array($course_id,$learn_id, "learningObject","sk"));
         if($r ->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];
        }
        return $r;
        
    }
    
    function showSkillRecommendationa( $learn_id, $concept_id){
        $con=$GLOBALS['con']; 
       // $sql="SELECT c.concept_name FROM recommendation r,learningObject l,concept c,course co where r.id=l.lo_id AND l.concept_id=c.concept_id AND c.course_id=co.course_id AND co.course_id=1 AND r.learn_id=1 group by c.concept_id";
        $sql="SELECT * FROM recommendation r,learningObject l,concept c where r.id=l.lo_id AND l.concept_id=c.concept_id AND c.concept_id=? AND r.learn_id=? AND r.rec_type=? AND r.rec_cat=?";
        $r = $con->prepare($sql);
        
         $r->execute(array($concept_id,$learn_id, "learningObject","sk"));
         if($r ->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];
        }
        return $r;
        
    }

}
?>

