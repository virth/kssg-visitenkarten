<?php

					
					?>
					
					
					
					
					
					<div style="background:white;position:absolute;top:0px;left:480px;height:255px;width:400px;border-style:solid;border-color:#000;border-width:1px;margin-left:80;">
				<img src="resource/template/img/KSSG-VK_<?php  echo $typ; ?>_RS_empty.jpg" width="400px" />
				<div style="font-family:frutigerbold;font-size:12px;position:absolute;left:13px;top:<?php echo $namepos; ?>;" id="name"><?php echo $name; ?></div>
				<div style="font-family:frutiger;font-size:12px;position:absolute;left:15px;top:<?php echo $function1pos; ?>;" id="function1"><?php echo $function1; ?></div>
				<div style="font-family:frutiger;font-size:12px;position:absolute;left:15px;top:<?php echo $function2pos; ?>;" id="function2"><?php echo $function2; ?></div>
				<div style="font-family:frutiger;font-size:12px;position:absolute;left:15px;top:<?php echo $abteilungpos; ?>;" id="abteilung"><?php echo $abteilung; ?></div>
				<div style="font-family:frutiger;font-size:12px;position:absolute;left:15px;top:<?php echo $zusatzpos; ?>;" id="zusatz"><?php echo $zusatz; ?></div>
				<div style="font-family:frutiger;font-size:12px;position:absolute;left:15px;top:<?php echo $dnrpos; ?>;" id="dnrT">Direct</div>				
				<div style="font-family:frutiger;font-size:12px;position:absolute;left:55px;top:<?php echo $dnrpos; ?>;" id="dnr"><?php echo $dnr; ?></div>
				<div style="font-family:frutiger;font-size:12px;position:absolute;left:15px;top:<?php echo $mnrpos; ?>;" id="mnrT"><?php if(!$mnr == ""){ echo 'Mobile'; } ?></div>				
				<div style="font-family:frutiger;font-size:12px;position:absolute;left:55px;top:<?php echo $mnrpos; ?>;" id="mnr"><?php echo $mnr; ?></div>
				<div style="font-family:frutiger;font-size:12px;position:absolute;left:15px;top:<?php echo $faxpos; ?>;" id="faxT"><?php if(!$fax == ""){ echo 'Fax'; } ?></div>
				<div style="font-family:frutiger;font-size:12px;position:absolute;left:55px;top:<?php echo $faxpos; ?>;" id="fax"><?php echo $fax; ?></div>
				<div style="font-family:frutiger;font-size:12px;position:absolute;left:15px;top:<?php echo $mailpos; ?>;" id="mail"><?php echo $mail; ?></div>
				<div style="text-align:right;" >
			</div>