
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
        <META HTTP-EQUIV="CONTENT-TYPE" CONTENT="text/html; charset=windows-1252">
        <TITLE>hompage</TITLE>
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
<BODY topmargin="14" leftmargin="0" bgcolor="#FFFFFF">



<form action="" method="POST">

<DIV align="center">

<TABLE WIDTH="1200px" height="200px" BORDER="0" BORDERCOLOR="0" CELLPADDING="5" CELLSPACING="0" bgcolor="">
        <TR>
            <TD colspan="3" WIDTH="805" HEIGHT="20px" align="center" bgcolor="#FFFFFF">
                <br>
                <h2c>Welchem der 5 Elemente aus der <h1c>TCM</h1c> wird das Lebensmittel</h2c>
                
                </td></tr>
                
                <tr><td align="center" bgcolor="#FFFFFF">

                <input type="text" name="frage" value="<?php echo $_POST['frage']; ?>" 
                style="color:#000000; background-color:#CCCCCC; border-width:2; border-color:#FFFFFF; border-style:yes; height: 50px; width: 400px; font-size:24px;"> 
                <b><br><br>
                <h2c>mit welchen Eigenschaften zugeordnet ?<br><br></h2c
                <br>
                
<input type="submit" name="frage_starten" value="Antwort" style=" width:250px; height:50px; background-color:#00cc00; border-width:0; font-size: 24px; color:#FFFFFF; border-radius: 3px 3px 3px 3px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<font face="Arial" size="3">                 
                  <a href="intern/hilfeseite_was.php" target="hilfe"><b><input type="button" name="$korr_veri" value="Hilfe" style=" margin-top: 3px; width:250px; height:50px; background-color:#cc3333; border-width:0; font-size: 24px; color:#FFFFFF; border-radius: 3px 3px 3px 3px;"></b></a><br><br>

<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// //-->




<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// //-->

 </td>
         </tr>
         <tr><td bgcolor="">&nbsp;<br></td></tr>
         </table>


<?php

$frage=htmlentities($_POST[frage]);


if ($_POST['frage_starten'] == TRUE){
$t1=1;
$suche=mysql_query("select * from five_elements_thermic where product like '%$frage%'");
while ($selec = mysql_fetch_array($suche)) {

$element_db=$selec['element'];

if ($selec['element'] == "Holz"){$bgcolor="#00cc00";$fontcolor="#FFFFFF";}
if ($selec['element'] == "Feuer"){$bgcolor="#cc3333";$fontcolor="#FFFFFF";}
if ($selec['element'] == "Erde"){$bgcolor="#cc9966";$fontcolor="#000000";}
if ($selec['element'] == "Metall"){$bgcolor="#cccccc";$fontcolor="#000000";}
if ($selec['element'] == "Wasser"){$bgcolor="#336699";$fontcolor="#FFFFFF";}

if($t1 == 1){
echo "
<TABLE WIDTH=\"1200px\" height=\"0\" BORDER=\"0\" BORDERCOLOR=\"\" CELLPADDING=\"20\" CELLSPACING=\"0\" bgcolor=\"\">
<tr><td width=\"200px\" height=\"0\" bgcolor=\"#FFFFFF\">&nbsp;</td><td width=\"800px\" bgcolor=\"\">
<TABLE WIDTH=\"800px\" height=\"0\" BORDER=\"0\" BORDERCOLOR=\"0\" CELLPADDING=\"5px\" CELLSPACING=\"0\" bgcolor=\"#FFFFFF\"  style=\"opacity:0.85\";>";}

$t1++;

echo "<tr><td width=\"50%\" height=\"10px\" bgcolor=\"$bgcolor\"><font size=\"4\" color=\"$fontcolor\"><b>Lebensmittel</td>
          <td width=\"50%\" height=\"10px\" bgcolor=\"$bgcolor\"><font size=\"4\" color=\"$fontcolor\"><b>".$selec['product']."</td></tr>";
echo "<tr><td width=\"50%\" height=\"10px\" bgcolor=\"$bgcolor\"><font size=\"4\" color=\"$fontcolor\"><b>Element</td>
          <td width=\"50%\" height=\"10px\" bgcolor=\"$bgcolor\"><font size=\"4\" color=\"$fontcolor\"><b>".$selec['element']."</td></tr>";
          
if ($selec['hot'] != "") {
echo "<tr><td width=\"50%\" bgcolor=\"$bgcolor\"><font size=\"4\" color=\"$fontcolor\"><b>Temperatur</td>
          <td width=\"50%\" bgcolor=\"$bgcolor\"><font size=\"4\" color=\"$fontcolor\"><b>".$selec['hot']."</td></tr>";} 
          
if ($selec['warm'] != "") {
echo "<tr><td width=\"50%\" bgcolor=\"$bgcolor\"><font size=\"4\" color=\"$fontcolor\"><b>Temperatur</td>
          <td width=\"50%\" bgcolor=\"$bgcolor\"><font size=\"4\" color=\"$fontcolor\"><b>".$selec['warm']."</td></tr>";}
          
if ($selec['neutral'] != "") {
echo "<tr><td width=\"50%\" bgcolor=\"$bgcolor\"><font size=\"4\" color=\"$fontcolor\"><b>Temperatur</td>
          <td width=\"50%\" bgcolor=\"$bgcolor\"><font size=\"4\" color=\"$fontcolor\"><b>".$selec['neutral']."</td></tr>";}  
          
if ($selec['refreshing'] != "") {
echo "<tr><td width=\"50%\" bgcolor=\"$bgcolor\"><font size=\"4\" color=\"$fontcolor\"><b>Temperatur</td>
          <td width=\"50%\" bgcolor=\"$bgcolor\"><font size=\"4\" color=\"$fontcolor\"><b>".$selec['refreshing']."</td></tr>";}
          
if ($selec['cold'] != "") {
echo "<tr><td width=\"50%\" bgcolor=\"$bgcolor\"><font size=\"4\" color=\"$fontcolor\"><b>Temperatur</td>
          <td width=\"50%\" bgcolor=\"$bgcolor\"><font size=\"4\" color=\"$fontcolor\"><b>".$selec['cold']."</td></tr>";}  
          
$suche_2=mysql_query("select geschmack, wirkung, organe, sinnes_organe, dynamic, wahrnehmung from five_elements_properties where element_prop = '$selec[element]'");
while ($selec_2 = mysql_fetch_array($suche_2)) { 

echo "<tr><td width=\"50%\" bgcolor=\"$bgcolor\"><font size=\"4\" color=\"$fontcolor\"><b>Geschmack</td>
          <td width=\"50%\" bgcolor=\"$bgcolor\"><font size=\"4\" color=\"$fontcolor\"><b>".$selec_2['geschmack']."</td></tr>"; 
          
echo "<tr><td width=\"50%\" bgcolor=\"$bgcolor\"><font size=\"4\" color=\"$fontcolor\"><b>Wirkung</td>
          <td width=\"50%\" bgcolor=\"$bgcolor\"><font size=\"4\" color=\"$fontcolor\"><b>".$selec_2['wirkung']."</td></tr>";  
          
echo "<tr><td width=\"50%\" bgcolor=\"$bgcolor\"><font size=\"4\" color=\"$fontcolor\"><b>Organ</td>
          <td width=\"50%\" bgcolor=\"$bgcolor\"><font size=\"4\" color=\"$fontcolor\"><b>".$selec_2['organe']."</td></tr>";
          
echo "<tr><td width=\"50%\" bgcolor=\"$bgcolor\"><font size=\"4\" color=\"$fontcolor\"><b>Sinnes-Organ</td>
          <td width=\"50%\" bgcolor=\"$bgcolor\"><font size=\"4\" color=\"$fontcolor\"><b>".$selec_2['sinnes_organe']."</td></tr>"; 
          
echo "<tr><td width=\"50%\" bgcolor=\"$bgcolor\"><font size=\"4\" color=\"$fontcolor\"><b>Wahrnehmung</td>
          <td width=\"50%\" bgcolor=\"$bgcolor\"><font size=\"4\" color=\"$fontcolor\"><b>".$selec_2['wahrnehmung']."</td></tr>"; 
          
echo "<tr><td width=\"50%\" bgcolor=\"$bgcolor\"><font size=\"4\" color=\"$fontcolor\"><b>Dynamic</td>
          <td width=\"50%\" bgcolor=\"$bgcolor\"><font size=\"4\" color=\"$fontcolor\"><b>".$selec_2['dynamic']."</td></tr>";  
          }                                               
echo "<tr><td colspan=\"2\" bgcolor=\"#000000\">&nbsp;</td></tr>";
        
} // Ende while
} // Ende IF

if(($element_db == "") && ($_POST['frage_starten'] == TRUE)){

$frage_wiederholt=mysql_query("select begriff from unbekannt where begriff like '$frage'");
while($result=mysql_fetch_array($frage_wiederholt)){
$schon_vorhanden=$result['begriff'];}

if($schon_vorhanden != "") {
echo 
"<tr><td colspan=\"2\" bgcolor=\"#000000\"><font color=\"#FFFFFF\" size=\"3\"><b>Diese Frage wurde schon gestellt und noch nicht beantwortet !
</td></tr>";
}


echo 
"<tr><td colspan=\"2\" bgcolor=\"#FFFFFF\" align=\"center\"><h2c>Haben Sie den Begriff in gel&auml;ufiger Schreibweise abgefragt<br>
(keine Abk&uuml;rzung !)?</h2c><br><br> 
<input type=\"submit\" name=\"weiter\" value=\"Ja, in -Unbeantwortete- speichern\" style=\" margin-top: 3px; width:350px; height:40px; background-color:#cc3333; border-width:0; font-size: 20px; color:#FFFFFF; border-radius: 3px 3px 3px 3px;\">
</td></tr>";
if ($_POST['weiter'] == FALSE) {
$_SESSION['frage']=$_POST['frage'];

}
} // ende if vormerken

$frage=htmlentities($_POST[frage]);

if ($_POST['weiter'] == TRUE) {
$vormerken=mysql_query("insert into unbekannt
(begriff)
values
('$frage')
");
}

?>
</table>

</td>
<td width="200px" height="0" bgcolor="#FFFFFF">&nbsp;</td>
</tr>
</table>


</DIV>
<P STYLE="margin-bottom: 0cm"><BR>
</P>
</form>
</BODY>
</HTML>