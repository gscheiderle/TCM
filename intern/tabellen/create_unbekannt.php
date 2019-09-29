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

$test = mysql_query("CREATE TABLE unbekannt(
un_id int(10) NOT NULL auto_increment primary key,
begriff varchar(64)
)
");

$error=mysql_error();

if    ($error == false)
      {
print "Tabelle unbekannt ist angelegt";
      }

else  {
print "Tabelle unbekannt anlegen fehlgeschlagen!";
      }
?>
<input type="submit">
</form>
</body>
</html>





