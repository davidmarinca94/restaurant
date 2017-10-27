<?php
require_once("mysql.inc.php");
//--------------------------------------------------------------------------------------------------------
function fInsertMetaTags() {
	echo "<meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\" />\n";
	echo "<meta name=\"Revisit-after\" content=\"2 days\" />\n";
	echo "<meta name=\"Robots\" content=\"index, follow\" />\n";
	echo "<meta name=\"Description\" content=\"cumpara.ro description\" />\n";
	echo "<meta name=\"Keywords\" content=\"restaurant, magazin, mancare\" />\n";
	echo "<meta name=\"Language\" content=\"ro\" />\n";
	echo "<meta name=\"Generator\" content=\"editplus\" />\n";
	echo "<meta name=\"Author\" content=\"David\" />\n";
	echo "<meta name=\"Rating\" content=\"General\" />\n";
}
//--------------------------------------------------------------------------------------------------------
function fInsertCSS() {
	echo "<link type=\"text/css\" rel=\"stylesheet\" href=\"./css/style.css\" />\n";
}
//--------------------------------------------------------------------------------------------------------
function fInsertJS() {
	echo "<script type=\"text/javascript\" src=\"./js/functions.js\"></script>\n";
	echo "<script type=\"text/javascript\" src=\"./js/login.js\"></script>\n";
}
//--------------------------------------------------------------------------------------------------------
function fInsertDocType() {
	echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
	echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\"     \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">\n";
	echo "<html xmlns=\"http://www.w3.org/1999/xhtml\" xml:lang=\"en\" lang=\"en\">\n";
}
//--------------------------------------------------------------------------------------------------------
function fInsertLoginArea() {
	echo "<div id=\"loginarea\">\n";
	$intIdUtilizator =isset($_SESSION['intIdUtilizator']) ? $_SESSION['intIdUtilizator'] : '';
	if ($intIdUtilizator  > 0) { // user is authenticated, display name & logout link
		echo "Bine ai venit " . $_SESSION['strNumeUtilizator'] . " &nbsp; <a class=\"TopMyAccountLink\" href=\"contul_meu.php\">:: Contul meu</a> &nbsp; | &nbsp; <a class=\"LogoutLink\" href=\"execute.php?action=logout\">:: Iesire</a>\n";
	} else { // user is not authenticated, display login form
		echo "<form action=\"execute.php?action=login\" method=\"post\" style=\"display: inline;\" onsubmit=\"return fValidateLogin();\">\n";
		echo "<fieldset style=\"padding: 0px; border: 0px;\">\n";
		echo "<label class=\"loginlabel\" for=\"txtNumeUtilizator\">Utilizator:</label>\n";
		echo "<input class=\"logininput\" type=\"text\" name=\"txtNumeUtilizator\" id=\"txtNumeUtilizator\" maxlength=\"32\" />\n";
		echo "<label class=\"loginlabel\" for=\"txtParola\">Parola:</label>\n";
		echo "<input class=\"logininput\" type=\"password\" name=\"txtParola\" id=\"txtParola\" maxlength=\"32\" />\n";
		echo "<input type=\"submit\" alt=\"Autentificare\" class=\"loginbutton\" name=\"cmdLogin\" id=\"cmdLogin\" value=\"Autentificare\" />\n";
		echo "<input type=\"button\" alt=\"Cont nou\" class=\"loginbutton\" onclick=\"location.href='inregistrare.php'\" name=\"cmdRegister\" id=\"cmdRegister\" value=\"Cont nou\" />\n";
		echo "</fieldset>\n";
		echo "</form>\n";
	}
	echo "</div>\n";
	 
}
//--------------------------------------------------------------------------------------------------------
function fInsertTopMenu() {
	echo "<span id=\"topmenu\">\n";
echo "<a href=\"recenzii.php\">Recenzii</a>&nbsp;|&nbsp;\n";
	echo "<a href=\"index.php\">Acasa</a>&nbsp;|&nbsp;\n";
	echo "<a href=\"harta_site1.php\">Harta</a>&nbsp;|&nbsp;\n";
	
	echo "<a href=\"harta_site.php\">Cautare</a>&nbsp;|&nbsp;\n";
	echo "<a href=\"contact.php\">Contact</a>\n";
	echo "</span>\n";
}
//--------------------------------------------------------------------------------------------------------
function fInsertQuickSearch($intIdCategorieCautare) {
	echo "<CENTER><table id=\"searchtable\">\n";
	echo "<tr><td id=\"searchtabletop\"></td></tr>\n";
	echo "<tr><td id=\"searchtablemain\">\n";
	echo "<form action=\"sresults.php\" method=\"post\" style=\"display: inline;\" onsubmit=\"return fValidateQuickSearch();\">\n";
	echo "<fieldset style=\"padding: 0px; border: 0px;\">\n";
	echo "<label class=\"label\" for=\"selCateg\">FELURI DE MANCARE:</label> ";
	//$_SERVER['PHP_SELF']
	echo "<select onChange=\"document.location='" . $_SERVER['PHP_SELF'] . "?intIdCategorieCautare=' + this.options[this.selectedIndex].value;\" class=\"select\" style=\"width: 200px;\" name=\"selCateg\" id=\"selCateg\">\n";
	echo "<option value=\"0\">Toate</option>\n";
	$strSQL = "SELECT * FROM tcategorii";
	$result = mysql_query($strSQL);
	while ($row = mysql_fetch_array($result)) {
		$intIdCategorie = $row['fIdCategorie'];
		$NumeCategorie = $row['fNumeCategorie'];
		echo "<option value=\"$intIdCategorie\"";
		if ($intIdCategorieCautare == $intIdCategorie) {
			echo " selected ";
		}
		echo ">$NumeCategorie</option><br></br>\n";
	}
	echo "</select><br></br><br></br>\n";
	echo "<label class=\"label\" for=\"selSubCateg\">TIPUL:</label>";
	echo "<select class=\"select\" style=\"width: 200px;\" name=\"selSubCateg\" id=\"selSubCateg\">\n";
	echo "<option value=\"0\">Toate</option>\n";
	if ($intIdCategorieCautare > 0) {
		$strSQL = "SELECT * FROM tsubcategorii WHERE fIdCategorie=$intIdCategorieCautare";
		$result = mysql_query($strSQL);
		while ($row = mysql_fetch_array($result)) {
			$intIdSubcategorie = $row['fIdSubcategorie'];
			$NumeSubcategorie = $row['fNumeSubcategorie'];
			echo "<option value=\"$intIdSubcategorie\">$NumeSubcategorie</option>\n";
		}
	}
	echo "</select><br /><br /><br></br>\n";
	echo "<input type=\"submit\" alt=\"Perform the quick search\" class=\"buttonsearch\" name=\"cmdSearch\" id=\"cmdSearch\" value=\"CAUTARE\" />\n";
	echo "</fieldset>\n";
	echo "</form>\n";
	echo "</td></tr><br></br>\n";
	echo "<tr><td id=\"searchtablebottom\"></td></tr>\n";
	echo "</table>\n";

}
//--------------------------------------------------------------------------------------------------------
function fInsertCategLeftMenu() {
	echo "<tr>\n";
	echo "<td style=\"text-align: center;\" valign=\"top\">\n";
	echo "<div id=\"divcategmenu\">\n";
	echo "<div class=\"item\">\n";
	echo "<div class=\"leftmenu\">\n";
	echo "<h1> &nbsp;  &nbsp; FELURI DE MANCARE:</h1>\n";
	$strSQL = "SELECT * FROM tcategorii ORDER BY fIdCategorie";
	$result = mysql_query($strSQL);
	if (mysql_num_rows($result) > 0) { // categories found
		while ($row = mysql_fetch_array($result)) {
			echo "<a href=\"categorii.php?intIdCategorie=" . $row['fIdCategorie'] . "\"> &nbsp;  &nbsp;  &nbsp; " . $row['fNumeCategorie'] . "</a>\n";
		}		
	} else { // no category found
		echo "<div style=\"padding: 10px; text-align: center;\">Nici un tip de produse.</div>\n";
	}
	echo "</div>\n";
	echo "</div>\n";
	echo "</div>\n";
	echo "</td>\n";
	echo "</tr>\n";
}
//--------------------------------------------------------------------------------------------------------
function fInsertInfoLeftMenu() {
	echo "<tr>\n";
	echo "<td style=\"text-align: center;\">\n";
	echo "<div id=\"divinfomenu\">\n";
	echo "<div class=\"item\">\n";
	echo "<div class=\"leftmenu\">\n";
	echo "<h1> &nbsp;  &nbsp; Informatii:</h1>\n";
	echo "<a href=\"harta_site1.php\">&nbsp;  &nbsp;  &nbsp;Harta</a>\n";
	echo "<a href=\"contact.php\">&nbsp;  &nbsp;  &nbsp;Contact</a>\n";
	echo "<a href=\"garantie.php\"> &nbsp;  &nbsp;  &nbsp;Despre noi</a>\n";
	echo "<img src=\"pr.jpg\" width=\"187\" height=\"150\" border=\"0\">";
	echo "</div>\n";
	echo "</div>\n";
	echo "</div>\n";
	echo "</td>\n";
	echo "</tr>\n";
}

//-----------------------------------------------------------------------------------------------------
function fInsertBottomStdText() {

	//echo "<img src=\"././images/produse/5.jpg\" width=\"75\" height=\"75\"alt=\"img\" /> &nbsp;&nbsp; <img src=\"./images/produse/2.jpg\" width=\"75\" height=\"75\" alt=\"img\" /> &nbsp;&nbsp; <img src=\"./images/produse/1.jpg\" width=\"75\" height=\"75\" alt=\"alt\" />&nbsp;&nbsp; <img src=\"./images/produse/3.jpg\" width=\"75\" height=\"75\" alt=\"img\" />&nbsp;&nbsp; <img src=\"./images/produse/4.jpg\" width=\"75\" height=\"75\" alt=\"Valid CSS\" />&nbsp;&nbsp; <img src=\"./images/produse/6.jpg\" width=\"75\" height=\"75\" alt=\"Valid CSS\" />&nbsp;&nbsp; <img src=\"./images/produse/7.jpg\" width=\"75\" height=\"75\" alt=\"Valid CSS\" />&nbsp;&nbsp; <img src=\"./images/produse/10.jpg\" width=\"75\" height=\"75\" alt=\"Valid CSS\" /> &nbsp;&nbsp; <img src=\"./images/produse/15.jpg\" width=\"75\" height=\"75\" alt=\"img\" />\n";
}
//--------------------------------------------------------------------------------------------------------

function fInsertProdLeft($intIdProdus) {
	$strSQL = "SELECT tproduse.* FROM tproduse WHERE fIdProdus=$intIdProdus";
	$result = mysql_query($strSQL);
	$row = mysql_fetch_array($result);
	$strName = $row['fNumeProdus'];
	$strImage = $row['fImagine'];
	$strSpecs = $row['fDescriere'];
	$strPrice = $row['fPret'];

	echo "<td style=\"width: 50%; text-align: center; vertical-align: top;\">\n";
	echo "<table class=\"prodsumtable\">\n";
	echo "<tr><td class=\"prodsumtop\"></td></tr>\n";
	echo "<tr><td class=\"prodsummain\">\n";
	echo "<span style=\"font-weight: bold;\" class=\"ProdNameLink\">$strName</a></span><br /><br />\n";
	echo "<img alt=\"$strName\" src=\"./images/produse/$strImage\" style=\"width: 80px; height: 80px; border: 1px #9EB79E solid;\" /><br />\n";
	echo "<p style=\"text-align: left; padding: 4px;\">\n";
	echo nl2br($strSpecs);
	echo "</p>\n";
	echo "<span style=\"font-weight: bold;\">$strPrice Lei</span><br /><br />\n";
	
	echo "</td></tr>\n";
	echo "<tr><td class=\"prodsumbottom\"></td></tr>\n";
	echo "</table>\n";
	echo "</td>\n";
}
//--------------------------------------------------------------------------------------------------------
function fInsertProdRight($intIdProdus) {
	$strSQL = "SELECT tproduse.* FROM tproduse WHERE fIdProdus=$intIdProdus";
	$result = mysql_query($strSQL);
	$row = mysql_fetch_array($result);
	$strName = $row['fNumeProdus'];
	$strImage = $row['fImagine'];
	$strSpecs = $row['fDescriere'];
	$strPrice = $row['fPret'];

	echo "<td style=\"width: 50%; text-align: center; vertical-align: top;\">\n";
	echo "<table class=\"prodsumtable\">\n";
	echo "<tr><td class=\"prodsumtop\"></td></tr>\n";
	echo "<tr><td class=\"prodsummain\">\n";
	echo "<span style=\"font-weight: bold;\" class=\"ProdNameLink\">$strName</a></span><br /><br />\n";
	echo "<img alt=\"$strName\" src=\"./images/produse/$strImage\" style=\"width: 80px; height: 80px; border: 1px #9EB79E solid;\" /><br />\n";
	echo "<p style=\"text-align: left; padding: 4px;\">\n";
	echo nl2br($strSpecs);
	echo "</p>\n";
	echo "<span style=\"font-weight: bold;\">$strPrice Lei</span><br /><br />\n";
	
	echo "</td></tr>\n";
	echo "<tr><td class=\"prodsumbottom\"></td></tr>\n";
	echo "</table>\n";
	echo "</td>\n";
}
//--------------------------------------------------------------------------------------------------------

function fInsertCartLink() {
	echo "<table id=\"cart\"><tr><td>\n";
	echo "<a href=\"rezervare.php\"><img alt=\"Cosul de cumparaturi\" src=\"./images/cart.gif\" /></a>\n";
	echo "</td></tr></table>\n";
}
//--------------------------------------------------------------------------------------------------------
function fClearCart($intIdUtilizator) { // goleste cosul
	$strSQL = "DELETE FROM tcos WHERE fIdUtilizator=$intIdUtilizator";
	mysql_query($strSQL);
}
//--------------------------------------------------------------------------------------------------------

?>