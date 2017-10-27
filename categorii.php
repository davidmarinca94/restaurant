<?php
	session_start();
	include_once("./include/functions.inc.php");
	$myConn = fDBConnect();
	$intIdCategorieCautare =isset($_GET['intIdCategorieCautare']) ? $_GET['intIdCategorieCautare'] : '';
	$mode = isset($_GET['mode'])? $_GET['mode'] : '';
	if ($mode == "main") { // afiseaza categoriile si subcategoriile
		$strSQL = "SELECT * FROM tcategorii";
		$result = mysql_query($strSQL);
		$strTitle = "Categorii produse : ";
		$bFirst = true;
		while ($row = mysql_fetch_array($result)) {
			if (!$bFirst) {
				$strTitle .= ", ";
			} else {
				$bFirst = false;
			}
			$strTitle .= $row['fNumeCategorie'];
		}
	} else { // afiseaza categoria selectata
		$intIdCategorie = $_GET['intIdCategorie'];
		$strSQL = "SELECT fNumeCategorie FROM tcategorii WHERE fIdCategorie=$intIdCategorie";
		$result = mysql_query($strSQL);
		if (mysql_num_rows($result) > 0) { // categorie valida
			$row = mysql_fetch_array($result);
			$strNumeCategorie = $row['fNumeCategorie'];
			$strTitle = " $strNumeCategorie";
		} else { // categorie invalida
			$strNumeCategorie = "Categorie Invalida";
			$strTitle = "Categorie Invalida";
		}
	}

?>
<?php fInsertDocType(); ?>
<head>
<title><?php echo $strTitle; ?></title>
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
						<?php if ($mode != "main")  { ?>
						<div id="path">
						<a class="BottomLink" href="index.php">Acasa</a> &nbsp; &nbsp; | &nbsp; &nbsp; 
						<a class="BottomLink" href="categorii.php?intIdCategorie=<?php echo $intIdCategorie; ?>"><?php echo $strNumeCategorie; ?></a> &nbsp; &nbsp; | &nbsp; &nbsp; 
						</div>
						<?php } ?>
						<h1 class="pageheader"><?php echo  $strTitle; ?></h1>
<?php

if ($mode == "main") { // afiseaza categoriile si subcategoriile
	$strSQL = "SELECT * FROM tcategorii";
	$result = mysql_query($strSQL);
	if (mysql_num_rows($result) > 0) { // afiseaza categoriile
		echo "<table style=\"width: 100%; background-color: #FFFFFF; border: 2px #B1C9B1  solid; font-size: 9pt;\">\n";
		$intIndex = 1;
		while ($row = mysql_fetch_array($result)) {
			$intIndex = 3 - $intIndex;
			$intIdCategorie = $row['fIdCategorie'];
			$strNumeCategorie = $row['fNumeCategorie'];
			$strSQLSub = "SELECT * FROM tsubcategorii WHERE fIdCategorie=$intIdCategorie";
			$resultSub = mysql_query($strSQLSub);
			if ($intIndex == 1) {
				echo "<tr class=\"categlistrow1\">\n";
			} else {
				echo "<tr class=\"categlistrow2\">\n";
			}
			echo "<td style=\"width: 200px; text-align: left;\"><a class=\"ProdNameLink\" href=\"categorii.php?intIdCategorie=$intIdCategorie\">$strNumeCategorie</a></td>\n";

			echo "<td style=\"vertical-align: top; text-align: justify; padding: 10px;\">\n";
			// start afisare subcategorii
			if (mysql_num_rows($resultSub) > 0) { // exista subcategorii
				while ($rowSub = mysql_fetch_array($resultSub)) {
					$intIdSubcategorie = $rowSub['fIdSubcategorie'];
					$strNumeSubcategorie = $rowSub['fNumeSubcategorie'];
					echo "<a class=\"ProdNameLink\" href=\"subcategorii.php?intIdSubcategorie=$intIdSubcategorie\">$strNumeSubcategorie</a><br />\n";
				}
			} else { // nu exista subcategorii
				echo "Nu exista subcategorii.";
			}
			// end afisare subcategorii
			echo " </td>\n";

			echo "</tr>\n";
		}
		echo "</table>\n";
	} else {
		echo "<p style=\"font-size: 9pt; font-weight: bold; text-align: center;\">Ne pare rau, momentan nu exista nici o categorie in baza de date.</p>\n";
	}
} else { // afiseaza categoria selectata
	$strToday = date("Ymd");
	$strSQL = "SELECT tproduse.*, tcategorii.fIdCategorie FROM (tproduse INNER JOIN tsubcategorii ON tproduse.fIdSubcategorie = tsubcategorii.fIdSubcategorie) INNER JOIN tcategorii ON tsubcategorii.fIdCategorie = tcategorii.fIdCategorie where tcategorii.fIdCategorie=$intIdCategorie";

	$result = mysql_query($strSQL);
	if (mysql_num_rows($result) > 0) { // exista produse in promotie
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


<img alt=\"$strNumeProdus\" src=\"./images/produse/$strImagine\" style=\"width: 80px; height: 80px; border: 2px #B1C9B1 solid;\" /></a></td>\n";

			echo "<td style=\"vertical-align: top; text-align: justify; padding: 10px;\"><span>$strNumeProdus</span><br /><br />\n";
			echo "<span>$strDescriere</span><br /><br />\n";


		
				echo "Pret fara TVA: $strNormalPrice LEI<br />\n";
				echo "Pret cu TVA: " . round(($strNormalPrice * 1.19),2) . "LEI<br />\n";
		


			echo "<br /><form action=\"execute.php?action=addtocart\" method=\"post\" style=\"display: inline;\">\n";
			echo "<fieldset style=\"padding: 0px; border: 0px;\">\n";
			echo "<input type=\"hidden\" name=\"hddIntIdProdus\" value=\"$intIdProdus\" />";
			echo "<input type=\"submit\" alt=\"COMANDA TA  \" class=\"loginbutton\" name=\"cmdAddToCart\" value=\"Adauga in cos \" />\n";
			echo "</fieldset>\n";
			echo "</form>\n";

			echo "</td>\n";
			echo "</tr>\n";
		}
		echo "</table>\n";
	} else { // nu exista produse 
		echo "<p style=\"font-size: 9pt; font-weight: bold; text-align: center;\">Ne pare rau, momentan nu exista produse.</p>\n";
	}
}
?>
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