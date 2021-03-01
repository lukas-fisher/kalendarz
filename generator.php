<?php

session_start();

include("funkcje.php");

if (isset($_POST) && $_POST!=null)
 {
  switch ($_POST['funkcja'])
   {
     case "pobierz":
     break;

     case "kwerenda":
       kwerenda();
     break;

     case "drukuj_kalendarium":
      $ile_dni = powiedz_ile_dni($_POST['miesiac'], $_POST['rok']);
      $miesiac = struktura_miesiaca($_POST['miesiac'], $_POST['rok'],$ile_dni);
      echo drukuj_schemat($miesiac);
      $_SESSION['miesiac'] = $miesiac;
      $_SESSION['rok'] = $_POST['rok'];
     break;

     case "poza_zakresem":
      echo "ten dzień dotyczy innego miesiąca!";
     break;

     case "drukuj_edytor":
      $dzien = $_POST['id_dnia'];
      if (strlen($_POST['id_tygodnia']) == 1) { $tydzien = "0".$_POST['id_tygodnia']; }
      else { $tydzien = $_POST['id_tygodnia']; }
      $dni = array("0","poniedzialek","wtorek", "środa", "czwartek", "piątek", "sobota", "niedziela");
      $pobierz_tydzien = $_SESSION['miesiac'][$tydzien];

      echo "<b>Edytujesz dzień</b><br/>";
      echo $pobierz_tydzien[$dzien]->format('Y m d')." ";
      echo "(".$dni[$dzien].")<br/>";
      if (($dzien > 0) AND ($dzien < 6))
       {
         echo "dzień standardowy, brak koloru.";
       }
      else if ($dzien == 6)
       {
         echo "sobota ma kolor:";
       }
      else if ($dzien == 7)
       {
         echo "czy niedziela jest pracująca?";
       }

      echo "<br/>";
      echo "święto? ";
      echo "<select id='swieto' name='value'><option value='nie'>NIE</option>";
      echo "<option value='tak'>TAK</option></select>";
     break;

     case "kolory":
     echo "<br/>schemat kolorów dla tygodnia!<br/><br/>";
     $ile_rund = 7;
     for ($i=1;$i<=$ile_rund;$i++)
      {
       echo "Set#".$i." tło <input class='set' type='color' id='tlo_".$i."' /> ";
       echo "obrys <input class='set' type='color' id='obrys_".$i."' /> ";
       echo "tekst <input class='set' type='color' id='tekst_".$i."' /> ";
       echo "<button oncklick='probka(".$i.")'>dodaj</button> ";
       /*
       if ($i==$ile_rund)
        {
          echo "<button>+set</button> ";
        }*/
       echo "<br/><br/>";
      }
     echo "<div id='probka'></div>";
     echo "<br/>";

     break;

     case "probka":
     $schemat = array("tydz","poniedziałek","wtorek", "środa", "czwartek", "piątek", "sobota", "niedziela");
     for ($i=1;$i<=7;$i++)
      {
        echo "<div class='kolorowanie' style='background-color:rgb(".$_POST['tlo'].");border: 1px solid rgb(".$_POST['obrys'].")'>".$schemat[$i]."<br/>";
        if ($i == $_POST['numer'])
         {
          echo "<input class='schemat' type='text' name='".$i."' value='Set#".$i."' /></div>";
         }
        else {
         echo "<input class='schemat' type='text' name='".$i."' value='Set#".$i."' /></div>";
        }
      }
     break;


   }
 }

?>
