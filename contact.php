<?php
	session_start();
	include_once("./include/functions.inc.php");
	$myConn = fDBConnect();
	$intIdCategorieCautare =isset($_GET['intIdCategorieCautare']) ? $_GET['intIdCategorieCautare'] : '';
?>
<?php fInsertDocType(); ?>
<head>
<title>Informatii Contact</title>
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
						<p align="center"><strong>INFORMATII&nbsp; DE CONTACT  </strong></p>
						<p align="left">&nbsp;</p>
						<table style="width: 100%; background-color: #FFFFFF; border: 2px #B1C9B1 solid; font-size: 9pt;">
							<tr class="listprodrow1" style="height: 100px;">
								<td style="width: 150px; text-align: center;">Adresa: </td>
								<td style="vertical-align: middle; text-align: justify; padding: 10px;\"><p align="left"><strong>SEDIUL CENTRAL</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
							    <p align="left">Bd-ul Regina Elisabeta nr. 37,&nbsp; Sector 5, Bucuresti, cod 050012</p></td>
							</tr>
							<tr class="listprodrow2" style="height: 100px;">
								<td style="width: 150px; text-align: center;">Telefon/Fax: </td>
								<td style="vertical-align: middle; text-align: justify; padding: 10px;\">
								Tel: <br />
								021-123.45.00<br />
								021-987.65.00<br />
								<br />
								Fax: <br />
								021-123.45.00<br />
								021-987.65.00
								</td>
							</tr>
							<tr class="listprodrow1" style="height: 100px;">
								<td style="width: 150px; text-align: center;">Email: </td>
								<td style="vertical-align: middle; text-align: justify; padding: 10px;\">
									<a class="EmailLink" href="mailto:webmaster@mag1.ro">webmaster@eturism.ro</a><br />
									<br />
									<a class="EmailLink" href="mailto:suporttehnic@mag1.ro">suporttehnic@eturism.ro</a><br />
									<br />
									<a class="EmailLink" href="mailto:plati@mag1.ro">plati@eturism.ro</a><br />
								</td>
							</tr>
						</table>
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