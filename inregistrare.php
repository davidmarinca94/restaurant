<?php
	session_start();
	include_once("./include/functions.inc.php");
	$myConn = fDBConnect();
	$intIdCategorieCautare =isset($_GET['intIdCategorieCautare']) ? $_GET['intIdCategorieCautare'] : '';
?>
<?php fInsertDocType(); ?>
<head>
<title>Cont nou</title>
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
						<h1 class="pageheader">Cont nou</h1>
						<p class="pagecontent">
						<form name="frmInregistrare" id="frmInregistrare" action="execute.php?action=inregistrare" method="post" onsubmit="return fValidareInregistrare();">
						<table cellpadding="5" cellspacing="0" border="0" width="600" class="modelspecs" style="margin-left: auto; margin-right: auto;">
							
							<tr bgcolor="#E7F2E7">
								<td align="right" width="250">Nume Utilizator:</td>
								<td width="350">
								<input type="text" name="txtNumeInregistrare" id="txtNumeInregistrare" class="qtyText" maxlength="255" style="width: 300px; text-align: left;">
								</td>
							</tr>
							<tr bgcolor="#E7F2E7">
								<td align="right" width="250">Parola:</td>
								<td width="350">
								<input type="password" name="txtParolaInregistrare" id="txtParolaInregistrare" class="qtyText" maxlength="255" style="width: 300px; text-align: left;">
								</td>
							</tr>
							<tr bgcolor="#E7F2E7">
								<td align="right" width="250">Confirmare Parola:</td>
								<td width="350">
								<input type="password" name="txtParolaInregistrare2" id="txtParolaInregistrare2" class="qtyText" maxlength="255" style="width: 300px; text-align: left;">
								</td>
							</tr>
							<tr bgcolor="#E7F2E7">
								<td align="right" width="250">Adresa Email:</td>
								<td width="350">
								<input type="text" name="txtEmail" id="txtEmail" class="qtyText" maxlength="255" style="width: 300px; text-align: left;">
								</td>
							</tr>
							<tr bgcolor="#E7F2E7">
								<td align="right" width="250">Confirmare Adresa Email:</td>
								<td width="350">
								<input type="text" name="txtEmail2" id="txtEmail2" class="qtyText" maxlength="255" style="width: 300px; text-align: left;">
								</td>
							</tr>
							<tr bgcolor="#E7F2E7">
								<td align="right" width="250">Adresa:</td>
								<td width="350">
								<textarea name="txtAdresa" id="txtAdresa" class="qtyText" style="width: 300px; height: 100px; text-align: left;"></textarea>
								</td>
							</tr>
							<tr bgcolor="#E7F2E7">
								<td align="center" colspan="2">
								<input class="buttons" type="reset" name="cmdReset" id="cmdReset" value="Anuleaza modificari"> &nbsp; 
								<input class="buttons" type="submit" name="cmdGo" id="cmdGo" value="Inregistrare">
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