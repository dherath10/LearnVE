<?php
include '../Admin/common/DBConnect.php';
include '../Admin/model/preferencemodel.php';
$obp=new Preference();
$resultp=$obp->viewPreferences();
?>


                           <input list="browsers" id="browser" name="browser" class="form-control input-sm" 
                                  placeholder="Enter Your Preference">
  <datalist id="browsers">
      <?php while($rowp=$resultp->fetch(PDO::FETCH_ASSOC)){ ?>
    <option value="<?php echo $rowp['pre_name']; ?>">
  
         <?php } ?>
  </datalist>
                         <br />
                           
                           <button type="button" class="btn btn-success btn-sm" onclick="addPre(document.getElementById('browser').value)">Add</button>

                         
                
                    <div>        
                         <br />  
                    <ul class="list-group">
                        
    <li class="list-group-item">First item</li>
    <li class="list-group-item">Second item</li>
    <li class="list-group-item">Third item</li>
                       
  </ul>
                </div>    
        
