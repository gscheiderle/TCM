<html>
<head>
<meta http-equiv="Content-Language" content="de">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<meta name="GENERATOR" content="weaverslave 4.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<title>Anmelden auf Gscheiderle.de</title>


</head>
    
    
<body topmargin="0"  bgcolor="#FFFFFF" link="#000000" vlink="#000000" alink="#000000">
    

 <?php include("seitenelemente/header.html"); ?>
    
<div class="nav">
<?php include("seitenelemente/navigation.php"); ?>
    </div>	
 <form name="Formular" action="" method="post">

    
echo "<div class='article_tip_auswahl'>";    
     
<div align="center"><center>

<table border="0" width="300" bgcolor="#FFFFFF">

    <tr>
      <td bgcolor="#FFFFFF" width="" height="19" align="center" valign="middle">
        <br>
        <font face="Courier" size="5" color="#000000"><b>Anmelden:</b><br>
        <font face="Courier" size="3" color="#000000">
      </td>
    </tr>
    </table>
  
  <div align="center">
  <table border="0" width="300" height="348" cellspacing="4" cellspadding="4" bgcolor="#FFFFFF">
    <tr>
      <td bgcolor="#FFFFFF" width="" height="19" align="center" valign="middle"><b>
      <font face="Courier" color="#000000">Nickname</font><br>
      <input type="text" name="nickname" value="<?php echo $_POST[nickname]; ?>" size="20"
                  style="color:#000000; background-color:#c0c0c0; border-width:1; border-color:#c0c0c0; border-style:;"><br><br>
      Passwort<br>
      <input type="password" name="password" value="" size="20"
                  style="color:#000000; background-color:#c0c0c0; border-width:1; border-color:#c0c0c0; border-style:;">
                  
      <?php 
      $_POST['nickname']=trim(strip_tags("$_POST[nickname]"));  
      $_POST['password']=trim(strip_tags("$_POST[password]"));
      $password = md5($_POST['password']); ?>
      <br><br><br>
                        <input type="submit" name="einloggen" value="anmelden" style="color:#FFFFFF; background-color:#000000; border-width:1; border-color:#c0c0c0; border-style:;">
                  </td>
      </td>
       </tr>


<?php if ($_POST['einloggen'] == TRUE)
{ // start if_einloggen  

$check_password=mysql_query("select * from passwords where nickname = '$_POST[nickname]' and
password = '$password'");
while ($che_ck = mysql_fetch_array($check_password)) 
{ // start while
$nickname_db=$che_ck['nickname'];
$password_db=$che_ck['password'];
} // ende while
if ($password_db == $password){

$einlass="du_darfst_rein";
$_SESSION['einlass']= $einlass;
$nickname = $_POST['nickname'];
$_SESSION['nickname'] = $nickname;
$_SESSION['password'] = $password;
} // ende password-abgleisch
else{$_SESSION['einlass']= "";}

} // ende if einloggen
?>

     <tr>
      <td bgcolor="#FFFFFF" width="100%" height="30" align="center" valign="middle">
      <font face="Courier" size="3" color="#000000">
      <?php if ($_SESSION['einlass'] == TRUE) { echo "Nach dem Aufruf einer x-beliebigen Seite<br>
      stehen Ihnen weitere Funktionen zur Verf&uuml;gung !"; }?>
      </td>
     </tr>
         <tr>
      <td width="100%" align="center" height="5" valign="middle" bgcolor="#b21619">
      <font face="Courier" size="3" color="#FFFFFF"><b>
<?php if ($_SESSION['einlass'] == TRUE) 
         { echo "Sie sind angemeldet !"; }
               
      if ( ( $_SESSION['einlass'] == FALSE ) && ( $_POST['einloggen'] == TRUE ) ) 
         { echo "Passwort und/oder Nickname sind falsch !"; 
      
      echo "<tr><td align=\"center\"> <font color=\"#000000\"><a target=\"popup\"onclick=\"window.open('','popup','width=320,height=420,scrollbars=no,toolbar=no,status=no,resizable=no,menubar=no,location=no,directories=no,top=10,left=10')\"href=\"password_lost.php\"><font face=\"Arial\" size=\"2\" color=\"#c0c0c0\">Pa&szlig;wort/Nickname vergessen?</a></font></td></tr>
";
      }       
      
      ?>
      
      </td>
    </tr>
 

 
</table>
    </div>
    </form>
  </body>
</html>
