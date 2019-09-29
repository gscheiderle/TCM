<?php 

include("intern/myconnect.php");
include("intern/funktionen.php");

 
      $mysql_version=trim(mysql_get_server_info());
      if (substr($mysql_version,0,1)>'4')
      {
          //Disable "STRICT" mode for MySQL 5!
          mysql_query("SET SESSION sql_mode=''");
      }
      
$sicherheits_codes=Array(
0=>"urapzh.jpg",
1=>"qc5dsp.jpg",
2=>"c4ruep.jpg",
3=>"azsn5q.jpg",
4=>"aqnuds.jpg",
5=>"3n98ey.jpg"
);

$rand_keys = array_rand($sicherheits_codes,2);
$codes= $sicherheits_codes[$rand_keys[1]];   

$code_abgleich = substr($codes,0,-4); // Ab PHP 5.3.0

     
?>

      
&nbsp;<html>
<head>
<meta http-equiv="Content-Language" content="de">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<meta name="GENERATOR" content="weaverslave 4.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<title>Kunden anlegen</title>
<style><!--	a:hover	{color:red;}
a {text-decoration:none;}
//--></style>
<script type="text/javascript">
<!--
function chkFormular()
{
 if(document.Formular.firma_f.value == "")  {
   alert("Bitte Firmen-Name eingeben!");
   document.Formular.firma_f.focus();
   return false;
  }    
 if(document.Formular.email_f.value == "") {
   alert("eMail-Adresse ist ein Mußfeld !");
   document.Formular.email_f.focus();
   return false;
  }
}
//-->
</script>

</head>
<body topmargin="0"  bgcolor="#FFFFFF" link="#000000" vlink="#000000" alink="#000000">
 <form name="Formular" action="" method="post" onSubmit="return chkFormular()>
<div align="center"><center>
<input type="hidden" value="<?php echo $code_abgleich; ?>" name="codeabgleich">
<table border="0" width="600" bgcolor="#FFFFFF">

    <tr>
      <td bgcolor="#FFFFFF" width="" height="19" align="center" valign="middle">
        <br>
        <font face="Courier" size="5" color="#000000"><b>Unser erster Kontakt:</b><br>
        <font face="Courier" size="3" color="#000000">Hier geben Sie bitte Ihren echten Namen an.<br>
        Ansonsten verwenden Sie auf der website Ihren nickname.
      </td>
    </tr>


    <tr>
        <td bgcolor="#FFFFFF" width="50%" height="19" align="center" valign="middle"><b>
        <font face="Courier New" color="#000000" size="2"><b><br><br>

        </td>
    </tr>  
      
  </table>
  
  <div align="center"><center>
  <table border="0" width="800" height="348" cellspacing="4" cellspadding="4" bgcolor="#FFFFFF">
  
      <tr>
      <td bgcolor="#FFFFFF" width="" height="19" align="center" valign="middle"><b>
      <font face="Courier" color="#000000"><img border="0" src="images/codes/<?php echo $codes; ?>" width="150" height="39">
      Sicherheits-Code lautet: <input type="text" name="bild_code" value="" size="15" tabindex="1"
      style="color:#000000; background-color:#c0c0c0; border-width:1; border-color:#c0c0c0; border-style:;">
      
      </td>
    </tr>
  
  
    <tr>
      <td bgcolor="#FFFFFF" width="" height="19" align="center" valign="middle"><b>
      <font face="Courier" color="#000000">Name</font>&nbsp;
      <input type="text" name="name_f" value="" size="40" tabindex="2"
      style="color:#000000; background-color:#c0c0c0; border-width:1; border-color:#c0c0c0; border-style:;">&nbsp;&nbsp;&nbsp;
      Vorname&nbsp;
      <input type="text" name="vorname_f" value="" size="40" tabindex="3"
      style="color:#000000; background-color:#c0c0c0; border-width:1; border-color:#c0c0c0; border-style:;">
      
      </td>
    </tr>


    <tr>
      <td bgcolor="#FFFFFF" width="" height="19" align="center" valign="middle"><b>
      <font face="Courier" color="#000000">eMail</font></b><br>
      <input type="text" name="email_f" size="40" tabindex="4" value=""
      style="color:#000000; background-color:#c0c0c0; border-width:1; border-color:#c0c0c0; border-style:;"></td>
    </tr>

     <tr>
      <td bgcolor="#FFFFFF" width="100%" height="30" align="center" valign="middle">
      <input type="submit" value="Senden" name="speichern"
      style="color:#000000; background-color:#c0c0c0; border-width:1; border-color:#c0c0c0; border-style:;"><br><br>
              <font face="Courier" size="3" color="#000000">Sie erhalten umgehend eine eMail mit dem Zugang zum ersten Einloggen.<br>
              Dort vergeben Sie sich nickname und password f&uuml;r diese website.<br>
      </td>
     </tr>

 <?php 
 


 
 
 
 
$_POST['bild_code']=trim(strip_tags($_POST['bild_code']));
$_POST['name_f']=trim(strip_tags($_POST['name_f']));
$_POST['vorname_f']=trim(strip_tags($_POST['vorname_f']));
$_POST['email_f']=trim(strip_tags($_POST['email_f']));

 
if ($_POST['speichern']== TRUE){

if ($_POST['codeabgleich'] == $_POST['bild_code']) { 

$email_match='/[A-Z0-9.%_-]+@{1}[A-Z0-9._%-]+[.A-Z]+/i';
if (!preg_match($email_match,$_POST[email_f])){
echo "<tr><td colspan=\"2\" align=\"center\"><font color=\"#000000\" size=\"4\"><b>Diese eMail-Adresse ist ungültig !<br><br>
<a href=\"erst_kontakt.php\"><font size=\"3\">Weiter</a></td><tr>";
exit;}     
  
//zufallszahl erzeugen
if (!(preg_match("/^[a-z0-9]{32}/", $code))){
srand ((double)microtime()*1000000);
$code = md5(uniqid(rand()));}

// email vergleich
$email_vorhanden=mysql_query("select email from adressen where email = '$_POST[email_f]'");
while ($email_result=mysql_fetch_array($email_vorhanden))
{ // start while eMail-Check
if($email_result['email'] != "")
{echo "<tr><td align=\"center\" bgcolor=\"red\" height=\"20px\"><font size=\"4\" face=\"Arial\" color=\"#FFFFFF\"><b>Diese Adress-Kombination wird nicht akzeptiert !</td><tr>"; exit;}
} // ende while eMail_check


$adresse_speichern=mysql_query("insert into adressen (checker, name, vorname, email,ip) values ('$code','$_POST[name_f]','$_POST[vorname_f]','$_POST[email_f]','$_SERVER[REMOTE_ADDR]')");

$klartext_speichern=mysql_query("insert into klartext (checker,email) values ('$code','$_POST[email_f]')");

$code_speichern=mysql_query("insert into passwords (zufall_id) values ('$code')");
 }
 
 
// MAIL SENDEN  ///////////////////////////////////////////////////////////////////////////////////////////////////////////////

if ($_POST[speichern]== TRUE) {

$empfaenger = "$_POST[email_f]";
$betreff = "Bestaetigung per eMail von TCM, 
Kochen im Kreis";
$inhalt.= "
<div align=\"center\">
  <center>
  <table border=\"0\" width=\"600\">

    <tr>
      <td align=\"center\"><font face=\"Times\" size=\"4\" color=\"#000000\">
      Folgen Sie diesem Link:
      <br><br><i>";
$inhalt.= "www.prima-heusa.de/tcm/erst_anmeldung.php?code=$code"; 
   
$inhalt.= "<br><br>
Funktioniert nicht in allen eMail-Programmen: dann kopieren Sie den Link<br>
      und f&uuml;gen ihn in die Adress-Leiste Ihres Internet-Browsers ein.<br><br>

      </i>IHR TCM-Team
      <br><br>
      </td>
    </tr>

  </table>
  </center>
</div>
";

$header.='Content-type: text/html; charset=iso-8859-1' . "\r\n";
// $header.='Content-Transfer-Encoding: 8bit' . "\r\n"; 
$header.='From: TCM@prima-heusa.de' . "\r\n";
$header.='Reply-To:u.sack@variusmedien.de' . "\r\n";  

$bestaet=mail($empfaenger, $betreff, $inhalt, $header);

} // ende Sicherheitscode
                                                  
} // if freischalten == TRUE wird die mail geendet


?>
         <tr>
      <td width="100%" align="center" height="5" valign="middle" bgcolor="#b21619"><font face="arial" size="4" color="#FFFFFF"<?php if ($bestaet == TRUE) {echo "Mail wurde gesendet !";} ?></td>
    </tr>
 
</table>
    </div>
    </form>
  </body>
</html>
