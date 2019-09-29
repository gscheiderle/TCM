<?php 
session_start();
include("myconnect.php");

// W. Kaiser
$mysql_version=trim(mysql_get_server_info());
if (substr($mysql_version,0,1)>'4')
   {
   //Disable "STRICT" mode for MySQL 5!
   mysql_query("SET SESSION sql_mode=''");
   // W. Kaiser
   }
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
        <META HTTP-EQUIV="CONTENT-TYPE" CONTENT="text/html; charset=windows-1252">
        <TITLE>Hilfe</TITLE>
        <META NAME="GENERATOR" CONTENT="OpenOffice.org 3.2  (Win32)">
        <META NAME="AUTHOR" CONTENT="Uwe Sack">
        <META NAME="CREATED" CONTENT="2012, September">
        <META NAME="CHANGEDBY" CONTENT="Uwe Sack">
        <STYLE TYPE="text/css">
        <!--	a:hover	{color:;}
				a			{text-decoration:none;}
        //-->
        </STYLE>
</HEAD>
<BODY topmargin="30" leftmargin="10" bgcolor="#FFFFFF">
<form action="" method="POST">
<DIV align="left">


<font face="arial" size="3">

          <b>Schreibweise</b>
          <br><br>
          <font face="arial" size="2">
          Auf dieser Seite werden die Produkte nur erkannt, wenn sie exakt genau so geschrieben sind, wie in der Datenbank angelegt.<br>
          Das hat z.B. zur Folge:
          Sie schreiben in einem Eingabefeld den Begriff Fleisch.<br>
          Der wird nicht erkannt, weil er einfach zu ungenau ist.<br>
          Es gibt viele Sorten Fleisch.<br>
          Abhilfe schaffen Sie dadurch, indem Sie den Begriff Fleisch mit den nebenstehenden Taste veri_x verifizieren.<br>
          Sie erhalten alle Produkte mit dem Begriff Fleisch ausgeworfen.<br>
          Den passenden w&auml;hlen Sie aus.


</DIV>
</form>
</BODY>
</HTML>