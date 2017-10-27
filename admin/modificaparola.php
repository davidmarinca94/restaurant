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
				<td colspan="2" style="font-weight: bold; text-align: center; height: 50px; width: 100%; font-family: Tahoma, Verdana, Arial; font-size: 10pt;"> Modificare parola</td>
			</tr>
			<tr>
				<td style="width: 200px;" valign="top">
					<?php fPrintLoginAreaAdmin($bIsLoggedIn, $strError); ?>
				</td>
				<td style="width: 700px;" valign="top" align="center">
					<form name="frmPass" id="frmPass" method="post" action="execute.php?action=chpass" onSubmit="return fValidateChPass();">
						<table cellpadding="3" cellspacing="0" border="0" width="400" class="modelspecs">
							<tr>
								<td align="center" colspan="2" style="font-family: Tahoma, Verdana, Arial; font-weight: bold; font-size: 11pt;"><br>Modificare parola<br><br></td>
							</tr>
							<tr bgcolor="#F0E7D8">
								<td align="right" width="150">Parola noua:</td>
								<td width="250"><input class="text" type="password" name="txtChPassword" id="txtChPassword" maxlength="32" style="width: 100%;"></td>
							</tr>
							<tr bgcolor="#F0E7D8">
								<td align="right" width="150">Confirmati parola noua:</td>
								<td width="250"><input class="text" type="password" name="txtChPassword2" id="txtChPassword2" maxlength="32" style="width: 100%;"></td>
							</tr>
							<tr bgcolor="#F0E7D8">
								<td align="center" colspan="2">
								<input class="buttons" type="reset" name="cmdReset" id="cmdReset" value="Anuleaza modificari"> &nbsp; 
								<input class="buttons" type="submit" name="cmdGo" id="cmdGo" value="Modifica parola">
								</td>
							</tr>
						</table>
					</form>
				</td>
			</tr>
		</table>
	</body>
</html>