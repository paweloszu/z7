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
<a href="logout.php">Wyloguj</a><br>

<?php
if($rekord[3] == 1){
echo'<p style="color:red">UWAGA! Ostatnia próba logowania nieudana! Czas: ' . $rekord[2] . '</p>';
}
?>
<br>
Pliki użytkownika:<br><br>

<?php
$directory = $_COOKIE["user"];

$files = scandir($directory);
$files = array_diff(($files), array('.', '..'));
foreach($files as $file){

if(is_file($directory.'/'.$file)){
	
	$file_url = str_replace(' ', '%20', $file);
	
echo "<a href=".$directory."/".$file_url." download>$file</a><br>";
}
}
?>
<br>
Podkatalogi użytkownika:<br><br>

<?php
$directory = $_COOKIE["user"];

$files = scandir($directory);
$files = array_diff(($files), array('.', '..'));
foreach($files as $file){

if(is_dir($directory.'/'.$file)){
	
	$file_url = str_replace(' ', '%20', $file);
	
echo "<a href=podkatalog.php?subdir=$file_url>$file</a><br>";
}
}
?>
<br><br>

Wgraj plik do katalogu:

<form action="odbierz.php" method="POST"
 ENCTYPE="multipart/form-data">
 <input type="file" name="plik"/>
 <input type="submit" value="Wyślij plik"/>
 </form>
 <br>



Utwórz katalog:<br>

<form method="post" action="mkdir.php">
 Nazwa katalogu:<input type="text" name="dir_name" maxlength="40" size="40"><br>
 <input type="submit" value="Utwórz"/>


</div>
</body>
</html>