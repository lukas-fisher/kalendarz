<?php

function powiedz_ile_dni($wybrany_miesiac, $wybrany_rok)
 {
   $startowa = new DateTime($wybrany_rok."-".$wybrany_miesiac."-1");

   if ($wybrany_miesiac == "12")
    {
     $nastepny_miesiac = new DateTime(($wybrany_rok+1)."-".($wybrany_miesiac-11)."-1");
    }
   else
    {
     $nastepny_miesiac = new DateTime($wybrany_rok."-".($wybrany_miesiac+1)."-1");
    }

   $roznica = $startowa->diff($nastepny_miesiac);
   $roznica_int = $roznica->format('%a');

   return $roznica_int;

 }

 function struktura_miesiaca($wybrany_miesiac, $wybrany_rok,$ile_dni)
  {
    for ($i=1; $i <= $ile_dni; $i++)
     {
       $data = new DateTime($wybrany_rok."-".$wybrany_miesiac."-".$i);
       $tydzien = $data->format('W');
       $dzien_tygodnia = $data->format('N');
       $moj_miesiac[$tydzien][$dzien_tygodnia] = $data;
     }

    return $moj_miesiac;
  }

function drukuj_schemat ($moj_miesiac)
 {
   $naglowek = array("tydz","pon","wt", "śr", "czw", "pt", "sob", "nd");
   echo "<table><tr>";
   echo "<td colspan='8'><h3>Schemat miesiąca</h3></td>";
   echo "</tr><tr>";
   foreach ($naglowek as $klucze => $wartosci) {
     echo "<td><b>".$wartosci."</b></td>";
   }
   echo "</tr>";

   foreach ($moj_miesiac as $klucze => $wartosci) {
     echo "<tr>";
     echo "<td>#".$klucze."</td>";
     for ($i = 1; $i<= 7; $i++)
      {
       if ($i == 6) {$klasa = "sobota";}
       else if ($i == 7) {$klasa = "niedziela";}
       else {$klasa = "roboczy";}
       if (isset($wartosci[$i]))
        {
           echo "<td class='".$klasa."'><button onclick='edytuj_dzien(".$klucze.",".$i.")'>".$wartosci[$i]->format('d')."</button></td>";
        }
       else
        {
          $zmiana = $i-7;
          $uzupelnienie = clone $wartosci[7];
          $uzupelnienie->modify($zmiana." day");
          echo "<td>";
          echo $uzupelnienie->format('d');
          echo "</td>";
        }
      }
     echo "</tr>";
   }
   echo "</table>";
   echo "<span id='edycja_dnia'></span>";
 }


?>
