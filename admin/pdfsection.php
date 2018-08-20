<?php
require("pdf/fpdf.php");
include 'db.php';
session_start();

        
     if (isset($_GET['grade'])){
        $grade = $_GET['grade'];
        $section = $_GET['section'];
        $adviser = $_GET['adviser'];
        
        


        //$adviser = $_GET['adviser'];

        // $getid = $_GET['id'];
         //$emailsession =  $_SESSION['email'];
         //$surnamesession = $_SESSION['surname'];
         // $sectionsession = $_SESSION['section'];
         $sql = mysqli_query($db,"SELECT * FROM enrollmentform WHERE grade = '$grade' AND section ='$section' AND adviser='$adviser' "); 
         $data = mysqli_fetch_array($sql);
                 $grade = $data['grade'];
                 $sy = $data['schoolyear'];
        
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

        $pdf->Cell(15,10,"Adviser :" ,0,0,'L');
        $pdf->SetFont("Arial","B",11);

        $pdf->SetFont("Arial","i",11);
        $pdf->Cell(45,10, $adviser,0,0,'L');


     

        $pdf->Cell(20,10,"Section : " ,0,0,'C');
        $pdf->SetFont("Arial","B",11);

        $pdf->SetFont("Arial","i",11);
        $pdf->Cell(35,10, $section,0,0,'L');
     
        $pdf->Cell(15,10,"Grade" ,0,0,'C');
        $pdf->SetFont("Arial","B",11);
        $pdf->SetFont("Arial","i",11);
        $pdf->Cell(25,10, $grade ,0,0,'L');
   

        $pdf->Cell(15,10,"S.Y" ,0,0,'C');
        $pdf->SetFont("Arial","i",11);
        $pdf->Cell(15,10, $sy,0,0,'L');



        // Line seperation margin top //
        $pdf->Cell(0,20,"" ,0,1,'L');
        // Line seperation margin top //



        $pdf->Cell(20,10,"Student#" ,1,0,'C');
        $pdf->Cell(50,10,"Name" ,1,0,'C');
        $pdf->Cell(20,10,"Gender" ,1,0,'C');
        $pdf->Cell(17,10,"Age" ,1,0,'C');
        $pdf->Cell(90,10,"Address" ,1,1,'C');


        $sql = mysqli_query($db,"SELECT * FROM enrollmentform WHERE grade = '$grade' AND section ='$section' AND adviser='$adviser' "); 
         while($data = mysqli_fetch_array($sql)){

              $pdf->SetFont("Arial","B",11);
              $pdf->SetFont("Arial","i",11);
              $pdf->Cell(20,10, $data['stno'] ,1,0,'L');

              $pdf->SetFont("Arial","B",11);
              $pdf->SetFont("Arial","i",11);
              $pdf->Cell(50,10, $data['sname'].', '.$data['fname'] ,1,0,'L');

              $pdf->SetFont("Arial","B",11);
              $pdf->SetFont("Arial","i",11);
              $pdf->Cell(20,10, $data['gender'] ,1,0,'L');

              $pdf->SetFont("Arial","B",11);
              $pdf->SetFont("Arial","i",11);
              $pdf->Cell(17,10, $data['age'] ,1,0,'L');

             

               $pdf->SetFont("Arial","B",8);
              $pdf->SetFont("Arial","i",11);
              $pdf->Cell(90,10, $data['address'] ,1,1,'L');

         }
    







   





       

            

                

        $pdf->Cell(200,25,"",0,1,'C');

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