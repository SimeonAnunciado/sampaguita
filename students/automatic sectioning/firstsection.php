<?php
 $sqlsection= "SELECT * FROM sectionlist WHERE criteria ='92' && grade ='$grade' && schoolyear='$schoolyear'";
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
                                                                   $sqlsection2= "SELECT * FROM sectionlist WHERE criteria ='87' && grade ='$grade' && schoolyear='$schoolyear'";
                                                                   $resultsection2= mysqli_query($db, $sqlsection2);
                                                                      while($rowsection2 = mysqli_fetch_array($resultsection2)) 
                                                                      {
                                                                             $sectionname2 = $rowsection2['sectionname'];
                                                                              $adviser2 = $rowsection2['adviser'];
                                                                      }
                                                                          $sqlcount2 = "SELECT count(id) FROM enrollmentform WHERE section = '$sectionname2' && schoolyear ='$schoolyear'";
                                                                          $resultcount2 = mysqli_query($db, $sqlcount2);
                                                                              while($rowcount2 = mysqli_fetch_array($resultcount2))
                                                                                   {
                                                                                         echo"$rowcount2[0]";
                                                                                         echo"<br>";
                                                                                      if($rowcount2[0] >='2')
                                                                                      {
                                                                                      include'thirdsection.php';
                                                                                                                                                        
                                                                                      }
                                                                                      else
                                                                                      {
                                                                                        $query = "UPDATE enrollmentform SET sname='$surname', fname='$firstname', mname='$mname', email='$email', placeofbirth='$birthplace', gender='$gen', dateofbirth='$bday', age='$age', grade='$grade', father='$father', fatheroccupation='$occupation', fathercontact='$fathercontact', mother='$mother', motheroccupation='$motheroccupation', mothercontact='$mothercontact', address='$address', elementarygraduated='$grad', average='$average',requirements = '$b',  process='$process', date=NOW(), kindofuser ='$kindofuser', schoolyear='$schoolyear', section='$sectionname2', adviser='$adviser2' WHERE id='$id'";
                                                                                       

                                                                                         $res = mysqli_query($db,$query);
                                                                                             if ($res) {
                                                                                                    $_SESSION['surname']= $surname;
                                                                                                    $_SESSION['firstname']= $firstname;
                                                                                                    $_SESSION['middlename']= $mname;
                                                                                                     
                                                                                                     $_SESSION['section'] = $sectionname2;
                                                                                                     $_SESSION['adviser'] = $adviser2;
                                                                                                     header('location:receipt.php');
                                                                                               }
                                                                                      }  
                                                                                  }

                                                              }
                                                          else
                                                              {
                                                                      $query = "UPDATE enrollmentform SET sname='$surname', fname='$firstname', mname='$mname', email='$email', placeofbirth='$birthplace', gender='$gen', dateofbirth='$bday', age='$age', grade='$grade', father='$father', fatheroccupation='$occupation', fathercontact='$fathercontact',  mother='$mother', motheroccupation='$motheroccupation',mothercontact='$mothercontact', address='$address', elementarygraduated='$grad', average='$average',requirements = '$b',  process='$process', date=NOW(), kindofuser ='$kindofuser', schoolyear='$schoolyear', section='$sectionname', adviser='$adviser' WHERE id='$id'";

                                                                               $res = mysqli_query($db,$query);
                                                                                   if ($res) {
                                                                                      $_SESSION['surname']= $surname;
                                                                                      $_SESSION['firstname']= $firstname;
                                                                                      $_SESSION['middlename']= $mname;
                                            
                                                                                      $_SESSION['section'] = $sectionname;
                                                                                      $_SESSION['adviser'] = $adviser;
                                                                                      header('location:receipt.php');
                                                                                     }
                                                              }
                                                        }


?>