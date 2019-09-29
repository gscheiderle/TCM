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
        <TITLE>Eintr&auml;ge korrigieren</TITLE>
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
<DIV align="center">

<?php $wechselseite="eintragung_korrigieren.php"; 

// Seite l&ouml;schen, wenn user abgemeldet
if ($_SESSION['einlass'] == TRUE){

?>
<form action="<?php "../index.php?wechselseite=$wechselseite"; ?>" method="POST">


<TABLE WIDTH="1200px" height="50" BORDER="0" BORDERCOLOR="" CELLPADDING="10" CELLSPACING="5" bgcolor="#FFFFFF">

        <TR>
            <TD colspan="2" WIDTH="1200" HEIGHT="px" bgcolor="" align="center">
                
                <font face="Arial" size="6"><b>
<h1c>Bestehende Eintr&auml;ge korrigieren</h1c>
             </td>
         </tr>

 <tr><td align="center">        
         
<TABLE WIDTH="805" height="50" BORDER="0" BORDERCOLOR="" CELLPADDING="10" CELLSPACING="5" bgcolor="#FFFFFF">       
        <tr>
            <td colspan="2" align="left" bgcolor="#d9d9d9">  
<?php 
   $links=1;

   $veri_links="veri_".$links;
  


   echo "
        <font size=\"4\" color=\"#000000\"><b>";?>
   <?php  echo verifizieren($_POST[$links],$_POST[$veri_links],$_POST[korr_veri],$links);?>
   <?php  $wechsel=wechsel($_POST[$links],$links,$_POST[$veri_links]);
          echo "<input type=\"text\" name=\"$links\" size=\"45\" tabindex=\"$links\" value=\"";?><?php neuladen($_POST[$links],$wechsel);echo "\"style=\" width:350px; height:40px; background-color:#FFFFFF; border-width:0; font-size: 18px; color:#000000; border-radius: 3px 3px 3px 3px;\"> &nbsp; <input type=\"submit\" name=\"veri_$links\" value=\"veri$links\"
          style=\" width:150px; height:40px; background-color:#FFFFFF; border-width:0; font-size: 18px; color:#000000; border-radius: 3px 3px 3px 3px;\">";
        $wechsel = ""; ?>

<input type="submit" name="suche_listen" value="ausf&uuml;hren" style=" width:150px; height:40px; background-color:#FFFFFF; border-width:0; font-size: 18px; color:#000000; border-radius: 3px 3px 3px 3px;">
<?php 

$korrektur_suche=mysql_query("select * from five_elements_thermic where product like '$_POST[$links]' " );
while ($result_3 = mysql_fetch_array($korrektur_suche)) {
$th_id=$result_3['th_id'];
$data.="<input type=\"text\" name=\"product_name\" value=\"$result_3[product]\"
style=\" width:350px; height:40px; background-color:#FFFFFF; border-width:0; font-size: 18px; color:#000000; border-radius: 3px 3px 3px 3px;\">&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;";
$data.=$result_3['element']."&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;";
$data.=$result_3['number']."&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;";
$data.=$result_3['kategorie']."&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;";
$data.=$result_3['hot'];
$data.=$result_3['warm'];
$data.=$result_3['neutral'];
$data.=$result_3['refreshing'];
$data.=$result_3['cold'];
$data.="<p><font size=\"2\" color=\"#c0c0c0\">zuletzt ge&auml;ndert am $result_3[zeitstempel] von $result_3[geaendert] !</p>";

if ($result_3['kategorie'] == "Kraeuter") {$selected = "selected";}
if ($result_3['kategorie'] == "Gewuerz") {$selected = "selected";}
if ($result_3['kategorie'] == "obst") {$selected = "selected";}
if ($result_3['kategorie'] == "gemuese") {$selected = "selected";}
if ($result_3['kategorie'] == "Fleisch") {$selected_1 = "selected";}else{$selected = "";}
if ($result_3['kategorie'] == "getreide") {$selected = "selected";}
if ($result_3['kategorie'] == "fleisch") {$selected = "selected";}
}
?>
<font size="4" color="#000000"><b>
<?php  
echo "<p>$data</p>";
 ?>
 <input type="hidden" name="th_id" value="<?php echo $th_id; ?>">
         </td>
      </tr>

<?php 


echo 

"<tr><td width=\"400px\" height=\"10\" bgcolor=\"00cc00\"><font size=\"4\" color=\"#FFFFFF\"><b>Element Holz</td>
          <td width=\"400px\" height=\"10\" bgcolor=\"00cc00\"><font size=\"4\" color=\"#FFFFFF\"><b><input type=\"Radio\" value=\"Holz\" name=\"elemente\"
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

<?php echo "</td>
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
          <input type=\"submit\" name=\"updaten\" value=\"&Auml;nderung speichern\"
          style=\" width:250px; height:40px; background-color:red; border-width:0; font-size: 18px; color:#FFFFFF; border-radius: 3px 3px 3px 3px;\">
          </td>
          </tr>";
          
         
if($_POST['temperatur'] == "heiss")       {$heiss = "heiss"; $warm = ""; $neutral = ""; $erfrischend = ""; $kalt = "";}
if($_POST['temperatur'] == "warm")        {$heiss = ""; $warm = "warm"; $neutral = ""; $erfrischend = ""; $kalt = "";}
if($_POST['temperatur'] == "neutral")     {$heiss = ""; $warm = ""; $neutral = "neutral"; $erfrischend = ""; $kalt = "";}
if($_POST['temperatur'] == "erfrischend") {$heiss = ""; $warm = ""; $neutral = ""; $erfrischend = "erfrischend"; $kalt = "";}
if($_POST['temperatur'] == "kalt")        {$heiss = ""; $warm = ""; $neutral = ""; $erfrischend = ""; $kalt = "kalt";}

$number=number($_POST['elemente']);

if ($_POST[updaten] == TRUE){



$elemente=htmlentities("$_POST[elemente]");
$kategorie=htmlentities("$_POST[kategorie]");
$product_name=htmlentities("$_POST[product_name]");
$heiss=htmlentities("$heiss");
$warm=htmlentities("$warm");
$neutral=htmlentities("$neutral");
$erfrischend=htmlentities("$erfrischend");
$kalt=htmlentities("$kalt");
$nickname=htmlentities("$_SESSION[nickname]");



$updaten=mysql_query("update five_elements_thermic set

element = '$elemente',
number = '$number',
kategorie = '$kategorie',
product = '$product_name',
hot = '$heiss',
warm = '$warm',
neutral = '$neutral',
refreshing = '$erfrischend',
cold = '$kalt',
geaendert = '$nickname',
zeitstempel='$datum'
where th_id = '$_POST[th_id]'
");

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