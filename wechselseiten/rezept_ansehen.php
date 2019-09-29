
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
        <META HTTP-EQUIV="CONTENT-TYPE" CONTENT="text/html; charset=WINDOWS-1252">
        <TITLE>Rezept ansehen</TITLE>
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
<TABLE WIDTH="1200" height="50" BORDER="0" BORDERCOLOR="1" CELLPADDING="5" CELLSPACING="5" bgcolor="#FFFFFF">
        <TR>
            <TD colspan="3" WIDTH="800" HEIGHT="20px" bgcolor="" align="center">
                
                
                <h1c>Rezepte ansehen und drucken</h1c>
             </td>
         </tr>
         </table>
 <TABLE WIDTH="1200" height="20" BORDER="0" BORDERCOLOR="1" CELLPADDING="5" CELLSPACING="2" bgcolor="#FFFFFF">       
        <tr>
            <td colspan="2" align="right">
            
<?php



            $data.="<select name=\"rezept_kategorie\" style=\"color:#000000; background-color:#CCCCCC; border-width:2; border-color:#FFFFFF; border-style:yes; border-radius: 3px 3px 3px 3px; height: 30px; width: 300px; font-size:18px;\">";
            $data.="<option $selected_1>Kategorie w&auml;hlen</option>";
            $test=mysql_query("select kategorie from center group by kategorie");
            while($result=mysql_fetch_array($test)){
            
            if ($_POST['rezept_kategorie'] == $result['kategorie']) {$selected_1 = "selected";}
            else {$selected_1 = "";}
            
            $data.="<option  $selected_1>".$result['kategorie']."</option>";}
            $data.="</select>";
            echo $data;
            echo "</td>
            <td align=\"left\">";
            echo "<input type=\"submit\" name=\"suche\" value=\"Suche\" style=\" width:250px; height:50px; background-color:#00cc00; border-width:0; font-size: 24px; color:#FFFFFF; border-radius: 3px 3px 3px 3px;\">

</td></tr>
<tr>
<td colspan=\"2\" align=\"right\">";


$ergebnisse="zun&auml;chst Kategorie w&auml;hlen";
          if ($_POST['suche'] == TRUE)
            { // start if suche 
            $ergebnisse="Ergebnisse";}

            
            echo "<p><select name=\"such_rezepte\" style=\"color:#000000; background-color:#CCCCCC; border-width:2; border-color:#FFFFFF; border-style:yes; border-radius: 3px 3px 3px 3px; height: 30px; width: 300px; font-size:18px;\">
                  <option $selected>$ergebnisse</option>";
                  
         if (($_POST['suche'] == TRUE) || ($_POST['waehle'] == TRUE))
            { // start if suche 
           
            $such_rezept=mysql_query("select name, code from center where kategorie = '$_POST[rezept_kategorie]'");
            while($result_suche=mysql_fetch_array($such_rezept))
            { // start while such
            
            if ($_POST['such_rezepte'] == $result_suche['code']) {$selected = "selected";}
            else {$selected = "";}
            
            echo "<option $selected value=\"$result_suche[code]\">$result_suche[name]</option>";
            } // ende while such
            } // ende if suche
              echo "</td>
            <td align=\"left\">";
            echo "<input type=\"submit\" name=\"waehle\" value=\"Rezept zeigen!\" style=\" width:250px; height:50px; background-color:#00cc00; border-width:0; font-size: 24px; color:#FFFFFF; border-radius: 3px 3px 3px 3px;\"></td></tr>

</table>


 <TABLE WIDTH=\"1200\" border=\"0\" height=\"20\" BORDER=\"0\" BORDERCOLOR=\"\" CELLPADDING=\"5\" CELLSPACING=\"5\" bgcolor=\"#FFFFFF\">";


            echo "<input type=\"hidden\" name=\"rezepte\" value=\"$_POST[such_rezepte]\">&nbsp;&nbsp;&nbsp;&nbsp;</p>";
            
             if ($_POST['waehle'] == TRUE){
             
            $bildanzahl=mysql_query("select datei_name from bildspeicher where datei_name = '$_POST[such_rezepte]' limit 1"); 
            $bildanzahl_1=mysql_fetch_object($bildanzahl);
            $bild_anzahl=$bildanzahl_1 -> datei_name;
            if ($bild_anzahl == "") {$kein_bild="<font size=\"1\">Kein Bild vorhanden.";}
             
            $namegericht=mysql_query("select verfasser,name,zeitstempel from center where code = '$_POST[such_rezepte]'");
            while($result_name=mysql_fetch_array($namegericht))
            {
            $name_gericht_1=$result_name['name'];
            $name_autor=$result_name['verfasser'];
            $name_gericht="<h3c><b>".$result_name['name']."</h3c></b>";
            $aenderung=$result_name['zeitstempel']."</t1c>";
           }
           

           
           
            echo "<tr><td colspan=\"4\" align=\"center\"><font face=\"Arial\" color=\"yellow\" size=\"6\"><b>".$name_gericht;
 echo "<a target=\"popup\"onclick=\"window.open('','popup','width=625,height=485,scrollbars=yes,toolbar=no,status=no,resizable=yes,menubar=yes,location=no,directories=no,top=10,left=10')\"href=\"wechselseiten/rezept_drucken.php?name_gericht=$name_gericht_1&such_rezepte=$_POST[such_rezepte]\"><font color=\"#c0c0c0\" size=\"3\"><t1c><br><br>Druckversion</a>";
                  
                  
            echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
            echo "<a target=\"popup\"onclick=\"window.open('','popup','width=625,height=485,scrollbars=yes,toolbar=no,status=no,resizable=yes,menubar=no,location=no,directories=no,top=10,left=10')\"href=\"intern/rezeptbilder.php?rezept_code=$_POST[such_rezepte]\"><t1c>Bilder zum Rezept&nbsp;&nbsp;&nbsp;&nbsp;$kein_bild</a>";
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;eingestellt von: $name_autor&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;letzte &Auml;nderung:&nbsp;$aenderung</t1c>";
            }
            ?>
            

         </td>
      </tr>
      
      
      
      
<?php  if ($_POST['waehle'] == TRUE) 
            
            { // start if suche 
  
            
            echo "<tr>
            <td width=\"5%\" height=\"15px\"
            style=\" border: 1px solid white; border-bottom-color: #000000;\"><h2l>Elemente:</td>
            <td width=\"10%\" height=\"15px\"
            style=\" border: 1px solid white; border-bottom-color: #000000;\"><h2l>Menge:</td>
                      <td width=\"30%\" height=\"15px\"
                      style=\" border: 1px solid white; border-bottom-color: #000000;\"><h2l>Zutaten:</h2l></td>
                      <td width=\"55%\" height=\"15px\"
                      style=\" border: 1px solid white; border-bottom-color: #000000;\"><h2l>Hinweise:</h2l></td>
                      </tr>";
            
           
            $waehl_rezept=mysql_query("select * from rezepte where code = '$_POST[such_rezepte]' order by zutaten_nr");
            while($result_wahl=mysql_fetch_array($waehl_rezept))
            { // start while waehl
            
            
            if ($result_wahl['element'] != "&Uuml;berschrift") {
            
            echo
            "<tr>
                  <td width=\"\" bgcolor=\"".bgcolor($result_wahl['element'])."\">$result_wahl[element]</td>
                  <td width=\"\" height=\"10px\"><t1l>$result_wahl[menge]</td>
                  <td><t1l>$result_wahl[product]</t11></td>
                  <td height=\"\" width=\"30%\" bgcolor=\"#ffffff\"><t1l>$result_wahl[bearbeiten]</t1l></td>
             </tr>";
             
         }    
            
            if ($result_wahl['element'] == "&Uuml;berschrift") {
            
            echo
            "<tr>
                 <td colspan=\"4\" align=\"center\" ><t1l><b>&nbsp;</b></t11></td>
             </tr>>
             <tr>    
                  <td colspan=\"4\" align=\"center\" bgcolor=\"#f0f0f0\"><t1l><b>$result_wahl[product]</b></t11></td>
                  
             </tr>";
           } // ende if Ueberschrift
     
            
            
           } // ende While waehl
            
           
            
            


?> 



        <TR>
            
            <TD  colspan="4" HEIGHT="10px" bgcolor="" align="left">
            
            <?php 
            
            
            $zubereitung=mysql_query("select zubereitung from center where code = '$_POST[such_rezepte]'");
            while($result_zubereitung=mysql_fetch_array($zubereitung))
            {$text_zubereitung=$result_zubereitung['zubereitung'];}
            
            $standarttext="Zubereitung:";  // f&uuml;rs Textfeld
             ?>
            
            <?php echo "<h21>Zubereitung:<br></h21>"; echo $text_zubereitung; ?>
             
             </td>
             <td>&nbsp;</td>
             </tr>
             
             
             <?php  } // ende if suche 
             ?>
             
             </table>
            

</DIV>

</form>
</BODY>
</HTML>