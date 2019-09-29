<?php
function fehler_rezept_speichern($rezeptname,$rezeptkategorie,$einlass)
{
$fehler_1 = TRUE;

if ($rezeptname == ""){$fehler = "Name f&uuml;r's Rezept fehlt !<br>
                               Mit \"Sortieren\" geht's weiter !";
                               $fehler_1 = FALSE;
                               }
                               
if ($rezeptkategorie == "Kategorie"){$fehler = "Sie m&uuml;ssen eine Kategorie w&auml;hlen !<br>
                               Mit \"Sortieren\" geht's weiter !";
                               $fehler_1 = FALSE;
                               }

if ($fehler_1 == TRUE){$fehler = "Das Rezept wurde gespeichert !";
                               $fehler_1 = TRUE;
                               }     
                               
                               
if ($einlass != "du_darfst_rein")

                               {$fehler = "Sie sind nicht angemeldet<br>
                               Das Rezept wurde nicht gespeichert !<br>
                               Funktion \"Sortieren\" k&ouml;nnen Sie weiter benutzen.";
                               $fehler_1 = FALSE;
                               }                                                         
return $fehler;
}







function kategorie()
{
        $kategorien="<select name=\"kategorie\" style=\" width:200px; height:40px; background-color:#FFFFFF; border-width:0; font-size: 16px; color:#000000; border-radius: 3px 3px 3px 3px;\">
          <option value=\"Sonstiges\">Sonstiges</option>
          <option value=\"Kraeuter\">Kr&auml;uter</option>
          <option value=\"Gewuerz\">Gew&uuml;rze</option>
          <option value=\"Obst\">Obst</option>
          <option value=\"Gemuese\">Gem&uuml;se</option>
          <option value=\"Fleisch\">Fleisch</option>
          <option value=\"Fleisch\">Fleisch</option>
          <option value=\"Kaese\">K&auml;se</option>
          <option value=\"Milch\">Milch</option>
          <option value=\"Fisch\">Fisch</option>
          <option value=\"Gefluegel\">Gefl&uuml;gel</option>
          <option value=\"Alkohol\">Alkohol</option>
          <option value=\"Saefte\">S&auml;fte</option>
          <option value=\"Getraenke\">Getr&auml;nke</option>
          <option value=\"Tee\">Tee</option>
          <option value=\"Salate\">Salate</option>
          <option value=\"Mehlspeisen\">Mehlspeisen</option>
          <option value=\"Getraenke\">Getr&auml;nke</option>
          <option value=\"Nuesse\">N&uuml;sse</option>
          <option value=\"Oel\">&Ouml;le</option>
          <option value=\"Suessstoffe\">S&uuml;&szlig;stoffe</option>
          </select>";
return $kategorien;          
}  


function fehler($passwort,$passwort_w,$nickname,$code,$code_2,$vorhanden)
{
$fehler_1 = TRUE;

$select_code=mysql_query("select checker from klartext where checker = '$code_2'");
while($result_check=mysql_fetch_array($select_code))
{$result=$result_check['checker'];}

if ($result == ""){$fehler = "Freischalt-Code ist verbraucht";
                               $fehler_1 = FALSE;}

if ($code != $code_2) {$fehler = "Freischalt-Code wurde ver&auml;ndert";
                               $fehler_1 = FALSE;}

if ($passwort != $passwort_w) {$fehler = "Passwortwiederholung ist ungleich";
                               $fehler_1 = FALSE;}
   
if (strlen($passwort) < 6) {$fehler = "Passwort zu kurz";
                              $fehler_1 = FALSE;} 
                              
if ($passwort == $nickname) {$fehler = "Fehler ! Passwort und nickname sind gleich";
                              $fehler_1 = FALSE;}                              
                              
if ($passwort == "") {$fehler = "Passwort fehlt";
                              $fehler_1 = FALSE;}                              
                              
if ($nickname == "") {$fehler = "nickname fehlt";
                              $fehler_1 = FALSE;}
                              
if ($code == "") {$fehler = "Freischaltcode fehlt";
                              $fehler_1 = FALSE;}
                              
if ($vorhanden == TRUE) {$fehler = "Passwort und/oder Nickname wird nicht akzeptiert";
                              $fehler_1 = FALSE;}                                                            
                              
    echo $fehler;
    return $fehler_1;
}                                                                                  
                             





$datum=date("d-M-Y H:i:s");
$aelter_24_std=time($datum);

function rezept_kategorie()
{
            echo"
                <select name=\"rezept_kategorie\">
                <option>Kategorie</option>
                <option>Menues</option>
                <option>Vorspeisen</option>
                <option>Hauptspeisen</option>
                <option>Desserts</option>
                <option>Salate</option>
                <option>Gemuese</option>
                <option>Snacks</option>
                <option>Kuchen</option>
                <option>Torten</option>
                <option>Backen</option>
                <option>Braten</option>
                <option>Grillen</option>
                <option>Nudelgerichte</option>
                </select> ";
                
} 

function kreis_durchgang($kreis_nr,$name)
{

switch ($kreis_nr)
{
case 0:
$selected_0="selected";
break;

case 1:
$selected_1="selected";
break;

case 2:
$selected_2="selected";
break;

case 3:
$selected_3="selected";
break;

case 4:
$selected_4="selected";
break;

case 5:
$selected_5="selected";
break;
}


            echo"
                <select name=\"$name\">
                <option value=\"0\" $selected_0>0</option>
                <option value=\"1\" $selected_1>1</option>
                <option value=\"2\" $selected_2>2</option>
                <option value=\"3\" $selected_3>3</option>
                <option value=\"4\" $selected_4>4</option>
                <option value=\"5\" $selected_5>5</option>
               
                </select> ";
                
}               
                


function neuladen($formular_ausdruck,$korr_veri)
{
 if(($formular_ausdruck != "") && ($korr_veri == "")){echo $formular_ausdruck;}
 // if(($formular_ausdruck == "") && ($korr_veri != "")) {echo $korr_veri;}
 if($korr_veri != ""){echo $korr_veri;}
} 
 
 
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////     
  


function ergaenzung ($name,$element,$temperatur_kraeuter, $temperatur_gewuerze)
{
if ( $temperatur_kraeuter == "warme_kraeuter" ) {
$abfrage="where element like '$element' and kategorie like 'Kraeuter' and temperatur = 'heiss' or 
                element like '$element' and kategorie like 'Kraeuter' and temperatur = 'warm' or 
                element like '$element' and kategorie like 'Kraeuter' and temperatur = 'neutral'"; }
                
if ( $temperatur_kraeuter == "kalte_kraeuter" ) {
$abfrage="where element like '$element' and kategorie like 'Kraeuter' and temperatur = 'neutral' or 
                element like '$element' and kategorie like 'Kraeuter' and temperatur = 'erfrischend' or 
                element like '$element' and kategorie like 'Kraeuter' and temperatur = 'kalt'"; } 
                
if ( $temperatur_kraeuter == "alle_kraeuter" ) {
$abfrage="where element like '$element' and kategorie like 'Kraeuter'"; }                               

$data.="<option $selected>&nbsp;</option>";
$data.="<option $selected>Mit Kr&auml;utern ergaenzen</option>";
$data.="<option $selected>&nbsp;</option>";


$kug_1=0;

$kraeuter_ergaenzen=mysql_query("select product from five_elements_thermic $abfrage");
while ($ergaenzung=mysql_fetch_array($kraeuter_ergaenzen)){
$$k_selected="k_selected_".$kug_1;
if ( $ergaenzung[product] == $_POST[$name] ) { $k_selected="selected"; }
else {$k_selected = ""; }
$data.="<option $k_selected>".$ergaenzung['product']."</option>";
$kug_1++;
}


if ( $temperatur_gewuerze == "warme_gewuerze" ) {
$abfrage_2="where element like '$element' and kategorie like 'Gewuerz' and temperatur = 'heiss' or 
                element like '$element' and kategorie like 'Gewuerz' and temperatur = 'warm' or 
                element like '$element' and kategorie like 'Gewuerz' and temperatur = 'neutral'"; }
                
if ( $temperatur_gewuerze == "kalte_gewuerze" ) {
$abfrage_2="where element like '$element' and kategorie like 'Gewuerz' and temperatur = 'neutral' or 
                element like '$element' and kategorie like 'Gewuerz' and temperatur = 'erfrischend' or 
                element like '$element' and kategorie like 'Gewuerz' and temperatur = 'kalt'"; } 
                
if ( $temperatur_gewuerze == "alle_gewuerze" ) {
$abfrage_2="where element like '$element' and kategorie like 'Gewuerz'"; }

//zaehler f&uuml;r Kr&auml;uter und Gew&uuml;rze
$kug=0;

// f&uuml;r die Erg&auml;nzungen
echo "<select name=\"$name\">";
echo "<option $selected>Mit Gew&uuml;rzen / Kr&auml;utern ergaenzen</option>";
echo "<option $selected>&nbsp;</option>";
$gewuerze_ergaenzen=mysql_query("select product from five_elements_thermic $abfrage_2");
while ($ergaenzung_2=mysql_fetch_array($gewuerze_ergaenzen)){
$$g_selected="g_selected_".$kug;
if ( $ergaenzung_2[product] == $_POST[$name] ) { $g_selected="selected"; }
else {$g_selected = ""; }
echo "<option $g_selected>".$ergaenzung_2['product']."</option>";
echo $kug++;
} // ende while
echo $data;
echo "</select>";
return $_POST[$name];

} // ende function




/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function verifizieren($textfeld,$suche,$korr_veri,$links)
{
    $spei_chern.="spei_chern_".$links;
    
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




function verifizieren_allg($textfeld,$suche,$korr_veri)
{
    
    
    if ($suche == True)
       {     
       
       $iii=1;
      
      if ($textfeld != "") {
      $veri=mysql_query("select product, element from five_elements_thermic where
       product like '%$textfeld%' order by number");
       while($result=mysql_fetch_array($veri))
      {
      $zaehler=$result['product'];
      $korr_veri="korr_".$suche."_".$iii;
      
      $bg_color=bgcolor($result['element']);
      $font_color=fontcolor($result['element']);
      
      echo "<input type=\"submit\" name=\"$korr_veri\" value=\"$result[product]\" style=\"background-color:$bg_color;border-width:0;color:$font_color\"><br>";
      
      $iii++;
      } 
      }// ende if textfeld nicht leer
      
      if ($zaehler == "")
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




//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function wechsel($textfeld,$seite,$korr_veri)
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

function start_kreis($beginn,$postbeginn)
{

$selected = "";
$color="rgb(255,230,230)";
if ($postbeginn == 1) {$selected = "selected";
                       $color="#00cc00";}

echo "<select name=\"$beginn\" 
style=\"color:#000000; background-color:$color; border-width: 0px; border-color: #c0c0c0; border-left-color: #c0c0c0; border-top-color: #c0c0c0; border-style: solid\">
     <option $selected value=\"0\">Nein</option>
     <option $selected value=\"1\">Ja</option>
     </select>";
 }
 
function ueberschrift($zaehler, $ueberschrift, $post_ueber)
{

$$checked="checked_".$zaehler;
$color="rgb(255,230,230)";

if ($post_ueber == "on") {$checked = "checked";}
else {$checked = "";}
echo "<input type=\"checkbox\" name=\"$ueberschrift\" $checked >";
}


////////////////////////////////////////////////////////////////////////////////////////////////////

function datenfelder ($anzahl_felder)
{ // start function

$anzahl_felder = $anzahl_felder / 2;

// $links == linke Spalte ...
$links = 1;
$rechts = $anzahl_felder + 1;
echo "<div align=\"center\"> <table width=\"1200\" bgcolor=\"#FFFFFF\">

<tr>
   <td width=\48%\" height=\"10\" bgcolor=\"#FFFFFF\"><t1l><font size=\"2\">Kreisbeginn<br>Ja/Nein
     <!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;diese Zeile als &Uuml;berschrift (z.B.: Vorspeise) //--></t1l>
   </td>
  
  <td width=\4%\" height=\"10\" bgcolor=\"#FFFFFF\"><t1l><font size=\"2\">
    &nbsp;&nbsp;</t1l>
  </td>
  
  <td width=\48%\" height=\"10\" bgcolor=\"#FFFFFF\"><t1l><font size=\"2\">Kreisbeginn<br>Ja/Nein
    <!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;diese Zeile als &Uuml;berschrift (z.B.: Dessert) //--></t1l>
  </td>
</tr>
";
for ($i = 1; $i <= $anzahl_felder; $i++)

    { // start for
   $beginn_links="beginn".$links;
   $beginn_rechts="beginn".$rechts;
   
   $ueber_links="ueberschrift_".$links;
   $ueber_rechts="ueberschrift_".$rechts;
   
   $veri_links="veri_".$links;
   $veri_rechts="veri_".$rechts;
   
   $spei_chern_r="spei_chern_".$rechts;
  
   echo "
   <tr>
          <td width=\"49%\" height=\"10\" bgcolor=\"#FFFFFF\" align=\"left\"><font size=\"4\" color=\"#000000\"><b>";?>
   <?php  $wechsel=wechsel($_POST[$links],$links,$_POST[$veri_links]); ?>
   <?php  echo verifizieren($_POST[$links],$_POST[$veri_links],$_POST[korr_veri],$links);?>
   <?php  echo start_kreis($beginn_links, $_POST[$beginn_links])."&nbsp;&nbsp;&nbsp;";?>
   <?php  /* echo ueberschrift($links, $ueber_links, $_POST[$ueber_links])."&nbsp;&nbsp;&nbsp;"; */?>
   <?php  echo "<input type=\"text\" name=\"$links\" size=\"50\" tabindex=\"$links\" value=\"";?><?php neuladen($_POST[$links],$wechsel);echo "\" style=\"color:#000000; background-color:rgb(255,230,230); border-width:2; border-color:#cccccc; border-style:none;\"> &nbsp; <button type=\"submit\" name=\"veri_$links\" value=\"veri$links\">$links verifizieren</button></td>";
        $wechsel = "";?>
        
 <?php  echo "
        <td width=\"2%\" height=\"10\" bgcolor=\"#FFFFFF\" align=\"left\"><font size=\"4\" color=\"#000000\"><b>&nbsp;&nbsp;</td>";?>        
        
        
 <?php  echo "
        <td width=\"49%\" height=\"10\" bgcolor=\"#FFFFFF\" align=\"left\"><font size=\"4\" color=\"#000000\"><b>";?>
 <?php  $wechsel_r=wechsel($_POST[$rechts],$rechts,$_POST[$veri_rechts]); ?>
 <?php  verifizieren($_POST[$rechts],$_POST[$veri_rechts],$_POST[korr_veri],$rechts);?>
 <?php  echo start_kreis($beginn_rechts, $_POST[$beginn_rechts])."&nbsp;&nbsp;&nbsp;";?>
 <?php  /* echo ueberschrift($rechts, $ueber_rechts, $_POST[$ueber_rechts])."&nbsp;&nbsp;&nbsp;"; */?>
 <?php  echo "<input type=\"text\" name=\"$rechts\" size=\"50\" tabindex=\"$rechts\" value=\"";?><?php neuladen($_POST[$rechts],$wechsel_r);echo "\" style=\"color:#000000; background-color:rgb(255,230,230); border-width:2; border-color:#cccccc; border-style:none;\"> &nbsp; <button type=\"submit\" name=\"veri_$rechts\" value=\"veri$rechts\">$rechts verifizieren</button></td>";
        $wechsel_r = "";

$links++;
$rechts++;
} // ende for
?>      
        <TR>
        <TD colspan="3" WIDTH="800" HEIGHT="20px" bgcolor="#FFFFFF" align="center"><br>
        <font family="Times" size="4"><b><input type="submit" name="sortierung" value="Sortieren" style="width: 200px; height: 35px; color:#000000; font-size: 16px; background-color: #00cc00; border-width: 1px; border-color: #c0c0c0; border-left-color: #c0c0c0; border-top-color: #c0c0c0; border-style: solid;
border-radius: 5px 5px 5px 5px;"><br>
        </td></tr>

<?php } // ende function





function fontcolor($element)
{
if ($element == "Holz"){$fontcolor="#FFFFFF";}
if ($element == "Feuer"){$fontcolor="#FFFFFF";}
if ($element == "Erde"){$fontcolor="#000000";}
if ($element == "Metall"){$fontcolor="#000000";}
if ($element == "Wasser"){$fontcolor="#FFFFFF";}
return $fontcolor;
}

function bgcolor($element)
{
if ($element == "Holz"){$bgcolor="#00cc00";}
if ($element == "Feuer"){$bgcolor="#cc3333";}
if ($element == "Erde"){$bgcolor="#cc9966";}
if ($element == "Metall"){$bgcolor="#cccccc";}
if ($element == "Wasser"){$bgcolor="#336699";}
return $bgcolor;
}

function number($element)
{
if ($element == "Holz"){$nummer=1;}
if ($element == "Feuer"){$nummer=2;}
if ($element == "Erde"){$nummer=3;}
if ($element == "Metall"){$nummer=4;}
if ($element == "Wasser"){$nummer=5;}
return $nummer;
}


function farbe ($farbe)
{
if ($farbe == "Holz"){$nummer=1; $spalten_name="holz";}
if ($farbe == "Feuer"){$nummer=2; $spalten_name="feuer";}
if ($farbe == "Erde"){$nummer=3; $spalten_name="erde";}
if ($farbe == "Metall"){$nummer=4; $spalten_name="metall";}
if ($farbe == "Wasser"){$nummer=5; $spalten_name="wasser";}
return $nummer;
return $spalten_name;
}

?>
&nbsp;