<?php
	//Überprüfung ob der User bereits eingeloggt ist, wenn ja Weiterleitung zur Auswahl
	header('P3P: CP="CAO PSA OUR"');
	session_start();
	if (isset($_SESSION['username']))
	{
		header("location:index.php?site=auswahl");
	}
	
	$message="";
	$username="";
	$md5_password="";



	//Wenn Login gedrückt wurde Überprüfung BN&PW, entsprechende Weiterleitung
	if (isset($_POST['name']))
	{
		$username=$_POST['name'];

		if (isset($_POST['pw']))
		{
			$md5_password=md5($_POST['pw']);
		}
		else
		{
			$md5_password="";
		}

		if($username=="e-druck" and $md5_password==md5("test123"))
		{
			$_SESSION["username"] = $username;
			header("location:index.php?site=auswahl");
		}
		else
		{
			$message="--- Incorrect Username or Password ---";
		}
	}
        else if (strpos($_SERVER['REMOTE_ADDR'], "193.134.34") !== false)
	{
		$_SESSION["username"] = "kssg1";
		header("location:index.php?site=auswahl");

	}
	else
	{
		$username= "";
	}
	
	
	include_once 'header.php';

?>


	<form action="index.php" method="post">
	<? print($message); ?>
	<table border="0" cellpadding="0" cellspacing="8"
		style="color: #ffffff;">
		<tr>
			<td align="right">Login:</td>
			<td><input name="name" type="text" size="30" maxlength="30"
				value=<?php echo $username; ?>></td>
		</tr>
		<tr>
			<td align="right">Passwort:</td>
			<td><input name="pw" type="password" size="30" maxlength="40"></td>
		</tr>
		<tr>
			<td style="padding-top: 30;"><input type="submit" name="submit" value=" Login "></td>
		</tr>
	</table>
	</form>
	</div>
	</body>
</html>


<?php include_once 'footer.php'; ?>