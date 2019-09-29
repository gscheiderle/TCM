<?php 
session_start();
 include("myconnect.php");
/*include("parameter.php"); */

$loeschen=mysql_query("select * from bildspeicher");
while ($loesch=mysql_fetch_array($loeschen))
{unlink("$loesch[vorschauort]");
unlink("$loesch[speicherort]");
rmdir("Rezept_Galerie/$loesch[datei_name]/vorschau");
rmdir("Rezept_Galerie/$loesch[datei_name]");
}

/* 
unlink("privat/pictures/7354a3df/verkauf/Objekt_Nr_1/vorschau/esszimmer_v.jpg");
unlink("privat/pictures/7354a3df/verkauf/Objekt_Nr_1/esszimmer.jpg");  

rmdir("privat/pictures/47545388/vermietung/Objekt_Nr_50009/vorschau");
rmdir("privat/pictures/47545388/vermietung/Objekt_Nr_50009");

rmdir("privat/pictures/47545388/vermietung/Objekt_Nr_/vorschau");
rmdir("privat/pictures/47545388/vermietung/Objekt_Nr_");

rmdir("privat/pictures/47545388/vermietung/Objekt_Nr_50003/vorschau");
rmdir("privat/pictures/47545388/vermietung/Objekt_Nr_50003");
rmdir("privat/pictures/47545388/vermietung");

rmdir("privat/pictures/47545388/verkauf/Objekt_Nr_10040/vorschau");
rmdir("privat/pictures/47545388/verkauf/Objekt_Nr_10040");

rmdir("privat/pictures/47545388/verkauf/Objekt_Nr_10039/vorschau");
rmdir("privat/pictures/47545388/verkauf/Objekt_Nr_10039");

rmdir("privat/pictures/47545388/verkauf/Objekt_Nr_10038/vorschau");
rmdir("privat/pictures/47545388/verkauf/Objekt_Nr_10038");

rmdir("privat/pictures/47545388/verkauf");
rmdir("privat/pictures/47545388"); */





?>