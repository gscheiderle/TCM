 1 <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
 2 <html>
 3 <head>
 4         <title>Checkboxen mit PHP auswerten</title>
 5 </head>
 6  
 7 <body>
 8  
 9 <form action="checkbox.php">
10 <input type="hidden" name="sent" value="yes">
11 <input type="text" name="auto"><br>
12 <input type="checkbox" name="ausstattung[]" value="Sumpfgaseinspritzung">&nbsp;Sumpfgaseinspritzung<br>
13 <input type="checkbox" name="ausstattung[]" value="drei Ersatzreifen">&nbsp;drei Ersatzreifen<br>
14 <input type="checkbox" name="ausstattung[]" value="Schminkspiegel im Kofferraum">&nbsp;Schminkspiegel im Kofferraum<br>
15 <input type="checkbox" name="ausstattung[]" value="Kniescheibenbelüftung">&nbsp;Kniescheibenbelüftung<br>
16 <input type="checkbox" name="ausstattung[]" value="James-Bond Paket">&nbsp;James-Bond Paket<br>
17 <input type="submit">
18 </form>
19  
20 <?php
21         $sent = $_GET['sent'];			//Weichensteller
22         $auto = $_GET['auto'];			//Autoname
23         $ausstattung = $_GET['ausstattung'];	//Inhalt der Checkboxen
24  
25         if ($sent == "yes") {
26                 $ausstattung_text = implode(,,$ausstattung);
27  
28                 echo "<h1>Ihr Wunschauto &quot;".$auto."&quot;:</h1>";
29                 echo "<p>Besondere Ausstattung:<br><br>".$ausstattung_text."</p>";
30         }
31 ?>
32  
33 </body>
34 </html>