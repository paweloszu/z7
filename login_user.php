<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</HEAD>
<BODY>
<?php
 include("getBrowser.php");
 require('db.php');
 session_start();
 $user=$_POST['user']; // login z formularza
 $pass=$_POST['pass']; // hasło z formularza

 mysqli_query($con, "SET NAMES 'utf8'"); // ustawienie polskich znaków
 $result = mysqli_query($con, "SELECT * FROM klienci WHERE nazwisko='$user'"); // pobranie z BD wiersza, w którym login=login z formularza
 $rekord = mysqli_fetch_array($result); // wiersza z BD, struktura zmiennej jak w BD
 if(!$rekord) //Jeśli brak, to nie ma użytkownika o podanym loginie
 {
 mysqli_close($con); // zamknięcie połączenia z BD
 echo "Brak użytkownika o takim loginie !"; // UWAGA nie wyświetlamy takich podpowiedzi dla hakerów
 }
 else
 { // jeśli $rekord istnieje
 if($rekord['haslo']==$pass) // czy hasło zgadza się z BD
 {
	 
	$ipaddress = $_SERVER["REMOTE_ADDR"];
	function ip_details($ip) {
	$json = file_get_contents ("http://ipinfo.io/{$ip}/geo");
	$details = json_decode ($json);
	return $details;
	}
	$details = ip_details($ipaddress);
	$ip = $details -> ip;
	 
	$ua=getBrowser();
	$_SESSION['username'] = $user;
	$_SESSION['idk'] = $rekord['idk'];
	
	$idk = $_SESSION['idk'];
	$browser = $ua['name'] . " " . $ua['version'];
	$system = $ua['platform'];
	
	mysqli_query($con, "INSERT into logiklientow (idk, przegladarka, system, ip) VALUES ($idk, '$browser', '$system', '$ip')");
	
	header("Location: panel_usera.php");
 }
 else
 {
 mysqli_close($con);
 echo "Błąd w haśle !"; // UWAGA nie wyświetlamy takich podpowiedzi dla hakerów
 }
}
?>
</BODY>
</HTML>
