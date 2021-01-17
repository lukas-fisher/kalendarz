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
echo $roznica->format('%a');
?>
