<?php
    include ("../myconnect.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<title>tabelle aressen</title>
</head>
<body>
<form action="" method="POST">
<?php

$test = mysql_db_query("$datenbank", "CREATE TABLE klartext(
klar_id int(10) auto_increment primary key,
checker varchar(255),
nickname varchar(255),
password varchar(255),
email varchar(255)

)");

if    ($test == TRUE)
      {
print "Tabelle TCM_klartext ist angelegt";
      }

else  {
print "Tabelle TCM_klartext anlegen fehlgeschlagen!";
      }
      

      
?>
<input type="submit">
</form>
</body>
</html>




