<?php 

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
   
   
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
        <META HTTP-EQUIV="CONTENT-TYPE" CONTENT="text/html; charset=WINDOWS-1252">
        <TITLE>Rezept drucken</TITLE>
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
<BODY topmargin="10" leftmargin="20" bgcolor="#FFFFFF">
<form action="" method="POST">

<DIV align="center">
<TABLE WIDTH="800px" height="50" BORDER="0" BORDERCOLOR="#000000" CELLPADDING="5" CELLSPACING="5" bgcolor="#FFFFFF">
        <TR>
            <TD colspan="4" HEIGHT="20px" bgcolor="#FFFFFF" align="center">
                
                <font face="courier" size="5"><b>
                Rezept "<?php echo $_GET['name_gericht'];  ?>"
             </td>
         </tr>
              
<?php    


           $bilder_laden=mysql_query("select speicherort,bildbeschreibung from bildspeicher where datei_name = '$_GET[such_rezepte]' limit 1");
while ($name=mysql_fetch_array($bilder_laden)){
echo "<TR><td  align=\"center\" bgcolor=\"#ffffff\" colspan=\"4\"><img border=\"0\" src=\"../intern/$name[speicherort]\"><br><br>
<font color=\"#000000\" size=\"5\"><b>$name[bildbeschreibung]<br><br>
</td></tr>";
}



            $i=1;
            
            $waehl_rezept=mysql_query("select * from rezepte where code = '$_GET[such_rezepte]' order by zutaten_nr");
            while($result_wahl=mysql_fetch_array($waehl_rezept))
            { // start while waehl
            
             
            if ( $result_wahl['element'] != "&Uuml;berschrift" )
            {
            
            echo "
               <tr>
                 <td width=\"15%\" height=\"15px\" bgcolor=\"".bgcolor($result_wahl['element'])."\">$result_wahl[element]</td>
                 <td height=\"15px\" width=\"15%\" bgcolor=\"#ffffff\"> <font size=\"2\" color=\"#000000\" face=\"courier\">$result_wahl[menge]</td>
                 <td width=\"35%\" height=\"15px\" bgcolor=\"#FFFFFF\"><font size=\"2\" color=\"#000000\" face=\"courier\"><b>$result_wahl[product]</td>
                 <td height=\"15px\" width=\"35%\" bgcolor=\"#ffffff\"> <font size=\"2\" color=\"#000000\" face=\"courier\">$result_wahl[bearbeiten]</td>
               </tr>";
            
            }
            
           if ($result_wahl['element'] == "&Uuml;berschrift") 
           {
           echo "
             <tr>
                 <td colspan=\"4\" align=\"center\" ><t1l><b>&nbsp;</b></t11></td>
             </tr>
             <tr>    
                  <td colspan=\"4\" align=\"center\" bgcolor=\"#f0f0f0\"><t1l><b>$result_wahl[product]</b></t11></td>
                  
             </tr>";
           } // ende if Ueberschrift
            
            
            
            $i++;
            } // ende While waehl
            
            
            
           
           

            

?>

          <TR>
            <TD colspan="4" WIDTH="600" HEIGHT="20px" bgcolor="#FFFFFF" align="left">
            <?php 
            
            
            $zubereitung=mysql_query("select zubereitung from center where code = '$_GET[such_rezepte]'");
            while($result_zubereitung=mysql_fetch_array($zubereitung))
            {$text_zubereitung=$result_zubereitung['zubereitung'];}
            echo "<font  face=\"courier\">";
            echo "Zubereitung, Kniffe und Tips !";
            echo $text_zubereitung; ?>
             
             </td>
             </tr>
    


    
</table>

</DIV>
<P STYLE="margin-bottom: 0cm"><BR>
</P>
</form>
</BODY>
</HTML>