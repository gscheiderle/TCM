<?php 
session_start();
include("intern/myconnect.php");


// W. Kaiser
$mysql_version=trim(mysql_get_server_info());
if (substr($mysql_version,0,1)>'4')
   {
   //Disable "STRICT" mode for MySQL 5!
   mysql_query("SET SESSION sql_mode=''");
   // W. Kaiser
   }

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
        <META HTTP-EQUIV="CONTENT-TYPE" CONTENT="text/html; charset=windows-1252">
        <TITLE>Wer wei&szlig; was ?</TITLE>
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
<?php $wechselseite="wer_weiss_was.php"; 
echo "<form action='wer_weiss_was.php' method='POST'>";
?>

<DIV align="center">

<?php // Seite l&ouml;schen, wenn user abgemeldet
if ($_SESSION['einlass'] == TRUE){ ?>

<TABLE WIDTH="1200" height="50" BORDER="0" BORDERCOLOR="1" CELLPADDING="10" CELLSPACING="5" bgcolor="#FFFFFF">
        <TR>
            <TD colspan="2" WIDTH="1200" HEIGHT="20px" bgcolor="" align="center">
                
                <h3c>
                Diese Lebensmittel wurden abgefragt und sind nicht erfasst.<br>
                Hier k&ouml;nnen Sie die Datenbank erg&auml;nzen !</h3c>
             </td>
         </tr>
 <tr><td align="center">

<TABLE WIDTH="600px" height="50" BORDER="0" BORDERCOLOR="1" CELLPADDING="10" CELLSPACING="5" bgcolor="#FFFFFF"">        
        <tr>
            <td colspan="2" bgcolor="#d9d9d9">  
            <select name="unbekannte" style=" width:200px; height:40px; background-color:#FFFFFF; border-width:0; font-size: 18px; color:#000000; border-radius: 3px 3px 3px 3px;">
            <option value="null" selected>Bitte ausw&auml;hlen&nbsp;&nbsp;&nbsp;</option>
           <?php
            $unbekannt=mysql_query("select * from unbekannt order by un_id desc");
            while ($selec = mysql_fetch_array($unbekannt)) {
            echo "<option value=\"$selec[begriff]\">$selec[begriff]</option>";
            }
          ?>
            </select>&nbsp;&nbsp;<font family="Times" size="4"><b><h3c>... und beantworten !<br></h3c>
         </td>
      </tr>

<?php 


echo 

"<tr><td width=\"300px\" height=\"10\" bgcolor=\"00cc00\"><font size=\"4\" color=\"#FFFFFF\"><b>Element Holz</td>
          <td width=\"300px\" height=\"10\" bgcolor=\"00cc00\"><font size=\"4\" color=\"#FFFFFF\"><b><input type=\"Radio\" value=\"Holz\" name=\"elemente\"
          style=\"height: 25px; width: 25px;\">&nbsp;markieren</td>
          </tr>
<tr><td width=\"60\" height=\"10\" bgcolor=\"#cc3333\"><font size=\"4\" color=\"#FFFFFF\"><b>Element Feuer</td>
          <td width=\"60\" height=\"10\" bgcolor=\"#cc3333\"><font size=\"4\" color=\"#FFFFFF\"><b><input type=\"Radio\" value=\"Feuer\" name=\"elemente\"
          style=\"height: 25px; width: 25px;\">&nbsp;</td>
          </tr>
          
<tr><td width=\"60\" height=\"10\" bgcolor=\"#cc9966\"><font size=\"4\" color=\"#000000\"><b>Element Erde</td>
          <td width=\"60\" height=\"10\" bgcolor=\"#cc9966\"><font size=\"4\" color=\"#000000\"><b><input type=\"Radio\" value=\"Erde\" name=\"elemente\"
          style=\"height: 25px; width: 25px;\">&nbsp;</td>
          </tr>
          
<tr><td width=\"60\" height=\"10\" bgcolor=\"#cccccc\"><font size=\"4\" color=\"#000000\"><b>Element Metall</td>
          <td width=\"60\" height=\"10\" bgcolor=\"#cccccc\"><font size=\"4\" color=\"#000000\"><b><input type=\"Radio\" value=\"Metall\" name=\"elemente\"
          style=\"height: 25px; width: 25px;\">&nbsp;</td>
          </tr> 
          
<tr><td width=\"60\" height=\"10\" bgcolor=\"#336699\"><font size=\"4\" color=\"#FFFFFF\"><b>Element Wasser</td>
          <td width=\"60\" height=\"10\" bgcolor=\"#336699\"><font size=\"4\" color=\"#FFFFFF\"><b><input type=\"Radio\" value=\"Wasser\" name=\"elemente\"
          style=\"height: 25px; width: 25px;\">&nbsp;</td>
          </tr>
          
          
          <tr><td width=\"60\" height=\"10\" bgcolor=\"#cccc00\"><font size=\"4\" color=\"#000000\"><b><h3c>K A T E G O R I E</h3c></td>
          <td width=\"60\" height=\"10\" bgcolor=\"#cccc00\"><font size=\"4\" color=\"#FFFFFF\"><b>";?>
<?php echo kategorie(); ?>

<?php echo "
          </td>
          </tr>
          
<tr><td width=\"60\" height=\"10\" bgcolor=\"#FFCCFF\"><font size=\"4\" color=\"#000000\"><b>heiss</td>
          <td width=\"60\" height=\"10\" bgcolor=\"#FFCCFF\"><font size=\"4\" color=\"#000000\"><b><input type=\"Radio\" value=\"heiss\" name=\"temperatur\"
          style=\"height: 25px; width: 25px;\">&nbsp;</td>
          </tr>
          
<tr><td width=\"60\" height=\"10\" bgcolor=\"#FFCCFF\"><font size=\"4\" color=\"#000000\"><b>warm</td>
          <td width=\"60\" height=\"10\" bgcolor=\"#FFCCFF\"><font size=\"4\" color=\"#000000\"><b><input type=\"Radio\" value=\"warm\" name=\"temperatur\"
          style=\"height: 25px; width: 25px;\">&nbsp;</td>
          </tr> 
          
<tr><td width=\"60\" height=\"10\" bgcolor=\"#FFCCFF\"><font size=\"4\" color=\"#000000\"><b>neutral</td>
          <td width=\"60\" height=\"10\" bgcolor=\"#FFCCFF\"><font size=\"4\" color=\"#000000\"><b><input type=\"Radio\" value=\"neutral\" name=\"temperatur\"
          style=\"height: 25px; width: 25px;\">&nbsp;</td>
          </tr> 
          
<tr><td width=\"60\" height=\"10\" bgcolor=\"#FFCCFF\"><font size=\"4\" color=\"#000000\"><b>erfrischend</td>
          <td width=\"60\" height=\"10\" bgcolor=\"#FFCCFF\"><font size=\"4\" color=\"#000000\"><b><input type=\"Radio\" value=\"erfrischend\" name=\"temperatur\"
          style=\"height: 25px; width: 25px;\">&nbsp;</td>
          </tr> 
          
<tr><td width=\"60\" height=\"10\" bgcolor=\"#FFCCFF\"><font size=\"4\" color=\"#000000\"><b>kalt</td>
          <td width=\"60\" height=\"10\" bgcolor=\"#FFCCFF\"><font size=\"4\" color=\"#000000\"><b><input type=\"Radio\" value=\"kalt\" name=\"temperatur\"
          style=\"height: 25px; width: 25px;\">&nbsp;</td>
          </tr> 
          
<tr><td colspan=\"2\" height=\"10\" bgcolor=\"#FFCCFF\"><font size=\"4\" color=\"#000000\"><b>
          <input type=\"submit\" name=\"speichern_f\" value=\"speichern\" style=\" width:200px; height:40px; background-color:#FFFFFF; border-width:0; font-size: 18px; color:#000000; border-radius: 3px 3px 3px 3px;\">
          </td>
          </tr>";
          
          
if($_POST['temperatur'] == "heiss") {$temp_spalte = "hot";}
if($_POST['temperatur'] == "warm") {$temp_spalte = "warm";}
if($_POST['temperatur'] == "neutral") {$temp_spalte = "neutral";}
if($_POST['temperatur'] == "erfrischend") {$temp_spalte = "refreshing";}
if($_POST['temperatur'] == "kalt") {$temp_spalte = "cold";}

$kategorie=htmlentities($_POST['kategorie']);
$unbekannte=htmlentities($_POST['unbekannte']);

$number=number($_POST[elemente]);

if ($_POST['speichern_f'] == TRUE){
$speichern=mysql_query("insert into five_elements_thermic
(
element,
number,
kategorie,
product,
$temp_spalte,
temperatur,
geaendert,
zeitstempel
)
values
(
'$_POST[elemente]',
'$number',
'$kategorie',
'$unbekannte',
'$_POST[temperatur]',
'$_POST[temperatur]',
'$_SESSION[nickname]',
'$datum'
)
");
// echo mysql_error();

$_POST[unbekannte]=htmlentities($_POST[unbekannte]);

$loeschen=mysql_query("delete from unbekannt where begriff = '$_POST[unbekannte]'");
}

} // ende if Einlass

else {echo "</table>
<TABLE WIDTH=\"805\" height=\"50\" BORDER=\"0\" BORDERCOLOR=\"\" CELLPADDING=\"10\" CELLSPACING=\"5\" bgcolor=\"red\">
<tr><td align=\"center\" colspan=\"4\"><font face=\"Arial\" size=\"4\" color=\"#FFFFFF\"><b>Diese Seite steht nicht mehr zur Verf&uuml;gung !<br>
Sie m&uuml;ssen sich erneut anmelden !";}

?> 
</table>

</DIV>
<P STYLE="margin-bottom: 0cm"><BR>
</P>
</form>
</BODY>
</HTML>