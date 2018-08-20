<?php
require("pdf/fpdf.php");
include 'db.php';
session_start();

        
     if (isset($_GET['id'])){
        $sid = $_GET['id'];
        


        //$adviser = $_GET['adviser'];

        // $getid = $_GET['id'];
         //$emailsession =  $_SESSION['email'];
         //$surnamesession = $_SESSION['surname'];
         // $sectionsession = $_SESSION['section'];
         $sql = mysqli_query($db,"SELECT * FROM enrollmentform WHERE id = '$sid' "); 
         $data = mysqli_fetch_array($sql);
                 $grade = $data['grade'];
        
          $pdf = new FPDF('p','mm','A4');
        $pdf->AddPage();


        $pdf->Image("images/logo.png",30,10,28);
        $pdf->SetFont("Arial","i",14);

        $pdf->Cell(200,10,"Sampaguita High School",0,1,'C');
        $pdf->SetFont("Arial","i",11);
       


        $pdf->Cell(200,5,"Republic of the Philippines",0,1,'C');
        $pdf->Cell(200,5,"Department of Education",0,1,'C');
        $pdf->Cell(200,5,"National Capital Region",0,1,'C');
        $pdf->Cell(200,5,"Division Of School",0,1,'C');

         $pdf->Image("images/deped.jpg",145,10,50);
         $pdf->SetFont("Arial","i",14);


           

            //$usernamesession = $_SESSION['email'];

    


       

        

                
        //$pdf->Cell(138,10,$row['image'],1,1,'C');

        //cell (width,height,text,border,endline,align)


        $pdf->Cell(200,13,"",0,1,'C');

        $pdf->SetFont("Arial","B",11);


        
        $pdf->Cell(30,10,"Student name : ",0,0);
        $pdf->SetFont("Arial","i",11);

        
        $pdf->Cell(113,10, $data['sname']   .', '. $data['fname'] .' '.$data['mname'] ,0,0,'L');
        $pdf->SetFont("Arial","B",11);


       // $pdf->Cell(30,10,"First name : ",0,0,'C');

        //$pdf->SetFont("Arial","i",11);

       // $pdf->Cell(30,10, $data['fname'] ,0,0,'L');
        //$pdf->SetFont("Arial","B",11);


        // $pdf->Cell(35,10,"Middle name : ",0,0,'C');
       // $pdf->SetFont("Arial","i",11);

       // $pdf->Cell(30,10, $data['mname'] ,0,1,'L');
        //$pdf->SetFont("Arial","B",11);
        //$pdf->SetFont("Arial","i",11);

      

        $pdf->SetFont("Arial","B",11);
         $pdf->Cell(35,10,"Date Registered :",0,0,'L');
        $pdf->SetFont("Arial","i",11);
        $pdf->Cell(6,10, $data['date'] ,0,1,'L');



        $pdf->SetFont("Arial","B",11);
         $pdf->Cell(18,10,"Adviser: ",0,0,'C');
        $pdf->SetFont("Arial","i",11);
        $pdf->Cell(125,10, $data['adviser'] ,0,0,'L');

          $pdf->SetFont("Arial","B",11);
        $pdf->Cell(20,10,"Section : ",0,0, 'C');
        $pdf->SetFont("Arial","i",11);
        $pdf->Cell(80,10, $data['section'] ,0,1,'L');

       
        

        $pdf->SetFont("Arial","B",11);
        $pdf->Cell(15,10,"Grade : ",0,0,'C');
        $pdf->SetFont("Arial","i",11);
        $pdf->Cell(80,10, $data['grade'] ,0,1,'L');

         $pdf->SetFont("Arial","B",11);
         $pdf->Cell(25,10,"Assesed By : ",0,0,'L');
        $pdf->SetFont("Arial","i",11);
        $pdf->Cell(45,10,$data['assesedby'] ,0,1,'L');


        


        $pdf->SetFont("Arial","i",11);
         $pdf->Cell(200,5,"____________________________________________________________________________________________________________________________________",0,1,'C');

         $pdf->Cell(200,13,"Student's Form ",0,1,'C');

        //cell (width,height,text,border,endline,align)

        // $_GET['adviser'];

         $adviser = $_GET['adviser'];

         $query = mysqli_query($db,"SELECT * FROM enrollmentform WHERE id = '$sid' AND adviser = '$adviser' ");
         $res = mysqli_fetch_array($query);


             // $pdf->Cell(30,10,$res['sname'] ,0,0,'C');
               $pdf->SetFont("Arial","B",11);
                $pdf->Cell(39,9,"Surname: ",0,0,'C');
                $pdf->SetFont("Arial","u",11);
                $pdf->Cell(20,9, $res['sname'] ,0,1,'L');

                $pdf->SetFont("Arial","B",11);
                $pdf->Cell(40,9,"Firstname: ",0,0,'C');
                $pdf->SetFont("Arial","u",11);
                $pdf->Cell(13,9, $res['sname'] ,0,1,'L');

                $pdf->SetFont("Arial","B",11);
                $pdf->Cell(45,9,"Middle name: ",0,0,'C');
                $pdf->SetFont("Arial","u",11);
                $pdf->Cell(10,9, $res['mname'] ,0,1,'L');

                $pdf->SetFont("Arial","B",11);
                $pdf->Cell(32,9,"Email: ",0,0,'C');
                $pdf->SetFont("Arial","u",11);
                $pdf->Cell(35,9, $res['email'] ,0,1,'L');

                $pdf->SetFont("Arial","B",11);
                $pdf->Cell(42,9,"Birth Place: ",0,0,'C');
                $pdf->SetFont("Arial","u",11);
                $pdf->Cell(25,9, $res['placeofbirth'] ,0,1,'L');

                $pdf->SetFont("Arial","B",11);
                $pdf->Cell(35,9,"Gender: ",0,0,'C');
                $pdf->SetFont("Arial","u",11);
                $pdf->Cell(25,9, $res['gender'] ,0,1,'L');


                $pdf->SetFont("Arial","B",11);
                $pdf->Cell(40,9,"Birth Date: ",0,0,'C');
                $pdf->SetFont("Arial","u",11);
                $pdf->Cell(15,9, $res['dateofbirth'] ,0,1,'L');

                $pdf->SetFont("Arial","B",11);
                $pdf->Cell(30,9,"Age: ",0,0,'C');
                $pdf->SetFont("Arial","u",11);
                $pdf->Cell(25,9, $res['age'] ,0,1,'L');

                $pdf->SetFont("Arial","B",11);
                $pdf->Cell(60,9,"Elementary Graduate: ",0,0,'C');
                $pdf->SetFont("Arial","u",11);
                $pdf->Cell(15,9, $res['elementarygraduated'] ,0,1,'L');

                $pdf->SetFont("Arial","B",11);
                $pdf->Cell(40,9,"Average: ",0,0,'C');
                $pdf->SetFont("Arial","u",11);
                $pdf->Cell(20,9, $res['average'] ,0,1,'L');




        $pdf->SetFont("Arial","i",11);
        $pdf->Cell(200,5,"",0,1,'C');

         $pdf->Cell(200,15,"Guardian's Information ",0,1,'C');

                $pdf->SetFont("Arial","B",11);
                $pdf->Cell(30,9,"Father Name: ",0,0,'C');
                $pdf->SetFont("Arial","u",11);
                $pdf->Cell(25,9, $res['father'] ,0,0,'L');

                $pdf->SetFont("Arial","B",11);
                $pdf->Cell(55,9,"Father Occupation: ",0,0,'C');
                $pdf->SetFont("Arial","u",11);
                $pdf->Cell(25,9, $res['fatheroccupation'] ,0,0,'L');

                $pdf->SetFont("Arial","B",11);
                $pdf->Cell(40,9,"Father Occupation: ",0,0,'C');
                $pdf->SetFont("Arial","u",11);
                $pdf->Cell(25,9, $res['fatheroccupation'] ,0,1,'L');


                $pdf->SetFont("Arial","B",11);
                $pdf->Cell(30,9,"Mother Name: ",0,0,'C');
                $pdf->SetFont("Arial","u",11);
                $pdf->Cell(25,9, $res['mother'] ,0,0,'L');

                $pdf->SetFont("Arial","B",11);
                $pdf->Cell(55,9,"Mother Occupation: ",0,0,'C');
                $pdf->SetFont("Arial","u",11);
                $pdf->Cell(25,9, $res['motheroccupation'] ,0,0,'L');

                $pdf->SetFont("Arial","B",11);
                $pdf->Cell(40,9,"Mother Occupation: ",0,0,'C');
                $pdf->SetFont("Arial","u",11);
                $pdf->Cell(25,9, $res['motheroccupation'] ,0,1,'L');




             
                

        $pdf->Cell(200,15,"____________________________________________________________________________________________________________________________________",0,1,'C');

    

       






        $pdf->SetFont("Arial","i",11);



           $pdf->Cell(200,5,"Address: Sampaguita, Camarin, Paraiso St, Caloocan",0,1,'C');
        $pdf->SetFont("Arial","i",11);

        $pdf->Cell(200,5,"Contact-us : 09493311601 ",0,1,'C');
        $pdf->Cell(200,5,"Department of Education",0,1,'C');
        $pdf->Cell(200,5,"Note!: That this form / receipt will valid until october 31",0,1,'C');
     


        $pdf->output();




        $pdf = new PDF();
        $pdf->AliasNbPages();

        }else{
            echo "Error";
        }
        
?>