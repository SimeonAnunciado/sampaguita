<?php


	
	require("pdf/fpdf.php");


   		//	echo "<img src ='photo/".$row['image']."' width = '120' height='110' border='1'>";
   			
   		//$pdf->Image("polo1.jpg",-10);
	
	$pdf = new FPDF();
		$pdf->AddPage();

		$pdf->SetFont("Arial","i",16);

		$pdf->Cell(200,25,"Welcome to Sampaguita High School Reservation Form ",15,35,'C');
		

				
		//$pdf->Cell(138,10,$row['image'],1,1,'C');
		
		$pdf->Cell(50,10,"First Name: ",1,0);

		$pdf->Cell(50,10,"Last Name: ",1,0);

		$pdf->Cell(50,10,"Middle Name: ",1,0);

		$pdf->Cell(50,10,"Date of Birth: ",1,0);


		$pdf->Cell(50,10,"Gender: ",1,0);


		$pdf->Cell(50,10,"Civil Status: ",1,0);


		$pdf->Cell(50,10,"Address: ",1,0);

		$pdf->Cell(50,10,"Contact Number: ",1,0);


		$pdf->Cell(50,10,"E-mail: ",1,0);


		$pdf->Cell(50,10,"Grade: ",1,0);

		$pdf->Cell(50,10,"Enroll method: ",1,0);


		$pdf->Cell(50,10," First Name : ",1,0);

		$pdf->Cell(50,10,"Last Name : ",1,0);


		$pdf->Cell(50,10," Middle Name : ",1,0);


		$pdf->Cell(50,10," Occupation : ",1,0);


		$pdf->Cell(50,10," Contact Num. : ",1,0);


			
			
		$pdf->Cell(210,20,"Contact-us : 09493311601",20,15,'C');
		$pdf->Cell(0,5,"Address: Sampaguita, Camarin, Paraiso St, Caloocan",0,0,'C');
		$pdf->output();
		
	

?>