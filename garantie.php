<?php
	session_start();
	include_once("./include/functions.inc.php");
	$myConn = fDBConnect();
	$intIdCategorieCautare =isset($_GET['intIdCategorieCautare']) ? $_GET['intIdCategorieCautare'] : '';
?>

<?php fInsertDocType(); ?>
<head>
<title>Garantie</title>
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
						<tr>
						  <td>
						    <div align="center">
						      <!--START CONTENT-->
						      <strong>MOTIVE SA NE ALEGI						    </strong>
					        </div>
						    <p align="center">&nbsp; </p>
						<h3 align="left">1. Avem  experienta:</h3>
						<h3 align="left">2. Mancarurile, un adevarat spectacol culinar, preparate de bucatarii RESTAURANTULUI!</h3>
						<h3 align="left">3. Ne selectam cu grija oferta.</h3>
						<h3 align="left">4. Va oferim siguranta, transparenta si seriozitate:</h3>
						<h3 align="left">5. Avem o echipa specializata ce-ti sta la dispozitie:</h3>
						<h3 align="left">6. Va oferim servicii complete :</h3>
						<h3 align="left">7. Ai parte de cei mai buni buc&#259;tari </h3>
						<h1 class="pageheader">&nbsp;</h1>
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