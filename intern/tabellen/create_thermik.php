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

$test = mysql_query("CREATE TABLE five_elements_thermic(
th_id int(10) NOT NULL auto_increment primary key,
element varchar(64),
product varchar(64),
hot varchar(64),
warm varchar(64),
neutral varchar(64),
refreshing varchar(64),
cold varchar(64)

)
");

$error=mysql_error();

if    ($error == false)
      {
print "Tabelle five_elements_thermic ist angelegt";
      }

else  {
print "Tabelle five_elements_thermic anlegen fehlgeschlagen!";
      }
?>
<input type="submit">
</form>
</body>
</html>





