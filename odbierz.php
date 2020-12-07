<?php
 if (is_uploaded_file($_FILES['plik']['tmp_name']))
 {
 
 move_uploaded_file($_FILES['plik']['tmp_name'],
 $_COOKIE["user"].'/'.$_FILES['plik']['name']);
 
 header("Location: panel_usera.php");
 
 }
 else {echo 'Błąd przy przesyłaniu danych!';}
?>
