function confirmSubmit(strAsk) {
	return (confirm(strAsk))
}
//-------------------------------------------
function fConfirmEmptyCart() {
	return (confirmSubmit("Doriti sa stergeti continutul cosului ?"));
}
//-------------------------------------------
function numeralsOnly(evt) {
	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.keyCode) ? evt.keyCode : 
			((evt.which) ? evt.which : 0));
	if (charCode > 31 && (charCode < 48 || charCode > 57)) {
			alert("Caractere permise pentru acest camp: 0123456789");
			return false;
	}
	return true;
}
//-------------------------------------------
function fValidareAdaugareCategorie() {
	if (document.getElementById("txtNume").value == "") {
		alert ("Completati campul 'Nume Categorie'.");
		document.getElementById("txtNume").focus();
		return false;
	}
	return true;
}
//-------------------------------------------
function fValidareAdaugareSubcategorie() {
	if (document.getElementById("selCategorie").value == "select") {
		alert ("Selectati o categorie din lista.");
		document.getElementById("selCategorie").focus();
		return false;
	}
	if (document.getElementById("txtNume").value == "") {
		alert ("Completati campul 'Nume Categorie'.");
		document.getElementById("txtNume").focus();
		return false;
	}
	return true;
}
//-------------------------------------------
function fValidareAdaugareProdus() {
	if (document.getElementById("selCategorie").value == "select") {
		alert ("Selectati o categorie din lista.");
		document.getElementById("selCategorie").focus();
		return false;
	}
	if (document.getElementById("selSubcategorie").value == "select") {
		alert ("Selectati o subcategorie din lista.");
		document.getElementById("selSubcategorie").focus();
		return false;
	}
	if (document.getElementById("selProducator").value == "select") {
		alert ("Selectati un producator din lista.");
		document.getElementById("selProducator").focus();
		return false;
	}
	if (document.getElementById("txtNume").value == "") {
		alert ("Completati campul 'Nume Produs'.");
		document.getElementById("txtNume").focus();
		return false;
	}
	if (document.getElementById("txtCod").value == "") {
		alert ("Completati campul 'Cod Produs'.");
		document.getElementById("txtCod").focus();
		return false;
	}
	if (document.getElementById("txtDescriere").value == "") {
		alert ("Completati campul 'Descriere Produs'.");
		document.getElementById("txtDescriere").focus();
		return false;
	}
	if (document.getElementById("txtSpecificatii").value == "") {
		alert ("Completati campul 'Specificatii Produs'.");
		document.getElementById("txtSpecificatii").focus();
		return false;
	}
	if (document.getElementById("txtPret").value == "") {
		alert ("Completati campul 'Pret'.");
		document.getElementById("txtPret").focus();
		return false;
	}
	if (document.getElementById("txtGarantie").value == "") {
		alert ("Completati campul 'Garantie'.");
		document.getElementById("txtGarantie").focus();
		return false;
	}
	return true;
}

//-------------------------------------------
function fValidareInregistrare() {
	if (document.getElementById("txtNumeInregistrare").value == "") {
		alert ("Completati campul 'Nume Utilizator'.");
		document.getElementById("txtNumeInregistrare").focus();
		return false;
	}
	if (document.getElementById("txtParolaInregistrare").value == "") {
		alert ("Completati campul 'Parola'.");
		document.getElementById("txtParolaInregistrare").focus();
		return false;
	}
	if (document.getElementById("txtParolaInregistrare").value != document.getElementById("txtParolaInregistrare2").value) {
		alert ("Confirmati parola");
		document.getElementById("txtParolaInregistrare2").focus();
		return false;
	}
	if (document.getElementById("txtEmail").value == "") {
		alert ("Completati campul 'Adresa Email'.");
		document.getElementById("txtEmail").focus();
		return false;
	}
	if (document.getElementById("txtEmail").value != document.getElementById("txtEmail2").value) {
		alert ("Confirmati adresa email");
		document.getElementById("txtEmail2").focus();
		return false;
	}
	if (document.getElementById("txtAdresa").value == "") {
		alert ("Completati campul 'Adresa'.");
		document.getElementById("txtAdresa").focus();
		return false;
	}
	return true;
}
//-------------------------------------------
function fValidareActualizare() {
	if (document.getElementById("txtParolaInregistrare").value == "") {
		alert ("Completati campul 'Parola'.");
		document.getElementById("txtParolaInregistrare").focus();
		return false;
	}
	if (document.getElementById("txtParolaInregistrare").value != document.getElementById("txtParolaInregistrare2").value) {
		alert ("Confirmati parola");
		document.getElementById("txtParolaInregistrare2").focus();
		return false;
	}
	if (document.getElementById("txtEmail").value == "") {
		alert ("Completati campul 'Adresa Email'.");
		document.getElementById("txtEmail").focus();
		return false;
	}
	if (document.getElementById("txtEmail").value != document.getElementById("txtEmail2").value) {
		alert ("Confirmati adresa email");
		document.getElementById("txtEmail2").focus();
		return false;
	}
	if (document.getElementById("txtAdresa").value == "") {
		alert ("Completati campul 'Adresa'.");
		document.getElementById("txtAdresa").focus();
		return false;
	}
	return true;
}
//-------------------------------------------
function fValidareComanda() {
	if (document.getElementById("txtNumeCumparator").value == "") {
		alert ("Completati campul 'Nume Cumparator'.");
		document.getElementById("txtNumeCumparator").focus();
		return false;
	}
	if (document.getElementById("txtEmailCumparator").value == "") {
		alert ("Completati campul 'Adresa Email'.");
		document.getElementById("txtEmailCumparator").focus();
		return false;
	}
	if (document.getElementById("txtEmailCumparator").value != document.getElementById("txtEmailCumparator2").value) {
		alert ("Confirmati adresa email");
		document.getElementById("txtEmailCumparator2").focus();
		return false;
	}
	if (document.getElementById("txtAdresaCumparator").value == "") {
		alert ("Completati campul 'Adresa'.");
		document.getElementById("txtAdresaCumparator").focus();
		return false;
	}
	return true;
}
//-------------------------------------------
