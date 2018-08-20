<?php
require("pdf/fpdf.php");
include 'db.php';
session_start();


     if (isset($_SESSION['email'])) {
         $emailsession =  $_SESSION['email'];
         $surnamesession = $_SESSION['surname'];
         $sectionsession = $_SESSION['section'];
         $sql = mysqli_query($db,"SELECT * FROM enrollmentform WHERE email = '$emailsession' AND sname ='$surnamesession'  "); 
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


        $pdf->Cell(200,20,"",0,1,'C');

        $pdf->SetFont("Arial","B",11);


        
        $pdf->Cell(30,10,"Surname : ",0,0);
        $pdf->SetFont("Arial","i",11);

        $pdf->Cell(30,10, $data['sname'] ,0,0,'L');
        $pdf->SetFont("Arial","B",11);


        $pdf->Cell(30,10,"First name : ",0,0,'C');

        $pdf->SetFont("Arial","i",11);

        $pdf->Cell(30,10, $data['fname'] ,0,0,'L');
        $pdf->SetFont("Arial","B",11);


         $pdf->Cell(35,10,"Middle name : ",0,0,'C');
        $pdf->SetFont("Arial","i",11);

        $pdf->Cell(30,10, $data['mname'] ,0,1,'L');
        $pdf->SetFont("Arial","B",11);
        $pdf->SetFont("Arial","i",11);

        $pdf->SetFont("Arial","B",11);
        $pdf->Cell(30,10,"Section : ",0,0);
        $pdf->SetFont("Arial","i",11);
        $pdf->Cell(30,10, $sectionsession,0,0,'L');
        

        $pdf->SetFont("Arial","B",11);
        $pdf->Cell(30,10,"Year : ",0,0,'C');
        $pdf->SetFont("Arial","i",11);
        $pdf->Cell(30,10, $data['grade'] ,0,0,'L');
       


        $pdf->SetFont("Arial","B",11);
         $pdf->Cell(35,10,"Date Registered : ",0,0,'C');
        $pdf->SetFont("Arial","i",11);
        $pdf->Cell(30,10, $data['date'] ,0,1,'L');



        $pdf->SetFont("Arial","i",11);
         $pdf->Cell(200,5,"____________________________________________________________________________________________________________________________________",0,1,'C');

         $pdf->Cell(20,20,"Subjects ",0,1,'C');

        //cell (width,height,text,border,endline,align)


         $query = mysqli_query($db,"SELECT * FROM subjectlist WHERE grade ='$grade' ");
         while ($res = mysqli_fetch_array($query)) {
              $pdf->Cell(30,10,$res['grade'] ,0,0,'C');
              $pdf->Cell(160,10,$res['subjecttitle'] ,0,1,'C');
                
         }

        $pdf->Cell(200,15,"____________________________________________________________________________________________________________________________________",0,1,'C');

    

       






        $pdf->SetFont("Arial","i",11);



           $pdf->Cell(200,10,"Address: Sampaguita, Camarin, Paraiso St, Caloocan",0,1,'C');
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