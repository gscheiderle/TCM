<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//DE">
<html>
  <head>
    <title>Petra Herz</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    
      <script src="../ckeditor/ckeditor.js"></script>
	    <script src="../ckeditor/samples/sample.js"></script>
	    <link href="../ckeditor/samples/sample.css" rel="stylesheet">
      <link href="../intern/css/schriften.css rel="stylesheet">
  </head>
  <body link="#FFFFFF" vlink="#FFFFFF" alink="#FFFFFF">
 
 <form action="" method="POST">
 
<input type="submit" name="speichern" > 
  
<?php  
/* include("intern/css/span.php");
include("intern/css/boxen.css"); 
include("intern/css/schriften.css"); 
include("intern/parameter.php"); */
include("myconnect.php");





if ($_POST['speichern'] == TRUE) {

$select=mysql_query("select th_id, kategorie, product from five_elements_thermic where th_id > '0' ");
while ( $result=mysql_fetch_array( $select ) ) {

echo $kategorie=htmlentities($result['kategorie']);
echo "&nbsp;&nbsp;_&nbsp;&nbsp;";
echo $product= htmlentities( $result['product']) ;

echo "<br>";


mysql_query("update five_elements_thermic set kategorie = '$kategorie', product = '$product' where th_id = '$result[th_id]' ");

}
}
/*

 $select=mysql_query("select kd_nr, name, vorname from adressen where kd_nr < '2000' ");
while ( $result=mysql_fetch_array( $select ) ) {
echo $name=htmlentities($result['name']);
echo "<br>";
echo $vorname=htmlentities($result['vorname']); 
echo "<br>";

mysql_query("update adressen set name = '$name', vorname = '$vorname' where kd_nr = '$result[kd_nr]' ");


 $select=mysql_query("select kd_nr, strasse, ort from adressen where kd_nr < '2000' ");
while ( $result=mysql_fetch_array( $select ) ) {
echo $strasse=htmlentities($result['strasse']);
echo "<br>";
echo $ort=htmlentities($result['ort']); 
echo "<br>";

mysql_query("update adressen set strasse = '$strasse', ort = '$ort' where kd_nr = '$result[kd_nr]' "); */



/*  $select=mysql_query("select kd_nr, strasse, ort from adressen where kd_nr >= '2000' ");
while ( $result=mysql_fetch_array( $select ) ) {
echo $strasse=htmlentities($result['strasse']);
echo "&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;";
echo $ort=htmlentities($result['ort']); 
echo "<br>";

mysql_query("update adressen set strasse = '$strasse', ort = '$ort' where kd_nr = '$result[kd_nr]' ");
 */

/*  $select=mysql_query("select zw_id, name, vorname, strasse, ort from zwischentabelle ");
while ( $result=mysql_fetch_array( $select ) ) {
echo $name=htmlentities($result['name']);
echo "&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;";
echo $vorname=htmlentities($result['vorname']);
echo "&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;";
echo $strasse=htmlentities($result['strasse']);
echo "&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;";
echo $ort=htmlentities($result['ort']); 
echo "<br>";

mysql_query("update zwischentabelle set name = $name, vorname = $vorname, strasse = '$strasse', ort = '$ort' where zw_id = '$result[zw_id]' "); */



/* $select=mysql_query("select kd_nr, kontakt_art from adressen where kd_nr >= '2000' ");
while ( $result=mysql_fetch_array( $select ) ) {
echo $kontakt=htmlentities($result['kontakt_art']);
echo "<br>";

mysql_query("update adressen set kontakt_art = '$kontakt' where kd_nr = '$result[kd_nr]' ");

 */
 
/*  $select=mysql_query("select termin_id, ort, thema, text_fuer_buchung from termine ");
while ( $result=mysql_fetch_array( $select ) ) {
echo $ort=htmlentities($result['ort']);
echo $thema=htmlentities($result['thema']);
echo $text_fuer_buchung=htmlentities($result['text_fuer_buchung']);
echo "<br>";

mysql_query("update termine set ort = '$ort', thema = '$thema', text_fuer_buchung = '$text_fuer_buchung' where termin_id = '$result[termin_id]' "); */



/*  $select=mysql_query("select re_id, artikel from rechnungen ");
while ( $result=mysql_fetch_array( $select ) ) {
echo $artikel=htmlentities($result['artikel']);
echo "<br>";

mysql_query("update rechnungen set artikel = '$artikel' where re_id = '$result[re_id]' ");

 */
 
 
 
/* $select=mysql_query("select kd_id, email from adressen ");
while ( $result=mysql_fetch_array( $select ) ) {
echo $artikel=$result['email'];
echo "<br>";

mysql_query("update adressen set email_reserve = '$result[email]' where kd_id = '$result[kd_id]' ");

 */
 
// }
// }

?>
  
  </form>
  </bod<>
  </html>