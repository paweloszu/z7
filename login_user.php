<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</HEAD>
<BODY>
<?php
 require('db.php');
 $user=$_POST['user']; // login z formularza
 $pass=$_POST['pass']; // hasło z formularza

 $result = mysqli_query($con, "SELECT * FROM users WHERE username='$user'"); // pobranie z BD wiersza, w którym login=login z formularza
 $rekord = mysqli_fetch_array($result); // wiersza z BD, struktura zmiennej jak w BD
 $idu = $rekord['id'];
 if(!$rekord) //Jeśli brak, to nie ma użytkownika o podanym loginie
 {
 mysqli_close($con); // zamknięcie połączenia z BD
 echo "Błędnie dane logowania";
 }
 else
 { // jeśli $rekord istnieje
 if($rekord['password']==$pass) // czy hasło zgadza się z BD
 {
	 
	setcookie("user", $user, time()+3600, "/","", 0); //cookie na czas 1 godzny
	setcookie("idu", $idu, time()+3600, "/","", 0); //cookie na czas 1 godzny
	
	mysqli_query($con, "INSERT INTO logi (idu, failed) VALUES ($idu, 0)");
	
	header("Location: panel_usera.php");
	
 }
 else
 {
	 mysqli_query($con, "INSERT INTO logi (idu, failed) VALUES ($idu, 1)");
	 
 mysqli_close($con);
 echo "Błędne dane logowania";
 }
}
?>
</BODY>
</HTML>
