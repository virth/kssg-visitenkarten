<?php 
	require('logic/pdfgenerator.php');

	
	
	$name = "";
	$function1 = "";
	$function2 = "";
	$abteilung = "";
	$zusatz = "";
	$dnr = "+41 71";
	$mnr = "+41 7";
	$fax = "+41 71";
	$mail = "@kssg.ch";
	$nstyle = "";
	$f1style = "";
	$f2style = "";
	$anzstyle = "";
	$nstyle = "";
	$nstyle = "";
	$nstyle = "";
	$errMsg = "";
	$namepos = 0;
	$function1pos = 0;
	$function2pos = 0;
	$abteilungpos = 0;
	$zusatzpos = 0;
	$dnrpos = 0;
	$mnrpos = 0;
	$faxpos = 0;
	$mailpos = 0;
	$readonly = "";
	$typ;
	$anz;
	$msg = "";
				$pdfGenerator = new pdfGenerator();
	$Efunction1 = "";
	$Efunction2 = "";
	$Eabteilung = "";
	$Ezusatz = "";
	$Ef1style = "";
	$Ef2style = "";
	$Eanzstyle = "";
	$EerrMsg = "";
	$Efunction1pos = 0;
	$Efunction2pos = 0;
	$Eabteilungpos = 0;
	$Ezusatzpos = 0;
	$Ereadonly = "";
	$Etyp;
	$Eanz;
	$Emsg = "";
	$Efax = "";
	
	$errText = "Es wurden nicht alle Pflichtfelder ausgefüllt!";

	
	if (isset($_POST['name']))
{
		$name = $pdfGenerator->customspecialchars(trim($_POST['name']));
	$Ename = $pdfGenerator->customspecialchars(trim($_POST['name']));
}
	if (isset($_POST['function1'])) 
		$function1 = $pdfGenerator->customspecialchars(trim($_POST['function1']));
	if (isset($_POST['function2']))
		$function2 = $pdfGenerator->customspecialchars(trim($_POST['function2']));
	if (isset($_POST['abteilung'])) 
		$abteilung = $pdfGenerator->customspecialchars(trim($_POST['abteilung']));
	if (isset($_POST['zusatz'])) 
		$zusatz = $pdfGenerator->customspecialchars(trim($_POST['zusatz']));
	if (isset($_POST['dnr'])) 
{
		$dnr = $pdfGenerator->customspecialchars(trim($_POST['dnr']));
		$Ednr = $pdfGenerator->customspecialchars(trim($_POST['dnr']));
}
	if (isset($_POST['mnr'])) 
{		$Emnr = $pdfGenerator->customspecialchars(trim($_POST['mnr']));
		$mnr = $pdfGenerator->customspecialchars(trim($_POST['mnr']));
}	if (isset($_POST['fax']))
{
$Efax = $pdfGenerator->customspecialchars(trim($_POST['fax']));
		$fax = $pdfGenerator->customspecialchars(trim($_POST['fax']));
}	if (isset($_POST['mail'])) 
{
		$Email = $pdfGenerator->customspecialchars(trim($_POST['mail']));
		$mail = $pdfGenerator->customspecialchars(trim($_POST['mail']));
}	if (isset($_POST['typ'])) 
		$typ = $pdfGenerator->customspecialchars(trim($_POST['typ']));
	if (isset($_POST['anz'])) 
		$anz = $pdfGenerator->customspecialchars(trim($_POST['anz']));
	if (isset($_POST['Efunction1'])) 
		$Efunction1 = $pdfGenerator->customspecialchars(trim($_POST['Efunction1']));
	if (isset($_POST['Efunction2']))
		$Efunction2 = $pdfGenerator->customspecialchars(trim($_POST['Efunction2']));
	if (isset($_POST['Eabteilung'])) 
		$Eabteilung = $pdfGenerator->customspecialchars(trim($_POST['Eabteilung']));
	if (isset($_POST['Ezusatz'])) 
		$Ezusatz = $pdfGenerator->customspecialchars(trim($_POST['Ezusatz']));
	
	if(isset($_POST['preview']))
	{
		if ($name == "")
		{
			$nstyle = "border-color:#ff0000;";
			$errMsg = $errText;
		}
		if ($function1 == "")
		{
			$f1style = "border-color:#ff0000;";
			$errMsg = $errText;
		}
		if ($dnr == "")
		{
			$dnrstyle = "border-color:#ff0000;";
			$errMsg = $errText;
		}
		if ($mail == "")
		{
			$mailstyle = "border-color:#ff0000;";
			$errMsg = $errText;
		}

if(!$pdfGenerator ->mailcheck($mail))
	{
		$mailstyle = "border-color:#ff0000;";
		$errMsg = 'Mail Adresse falsch';
	}
		if ($Efunction1 == "")
		{
			$Ef1style = "border-color:#ff0000;";
			$errMsg = $errText;
		}
		if ($errMsg == "")
		{
		}
	}
	
	$lowestPos = 225;
	$diff = 17;
	$blockdiff = 33;
	
	$ElowestPos = 225;
	$Ediff = 17;
	$Eblockdiff = 33;
		
	//Write Mail
	$mailpos = $lowestPos;
	$lowestPos = $lowestPos - $diff;
	
	//Write Fax
	if (!$fax == "")
	{
		$faxpos = $lowestPos;
		$lowestPos = $lowestPos - $diff;
	}

	//WriteMnr
	if (!$mnr == "")
	{
		$mnrpos = $lowestPos;
		$lowestPos = $lowestPos - $diff;
	}
	
	//WriteDnr
	$dnrpos = $lowestPos;
	$lowestPos = $lowestPos - $blockdiff;
		
	//Write Zusatz
	if (!$zusatz == "")
	{
		$zusatzpos = $lowestPos;
		$lowestPos = $lowestPos - $diff;
	}
	
	//Write Abteilung
	if (!$abteilung == "")
	{
		$abteilungpos = $lowestPos;
		$lowestPos = $lowestPos - $diff;
	}
	
	//Write f2
	if (!$function2 == "")
	{
		$function2pos = $lowestPos;
		$lowestPos = $lowestPos - $diff;
	}
	
	//write f1 - pflichtfeld!!
	$function1pos = $lowestPos;
	$lowestPos = $lowestPos - $diff;		
	
	//write name - pflichtfeld!!
	$namepos = $lowestPos;

	
	
	
	/////////////////////////////////
	//EEEEEE
	/////////////////////////////////
	
	
	//Write Mail
	$Emailpos = $ElowestPos;
	$ElowestPos = $ElowestPos - $Ediff;
	
	//Write Fax
	if (!$Efax == "")
	{
		$Efaxpos = $ElowestPos;
		$ElowestPos = $ElowestPos - $Ediff;
	}

	//WriteMnr
	if (!$mnr == "")
	{
		$Emnrpos = $ElowestPos;
		$ElowestPos = $ElowestPos - $Ediff;
	}
	
	//WriteDnr
	$Ednrpos = $ElowestPos;
	$ElowestPos = $ElowestPos - $Eblockdiff;
	

	
	
	//Write Zusatz
	if (!$Ezusatz == "")
	{
		$Ezusatzpos = $ElowestPos;
		$ElowestPos = $ElowestPos - $Ediff;
	}
	
	//Write Abteilung
	if (!$Eabteilung == "")
	{
		$Eabteilungpos = $ElowestPos;
		$ElowestPos = $ElowestPos - $Ediff;
	}
	
	//Write f2
	if (!$Efunction2 == "")
	{
		$Efunction2pos = $ElowestPos;
		$ElowestPos = $ElowestPos - $Ediff;
	}
	
	//write f1 - pflichtfeld!!
	$Efunction1pos = $ElowestPos;
	$ElowestPos = $ElowestPos - $Ediff;		
	
	//write name - pflichtfeld!!
	$Enamepos = $ElowestPos;		
		
	
	if(isset($_POST['order']))
	{
		if ($name == "")
		{
			$nstyle = "border-color:#ff0000;";
			$errMsg = $errText;
		}
		if ($function1 == "")
		{
			$f1style = "border-color:#ff0000;";
			$errMsg = $errText;
		}
		if ($dnr == "")
		{
			$dnrstyle = "border-color:#ff0000;";
			$errMsg = $errText;
		}
		if ($mail == "")
		{
			$mailstyle = "border-color:#ff0000;";
			$errMsg = $errText;
		}
if(!$pdfGenerator ->mailcheck($mail))
	{
		$mailstyle = "border-color:#ff0000;";
		$errMsg = 'Mail Adresse falsch';
	}
		if ($anz == "")
		{
			$anzstyle = "border-color:#ff0000;";
			$errMsg = $errText;
		}
		if ($Ename == "")
		{
			$Enstyle = "border-color:#ff0000;";
			$errMsg = $errText;
		}
		if ($Efunction1 == "")
		{
			$Ef1style = "border-color:#ff0000;";
			$errMsg = $errText;
		}
		if ($Ednr == "")
		{
			$Ednrstyle = "border-color:#ff0000;";
			$errMsg = $errText;
		}
		if ($Email == "")
		{
			$Emailstyle = "border-color:#ff0000;";
			$errMsg = $errText;
		}
		if ($errMsg == "")
		{
			//PDF Generieren und bestätigung rausgeben

			$data1 = array($name, $function1, $function2, $abteilung, $zusatz, $dnr, $mnr, $fax, $mail);
			$data2 = array($Ename, $Efunction1, $Efunction2, $Eabteilung, $Ezusatz, $Ednr, $Emnr, $Efax, $Email);
			$pdfGenerator->generateTwoSidedBackEditable($typ, $data1, $data2, $_SESSION['username'], $anz);
			$msg = '<span style="font-style:bold;color:#D6DB2F;font-weight:bold;">Herzlichen Dank f&uuml;r Ihre Bestellung!</span> <br /> <a href="index.php?site=auswahl">Neue Visitenkarte erstellen</a>';
			echo "<SCRIPT> alert('Vielen Dank für Ihre Bestellung');</SCRIPT>";
		}
	}
	
		include_once 'views/header.php';
		echo $errMsg;
		echo $msg;
		
?>


<script>
function confirmSubmit()
{
var agree=confirm("Sind Sie sicher dass Sie bestellen möchten? Haben Sie alle Texte nochmals überprüft?");
if (agree)
	return true ;
else
	return false ;
}
</script>

		
				<form action="index.php?site=formular" method="post">
					<table border="0" cellpadding="0" cellspacing="8" style="border-color:#ff0000;color:#ffffff;">
						<tr>
						  <td align="right">Titel Vorname Name:</td>
						  <td><input name="name" type="text" size="30" style="<?php echo $nstyle; ?>px" <?php echo $readonly; ?> maxlength="36" value="<?php echo $name; ?>"></td>
						</tr>
						<tr>
						  <td align="right">Funktion Zeile 1:</td>
						  <td><input name="function1" type="text" size="30" style="<?php echo $f1style; ?>px" <?php echo $readonly; ?> maxlength="36" value="<?php echo $function1; ?>"></td>
						</tr>
						<tr>
						  <td align="right">Funktion Zeile 2:</td>
						  <td><input name="function2" type="text" size="30" style="<?php echo $f2style; ?>px" <?php echo $readonly; ?> maxlength="36" value="<?php echo $function2; ?>" ></td>
						</tr>
						<tr>
						  <td align="right">Abteilung:</td>
						  <td><input name="abteilung" type="text" size="30" style="<?php echo $zstyle; ?>px" <?php echo $readonly; ?> maxlength="36" value="<?php echo $abteilung; ?>"></td>
						</tr>
						<tr>
						  <td align="right">Zusatz:</td>
						  <td><input name="zusatz" type="text" size="30" style="<?php echo $zstyle; ?>px" <?php echo $readonly; ?> maxlength="36" value="<?php echo $zusatz; ?>"></td>
						</tr>
						<tr>
						  <td align="right">Tel. Direkt:</td>
						  <td><input name="dnr" type="text" size="30" style="<?php echo $dnrstyle; ?>px" <?php echo $readonly; ?> maxlength="36" value="<?php echo $dnr; ?>"></td>
						</tr>
						<tr>
						  <td align="right">Tel. Mobile:</td>
						  <td><input name="mnr" type="text" size="30" style="<?php echo $mnrstyle; ?>px" <?php echo $readonly; ?> maxlength="36" value="<?php echo $mnr; ?>"></td>
						</tr>
						<tr>
						  <td align="right">Fax:</td>
						  <td><input name="fax" type="text" size="30" style="<?php echo $faxstyle; ?>px" <?php echo $readonly; ?> maxlength="36" value="<?php echo $fax; ?>"></td>
						</tr>
						<tr>
						  <td align="right">Mail:</td>
						  <td><input name="mail" type="text" size="30" style="<?php echo $mailstyle; ?>px" <?php echo $readonly; ?> maxlength="36" value="<?php echo $mail; ?>"></td>
						</tr>
						
						<tr>
						  <td align="right">&nbsp;</td>
						  <td>&nbsp;</td>
						</tr>
						
						
						<tr>
						  <td align="right">Funktion Zeile 1 (RS):</td>
						  <td><input name="Efunction1" type="text" size="30" style="<?php echo $Ef1style; ?>px" <?php echo $readonly; ?> maxlength="36" value="<?php echo $Efunction1; ?>"></td>
						</tr>
						<tr>
						  <td align="right">Funktion Zeile 2 (RS):</td>
						  <td><input name="Efunction2" type="text" size="30" style="<?php echo $Ef2style; ?>px" <?php echo $readonly; ?> maxlength="36" value="<?php echo $Efunction2; ?>" ></td>
						</tr>
						<tr>
						  <td align="right">Abteilung (RS):</td>
						  <td><input name="Eabteilung" type="text" size="30" style="<?php echo $Ezstyle; ?>px" <?php echo $readonly; ?> maxlength="36" value="<?php echo $Eabteilung; ?>"></td>
						</tr>
						<tr>
						  <td align="right">Zusatz (RS):</td>
						  <td><input name="Ezusatz" type="text" size="30" style="<?php echo $Ezstyle; ?>px" <?php echo $readonly; ?> maxlength="36" value="<?php echo $Ezusatz; ?>"></td>
						</tr>
						<tr>
							<td><p>&nbsp;</p></td>
							<td style="padding-top:10;">
								<input type="hidden" name="typ" value="<?php echo $typ; ?>" >
								<input type="submit" value=" Vorschau aktualisieren " name="preview">
							</td>
						</tr>
						<tr>
							<td style=padding-top:60px;><p>&nbsp;</p></td>
							<td style=padding-top:60px;>
								<hr width="100%" noshade style="margin-top:10px;border:none;border-top:1px;color:#FFFFFF;background-color:#FFFFFF;height:3px" size="5" />
							</td>
						</tr>
						<tr>
							<td align="right">Anzahl:</td>
							<td>
								<select name="anz" size="1">
	      							<option>100</option>
									<option>200</option>
								</select>
								<input type="hidden" name="typ" value="<?php echo $typ; ?>">
								<input type="submit" value=" Bestellen " name="order" onClick="return confirmSubmit()">
							</td>
						</tr>
					</table>
				</form>
				
			</div>
			<div style="background:white;position:absolute;top:160px;left:480px;height:255px;width:400px;border-style:solid;border-color:#000;border-width:1px;margin-left:80;margin-top:30px;">
				<img src="resource/template/img/KSSG-VK_<?php  echo $typ; ?>_empty.jpg" width="400px" />
				<div style="font-family:frutigerbold;font-size:12px;position:absolute;left:13px;top:<?php echo $namepos; ?>;" id="name"><?php echo $name; ?></div>
				<div style="font-family:frutiger;font-size:12px;position:absolute;left:13px;top:<?php echo $function1pos; ?>;" id="function1"><?php echo $function1; ?></div>
				<div style="font-family:frutiger;font-size:12px;position:absolute;left:13px;top:<?php echo $function2pos; ?>;" id="function2"><?php echo $function2; ?></div>
				<div style="font-family:frutiger;font-size:12px;position:absolute;left:13px;top:<?php echo $abteilungpos; ?>;" id="abteilung"><?php echo $abteilung; ?></div>
				<div style="font-family:frutiger;font-size:12px;position:absolute;left:13px;top:<?php echo $zusatzpos; ?>;" id="zusatz"><?php echo $zusatz; ?></div>
				<div style="font-family:frutiger;font-size:12px;position:absolute;left:13px;top:<?php echo $dnrpos; ?>;" id="dnrT">Direkt</div>				
				<div style="font-family:frutiger;font-size:12px;position:absolute;left:53px;top:<?php echo $dnrpos; ?>;" id="dnr"><?php echo $dnr; ?></div>
				<div style="font-family:frutiger;font-size:12px;position:absolute;left:13px;top:<?php echo $mnrpos; ?>;" id="mnrT"><?php if(!$mnr == ""){ echo 'Mobile'; } ?></div>				
				<div style="font-family:frutiger;font-size:12px;position:absolute;left:53px;top:<?php echo $mnrpos; ?>;" id="mnr"><?php echo $mnr; ?></div>
				<div style="font-family:frutiger;font-size:12px;position:absolute;left:13px;top:<?php echo $faxpos; ?>;" id="faxT"><?php if(!$fax == ""){ echo 'Fax'; } ?></div>
				<div style="font-family:frutiger;font-size:12px;position:absolute;left:53px;top:<?php echo $faxpos; ?>;" id="fax"><?php echo $fax; ?></div>
				<div style="font-family:frutiger;font-size:12px;position:absolute;left:13px;top:<?php echo $mailpos; ?>;" id="mail"><?php echo $mail; ?></div>
				<div style="text-align:right;" >
			</div>
			<div style="background:white;position:absolute;top:300px;left:0px;height:255px;width:400px;border-style:solid;border-color:#000;border-width:1px;">
				<img src="resource/template/img/KSSG-VK_<?php  echo $typ; ?>_RS.jpg" width="400px" />
				<div style="font-family:frutigerbold;font-size:12px;position:absolute;left:13px;top:<?php echo $Enamepos; ?>;" id="name"><?php echo $name; ?></div>
				<div style="font-family:frutiger;font-size:12px;position:absolute;left:15px;top:<?php echo $Efunction1pos; ?>;" id="function1"><?php echo $Efunction1; ?></div>
				<div style="font-family:frutiger;font-size:12px;position:absolute;left:15px;top:<?php echo $Efunction2pos; ?>;" id="function2"><?php echo $Efunction2; ?></div>
				<div style="font-family:frutiger;font-size:12px;position:absolute;left:15px;top:<?php echo $Eabteilungpos; ?>;" id="abteilung"><?php echo $Eabteilung; ?></div>
				<div style="font-family:frutiger;font-size:12px;position:absolute;left:15px;top:<?php echo $Ezusatzpos; ?>;" id="zusatz"><?php echo $Ezusatz; ?></div>
				<div style="font-family:frutiger;font-size:12px;position:absolute;left:15px;top:<?php echo $dnrpos; ?>;" id="dnrT">Direct</div>				
				<div style="font-family:frutiger;font-size:12px;position:absolute;left:55px;top:<?php echo $dnrpos; ?>;" id="dnr"><?php echo $dnr; ?></div>
				<div style="font-family:frutiger;font-size:12px;position:absolute;left:15px;top:<?php echo $mnrpos; ?>;" id="mnrT"><?php if(!$mnr == ""){ echo 'Mobile'; } ?></div>				
				<div style="font-family:frutiger;font-size:12px;position:absolute;left:55px;top:<?php echo $mnrpos; ?>;" id="mnr"><?php echo $mnr; ?></div>
				<div style="font-family:frutiger;font-size:12px;position:absolute;left:15px;top:<?php echo $faxpos; ?>;" id="faxT"><?php if(!$fax == ""){ echo 'Fax'; } ?></div>
				<div style="font-family:frutiger;font-size:12px;position:absolute;left:55px;top:<?php echo $faxpos; ?>;" id="fax"><?php echo $fax; ?></div>
				<div style="font-family:frutiger;font-size:12px;position:absolute;left:15px;top:<?php echo $mailpos; ?>;" id="mail"><?php echo $mail; ?></div>
			<div style="text-align:right;" >
		</div>
	</body>
</html>






