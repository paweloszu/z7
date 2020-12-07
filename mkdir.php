<?php

$dirname=$_POST['dir_name'];

mkdir ($_COOKIE[user] . '/' . $dirname, 0777);

header("Location: panel_usera.php");


?>