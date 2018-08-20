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


                $pdf->SetFont("Arial","B",11);
                $pdf->Cell(40,9,"Average: ",0,0,'C');
                $pdf->SetFont("Arial","u",11);
                $pdf->Cell(20,9,

                  
                    $sql = "SELECT * FROM enrollmentform WHERE process='enrolled' GROUP BY schoolyear";
                    $result = mysqli_query($con, $sql);
                     while($row = mysqli_fetch_array($result))
                {
                    $schoolyear = $row['schoolyear'];
                        $sql0 = "SELECT count(id) FROM enrollmentform WHERE grade='Grade-7' && schoolyear='$schoolyear' &&  process='enrolled'";
                    $result0 = mysqli_query($con, $sql0); 
                    while($row0 = mysqli_fetch_array($result0))
                    {
                    $grade7=$row0['0']; 
                    $sql1 = "SELECT count(id) FROM enrollmentform WHERE grade='Grade-8' && schoolyear='$schoolyear' &&  process='enrolled'";
                    $result1 = mysqli_query($con, $sql1); 
                    while($row1 = mysqli_fetch_array($result1))
                    {
                    $grade8=$row1['0'];
                    $sql2 = "SELECT count(id) FROM enrollmentform WHERE grade='Grade-9' && schoolyear='$schoolyear' &&  process='enrolled'";
                    $result2 = mysqli_query($con, $sql2); 
                    while($row2 = mysqli_fetch_array($result2))
                    {
                                $grade9=$row2['0']; 
                    $sql3 = "SELECT count(id) FROM enrollmentform WHERE grade='Grade-10' && schoolyear='$schoolyear' &&  process='enrolled'";
                    $result3 = mysqli_query($con, $sql3); 
                    while($row3 = mysqli_fetch_array($result3))
                    {
                                $grade10=$row3['0'];                                
                   echo"{ y: '$schoolyear', a: '$grade7', b: '$grade8', c: '$grade9', d: '$grade10' },";
                    }   
                    }
                    }
                    }   
                }

                 ,0,1,'L');



                <script>
Morris.Bar({
  element: 'bar-example',
  data: 
  [
  <?php 
    $con = mysqli_connect('localhost','root','','enrollment');
    $sql = "SELECT * FROM enrollmentform WHERE process='enrolled' GROUP BY schoolyear";
    $result = mysqli_query($con, $sql);
     while($row = mysqli_fetch_array($result))
{
    $schoolyear = $row['schoolyear'];
        $sql0 = "SELECT count(id) FROM enrollmentform WHERE grade='Grade-7' && schoolyear='$schoolyear' &&  process='enrolled'";
    $result0 = mysqli_query($con, $sql0); 
    while($row0 = mysqli_fetch_array($result0))
    {
    $grade7=$row0['0']; 
    $sql1 = "SELECT count(id) FROM enrollmentform WHERE grade='Grade-8' && schoolyear='$schoolyear' &&  process='enrolled'";
    $result1 = mysqli_query($con, $sql1); 
    while($row1 = mysqli_fetch_array($result1))
    {
    $grade8=$row1['0'];
    $sql2 = "SELECT count(id) FROM enrollmentform WHERE grade='Grade-9' && schoolyear='$schoolyear' &&  process='enrolled'";
    $result2 = mysqli_query($con, $sql2); 
    while($row2 = mysqli_fetch_array($result2))
    {
                $grade9=$row2['0']; 
    $sql3 = "SELECT count(id) FROM enrollmentform WHERE grade='Grade-10' && schoolyear='$schoolyear' &&  process='enrolled'";
    $result3 = mysqli_query($con, $sql3); 
    while($row3 = mysqli_fetch_array($result3))
    {
                $grade10=$row3['0'];                                
   echo"{ y: '$schoolyear', a: '$grade7', b: '$grade8', c: '$grade9', d: '$grade10' },";
    }   
    }
    }
    }   
}
?>   
  ],
  xkey: 'y',
  ykeys: ['a', 'b', 'c', 'd'],
  labels: ['Grade-7', 'Grade-8', 'Grade-9', 'Grade-10'],
  hideHover: false,
  resize: true,
  gridTextColor: 'red' 
});
      <script src="js/jquery.min.js"></script>
         <script src="morris/raphael.js"></script>
         <script src="morris/morris.min.js"></script>

            </script>
             
                

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