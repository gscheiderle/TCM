<html>
<head>
</head>
<body>
<form action="" method="POST">
<?php 


include("../intern/myconnect.php");
include("../intern/funktionen.php");
include("../intern/funktionen_fuer_korrektur.php");

 // W. Kaiser
$mysql_version=trim(mysql_get_server_info());
if (substr($mysql_version,0,1)>'4')
   {
   //Disable "STRICT" mode for MySQL 5!
   mysql_query("SET SESSION sql_mode=''");
   // W. Kaiser
   }  



echo daten_felder(1);   


?>
 
 </form>
 </body>
 </html>