<?php 
session_start();
include("../intern/myconnect.php");

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
<BODY topmargin="10" leftmargin="0" bgcolor="#FFFFFF">

<form action="" method="POST">

<DIV align="center">
<TABLE WIDTH="805" height="50" BORDER="0" BORDERCOLOR="1" CELLPADDING="10" CELLSPACING="5" bgcolor="#FFFFFF">
        <TR>
            <TD colspan="2" WIDTH="800" HEIGHT="20px" bgcolor="#FFFFFF" align="left">
                <br>
                <font family="Times" size="5"><b>
Kategorien einf&uuml;gen !
             </td>
         </tr>
<?php         
echo "<tr><td colspan=\"2\" height=\"10\" bgcolor=\"#cccccc\"><font size=\"4\" color=\"#000000\"><b></td>
      </tr>";  
if($_POST['vorwaerts'] == TRUE){      
      $_SESSION['th_id_anfang']=$_SESSION['th_id_anfang']+1;
      $_POST['th_id_anfang']=$_SESSION['th_id_anfang'];}


if($_POST['rueckwaerts'] == TRUE){      
      $_SESSION['th_id_anfang']=$_SESSION['th_id_anfang']-1;
      $_POST['th_id_anfang']=$_SESSION['th_id_anfang'];}
      
      
function neuladen($db_ausdruck,$formular_ausdruck)
  {
  if($formular_ausdruck == ""){echo $db_ausdruck;}
  else {echo $formular_ausdruck;}
  } 
      
      
      ?>
        <tr>
            <td colspan="2">  
<input type="text" name="th_id_anfang" size="34" value="<?php echo neuladen($_POST['th_id_anfang'],$_POST['th_id_anfang']); ?>">&nbsp;&nbsp;<br>
<input type="submit" name="rueckwaerts" value="<----"><input type="submit" name="vorwaerts" value="---->">&nbsp;&nbsp;&nbsp;<br><br>

<table>
<?php 



/* if ($_POST['vorwaerts'] == TRUE){ */

$korrektur_suche=mysql_query("select * from five_elements_thermic where th_id >= '$_POST[th_id_anfang]' limit 1");
while ($result_3 = mysql_fetch_array($korrektur_suche)) {
echo "<font size=\"4\">".$result_3['product']."&nbsp;&nbsp;&nbsp;
        <select name=\"kategorie\" size=\"25\">
          <option value=\"Sonstiges\">Sonstiges</option>
          <option value=\"Kraeuter\">Kr&auml;uter</option>
          <option value=\"Gewuerz\">Gew&uuml;rze</option>
          <option value=\"Obst\">Obst</option>
          <option value=\"Trockenobst\">Trockenobst</option>
          <option value=\"Gemuese\">Gem&uuml;se</option>
          <option value=\"Salate\">Salate</option>
          <option value=\"Fleisch\">Fleisch</option>
          <option value=\"Geraeuchertes\">Ger&auml;uchertes</option>
          <option value=\"Getreide\">Getreide</option>
          <option value=\"Huelsenfruechte\">H&uuml;lsenfr&uuml;chte</option>
          <option value=\"Kerne\">Kerne</option>
          <option value=\"Fisch\">Fisch</option>
          <option value=\"Gefluegel\">Gefl&uuml;gel</option>
          <option value=\"Alkohol\">Alkohol</option>
          <option value=\"Saefte\">S&auml;fte</option>
          <option value=\"Getraenke\">Getr&auml;nke</option>
          <option value=\"Tee\">Tee</option>
          <option value=\"Wasser\">Wasser</option>
          <option value=\"Salate\">Salate</option>
          <option value=\"Milchprodukte\">Milchprodukte</option>
          <option value=\"Kaese\">K&auml;se</option>
          <option value=\"Nuesse\">N&uuml;sse</option>
          <option value=\"Oel\">&Ouml;le</option>
          <option value=\"Fette\">Fette</option>
          <option value=\"Suessstoffe\">S&uuml;&szlig;stoffe</option>
          <option value=\"Pilze\">Pilze</option>
          </select>&nbsp;&nbsp;<input type=\"submit\" name=\"speichern\" value=\"Speichern\">";
          
if($_POST['speichern'] == TRUE){
$updaten=mysql_query("update five_elements_thermic set
kategorie = '$_POST[kategorie]'
where th_id = '$_SESSION[th_id_anfang]' 
"); }
 
} 

/* } */ 

$_SESSION['th_id_anfang']=$_POST['th_id_anfang']
?>
<font size="4" color="#000000"><b> 
         </td>
  <td>  <br> Bisher angelegte Kategorien:<br><br> 
    
<?php 

echo htmlspecialchars("gew&uuml;rze");
$alle=mysql_query("select th_id, product, kategorie from five_elements_thermic where kategorie != ''");
while($result=mysql_fetch_array($alle)){
echo "<tr><td>".$result['th_id']."</td><td>".$result['product']."</td><td>".$result['kategorie']."</td></tr>";}
 ?>         
  </td>       
      </tr>


</table>

</DIV>
<P STYLE="margin-bottom: 0cm"><BR>
</P>
</form>
</BODY>
</HTML>