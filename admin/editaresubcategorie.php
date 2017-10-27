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
	 $intIdSubcategorie = isset($_GET['intIdSubcategorie'])? $_GET['intIdSubcategorie'] : '';
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
				<td colspan="2" style="font-weight: bold; text-align: center; height: 50px; width: 100%; font-family: Tahoma, Verdana, Arial; font-size: 10pt;"> Modificare fel mancare </td>
			</tr>
			<tr>
				<td style="width: 200px;" valign="top">
					<?php fPrintLoginAreaAdmin($bIsLoggedIn, $strError); ?>
				</td>
				<td style="width: 700px;" valign="top" align="center">
					<form name="frmModificareSubcategorie" id="frmModificareSubcategorie" method="post" action="execute.php?action=modificaresubcategorie" onSubmit="return fValidareAdaugareSubcategorie();">
						<table cellpadding="5" cellspacing="0" border="0" width="700" class="modelspecs">
							<tr>
								<td align="center" colspan="2" style="font-family: Tahoma, Verdana, Arial; font-weight: bold; font-size: 11pt;"><br>Modificare<br>
								<br></td>
							</tr>
							<?php
								$intIdCategorie = $_GET['intIdSubcategorie'];
								$strSQL = "SELECT * FROM tsubcategorii WHERE fIdSubcategorie=$intIdSubcategorie";
								$result = mysql_query($strSQL);
								$row = mysql_fetch_array($result);

								$strNume = $row['fNumeSubcategorie'];

							?>
							<input type="hidden" name="intIdSubcategorie" value="<?php echo $intIdSubcategorie; ?>">
							<tr bgcolor="#F0E7D8">
								<td align="right" width="250">Nume subcategorie:</td>
								<td width="450"><input type="text" value="<?php echo $strNume; ?>" name="txtNume" id="txtNume" class="text" maxlength="255" style="width: 300px;"></td>
							</tr>
							
							<tr bgcolor="#F0E7D8">
								<td align="center" colspan="2">
								<input class="buttons" type="reset" name="cmdReset" id="cmdReset" value="Anuleaza modificari"> &nbsp; 
								<input class="buttons" type="submit" name="cmdGo" id="cmdGo" value="Modifica">
								</td>
							</tr>
						</table>
					</form>
				</td>
			</tr>
		</table>
	</body>
</html>