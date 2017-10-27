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
	
	
$intIdCategorie = isset($_GET['intIdCategorie'])? $_GET['intIdCategorie'] : '';

$intIdSubcategorie  = isset($_GET['intIdSubcategorie'])? $_GET['intIdSubcategorie'] : '';

$strNume = isset($_GET['strNume'])? $_GET['strNume'] : '';

$strCod = isset($_GET['strCod'])? $_GET['strCod'] : '';

$strDescriere = isset($_GET['strDescriere'])? $_GET['strDescriere'] : '';

$strPret = isset($_GET['strPret'])? $_GET['strPret'] : '';


//$intIdCategorie = $_GET['intIdCategorie'];
	//$intIdSubcategorie = $_GET['intIdSubcategorie'];
	//$intIdProducator = $_GET['intIdProducator'];
	
	$mode = isset($_GET['mode'])? $_GET['mode'] : '';
	if ($mode == "error") {
		$intIdCategorie = $_GET['intIdCategorie'];
		$intIdSubcategorie = $_GET['intIdSubcategorie'];
		$strNume = $_GET['strNume'];
		$strCod = $_GET['strCod'];
		$strDescriere = $_GET['strDescriere'];
		$strPret = $_GET['strPret'];
		
	}
?>
<html>
	<head>
		<title>Sectiunea de administrare</title>
		<link rel="stylesheet" href="../css/admin.css" type="text/css">
		<script language="javascript" src="../js/functions.js"></script>
	</head>
	<script language="javascript">
		function PageChanger(intIdCategorie) {
			document.location = 'adaugaprodus.php?intIdCategorie=' + intIdCategorie;
		}
	</script>
	<body>
		<table cellpadding="0" cellspacing="0" border="1" width="100%" height="100%">
			<tr style="height: 50px; width: 100%;">
				<td colspan="2" style="font-weight: bold; text-align: center; height: 50px; width: 100%; font-family: Tahoma, Verdana, Arial; font-size: 10pt;"> Adauga mancare </td>
			</tr>
			<tr>
				<td style="width: 200px;" valign="top">
					<?php fPrintLoginAreaAdmin($bIsLoggedIn, $strError); ?>
				</td>
				<td style="width: 700px;" valign="top" align="center">
					<form enctype="multipart/form-data" name="frmAdaugaProdus" id="frmAdaugaProdus" method="post" action="execute.php?action=adaugareprodus" onSubmit="return fValidareAdaugareProdus();">
						<table cellpadding="5" cellspacing="0" border="0" width="700" class="modelspecs">
							<tr>
								<td align="center" colspan="2" style="font-family: Tahoma, Verdana, Arial; font-weight: bold; font-size: 11pt;"><br>
								Adaugare <br>
								<br></td>
							</tr>
							<tr bgcolor="#F0E7D8">
								<td align="right" width="250">Fel mancare  :</td>
								<td width="450">
								<select onChange="PageChanger(this.options[this.selectedIndex].value);" name="selCategorie" id="selCategorie" style="width: 300px;" class="text">
								<option value="select">Selecteaza </option>
								<?php
									$strSQL = "SELECT * FROM tcategorii";
									$result = mysql_query($strSQL);
									while ($row = mysql_fetch_array($result)) {
										$intIdCateg = $row['fIdCategorie'];
										$strNumeCategorie = $row['fNumeCategorie'];
										echo "<option value=\"$intIdCateg\"";
										if ($intIdCategorie == $intIdCateg) {
											echo " selected ";
										}
										echo ">$strNumeCategorie</option>";
									}
								?>
								</select>								</td>
							</tr>
							<tr bgcolor="#F0E7D8">
								<td align="right" width="250">Tip mancare:</td>
								<td width="450">
								<select name="selSubcategorie" id="selSubcategorie" style="width: 300px;" class="text">
								<option value="select">Selecteaza </option>
								<?php
									$strSQL = "SELECT * FROM tsubcategorii WHERE fIdCategorie=$intIdCategorie";
									$result = mysql_query($strSQL);
									while ($row = mysql_fetch_array($result)) {
										$intIdSubcateg = $row['fIdSubcategorie'];
										$strNumeSubcategorie = $row['fNumeSubcategorie'];
										echo "<option value=\"$intIdSubcateg\"";
										if ($intIdSubcategorie == $intIdSubcateg) {
											echo " selected ";
										}
										echo ">$strNumeSubcategorie</option>";
									}
								?>
								</select>								</td>
							</tr>
							<tr bgcolor="#F0E7D8">
								<td align="right" width="250">Nume mancare:</td>
								<td width="450"><input type="text" value="<?php echo $strNume; ?>" name="txtNume" id="txtNume" class="text" maxlength="255" style="width: 300px;"></td>
							</tr>
							<tr bgcolor="#F0E7D8">
								<td align="right" width="250">Cod :</td>
								<td width="450"><input type="text" value="<?php echo $strCod; ?>" name="txtCod" id="txtCod" class="text" maxlength="255" style="width: 300px;"></td>
							</tr>
							<tr bgcolor="#F0E7D8">
								<td align="right" width="250" valign="top">Imagine:</td>
								<td width="450"><input type="file" name="imagineprodus" class="field"/><br>Fisiere acceptate: GIF/JPG<br />Marime maxima: 500kb<br />Dimensiuni maxime: 200px/200px</td>
							</tr>
							<?php 
								if ($mode == "error") {
									echo "<tr bgcolor=\"#F0E7D8\">";
									echo "<td colspan=\"2\">";
									echo "<p style=\"width: 90%; text-align: center; color: red; padding: 5px; border: red 2px dotted; font-family: Verdana; font-size: 10pt; font-weight: bold;\">";
									$error = $_GET['error'];
									echo "<img alt=\"Eroare\" src=\"../images/icon_error.gif\" border=\"0\" align=\"middle\"> &nbsp; ";
									echo "Eroare incarcare imagine.<br>Motivul: $error";
									echo "</p></td></tr>";
								}
							?>
							<tr bgcolor="#F0E7D8">
								<td align="right" width="250">Descriere :</td>
								<td width="450"><input type="text" value="<?php echo $strDescriere; ?>" name="txtDescriere" id="txtDescriere" class="text" maxlength="255" style="width: 300px;"></td>
							</tr>
							<tr bgcolor="#F0E7D8">
								<td align="right" width="250">Pret :</td>
								<td width="450"><input value="<?php echo $strPret; ?>" type="text" name="txtPret" id="txtPret" class="text" maxlength="255" style="width: 300px;"></td>
							</tr>

							<tr bgcolor="#F0E7D8">
								<td align="center" colspan="2">
								<input class="buttons" type="reset" name="cmdReset" id="cmdReset" value="Anuleaza modificari"> &nbsp; 
								<input class="buttons" type="submit" name="cmdGo" id="cmdGo" value="Adauga">								</td>
							</tr>
						</table>
					</form>
				</td>
			</tr>
		</table>
	</body>
</html>