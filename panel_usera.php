<?php
require("db.php");
$rezultat = mysqli_query($con, "SELECT * from logi where idu = $_COOKIE[idu] ORDER BY idl DESC") or die ("Błąd zapytania do bazy danych");
$rekord = mysqli_fetch_array($rezultat);
$rekord = mysqli_fetch_array($rezultat);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Panel użytkownika</title>
</head>
<body>
<div class="form">
<h3>Zalogowano jako <?php echo $_COOKIE["user"]; ?>!</h3>
<a href="logout.php">Wyloguj</a>

<?php
if($rekord[3] == 1){
	echo'<p style="color:red">UWAGA! Ostatnia próba logowania nieudana!</p>';
}
?>
<br>
Pliki użytkownika:<br>

<?php
$directory = $_COOKIE["user"];
echo "$directory";
<br>

//
$files = scandir($directory);
sort($files); // this does the sorting
foreach($files as $file){
echo'<a href="$directory'.$file.'">'.$file.'</a><br>';
}




?>

</div>
</body>
</html>