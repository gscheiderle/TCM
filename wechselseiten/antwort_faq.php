<?php 

include("../intern/myconnect.php");

 
?>
<html>
<head>
<meta http-equiv="Content-Language" content="de">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<meta name="GENERATOR" content="Microsoft FrontPage 4.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<title>ANTWORT</title>
<style><!--	a:hover	{color:red;}
a {text-decoration:none;}
//--></style>
<base target="_self">
</head>
<body topmargin="30"  bgcolor="#FFFFFF" link="#000000" vlink="#000000" alink="#000000">
 <form name="Formular" action="" method="POST">
 <?php 
$frage_select=mysql_query("select frage from tcm_faq where faq_nr = '$_GET[faq_nr]'");
while($frage=mysql_fetch_array($frage_select)){
$frage_db=$frage[frage];
} // ende while
?>
<div align="center"><center>

<table border="1" width="1200" bgcolor="#FFFFFF">
    <tr>
      <td bgcolor="#FFFFFF" width="" align="left" height="0" valign="middle" colspan="2" bgcolor="#000000"><b><font size="6">
      
      
      <br>
        </font></b></td>
    </tr>
    
            <tr>
      <td bgcolor="#FFFFFF" width="100%" align="center" height="5" valign="middle" colspan="2"></td>
    </tr>
  
   <tr>
      <td bgcolor="#FFFFFF" width="" height="19" align="center" valign="middle" colspan="2">
        <font face="times" size="4" color="#000000"><i><b><p>Die Frage:</p></b></i>
       </td>
    </tr>
    
    <tr>
      <td bgcolor="#FFFFFF" width="100%" valign="top" align="center">
   </table>
    <div align="center"><center>
    <table border="0" width="1200px" height="348" cellspacing="4" cellspadding="4" bgcolor="#FFFFFF">

    <tr>
      <td bgcolor="#FFFFFF" width="100%" height="19" align="left" valign="middle" colspan="2"><b>
      <font face="Courier" color="#000000">
      <?php echo $frage_db; ?></font></b>
      </td>
    </tr>

    
    <tr><td colspan="2"><br><br></td></tr>

    
     <tr>
      <td bgcolor="#FFFFFF" width="20%" height="19" align="right" valign="top"><b>
      <font face="Courier" color="#000000" size="4">Antwort</font></b></td>
      <td bgcolor="#FFFFFF" width="50%" height="19" valign="middle" align="left" bgcolor="#000000">
      <p><textarea rows="9" name="antwort_f" cols="30"><?php echo $_POST[antwort_f]; ?></textarea></p>
      </font></b></td>
    </tr>

     <tr><td bgcolor="#FFFFFF" colspan="2"><br></td></tr>
     
       
<?php 


// W. Kaiser
$mysql_version=trim(mysql_get_server_info());
if (substr($mysql_version,0,1)>'4')
{
 //Disable "STRICT" mode for MySQL 5!
 mysql_query("SET SESSION sql_mode=''");
}
// W. Kaiser

if ($_POST[speichern] == TRUE){

$faq_antwort = mysql_query("update tcm_faq set
antwort = '$_POST[antwort_f]'
where faq_nr = '$_GET[faq_nr]'");

if(mysql_error()) {
  echo "<p>Sorry, no connection! ", mysql_error(), "</p>\n";
  exit();
  }//  ende if error
    


// MAIL SENDEN  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$email_match='/[A-Z0-9.%_-]+@{1}[A-Z0-9._%-]+[.A-Z]+/i';
if ( ( $_POST['speichern']== TRUE ) && ( preg_match($email_match,$_POST['email_f']) ) ){

$empfaenger = "$_GET[email]";
$betreff = "lllllllllllllllllll FAQ lllllllllllllllllll";
$inhalt.= "
<div align=\"center\">
  <center>
  <table border=\"0\" width=\"600\">
    <tr>
      <td width=\"50%\" align=\"center\">
      </td>
    </tr>
    <tr>
      <td align=\"center\"><font face=\"Times\" size=\"4\" color=\"#FFFFFF\">
      <b>Ihre Frage:</b><br>
      $frage_db<br><br>
      <b>Die Antwort:</b><br>
      $_POST[antwort_f]<br><br>
      IHR TEAM VON TCM.DE
      <a href=\"http://www.prima-heusa.de/tcm/wechselseiten/antwort_faq.php?$_POST[email_f]&$neue_faq_nr\">Antwort</a>
      
      </td>
    </tr>

  </table>
  </center>
</div>
";

$header.='Content-type: text/html; charset=iso-8859-1' . "\r\n";
$header.='From: TCMe@prima-heusa.de' . "\r\n";
mail($empfaenger, $betreff, $inhalt, $header);


}
}// ende if start-senden
 ?> 
     <tr>
      <td bgcolor="#FFFFFF" width="100%" height="30" align="center" valign="middle" colspan="2" bgcolor="#000000">
      <input type="submit" value="Abschicken" name="speichern"><br>
      </td>
     </tr>
 
   </table>
  </center>
</div>
</td>
</tr>
 
    </td></tr>
    </tr>
    </table>

 

    </div>
    







    </form>
  </body>
</html>
