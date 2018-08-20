<?php
require("pdf/fpdf.php");
include 'db.php';
session_start();

        
     if (isset($_GET['grade'])){
        $grade = $_GET['grade'];
        $section = $_GET['section'];
        $sy = $_GET['schoolyear'];
        
        


        //$adviser = $_GET['adviser'];

        // $getid = $_GET['id'];
         //$emailsession =  $_SESSION['email'];
         //$surnamesession = $_SESSION['surname'];
         // $sectionsession = $_SESSION['section'];
         $sql = mysqli_query($db,"SELECT * FROM sectionlist WHERE grade = '$grade' "); 
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

        //cell (width,height,text,border,endline,align)


  

        



        //cell (width,height,text,border,endline,align)

        // $_GET['adviser'];
         
      

        $pdf->Cell(0,10,"" ,0,1,'L');
        $pdf->SetFont("Arial","B",11);
        $pdf->SetFont("Arial","i",11);
        $pdf->Cell(25,10,"Grade" ,1,0,'C');

        $pdf->Cell(30,10,"Section" ,1,0,'C');
        $pdf->Cell(45,10,"Adviser" ,1,0,'C');
        $pdf->Cell(15,10,"S.Y" ,1,0,'C');
        $pdf->Cell(15,10,"Male" ,1,0,'C');
        $pdf->Cell(20,10,"Female" ,1,0,'C');
        $pdf->Cell(35,10,"Total Students" ,1,1,'C');


        $query = mysqli_query($db,"SELECT count(*) as countmale FROM enrollmentform WHERE gender ='male' AND process ='enrolled' 
                AND grade='$grade' AND section = '$section' AND schoolyear= '$sy' ");
        while($row = mysqli_fetch_array($query)){
             $row['countmale'];
        }





         $query = mysqli_query($db,"SELECT * FROM sectionlist WHERE grade = '$grade' ")or die(mysql_error());
         while($res = mysqli_fetch_array($query)){

              

              $pdf->SetFont("Arial","B",11);
              $pdf->SetFont("Arial","i",11);
              $pdf->Cell(25,10, $res['grade'] ,1,0,'L');

              $pdf->SetFont("Arial","B",11);
              $pdf->SetFont("Arial","i",11);
              $pdf->Cell(30,10, $res['sectionname'] ,1,0,'C');

              $pdf->SetFont("Arial","B",11);
              $pdf->SetFont("Arial","i",11);
              $pdf->Cell(45,10, $res['adviser'] ,1,0,'C');

              $pdf->SetFont("Arial","B",11);
              $pdf->SetFont("Arial","i",11);
              $pdf->Cell(15,10, $res['schoolyear'] ,1,0,'C');

              if (5<=1) {
                    $pdf->SetFont("Arial","B",11);
                    $pdf->SetFont("Arial","i",11);
                    $pdf->Cell(15,10, "TRUE" ,1,0,'C');
              }else{
                    $pdf->SetFont("Arial","B",11);
                    $pdf->SetFont("Arial","i",11);
                    $pdf->Cell(15,10, "FALSE" ,1,0,'C');
              }

              $pdf->SetFont("Arial","B",11);
              $pdf->SetFont("Arial","i",11);
              $pdf->Cell(20,10, $res['schoolyear'] ,1,1,'C');

            


            


              
         } 




       

            

                

        $pdf->Cell(200,15,"",0,1,'C');

        $pdf->SetFont("Arial","i",11);
        $pdf->Cell(200,5,"Address: Sampaguita, Camarin, Paraiso St, Caloocan",0,1,'C');
        $pdf->SetFont("Arial","i",11);

        $pdf->Cell(200,5,"Contact-us : 09493311601 ",0,1,'C');
        $pdf->Cell(200,5,"Department of Education",0,1,'C');
        
     


        $pdf->output();




        $pdf = new PDF();
        $pdf->AliasNbPages();

        }else{
            echo "Error";
        }
        
?>