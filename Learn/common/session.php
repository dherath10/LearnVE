<?php
// Report simple running errors
error_reporting(E_ERROR | E_WARNING | E_PARSE);
if(!isset($_SESSION)) session_start();
if(count($_SESSION['row'])!=0){
    $row=$_SESSION['row'];
      if($row['learn_image']==""){
                        $path1="../Admin/dist/img/avatar5.png";
                    }else{
                        $path1="../images/learner_images/".$row['learn_image'];
                    }
    $co=1;
                     //echo $path1;
}else{
    $co=0;
}
?>