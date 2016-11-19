<?php 

	//Überprüfung ob der User bereits eingeloggt ist, wenn nicht weiter an index
	session_start(); 
	if(!isset($_SESSION['username']))
	{ 
		header("location:index.php"); // Re-direct to index.php
	}

	include_once 'header.php';


?>
	<table>
		<tr>
			<td class="auswahl">
				<h4>Kantonsspital St.Gallen 95</h4>
				<form action="index.php?site=formular" method="post">
	      				<input name="typ" type="hidden" value="1">
	   				<input type="image" src="resource/template/img/KSSG-VK_1.jpg" height="170px">
				</form>
			</td>
			<td class="auswahl">
				<h4>Kantonsspital St.Gallen 139</h4>
				<form action="index.php?site=formular" method="post">
	      				<input name="typ" type="hidden" value="5">
	   				<input type="image" src="resource/template/img/KSSG-VK_5.jpg" height="170px">
				</form>
			</td>
			<td class="auswahl">
				<h4>Kantonsspital St.Gallen 111</h4>
				<form action="index.php?site=formular" method="post">
	      				<input name="typ" type="hidden" value="6">
	   				<input type="image" src="resource/template/img/KSSG-VK_6.jpg" height="170px">
				</form>
			</td>
			<td class="auswahl">
				 <h4>Korrespondenzkarte (Vorderseite)</h4>
				<form action="index.php?site=formular" method="post">
	      				<input name="typ" type="hidden" value="601">
	   				<input type="image" src="resource/template/img/KSSG-KK_601_VS.jpg" height="170px">
				</form>
				</form>
			</td>
		</tr>
		<tr>
			<td class="auswahl">
				<h4>Spital Rorschach</h4>
				<form action="index.php?site=formular" method="post">
	      				<input name="typ" type="hidden" value="2">
	   				<input type="image" src="resource/template/img/KSSG-VK_2.jpg" height="170px">
				</form>
			</td>
			<td class="auswahl">
				<h4>Spital Flawil</h4>
				<form action="index.php?site=formular" method="post">
	      				<input name="typ" type="hidden" value="3">
	   				<input type="image" src="resource/template/img/KSSG-VK_3.jpg" height="170px">
				</form>
			</td>
			<td></td>
			<td class="auswahl">
				 <h4>Korrespondenzkarte (R&uuml;ckseite)</h4>
				<form action="index.php?site=formular" method="post">
	      				<input name="typ" type="hidden" value="601">
	   				<input type="image" src="resource/template/img/KSSG-KK_601.jpg" height="170px">
				</form>
				</form>
			</td>
		</tr>
		<tr>
			<td class="auswahl" colspan="2">
				<h4>Kantonsspital St.Gallen - Informatik (Doppelseitig)</h4>
				<form action="index.php?site=formular" method="post">
	      				<input name="typ" type="hidden" value="101">
	   				<input type="image" src="resource/template/img/KSSG-VK_101.jpg" height="170px">
	   				<input type="image" src="resource/template/img/KSSG-VK_101_RS.jpg" height="170px">
				</form>
			</td>
		</tr>
		<tr>
			<td class="auswahl" colspan="2">
				<h4>Kantonsspital St.Gallen - Englisch (Doppelseitig)</h4>
				<form action="index.php?site=formular" method="post">
	      				<input name="typ" type="hidden" value="501">
	   				<input type="image" src="resource/template/img/KSSG-VK_501.jpg" height="170px">
	   				<input type="image" src="resource/template/img/KSSG-VK_501_RS.jpg" height="170px">
				</form>
			</td>
		</tr>		
	</table>
<?php 
	include_once 'footer.php';			
?>