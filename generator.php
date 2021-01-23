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
      $dzien = $_POST['id_dnia'];
      if (strlen($_POST['id_tygodnia']) == 1)
       { $tydzien = "0".$_POST['id_tygodnia']; }
      else
       { $tydzien = $_POST['id_tygodnia']; }
      $dni = array("0","poniedzialek","wtorek", "środa", "czwartek", "piątek", "sobota", "niedziela");
      $pobierz_tydzien = $_SESSION['miesiac'][$tydzien];

      echo "<br/>tutaj będzie formularz!<br/>";
      echo "data ".$pobierz_tydzien[$dzien]->format('Y m d')."<br/>";
      echo "dzień tygodnia: ".$dni[$dzien]."<br/>";
     break;


   }
 }

?>
