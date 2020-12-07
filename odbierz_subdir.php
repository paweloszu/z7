<?php
 if (is_uploaded_file($_FILES['plik']['tmp_name']))
 {

	$dest = "{$_POST["var"]}/{$_FILES['plik']['name']}";

	move_uploaded_file($_FILES['plik']['tmp_name'], $dest);
	
	header("Location: podkatalog.php?subdir={$_POST["subdir"]}");
 
  
 }
 else {echo 'Błąd przy przesyłaniu danych!';}
?>
