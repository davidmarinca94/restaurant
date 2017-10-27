<?php
	session_start();
	include_once("./include/functions.inc.php");
	$myConn = fDBConnect();
	$intIdCategorieCautare =isset($_GET['intIdCategorieCautare']) ? $_GET['intIdCategorieCautare'] : '';
?>
<?php fInsertDocType(); ?>
<head>
<title>Rezultatele cautarii</title>
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
						<h1 class="pageheader">Rezultatele cautarii</h1>
						<p class="pagecontent">
						<?php

$intIdSelSubcateg =isset($_POST['selSubCateg']) ? $_POST['selSubCateg'] : '';

$intIdSelCateg =isset($_POST['selCateg']) ? $_POST['selCateg'] : '';
							if ($intIdSelSubcateg > 0) {
								$strSQL = "SELECT tproduse.*, tcategorii.fIdCategorie FROM (tproduse INNER JOIN tsubcategorii ON tproduse.fIdSubcategorie = tsubcategorii.fIdSubcategorie) INNER JOIN tcategorii ON tsubcategorii.fIdCategorie = tcategorii.fIdCategorie where tproduse.fIdSubcategorie=$intIdSelSubcateg";
							} else {
								if ($intIdSelCateg > 0) {
									$strSQL = "SELECT tproduse.*, tcategorii.fIdCategorie FROM (tproduse INNER JOIN tsubcategorii ON tproduse.fIdSubcategorie = tsubcategorii.fIdSubcategorie) INNER JOIN tcategorii ON tsubcategorii.fIdCategorie = tcategorii.fIdCategorie where tcategorii.fIdCategorie=$intIdSelCateg";
								} else {
									$strSQL = "SELECT tproduse.*, tcategorii.fIdCategorie FROM (tproduse INNER JOIN tsubcategorii ON tproduse.fIdSubcategorie = tsubcategorii.fIdSubcategorie) INNER JOIN tcategorii ON tsubcategorii.fIdCategorie = tcategorii.fIdCategorie";
								}
							}

							//-----------------------
							$result = mysql_query($strSQL);
if (mysql_num_rows($result) > 0) { // exista produse
	echo "<table style=\"width: 100%; background-color: #FFFFFF; border: 2px #B1C9B1 solid; font-size: 9pt;\">\n";
	$intIndex = 1;
	while ($row = mysql_fetch_array($result)) {
		$intIndex = 3 - $intIndex;
		$intIdProdus = $row['fIdProdus'];
		$strNumeProdus = $row['fNumeProdus'];
		$strDescriere = $row['fDescriere'];
		$strImagine = $row['fImagine'];
		

                $strNormalPrice = $row['fPret'];


		if ($intIndex == 1) {
			echo "<tr class=\"listprodrow1\">\n";
		} else {
			echo "<tr class=\"listprodrow2\">\n";
		}

echo "<td style=\"width: 150px; text-align: center;\">
<img alt=\"$strNumeProdus\" src=\"./images/produse/$strImagine\" style=\"width: 80px; height: 80px; border: 2px #B1C9B1 solid;\" /></td>\n";
		echo "<td style=\"vertical-align: top; text-align: justify; padding: 10px;\"><span>$strNumeProdus</span><br /><br />\n";
		echo "<span>$strDescriere</span><br /><br />\n";


		
			echo "Pret fara TVA: $strNormalPrice Lei<br />\n";
			echo "Pret cu TVA: " . round(($strNormalPrice * 1.19),2) . "Lei<br />\n";
		

		echo "<br /><form action=\"execute.php?action=addtocart\" method=\"post\" style=\"display: inline;\">\n";
		echo "<fieldset style=\"padding: 0px; border: 0px;\">\n";
		echo "<input type=\"hidden\" name=\"hddIntIdProdus\" value=\"$intIdProdus\" />";
		echo "<input type=\"submit\" alt=\"COMANDA TA\" class=\"loginbutton\" name=\"cmdAddToCart\" value=\"Adauga in cos\" />\n";
		echo "</fieldset>\n";
		echo "</form>\n";

		echo "</td>\n";
		echo "</tr>\n";
	}
	echo "</table>\n";
} else { // nu exista 
	echo "<p style=\"font-size: 9pt; font-weight: bold; text-align: center;\">Ne pare rau, momentan nu exista produse.</p>\n";
}
							//-----------------------
						?>
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