<?php

	require('fpdf/fpdf.php');
	require('fpdf/fpdi.php');

	class kkSimple01 
	{
		
		function generate($type, $dataArray) 
	   	{	
			$pdf = new FPDI();
			$size = array(105,210);
			
			
			//PDF erstellen, Vorderseite Vorlage laden
			$anzahl = $pdf->setSourceFile("resource/template/pdf/KSSG-KK".$type."_VS.pdf");
		    $pdf-> addPage('mm', $size);
		    $hdl2 = $pdf->ImportPage(1);
		    $pdf-> useTemplate($hdl2);
			
			//PDF erstellen, Vorderseite Vorlage laden
			$anzahl = $pdf->setSourceFile("resource/template/pdf/KSSG-KK".$type.".pdf");        
			$hdl = $pdf->ImportPage(1);
			
		    $pdf-> AddFont('FrutigerLTStd-Bold');
		    $pdf-> AddFont('FrutigerLTStd-Light');
		    $pdf-> AddFont('FrutigerLTStd-Roman');
		    $pdf-> addPage('mm', $size);
		    $pdf-> useTemplate($hdl);
		    $pdf-> SetAutoPageBreak(false);

 
			for ($i = 0; $i < sizeof($dataArray); $i++) 
	   		{
				$dataArray[$i] = htmlspecialchars_decode($dataArray[$i]);
				
	   		}

			
			$spaceLeft = -24.35;
			
			$lowestPos = 83.05;	
			$diff = 3.53;
			
			$pdf-> SetFont('FrutigerLTStd-Light','',8);
			
			//Write web
			$pdf-> SetXY($spaceLeft, $lowestPos);
		    $pdf-> Cell(20, 5, $dataArray[7], 0, 1, "R");
			$lowestPos = $lowestPos - $diff;
			
			//Write mail
			$pdf-> SetXY($spaceLeft, $lowestPos);
		    $pdf-> Cell(20, 5, $dataArray[6], 0, 1, "R");
			$lowestPos = $lowestPos - $diff;
		    
		    //WriteDnr
			$pdf-> SetXY($spaceLeft, $lowestPos);
		    $pdf-> Cell(20, 5, $dataArray[5], 0, 1, "R");
		    $lowestPos = $lowestPos - $diff;
			    
			//Write Zusatz
		    if (!$dataArray[4] == "")
			{
				$pdf-> SetXY($spaceLeft, $lowestPos);
		    	$pdf-> Cell(20, 5, $dataArray[4], 0, 1, "R");
		    	$lowestPos = $lowestPos - $diff;			
			}
	
			//Write abteilung
		   	if (!$dataArray[3] == "")
			{
				$pdf-> SetXY($spaceLeft, $lowestPos);
		    	$pdf-> Cell(20, 5, $dataArray[3], 0, 1, "R");
		    	$lowestPos = $lowestPos - $diff;			
			}
			
			//Write f2
		    if (!$dataArray[2] == "")
			{
				$pdf-> SetXY($spaceLeft, $lowestPos);
		    	$pdf-> Cell(20, 5, $dataArray[2], 0, 1, "R");
		    	$lowestPos = $lowestPos - $diff;			
			}
			
			//write f1 - pflichtfeld!!
			$pdf-> SetXY($spaceLeft, $lowestPos);
		    $pdf-> Cell(20, 5, $dataArray[1], 0, 1, "R");
		    $lowestPos = $lowestPos - $diff;		
			
			//write name - pflichtfeld!!
			$pdf-> SetXY($spaceLeft, $lowestPos);
		    $pdf-> Cell(20, 5, $dataArray[0], 0, 1, "R");
		
	

		    
		    
			return $pdf;
		}		
	}
?>
	



	