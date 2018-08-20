
<?php
$sqlsection5= "SELECT * FROM sectionlist WHERE criteria ='80c' && grade ='$grade' && schoolyear='$schoolyear'";
 $resultsection5= mysqli_query($db, $sqlsection5);
                            while($rowsection5 = mysqli_fetch_array($resultsection5)) 
                                                                      {
                                                                             $sectionname5 = $rowsection5['sectionname'];
                                                                              $adviser5 = $rowsection5['adviser'];
                                                                      }
                                                                          $sqlcount5 = "SELECT count(id) FROM enrollmentform WHERE section = '$sectionname5' && schoolyear ='$schoolyear'";
                                                                          $resultcount5 = mysqli_query($db, $sqlcount5);
                                                                              while($rowcount5 = mysqli_fetch_array($resultcount5))
                                                                                   {
                                                                                         echo"$rowcount5[0]";
                                                                                         echo"<br>";
                                                                                      if($rowcount5[0] >='2')
                                                                                      {
                                                                                       $query = "UPDATE enrollmentform SET sname='$surname', fname='$firstname', mname='$mname', email='$email', placeofbirth='$birthplace', gender='$gen', dateofbirth='$bday', age='$age', grade='$grade', father='$father', fatheroccupation='$occupation', fathercontact='$fathercontact', mother='$mother', motheroccupation='$motheroccupation', mothercontact='$mothercontact', address='$address', elementarygraduated='$grad', average='$average',  requirements = '$b', 
                                                                                       process='$process', date=NOW(), kindofuser ='$kindofuser', schoolyear='$schoolyear', section='', adviser='' WHERE username='$_SESSION[email]'";

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
                                                                                        $query = "UPDATE enrollmentform SET sname='$surname', fname='$firstname', mname='$mname', email='$email', placeofbirth='$birthplace', gender='$gen', dateofbirth='$bday', age='$age', grade='$grade', father='$father', fatheroccupation='$occupation', fathercontact='$fathercontact', mother='$mother', motheroccupation='$motheroccupation', mothercontact='$mothercontact', address='$address', elementarygraduated='$grad', average='$average', requirements = '$b',  process='$process', date=NOW(), kindofuser ='$kindofuser', schoolyear='$schoolyear', section='$sectionname5', adviser='$adviser5' WHERE username='$_SESSION[email]' ";

                                                                                         $res = mysqli_query($db,$query);
                                                                                             if ($res) {
                                                                                                    $_SESSION['surname']= $surname;
                                                                                                    $_SESSION['firstname']= $firstname;
                                                                                                    $_SESSION['middlename']= $mname;
                                                                                                     $_SESSION['grade'] = $grade;
                                                                                                     $_SESSION['section'] = $sectionname5;
                                                                                                     $_SESSION['adviser'] = $adviser5;
                                                                                                     header('location:receipt.php');
                                                                                               }
                                                                                      }  
                                                                                  }

?>






