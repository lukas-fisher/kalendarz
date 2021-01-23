<?php

session_start();

include("funkcje.php");

if (isset($_POST) && $_POST!=null)
 {
  switch ($_POST['funkcja'])
   {
     case "pobierz":
     break;

     case "drukuj_kalendarium":
      $ile_dni = powiedz_ile_dni($_POST['miesiac'], $_POST['rok']);
      $miesiac = struktura_miesiaca($_POST['miesiac'], $_POST['rok'],$ile_dni);
      echo drukuj_schemat($miesiac);
      $_SESSION['miesiac'] = $miesiac;
     break;

     case "drukuj_edytor":
      echo $_POST['id_dnia'];
      echo "<br/>tutaj będzie formularz!<br/>";
     break;


   }
 }

?>
