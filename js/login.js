function fValidateLogin() {
	if (document.getElementById("txtNumeUtilizator").value.length < 5) {
		alert("Numele utilizator trebuie sa contina cel putin 5 caractere");
		document.getElementById("txtNumeUtilizator").focus();
		return false;
	}
	if (document.getElementById("txtParola").value.length < 5) {
		alert("Parola trebuie sa contina cel putin 5 caractere");
		document.getElementById("txtParola").focus();
		return false;
	}
	return true;
}