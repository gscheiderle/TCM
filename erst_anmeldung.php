
<html>
<head>
<meta http-equiv="Content-Language" content="de">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<meta name="GENERATOR" content="Microsoft FrontPage 4.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<title>Kunden</title>
<style><!--	a:hover	{color:red;}
				a			{text-decoration:none;}
//--></style>
<title>Erst-Kontakt</title>
<base target="_self">

</head>

<onsubmit="winopen()">
<body link="#000000" vlink="#000000" alink="#000000" topmargin="30">
<form method="POST" action="">
<?php 

/* include("intern/myconnect.php");
include("intern/funktionen.php");
 */
  
//zufallszahl erzeugen
if (!(eregi("[a-z0-9]{32}", $zufall_id))){
srand ((double)microtime()*1000000);
$zufall_id = md5(uniqid(rand()));
}

?>

<div align="center">

  <table border="0" width="600" height="400" cellspacing="1" bgcolor="#FFFFFF">
    <tr>
      <td width="100%" align="center" valign="top" bgcolor="#FFFFFF"><b><font size="4"><br>
        Freischalt-Code, Nickname und Passwort:
        </font></b>
          <p>Freischalt-Code</p>
			    <p><input type="text" name="code" size="48" tabindex="1" value="<?php echo $_GET['code']; ?>"
          style="color:#000000; background-color:#c0c0c0; border-width:1; border-color:#c0c0c0; border-style:;"></p>
          <p>Nickname</p>	
          <p><input type="text" name="nickname" size="20" tabindex="1" value=""
          style="color:#000000; background-color:#c0c0c0; border-width:1; border-color:#c0c0c0; border-style:;">
          </p>
          <p>Passwort</p>
          <p><input type="password" name="password" size="20" tabindex="2" value=""
          style="color:#000000; background-color:#c0c0c0; border-width:1; border-color:#c0c0c0; border-style:;">
          &nbsp;</p>
          <p>Passwort wiederholen:</p>
          <p><input type="password" name="password_wieder" size="20" tabindex="2" value=""
          style="color:#000000; background-color:#c0c0c0; border-width:1; border-color:#c0c0c0; border-style:;">
          &nbsp;</p>
          <p><input type="submit" value="Anmelden" name="password_save"></p>
         <br><br>
         </td>
        </tr>
<?php 
$_POST['password_wieder']=trim(strip_tags($_POST['password_wieder']));
$_POST['nickname']=trim(strip_tags($_POST['nickname']));
$_POST['password']=trim(strip_tags($_POST['password']));
?>      
            <tr>
<td align="center" height="10px" bgcolor="#b21619"><font size="3" color="#000000">
<a href="index.htm"><FONT face="arial" size="4" color="#FFFFFF"><b><?php if ($_POST['password_save'] == TRUE) {if (fehler($_POST['password'],$_POST['password_wieder'],$_POST['nickname'],$_POST['code'],$_GET['code'],$schon_vorhanden) == TRUE){echo "EINLOGGEN";
$speichern_true=1;}
else {$speichern_true=FALSE;}
} ?></b></a></td>
        </tr>
        
        
       </table>


<?php

if ($_POST['password_save'] == TRUE) {

$vergleich=mysql_query("select password, nickname from passwords where password = '$_POST[password]' or 
nickname = '$_POST[nickname]'");
while ($result_vergleich = mysql_fetch_array($vergleich)) {
if (($result_vergleich['password'] == $_POST['password']) || ($result_vergleich['nickname'] == $_POST['nickname']))
   {$schon_vorhanden = 1;}
   
  
} // ende while 

//password-eingabe erwarten 
if ($speichern_true == TRUE){

$klartext=mysql_query("update klartext set
nickname = '$_POST[nickname]',
password = '$_POST[password]',
checker = ''
where checker = '$_GET[code]'");

$_POST['password']=md5($_POST['password']);
$password_update=mysql_query("update passwords set
nickname = '$_POST[nickname]',
password = '$_POST[password]',
zufall_id = ''
where zufall_id = '$_GET[code]'
");
} // ende fehler
} // ende if save ...
?>

      </center>
      </form>
    </div>
  </body>
</html>