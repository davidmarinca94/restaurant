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
				<td colspan="2" style="font-weight: bold; text-align: center; height: 50px; width: 100%; font-family: Tahoma, Verdana, Arial; font-size: 10pt;"> Administrare feluri mancare </td>
			</tr>
			<tr>
				<td style="width: 200px;" valign="top">
					<?php fPrintLoginAreaAdmin($bIsLoggedIn, $strError); ?>
				</td>
				<td style="width: 700px;" valign="top" align="center">
					<br> 
					&nbsp; &nbsp; &nbsp; <a class="genLinkReverse" href="adaugacategorie.php">Adauga</a>
					<hr>
					<?php
						$strSQL = "SELECT * FROM tcategorii";
						$result = mysql_query($strSQL);
						echo "<table cellpadding=\"3\" cellspacing=\"0\" border=\"0\" width=\"600\" class=\"modelspecs\">\n";
						$intCount = 0;
						echo "<tr align=\"center\" style=\"font-weight: bold;\">";
						echo "<td width=\"300\">Nume fel mancare</td>";
						echo "<td width=\"100\">Tip mancare</td>";
						echo "<td width=\"100\">Editare</td>";
						echo "<td width=\"100\">Stergere</td>";
						echo "</tr>";
						while ($row = mysql_fetch_array($result)) {
							$intIdCategorie = $row['fIdCategorie'];
							$strNume = $row['fNumeCategorie'];

							if ($intCount % 2 == 0) {
								echo "<tr bgcolor=\"#F0E7D8\">";
							} else {
								echo "<tr bgcolor=\"#E2D2B8\">";
							}
							echo "<td width=\"300\"><b>$strNume</b></td>\n";
							echo "<td align=\"center\" width=\"100\"><a href=\"subcategorii.php?intIdCategorie=$intIdCategorie\"><img src=\"../images/details.gif\" border=\"0\"></a></td>\n";
							echo "<td align=\"center\" width=\"100\"><a href=\"editarecategorie.php?intIdCategorie=$intIdCategorie\"><img src=\"../images/edit.gif\" border=\"0\"></a></td>\n";
							echo "<td align=\"center\" width=\"100\"><a onclick=\"return confirmSubmit('Confirmati stergerea tipului de excursie?')\" href=\"execute.php?action=stergerecategorie&intIdCategorie=$intIdCategorie\"><img src=\"../images/delete.gif\" border=\"0\"></a></td>\n";
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