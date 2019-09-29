<?php include("../intern/myconnect.php");
include("../intern/funktionen.php"); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
  <head>
    <title>New Document</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
  </head>
  <body bgcolor="#000000">
  
  
<DIV align="center">
<TABLE WIDTH="600" height="" BORDER="0" BORDERCOLOR="" CELLPADDING="0" CELLSPACING="0" bgcolor="#000000">
<?php 
$bilder_laden=mysql_query("select speicherort,bildbeschreibung from bildspeicher where datei_name = '$_GET[rezept_code]'");
while ($name=mysql_fetch_array($bilder_laden)){
echo "<TR><td  align=\"center\" bgcolor=\"#000000\"><img border=\"0\" src=\"$name[speicherort]\"><br><br>
<font color=\"#FFFFFF\" size=\"5\"><b>$name[bildbeschreibung]<br><br>
</td></tr>";
}

?>  
  </table>
  </body>
</html>