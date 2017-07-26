
<?php while($rowm=$r->fetch(PDO::FETCH_BOTH)){
    $m=$rowm['module_name'];
    $mo= strtolower($rowm['module_name']);
   
                            $str=preg_replace('/\s+/', '', $mo);
    ?>
                <li><a href="<?php echo $str; ?>"><i class="fa fa-circle-o"></i>
                    <?php echo $m; ?> 
                        <?php if($m=="User" || $m=="Content" || $m=="Course" || $m=="Leaner" ) { ?>
                        
                        Management<?php } ?>
                    </a>
                
                    
                </li>
                
                <?php } ?>
