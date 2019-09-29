<?php
  

function neu_laden($formular_ausdruck,$korr_veri)
{
 if(($formular_ausdruck != "") && ($korr_veri == "")){echo $formular_ausdruck;}
 // if(($formular_ausdruck == "") && ($korr_veri != "")) {echo $korr_veri;}
 if($korr_veri != ""){echo $korr_veri;}
} 
 
 
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////     
  



/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function veri_fizieren($textfeld,$suche,$korr_veri,$links)
{
    $spei_chern.="spei_chern_".$links;
    
    $textfeld=htmlentities($textfeld);
    
    if ($suche == True)
       {     
       
       $iii=1;
      
       $count=mysql_query("select count(product) as coun_ter from five_elements_thermic where
       product like '%$textfeld%' limit 1");
       while($result_count=mysql_fetch_array($count))
       {$zaehler=$result_count['coun_ter'];}
      if ($textfeld != "") {
      $veri=mysql_query("select product, element from five_elements_thermic where
       product like '%$textfeld%' order by number");
       while($result=mysql_fetch_array($veri))
      {
      
      $korr_veri="korr_".$suche."_".$iii;
      
      $bg_color=bgcolor($result['element']);
      $font_color=fontcolor($result['element']);
      
      echo "<input type=\"submit\" name=\"$korr_veri\" value=\"$result[product]\" style=\"background-color:$bg_color;border-width:0;color:$font_color\"><br>";
      
      $iii++;
      } 
      }// ende if textfeld nicht leer
      
      if ($zaehler < 1)
      {
      echo "<br><font size=\"2\" color=\"red\">Diese Zutat ist nicht gespeichert !<br>
            Unter 'Unbekannte' zur Bearbeitung speichern ?<br>";
      echo "<input type=\"submit\" name=\"$spei_chern\" value=\"Speichern!\"><br><br>";
      }
      }
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

      if($_POST[$spei_chern] == TRUE)
      {mysql_query("insert into unbekannt (begriff) values ('$_POST[$links]')");
      
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
      
 }

return $_POST[korr_veri]; 
return $_POST[spei_chern];

} 


function farbe_verifizieren ($textfeld)
{
       $veri=mysql_query("select element from five_elements_thermic where
       product like '%$textfeld%' and $textfeld != '' limit 1");
       while( $result=mysql_fetch_array($veri) ) {
       $farb_element=$result['element'];
       }
       
      
       
        return $farb_element;
}
      





//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function wech_sel($textfeld,$seite,$korr_veri)
{ // start funktion
$count=mysql_query("select count(product) as coun_ter from five_elements_thermic where
product like '%$textfeld%'");
while($result_count=mysql_fetch_array($count))
{$zaehler=$result_count['coun_ter'];}
for ($xx = 1; $xx <= $zaehler; $xx++)
{ // start for
if ($_POST["korr_veri".$seite."_"."$xx"] == TRUE) {$wechsel = $_POST["korr_veri".$seite."_"."$xx"];}
} // ende for

return $wechsel;
} // ende funktion



///////////////////////////////////////////////////////////////////////////////////////////////////




////////////////////////////////////////////////////////////////////////////////////////////////////

function daten_felder ($anzahl_felder)
{ // start function

$anzahl_felder = $anzahl_felder / 2;

// $links == linke Spalte ...
$links = 1;
$rechts = $anzahl_felder + 1;
echo "<div align=\"center\"> <table width=\"1100\" bgcolor=\"#FFFFFF\">
";


   
   $beginn_links="beginn".$links;
  
   
   $ueber_links="ueberschrift_".$links;
   
   
   $veri_links="veri_".$links;
   
   
   
  
   echo "
   <tr>
          <td width=\"49%\" height=\"10\" bgcolor=\"#FFFFFF\" align=\"left\"><font size=\"4\" color=\"#000000\"><b>";?>
             
   <?php  $wechsel=wech_sel($_POST[$links],$links,$_POST[$veri_links]); ?>
   <?php  echo veri_fizieren($_POST[$links],$_POST[$veri_links],$_POST[korr_veri],$links);?>
   
   <?php  echo "<font style=\" font-size: 10pt; color: #ffffff; background-color: ".bgcolor(farbe_verifizieren($wechsel))."\">&nbsp;".farbe_verifizieren($wechsel)."&nbsp;</font>"; ?>
   <?php  echo "<input type=\"text\" name=\"$links\" size=\"50\" tabindex=\"$links\" value=\"";?><?php neu_laden($_POST[$links],$wechsel);echo "\" style=\"color:#000000;

    background-color:".bgcolor(farbe_verifizieren($wechsel))."; border-width:2; border-color:#cccccc; \">
    &nbsp; <button type=\"submit\" name=\"veri_$links\" value=\"veri$links\"> verifizieren</button><br><br></td></tr>";
        
  
      if ( $_POST['veri_'.$links] == TRUE ) { 
       $veri=mysql_query("select * from five_elements_thermic where
       product = '$_POST[$links]' or product like '%$_POST[$links]%' order by number");
       while( $result=mysql_fetch_array($veri) ) {
       echo "<br><br>exakte Schreibeweise &uuml;bernehmen !<br><br>";
       echo "<font style=\" color: ".fontcolor($result['element'])."; background-color: ".bgcolor($result['element'])."; \">&nbsp;Element: ".$result['element']."&nbsp;</font><br>"; 
       
       }
       }
        
$wechsel = "" ;
$links++;
 } // ende function


 
?>
&nbsp;