<?php
require("db.php");
$rezultat=mysqli_query($con, "SELECT * from logi where idu = $_COOKIE['user'] ORDER BY idl DESC");
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
if($rezultat[3] ==1){
	echo'UWAGA!!';
}
?>

</div>
</body>
</html>