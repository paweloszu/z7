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
 echo "Brak użytkownika o takim loginie !"; // UWAGA nie wyświetlamy takich podpowiedzi dla hakerów
 }
 else
 { // jeśli $rekord istnieje
 if($rekord['password']==$pass) // czy hasło zgadza się z BD
 {
	 
	setcookie("user", $user, time()+3600, "/","", 0);
	
	mysqli_query($con, "INSERT INTO logi (idu, failed) VALUES ($idu, 0)");
	
	header("Location: panel_usera.php");
	
	if($rekord['last_login_fail']){
		setcookie("warning", "1", time()+3600, "/","", 0);
	}
 }
 else
 {
	 mysqli_query($con, "INSERT INTO logi (idu, failed) VALUES ($idu, 1)");
	 //mysqli_query($con, "UPDATE users SET last_login_fail = TRUE WHERE username='$user'");
 mysqli_close($con);
 echo "Błąd w haśle !"; // UWAGA nie wyświetlamy takich podpowiedzi dla hakerów
 }
}
?>
</BODY>
</HTML>
