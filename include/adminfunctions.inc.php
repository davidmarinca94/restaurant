<?php
require("config.inc.php");
//-----------------------------------------------------------------------------------------------------------------
function fCheckAdminLogin() {
$intIdAdmin= isset($_SESSION['intIdAdmin'])? $_SESSION['intIdAdmin'] : '';
	//if (($_SESSION['intIdAdmin'] == "") || (!isset($_SESSION['intIdAdmin']))) {
if (($intIdAdmin == "") || (!$intIdAdmin)) {
		return false;
	} else {
		return true;
	}
}
//-----------------------------------------------------------------------------------------------------------------
function fCheckUserPassAdmin($strUsername, $strPassword) {
	$strSQL = "SELECT fIdAdmin, fUsername FROM tadmins WHERE fUsername='$strUsername' AND fPassword='$strPassword'";
	$result = mysql_query($strSQL); 
	if (mysql_num_rows($result) < 1) {
		return false;
	} else {
		$row = mysql_fetch_array($result);
		$_SESSION['intIdAdmin'] = $row['fIdAdmin'];
		$_SESSION['strUsername'] = $row['fUsername'];
		return true;
	}
}
//-----------------------------------------------------------------------------------------------------------------
function fPrintLoginAreaAdmin($bIsLoggedIn, $strError) {
	if ($bIsLoggedIn) { 
		// the admin is logged in, say HI and display link to cart and link to logout
		$strUsername = $_SESSION['strUsername'];
		echo "<table class=\"modelspecs\"><tr><td>\n";
		echo "<br />Bine ai venit <b>$strUsername</b><br /><br />";
		echo "<a class=\"genLinkMenu\" href=\"modificaparola.php\">Modificare parola</a><br />";

		echo "<a class=\"genLinkMenu\" href=\"categorii.php\">Administrare feluri de produse culinare</a>";
		echo "<a class=\"genLinkMenu\" href=\"subcategorii.php\">Administrare tipuri produse culinare</a>";
		echo "<a class=\"genLinkMenu\" href=\"produse.php\">Administrare mancare</a><br>";

		echo "<a class=\"genLinkMenu\" href=\"utilizatori.php\">Administrare utilizatori</a>";
		echo "<a class=\"genLinkMenu\" href=\"comentarii.php\">Administrare comentarii</a><br>";

		echo "<a class=\"genLinkMenu\" href=\"comenzi.php\">Administrare rezervari</a>";
		echo "<a class=\"genLinkMenu\" href=\"rapoarte.php\">Rapoarte</a><br>";
		
		echo "<a class=\"genLinkMenu\" href=\"execute.php?action=logout\">Iesire</a>";
		echo "</td></tr></table>\n";
	} else {
		// the admin is not logged in, display the login/register form
		echo "<form name=\"frmLogin\" method=\"post\" action=\"execute.php?action=login\" onsubmit=\"return fValidateLogin();\">\n";
		if ($strError == "loginerror") {
			echo "<font color=\"red\"><b><center>Eroare autentificare!</b></center></font>\n";
		}
		echo "<table class=\"modelspecs\"><tr><td>Utilizator:<br />\n";
		echo "<input class=\"text\" type=\"text\" style=\"width: 150px;\" name=\"txtUsername\" id=\"txtUsername\" maxlength=\"32\"><br />\n";
		echo "Parola:<br />\n";
		echo "<input class=\"text\" type=\"password\" style=\"width: 150px;\" name=\"txtPassword\" id=\"txtPassword\" maxlength=\"32\"><br /><br />\n";
		echo "<input class=\"buttons\" type=\"submit\" style=\"width: 150px;\" name=\"cmdLogin\" id=\"cmdLogin\" value=\"Autentificare\"><br /><br />\n";
		echo "</td></tr></table></form>\n";
	}
}
//-----------------------------------------------------------------------------------------------------------------
//-----------------------------------------------------------------------------------------------------------------
//-----------------------------------------------------------------------------------------------------------------
//-----------------------------------------------------------------------------------------------------------------
//-----------------------------------------------------------------------------------------------------------------

?>