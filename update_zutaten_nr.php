<?php 

include("intern/myconnect.php");
include("intern/funktionen.php");

// W. Kaiser
$mysql_version=trim(mysql_get_server_info());
if (substr($mysql_version,0,1)>'4')
   {
   //Disable "STRICT" mode for MySQL 5!
   mysql_query("SET SESSION sql_mode=''");
   // W. Kaiser
   } 
 $zaehler = 10;
 $select=mysql_query("select rez_id from rezepte order by rez_id ");
 while ( $result = mysql_fetch_array($select) ) {
 mysql_query("update rezepte set
 zutaten_nr = '$zaehler' where rez_id = '$result[rez_id]' ");
 
 $zaehler++;
 }
   
   
?>