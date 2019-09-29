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

$speichern = mysql_query("CREATE TABLE bildspeicher(
logo_id int(10) NOT NULL auto_increment primary key,
bild_nr int(5),
datei_name varchar(255),
speicherort varchar(255),
vorschauort varchar(255),
bildbeschreibung varchar(255),
zeitstempel int(14),
autor varchar(255)
)ENGINE=MyISAM;
");

if    ($speichern == TRUE)
      {
print "Tabelle bildspeicher ist angelegt";
      }

else  {
print "Tabelle bildspeicher anlegen fehlgeschlagen!";
      }
?>
<input type="submit">
</form>
</body>
</html>



