<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Login</title>
<script type="text/javascript">

function balioakEgiaztatu(f){
	if(f.Eposta.length==0){
		alert("eposta sartu behar duzu");
		return false;
	}else if(f.Pasahitza.length==0){
		alert("pasahitza sartu behar duzu");
		return false;
	}	
	return true;
}
</script>
</head>
<body>
<h1> Identifikatu</h1>
<form id="login" name="login"  method="post" onSubmit="balioakEgiaztatu(this.form)" action="login.php">

Eposta:<br>
<input type="text" id="Eposta" name="Eposta"><br><br>

Pasahitza:<br>
<input type="password" id="Pasahitza" name="Pasahitza"><br><br>

<input type="submit" id="submit" name="logeatu" value="Logeatu"/>
<button type="button" id="hasiera" name="hasiera" onClick="hasieraraBueltatu()">Hasiera</button>
</form>
<?php
if (isset($_REQUEST['Eposta'])) {
	$Eposta = $_REQUEST['Eposta'];
	} else {
	$Eposta = "";
}

if (isset($_REQUEST['Pasahitza'])) {
	$Pasahitza = $_REQUEST['Pasahitza'];
	} else {
			$Pasahitza = "";
}
if(!$Eposta || !Pasahitza){
	echo "balioak sartu";
}
	$erabiltzaileak=simplexml_load_file("erabiltzaileak.xml");
	foreach($erabiltzaileak->erabiltzaile as $erab){
		if(($erab->eposta)==$Eposta &&($erab->pasahitza)==$Pasahitza){
			echo "pasahitza eta erabiltzaile egokiak";
			header('Location: menua.html');
		}
	}

?>

</body>
</html>
