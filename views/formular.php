<?php 
	//Überprüfung ob der User bereits eingeloggt ist, wenn nicht weiter an index
	header('P3P: CP="CAO PSA OUR"');
	session_start(); 
	if(!isset($_SESSION['username']))
	{ 
		header("location:index.php"); // Re-direct to index.php
	}

	if (isset($_POST['typ'])) 
	{
		$typ = htmlspecialchars(trim($_POST['typ']),ENT_COMPAT,'ISO-8859-1', true);
		if ($typ < 100)
			include_once 'formularSimpleType.php'; 
		else if ($typ > 100 and $typ < 500)
			include_once 'formularTwoSided.php';
		else if ($typ > 500 and $typ < 600)
			include_once 'formularTwoSidedBackEditable.php';	
		else if ($typ > 600 and $typ < 700)
			include_once 'formularKorrespondenzkarte.php';	
	}
	else 
	{
		header("location:auswahl.php");
	}		
?>






