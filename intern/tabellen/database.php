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
<?php

$rezept_creieren=mysql_query("create TABLE IF NOT EXISTS center
(
center_id int(10) NOT NULL auto_increment primary key,
verfasser varchar(128),
kategorie varchar(64),
name varchar(128),
code varchar (128)
)
");

$error=mysql_error();

if    ($error == false)
      {
print "Tabelle center ist angelegt";
      }

else  {
print "Tabelle center anlegen fehlgeschlagen!";
      }
?>
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
      
      $create_contact=mysql_query("create table tcm_faq
(
faq_id int(6) not null auto_increment primary key,
faq_nr int(6),
nickname char(56),
email char(56),
frage varchar(1024),
antwort varchar(1024)
)
");
?>
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
<?php

$password = mysql_db_query("$datenbank", "CREATE TABLE passwords(
pas_id int(10) auto_increment primary key,
nickname char(64),
password char(64),
zufall_id char(64),
sessionid varchar(64)

)");

if    ($password == TRUE)
      {
print "Tabelle Passwords ist angelegt";
      }

else  {
print "Tabelle Passwords anlegen fehlgeschlagen!";
      }
      

      
?>
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





