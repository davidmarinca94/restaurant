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
		<title> Sectiunea de administrare</title>
		<link rel="stylesheet" href="../css/admin.css" type="text/css">
		<script language="javascript" src="../js/functions.js"></script>
	</head>
	<body>
		<table cellpadding="0" cellspacing="0" border="1" width="100%" height="100%">
			<tr style="height: 50px; width: 100%;">
				<td colspan="2" style="font-weight: bold; text-align: center; height: 50px; width: 100%; font-family: Tahoma, Verdana, Arial; font-size: 10pt;"> Administrare rapoarte</td>
			</tr>
			<tr>
				<td style="width: 200px;" valign="top">
					<?php fPrintLoginAreaAdmin($bIsLoggedIn, $strError); ?>
				</td>
				<td style="width: 700px;" valign="top" align="center">
					<?php
						$strSQL = "SELECT tcomenzi.*, tutilizatori.fNumeUtilizator FROM tcomenzi, tutilizatori WHERE tcomenzi.fIdUtilizator=tutilizatori.fIdUtilizator";
						$result = mysql_query($strSQL);
						echo "<table cellpadding=\"3\" cellspacing=\"0\" border=\"0\" width=\"700\" class=\"modelspecs\">\n";
						$intCount = 0;
$intnrbilete = 0;
$inttotal = 0;
						echo "<tr align=\"center\" style=\"font-weight: bold;\">";
						echo "<td width=\"50\">Utilizator</td>";
						echo "<td width=\"50\">Data Comenzii</td>";

							
						echo "<td width=\"375\">Nume mancare</td>";
						echo "<td width=\"75\">Nr portii</td>";
echo "<td width=\"120\">Pret unitar</td>";
						echo "<td width=\"130\">Total</td>";
						echo "</tr>";
						while ($row = mysql_fetch_array($result)) {
							$intIdComanda = $row['fIdComanda'];
							$intIdUtilizator = $row['fIdUtilizator'];
							$strNumeUtilizator = $row['fNumeUtilizator'];
							$strDataComanda = $row['fDataComanda'];
							
							if ($intCount % 2 == 0) {
								echo "<tr bgcolor=\"#F0E7D8\">";
							} else {
								echo "<tr bgcolor=\"#E2D2B8\">";
							}
							echo "<td align=\"center\" width=\"200\"><a target=\"_blank\" class=\"genLinkReverse\" href=\"detaliiutilizator.php?intIdUtilizator=$intIdUtilizator\">$strNumeUtilizator</a></td>\n";
							
							echo "<td align=\"center\" width=\"200\">$strDataComanda</td>\n";

	
							
							//echo "<td align=\"center\" width=\"100\"><a  href=\"detaliicomanda1.php?intIdComanda=$intIdComanda\"><img src=\"../images/view.gif\" border=\"0\"></a></td>\n";

							$strSQL1 = "SELECT tprodusecomenzi.*, tproduse.fNumeProdus, tproduse.fPret FROM tprodusecomenzi, tproduse WHERE tprodusecomenzi.fIdProdus=tproduse.fIdProdus AND tprodusecomenzi.fIdComanda=$intIdComanda";
							$result1 = mysql_query($strSQL1);
							$itemsno = mysql_num_rows($result1);
							if ($itemsno > 0) { // utilizatorul are produse in cos


								


								$intIndex = 1;
								$intTotalCos = 0;
								while ($row = mysql_fetch_array($result1)) {
									$intTotalProdus = 0;
									$intIndex = 3 - $intIndex;
									$intIdProdus = $row['fIdProdus'];
									$strNumeProdus = $row['fNumeProdus'];
									$intCantitate = $row['fCantitate'];

									//start check for promo
									/*$strToday = date("Ymd");
									$strSQLPromo = "SELECT * FROM tpromotii WHERE fIdProdus=$intIdProdus AND (fDataInceput <= '$strToday') AND (fDataSfarsit >= '$strToday')";
									$resultPromo = mysql_query($strSQLPromo);
									if (mysql_num_rows($resultPromo) > 0) { //produsul este in promotie
										$rowPromo = mysql_fetch_array($resultPromo);
										$intPret = $rowPromo['fPretRedus'];
									} else { // produsul nu este in promotie*/
										$intPret = $row['fPret'];
									//}
									$intTotalProdus = ($intPret * 1.19) * $intCantitate;
									//end check for promo									
									
								$intnrbilete=$intnrbilete+$intCantitate;

									echo "<td style=\"text-align: left;\">$strNumeProdus</td>\n";
									echo "<td>$intCantitate</td>\n";
									echo "<td>$intPret Lei</td>\n";
									echo "<td>$intTotalProdus Lei</td>\n";
									echo "</tr>\n";
									$intTotalCos = $intTotalCos + $intTotalProdus;	$inttotal = $inttotal+$intTotalProdus;	
								}

						

								
							}





							$intCount++;	


					




						}


	
echo "</table>\n";	

echo "<br>";				

echo "NUMAR TOTAL DE Portii   ";

echo  $intnrbilete;
echo "<br>";echo "<br>";

echo "TOTAL VALOARE CU TVA $inttotal  Lei   ";



					?>





</td>
			</tr>
		</table>


				
	</body>
</html>