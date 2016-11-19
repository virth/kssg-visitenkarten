<?php

	require('fpdf/fpdf.php');
	require('fpdf/fpdi.php');

	class twoSidedBackEditable 
	{
		
		function generate($type, $dataArrayFront, $dataArrayBack) 
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

 
			for ($i = 0; $i < sizeof($dataArrayFront); $i++) 
	   		{
				$dataArrayFront[$i] = htmlspecialchars_decode($dataArrayFront[$i]);				
	   		}

			$spaceLeft = 2.35;
			$lowestPos = 47.05;	
			$diff = 3.53;
			
			$pdf-> SetFont('FrutigerLTStd-Light','',8);
			
			//Write Mail
			$pdf-> SetXY($spaceLeft, $lowestPos);
		    $pdf-> Cell(0, 5, $dataArrayFront[8], 0, 1);
			$lowestPos = $lowestPos - $diff;
			
			//Write Fax
			if (!$dataArrayFront[7] == "")
			{
				$pdf-> SetXY($spaceLeft, $lowestPos);
			    $pdf-> Cell(0, 5, 'Fax', 0, 1);
				$pdf-> SetXY($spaceLeft + 9, $lowestPos);
			    $pdf-> Cell(0, 5, $dataArrayFront[7], 0, 1);
				$lowestPos = $lowestPos - $diff;
			}
			
			//WriteMnr
			if (!$dataArrayFront[6] == "")
			{
				$pdf-> SetXY($spaceLeft, $lowestPos);
			    $pdf-> Cell(0, 5, 'Mobile', 0, 1);
				$pdf-> SetXY($spaceLeft + 9, $lowestPos);
			    $pdf-> Cell(0, 5, $dataArrayFront[6], 0, 1);
			    $lowestPos = $lowestPos - $diff;
			}
		    
		    //WriteDnr
			$pdf-> SetXY($spaceLeft, $lowestPos);
	    	$pdf-> Cell(0, 5, 'Direkt', 0, 1);
			$pdf-> SetXY($spaceLeft + 9, $lowestPos);
		    $pdf-> Cell(0, 5, $dataArrayFront[5], 0, 1);
		    $lowestPos = $lowestPos - $diff;
	
			//write empty
			$pdf-> SetXY($spaceLeft, $lowestPos);
			$pdf-> SetXY($spaceLeft + 9, $lowestPos);
		    $pdf-> Cell(0, 5, " ", 0, 1);
		    $lowestPos = $lowestPos - $diff;
		    
			//Write Zusatz
		    if (!$dataArrayFront[4] == "")
			{
				$pdf-> SetXY($spaceLeft, $lowestPos);
		    	$pdf-> Cell(0, 5, $dataArrayFront[4], 0, 1);
		    	$lowestPos = $lowestPos - $diff;			
			}
	
			//Write abteilung
		   	if (!$dataArrayFront[3] == "")
			{
				$pdf-> SetXY($spaceLeft, $lowestPos);
		    	$pdf-> Cell(0, 5, $dataArrayFront[3], 0, 1);
		    	$lowestPos = $lowestPos - $diff;			
			}
			
			//Write f2
		    if (!$dataArrayFront[2] == "")
			{
				$pdf-> SetXY($spaceLeft, $lowestPos);
		    	$pdf-> Cell(0, 5, $dataArrayFront[2], 0, 1);
		    	$lowestPos = $lowestPos - $diff;			
			}
			
			//write f1 - pflichtfeld!!
			$pdf-> SetXY($spaceLeft, $lowestPos);
		    $pdf-> Cell(0, 5, $dataArrayFront[1], 0, 1);
		    $lowestPos = $lowestPos - $diff;		
			
			//write name - pflichtfeld!!
			$pdf-> SetFont('FrutigerLTStd-Bold','',8);
			$pdf-> SetXY($spaceLeft, $lowestPos);
		    $pdf-> Cell(0, 5, $dataArrayFront[0], 0, 1);
		
	
		    
		    
		    
		    
		    
		    
		    
		    
		    
		    /////////////////////////////////////////////////////////////
		    /////////////////////////////////////////////////////////////
		    /////////////////////////////////////////////////////////////
		    /////////////////////////////////////////////////////////////
		    //				RÜCKSEITE
		    /////////////////////////////////////////////////////////////
		    /////////////////////////////////////////////////////////////
		    /////////////////////////////////////////////////////////////
		    /////////////////////////////////////////////////////////////
		    
		    
		    
	   	  	$anzahl = $pdf->setSourceFile("resource/template/pdf/KSSG-VK".$type."_RS.pdf");
		    $pdf-> addPage('mm', $size);
		    $hdl2 = $pdf->ImportPage(1);
		    $pdf-> useTemplate($hdl2);
		    
		    
		    
			for ($i = 0; $i < sizeof($dataArrayBack); $i++) 
	   		{
				$dataArrayBack[$i] = htmlspecialchars_decode($dataArrayBack[$i]);				
	   		}

			$spaceLeft = 2.35;
			$lowestPos = 47.05;	
			$diff = 3.53;
			
			$pdf-> SetFont('FrutigerLTStd-Light','',8);
			
			//Write Mail
			$pdf-> SetXY($spaceLeft, $lowestPos);
		    $pdf-> Cell(0, 5, $dataArrayBack[8], 0, 1);
			$lowestPos = $lowestPos - $diff;
			
			//Write Fax
			if (!$dataArrayBack[7] == "")
			{
				$pdf-> SetXY($spaceLeft, $lowestPos);
			    $pdf-> Cell(0, 5, 'Fax', 0, 1);
				$pdf-> SetXY($spaceLeft + 9, $lowestPos);
			    $pdf-> Cell(0, 5, $dataArrayBack[7], 0, 1);
				$lowestPos = $lowestPos - $diff;
			}
			
			//WriteMnr
			if (!$dataArrayBack[6] == "")
			{
				$pdf-> SetXY($spaceLeft, $lowestPos);
			    $pdf-> Cell(0, 5, 'Mobile', 0, 1);
				$pdf-> SetXY($spaceLeft + 9, $lowestPos);
			    $pdf-> Cell(0, 5, $dataArrayBack[6], 0, 1);
			    $lowestPos = $lowestPos - $diff;
			}
		    
		    //WriteDnr
			$pdf-> SetXY($spaceLeft, $lowestPos);
	    	$pdf-> Cell(0, 5, 'Direct', 0, 1);
			$pdf-> SetXY($spaceLeft + 9, $lowestPos);
		    $pdf-> Cell(0, 5, $dataArrayBack[5], 0, 1);
		    $lowestPos = $lowestPos - $diff;
	
			//write empty
			$pdf-> SetXY($spaceLeft, $lowestPos);
			$pdf-> SetXY($spaceLeft + 9, $lowestPos);
		    $pdf-> Cell(0, 5, " ", 0, 1);
		    $lowestPos = $lowestPos - $diff;
		    
			//Write Zusatz
		    if (!$dataArrayBack[4] == "")
			{
				$pdf-> SetXY($spaceLeft, $lowestPos);
		    	$pdf-> Cell(0, 5, $dataArrayBack[4], 0, 1);
		    	$lowestPos = $lowestPos - $diff;			
			}
	
			//Write abteilung
		   	if (!$dataArrayBack[3] == "")
			{
				$pdf-> SetXY($spaceLeft, $lowestPos);
		    	$pdf-> Cell(0, 5, $dataArrayBack[3], 0, 1);
		    	$lowestPos = $lowestPos - $diff;			
			}
			
			//Write f2
		    if (!$dataArrayBack[2] == "")
			{
				$pdf-> SetXY($spaceLeft, $lowestPos);
		    	$pdf-> Cell(0, 5, $dataArrayBack[2], 0, 1);
		    	$lowestPos = $lowestPos - $diff;			
			}
			
			//write f1 - pflichtfeld!!
			$pdf-> SetXY($spaceLeft, $lowestPos);
		    $pdf-> Cell(0, 5, $dataArrayBack[1], 0, 1);
		    $lowestPos = $lowestPos - $diff;		
			
			//write name - pflichtfeld!!
			$pdf-> SetFont('FrutigerLTStd-Bold','',8);
			$pdf-> SetXY($spaceLeft, $lowestPos);
		    $pdf-> Cell(0, 5, $dataArrayBack[0], 0, 1);
		    
		    
		    
		    
		    
		    
			return $pdf;
		}		
	}
?>
	



	