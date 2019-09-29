<?php 
include("myconnect.php");
include("funktionen.php");
include("css/boxen.css");
include("css/schriften.css");

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
        
</HEAD>
<BODY topmargin="30" leftmargin="10" bgcolor="#FFFFFF">
<form action="" method="POST">
<DIV align="left">


          <h2l><b>Schreibweise</b></h2l>
          <br><br>
          <font face="arial" size="2">
        <t1l>  Auf dieser Seite werden die Produkte nur erkannt, wenn sie exakt genau so geschrieben sind, wie in der Datenbank angelegt.<br>
          Das hat z.B. zur Folge:
          Sie schreiben in einem Eingabefeld den Begriff Fleisch.<br>
          Der wird nicht erkannt, weil er einfach zu ungenau ist.<br>
          Es gibt viele Sorten Fleisch.<br>
          Abhilfe schaffen Sie dadurch, indem Sie den Begriff Fleisch mit den nebenstehenden Taste veri_x verifizieren.<br>
          Sie erhalten alle Produkte mit dem Begriff Fleisch ausgeworfen.<br>
          Den passenden w&auml;hlen Sie per Klick aus.<br><br>
<h2l>1. Schritt:</h2l><br>

<t1l>
Anhand Ihres Rezeptes sch&auml;tzen sie die Zeilenanzahl.
Seien sie gro&szlig;z&uuml;gig (aber nicht &uuml;berm&auml;&szlig;ig, weil Sie sonst unn&ouml;tig "Scrollarbeit" verrichten m&uuml;ssen).<br>
Die Zeilen werden in 2 Spalten aufgelistet.<br>
<b>Wichtig ! Jede Abschnitt Ihres Rezepts (z.B. So&szlig;en, Beilagen etc.)  wird mit einem @ in einer separaten Zeile abgeschlossen.</b><br>
Sie k&ouml;nnen ein Rezept &uuml;ber zwei Spalten eintragen.<br>
Sie k&ouml;nnen aber auch mehrere Abschnitte in einer Spalte hintereinanderschreiben.<br><br>

In jedem Segment k&ouml;nnen Sie den Start des Kreises festlegen (das w&auml;re z.B. beim Braten eines Steaks die "hei&szlig;e Pfanne" (Feuer).<br>
Sie k&ouml;nnen den Kreis in das n&auml;chste Segment weiterf&uuml;hren (wenn m&ouml;glich und sinnvoll).<br><br>

Mengenangaben und Verarbeitungshinweise tragen Sie erst ein, wenn Sie sicher sind, alle Zutaten gelistet zu haben.<br>
Nach dem "Sortieren" werden evtl. fehlende Elemente festgestellt und Erg&auml;nzungen(1*) vorgeschlagen.
Sie w&auml;hlen aus den vorgeschlagenen Erg&auml;nzungen (1*), die f&uuml;r Sie passenden aus und klicken erneut "Sortieren".<br>
Diesen Vorganeg k&ouml;nnen Sie beliebig oft wiederholen, bis Ihnen das Ergebnis gef&auml;llt.<br>
"&Auml;nderungen eintragen" k&ouml;nnen Sie nur einmal klicken.<br>
 
Alle Einstellungen bleiben erhalten !:<br><br>

Gespeichert wird die Version, die nach dem "Erneut Sortieren" erscheint und mit einem Namen und einer Kategorie bezeichnet wurde (nur wenn man angemeldet ist).<br><br>

Jetzt wird Ihnen das Rezept so angezeigt, wie es auch gespeichert werden w&uuml;rde.<br>
Bis hierher k&ouml;nnen Sie die Vorg&auml;nge beliebig oft wiederholen bis Ihnen das Ergebnis zusagt, die Kreise geschlossen und die entsprechnenden Zutaten ausgew&auml;hlt sind.<br><br>

(1*) Vorgeschlagen werden nat&uuml;rlich nur die Zutaten, die bereits in der Datenbank gespeichert sind.<br>
Wenn Sie im Besitz von Quellen sind, die die Datenbank erweitern k&ouml;nnen, sind Sie herzlich eingeladen.<br><br>



</DIV>
</form>
</BODY>
</HTML>