<?php 

include("intern/myconnect.php");
include("intern/funktionen.php");

 
      $mysql_version=trim(mysql_get_server_info());
      if (substr($mysql_version,0,1)>'4')
      {
          //Disable "STRICT" mode for MySQL 5!
          mysql_query("SET SESSION sql_mode=''");
      }
  ?>

      
&nbsp;<html>
<head>
<meta http-equiv="Content-Language" content="de">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<meta name="GENERATOR" content="weaverslave 4.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<title>Passwort vergessen</title>
<style><!--	a:hover	{color:red;}
a {text-decoration:none;}
//--></style>

</head>
<body topmargin="0"  bgcolor="#FFFFFF" link="#000000" vlink="#000000" alink="#000000">
 <form name="Formular" action="" method="post">
<div align="center"><center>

<table border="0" width="300" bgcolor="#FFFFFF">

    <tr>
      <td bgcolor="#FFFFFF" width="" height="19" align="center" valign="middle">
        <br>
        <font face="Courier" size="3" color="#000000"><b>Sie haben Ihr Passwort<br>
        vergessen ?</b></font><br>
        <font face="Courier" size="3" color="#000000">
      </td>
    </tr>
</table>
  
<div align="center"><center>
  <table border="0" width="300" height="348" cellspacing="4" cellspadding="4" bgcolor="#FFFFFF">
    <tr>
      <td bgcolor="#FFFFFF" width="" height="19" align="center" valign="middle"><b>
      <font face="Courier" color="#000000" size="2">eMail_Adresse, mit der Sie auf dieser Seite<br>
      angemeldet sind, hier eingeben.<br><br>
      <input type="text" name="password_email" value="<?php echo $_POST[password_email]; ?>" size="35" 
      style="color:#000000; background-color:#c0c0c0; border-width:1; border-color:#c0c0c0; border-style:;"><br><br>
      <br> 
      Wir senden Ihnen umgehend<br>
      Ihr Passwort an diese Adresse.</font><br><br>
      <input type="submit" name="senden" value="eMail senden" style="color:#FFFFFF; background-color:#000000; border-width:1; border-color:#c0c0c0; border-style:;">
     
     </td>
    </tr>


<?php if ($_POST['senden'] == TRUE)
{ // start if_senden 


$_POST['password_email']=trim(strip_tags("$_POST[password_email]"));
  

$check_email=mysql_query("select nickname, password from klartext where email = '$_POST[password_email]'");
while ($che_ck = mysql_fetch_array($check_email)) 
{ // start while
$nickname_db=$che_ck['nickname'];
$password_db=$che_ck['password'];
} // ende while

$empfaenger = "$_POST[password_email]";
$betreff = "Ihr Passwor von TCM, 
Kochen im Kreis";
$inhalt.= "
<div align=\"center\">
  <center>
  <table border=\"0\" width=\"600\">

    <tr>
      <td align=\"center\"><font face=\"Times\" size=\"4\" color=\"#000000\">
      Ihr Passwort und Nickname auf TCM:
      <br><br><i>
      Nickname:&nbsp;$nickname_db<br>
      Passwort:&nbsp;$password_db<br>
      
      


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
 }        

if ($bestaet == TRUE) { echo "
    <tr>
      <td bgcolor=\"#FFFFFF\" width=\"\" height=\"19\" align=\"center\" valign=\"middle\">
      Wir haben Ihr Passwort versandt !
      </td></tr>";}

?>
      

      </table>
    </div>
    </form>
  </body>
</html>
