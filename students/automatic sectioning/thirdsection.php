<?php
$sqlsection3= "SELECT * FROM sectionlist WHERE criteria ='87a' && grade ='$grade' && schoolyear='$schoolyear'";
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
                                                                                       $query = "UPDATE enrollmentform SET sname='$surname', fname='$firstname', mname='$mname', email='$email', placeofbirth='$birthplace', gender='$gen', dateofbirth='$bday', age='$age', grade='$grade', father='$father', fatheroccupation='$occupation', fathercontact='$fathercontact',  mother='$mother', motheroccupation='$motheroccupation', mothercontact='$mothercontact', address='$address', elementarygraduated='$grad', average='$average', process='$process', date=NOW(), kindofuser ='$kindofuser', schoolyear='$schoolyear', section='',adviser=''WHERE id='$id'";

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
                                                                                        $query = "UPDATE enrollmentform SET sname='$surname', fname='$firstname', mname='$mname', email='$email', placeofbirth='$birthplace', gender='$gen', dateofbirth='$bday', age='$age', grade='$grade', father='$father', fatheroccupation='$occupation', fathercontact='$fathercontact',  mother='$mother', motheroccupation='$motheroccupation', mothercontact='$mothercontact', address='$address', elementarygraduated='$grad', average='$average', process='$process', date=NOW(), kindofuser ='$kindofuser', schoolyear='$schoolyear', section='$sectionname3', adviser='$adviser3' WHERE id='$id' ";

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
                                                                                  ?>