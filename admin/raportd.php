<?php
	session_start();
	include_once("../include/mysql.inc.php");
	include_once("../include/functions.inc.php");
	include_once("../include/adminfunctions.inc.php");
	$bIsLoggedIn = fCheckAdminLogin();
	if (!$bIsLoggedIn) {
		Header("Location:index.php");
	}
	$myConn = fDBConnect();
	$strError  = isset($_GET['strError '])? $_GET['strError '] : '';
?>
<html>
	<head>
		<title>Sectiunea de administrare</title>
		<link rel="stylesheet" href="../css/admin.css" type="text/css">
		<script language="javascript" src="../js/functions.js"></script>
	</head>
	<body>
		<table cellpadding="0" cellspacing="0" border="1" width="100%" height="100%">
			<tr style="height: 50px; width: 100%;">
				<td colspan="2" style="font-weight: bold; text-align: center; height: 50px; width: 100%; font-family: Tahoma, Verdana, Arial; font-size: 10pt;">E-Turism:: Detalii comanda</td>
			</tr>
			<tr>
				<td style="width: 200px;" valign="top">
					<?php fPrintLoginAreaAdmin($bIsLoggedIn, $strError); ?>
				</td>
				<td style="width: 700px;" valign="top" align="center">
					<table cellpadding="5" cellspacing="0" border="0" width="700" class="modelspecs">
						<tr>
							<td align="center" colspan="2" style="font-family: Tahoma, Verdana, Arial; font-weight: bold; font-size: 11pt;"><br>Detalii comanda<br><br></td>
						</tr>
						<?php
							//$intIdComanda = $_GET['intIdComanda'];
							$strSQL = "SELECT tcomenzi.*, tutilizatori.fNumeUtilizator FROM tcomenzi, tutilizatori WHERE tcomenzi.fIdUtilizator=tutilizatori.fIdUtilizator AND tcomenzi.fIdComanda=$intIdComanda";
							$result = mysql_query($strSQL);
							$row = mysql_fetch_array($result);
							$intIdUtilizator = $row['fIdUtilizator'];
							$strNumeUtilizator = $row['fNumeUtilizator'];
							$strDataComanda = $row['fDataComanda'];

							$strNumeCumparator = $row['fNumeCumparator'];
							$strEmailCumparator = $row['fEmailCumparator'];
							$strAdresaCumparator = $row['fAdresaCumparator'];
							
							
						?>
						<tr bgcolor="#F0E7D8">
							<td align="right" width="250">Nume Utilizator:</td>
							<td width="450"><?php echo $strNumeUtilizator; ?></td>
						</tr>
						<tr bgcolor="#F0E7D8">
							<td align="right" width="250">Data Comanda:</td>
							<td width="450"><?php echo $strDataComanda; ?></td>
						</tr>
						<tr bgcolor="#F0E7D8">
							<td align="right" width="250">Nume Cumparator:</td>
							<td width="450"><?php echo $strNumeCumparator; ?></td>
						</tr>
						<tr bgcolor="#F0E7D8">
							<td align="right" width="250">Email Cumparator:</td>
							<td width="450"><a class="genLinkReverse" href="mailto:<?php echo $strEmailCumparator; ?>"><?php echo $strEmailCumparator; ?></a></td>
						</tr>
						<tr bgcolor="#F0E7D8">
							<td align="right" width="250" valign="top">Adresa Cumparator:</td>
							<td width="450"><?php echo nl2br($strAdresaCumparator); ?></td>
						</tr>
												
						<?php
							$strSQL = "SELECT tprodusecomenzi.*, tproduse.fNumeProdus, tproduse.fPret FROM tprodusecomenzi, tproduse WHERE tprodusecomenzi.fIdProdus=tproduse.fIdProdus AND tprodusecomenzi.fIdComanda=$intIdComanda";
							$result = mysql_query($strSQL);
							$itemsno = mysql_num_rows($result);
							if ($itemsno > 0) { // utilizatorul are produse in cos
								echo "<table style=\"width: 700px; background-color: #FFFFFF; border: 2px #B1C9B1 solid; font-size: 8pt; font-family: Verdana, Tahoma, Arial;\"><tr><td>\n";
								echo "<fieldset style=\"border: 0px;\">\n";
								echo "<table style=\"width: 700px; border: 0px;\"><tr><td>\n";
								echo "<tr style=\"font-size: 8pt; font-weight: bold;\">\n";
								echo "<td>Nume excursie</td>\n";
								echo "<td>nr bilete</td>\n";
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
							
									if ($intIndex == 1) {
										echo "<tr class=\"cartrow1\">\n";
									} else {
										echo "<tr class=\"cartrow2\">\n";
									}									
									echo "<td style=\"text-align: left;\">$strNumeProdus</td>\n";
									echo "<td>$intCantitate</td>\n";
									echo "<td>$intPret Euro</td>\n";
									echo "<td>$intTotalProdus Euro</td>\n";
									echo "</tr>\n";
									$intTotalCos = $intTotalCos + $intTotalProdus;
								}
								}
						?>

						<tr bgcolor="#F0E7D8">
							<td align="center" colspan="2">
								<a href="comenzi.php" class="genLink" style="width: 100px;"> &nbsp; Inapoi &nbsp; </a><br><br>
								</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</body>
</html>