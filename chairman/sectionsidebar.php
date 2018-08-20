          <div class="list-group hidden-print " >
          <a href="index.php" class="list-group-item active"><span class="glyphicon glyphicon-list"></span> <?php echo$_SESSION['userlvl']; ?> Sections</a>
        <?php
          $date = date('Y');
          $dbuserlvl = $_SESSION['userlvl'];
          $sqlside="SELECT * FROM sectionlist WHERE grade='$dbuserlvl' && schoolyear='$date'";
          $resultside = mysqli_query($db, $sqlside);
                  while($row = mysqli_fetch_array($resultside))
                        {
                          $section=$row['sectionname'];
                          $sqlcount = "SELECT count(id) FROM enrollmentform WHERE process='enrolled' && grade='$dbuserlvl' && schoolyear='$date' && section ='$section'";
                          $resultcount = mysqli_query($db, $sqlcount);
                            while($rowcount = mysqli_fetch_array($resultcount))
                                {
                                  $count=$rowcount[0]
                          ?>                   
                    <a href="updatesection.php?section=<?php echo$section; ?>&&schoolyear=<?php echo$date;?>" class="list-group-item"><span class="glyphicon glyphicon-tag"></span><?php echo$section; ?><span class="badge"><?php echo$count;?></span></a>
                          <?php
                                }
                        } 



          ?>
          </div>