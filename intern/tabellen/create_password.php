<?php
    include ("../myconnect.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<title>Neues Dokument</title>
</head>
<body>
<form action="" method="POST">
<?php

$password = mysql_db_query("$datenbank", "CREATE TABLE passwords(
pas_id int(10) auto_increment primary key,
nickname char(64),
password char(64),
zufall_id char(64),
sessionid varchar(64)

)");

if    ($password == TRUE)
      {
print "Tabelle Passwords ist angelegt";
      }

else  {
print "Tabelle Passwords anlegen fehlgeschlagen!";
      }
      

      
?>
<input type="submit">
</form>
</body>
</html>




