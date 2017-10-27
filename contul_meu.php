<?php
	session_start();
	include_once("./include/functions.inc.php");
	$myConn = fDBConnect();
	$intIdCategorieCautare =isset($_GET['intIdCategorieCautare']) ? $_GET['intIdCategorieCautare'] : '';
$intIdUtilizator =isset($_SESSION['intIdUtilizator']) ? $_SESSION['intIdUtilizator'] : '';
	$strSQL = "SELECT * FROM tutilizatori WHERE fIdUtilizator=$intIdUtilizator";
	$result = mysql_query($strSQL);
	$row = mysql_fetch_array($result);
	$strNumeInregistrare = $row['fNumeUtilizator'];
	$strParolaInregistrare = $row['fParola'];
	$strEmail = $row['fEmail'];
	$strAdresa = $row['fAdresa'];
	$strDataInregistrare = $row['fDataInregistrare'];
?>
<?php fInsertDocType(); ?>
<head>
<title>Contul meu</title>
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
						<h1 class="pageheader">Contul meu :: Actualizare informatii cont</h1>
						<p class="pagecontent">
						<form name="frmActualizare" id="frmActualizare" action="execute.php?action=actualizarecont" method="post" onsubmit="return fValidareActualizare();">
						<table cellpadding="5" cellspacing="0" border="0" width="600" class="modelspecs" style="margin-left: auto; margin-right: auto;">
							<tr bgcolor="#E7F2E7">
								<td align="right" width="250">Nume Utilizator:</td>
								<td width="350">
								<b><?php echo $strNumeInregistrare; ?>
								</td>
							</tr>
							<tr bgcolor="#E7F2E7">
								<td align="right" width="250">Parola:</td>
								<td width="350">
								<input type="password" name="txtParolaInregistrare" value="<?php echo $strParolaInregistrare; ?>" id="txtParolaInregistrare" class="qtyText" maxlength="255" style="width: 300px; text-align: left;">
								</td>
							</tr>
							<tr bgcolor="#E7F2E7">
								<td align="right" width="250">Confirmare Parola:</td>
								<td width="350">
								<input type="password" name="txtParolaInregistrare2" value="<?php echo $strParolaInregistrare; ?>" id="txtParolaInregistrare2" class="qtyText" maxlength="255" style="width: 300px; text-align: left;">
								</td>
							</tr>
							<tr bgcolor="#E7F2E7">
								<td align="right" width="250">Adresa Email:</td>
								<td width="350">
								<input type="text" name="txtEmail" id="txtEmail" value="<?php echo $strEmail; ?>" class="qtyText" maxlength="255" style="width: 300px; text-align: left;">
								</td>
							</tr>
							<tr bgcolor="#E7F2E7">
								<td align="right" width="250">Confirmare Adresa Email:</td>
								<td width="350">
								<input type="text" name="txtEmail2" id="txtEmail2" value="<?php echo $strEmail; ?>" class="qtyText" maxlength="255" style="width: 300px; text-align: left;">
								</td>
							</tr>
							<tr bgcolor="#E7F2E7">
								<td align="right" width="250">Adresa:</td>
								<td width="350">
								<textarea name="txtAdresa" id="txtAdresa" class="qtyText" style="width: 300px; height: 100px; text-align: left;"><?php echo $strAdresa; ?></textarea>
								</td>
							</tr>
							<tr bgcolor="#E7F2E7">
								<td align="right" width="250">Data Inregistrare:</td>
								<td width="350">
								<?php echo $strDataInregistrare; ?>
								</td>
							</tr>
							<tr bgcolor="#E7F2E7">
								<td align="center" colspan="2">
								<input class="buttons" type="reset" name="cmdReset" id="cmdReset" value="Anuleaza modificari"> &nbsp; 
								<input class="buttons" type="submit" name="cmdGo" id="cmdGo" value="Actualizare">
								</td>
							</tr>
						</table>
						</form>
						</p>
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