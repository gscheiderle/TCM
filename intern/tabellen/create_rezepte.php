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

$rezept_creieren=mysql_query("create TABLE IF NOT EXISTS rezepte
(
rez_id int(10) NOT NULL auto_increment primary key,
code varchar(128),
element varchar(64),
product char(64),
number int(2),
anfang char(64),
menge char(64),
verarbeitung varchar(255),
tipps char(255)
)
");

$error=mysql_error();

if    ($error == false)
      {
print "Tabelle rezept_creieren ist angelegt";
      }

else  {
print "Tabelle rezept_creieren anlegen fehlgeschlagen!";
      }
?>
<input type="submit">
</form>
</body>
</html>





