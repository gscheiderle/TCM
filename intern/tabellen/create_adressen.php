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

$test = mysql_db_query("$datenbank", "CREATE TABLE adressen(
kd_id int(10) auto_increment primary key,
checker varchar(255),
nickname varchar(255),
name varchar(255),
vorname varchar(255),
email varchar(255),
ip varchar(50)

)");

if    ($test == TRUE)
      {
print "Tabelle TCM_adressen ist angelegt";
      }

else  {
print "Tabelle TCM_adressen anlegen fehlgeschlagen!";
      }
      

      
?>
<input type="submit">
</form>
</body>
</html>




