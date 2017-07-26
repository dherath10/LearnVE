<?php

//print_r($_SESSION['row']);
?>
<nav class="navbar navbar-default " ID="bcolor" >
        <div class="navbar-header">
            <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="index.php" class="navbar-brand headertrans" id="navicolor">Learn</a>
        </div>
        <div id="navbarCollapse" class="collapse navbar-collapse">
            <form class="navbar-form navbar-left" action="index.php" method="post">
                <div class="form-group">
                    <input type="text" placeholder="Search" name="key" class="form-control" list="browsers">
                    <datalist id="browsers">
      <?php while($rowp=$resultp->fetch(PDO::FETCH_ASSOC)){ ?>
    <option value="<?php echo $rowp['pre_name']; ?>">
  
         <?php } ?>
  </datalist>
                </div>
                <button type="submit" name="search" class="btn btn-default sm">Submit</button>
            </form>
            
            <ul class="nav navbar-nav navbar-right" >
                <?php if(count($_SESSION['row'])==0){ ?>
              <li><a href="login.php?url=<?php echo $URL; ?>" id="navicolor"  style="color: white">Sign In</a></li>
                 <li><a href="signup.php" id="navicolor">Sign Up</a></li>
                <?php }else{ ?>
                 <li id="navicolor"><div class="ali">
                         <a href="profile.php" id="navicolor">
                             <img src="<?php echo $path1; ?>" class="img-circle" width="30" height="30" />&nbsp;<?php echo $row['learn_fname']." ".$row['learn_lname']; ?></a>
                         &nbsp;<a href="logout.php" id="navicolor"><i class="glyphicon glyphicon-log-out"> </i></a></div></li>
                <?php } ?>
            </ul>
        </div>
    </nav>
