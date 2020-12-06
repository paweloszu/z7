<?php
$con = mysqli_connect("mysql01.paweloszu.beep.pl","user7cloud","haslousera","z7cloud");
mysqli_query($con, "SET NAMES 'utf8'"); // ustawienie polskich znaków
if (mysqli_connect_errno())
  {
  echo "Błąd połączenia z bazą danych: " . mysqli_connect_error();
  }
?>