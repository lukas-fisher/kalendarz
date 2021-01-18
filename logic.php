<?php
session_start();

$wybrany_miesiac = "5";
$wybrany_rok = "2021";

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

for ($i=1; $i <= $roznica_int; $i++)
 {

   $data = new DateTime($wybrany_rok."-".$wybrany_miesiac."-".$i);
   $tydzien = $data->format('W');
   $dzien_tygodnia = $data->format('N');

   $moj_miesiac[$tydzien][$dzien_tygodnia] = $data;
 }

foreach ($moj_miesiac as $klucze => $wartosci) {
  echo "W".$klucze." ";
  for ($i = 1; $i<= 7; $i++)
   {
    if (isset($wartosci[$i]))
     {
        echo " [ ".$wartosci[$i]->format('d')." ] ";
     }
    else
     {
       echo " [ 00 ] " ;
     }
   }
  echo "<br/>";
}

?>
