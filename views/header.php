<?php
header("Content-Type: text/html; charset=iso-8859-1");
?>

<html>
	<head>
		<link href="style/style.css" rel="stylesheet" type="text/css" />
		<title>E-Druck Visitenkarten</title>
	</head>
	<body>
<img src="resource/logo/logo_mit_e-druck.png" class="headerLogo" />
	<img src="resource/logo/logo_kssg.png" class="headerLogo" />
	<?php 
		if(isset($_SESSION['username']))
		{ 
			echo '<a href="views/logout.php">';
			echo '<img class="logoutIMG" src="resource/button/button_logout.png" />';
			echo '</a>';
		}
 	?>
	<hr noshade />
	<div class="content" >