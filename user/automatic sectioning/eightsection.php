<?php
$sqlsection4= "SELECT * FROM sectionlist WHERE criteria ='80b' && grade ='$grade' && schoolyear='$schoolyear'";
 $resultsection4= mysqli_query($db, $sqlsection4);
                            while($rowsection4 = mysqli_fetch_array($resultsection4)) 
                                                                      {
                                                                             $sectionname4 = $rowsection4['sectionname'];
                                                                              $adviser4 = $rowsection4['adviser'];
                                                                      }
                                                                          $sqlcount4 = "SELECT count(id) FROM enrollmentform WHERE section = '$sectionname4' && schoolyear ='$schoolyear'";
                                                                          $resultcount4 = mysqli_query($db, $sqlcount4);
                                                                              while($rowcount4 = mysqli_fetch_array($resultcount4))
                                                                                   {
                                                                                         echo"$rowcount4[0]";
                                                                                         echo"<br>";
                                                                                      if($rowcount4[0] >='2')
                                                                                      {
                                                                                            include'ninthsection.php';                                                                 
                                                                                      }
                                                                                      else
                                                                                      {
                                                                                        $query = "UPDATE enrollmentform SET sname='$surname', fname='$firstname', mname='$mname', email='$email', placeofbirth='$birthplace', gender='$gen', dateofbirth='$bday', age='$age', grade='$grade', father='$father', fatheroccupation='$occupation', fathercontact='$fathercontact', mother='$mother', motheroccupation='$motheroccupation', mothercontact='$mothercontact', address='$address', elementarygraduated='$grad', average='$average',  requirements = '$b',  process='$process', date=NOW(), kindofuser ='$kindofuser', schoolyear='$schoolyear', section='$sectionname4', adviser='$adviser4' WHERE username='$_SESSION[email]' ";

                                                                                         $res = mysqli_query($db,$query);
                                                                                             if ($res) {
                                                                                                    $_SESSION['surname']= $surname;
                                                                                                    $_SESSION['firstname']= $firstname;
                                                                                                    $_SESSION['middlename']= $mname;
                                                                                                     $_SESSION['grade'] = $grade;
                                                                                                     $_SESSION['section'] = $sectionname4;
                                                                                                     $_SESSION['adviser'] = $adviser4;
                                                                                                     header('location:receipt.php');
                                                                                               }
                                                                                      }  
                                                                                  }

?>