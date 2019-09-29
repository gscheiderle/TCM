<?php 
session_start();
include("intern/myconnect.php");
include("intern/funktionen_fuer_korrektur.php");

// W. Kaiser
$mysql_version=trim(mysql_get_server_info());
if (substr($mysql_version,0,1)>'4')
   {
   //Disable "STRICT" mode for MySQL 5!
   mysql_query("SET SESSION sql_mode=''");
   // W. Kaiser
   } 
   
// Sonderzeichen aus der sessionid entfernen  
$tabellen_name=str_replace("?","7",str_replace("&","6",str_replace(":","5",str_replace("\\","4",str_replace("/","3",str_replace("%","2",str_replace("$","1",session_id())))))));   
$temp_tab_name_4=$tabellen_name."_4";
$temp_tab_name_4=substr($temp_tab_name_4,-18);
   
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
        <META HTTP-EQUIV="CONTENT-TYPE" CONTENT="text/html; charset=WINDOWS-1252">
        <TITLE>Rezept bearbeiten</TITLE>
        <META NAME="GENERATOR" CONTENT="OpenOffice.org 3.2  (Win32)">
        <META NAME="AUTHOR" CONTENT="Uwe Sack">
        <META NAME="CREATED" CONTENT="2012, September">
        <META NAME="CHANGEDBY" CONTENT="Uwe Sack">
        <STYLE TYPE="text/css">
        <!--	a:hover	{color:;}
				a			{text-decoration:none;}
        //-->
        </STYLE>
        
        <script src="ckeditor/ckeditor.js"></script>
	      <script src="ckeditor/samples/sample.js"></script>
	      <!-- <link href="ckeditor/samples/sample.css" rel="stylesheet"> //-->
        
        
</HEAD>
<BODY topmargin="0" leftmargin="0" bgcolor="#FFFFFF">
<?php echo "<form action=\"rezept_bearbeiten.php?such_rezepte=$_POST[such_rezepte]&rezept_kategorie=$_POST[rezept_kategorie]&rezeptloeschen=$_POST[rezeptloeschen]\" method=\"POST\">"; 


function neuladen_1($formular_ausdruck,$db_ausdruck)
{
 if(($formular_ausdruck != "") && ($db_ausdruck == "")) {echo $formular_ausdruck;}
 if(($formular_ausdruck != "") && ($db_ausdruck != "")) {echo $db_ausdruck;}
 if(($formular_ausdruck == "") && ($db_ausdruck != "")) {echo $db_ausdruck;}
}


if ($_POST['such_rezepte'] != "") {$_GET['such_rezepte'] = "";}
if ($_GET['such_rezepte'] != "") {$_POST['such_rezepte'] = "";}

if ($_POST['rezept_kategorie'] != "") {$_GET['rezept_kategorie'] = "";}
if ($_GET['rezept_kategorie'] != "") {$_POST['rezept_kategorie'] = "";}


?>

<DIV align="center">

<?php // Seite l&ouml;schen, wenn user abgemeldet
if ($_SESSION['einlass'] == TRUE){ ?>

<TABLE WIDTH="1200" height="50" BORDER="0" BORDERCOLOR="" CELLPADDING="5" CELLSPACING="5" bgcolor="#FFFFFF">
        <TR>
            <TD WIDTH="1200" HEIGHT="20px" bgcolor="" align="center">
                
                
                <h1c>Gespeicherte Rezepte bearbeiten</h1c>
             </td>
         </tr>
 </table>
 
 <TABLE WIDTH="1200" height="20" BORDER="0"  CELLPADDING="5" CELLSPACING="5" bgcolor="#FFFFFF">       
        <tr>
            <td align="right">
            
<?php
            $data.="<select name=\"rezept_kategorie\"  style=\"color:#000000; background-color:#CCCCCC; border-width:2; border-color:#FFFFFF; border-style:yes; border-radius: 3px 3px 3px 3px; height: 30px; width: 300px; font-size:18px;\">";
            $data.="<option selected>Kategorie w&auml;hlen</option>";
            $select_kategorie=mysql_query("select kategorie from center where verfasser = '$_SESSION[nickname]' group by kategorie");
            while($result=mysql_fetch_array($select_kategorie)){
             if (($result['kategorie'] == $_GET['rezept_kategorie']) || ($result['kategorie'] == $_POST['rezept_kategorie']))
             {$selected_k = "selected";} else {$selected_k = "";}
            $data.="<option $selected_k>".$result['kategorie']."</option>";}
            $data.="</select>";
            echo $data;
            echo "</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td> <td align=\"left\">";
            echo "<button type=\"submit\" name=\"suche\" value=\"1\" style=\" width:250px; height:50px; background-color:#00cc00; border-width:0; font-size: 24px; color:#FFFFFF; border-radius: 3px 3px 3px 3px;\">Suche !</button><br>
            </td></tr>
<tr>
<td align=\"right\">";
            
  
  
            echo "<input type=\"hidden\" name=\"rezeptkategorie\" value=\"$_POST[rezept_kategorie]\">";            
            echo "<br><select name=\"such_rezepte\" style=\"color:#000000; background-color:#CCCCCC; border-width:2; border-color:#FFFFFF; border-style:yes; border-radius: 3px 3px 3px 3px; height: 30px; width: 300px; font-size:18px;\">
                  <option $selected>Ergebnisse</option>";
                  
       
            $such_rezept=mysql_query("select name, code from center where kategorie = '$_POST[rezept_kategorie]'
            and verfasser = '$_SESSION[nickname]'
            or kategorie = '$_GET[rezept_kategorie]' and verfasser = '$_SESSION[nickname]'");
            while($result_suche=mysql_fetch_array($such_rezept))
            { // start while such
            
            if (($result_suche['code'] == $_GET['such_rezepte']) || ($result_suche['code'] == $_POST['such_rezepte']))
            {$selected = "selected";} else {$selected = "";}
            
            $rezept_code_db=$result_suche['code'];
            echo "<option value=\"$result_suche[code]\" $selected>$result_suche[name]</option>";
            } // ende while such
            echo "</select>";
            echo "</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td> <td align=\"left\">";
            echo "<button type=\"submit\" name=\"waehle\" value=\"1\" style=\" width:250px; height:50px; background-color:#00cc00; border-width:0; font-size: 24px; color:#FFFFFF; border-radius: 3px 3px 3px 3px;\">Rezept zeigen !</button>&nbsp;&nbsp;
</td></tr>
</table>

<TABLE WIDTH=\"1200\" height=\"20\" BORDER=\"0\"  CELLPADDING=\"5\" CELLSPACING=\"5\" bgcolor=\"#FFFFFF\">  
<tr><td colspan=\"6\">
";
            
           

            echo "<input type=\"hidden\" name=\"rezepte\" value=\"$_POST[such_rezepte]\">&nbsp;&nbsp;"; ?>
            
   <?php     
 if (($_POST['waehle'] == TRUE) || ($_GET['such_rezepte'] != "") || ($_POST['aendern'] == TRUE) ){
             
             if (($_POST['waehle'] == TRUE) || ($_GET['such_rezepte'] != "")) {
             mysql_query("drop table if exists $temp_tab_name_4"); 
            $tabelle_creieren=mysql_query("create TABLE IF NOT EXISTS $temp_tab_name_4
            (
            temp_rez_id int(10) NOT NULL auto_increment primary key,
            rez_id int(8),
            zutaten_nr char(64),
            product char(64),
            menge char(64),
            bearbeiten varchar(255)
            )
            ");
            
            mysql_query("insert into table_name (tablename_4,zeitstempel)values('$temp_tab_name_4','$aelter_24_std')");
            }
            
            $namegericht=mysql_query("select verfasser, name, zeitstempel from center where code = '$_POST[such_rezepte]'
            or code = '$_GET[such_rezepte]'");
            while($result_name=mysql_fetch_array($namegericht))
            {
            $name_gericht_1=$result_name['name'];
            $name_gericht="<h1c>".$result_name['name']."</h1c><t2> eingestellt von ".$autor=$result_name['verfasser'];
            $aenderung=$result_name['zeitstempel']. "</t2>";}
            }
            
            echo "<br>" . $name_gericht . "&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;letzte &Auml;nderung: " . $aenderung;
            ?>
            

         </td>
      </tr>
  
     
<?php     $i=1;

            if ( ( $_POST['waehle'] == TRUE ) || ( $_GET['such_rezepte'] != "" )  || ( $_POST['aendern'] == TRUE ) )
            { // start if suche 
           
            
           $zaehl_rezept=mysql_query("select count(rez_id) as coun_ter from rezepte where code = '$_POST[such_rezepte]' or code = '$_GET[such_rezepte]'");
            while($result_zahl=mysql_fetch_array($zaehl_rezept))
            { // start while zaehl
            $zaehler=$result_zahl['coun_ter'];
            }
            
            
            
echo "

<tr><td colspan=\"6\" align=\"center\" bgcolor=\"d2d2d2\">
<a target=\"popup\"onclick=\"window.open('','popup','width=580,height=360,scrollbars=yes,toolbar=no,status=no,resizable=yes,menubar=no,location=no,directories=no,top=10,left=10')\"href=\"intern/bildhochladen.php?rezept_code=$_POST[such_rezepte]&autor=$autor\"><font color=\"#000000\"><t2>B I L D&nbsp;&nbsp;&nbsp;&nbsp;H O C H L A D E N</t2></a>
 </td>
</tr>

<tr>
      <td height=\"15px\" width=\"5%\"><font size=\"4\" color=\"#000000\"><b></td>
      <td height=\"15px\" width=\"3%\"><font size=\"4\" color=\"#000000\"><b>ID:</td>
      <td height=\"15px\" width=\"10%\"><font size=\"4\" color=\"#000000\"><b>Menge</td>
      <td height=\"15px\" width=\"30%\"><font size=\"4\" color=\"#000000\"><b>Zutaten:</td>
      <td height=\"15px\" width=\"57%\"><font size=\"4\" color=\"#000000\"><b>Verarbeitung</td>
      <td height=\"15px\" width=\"3%\" align=\"left\" ><font size=\"4\" color=\"#000000\"><b>Zeile:</td>
 
</tr>

";

            
            $waehl_rezept=mysql_query("select * from rezepte where code = '$_POST[such_rezepte]' 
            or code = '$_GET[such_rezepte]' order by zutaten_nr");
            while($result_wahl=mysql_fetch_array($waehl_rezept))
            { // start while waehl
            
            $select_zeilen_nr.="<option value=\"$result_wahl[zutaten_nr]\">Zeile Nr.: $result_wahl[zutaten_nr]</option>";
            
            $rezept_id=$result_wahl['rez_id'];
            $optionen.="<option>".$result_wahl['rez_id']."</option>";
            $$rezept_id=$rezept_id;
            $rezept_id="rezept_id_".$i;
            $zeile="zeile: ".$i;
            $product="product_".$i;
            $menge="menge_".$i;
            $bearbeiten="bearbeiten_".$i;
            
            
            $bgcolor="bgcolor=\"#ffffff\"";
            if ( $i % 2 != 0 ) { $bgcolor="bgcolor=\"#f0f0f0\""; }

           
            echo "<tr></td> 

                  <td width=\"5%\" height=\"15px\" bgcolor=\"".bgcolor($result_wahl['element'])."\">
                  <font size=\"3\" color=\"".fontcolor($result_wahl['element'])."\"><b>$result_wahl[element]
                  </td>"; ?>
       <?php          
            echo "<td width=\"3%\" height=\"15px\" $bgcolor>
            <input type=\"text\" name=\"$rezept_id\""; ?> value="<?php echo neuladen_1($result_wahl[rez_id], $_POST[$rezept_id]); ?>" size="3"
            style="color:#000000; background-color:#FFFFFF; border: 1px ; border-color: #cccccc; border-style: solid;">
            
            </td> 
            
         
            
            
         <?php  
            echo "<td width=\"10%\" height=\"15px\" $bgcolor>
            <input type=\"text\" name=\"$menge\""; ?> value="<?php echo neuladen_1($result_wahl['menge'], $_POST[$menge]); ?>" size="15"
            style="color:#000000; background-color:#FFFFFF; border: 1px ; border-color: #cccccc; border-style: solid;">
            </td>         
            
                    
            
     <?php  echo "           
            <td width=\"30%\" height=\"15px\" $bgcolor>
            <input type=\"text\" name=\"$product\""; ?> value="<?php echo neuladen_1($result_wahl['product'], $_POST[$product]); ?>" size="35"
            style="color:#000000; background-color:#FFFFFF; border: 1px ; border-color: #cccccc; border-style: solid;">
            </td>     
                  
                  
        
            
     <?php    
            echo "<td width=\"57%\" height=\"15px\" $bgcolor>
            <input type=\"text\" name=\"$bearbeiten\""; ?> value="<?php echo neuladen_1($result_wahl['bearbeiten'], $_POST[$bearbeiten]); ?>" 
            size="70" style="color:#000000; background-color:#FFFFFF; border: 1px ; border-color: #cccccc; border-style: solid;">
            </td>
            
         <?php          
            echo "<td width=\"3%\" height=\"15px\" $bgcolor>
            <button type=\"button\" name=\"$zeile\" value=\"$result_wahl[zutaten_nr]\"
            style=\"color:#000000; background-color:#FFFFFF; border: 1px ; border-color: #cccccc; border-style: solid;\"> ";
            echo neuladen_1($result_wahl['zutaten_nr'], $_POST[$zeile]); ?>
            </button>
            
            </td>        
       </tr>
            
    <?php
           $i++;
           
           if (($_POST['waehle'] == TRUE) || ($_GET['such_rezepte'] != "")) { 
           mysql_query("insert into $temp_tab_name_4 
           (
           rez_id, zutaten_nr, product, menge, bearbeiten 
           ) 
           values 
           (
           '$result_wahl[rez_id]', '$result_wahl[zutaten_nr]', '$result_wahl[product]','$result_wahl[menge]','$result_wahl[bearbeiten]'
           )
           ");
            }
           
            if ( $_POST['aendern'] == TRUE ) {
            
            
            mysql_query("update $temp_tab_name_4 set
            zutaten_nr = '$_POST[$zeile]',
            product = '$_POST[$product]',
            menge = '$_POST[$menge]', 
            bearbeiten = '$_POST[$bearbeiten]'
            where rez_id = '$_POST[$rezept_id]'
            ");
            }
            
            }
            
            } // ende While waehl
       ?> 
       
             <tr>
            <td colspan="6" HEIGHT="20px" bgcolor="#cc6633" align="left">
        <?php        
            echo "<font size=\"4\" color=\"#FFFFFF\"><br>&nbsp;&nbsp;<b>Hier speichern Sie alle &Auml;nderungen in den obigen Feldern, einschlie&szlig;lich des Textfeldes f&uuml;r 
            \"Zubereitung, Kniffe und Tips\" &nbsp;&nbsp;";
            echo "<input type=\"submit\" name=\"aendern\" value=\"Speichern !\"><br>
            <font color=\"#c0c0c0\" size=\"2\">&nbsp;&nbsp;&nbsp;letzte &Auml;nderung:&nbsp;$aenderung"; 
            echo "<br><br>
            </td></tr>";
            ?>
       
        <TR>
            <TD colspan="6" HEIGHT="20px" bgcolor="" align="left">
            <br><h3>

            Zeile f&uuml;r &Uuml;berschrift einf&uuml;gen <font style=" background-color: yellow;"><b>&nbsp;vor&nbsp;</b></font>&nbsp;&nbsp;
            <select name="zeilen_nummer"><?php echo $select_zeilen_nr; ?> </select>&nbsp;&nbsp;&nbsp;
            &nbsp;<input type="text" name="ueberschrift" size="40" value="&Uuml;berschrift">&nbsp;&nbsp;&nbsp;
            <button type="submit" name="zeile_einfuegen" value="1">Zeile einf&uuml;gen</button>
            
            <?php 
            
            $adresse_hilfe_2="wechselseiten/hilfe_ueberschriften_einfuegen.php";
             echo "&nbsp;&nbsp;&nbsp;&nbsp;".popup_hilfe($adresse_hilfe_2);
            
            if ( $_POST['zeile_einfuegen'] == TRUE ) {
            
            $neue_zeilen_nr=$_POST['zeilen_nummer'] - 0.1;
            
            mysql_query(" insert into rezepte 
            (
            zutaten_nr, 
            code, 
            product,
            element 
            ) 
            values
            (
            '$neue_zeilen_nr',
            '$_POST[such_rezepte]',
            '$_POST[ueberschrift]',
            '&Uuml;berschrift'
            )
            ");
            
            echo "<br>Rezept neu laden !<br>";
            
         } // ende IF zeile-einfuegen
            
       ?>
            
            
            
            </td>
        </tr>
        
        
             <tr>
             <td colspan="6">

             <Table border="0" width="780">           
             <tr><td align="left" valign="middle" width="50%"><font face="arial" size="3" color="#000000"><b>
             Zutat l&ouml;schen mit ID:&nbsp;&nbsp;
             <select name="product_loeschen">
             <option value="0" selected>ID w&auml;hlen</option>
             <?php echo $optionen; ?>
             </select>
             <input type="hidden" name="rezept_code" value="<?php echo $_POST[such_rezepte]; ?>">
             &nbsp;&nbsp;&nbsp;
             <button type="submit" name="zutatloeschen" value="1">Zutat<br>l&ouml;schen</button>
             
             <?php
             $adresse_hilfe_1="wechselseiten/hilfe_zutaten_loeschen.php";
             echo "&nbsp;&nbsp;&nbsp;&nbsp;".popup_hilfe($adresse_hilfe_1);
             
             
              
             if (($_POST['zutatloeschen'] == TRUE) && ($_POST['product_loeschen'] != FALSE)){
                mysql_query("delete from rezepte where rez_id = '$_POST[product_loeschen]'");}
                 ?>
              </td>
              </tr>
              
              <tr>
              <td><p>&nbsp;</p>
              </td>
              </tr>
           </table>
           </td>
           </tr>   
        
        
        
        <TR>
            <TD colspan="6" HEIGHT="20px"  align="left">
           
       <?php  
           
            echo "
            <table border='0' style='background-color: #f0f0f0; border-spacing: 10px'>
            
            <tr>
            <td colspan='5'>
            <p>&nbsp;</p>
            </td>
            </tr>
            
            <tr>
            <td colspan='5'>
            
            <h3> Lebensmittel verifizieren und <font style=\" background-color: yellow;\"><b>&nbsp;vor&nbsp;</b></font>&nbsp;&nbsp;
            <select name=\"zeilen_nummer_2\">". $select_zeilen_nr . "</select> einf&uuml;gen. <font style=\" background-color: yellow;\"><b>&nbsp;Kreis einhalten !&nbsp;</font>";
            
            $inhalt="hier verifizieren";
            $adresse="wechselseiten/lebensmittel_verifizieren.php";
            
            $adresse_hilfe="wechselseiten/hilfe_zutaten_einfuegen.php";
            
            echo "&nbsp;&nbsp;&nbsp;&nbsp;".popup($inhalt, $adresse)."&nbsp;&nbsp;&nbsp;&nbsp;".popup_hilfe($adresse_hilfe);
           

            
           echo "</td></tr>";

           echo "
           <tr>

           <td width='5%' height='15px'>
           <font size='3' color='#000000'><b>Element
           </td>       
            
            
            <td width='10%' height='15px'>
            <font size='3' color='#000000'><b>Menge
            </td> 
            
            <td width='25%' height='15px'>
            <font size='3' color='#000000'><b>Zutat
            </td>
            
            <td width='45%' height='15px'>
            <font size='3' color='#000000'><b>Verarbeitung
            </td>
            
            <td width='10%' height='15px'>
            &nbsp;
            </td>
                   
       </tr>

       ";
       
      
       
       echo "
       <tr>

           <td width='5%' height='15px' >
           <input type='text' name='korr_element' value='$_POST[korr_element]' size='15'
            style='color:#000000; background-color:#FFFFFF; border: 1px ; border-color: #cccccc; border-style: solid;'>
           </td>  
           
           <td width='10%' height='15px' >
            <input type='text' name='korr_menge' value='$_POST[korr_menge]' size='15'
            style='color:#000000; background-color:#FFFFFF; border: 1px ; border-color: #cccccc; border-style: solid;'>
            </td> 
            
            <td width='25%' height='15px' >
            <input type='text' name='korr_product' value='$_POST[korr_product]' size='35'
            style='color:#000000; background-color:#FFFFFF; border: 1px ; border-color: #cccccc; border-style: solid;'>
            </td>
            
            <td width='45%' height='15px' >
            <input type='text' name='korr_bearbeiten' value='$_POST[korr_bearbeiten]' 
            size='60' style='color:#000000; background-color:#FFFFFF; border: 1px ; border-color: #cccccc; border-style: solid;'>
            </td>
            
            <td width='15%' height='15px' >
            <button type='submit' name='korr_speichern' value='1'>Zutat einf&uuml;gen</button>
            </td>
                  
       </tr>
       
       <tr>
          <td colspan='5'>
          <p>&nbsp;</p>
          </td>
       </tr>
       
         
       </table>
       </td>
       </tr>
       
       ";
       if ( $_POST['korr_speichern'] == TRUE ) {
       
       $neue_zeilen_nr_2=$_POST['zeilen_nummer_2'] - 0.1;
       
             mysql_query(" insert into rezepte 
            (
            zutaten_nr, 
            code,
            element,
            product,
            menge,
            bearbeiten
            ) 
            values
            (
            '$neue_zeilen_nr_2',
            '$_POST[such_rezepte]',
            '$_POST[korr_element]',
            '$_POST[korr_product]',
            '$_POST[korr_menge]',
            '$_POST[korr_bearbeiten]'
            )
            ");
            
        }

      
       ?>
            </td>
        </tr>    

        <TR>
            <TD colspan="6" HEIGHT="20px" bgcolor="" align="left">
       <?php 
            
            
            $zubereitung=mysql_query("select zubereitung from center where code = '$_POST[such_rezepte]'
            or code = '$_GET[such_rezepte]'");
            while($result_zubereitung=mysql_fetch_array($zubereitung))
            {$text_zubereitung=$result_zubereitung['zubereitung'];}
            
            echo $standarttext="<h3>Zubereitung, Kniffe und Tips !</h3>";  // f&uuml;rs Textfeld
             ?>
            
            <p><textarea area-border="1" name="hinweise" rows="5" cols="65" scrolling="yes" style="font-family:Arial; font-style:normal; font-size:14pt; background-color:#FFFFFF; border:0">
      <?php echo $text_zubereitung; ?>
             </textarea>
             
             <?php include("intern/script.html"); ?>
             </td>
             </tr>
             
             <?php } // ende if suche
              ?>
             
             <tr>
             <td colspan="6">
 <!-- neue Zeile in der Zelle !! //--> 
             <Table border="0" width="780">           
             <tr><td align="center" width="50%"><font face="arial" size="3" color="#000000"><b>
          
              </td>
                  
                <td align="center" width="50%"><font face="arial" size="3" color="#000000"><b>
                  Rezept "<?php echo $name_gericht_1; ?>" l&ouml;schen ?&nbsp;&nbsp;
                  <input type="submit" name="rezeptloeschen" value="l&ouml;schen !">
             <?php 
                if ( $_POST['rezeptloeschen'] == TRUE ) { 
                echo "&nbsp;&nbsp;&nbsp;<button type=\"submit\" name=\"final_rezeptloeschen\" value=\"1\">Rezept komplett l&ouml;schen ?</button>";
                }
             
                if ($_POST['final_rezeptloeschen'] == TRUE){
                mysql_query("delete from rezepte where code = '$_POST[rezept_code]'");
                mysql_query("delete from center where code = '$_POST[rezept_code]'");
                }
                ?>
              </td>
            </tr>
            
            <tr>
                <td>
                <p>&nbsp;</p>
                </td>
            </tr>
        </table>
           
              </td>
           </tr>
             

            
 <?php           
            
         if ($_POST['aendern'] == TRUE)
            { // start if aendern
            
            
            
            mysql_query("update center set zeitstempel = '$datum' where code = '$_POST[rezepte]'");
            
            $rezept_update=mysql_query("select * from $temp_tab_name_4");
            while ($rez_upd=mysql_fetch_array($rezept_update))
            { // start while rezept_update
           
           $product=htmlentities("$rez_upd[product]");
           $menge=htmlentities("$rez_upd[menge]");
           $bearbeiten=htmlentities("$rez_upd[bearbeiten]");
         

            mysql_query("update rezepte set 
            product = '$product',
            menge = '$menge', 
            bearbeiten = '$bearbeiten'
            where rez_id = '$rez_upd[rez_id]'
            ");
             
             
            
            
            mysql_query("update center set 
            zubereitung = '$_POST[hinweise]'
            where code = '$_POST[rezept_code]'");
            
           
            // mysql_query("drop table $temp_tab_name_4");
            } // ende while
            } // ende if aendern

if ( $_SESSION['einlass'] == FALSE ) {echo "</table>
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