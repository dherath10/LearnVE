 <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="background-color: #375566" >
                  <img src="<?php echo $path1; ?>" class="user-image" alt="User Image">
                  <span class="hidden-xs" style="color: #fff">
                      <?php echo $userInfo['user_fname']; ?>
                      
                  </span>
                </a>
                <ul class="dropdown-menu" style="background-color: #375566">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php echo $path1; ?>" class="img-circle" alt="User Image">
                    <p>
                      <?php echo $userInfo['user_fname']; ?>
                      <small> <?php echo $userInfo['role_name']; ?> Panel</small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                 
                  <!-- Menu Footer-->
                  <li class="user-footer" >
                    <div class="pull-left" >
                      <a href="profile" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="Logout.php" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>

