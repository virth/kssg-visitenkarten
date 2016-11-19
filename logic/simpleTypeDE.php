<?php

	require('fpdf/fpdf.php');
	require('fpdf/fpdi.php');

	class simpleTypeDE 
	{
		function generate($type, $dataArray)
	   	{
	   		
			//PDF erstellen, Vorderseite Vorlage laden
			$pdf = new FPDI();
			$anzahl = $pdf->setSourceFile("resource/template/pdf/KSSG-VK".$type.".pdf");        
			$size = array(54,85);
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

			$spaceLeft = 2.35;
			$lowestPos = 47.05;	
			$diff = 3.53;
			
			$pdf-> SetFont('FrutigerLTStd-Light','',8);
			
			//Write Mail
			$pdf-> SetXY($spaceLeft, $lowestPos);
		    $pdf-> Cell(0, 5, $dataArray[8], 0, 1);
			$lowestPos = $lowestPos - $diff;
			
			//Write Fax
			if (!$dataArray[7] == "")
			{
				$pdf-> SetXY($spaceLeft, $lowestPos);
			    $pdf-> Cell(0, 5, 'Fax', 0, 1);
				$pdf-> SetXY($spaceLeft + 9, $lowestPos);
			    $pdf-> Cell(0, 5, $dataArray[7], 0, 1);
				$lowestPos = $lowestPos - $diff;
			}
			
			//WriteMnr
			if (!$dataArray[6] == "")
			{
				$pdf-> SetXY($spaceLeft, $lowestPos);
			    $pdf-> Cell(0, 5, 'Mobile', 0, 1);
				$pdf-> SetXY($spaceLeft + 9, $lowestPos);
			    $pdf-> Cell(0, 5, $dataArray[6], 0, 1);
			    $lowestPos = $lowestPos - $diff;
			}
		    
		    //WriteDnr
			$pdf-> SetXY($spaceLeft, $lowestPos);
	    	$pdf-> Cell(0, 5, 'Direkt', 0, 1);
			$pdf-> SetXY($spaceLeft + 9, $lowestPos);
		    $pdf-> Cell(0, 5, $dataArray[5], 0, 1);
		    $lowestPos = $lowestPos - $diff;
	
			//write empty
			$pdf-> SetXY($spaceLeft, $lowestPos);
			$pdf-> SetXY($spaceLeft + 9, $lowestPos);
		    $pdf-> Cell(0, 5, " ", 0, 1);
		    $lowestPos = $lowestPos - $diff;
		    
			//Write Zusatz
		    if (!$dataArray[4] == "")
			{
				$pdf-> SetXY($spaceLeft, $lowestPos);
		    	$pdf-> Cell(0, 5, $dataArray[4], 0, 1);
		    	$lowestPos = $lowestPos - $diff;			
			}
	
			//Write abteilung
		   	if (!$dataArray[3] == "")
			{
				$pdf-> SetXY($spaceLeft, $lowestPos);
		    	$pdf-> Cell(0, 5, $dataArray[3], 0, 1);
		    	$lowestPos = $lowestPos - $diff;			
			}
			
			//Write f2
		    if (!$dataArray[2] == "")
			{
				$pdf-> SetXY($spaceLeft, $lowestPos);
		    	$pdf-> Cell(0, 5, $dataArray[2], 0, 1);
		    	$lowestPos = $lowestPos - $diff;			
			}
			
			//write f1 - pflichtfeld!!
			$pdf-> SetXY($spaceLeft, $lowestPos);
		    $pdf-> Cell(0, 5, $dataArray[1], 0, 1);
		    $lowestPos = $lowestPos - $diff;		
			
			//write name - pflichtfeld!!
			$pdf-> SetFont('FrutigerLTStd-Bold','',8);
			$pdf-> SetXY($spaceLeft, $lowestPos);
		    $pdf-> Cell(0, 5, $dataArray[0], 0, 1);
		
	
			return $pdf;
		}		
	}
?>
	



	