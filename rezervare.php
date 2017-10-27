<?php
	session_start();
	include_once("./include/functions.inc.php");
	$myConn = fDBConnect();
$intIdCategorieCautare =isset($_GET['intIdCategorieCautare']) ? $_GET['intIdCategorieCautare'] : '';
$intIdUtilizator =isset($_SESSION['intIdUtilizator']) ? $_SESSION['intIdUtilizator'] : '';
?>
<?php fInsertDocType(); ?>
<head>
<title>Testare</title>
<?php fInsertMetaTags(); ?>
<?php fInsertCSS(); ?>
<?php fInsertJS(); ?>
</head>
<body>

	<table class="maintable">
		<tr style="height: 132px;">
			<td id="header">
			<?php fInsertCartLink(); ?>
			<!--START TOP MENU-->
			<?php fInsertLoginArea(); ?>
			<?php fInsertTopMenu(); ?>
			<!--END TOP MENU-->
			</td>
		</tr>
		<tr>
			<td>
				<table class="contenttable">
					<tr>
						<td class="leftcolcontainer">
							<!--start left column-->
							<table class="leftcoltable">
								
								<tr style="height: 5px;"><td></td></tr>
								<!--START MENU CATEGORII-->
								<?php fInsertCategLeftMenu(); ?>
								<!--END MENU CATEGORII-->
								<tr style="height: 5px;"><td></td></tr>
								<!--START MENU INFORMATII-->
								<?php fInsertInfoLeftMenu(); ?>
								<!--END MENU INFORMATII-->
								<tr style="height: 5px;"><td></td></tr>
							</table>
							<!--end left column-->
						</td>
						<td id="maincontent">
						<!--START MAIN CONTENT-->
						<table style="width: 100%;">
						<tr><td>
						<!--START CONTENT-->
						<h1 class="pageheader"></h1>
						<?php if ($intIdUtilizator > 0) { // userul este logat 
							$intIdUtilizator = $_SESSION['intIdUtilizator'];
							$strIdSesiune = session_id();
							$strSQL = "SELECT tcos.*, tproduse.fNumeProdus, tproduse.fPret FROM tcos, tproduse WHERE tcos.fIdProdus=tproduse.fIdProdus AND fIdUtilizator=$intIdUtilizator AND fIdSesiune='$strIdSesiune'";
							$result = mysql_query($strSQL);
							$itemsno = mysql_num_rows($result);
							if ($itemsno > 0) { // utilizatorul are comanda
								echo "<table style=\"width: 100%; background-color: #FFFFFF; border: 2px #B1C9B1 solid; font-size: 9pt;\"><tr><td>\n";
								echo "<form action=\"execute.php?action=updatecart\" method=\"post\" style=\"display: inline;\">\n";
								echo "<fieldset style=\"border: 0px;\">\n";
								echo "<table style=\"width: 100%; border: 0px;\"><tr><td>\n";
								echo "<tr style=\"font-size: 9pt; font-weight: bold;\">\n";
								echo "<td>TIP MANCARE</td>\n";
								echo "<td>NUMAR </td>\n";
								echo "<td>Pret unitar</td>\n";
								echo "<td>Total</td>\n";
								echo "</tr>\n";
								$intIndex = 1;
								$intTotalCos = 0;
								while ($row = mysql_fetch_array($result)) {
									$intTotalProdus = 0;
									$intIndex = 3 - $intIndex;
									$intIdProdus = $row['fIdProdus'];
									$strNumeProdus = $row['fNumeProdus'];
									$intCantitate = $row['fCantitate'];

									$intPret = $row['fPret'];
									//}
									$intTotalProdus = ($intPret * 1.19) * $intCantitate;
									//end check for promo									
									if ($intIndex == 1) {
										echo "<tr class=\"cartrow1\">\n";
									} else {
										echo "<tr class=\"cartrow2\">\n";
									}									
									echo "<td style=\"text-align: left;\">$strNumeProdus</td>\n";
									echo "<td><input type=\"text\" maxlength=\"3\" onkeypress=\"return numeralsOnly(event)\" class=\"qtyText\" value=\"$intCantitate\" id=\"txt$intIdProdus\" name=\"txt$intIdProdus\" /> <input type=\"button\" class=\"delcartbutton\" value=\"Sterge\" onclick=\"if (confirm('Doriti sa stergeti ?')) { location.href='execute.php?action=delfromcart&amp;intIdProdus=$intIdProdus'; } \" /></td>\n";
									echo "<td>$intPret LEI/td>\n";
									echo "<td>$intTotalProdus LEI</td>\n";
									echo "</tr>\n";
									$intTotalCos = $intTotalCos + $intTotalProdus;
								}
								echo "<tr>\n";
								echo "<td>&nbsp;</td>\n";
								echo "<td><input type=\"submit\" class=\"updatebutton\" value=\"Actualizeaza\" /></td>\n";
								echo "<td style=\"font-size: 7.5pt;\">LEI fara TVA</td>\n";
								echo "<td style=\"font-size: 7.5pt;\">LEI cu TVA</td>\n";
								echo "</tr>\n";

								echo "<tr style=\"font-weight: bold;\">\n";
								echo "<td class=\"cartrow2\" style=\"font-size: 10pt; text-align: right;\" colspan=\"4\">Total (cu TVA): $intTotalCos LEI</td>\n";
								echo "</tr>\n";

								echo "<tr>\n";
								echo "<td colspan=\"2\"><input type=\"button\" class=\"emptycartbutton\" value=\"Sterge \" onclick=\"if (confirm('Doriti sa stergeti continutul cosului de cumparaturi ?')) { location.href='execute.php?action=emptycart'; } \"/></td>\n";
								echo "<td colspan=\"2\"><input type=\"button\" class=\"loginbutton\" value=\"COMANDA\" onclick=\"location.href='comanda.php';\"/></td>\n";
								echo "</tr>\n";

								echo "</table>\n";
								echo "</fieldset>\n";
								echo "</form>\n";
								echo "</td></tr></table>\n";								
							} else { // utilizatorul nu are nici un produs selectat
								echo "<p style=\"font-size: 9pt; font-weight: bold; text-align: center;\">Nu aveti produse.</p>\n";
							}
						?>
						<?php } else { // userul nu este logat ?>
						<p style="font-size: 9pt; color: red; font-weight: bold; text-align: center;">
						Eroare ! Pentru a comanda trebuie sa va autentificati.
						</p>
						<?php } ?>
						<!--END CONTENT-->
						</td></tr>
						</table>
						<!--END MAIN CONTENT-->
						</td>
						
					</tr>
					</table>
			</td></tr>
	</table>
</body>
</html>
<?php fDBClose($myConn); ?>