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

$rezept_creieren=mysql_query("create TABLE IF NOT EXISTS vergleich
(
ver_id int(10) NOT NULL auto_increment primary key,
zutat varchar(128)
)
");

$error=mysql_error();

if    ($error == false)
      {
print "Tabelle vergleich ist angelegt";
      }

else  {
print "Tabelle vergleich anlegen fehlgeschlagen!";
      }
?>
<input type="submit">
</form>
</body>
</html>





