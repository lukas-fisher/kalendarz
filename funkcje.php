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
   echo "<div id='kalendarium'>";
   $naglowek = array("tydz","pon","wt", "śr", "czw", "pt", "sob", "nd");
   echo "<div><div><h3>Schemat miesiąca</h3></div></div>";

   echo "<div>";
   foreach ($naglowek as $klucze => $wartosci) {
     echo "<div class='zwykle'><b>".$wartosci."</b></div>";
   }
   echo "</div>";
   $licznik_tygodni = 0;
   $ile_tygodni = count($moj_miesiac);
   foreach ($moj_miesiac as $klucze => $wartosci) {
     $licznik_tygodni++;
     echo "<div>";
     echo "<div class='zwykle'>#".$klucze."</div>";
     for ($i = 1; $i<= 7; $i++)
      {
       if ($i == 6) {$klasa = "sobota";}
       else if ($i == 7) {$klasa = "niedziela";}
       else {$klasa = "roboczy";}
       if (isset($wartosci[$i]))
        {
           echo "<div class='".$klasa."' id='wydruk'><button onclick='edytuj_dzien(".$klucze.",".$i.")'>".$wartosci[$i]->format('d')."</button></div>";
        }
       else
        {
          if ($licznik_tygodni == 1)
           {
             $zmiana = $i-7;
             $uzupelnienie = clone $wartosci[7];
             $uzupelnienie->modify($zmiana." day");
             echo "<div class='inny'><button>";
             echo $uzupelnienie->format('d');
             echo "</button></div>";
           }
          else if ($licznik_tygodni == $ile_tygodni)
           {
             $zmiana = $i-1;
             $uzupelnienie = clone $wartosci[1];
             $uzupelnienie->modify("+".$zmiana." day");
             echo "<div class='inny'><button>";
             echo $uzupelnienie->format('d');
             echo "</button></div>";
           }
        }
      }
     echo "</div>";
   }
echo "</div>";
echo "<div id='edycja_dnia'></div>";
 }

function kwerenda()
{
  $miesiace = array(1=>"Styczeń", 2=>"Luty", 3=>"Marzec", 4=>"Kwiecień", 5=>"Maj", 6=>"Czerwiec",
  7=>"Lipiec", 8=>"Sierpień", 9=>"Wrzesień", 10=>"Październik", 11=>"Listopad", 12=>"Grudzień");
  echo "Kalendarium za: ";
  echo "<select id='miesiac'>";
  foreach ($miesiace as $klucze => $wartosci) {
    echo "<option value='".$klucze."'";
    if ($klucze == date('m')) { echo " selected"; }
    echo ">".$wartosci."</option>";
  }
  echo "</select> ";

  $rok = date('Y');
  echo "<select id='rok'>";
  for ($i=-1;$i<2;$i++)
   {
    $drukuj_rok = $rok+$i;
    echo "<option value='".$drukuj_rok."'";
    if ($drukuj_rok == date('Y')) { echo " selected"; }
    echo ">".$drukuj_rok."</option>";
   }
  echo "</select> ";
  echo "<button onclick='uzyskaj_kalendarium()'>pokaż schemat</button>";
}

?>
