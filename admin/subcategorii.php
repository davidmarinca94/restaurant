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
	//$intIdCategorie = $_GET['intIdCategorie'];
$intIdCategorie = isset($_GET['intIdCategorie'])? $_GET['intIdCategorie'] : '';
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
				<td colspan="2" style="font-weight: bold; text-align: center; height: 50px; width: 100%; font-family: Tahoma, Verdana, Arial; font-size: 10pt;">Administrare subcategorii </td>
			</tr>
			<tr>
				<td style="width: 200px;" valign="top">
					<?php fPrintLoginAreaAdmin($bIsLoggedIn, $strError); ?>
				</td>
				<td style="width: 700px;" valign="top" align="center">
					<br> 
					&nbsp; &nbsp; &nbsp; <a class="genLinkReverse" href="adaugasubcategorie.php<?php if ($intIdCategorie > 0) { echo "?intIdCategorie=$intIdCategorie"; } ?>">Adauga</a>
					<hr>
					<?php
						$strSQL = "SELECT tsubcategorii.*, tcategorii.fNumeCategorie FROM tsubcategorii, tcategorii WHERE tsubcategorii.fIdCategorie=tcategorii.fIdCategorie ";
						if ($intIdCategorie > 0) {
							$strSQL .= " AND tsubcategorii.fIdCategorie=$intIdCategorie ";
						}
						$strSQL .= " ORDER BY tcategorii.fNumeCategorie";
						$result = mysql_query($strSQL);
						echo "<table cellpadding=\"3\" cellspacing=\"0\" border=\"0\" width=\"600\" class=\"modelspecs\">\n";
						$intCount = 0;
						echo "<tr align=\"center\" style=\"font-weight: bold;\">";
						echo "<td width=\"200\">Fel mancare</td>";
						echo "<td width=\"200\">Tip mancare</td>";
						echo "<td width=\"80\">Vezi produse</td>";
						echo "<td width=\"80\">Editare</td>";
						echo "<td width=\"80\">Stergere</td>";
						echo "</tr>";
						while ($row = mysql_fetch_array($result)) {
							$intIdCategorie = $row['fIdCategorie'];
							$intIdSubcategorie = $row['fIdSubcategorie'];
							$strNumeCategorie = $row['fNumeCategorie'];
							$strNumeSubcategorie = $row['fNumeSubcategorie'];

							if ($intCount % 2 == 0) {
								echo "<tr bgcolor=\"#F0E7D8\">";
							} else {
								echo "<tr bgcolor=\"#E2D2B8\">";
							}
							echo "<td width=\"200\"><b>$strNumeCategorie</b></td>\n";
							echo "<td width=\"200\"><b>$strNumeSubcategorie</b></td>\n";
							echo "<td align=\"center\" width=\"100\"><a href=\"produse.php?intIdSubcategorie=$intIdSubcategorie\"><img src=\"../images/details.gif\" border=\"0\"></a></td>\n";
							echo "<td align=\"center\" width=\"100\"><a href=\"editaresubcategorie.php?intIdSubcategorie=$intIdSubcategorie\"><img src=\"../images/edit.gif\" border=\"0\"></a></td>\n";
							echo "<td align=\"center\" width=\"100\"><a onclick=\"return confirmSubmit('Confirmati stergerea subcategoriei?')\" href=\"execute.php?action=stergeresubcategorie&intIdSubcategorie=$intIdSubcategorie\"><img src=\"../images/delete.gif\" border=\"0\"></a></td>\n";
							echo "</tr>\n";
							$intCount++;
						}
						echo "</table>\n";
					?>
				</td>
			</tr>
		</table>
	</body>
</html>