<?php 
session_start();
include("../intern/myconnect.php");
include("../intern/funktionen.php");

// W. Kaiser
$mysql_version=trim(mysql_get_server_info());
if (substr($mysql_version,0,1)>'4')
   {
   //Disable "STRICT" mode for MySQL 5!
   mysql_query("SET SESSION sql_mode=''");
   // W. Kaiser
   }
$temp_tab_name = strtr($_SERVER['REMOTE_ADDR'], ".", "_");
$temp_tab_name_2=$temp_tab_name."_2";   
   

  


/* $temp_tab_name="tabelle_1";
$temp_tab_name_2="Tabelle_2";  */


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



<TABLE WIDTH="805" height="50" BORDER="0" BORDERCOLOR="#000000" CELLPADDING="3" CELLSPACING="0" bgcolor="#FFFFFF">
        <TR>
                <TD colspan="5" WIDTH="800" HEIGHT="20px" bgcolor="#FFFFFF" align="left">
                <br>
                  <font family="Times" size="5"><b>Zutaten in die Textfelder eintragen.<br>
<?php $standart=18; ?>
<input type="text" size="5" name="anzahl_datenfelder" value="<?php echo neuladen($standart,$_POST['anzahl_datenfelder']); ?>">&nbsp;
<font family="Times" size="3"></b>Anzahl der Zeilen f&uuml;r die Zutaten (Standart 18, max. 128).&nbsp;&nbsp;<input type="submit" name="bestaetigung" value="Best&auml;tigen">
                 </td>
              </tr>
        

<?php       
if ($_POST['anzahl_datenfelder'] >= 128) {$anzahl = 128;}
else{$anzahl=$_POST['anzahl_datenfelder'];}

echo datenfelder($anzahl);   

$missing_l = 1;
$xx=1000;
$x=1;
$ii = 100;
$kreis_nr=1;



if (($_POST['sortierung'] == TRUE) || ($_POST['erneut_sortieren'] == TRUE)) {

if ($_POST['sortierung'] == TRUE){ // sortierung 1

$loeschen_tabellen=mysql_query("drop table $temp_tab_name");
$loeschen_tabellen_2=mysql_query("drop table $temp_tab_name_2");

$tabelle_creieren=mysql_query("create TABLE IF NOT EXISTS $temp_tab_name
(
temp_id int(10) NOT NULL auto_increment primary key,
element varchar(64),
number int(2),
product char(64),
reihenfolge int(2),
missing int(2),
missing_1 int(2),
kreis_nr int (2)
)
");


// $temp_tab_name_2=md5($temp_tab_name);

////////////////////////////////////////////////////////////////////////////////////////////////////
// zum ruterz&auml;hlen bereits verwendeter Elemente
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

$save_table_name=mysql_query("insert into table_name (tablename,tablename_2)values('$temp_tab_name','$temp_tab_name_2')");    

$zaehler=mysql_query("select count(element) as counter from five_elements_thermic where element like '@'");
while($result_counter = mysql_fetch_array($zaehler))
{$counter = $result_counter['counter'];}

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
$elemente_runterzaehlen=mysql_query("update $temp_tab_name_2 set $element ='' where $element ='$result_1[element]'");


if($result_1['element'] == "@"){$ii = $ii + 100;


$rest_ermitteln=mysql_query("select $element from $temp_tab_name_2 where $element > ''");
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
product,
reihenfolge,
kreis_nr

)
values
(
'$result_1[element]',
'$nummer_final',
'$_POST[$i]',
'$_POST[$beginn]',
'$kreis_nr'
)
");

if ($_POST[$beginn] == 1) {$kreis_nr = $kreis_nr + 1;}
} // ende while  
} // ende for



$zaehler_2=mysql_query("select count(element) as counter_2 from $temp_tab_name where element like '@'");
while($result_counter = mysql_fetch_array($zaehler_2))
{$counter_2 = $result_counter['counter_2'];}


$hundert=100;


for ($iii=1; $iii <= $counter_2; $iii++)
    { // start for
   
    $select_anfang=mysql_query("select number from $temp_tab_name where reihenfolge = '1'");
    while ($result_anfang=mysql_fetch_array($select_anfang)){
    
       

if ($result_anfang['number'] == ($hundert + 2)) {
    
    $update_ziel=$hundert+1000;
    $where_ziel=$hundert+1;
    mysql_query("update $temp_tab_name set
    number = '$update_ziel'
    where number = '$where_ziel'");
    
    $update_ziel=$hundert+1;
    $where_ziel=$hundert+2;
    mysql_query("update $temp_tab_name set
    number = '$update_ziel'
    where number = '$where_ziel'");
    
    $update_ziel=$hundert+2;
    $where_ziel=$hundert+3;
    mysql_query("update $temp_tab_name set
    number = '$update_ziel'
    where number = '$where_ziel'");
    
    $update_ziel=$hundert+3;
    $where_ziel=$hundert+4;
    mysql_query("update $temp_tab_name set
    number = '$update_ziel'
    where number = '$where_ziel'");
    
    $update_ziel=$hundert+4;
    $where_ziel=$hundert+5;
    mysql_query("update $temp_tab_name set
    number = '$update_ziel'
    where number = '$where_ziel'");
    
    $update_ziel=$hundert+5;
    $where_ziel=$hundert+1000;
    mysql_query("update $temp_tab_name set
    number = '$update_ziel'
    where number = '$where_ziel'"); 
    } // ende if
    
if ($result_anfang['number'] == ($hundert + 3)) {
    
    $update_ziel=$hundert+1000;
    $where_ziel=$hundert+1;
    mysql_query("update $temp_tab_name set
    number = '$update_ziel'
    where number = '$where_ziel'");
    
    $update_ziel=$hundert+2000;
    $where_ziel=$hundert+2;
    mysql_query("update $temp_tab_name set
    number = '$update_ziel'
    where number = '$where_ziel'");
    
    $update_ziel=$hundert+1;
    $where_ziel=$hundert+3;
    mysql_query("update $temp_tab_name set
    number = '$update_ziel'
    where number = '$where_ziel'");
    
    $update_ziel=$hundert+2;
    $where_ziel=$hundert+4;
    mysql_query("update $temp_tab_name set
    number = '$update_ziel'
    where number = '$where_ziel'");
    
    $update_ziel=$hundert+3;
    $where_ziel=$hundert+5;
    mysql_query("update $temp_tab_name set
    number = '$update_ziel'
    where number = '$where_ziel'");
    
    $update_ziel=$hundert+4;
    $where_ziel=$hundert+1000;
    mysql_query("update $temp_tab_name set
    number = '$update_ziel'
    where number = '$where_ziel'"); 
    
    $update_ziel=$hundert+5;
    $where_ziel=$hundert+2000;
    mysql_query("update $temp_tab_name set
    number = '$update_ziel'
    where number = '$where_ziel'");
    } // ende if
    
    
if ($result_anfang['number'] == ($hundert + 4)) {
    
    $update_ziel=$hundert+1000;
    $where_ziel=$hundert+1;
    mysql_query("update $temp_tab_name set
    number = '$update_ziel'
    where number = '$where_ziel'");
    
    $update_ziel=$hundert+2000;
    $where_ziel=$hundert+2;
    mysql_query("update $temp_tab_name set
    number = '$update_ziel'
    where number = '$where_ziel'");
    
    $update_ziel=$hundert+3000;
    $where_ziel=$hundert+3;
    mysql_query("update $temp_tab_name set
    number = '$update_ziel'
    where number = '$where_ziel'");
    
    $update_ziel=$hundert+1;
    $where_ziel=$hundert+4;
    mysql_query("update $temp_tab_name set
    number = '$update_ziel'
    where number = '$where_ziel'");
    
    $update_ziel=$hundert+2;
    $where_ziel=$hundert+5;
    mysql_query("update $temp_tab_name set
    number = '$update_ziel'
    where number = '$where_ziel'");
    
    $update_ziel=$hundert+3;
    $where_ziel=$hundert+1000;
    mysql_query("update $temp_tab_name set
    number = '$update_ziel'
    where number = '$where_ziel'"); 
    
    $update_ziel=$hundert+4;
    $where_ziel=$hundert+2000;
    mysql_query("update $temp_tab_name set
    number = '$update_ziel'
    where number = '$where_ziel'");
    
    $update_ziel=$hundert+5;
    $where_ziel=$hundert+3000;
    mysql_query("update $temp_tab_name set
    number = '$update_ziel'
    where number = '$where_ziel'");
    } // ende if   
    
if ($result_anfang['number'] == ($hundert + 5)) {
    
    $update_ziel=$hundert+1000;
    $where_ziel=$hundert+1;
    mysql_query("update $temp_tab_name set
    number = '$update_ziel'
    where number = '$where_ziel'");
    
    $update_ziel=$hundert+2000;
    $where_ziel=$hundert+2;
    mysql_query("update $temp_tab_name set
    number = '$update_ziel'
    where number = '$where_ziel'");
    
    $update_ziel=$hundert+3000;
    $where_ziel=$hundert+3;
    mysql_query("update $temp_tab_name set
    number = '$update_ziel'
    where number = '$where_ziel'");
    
    $update_ziel=$hundert+4000;
    $where_ziel=$hundert+4;
    mysql_query("update $temp_tab_name set
    number = '$update_ziel'
    where number = '$where_ziel'");
    
    $update_ziel=$hundert+1;
    $where_ziel=$hundert+5;
    mysql_query("update $temp_tab_name set
    number = '$update_ziel'
    where number = '$where_ziel'");
    
    $update_ziel=$hundert+2;
    $where_ziel=$hundert+1000;
    mysql_query("update $temp_tab_name set
    number = '$update_ziel'
    where number = '$where_ziel'"); 
    
    $update_ziel=$hundert+3;
    $where_ziel=$hundert+2000;
    mysql_query("update $temp_tab_name set
    number = '$update_ziel'
    where number = '$where_ziel'");
    
    $update_ziel=$hundert+4;
    $where_ziel=$hundert+3000;
    mysql_query("update $temp_tab_name set
    number = '$update_ziel'
    where number = '$where_ziel'");
    
    $update_ziel=$hundert+5;
    $where_ziel=$hundert+4000;
    mysql_query("update $temp_tab_name set
    number = '$update_ziel'
    where number = '$where_ziel'");
    } // ende if  
 
    } // ende while
    
$hundert=$hundert + 100;
 
    } // ende for








} // ende sortierung 1


 
$fehlende_suche = mysql_query("select count(missing) as fehlende from $temp_tab_name where missing >= '1'");
while ($result_5 = mysql_fetch_array($fehlende_suche)){
$fehlende=$result_5['fehlende'];}


if ($_POST['erneut_sortieren'] != TRUE){


echo "<TABLE WIDTH=\"805\" height=\"50\" BORDER=\"0\" BORDERCOLOR=\"#000000\" CELLPADDING=\"3\" CELLSPACING=\"3\" bgcolor=\"#FFFFFF\">"; 
$feststellen = mysql_query("select * from $temp_tab_name order by number");
while ($result_2 = mysql_fetch_array($feststellen)){

if ($result_2['element'] == "Holz"){$bgcolor="#00cc00";$fontcolor="#FFFFFF";$nummer=1;}
if (($result_2['missing'] >= 1)&&($result_2['element'] == "Holz")){$bgcolor="#FFFFFF";$fontcolor="#00cc00";$nummer=1;$result_2['element']="";}
if ($result_2['element'] == "Feuer"){$bgcolor="#cc3333";$fontcolor="#FFFFFF";$nummer=2;}
if (($result_2['missing'] >= 1)&&($result_2['element'] == "Feuer")){$bgcolor="#FFFFFF";$fontcolor="#cc3333";$nummer=1;$result_2['element']="";}
if ($result_2['element'] == "Erde"){$bgcolor="#cc9966";$fontcolor="#000000";$nummer=3;}
if (($result_2['missing'] >= 1)&&($result_2['element'] == "Erde")){$bgcolor="#FFFFFF";$fontcolor="#cc9966";$nummer=1;$result_2['element']="";}
if ($result_2['element'] == "Metall"){$bgcolor="#cccccc";$fontcolor="#000000";$nummer=4;}
if (($result_2['missing'] >= 1)&&($result_2['element'] == "Metall")){$bgcolor="#FFFFFF";$fontcolor="#cccccc";$nummer=1;$result_2['element']="";}
if ($result_2['element'] == "Wasser"){$bgcolor="#336699";$fontcolor="#FFFFFF";$nummer=5;}
if (($result_2['missing'] >= 1)&&($result_2['element'] == "Wasser")){$bgcolor="#FFFFFF";$fontcolor="#336699";$nummer=1;$result_2['element']="";}
 

if (($result_2['product'] != "@") && ($result_2['missing'] == "")){
echo "<tr><td width=\"60\" height=\"10\" bgcolor=\"$bgcolor\"><font size=\"4\" color=\"$fontcolor\"><b>$result_2[product]</td>
<td width=\"60\" height=\"10\" bgcolor=\"$bgcolor\"><font size=\"4\" color=\"$fontcolor\"><b>$result_2[element]</td></tr>";
} // ende if @



$name_k="ergaenzung_kraeuter_".$xx;
$name_g="ergaenzung_gewuerze_".$xx;


if (($result_2['product'] != "@") && ($result_2['missing'] >= 1)){

echo "<tr><td height=\"10\" bgcolor=\"$bgcolor\">";
echo ergaenzung_kraeuter($name_k,$result_2['product']);
echo "&nbsp;&nbsp;&nbsp;&nbsp;";
echo ergaenzung_gewuerze($name_g,$result_2['product']);
echo "<td height=\"10\" bgcolor=\"$bgcolor\"><font size=\"4\" color=\"$fontcolor\"><b>$result_2[product]</td></tr>";
$xx++;
} // ende if @
if ($result_2['product'] == "@") {
echo "<tr><td colspan=\"2\" height=\"10\" bgcolor=\"#000000\" align=\"center\"><font size=\"4\" color=\"$fontcolor\"></td>
</td></tr>";
}  // ende else @
} // ende if erneut == false

} // ende while druck            
} // ende if speicheraktion

if ($_POST['sortierung'] == TRUE) {

echo "
                <TR>
                <TD colspan=\"2\" bgcolor=\"#FFFFFF\" align=\"center\">
                <font face=\"Arial\" size=\"4\">
                als Rezept speichern unter:&nbsp;<input type=\"text\" name=\"rezept_name\" size=\"34\" value=\"\">";
                echo rezept_kategorie();
                echo "<input type=\"submit\" name=\"erneut_sortieren\" value=\"Erneut sortieren / speichern\"><br>";
                
                if ($_SESSION['einlass'] == "") { echo "
                <font face=\"Arial\" size=\"4\" color=\"red\"> Speichern funktioniert nur, wenn Sie eingeloggt sind !
                 </td></tr>";
                 }
                 } 
                
                
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////                


if ($_POST['erneut_sortieren'] == TRUE){

//zufallszahl erzeugen
if (!(preg_match("/^[a-z0-9]{32}/", $code))){
srand ((double)microtime()*1000000);
$code = md5(uniqid(rand()));}

$center_speichern=mysql_query("insert into center (verfasser,kategorie,name,code,zeitstempel) values ('$_SESSION[nickname]','$_POST[rezept_kategorie]','$_POST[rezept_name]','$code','$datum')");

$gg=1000;
$name_k="ergaenzung_kraeuter_".$gg;
$name_g="ergaenzung_gewuerze_".$gg;
$jj=1;

for($ff=1;$ff <= $fehlende; $ff++)
{
if ($_POST[$name_k] != "Mit Kraeutern ergaenzen"){
$update_2=mysql_query("update $temp_tab_name 
set product = '$_POST[$name_k]',
missing = '' 
where missing = '$jj'");
}

if ($_POST[$name_g] != "Mit Gewuerzen ergaenzen"){
$update_2=mysql_query("update $temp_tab_name 
set product = '$_POST[$name_g]',
missing_1 = '' 
where missing_1 = '$jj'");
}

$jj++;
$gg++;
$name_k="ergaenzung_kraeuter_".$gg;
$name_g="ergaenzung_gewuerze_".$gg;

} // ende for


echo "<TABLE WIDTH=\"805\" height=\"50\" BORDER=\"0\" BORDERCOLOR=\"#000000\" CELLPADDING=\"3\" CELLSPACING=\"3\" bgcolor=\"#FFFFFF\">"; 
$feststellen = mysql_query("select * from $temp_tab_name order by number");
while ($result_2 = mysql_fetch_array($feststellen)){

if ($result_2['element'] == "Holz"){$bgcolor="#00cc00";$fontcolor="#FFFFFF";$nummer=1;}
if ($result_2['element'] == "Feuer"){$bgcolor="#cc3333";$fontcolor="#FFFFFF";$nummer=2;}
if ($result_2['element'] == "Erde"){$bgcolor="#cc9966";$fontcolor="#000000";$nummer=3;}
if ($result_2['element'] == "Metall"){$bgcolor="#cccccc";$fontcolor="#000000";$nummer=4;}
if ($result_2['element'] == "Wasser"){$bgcolor="#336699";$fontcolor="#FFFFFF";$nummer=5;}

if (($_POST[rezept_name] != "") && ($_SESSION['einlass'] == "du_darfst_rein")){
$rezept_speichern=mysql_query("insert into rezepte (code,element,product,number,anfang,kreis_nr) values ('$code','$result_2[element]','$result_2[product]','$result_2[number]','','$result_2[kreis_nr]')");
}


if ($result_2['product'] != "@") {
echo "<tr><td height=\"10\" width=\"15%\" bgcolor=\"$bgcolor\"><font size=\"4\" color=\"$fontcolor\"><b>$result_2[element]</td>
<td height=\"10\" width=\"85%\" bgcolor=\"#cccccc\"><font size=\"4\" color=\"#000000\"><b>$result_2[product]</td></tr>";

}
if ($result_2['product'] == "@") {
echo "<tr><td colspan=\"2\" height=\"10\" bgcolor=\"#000000\" align=\"center\"><font size=\"4\" color=\"$fontcolor\"></td>
</td></tr>";
}
} // ende while


} // ende if               
?>
 
</table> 

</DIV>
<P STYLE="margin-bottom: 0cm"><BR>
</P>
</form>
</BODY>
</HTML>