<?php
?>


		
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
								<input type="submit" value=" Bestellen " name="order">
							</td>
						</tr>
					</table>
				</form>
				<?php echo $msg; ?>
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
			<?php 
				if ($typ > 100 & $typ < 500)
				{
					include_once 'auswahlDoppelseitig.php';		
				}
				else if ($typ >500)
				{
					include_once 'auswahlDoppelseitigEnglisch.php';	
				}			
			?>
		</div>
	</body>
</html>
