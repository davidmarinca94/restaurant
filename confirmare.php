<?php
	session_start();
	include_once("./include/functions.inc.php");
	$myConn = fDBConnect();
	$intIdCategorieCautare =isset($_GET['intIdCategorieCautare']) ? $_GET['intIdCategorieCautare'] : '';
$intIdUtilizator =isset($_SESSION['intIdUtilizator']) ? $_SESSION['intIdUtilizator'] : '';
	$strNumeCumparator = $_POST['txtNumeCumparator'];
	$strEmailCumparator = $_POST['txtEmailCumparator'];
	$strAdresaCumparator = $_POST['txtAdresaCumparator'];
	?>
<?php fInsertDocType(); ?>
<head>
<title>comanda</title>
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
						<h1 class="pageheader">Confirmare Comanda</h1>
						<?php if ($intIdUtilizator > 0) { // userul este logat 
							$intIdUtilizator = $_SESSION['intIdUtilizator'];
							$strIdSesiune = session_id();
							$strSQL = "SELECT tcos.*, tproduse.fNumeProdus, tproduse.fPret FROM tcos, tproduse WHERE tcos.fIdProdus=tproduse.fIdProdus AND fIdUtilizator=$intIdUtilizator AND fIdSesiune='$strIdSesiune'";
							$result = mysql_query($strSQL);
							$itemsno = mysql_num_rows($result);
							if ($itemsno > 0) { // utilizatorul are produse in cos
								echo "<table style=\"width: 100%; background-color: #FFFFFF; border: 2px #B1C9B1 solid; font-size: 9pt;\"><tr><td>\n";
								echo "<fieldset style=\"border: 0px;\">\n";
								echo "<table style=\"width: 100%; border: 0px;\"><tr><td>\n";
								echo "<tr style=\"font-size: 9pt; font-weight: bold;\">\n";
								echo "<td>FEL MANCARE</td>\n";
								echo "<td>Nr PORTII</td>\n";
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
								
									$intTotalProdus = ($intPret * 1.19) * $intCantitate;
									//end check for promo									
									if ($intIndex == 1) {
										echo "<tr class=\"cartrow1\">\n";
									} else {
										echo "<tr class=\"cartrow2\">\n";
									}									
									echo "<td style=\"text-align: left;\">$strNumeProdus</td>\n";
									echo "<td>$intCantitate</td>\n";
									echo "<td>$intPret LEI</td>\n";
									echo "<td>$intTotalProdus LEI</td>\n";
									echo "</tr>\n";
									$intTotalCos = $intTotalCos + $intTotalProdus;
								}

								echo "<tr style=\"font-weight: bold;\">\n";
								echo "<td class=\"cartrow2\" style=\"font-size: 10pt; text-align: right;\" colspan=\"4\">Total (cu TVA): " . ($intTotalCos) . " LEI</td>\n";
								echo "</tr>\n";

								echo "</table>\n";
								echo "</fieldset>\n";
								echo "</td></tr></table>\n";
								echo "<br />";
								//campuri comanda

								echo "<form name=\"frmComanda\" id=\"frmComanda\" method=\"post\" action=\"execute.php?action=comanda\" onsubmit=\"return confirm('Confirmati Comanda?');\">";
								echo "<table style=\"width: 100%; background-color: #FFFFFF; border: 2px #B1C9B1 solid; font-size: 9pt;\"><tr><td>\n";

								
								echo "<tr>";
								echo "<td width=\"35%\" align=\"right\"><b>Nume Cumparator:</td>";
								echo "<td align=\"left\">";
								echo "<input type=\"hidden\" name=\"txtNumeCumparator\" id=\"txtNumeCumparator\" value=\"$strNumeCumparator\" class=\"qtyText\" maxlength=\"255\" style=\"text-align: left; width: 300px;\">$strNumeCumparator";
								echo "</td>";
								echo "</tr>";

								echo "<tr>";
								echo "<td width=\"35%\" align=\"right\"><b>Adresa Email:</td>";
								echo "<td align=\"left\">";
								echo "<input type=\"hidden\" name=\"txtEmailCumparator\" id=\"txtEmailCumparator\" value=\"$strEmailCumparator\" class=\"qtyText\" maxlength=\"255\" style=\"text-align: left; width: 300px;\">$strEmailCumparator";
								echo "</td>";
								echo "</tr>";

								echo "<tr>";
								echo "<td width=\"35%\" align=\"right\" valign=\"top\"><b>Adresa:</td>";
								echo "<td align=\"left\">";
								echo "<input type=\"hidden\" name=\"txtAdresaCumparator\" id=\"txtAdresaCumparator\" class=\"qtyText\" style=\"text-align: left; width: 300px; height: 100px\" value=\"$strAdresaCumparator\">";
								echo nl2br($strAdresaCumparator);
								echo "</td>";
								echo "</tr>";

								echo "<tr><td colspan=\"2\">";
								echo "<input type=\"submit\" class=\"loginbutton\" value=\"Comanda \">";
								echo "</td></tr>";

								echo "</table>";
								echo "</form>\n";
							} else { // utilizatorul nu are nici un produs in cos
								echo "<p style=\"font-size: 9pt; font-weight: bold; text-align: center;\"Nu eti rezervat nici un loc.</p>\n";
							}
						?>
						<?php } else { // userul nu este logat ?>
						<p style="font-size: 9pt; color: red; font-weight: bold; text-align: center;">
						Eroare ! Pentru a accesa cosul de cumparaturi trebuie sa va autentificati.
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