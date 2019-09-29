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

$create_freischalten = mysql_query("CREATE TABLE freischalten(
frei_id int(10) auto_increment primary key,
user char(64)
)");

if    ($create_freischalten == TRUE)
      {
print "Tabelle freischalten ist angelegt";
      }

else  {
print "Tabelle freischalten anlegen fehlgeschlagen!";
      }
      

      
?>
<input type="submit">
</form>
</body>
</html>




