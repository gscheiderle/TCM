<?php 

// Sonderzeichen aus der sessionid entfernen   
$tabellen_name=str_replace("?","7",str_replace("&","6",str_replace(":","5",str_replace("\\","4",str_replace("/","3",str_replace("%","2",str_replace("$","1",session_id())))))));   

$temp_tab_name=$tabellen_name."_1"; 
$temp_tab_name=substr($temp_tab_name,-24);

$temp_tab_name_2=$tabellen_name."_2"; 
$temp_tab_name_2=substr($temp_tab_name_2,-24);

$temp_tab_name_22=$tabellen_name."_22"; 
$temp_tab_name_22=substr($temp_tab_name_22,-24);


//zufallszahl erzeugen
if (!(preg_match("/^[a-z0-9]{32}/", $zufall_id))){
srand ((double)microtime()*1000000);
$mein_projekt = md5(uniqid(rand()));
}
$_SESSION['mein_projekt'] = $mein_projekt;



?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
        <META HTTP-EQUIV="CONTENT-TYPE" CONTENT="text/html; charset=WINDOWS-1252">
        <TITLE>Rezept ordnen</TITLE>
        <META NAME="GENERATOR" CONTENT="OpenOffice.org 3.2  (Win32)">
        <META NAME="AUTHOR" CONTENT="Uwe Sack">
        <META NAME="CREATED" CONTENT="2012, September">
        <META NAME="CHANGEDBY" CONTENT="Uwe Sack">
        <STYLE TYPE="text/css">
        <!--	a:hover	{color:;}
				a			{text-decoration:none;}
        //-->
        </STYLE>
</HEAD>
<BODY topmargin="0" leftmargin="0" bgcolor="#FFFFFF">

<form action="" method="POST">

<DIV align="center">
<TABLE WIDTH="1200" height="50" BORDER="0" BORDERCOLOR="" CELLPADDING="5" CELLSPACING="5" bgcolor="#FFFFFF">  

        <TR>
                <TD colspan="5" WIDTH="800" HEIGHT="20px" bgcolor="" align="center">
                
                  <h3c>Rezept-Zutaten nach den "5 Elementen" im Kreis ordnen<br></font></h2c>


<t1c><br><input type="text" value="<?php $standart=18; echo neuladen($standart,$_POST['anzahl_datenfelder']); ?>" name="anzahl_datenfelder" 
style="text-align: center; width: 35px; height: 35px; color:#000000; font-size: 16px; background-color: #00cc00; border-width: 1px; border-color: #c0c0c0; border-left-color: #c0c0c0; border-top-color: #c0c0c0; border-style: solid;
border-radius: 5px 5px 5px 5px;">
Anzahl der Zeilen (8, 18, 36 usw., max. 128) f&uuml;r die Zutaten&nbsp;&nbsp;</t1c><input type="submit" name="bestaetigung" value="Best&auml;tigen"
style="width: 150px; height: 35px; color:#000000; font-size: 16px; background-color: #00cc00; border-width: 1px; border-color: #c0c0c0; border-left-color: #c0c0c0; border-top-color: #c0c0c0; border-style: solid;
border-radius: 5px 5px 5px 5px;">

<?php if($_POST['anzahl_datenfelder']%2 != 0){echo "<font color=\"red\" size=\"3\"><b>
                                                    <br>Zeilenzahl ist (fast) frei w&auml;hlbar, mu&szlig; aber ohne Rest durch 2 teilbar sein.</font>";
                                                   exit;} ?>
                 </td>
              </tr>
              
              <TR> <TD align="center">
              
              
<TABLE WIDTH="1200" height="50" BORDER="0" BORDERCOLOR="" CELLPADDING="0" CELLSPACING="0" bgcolor="#FFFFFF">         
<tr><td colspan="7" bgcolor="">


<table width="1200" height="50" border="0"> 
<tr>

<td align="left"><t1l><font size="2">
Kreis mit allen<br>
Kr&auml;utern schliessen
</td>

<td align="left"><t1l><font size="2">
Kreis mit eher warmen<br>
Kr&auml;utern schliessen
</td>

<td align="left"><t1l><font size="2">
Kreis mit eher k&uuml;hlenden<br>
Kr&auml;utern schliessen
</td>

<td align="left"><t1l><font size="2">
Kreis mit allen<br>
Gew&uuml;rzen schliessen</font></t1l>
</td>

<td align="left"><t1l><font size="2">
Kreis mit eher warmen<br>
Gew&uuml;rzen schliessen
</td>

<td align="left"><t1l><font size="2">
Kreis mit eher k&uuml;hlenden<br>
Gew&uuml;rzen schliessen
</td>
</tr>


<?php 

if ( $_POST['erg_kraeuter'] == "alle_kraeuter" ) { $checked_1 = "checked"; }
if ( $_POST['erg_kraeuter'] == "warme_kraeuter" ) { $checked_2 = "checked"; }
if ( $_POST['erg_kraeuter'] == "kalte_kraeuter" ) { $checked_3 = "checked"; }
else { $checked_1 = "checked"; }

if ( $_POST['erg_gewuerze'] == "alle_gewuerze" ) { $checked_4 = "checked"; }
if ( $_POST['erg_gewuerze'] == "warme_gewuerze" ) { $checked_5 = "checked"; }
if ( $_POST['erg_gewuerze'] == "kalte_gewuerze" ) { $checked_6 = "checked"; }
else { $checked_4 = "checked"; }
 ?>


<tr>
<td align="left"> <font face="arial" size="2">
<input type="radio" name="erg_kraeuter" value="alle_kraeuter" style="height: 20px; width: 20px;" <?php echo $checked_1; ?>>
</td>

<td align="left"> <font face="arial" size="2">
<input type="radio" name="erg_kraeuter" value="warme_kraeuter" style="height: 20px; width: 20px;" <?php echo $checked_2; ?>>
</td>

<td align="left"> <font face="arial" size="2">
<input type="radio" name="erg_kraeuter" value="kalte_kraeuter" style="height: 20px; width: 20px;" <?php echo $checked_3; ?>>
</td>

<td align="left"> <font face="arial" size="2">
<input type="radio" name="erg_gewuerze" value="alle_gewuerze" style="height: 20px; width: 20px;" <?php echo $checked_4; ?>>
</td>

<td align="left"> <font face="arial" size="2">
<input type="radio" name="erg_gewuerze" value="warme_gewuerze" style="height: 20px; width: 20px;" <?php echo $checked_5; ?>>
</td>

<td align="left"> <font face="arial" size="2">
<input type="radio" name="erg_gewuerze" value="kalte_gewuerze" style="height: 20px; width: 20px;" <?php echo $checked_6; ?>>
</td>
</tr>

<tr><td colspan="6" align="center">

<?php  echo "<a target=\"popup\"onclick=\"window.open('','popup','width=625,height=485,scrollbars=yes,toolbar=no,status=no,resizable=yes,menubar=yes,location=no,directories=no,top=10,left=10')\"href=\"intern/hilfeseite_rez_2.php?name_gericht=$name_gericht_1&such_rezepte=$_POST[such_rezepte]\"><font color=\"#c0c0c0\" size=\"3\"><t1c><font color=\"red\">HILFE</a>"; ?>
</td>
</tr>

</table>

</td>
</tr>

</table>

<?php  
echo "<TABLE WIDTH=\"1200px\" height=\"50\" BORDER=\"0\" BORDERCOLOR=\"red\" CELLPADDING=\"5\" CELLSPACING=\"0\" bgcolor=\"#FFFFFF\"> 
";     

if ($_POST['anzahl_datenfelder'] >= 128) {$anzahl = 128;}
else{$anzahl=$_POST['anzahl_datenfelder'];}

echo datenfelder($anzahl);   

$missing_l = 1;
$xx=1000;
$x=1;
$ii = 100;
$kreis_nr=1;



if (($_POST['sortierung'] == TRUE) || ($_POST['erneut_sortieren_1'] == TRUE)) {


$loeschen_tabellen=mysql_query("drop table if exists $temp_tab_name");
$loeschen_tabellen_2=mysql_query("drop table if exists $temp_tab_name_2");



$tabelle_creieren=mysql_query("create TABLE IF NOT EXISTS $temp_tab_name
(
temp_id int(10) NOT NULL auto_increment primary key,
element varchar(64),
number int(2),
menge char(128),
product char(64),
tip char(128),
reihenfolge int(2),
missing int(2),
missing_1 int(2),
kreis_nr int (2)
)
");


////////////////////////////////////////////////////////////////////////////////////////////////////
// zum runterz&auml;hlen bereits verwendeter Elemente
$tabelle_2_creieren=mysql_query("create TABLE IF NOT EXISTS $temp_tab_name_2
(
temp_2_id int(10) NOT NULL auto_increment primary key,
element char(64),
element_1 char(64),
element_2 char(64),
element_3 char(64),
element_4 char(64),
element_5 char(64),
element_6 char(64)
)
");


        
for ($f = 1; $f <= 5; $f++) {

if ($f == 1) {$a="Holz";}
if ($f == 2) {$a="Feuer";}
if ($f == 3) {$a="Erde";}
if ($f == 4) {$a="Metall";}
if ($f == 5) {$a="Wasser";}



$tabelle_befuellen=mysql_query("insert into $temp_tab_name_2
(
element,
element_1,
element_2,
element_3,
element_4,
element_5,
element_6
)
values
(
'$a',
'$a',
'$a',
'$a',
'$a',
'$a',
'$a'
)
");
} // ende if_$f

$save_table_name=mysql_query("insert into table_name (tablename,tablename_2,zeitstempel)values('$temp_tab_name','$temp_tab_name_2','$aelter_24_std')");    


$x=1;
$ii = 100;          
for ($i = 1; $i <= 128; $i++) {


$element_feststellen = mysql_query("select element from five_elements_thermic where product like '$_POST[$i]' limit 1");
while ($result_1 = mysql_fetch_array($element_feststellen)){

if ($result_1['element'] == "Holz"){$nummer=1; $spalten_name="holz";}
if ($result_1['element'] == "Feuer"){$nummer=2; $spalten_name="feuer";}
if ($result_1['element'] == "Erde"){$nummer=3; $spalten_name="erde";}
if ($result_1['element'] == "Metall"){$nummer=4; $spalten_name="metall";}
if ($result_1['element'] == "Wasser"){$nummer=5; $spalten_name="wasser";}

// feststellen, welche elemente in diesem Abschnitt verwendet wurden
// $null="";

$element="element_".$x;
$elemente_runterzaehlen=mysql_query("update $temp_tab_name_2 set $element = '' where $element ='$result_1[element]'");


if($result_1['element'] == "@"){$ii = $ii + 100;


$rest_ermitteln=mysql_query("select $element from $temp_tab_name_2 where $element > '' ");
while($result_4=mysql_fetch_array($rest_ermitteln))
{

if ($result_4[$element] == "Holz"){$nummer=1; $spalten_name="holz";}
if ($result_4[$element] == "Feuer"){$nummer=2; $spalten_name="feuer";}
if ($result_4[$element] == "Erde"){$nummer=3; $spalten_name="erde";}
if ($result_4[$element] == "Metall"){$nummer=4; $spalten_name="metall";}
if ($result_4[$element] == "Wasser"){$nummer=5; $spalten_name="wasser";}


$nummer=($nummer + $ii)-100;
$missing_element=$result_4[$element];


$temp_speichern=mysql_query("insert into $temp_tab_name 
(
element,
number,
product,
missing,
missing_1,
kreis_nr
)
values
(
'$result_4[$element]',
'$nummer',
'$missing_element',
'$missing_l',
'$missing_l',
'$kreis_nr'
)
");
$missing_l++;
} // ende while table 2
$x++;
} // ende if @
 

if ($result_1['element'] == "Holz"){$nummer=1; $spalten_name="holz";}
if ($result_1['element'] == "Feuer"){$nummer=2; $spalten_name="feuer";}
if ($result_1['element'] == "Erde"){$nummer=3; $spalten_name="erde";}
if ($result_1['element'] == "Metall"){$nummer=4; $spalten_name="metall";}
if ($result_1['element'] == "Wasser"){$nummer=5; $spalten_name="wasser";}

$nummer_final=$ii+$nummer;

// dass die Leerzeile richtig einsortiert wird
if ($result_1['element'] == "@"){$nummer_final=$nummer_final - $nummer;}

$beginn="beginn".$i;
$_POST[$beginn];


$temp_speichern=mysql_query("insert into $temp_tab_name 
(
element,
number,
menge,
product,
tip,
reihenfolge,
kreis_nr

)
values
(
'$result_1[element]',
'$nummer_final',
'$_POST[$menge]',
'$_POST[$i]',
'$_POST[$tip]',
'$_POST[$beginn]',
'$kreis_nr'
)
");

if ($result_1['element'] == "@") {$kreis_nr = $kreis_nr + 1;}
} // ende while  
} // ende for


$zaehler_2=mysql_query("select count(element) as counter_2 from $temp_tab_name where element like '@' ");
while($result_counter = mysql_fetch_array($zaehler_2))
{ $counter_2 = $result_counter['counter_2'];}

include("umrechnung.php");

 
$fehlende_suche = mysql_query("select count(missing_1) as fehlende, missing_1 from $temp_tab_name where missing >= '1'");
while ($result_5 = mysql_fetch_array($fehlende_suche)){
$fehlende=$result_5['fehlende'];}

$xxx=1000;
if (($_POST['erneut_sortieren'] != TRUE) || ($_POST['erneut_sortieren_1'] == TRUE)){

echo "<TABLE WIDTH=\"1200\" height=\"50\" BORDER=\"0\" BORDERCOLOR=\"#000000\" CELLPADDING=\"5\" CELLSPACING=\"3\" bgcolor=\"#FFFFFF\">"; 
$feststellen = mysql_query("select * from $temp_tab_name order by number");
while ($result_2 = mysql_fetch_array($feststellen)){

if ($result_2['element'] == "Holz"){$bgcolor="#00cc00";$fontcolor="#FFFFFF";$nummer=1;}
if (($result_2['missing'] >= 1)&&($result_2['element'] == "Holz")){$bgcolor="#FFFFFF";$fontcolor="#00cc00";$nummer=1;/* $result_2['element']="" */;}
if ($result_2['element'] == "Feuer"){$bgcolor="#cc3333";$fontcolor="#FFFFFF";$nummer=2;}
if (($result_2['missing'] >= 1)&&($result_2['element'] == "Feuer")){$bgcolor="#FFFFFF";$fontcolor="#cc3333";$nummer=1;/* $result_2['element']="" */;}
if ($result_2['element'] == "Erde"){$bgcolor="#cc9966";$fontcolor="#000000";$nummer=3;}
if (($result_2['missing'] >= 1)&&($result_2['element'] == "Erde")){$bgcolor="#FFFFFF";$fontcolor="#cc9966";$nummer=1;/* $result_2['element']="" */;}
if ($result_2['element'] == "Metall"){$bgcolor="#cccccc";$fontcolor="#000000";$nummer=4;}
if (($result_2['missing'] >= 1)&&($result_2['element'] == "Metall")){$bgcolor="#FFFFFF";$fontcolor="#cccccc";$nummer=1;/* $result_2['element']="" */;}
if ($result_2['element'] == "Wasser"){$bgcolor="#336699";$fontcolor="#FFFFFF";$nummer=5;}
if (($result_2['missing'] >= 1)&&($result_2['element'] == "Wasser")){$bgcolor="#FFFFFF";$fontcolor="#336699";$nummer=1;/* $result_2['element']="" */;}
 
$name_k="ergaenzung_kraeuter_".$xx;

$name_kk="ergaenzungkraeuter_".$xx;

$menge="menge_".$xxx;

$tip="tip_".$xxx;

$produkt="produkt_".$xxx;


echo "
<tr>
<td width=\"10%\" height=\"10\" bgcolor=\"$bgcolor\"><font size=\"4\" color=\"$fontcolor\"><b>$result_2[element]</td>
<td width=\"10%\" height=\"10\" bgcolor=\"#FFFFFF\"><font size=\"4\" color=\"$fontcolor\"><b>
<input type=\"text\" name=\"$menge\" size=\"45\" tabindex=\"$rechts\" value=\"$_POST[$menge]\" style=\"color:#000000; font-size: 16px; background-color:rgb(255,230,230); height: 25px; width: 200px; border-width: 1px; border-color: #c0c0c0; border-left-color: #c0c0c0; border-top-color: #c0c0c0; border-style: solid;\"></td>";

if (($result_2['product'] != "@") && ($result_2['missing'] == "")){
echo "<td width=\"50%\" height=\"10\" bgcolor=\"#FFFFFF\"><font size=\"4\" color=\"$fontcolor\">
<input type=\"text\" name=\"$produkt\" size=\"70\" tabindex=\"$rechts\" value=\"$result_2[product]\" style=\"color:#000000; font-size: 16px; background-color:rgb(255,230,230); height: 25px; width: 400px; border-width: 1px; border-color: #c0c0c0; border-left-color: #c0c0c0; border-top-color: #c0c0c0; border-style: solid;\"></td>";}

if (($result_2['product'] != "@") && ($result_2['missing'] >= 1)){

echo "<td width=\"50%\" height=\"10\" bgcolor=\"#FFFFFF\" align=\"left\">";
ergaenzung($name_k,$result_2['product'],$_POST['erg_kraeuter'],$_POST['erg_gewuerze']);
echo "<input type=\"hidden\" name=\"$name_kk\" value=\"$_POST[$name_k]\">";

$xx++;
}  // ende if @
echo "</td><td>";
echo "<input type=\"text\" name=\"$tip\" size=\"45\" tabindex=\"$rechts\" value=\"$_POST[$tip]\" style=\"color:#000000; font-size: 16px; background-color:rgb(255,230,230); height: 25px; width: 400px; border-width: 1px; border-color: #c0c0c0; border-left-color: #c0c0c0; border-top-color: #c0c0c0; border-style: solid;\"></td>
</tr>";



mysql_query("update $temp_tab_name 
set 
menge = '$_POST[$menge]',
tip = '$_POST[$tip]'
where temp_id = '$result_2[temp_id]'");


mysql_query("update $temp_tab_name 
set 
menge = '$_POST[$menge]',
product = '$_POST[$name_k]',
tip = '$_POST[$tip]',
missing_1 = NULL 
where missing = '$result_2[missing]'
");

echo mysql_error();

if ($result_2['product'] == "@") {
echo "<tr><td colspan=\"5\" height=\"10\" bgcolor=\"#000000\" align=\"center\"><font size=\"4\" color=\"$fontcolor\"></td>
</td></tr>";
}  // ende if

$xxx++;

} // ende while

} // ende while druck   

} // ende if speicheraktion

 if (($_POST['sortierung'] == TRUE) || ($_POST['erneut_sortieren_1'] == TRUE)){
echo "
              <TR>
                <TD colspan=\"5\" bgcolor=\"#FFFFFF\" align=\"center\">
                <input type=\"submit\" name=\"erneut_sortieren_1\" value=\"&Auml;nderungen eintragen\" style=\"width: 200px; height: 35px; color:#000000; font-size: 16px; background-color: red; border-width: 1px; border-color: #c0c0c0; border-left-color: #c0c0c0; border-top-color: #c0c0c0; border-style: solid;
border-radius: 5px 5px 5px 5px;\"></td></tr>";}
               
                
 if ($_POST['erneut_sortieren_1'] == TRUE){
 
echo "       <TR>
                <TD colspan=\"5\" bgcolor=\"#FFFFFF\" align=\"center\" valign=\"top\">
                <font face=\"Arial\" size=\"4\">
                Rezept speichern:&nbsp;<input type=\"text\" name=\"rezept_name\" value=\"Name-Rezept\" style=\" width: 250px; height: 25px; color:#000000; font-size: 16px; background-color: rgb(255,230,230); border-width: 1px; border-color: #c0c0c0; border-left-color: #c0c0c0; border-top-color: #c0c0c0; border-style: solid; border-radius: 5px 5px 5px 5px;\">

&nbsp;&nbsp;Quelle:&nbsp;<input type=\"text\" name=\"quelle\" value=\"Name-Rezept\" style=\" width: 250px; height: 25px; color:#000000; font-size: 16px; background-color: rgb(255,230,230); border-width: 1px; border-color: #c0c0c0; border-left-color: #c0c0c0; border-top-color: #c0c0c0; border-style: solid; border-radius: 5px 5px 5px 5px;\">
&nbsp;&nbsp;
";
                echo rezept_kategorie();
                echo "<input type=\"submit\" name=\"erneut_sortieren\" value=\"Final sortieren und speichern\" style=\"width: 250px; height: 35px; color:#FFFFFF; font-size: 16px; background-color: #cc3333; border-width: 1px; border-color: #c0c0c0; border-left-color: #c0c0c0; border-top-color: #c0c0c0; border-style: solid; border-radius: 5px 5px 5px 5px;\"><br>";
                
                if ($_SESSION['einlass'] == "") { echo "
                <font face=\"Arial\" size=\"4\" color=\"red\"> Speichern funktioniert nur, wenn Sie eingeloggt sind !
                </td></tr>";
                 }
                 } 
                
                
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////                



if ( $_POST['erneut_sortieren'] == TRUE ) {
$zutaten_nr=1;
$mein_projekt;

echo "<TABLE WIDTH=\"1200\" height=\"50\" BORDER=\"0\" BORDERCOLOR=\"#000000\" CELLPADDING=\"5\" CELLSPACING=\"3\" bgcolor=\"#FFFFFF\">"; 
$feststellen = mysql_query("select * from $temp_tab_name order by number");
while ( $result_2 = mysql_fetch_array($feststellen) ) {

if ($result_2['element'] == "Holz")   {$bgcolor="#00cc00";$fontcolor="#FFFFFF";$nummer=1;}
if ($result_2['element'] == "Feuer")  {$bgcolor="#cc3333";$fontcolor="#FFFFFF";$nummer=2;}
if ($result_2['element'] == "Erde")   {$bgcolor="#cc9966";$fontcolor="#000000";$nummer=3;}
if ($result_2['element'] == "Metall") {$bgcolor="#cccccc";$fontcolor="#000000";$nummer=4;}
if ($result_2['element'] == "Wasser") {$bgcolor="#336699";$fontcolor="#FFFFFF";$nummer=5;}

if (($_POST['rezept_name'] != "") && ($_SESSION['einlass'] == "du_darfst_rein") && ($_POST['rezept_kategorie'] != "Kategorie"))
{ // start if rezept_name

$speicher_nr=$result_2[number]*10;
$rezept_speichern=mysql_query("insert into rezepte
(
zutaten_nr,
code,
element,
product,
number,
kreis_nr,
menge,
bearbeiten,
zubereitung

) 
values 
(
'$zutaten_nr',
'$mein_projekt',
'$result_2[element]',
'$result_2[product]',
'$result_2[number]',
'$result_2[kreis_nr]',
'$result_2[menge]',
'$result_2[tip]',
'$result_2[tip]'

)
");

echo mysql_error();
} // ende if rezept_name

$zutaten_nr++;
$zutaten_nr=$zutaten_nr + 1;


if ($result_2['product'] != "@") {
echo "<tr><td height=\"10\" width=\"15%\" bgcolor=\"$bgcolor\"><font size=\"3\" color=\"$fontcolor\"><b>$result_2[element]</td>
<td height=\"10\" width=\"20%\" bgcolor=\"#cccccc\"><font size=\"4\" color=\"#000000\"><b>$result_2[menge]</td>
<td height=\"10\" width=\"30%\" bgcolor=\"#cccccc\"><font size=\"4\" color=\"#000000\"><b>$result_2[product]</td>
<td height=\"10\" width=\"50%\" bgcolor=\"#cccccc\"><font size=\"4\" color=\"#000000\"><b>$result_2[tip]</td></tr>";
}

if ($result_2['product'] == "@") {
echo "<tr><td colspan=\"4\" height=\"10\" bgcolor=\"#000000\" align=\"center\"><font size=\"4\" color=\"$fontcolor\">
</td></tr>";
}
} // ende while

if (($_POST['rezept_name'] != "") && ($_SESSION['einlass'] == "du_darfst_rein") && ($_POST['rezept_kategorie'] != "Kategorie")) {

$quelle=htmlentities($_POST['quelle']);
$rezept_name=htmlentities($_POST['rezept_name']);

$center_speichern=mysql_query("insert into center (
verfasser, 
quelle,
kategorie,
name,
code,
zeitstempel
) 
values 
(
'$_SESSION[nickname]', 
'$quelle',
'$_POST[rezept_kategorie]',
'$rezept_name',
'$mein_projekt',
'$datum'
)
");
}

echo "<tr><td></td></tr><font size=\"3\" face=\"Arial\" color=\"red\">";
echo fehler_rezept_speichern($_POST['rezept_name'],$_POST['rezept_kategorie'],$_SESSION['einlass']);
} // ende if  
        
?>

</td></tr>
</table> 

</DIV>
<P STYLE="margin-bottom: 0cm"><BR>
</P>
</form>
</BODY>
</HTML>