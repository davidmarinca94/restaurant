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
				<td colspan="2" style="font-weight: bold; text-align: center; height: 50px; width: 100%; font-family: Tahoma, Verdana, Arial; font-size: 10pt;"> Adauga tip mancare </td>
			</tr>
			<tr>
				<td style="width: 200px;" valign="top">
					<?php fPrintLoginAreaAdmin($bIsLoggedIn, $strError); ?>
				</td>
				<td style="width: 700px;" valign="top" align="center">
					<form name="frmAdaugaSubcategorie" id="frmAdaugaSubcategorie" method="post" action="execute.php?action=adaugaresubcategorie" onSubmit="return fValidareAdaugareSubcategorie();">
						<table cellpadding="5" cellspacing="0" border="0" width="700" class="modelspecs">
							<tr>
								<td align="center" colspan="2" style="font-family: Tahoma, Verdana, Arial; font-weight: bold; font-size: 11pt;"><br>
								Adaugare <br>
								<br></td>
							</tr>
							<tr bgcolor="#F0E7D8">
								<td align="right" width="250">Fel mancare :</td>
								<td width="450">
								<select name="selCategorie" id="selCategorie" class="text" style="width: 300px;">
								<option value="select">Selecteaza </option>
								<?php
									$strSQL = "SELECT * FROM tcategorii";
									$result = mysql_query($strSQL);
									while ($row = mysql_fetch_array($result)) {
										$intIdCateg = $row['fIdCategorie'];
										$strNumeCategorie = $row['fNumeCategorie'];
										echo "<option value=\"$intIdCateg\"";
										if ($intIdCategorie == $intIdCateg) {
											echo " selected ";
										}
										echo ">$strNumeCategorie</option>";
									}
								?>
								</select>
								</td>
							</tr>
							<tr bgcolor="#F0E7D8">
								<td align="right" width="250">Nume tip mancare:</td>
								<td width="450"><input type="text" name="txtNume" id="txtNume" class="text" maxlength="255" style="width: 300px;"></td>
							</tr>
							<tr bgcolor="#F0E7D8">
								<td align="center" colspan="2">
								<input class="buttons" type="reset" name="cmdReset" id="cmdReset" value="Anuleaza modificari"> &nbsp; 
								<input class="buttons" type="submit" name="cmdGo" id="cmdGo" value="Adauga">
								</td>
							</tr>
						</table>
					</form>
				</td>
			</tr>
		</table>
	</body>
</html>