<?php

	class pdfgenerator 
	{
		function pdfgenerator() 
	   	{
		   	error_reporting(E_ALL | E_STRICT);
			ini_set('display_errors', 'On'); 
			//putenv('TZ=Europe/Berlin');
			date_default_timezone_set('UTC');	
	   	}
		function customspecialchars($text)
		{
			return htmlspecialchars($text,ENT_COMPAT,'ISO-8859-1', true);
		}
		
	   	function generateSimpleTypeDE ($type, $data, $user, $menge)
	   	{
	   		require('simpleTypeDE.php');
			//PDF generieren
			$simpleTypeDE = new simpleTypeDE();
			$pdf = $simpleTypeDE->generate($type, $data);		
			//PDF speichern
			$fname = $this->writePDF($pdf, $data[0], $menge);
			//Liese Empfänger Adressen und schreibe E-Mails
			$datei = "conf.dat"; // Name der Datei
	    	$entrysArray = file($datei); // Datei in ein Array einlesen
	    	$anzentrys = sizeof($entrysArray);
	   		for ($i = 0; $i < $anzentrys; $i++) 
	   		{
				$this->sendMail($entrysArray[$i], $fname, $user, $menge);
	   		}
	   	}

	   	function generateTwoSided ($type, $data, $user, $menge)
	   	{
	   		require('twoSided.php');
	   		//PDF generieren
			$twoSided = new twoSided();
			$pdf = $twoSided->generate($type, $data);		
			//PDF speichern
			$fname = $this->writePDF($pdf, $data[0], $menge);
			//Liese Empfänger Adressen und schreibe E-Mails
			$datei = "conf.dat"; // Name der Datei
	    	$entrysArray = file($datei); // Datei in ein Array einlesen
	    	$anzentrys = sizeof($entrysArray);
	   		for ($i = 0; $i < $anzentrys; $i++) 
	   		{
				$this->sendMail($entrysArray[$i], $fname, $user, $menge);
	   		}	
	   	}
	   	
	   	function generateTwoSidedBackEditable($type, $dataFront, $dataBack, $user, $menge)
	   	{
	   		require('twoSidedBackEditable.php');
	   		//PDF generieren
			$twoSidedBackEditable = new twoSidedBackEditable();
			$pdf = $twoSidedBackEditable->generate($type, $dataFront, $dataBack);		
			//PDF speichern
			$fname = $this->writePDF($pdf, $dataFront[0], $menge);
			//Liese Empfänger Adressen und schreibe E-Mails
			$datei = "conf.dat"; // Name der Datei
	    	$entrysArray = file($datei); // Datei in ein Array einlesen
	    	$anzentrys = sizeof($entrysArray);
	   		for ($i = 0; $i < $anzentrys; $i++) 
	   		{
				$this->sendMail($entrysArray[$i], $fname, $user, $menge);
	   		}	
	   	}
		
		function generate601 ($type, $data, $user, $menge)
	   	{
	   		require('kkSimple01.php');
			//PDF generieren
			$kkSimple01 = new kkSimple01();
			$pdf = $kkSimple01->generate($type, $data);		
			//PDF speichern
			$fname = $this->writePDF($pdf, $data[0], $menge);
			//Liese Empfänger Adressen und schreibe E-Mails
			$datei = "conf.dat"; // Name der Datei
	    	$entrysArray = file($datei); // Datei in ein Array einlesen
	    	$anzentrys = sizeof($entrysArray);
	   		for ($i = 0; $i < $anzentrys; $i++) 
	   		{
				$this->sendMail($entrysArray[$i], $fname, $user, $menge);
	   		}
	   	}
	   	
		private function writePDF($pdfToWrite, $name, $anzahl)
		{
		    $now = date("_dmy(His)", strtotime(date('r')));
			$filename = strtolower($name.$now."_".$anzahl.".pdf");
			$filename = str_replace("ö", "oe", $filename);
			$filename = str_replace("ä", "ae", $filename);
			$filename = str_replace("ü", "ue", $filename);
			$filename = str_replace(" ", "_", $filename);
			$filename = urlencode ($filename);
			$pdfToWrite->Output("vcards/".htmlspecialchars_decode($filename), "F");
			return $filename;
		}
		
		private function sendMail($empfaenger, $fname, $user, $menge)
		{
			$absendername = "VK PDF Generator";
			$absendermail = "VK.Generator@e-druck.ch";
			$betreff = "Bestellung";
			$text = "Guten Tag \n\nSoeben ist eine Bestellung von User $user eingegangen. \n\nMenge: $menge \n\nPDF: http://kssg-visitenkarten.ch/vcards/".urlencode($fname);
		
			mail($empfaenger, $betreff, $text, "From: $absendername <$absendermail>");	
		}

public function mailcheck($mail) 
	{
	$pdfGenerator = new pdfGenerator();
		$email = $pdfGenerator->customspecialchars($mail);
		if (!preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/', $email) ) 
		{
			return false;
		}

		return true;
	}


	}		
		
?>