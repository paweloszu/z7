<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</HEAD>
<BODY>
<?php
 require('db.php');
 $user=$_POST['user']; // login z formularza
 $pass1=$_POST['pass1']; // hasło z formularza
 $pass2=$_POST['pass2']; // hasło z formularza


if($pass1 == $pass2){
	mysqli_query($con, "INSERT into users (username, password) VALUES ('$user', '$pass1')") or die ("Błąd zapytania do bazy danych");
	mysqli_close($con);
	
	mkdir ("$user", 0777);
	
	echo 'Zarejestrowano pomyślnie! <br>
	<a href="login_form_user.php">Logowanie</a>';
} else{
	echo 'Podano dwa różne hasła!';
}


?>
</BODY>
</HTML>
