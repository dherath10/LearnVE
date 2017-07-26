<?php
if(isset($_GET['c'])){
?>

<select name="concept_id" id="concept__id" class="form-control" required="" 
                                onchange="showLO(this.value)">
                            <option value="">Select a Concept_</option>
                 <?php while($rowco=$resultco->fetch(PDO::FETCH_ASSOC)) {
 echo "<option value=".$rowco['concept_id'].">".$rowco['concept_name'].
         "</option>";
                     
                     
                 }
                 ?>       
                        </select>

<?php } ?>