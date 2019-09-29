
<?php 

$verweildauer=$aelter_24_std-43200;

$tabellen_loeschen=mysql_query("select * from table_name where zeitstempel < '$verweildauer'");
while ($name=mysql_fetch_array($tabellen_loeschen)){
mysql_query("drop table if exists $name[tablename]");
mysql_query("drop table if exists $name[tablename_2]");
mysql_query("drop table if exists $name[tablename_3]");
mysql_query("drop table if exists $name[tablename_4]");
}
mysql_query("delete from table_name where zeitstempel < '$verweildauer'");  

?>  
  
<DIV align="center">
<TABLE WIDTH="1200" height="400" BORDER="0" BORDERCOLOR="" CELLPADDING="20" CELLSPACING="5" bgcolor="" style="opacity: 1">

        
       <TR>
        <td align="left" valign="top" bgcolor="#FFFFFF">
        <font face="times" size="4">
        <p><b><h1l>Was will diese Website ?</h1l></b></p>
        <br><h2l>
        Zum Thema TCM finden Sie unz&auml;hlige Seiten im Web.<br>
        Was k&ouml;nnen wir Ihnen da noch Zus&auml;tzliches bieten?<br><br>
        
        Nun, wir gehen davon aus, da&szlig; Sie sich grunds&auml;tzlich 
        f&uuml;r eine gesunde Ern&auml;hrung interessieren und besonderen 
        Wert darauf legen, jedoch auf Ihre bekannten und 
        durchaus bew&auml;hrten Rezepte nicht verzichten m&ouml;chten.<br>
        Die Funktion "Rezepte im Kreis ordnen" hilft Ihnen 
        auf relativ einfache Weise diese Rezepte nach den Regeln 
        und Zuordnungen der TCM neu zu gestalten.<br><br>
        
        So vielf&auml;ltig die Rezepte, so vielf&auml;ltig die M&ouml;glichkeiten.<br>
        Probieren Sie es einfach aus und spielen Sie ein wenig mit 
        den M&ouml;glichkeiten der Sortierung, 
        bis Ihnen das Ergebnis zusagt.<br><br>
        
        Lesen Sie auf jeden Fall die Hilfeseite zu diesem Thema. Es ist nicht soooo kompliziert aber ein paar Dinge mu&szlig; man einfach vorab wissen.<br>
        </h2l>
      
        </td>
      </tr>
      
       <TR>
        <td align="left" valign="top" bgcolor="">
      </td>
      </tr>
    </table>
