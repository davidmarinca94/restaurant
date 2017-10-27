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
				<td colspan="2" style="font-weight: bold; text-align: center; height: 50px; width: 100%; font-family: Tahoma, Verdana, Arial; font-size: 10pt;"> Detalii mancare </td>
			</tr>
			<tr>
				<td style="width: 200px;" valign="top">
					<?php fPrintLoginAreaAdmin($bIsLoggedIn, $strError); ?>
				</td>
				<td style="width: 700px;" valign="top" align="center">
					<table cellpadding="5" cellspacing="0" border="0" width="700" class="modelspecs">
						<tr>
							<td align="center" colspan="2" style="font-family: Tahoma, Verdana, Arial; font-weight: bold; font-size: 11pt;"><br>
							Detalii<br>
							<br></td>
						</tr>
						<?php
							$intIdProdus = $_GET['intIdProdus'];
							$strSQL = "SELECT tproduse.*, tsubcategorii.fIdCategorie,tsubcategorii.fNumeSubcategorie,tcategorii.fIdCategorie, tcategorii.fNumeCategorie FROM tproduse, tsubcategorii, tcategorii WHERE tproduse.fIdSubcategorie=tsubcategorii.fIdSubcategorie AND tcategorii.fIdCategorie=tsubcategorii.fIdCategorie AND tproduse.fIdProdus=$intIdProdus";
							$result = mysql_query($strSQL);
							$row = mysql_fetch_array($result);
							$intIdCategorie = $row['fIdCategorie'];
							$intIdSubcategorie = $row['fIdSubcategorie'];
							$strNumeProdus = $row['fNumeProdus'];
							$strNumeCategorie = $row['fNumeCategorie'];
							$strNumeSubcategorie = $row['fNumeSubcategorie'];
							$strCod = $row['fCodProdus'];
							$strImagine = $row['fImagine'];
							$strDescriere = $row['fDescriere'];
							$strPret = $row['fPret'];
		?>
						<tr bgcolor="#F0E7D8">
							<td align="right" width="250">Nume mancare:</td>
							<td width="450"><b><?php echo $strNumeProdus; ?></b></td>
						</tr>
						<tr bgcolor="#F0E7D8">
							<td align="right" width="250">Fel mancare  :</td>
							<td width="450"><?php echo $strNumeCategorie; ?></td>
						</tr>
						<tr bgcolor="#F0E7D8">
							<td align="right" width="250">Tip mancare :</td>
							<td width="450"><?php echo $strNumeSubcategorie; ?></td>
						</tr>

						<tr bgcolor="#F0E7D8">
							<td align="right" width="250">Cod :</td>
							<td width="450"><?php echo $strCod; ?></td>
						</tr>
						<tr bgcolor="#F0E7D8">
							<td align="right" width="250" valign="top">Imagine:</td>
							<td width="450">
							<?php 
								$strCaleImagine = "../images/produse/$strImagine";
								if (file_exists($strCaleImagine)) {
									echo "<img src=\"$strCaleImagine\" border=\"0\" style=\"width: 200px; height: 200px; border: 1px #9EB79E solid;\">";
								} else {
									echo "Imaginea nu a fost incarcata.";
								}
							?>							</td>
						</tr>
						<tr bgcolor="#F0E7D8">
							<td align="right" width="250">Descriere:</td>
							<td width="450"><?php echo $strDescriere; ?></td>
						</tr>
						<tr bgcolor="#F0E7D8">
							<td align="right" width="250">Pret:</td>
							<td width="450"><?php echo $strPret; ?> ELei</td>
						</tr>
						<tr bgcolor="#F0E7D8">
							<td align="center" colspan="2">
								<a href="produse.php" class="genLink" style="width: 100px;"> &nbsp; Inapoi &nbsp; </a><br><br>								</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</body>
</html>