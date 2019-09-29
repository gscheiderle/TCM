
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
        <META HTTP-EQUIV="CONTENT-TYPE" CONTENT="text/html; charset=WINDOWS-1252">
        <TITLE>hompage</TITLE>
        <META NAME="GENERATOR" CONTENT="OpenOffice.org 3.2  (Win32)">
        <META NAME="AUTHOR" CONTENT="Uwe Sack">
        <META NAME="CREATED" CONTENT="2012, September">
        <META NAME="CHANGEDBY" CONTENT="Uwe Sack">
        
       
       
</HEAD>

<BODY topmargin="0" leftmargin="0" bgcolor="#FFFFFF" link="#000000" vlink="#000000" alink="#000000">
<form action="" method="POST">

<div class="hintergrund">
  <img src="images/hintergrund/hintergrund.jpg" width="2000px" height="1500px">
</div>

<DIV align="center">
<TABLE WIDTH="100%" height="120px" BORDER="0" BORDERCOLOR="" CELLPADDING="5" CELLSPACING="5" background="">
 <TR>
                <TD HEIGHT="120px" WIDTH="100%" bgcolor="#FFFFFF" align="center">

<TABLE WIDTH="1200" height="70" BORDER="0" BORDERCOLOR="" CELLPADDING="5" CELLSPACING="5" background="">

        
        <TR>
                <TD colspan="5" HEIGHT="50px" bgcolor="#FFFFFF" align="center">
                <h1c>Kochen im Kreis</h1c>
                <h2c><br><br>Rezepte und Lebensmittel einordnen nach der traditionellen chinesischen Medizin (TCM)<br><br></h2c>
                </td>
        </TR>
                
        <TR>
                <TD WIDTH="240" HEIGHT="15px" bgcolor="#00cc00" align="center"><img border="0" src="images/holz.gif" width="50" height="50"><br><t1c></font>Holz</t1c></td>
                <TD WIDTH="240" HEIGHT="15px" bgcolor="#cc3333" align="center"><img border="0" src="images/feuer.gif" width="50" height="50"><br><t1c>Feuer</t1c></td>
                <TD WIDTH="240" HEIGHT="15px" bgcolor="#FAC118" align="center"><img border="0" src="images/erde.gif" width="50" height="50"><br><t1c>Erde</t1c></td>
                <TD WIDTH="240" HEIGHT="15px" bgcolor="#cccccc" align="center"><img border="0" src="images/metall.gif" width="50" height="50"><br><t1c>Metall</t1c></td>
                <TD WIDTH="240" HEIGHT="15px" bgcolor="#336699" align="center"><img border="0" src="images/wasser.gif" width="50" height="50"><br><t1c>Wasser</t1c></td>
        </tr>
       
               

<TR>
  <TD colspan="3" HEIGHT="5px" bgcolor="#FFFFFF" align="left">
    <button type="button" onclick="buttonShow()" style=" text-align: left;  border: 0px; border-color:#FFFFFF; width:250px; height:30px; background-color:#FFFFFF; border-radius:8px 8px 8px 8px;">
    <h2l>Alle Links hier ...
    </t2>
    </button>
  </td>

  <TD colspan="2" HEIGHT="5px" bgcolor="#FFFFFF" align="left">
    <a href="index.php?seitenname=erst_kontakt.php" style="text-decoration: none"><FONT face="arial" size="4" color="#000000">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Erstanmeldung</b></a>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a target="popup"onclick="window.open('','popup','width=320,height=420,scrollbars=no,toolbar=no,status=no,resizable=no,menubar=no,location=no,directories=no,top=10,left=10')"href="einloggen.php" style="text-decoration: none"><font face="Arial\" size="4" color="#000000">Login</a>
  </td>
</TR>

<TR>
  <TD colspan="5" HEIGHT="5px" bgcolor="" align="left">       
    <div class="box_menue">
    <div id="infoBox" style="width: 600px; height:300px; padding: 5px; background-color:#e9e9e9 ; border: 0px solid #CCCCCC">
    <table width="600px" height="200px" bgcolor="#e9e9e9" border="0">


<?php echo"
<tr>
    <td valign=\"top\">";
     
    $seiten_name=""; 
    echo "
    <a href=\"index.php?seitenname=$seiten_name\" style=\"text-decoration: none\"><t2>HOME</a></td>
    <td><a href=\"index.php?seitenname=$seiten_name\" style=\"text-decoration: none\"><input type=\"button\" value=\"weiter\" style=\" margin-top: 3px; width:50px; height:20px; background-color:#cc3333; border-width:0; font-size: 12px; color:#FFFFFF; border-radius: 3px 3px 3px 3px;\"></t2></a>
    </td>
   </tr>
   ";?>



<?php echo"
<tr>
    <td valign=\"top\">";
     
    $seiten_name="wechselseiten/was_ist_was.php"; 
    echo "
    <a href=\"index.php?seitenname=$seiten_name\" style=\"text-decoration: none\"><t2>Welche Lebensmittel geh&ouml;ren zu welchem Element</a></td>
    <td><a href=\"index.php?seitenname=$seiten_name\" style=\"text-decoration: none\"><input type=\"button\" value=\"weiter\" style=\" margin-top: 3px; width:50px; height:20px; background-color:#cc3333; border-width:0; font-size: 12px; color:#FFFFFF; border-radius: 3px 3px 3px 3px;\"></t2></a>
    </td>
   </tr>
   ";?>
     
   
   
 <?php echo"
<tr>
    <td valign=\"top\">";
     
    $seiten_name="wechselseiten/rezept_ansehen.php"; 
    echo "
    <a href=\"index.php?seitenname=$seiten_name\" style=\"text-decoration: none\"><t2>Rezepte ansehen und ausdrucken</a></td>
    <td><a href=\"index.php?seitenname=$seiten_name\" style=\"text-decoration: none\"><input type=\"button\" value=\"weiter\" style=\" margin-top: 3px; width:50px; height:20px; background-color:#cc3333; border-width:0; font-size: 12px; color:#FFFFFF; border-radius: 3px 3px 3px 3px;\"></t2></a>
    </td>
   </tr>
   ";?>  
 
 <?php echo"
<tr>
    <td valign=\"top\">";
     
    $seiten_name="wechselseiten/rezept_ordnen.php"; 
    echo "
    <a href=\"index.php?seitenname=$seiten_name\" style=\"text-decoration: none\"><t2>Ihre Rezepte nach den Regeln der TCM planen und zubereiten</a></td>
    <td><a href=\"index.php?seitenname=$seiten_name\" style=\"text-decoration: none\"><input type=\"button\" value=\"weiter\" style=\" margin-top: 3px; width:50px; height:20px; background-color:#cc3333; border-width:0; font-size: 12px; color:#FFFFFF; border-radius: 3px 3px 3px 3px;\"></t2></a>
    </td>
   </tr>
   ";?>   

 <?php echo"
<tr>
    <td valign=\"top\">";
     
    $seiten_name="wechselseiten/fragen.php"; 
    echo "
    <a href=\"index.php?seitenname=$seiten_name\" style=\"text-decoration: none\"><t2>Fragen stellen, Fragen beantworten, Antworten einholen</a></td>
    <td><a href=\"index.php?seitenname=$seiten_name\" style=\"text-decoration: none\"><input type=\"button\" value=\"weiter\" style=\" margin-top: 3px; width:50px; height:20px; background-color:#cc3333; border-width:0; font-size: 12px; color:#FFFFFF; border-radius: 3px 3px 3px 3px;\"></t2></a><br><br>
    </td>
   </tr>
   ";?>  
  

<tr>
<td valign="top" colspan="">
   <t2>
<?php
echo $_SESSION['du_darfst_rein'];
    if($_SESSION['einlass'] == "") {    
   echo "
   <tr>
<td valign=\"top\" colspan=\"2\">
   <t2>
   Haben Sie sich angemeldet (form- und kostenlos), sind weitere Links aktiv:<br><br>
   Sie k&ouml;nnen Ihre Rezepte speichern, Bilder hochladen und mit anderen teilen.<br>
   Fragen &uuml;ber die Zugeh&ouml;rigkeit zu den Elementen beantworten<br>
   Zugeh&ouml;rigkeit oder Eigenschaften der einzelnen Lebensmittel korrigieren<br></td></tr> ";}
   
   else {
    $seiten_name="wechselseiten/rezept_bearbeiten.php";
    echo "
    <tr>
<td valign=\"top\" colspan=\"\">
   <t2>
    <a href=\"index.php?seitenname=$seiten_name\" style=\"text-decoration: none\"><t2>Meine Rezepte bearbeiten</a></td>
    <td><a href=\"index.php?seitenname=$seiten_name\" style=\"text-decoration: none\"><input type=\"button\" value=\"weiter\" style=\" margin-top: 3px; width:50px; height:20px; background-color:#cc3333; border-width:0; font-size: 12px; color:#FFFFFF; border-radius: 3px 3px 3px 3px;\"></t2></a>
<br>
";

$seiten_name_2="wechselseiten/eintrag_korr.php";
    echo "
    <tr>
<td valign=\"top\" colspan=\"\">
   <t2>
    <a href=\"index.php?seitenname=$seiten_name_2\" style=\"text-decoration: none\"><t2>Zutaten-Eintrag &auml;ndern</a></td>
    <td><a href=\"index.php?seitenname=$seiten_name_2\" style=\"text-decoration: none\"><input type=\"button\" value=\"weiter\" style=\" margin-top: 3px; width:50px; height:20px; background-color:#cc3333; border-width:0; font-size: 12px; color:#FFFFFF; border-radius: 3px 3px 3px 3px;\"></t2></a>
<br>
";
   
   $seiten_name_1="wechselseiten/wer_weiss_was.php";
       echo "
    </td></tr>
    <tr>
<td valign=\"top\" colspan=\"\">
   <t2>
    <a href=\"index.php?seitenname=$seiten_name_1\" style=\"text-decoration: none\"><t2>Zutaten Eigenschaften zuordnen</a></td>
    <td><a href=\"index.php?seitenname=$seiten_name_1\" style=\"text-decoration: none\"><input type=\"button\" value=\"weiter\" style=\" margin-top: 3px; width:50px; height:20px; background-color:#cc3333; border-width:0; font-size: 12px; color:#FFFFFF; border-radius: 3px 3px 3px 3px;\"></t2></a>
<br><br>
";}
   
   ?>

   
   </td></tr>
  <tr>
   <td valign="top" colspan="">&nbsp;</td>
   <td valign="top" colspan="">

   <p style="text-align: left; margin-top: 0px"><t2>
    <button type="button" onclick="buttonHide()" style=" background-color: #FFFFFF; height: 65px; width: 65px; border-color: ; border-width: 5px; border-radius: 30px 30px 30px 30px;"><font color="red" size="12px"><b>X</b></font></button>
  </p></t2>
</td></tr>
  </table>
</div>
</div> 
<!-- Der JavaScript-Code -->
<script type="text/javascript">
<!--
var info = document.getElementById("infoBox");
info.style.display = "none"; // Box ausblenden
info.style.position = "relative";
info.style.zIndex = 999;
// Entweder fix auf der Seite platziert
//info.style.left = "50px";
//info.style.top = "100px";
// Oder ein definiertes Stückchen unter dem Knopf
info.style.marginTop = "10px";
 
function buttonShow() {
  // Infobox anzeigen
  info.style.display = "";
}
function buttonHide() {
  // Infobox wieder ausblenden
  info.style.display = "none";
}
//-->
</script>

 </td>
</TR>    
</table>

</td>
 </tr>
       <tr><td></td></tr>  
       </table>

</DIV>
</form>
</BODY>
</HTML>