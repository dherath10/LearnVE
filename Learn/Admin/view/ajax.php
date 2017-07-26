<?php
include '../common/DBConnect.php';

include '../model/coursemodel.php';


$ob=new Course();

if(isset($_GET['c'])){
    $resultco=$ob->viewConcept($_GET['c']);
?>

<select name="concept_id" id="concept_id" class="form-control" required="" 
                                onchange="showLO(this.value)">
                            <option value="">Select a Concept</option>
                 <?php while($rowco=$resultco->fetch(PDO::FETCH_ASSOC)) {
 echo "<option value=".$rowco['concept_id'].">".$rowco['concept_name'].
         "</option>";
                     
                     
                 }
                 ?>       
                        </select>

<?php } 
if(isset($_GET['co'])){
    $resultlo=$ob->viewLearningObjects($_GET['co']);
?>

<select name="lo_id" id="lo_id" class="form-control" required="" 
                                >
                            <option value="">Select a Concept</option>
                 <?php while($rowlo=$resultlo->fetch(PDO::FETCH_ASSOC)) {
 echo "<option value=".$rowlo['lo_id'].">".$rowlo['lo_name'].
         "</option>";
                     
                     
                 }
                 ?>       
                        </select>

<?php } ?>