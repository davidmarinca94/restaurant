<?php
	session_start();
	include_once("./include/functions.inc.php");
	
	$myConn = fDBConnect();

	

	$intIdCategorieCautare =isset($_GET['intIdCategorieCautare']) ? $_GET['intIdCategorieCautare'] : '';
$strError  = isset($_GET['strError '])? $_GET['strError '] : '';
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


<td style="width: 700px;" valign="top" align="center">
					<?php



						$strSQL = "SELECT tcomentarii.*, tutilizatori.fNumeUtilizator FROM tcomentarii,  tutilizatori WHERE  tcomentarii.fIdUtilizator=tutilizatori.fIdUtilizator";
						$result = mysql_query($strSQL);
						echo "<table cellpadding=\"3\" cellspacing=\"0\" border=\"0\" width=\"700\" class=\"modelspecs\">\n";
						$intCount = 0;
						echo "<tr align=\"center\" style=\"font-weight: bold;\">";
						echo "<td width=\"200\">Utilizator</td>";
						echo "<td width=\"100\">Comentariu</td>";
						echo "<td width=\"100\">Nota</td>";
						echo "</tr>";
						while ($row = mysql_fetch_array($result)) {
							$intIdComentariu = $row['fIdComentariu'];
							$intIdUtilizator = $row['fIdUtilizator'];
							$strNumeUtilizator = $row['fNumeUtilizator'];
							$strcom = $row['fComentariu'];
							$vot = $row['fValoareVot'];
							

	                                        
							echo "<td align=\"center\" width=\"200\"><a target=\"_blank\" class=\"genLinkReverse\">$strNumeUtilizator</a></td>\n";
							echo "<td align=\"center\" width=\"200\"><a target=\"_blank\" class=\"genLinkReverse\" >$strcom</a></td>\n";

							echo "<td align=\"center\" width=\"100\">$vot</td>\n";
							echo "</tr>\n";
							$intCount++;
						}
						echo "</table>\n";
					?>
				</td>
			</tr>






						<tr>
						<?php

$intIdUtilizator =isset($_SESSION['intIdUtilizator']) ? $_SESSION['intIdUtilizator'] : '';
								if ($intIdUtilizator > 0) { // utilizatorul este logat									
									$strSQL = "SELECT * FROM tcomentarii WHERE  fIdUtilizator=$intIdUtilizator";
									$result = mysql_query($strSQL);
									if (mysql_num_rows($result) > 0) { // utilizatorul a votat deja acest produs, se afiseaza rezultatele
										$strSQL = "SELECT SUM(fValoareVot) as totalsum FROM tcomentarii ";
										$result = mysql_query($strSQL);
										$row = mysql_fetch_array($result);
										$totalsum = $row['totalsum'];

										$strSQL = "SELECT COUNT(*) as numrows FROM tcomentarii";
										$result = mysql_query($strSQL); 
										$row = mysql_fetch_array($result);
										$numar_voturi = $row['numrows'];

										$voteresult = round($totalsum / $numar_voturi, 2);

										echo "Ati votat deja acest produs. Notele sunt intre 1-Nesatisfacator si 5-Excelent <br />";
										echo "Rezultat voturi: $voteresult";
									} else { // utilizatorul nu a votat acest produs, se afiseaza formularul de vot
										echo "<form action=\"execute.php?action=voteproduct\" method=\"post\" style=\"display: inline;\">\n";
										echo "<fieldset style=\"padding: 0px; border: 0px;\">\n";
										echo "<input type=\"hidden\" name=\"intIdUtilizator\" value=\"$intIdUtilizator\" />";

										echo "<select name=\"selVoteValue\">\n";
										echo "<option value=\"1\">1-Nesatisfacator</option>\n";
										echo "<option value=\"2\">2-Satisfacator</option>\n";
										echo "<option value=\"3\">3-Bun</option>\n";
										echo "<option value=\"4\">4-Foarte bun</option>\n";
										echo "<option value=\"5\" selected=\"selected\">5-Excelent</option>\n";
							
										echo "</select>\n";
										echo "Comentariu: <input type=\"text\" name=\"mesaj\" size=50 maxsize=100 />\n";

										echo "<input type=\"submit\"  class=\"updatebutton\" name=\"cmdVote\" id=\"cmdVote\" value=\"Trimite\" />\n";
										echo "</fieldset>\n";
										echo "</form>\n";
									}
								} else { // utilizatorul nu este logat
									echo "Pentru a putea vota acest produs trebuie sa va autentificati. Notele sunt intre 1- Nesatisfacator si 5- Excelent";
								}									
								?>


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