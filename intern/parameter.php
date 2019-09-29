<?php 
$m_w_s_t=19;

$tarif_1= 55.00;
$tarif_2= 110.00;
$tarif_3= 185.00;

$tarif_2_ver= 39.00;
$tarif_1_ver= 35.00;
$tarif_3_ver= 39.00;

$tarif_1_korr= "";
$tarif_2_korr= 5.00;
$tarif_3_korr= 5.00;

$tarif_1_termin= "";
$tarif_2_termin= "";
$tarif_3_termin= 75.00;



$verm_tarif_1= 15.00;
$verm_tarif_2= 75.00;
$verm_tarif_3= 165.00;

$verm_tarif_2_ver= 13.00;
$verm_tarif_1_ver= 13.00;
$verm_tarif_3_ver= 13.00;

$verm_tarif_1_korr= "";
$verm_tarif_2_korr= 5.00;
$verm_tarif_3_korr= 5.00;

$verm_tarif_1_termin= "";
$verm_tarif_2_termin= "";
$verm_tarif_3_termin= 75.00;

$webmaster="u.sack@varius-medien.de";

$datum_int=date("Y-m-d H:i:s");
$int_datum=strtotime("$datum_int");

$datum=date("Y-m-d");

$super_kd_nr="7354a3df";
         
//////////////////////////////////////////////////////////////

function neuladen($db_ausdruck,$formular_ausdruck)
  {
  if($formular_ausdruck == ""){echo $db_ausdruck;}
  else {echo $formular_ausdruck;}
  } 

////////////////////////////////////////////////////////////// 
  
function ist_enthalten($spalte, $tabelle, $argument_1, $argument_2)
{
$result=FALSE;
$abfrage=mysql_query("select count($spalte) as anzahl from $tabelle 
where $argument_1 = '$argument_2'");
while($summe=mysql_fetch_array($abfrage)){
if($summe[anzahl] >= 1){
$result=TRUE;
} // ende if
} // ende while
return $result;
} // ende function

//verkaufsnummern // der Wert kann sich aendern, der Name nicht !
$zehntausend=10000;
//vermietnummern // der Wert kann sich aendern, der Name nicht !
$fuenfzigtausend=50000; 
//Laenge der Mitarbeiter-Numern // der Wert kann sich aendern, der Name nicht !
$acht=8;  
  
?>
