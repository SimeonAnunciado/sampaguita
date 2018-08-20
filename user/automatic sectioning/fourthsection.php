 <?php
                      $sqlsection="SELECT * FROM sectionlist WHERE criteria ='84' && grade ='$grade' && schoolyear='$schoolyear'";
                                            $resultsection= mysqli_query($db, $sqlsection);
                                                 while($rowsection = mysqli_fetch_array($resultsection))
                                                {
                                                  $sectionname = $rowsection['sectionname'];
                                                  $adviser = $rowsection['adviser'];
                                                }
                                                $sqlcount = "SELECT count(id) FROM enrollmentform WHERE section = '$sectionname'&& schoolyear ='$schoolyear'";        
                                                        $resultcount = mysqli_query($db, $sqlcount);
                                                        while($rowcount = mysqli_fetch_array($resultcount))
                                                        {
                                                          echo"$rowcount[0]";
                                                          echo"<br>";
                                                           if($rowcount[0] >='2')
                                                              {
                                                                $sqlsection3= "SELECT * FROM sectionlist WHERE criteria ='84a' && grade ='$grade' && schoolyear='$schoolyear'";
                                                     $resultsection3= mysqli_query($db, $sqlsection3);
                                                                                while($rowsection3 = mysqli_fetch_array($resultsection3)) 
                                                                      {
                                                                             $sectionname3 = $rowsection3['sectionname'];
                                                                              $adviser3 = $rowsection3['adviser'];
                                                                      }
                                                                          $sqlcount3 = "SELECT count(id) FROM enrollmentform WHERE section = '$sectionname3' && schoolyear ='$schoolyear'";
                                                                          $resultcount3 = mysqli_query($db, $sqlcount3);
                                                                              while($rowcount3 = mysqli_fetch_array($resultcount3))
                                                                                   {
                                                                                         echo"$rowcount3[0]";
                                                                                         echo"<br>";
                                                                                      if($rowcount3[0] >='2')
                                                                                      {
                                                                                       $query = "UPDATE enrollmentform SET sname='$surname', fname='$firstname', mname='$mname', email='$email', placeofbirth='$birthplace', gender='$gen', dateofbirth='$bday', age='$age', grade='$grade', father='$father', fatheroccupation='$occupation', fathercontact='$fathercontact', mother='$mother', motheroccupation='$motheroccupation', mothercontact='$mothercontact', address='$address', elementarygraduated='$grad', average='$average',
                                                                                        requirements = '$b', 
                                                                                         process='$process', date=NOW(), kindofuser ='$kindofuser', schoolyear='$schoolyear', section='', adviser='' WHERE username='$_SESSION[email]' ";

                                                                                         $res = mysqli_query($db,$query);
                                                                                             if ($res) {
                      
                                                                                        $_SESSION['surname']= $surname;
                                                                                         $_SESSION['firstname']= $firstname;
                                                                                         $_SESSION['middlename']= $mname;
                                                                                        $_SESSION['grade'] = $grade;
                                                                                         $_SESSION['section'] = 'No Available Sections';
                                                                                          echo"$_SESSION[section]";
                                                                                          header('location:receipt.php');
                                                                                               }                                                                  
                                                                                      }
                                                                                      else
                                                                                      {
                                                                                        $query = "UPDATE enrollmentform SET sname='$surname', fname='$firstname', mname='$mname', email='$email', placeofbirth='$birthplace', gender='$gen', dateofbirth='$bday', age='$age', grade='$grade', father='$father', mother='$mother', motheroccupation='$motheroccupation', fatheroccupation='$occupation', fathercontact='$fathercontact', mothercontact='$mothercontact', address='$address', elementarygraduated='$grad', average='$average',
                                                                                         requirements = '$b', 
                                                                                          process='$process', date=NOW(), kindofuser ='$kindofuser', schoolyear='$schoolyear', section='$sectionname3', adviser='$adviser3' WHERE username='$_SESSION[email]' ";

                                                                                         $res = mysqli_query($db,$query);
                                                                                             if ($res) {
                                                                                                    $_SESSION['surname']= $surname;
                                                                                                    $_SESSION['firstname']= $firstname;
                                                                                                    $_SESSION['middlename']= $mname;
                                                                                                     $_SESSION['grade'] = $grade;
                                                                                                     $_SESSION['section'] = $sectionname3;
                                                                                                     $_SESSION['adviser'] = $adviser3;
                                                                                                     header('location:receipt.php');
                                                                                               }
                                                                                      }  
                                                                                  }
                                                              }
                                                            else
                                                              {
                                                                 $query = "UPDATE enrollmentform SET sname='$surname', fname='$firstname', mname='$mname', email='$email', placeofbirth='$birthplace', gender='$gen', dateofbirth='$bday', age='$age', grade='$grade', father='$father', fatheroccupation='$occupation', fathercontact='$fathercontact', mother='$mother', motheroccupation='$motheroccupation', mothercontact='$mothercontact', address='$address', elementarygraduated='$grad', average='$average', requirements = '$b',  process='$process', date=NOW(), kindofuser ='$kindofuser', schoolyear='$schoolyear', section='$sectionname', adviser='$adviser' WHERE username='$_SESSION[email]'";

                                                                               $res = mysqli_query($db,$query);
                                                                                   if ($res) {
                                                                                      $_SESSION['surname']= $surname;
                                                                                      $_SESSION['firstname']= $firstname;
                                                                                      $_SESSION['middlename']= $mname;
                                                                                      $_SESSION['grade'] = $grade; 
                                                                                      $_SESSION['section'] = $sectionname;
                                                                                      $_SESSION['adviser'] = $adviser;
                                                                                      header('location:receipt.php');
                                                                                     }
                                                              }
                                                        }
?>