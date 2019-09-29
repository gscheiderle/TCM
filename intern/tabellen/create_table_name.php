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

$test = mysql_db_query("$datenbank", "CREATE TABLE table_name(
table_id int(10) auto_increment primary key,
tablename varchar(255),
tablename_2 varchar(255),
tablename_3 varchar(255),
tablename_4 varchar(255),
zeitstempel int (14)

)");

if    ($test == TRUE)
      {
print "Tabelle TCM_table_name ist angelegt";
      }

else  {
print "Tabelle TCM_table_name anlegen fehlgeschlagen!";
      }
      

      
?>
<input type="submit">
</form>
</body>
</html>




