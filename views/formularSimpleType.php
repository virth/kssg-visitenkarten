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
	$errText = "Es wurden nicht alle Pflichtfelder ausgefüllt!";
			$pdfGenerator = new pdfGenerator();
	
	if (isset($_POST['name']))
		$name = $pdfGenerator->customspecialchars(trim($_POST['name']));
	if (isset($_POST['function1'])) 
		$function1 = $pdfGenerator->customspecialchars(trim($_POST['function1']));
	if (isset($_POST['function2']))
		$function2 = $pdfGenerator->customspecialchars(trim($_POST['function2']));
	if (isset($_POST['abteilung'])) 
		$abteilung = $pdfGenerator->customspecialchars(trim($_POST['abteilung']));
	if (isset($_POST['zusatz'])) 
		$zusatz = $pdfGenerator->customspecialchars(trim($_POST['zusatz']));
	if (isset($_POST['dnr'])) 
		$dnr = $pdfGenerator->customspecialchars(trim($_POST['dnr']));
	if (isset($_POST['mnr'])) 
		$mnr = $pdfGenerator->customspecialchars(trim($_POST['mnr']));
	if (isset($_POST['fax']))
		$fax = $pdfGenerator->customspecialchars(trim($_POST['fax']));
	if (isset($_POST['mail'])) 
		$mail = $pdfGenerator->customspecialchars(trim($_POST['mail']));
	if (isset($_POST['typ'])) 
		$typ = $pdfGenerator->customspecialchars(trim($_POST['typ']));
	if (isset($_POST['anz'])) 
		$anz = $pdfGenerator->customspecialchars(trim($_POST['anz']));	 	    
	
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
		if ($errMsg == "")
		{
		}
	}
	
	$lowestPos = 225;
	$diff = 17;
	$blockdiff = 33;
		
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
		if ($anz == "")
		{
			$anzstyle = "border-color:#ff0000;";
			$errMsg = $errText;
		}
if(!$pdfGenerator ->mailcheck($mail))
	{
		$mailstyle = "border-color:#ff0000;";
		$errMsg = 'Mail Adresse falsch';
	}
		if ($errMsg == "")
		{

			//PDF Generieren und bestätigung rausgeben
		
			$pdfGenerator->generateSimpleTypeDE($typ, array($name, $function1, $function2, $abteilung, $zusatz, $dnr, $mnr, $fax, $mail), $_SESSION['username'], $anz);
			//$msg = '<hr noshade /><div style="margin-left:120px;margin-right:120px;font-family:verdana;color:#fff;"><h4>Herzlichen Dank f&uuml;r Ihre Bestellung! </h4><p> Diese automatisch generierte Nachricht ist keine Auftragsbest&auml;tigung, sondern informiert Sie lediglich &uuml;ber den erfolgreichen Eingang Ihrer Bestellung. </p><p> Eine Auftragsbest&auml;tigung werden Sie per Mail erhalten.</p><a href="index.php?site=auswahl">Neue Visitenkarte erstellen</a></div>';
			$msg = '<span style="font-weight:bold;color:#D6DB2F;">Herzlichen Dank f&uuml;r Ihre Bestellung!</span><br /> <a href="index.php?site=auswahl">Neue Visitenkarte erstellen</a>';
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
		</div>
	</body>
</html>





