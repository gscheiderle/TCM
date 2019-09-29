<?php 
session_start();
include("myconnect.php");

$mysql_version=trim(mysql_get_server_info());
if (substr($mysql_version,0,1)>'4')
{
//Disable "STRICT" mode for MySQL 5!
mysql_query("SET SESSION sql_mode=''");
}
?>
<html>
<head>
<meta http-equiv="Content-Language" content="de">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<meta name="GENERATOR" content="Microsoft FrontPage 4.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<title>Bilder hochladen</title>
</head>
<body background="images/hintergrund.gif" topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0">
 <form action="" method="post" enctype="multipart/form-data">
<div align="center">
	<table border="0" width="600" id="table1" cellspacing="0" cellpadding="0" height="300" bgcolor="#b21619">
		<tr>
			<td valign="top">
 
<div align="center"><center>

  <table border="0" width="600" hight="300" bgcolor="" cellpadding="0" cellspacing="0">
    <tr>
      <td bgcolor="" align="center" height="50" valign="middle"><br>
      <font face="Arial" size="5" color="#000000"><b>
      Bilder zum Rezept<br>
      hochladen und beschreiben<br><br></td>
    </tr>
  
 <tr>
    <td bgcolor="" align="left">
    <font face="Arial" size="4" color="#000000"><b>Bild zum Upload auswählen:<br><br>
    <input type="file" name="bilddatei" &nbsp;&nbsp;value="durchsuchen"><br><br>
  </td>
  </tr>
<?php
$datum=date("Y-m-d H:i:s");
$int_datum=strtotime("$datum");
$_POST[bilddatei]=trim(strip_tags($_POST[bilddatei]));


$extlimit = "yes"; //Do you want to limit the extensions of files uploaded
$limitedext = array(".gif",".jpg",".png",".jpeg",".wbmp",
".GIF",".JPG",".PNG",".JPEG",".WBMP"); //Extensions you want files uploaded limited to.
$sizelimit = TRUE; //Do you want a size limit, yes or no?
$sizebytes = "3000000"; //size limit in bytes
if($_POST['senden'] == TRUE){
if (($sizelimit == TRUE) && ($_FILES[bilddatei][size] > $sizebytes)) {
echo "<font size=\"4\" color=\"#FFFFFF\"><b>Die Datei ist zu gross, sie darf maximal $sizebytes bytes sein.";
exit;
}// ende if_sizelimit
$dir_endung = stristr($_FILES[bilddatei][name],'.'); // Suffix ermitteln


//bildnamen für Vorschau zerlegen
$vorschau_name = strtok($_FILES[bilddatei][name],".");
//vorschaunamen erzeugen
$vorschau_endung=$dir_endung;
//Vorschau in jpg, gif und png wird automatisch angelegt
$datei_vorschau=$vorschau_name."_v".$vorschau_endung;
$datei_name=$_FILES[bilddatei][name];

$pictures=$_GET['rezept_code'];
if(!is_dir("Rezept_Galerie"))
{mkdir("Rezept_Galerie");}

if(!is_dir("Rezept_Galerie/$pictures"))
{mkdir("Rezept_Galerie/$pictures");}

if(!is_dir("Rezept_Galerie/$pictures/vorschau"))
{mkdir("Rezept_Galerie/$pictures/vorschau");}

$datei_speicher_ort="Rezept_Galerie/$pictures/$datei_name";
$vorschau_ort="Rezept_Galerie/$pictures/vorschau/$datei_vorschau";
$doppelkontrolle=0;
 
}//if($senden)
?>

  
  <tr>
  <td bgcolor="" align="left">
    <font face="Arial" size="4" color="#000000"><b>Beschreibung zum Bild:<br><br>
    <input type="text" size="90" name="bildbeschreibung"><br><br>
  </td>
</tr>

  <tr>
  <td bgcolor="" align="center">
    <br>
    <input type="submit" name="senden" value="Bild speichern"><br><br>
  </td>
</tr>
  

<?php     if (($_POST[updater_f] == TRUE) && ($nummerntausch_ist != FALSE))
              {
          echo " 
            <tr>
              <td valign=\"top\" align=\"center\" colspan=\"5\">
              <font face=\"Courier New\" color=\"#green\" size=\"%\"><b><br>
              <p>AKTION WURDE AUSGEFÜHRT</p>
              </td>
            </tr>
            ";}
?>


<?php  
$doppelkontrolle=0;             
if (($_POST[senden] == TRUE) && ($extlimit == "yes") && (!in_array($dir_endung,$limitedext))) 
{$fileexists="<tr><td bgcolor=\"#C0C0C0\" colspan=\"4\"><font color=\"red\"><b>Die Bilddatei hat nicht die richtige Endung.<br></td></tr>";exit;}

//falls im images Ordner der Name der Bilddatei schon existiert, dann soll eine Fehlermeldung kommen.
elseif ((@file_exists("Rezept_Galerie/$pictures/$datei_name")) && ($_POST[senden] == TRUE)) 
{echo "<tr><td bgcolor=\"#C0C0C0\" colspan=\"4\"><b><font color=\"red\">Die Datei existiert bereit. Bitte ändern Sie den Dateinamen und versuchen es nochmal.</b></font><br></td></tr>";
$doppelkontrolle=1;
exit;}
 
//ansonsten wird die Datei im Ordner images kopiert
if ($doppelkontrolle == 0){ 

$uploaddir = "Rezept_Galerie/$pictures/";
$uploadfile = $uploaddir.$datei_name;


if (move_uploaded_file($_FILES['bilddatei']['tmp_name'], $uploadfile)) {
    echo "<font color=\"#FFFFFF\"><b>
          <font face=\"Courier New\" color=\"#FFFFFF\" size=\"4\"><b>
              Das Bild ist OK und wurde ohne Probleme hochgeladen !
              ";
    // print "Here's some more debugging info:\n";
    // print_r($_FILES);
    }   

} // doppelkontroll
if ($_POST[senden] == TRUE){

////////////////////////////////////////////////////////////////////////////////////////////////
if(($dir_endung == ".jpg")||($dir_endung == ".JPG")){$dir_endung=".jpeg";}
$bild_endung=trim("$dir_endung",".");
$image_create_funktion="ImageCreateFrom".$bild_endung;

$image="Image".$bild_endung;

// Bild auf die gleiche Breite bringen
// neue Bild-Breite
$bg = $image_create_funktion("$uploadfile");
$img_width = imagesx($bg);
$img_height = imagesy($bg);

if($img_width > $img_height){
$width = 600;
$height = ($width/$img_width) * $img_height; // Passende Höhe berechnen
}

else{
$height = 420;
$width = ($height/$img_height) * $img_width; // Passende Breite berechnen
}

if(($width/$img_width) * $img_height > 420){
$height = 420;
$width = ($height/$img_height) * $img_width; // Passende Breite berechnen
}


$im = ImageCreateTrueColor($width,$height);  // Verkleinertes Bild erstellen

ImageAlphaBlending($im,false);
ImageCopyResampled($im, $bg, 0, 0, 0, 0, $width, $height, $img_width, $img_height);  // verkleinern

ImageDestroy($bg); // und das alte Bild aus dem Speicher entfernen
$image($im,"$uploadfile"); // neues Bild speichern.

///////////////////////////////////////////////////////////////////////////////////////////////////
$direndung=$dir_endung;
$vorschau_ort="Rezept_Galerie/$pictures/vorschau/$datei_vorschau";
// Vorschau von jpeg erzeugen und speichern
include("thumbnails.php");

////////////////////////////////////////////

} // ende if Post-senden             
           

$datei_speicher_ort="Rezept_Galerie/$pictures/$datei_name";

if ($_POST[senden] == TRUE){ // if_1

if($_POST[titel_bild] == '1'){
$loeschen_titel=mysql_query("update bildspeicher set
titelbild = '0' where titelbild = '1'");}
 
  $datei_doppel=mysql_query("select speicherort from bildspeicher where speicherort = '$datei_speicher_ort'");
  while($result_doppel=mysql_fetch_array($datei_doppel)){
  if($result_doppel[speicherort] != ""){
  echo "Die Datei ist schon vorhanden !";
  exit;}} 
 
  $neuebildnr=mysql_query("select max(bild_nr) as max_bild_nr from bildspeicher");
  $neue_bildnr=mysql_fetch_object($neuebildnr);
  $neue_bild_nr=$neue_bildnr->max_bild_nr; 
  $neue_bild_nr=$neue_bild_nr+1;
  
  $bild_speichern=mysql_query("insert into bildspeicher
  (
  bild_nr,
  datei_name,
  speicherort,
  vorschauort,
  bildbeschreibung,
  zeitstempel,
  autor
  )
  values
  (
  '$neue_bild_nr',
  '$_GET[rezept_code]',
  '$datei_speicher_ort',
  '$vorschau_ort',
  '$_POST[bildbeschreibung]',
  '$int_datum',
  '$_GET[autor]'
  )
  ");
 

 
 $in_ordner="";
 $dir_endung="";
 $bilddatei="";
 $datei_speicher_ort="";
   
} // ende if_1
?>
    
    </td></tr>
  </table>
  </center>
</div>
</form>
</body>

</html>
