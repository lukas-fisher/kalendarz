<?php
session_start();

echo "mój kalnedarz<br/>";

$wybrany_miesiac = "2";
$wybrany_rok = "2021";

$startowa = new DateTime($wybrany_rok."-".$wybrany_miesiac."-1");
$nastepny_miesiac = new DateTime($wybrany_rok."-".($wybrany_miesiac+1)."-1");

echo $startowa->format('Y-m-d');
echo "<br/>";
echo $nastepny_miesiac->format('Y-m-d');
echo "<br/>";




$roznica = $startowa->diff($nastepny_miesiac);
//echo $roznica->format('%a');

echo $roznica;
echo "<br/>";

echo "moja pętla tworząca obiekty:";
echo "(pierwsze wywyłanie jest poza nią)";
echo "<br/>";

$moj_miesiac[1] = $startowa;
echo $moj_miesiac[1]->format('Y-m-d');
echo "<br/>";

for ($i=2; $i <= $roznica->format('%a'); $i++)
 {
   $moj_miesiac[$i] = new DateTime($wybrany_rok."-".$wybrany_miesiac."-".$i);
   $moj_miesiac[$i]-> format('Y-m-d');
   echo "<br/>";
 }
?>
