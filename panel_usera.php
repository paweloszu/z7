<?php
require("db.php");
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
if($COOKIE_["warning"] ==1){
	echo'UWAGA!';
}
?>

</div>
</body>
</html>