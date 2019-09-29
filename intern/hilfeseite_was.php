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
<DIV align="left">
<font color="#000000" size="3" face="arial">
<b>Begriffe Suchen und Speichern !</b>
<br><br><br>
Das Suchen der Begriffe ist relativ komfortabel.<br>
Sie brauchen einen Begriff nicht ganz auszuschreiben und er wird doch gefunden.<br>
Oder auch nicht :-))
<br>und das erkl&auml;rt sich so:<br><br>
Sie suchen nach Bohnenkraut und tippen Bohnen.<br>
Es wird Ihnen alles mit Bohnen ausgegeben, auch Bohnenkraut.<br>

Versuchen Sie aber mit Bohnengraut, dann erzielen Sie kein Ergebnis.<br><br>

Sie werden h&ouml;flich gefragt, ob Sie den Begriff in der &uuml;blichen Schreibweise eingegeben haben.<br>
Sind Sie sich dessen sicher, speichern Sie den Begriff in unbeantwortete Fragen.<br><br>
Was Sie in unserem Beispiel geflissentlich nicht tun sollten.<br><br>

Irgendein/e kluge/r Zeitgenossin/e wird sich finden und die Datenbank weiter vervollst&auml;ndgen k&ouml;nnen.

</body>
</html>