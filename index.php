<?php
	session_start();
	include_once("./include/functions.inc.php");
	$myConn = fDBConnect();
 $intIdCategorieCautare =isset($_GET['intIdCategorieCautare']) ? $_GET['intIdCategorieCautare'] : '';
//$intIdUtilizator =isset($_SESSION['intIdUtilizator']) ? $_SESSION['intIdUtilizator'] : '';
?>
<?php fInsertDocType(); ?>
<head>

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
						<?php
							$strSQL = "SELECT tproduse.fIdProdus, RAND() as rnd_id FROM tproduse  ORDER BY rnd_id LIMIT 2";
							$result = mysql_query($strSQL);
							$intIndex = 0;
							while ($row = mysql_fetch_array($result)) {
								$intIndex++;
								$aMainIDs[$intIndex] = $row['fIdProdus'];
							}
						?>
						<!--START MAIN - PRODUCT LEFT-->
						<?php fInsertProdLeft($aMainIDs[1]); ?>
						<!--END MAIN - PRODUCT LEFT-->
						
						<!--START MAIN - PRODUCT RIGHT-->
						<?php fInsertProdRight($aMainIDs[2]); ?>
						<!--END MAIN - PRODUCT RIGHT-->
						</tr>
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