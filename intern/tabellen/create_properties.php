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

$test = mysql_query("CREATE TABLE five_elements_properties(
prop_id int(10) NOT NULL auto_increment primary key,
element_prop varchar(64),
china varchar(64),
geschmack varchar(64),
color varchar(64),
form varchar(64),
wirkung varchar(64),
dynamic varchar(256),
organe varchar(64),
sinnes_organe varchar(64),
wahrnehmung varchar(64),
feeling varchar(64),
wandlungsphasen varchar(64),
toene varchar(64),
naehrungszyklus varchar(256),
schwaechungszyklus varchar(256),
kontrollzyklus varchar(256),
schaedigungszyklus varchar(256),
leer varchar(256)



)
");

$error=mysql_error();

if    ($error == false)
      {
print "Tabelle five_elements_properties ist angelegt";
      }

else  {
print "Tabelle five_elements_properties anlegen fehlgeschlagen!";
      }
?>
<input type="submit">
</form>
</body>
</html>





