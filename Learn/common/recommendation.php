 <div class="panel panel-default ">
                <div class="panel panel-heading al">
                    Recommendations
                </div>
                 <div class="panel panel-body">
                   <?php
                   $objrec=new Recommendation();
                   $resultrec=$objrec->showSkillRecommendation($row['learn_id'], $course_id);
                   while($rowrec=$resultrec->fetch(PDO::FETCH_ASSOC)){ ?>
                     <div class="text-info">
                         <?php  echo $rowrec['concept_name']; ?>
                     </div> 
                     
                     <?php
                      $concept_id=$rowrec['concept_id'];
                       $resultreca=$objrec->showSkillRecommendationa($row['learn_id'], $concept_id);
                       while($rowreca=$resultreca->fetch(PDO::FETCH_ASSOC)){ 
                           if($rowreca['rec_status']=="Poor"){
                               $class="danger";
                           }else{
                               $class="warning";
                           }
                           
                           ?>
                     <div class="alert alert-<?php echo $class; ?>">
                         <a href="../content/<?php echo $rowrec['concept_code'];?>.php?#<?php echo $rowreca['lo_page'];?>">
                         <?php echo $rowreca['lo_name']; ?></a></div>
                    
                           
                            <?php
                       }
                      echo "<hr />";
                   }
                   
                   ?>
                </div>
        </div>