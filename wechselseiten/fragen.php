<?php 
session_start();
include("intern/myconnect.php");


$mysql_version=trim(mysql_get_server_info());
if (substr($mysql_version,0,1)>'4')
{
 //Disable "STRICT" mode for MySQL 5!
 mysql_query("SET SESSION sql_mode=''");
}
$antwort=mysql_query("select faq_nr, betreff, frage from tcm_faq group by betreff");
while($result_antwort=mysql_fetch_array($antwort))
{ 
$faq_antwort.="<option>".$result_antwort[betreff]."</option>";
$antworten="";
} // ende while

?>
<html>
<head>
<meta http-equiv="Content-Language" content="de">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<meta name="GENERATOR" content="Microsoft FrontPage 4.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<title>FAQ</title>
<style><!--	a:hover	{color:red;}
a {text-decoration:none;}
//--></style>
<script type="text/javascript">
<!--
function chkFormular()
{
 if(document.Formular.firma_f.value == "")  {
   alert("Bitte Nickname eingeben!");
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
<base target="_self">
</head>
<body topmargin="20"  bgcolor="#FFFFFF" link="#000000" vlink="#000000" alink="#000000">
 <form name="Formular" action="" method="post" onSubmit="return chkFormular()>
<div align="center"><center>

<table border="0" width="1200px" bgcolor="#FFFFFF">
    
  
   <tr>
      <td bgcolor="" width="" height="19" align="center" valign="middle" colspan="2">
        <font face="Arial" size="5" color="#000000"><p><b><h3c>Ihre Frage(n) an uns:</h2c></p></b>
       </td>
    </tr>
</table>


  <div align="center"><center>
  <table border="0" width="1200px" height="300" cellspacing="4" cellspadding="4" bgcolor="#FFFFFF">

    <tr>
      <td bgcolor="" width="40%" height="19" align="right" valign="middle"><b>
      <font face="Courier" color="#000000">Nickname</font></b></td>
      
      <td bgcolor="" width="60%" height="19" valign="middle" align="left"><input type="text" 
      name="nickname_f" value="<?php echo strip_tags($_POST[nickname_f]); ?>" size="42" tabindex="1"></td>
</tr>
<tr>

      <td bgcolor="" width="40%" height="19" align="right" valign="middle"><b>
      <font face="Courier" color="#000000">eMail</font></b></td>
      
      <td bgcolor="" width="50%" height="19" valign="middle" align="left" bgcolor="#000000">
      <input type="text" name="email_f" size="42" tabindex="7" value="<?php echo strip_tags($_POST[email_f]); ?>"></td>
 </tr>
<tr>  
    
    <?php     
    $email_match='/[A-Z0-9.%_-]+@{1,1}[A-Z0-9_%-]+.{1,1}[A-Z]+/i';
if  ((!(preg_match($email_match,$_POST[email_f]))) && ($_POST[speichern] == TRUE)){
    echo 
    " 
    <tr>
      <td bgcolor=\"\" width=\"40%\" height=\"19\" align=\"right\" valign=\"middle\" colspan=\"4\"><b>
      <font face=\"Courier\" color=\"red\">eMail-Adresse ung&uuml;ltig !</font></b></td>
    </tr>    
    ";
    exit;
    }
    ?>
<tr>
      <td bgcolor="" width="40%" height="19" align="right" valign="top"><b>
      <font face="Courier" color="#000000">Stichwort:</font></b></td>
      
      <td bgcolor="" width="60%" height="19" valign="top" align="left" bgcolor="#000000">
      <input type="text" name="betreff_f" size="42" tabindex="7" value="<?php echo strip_tags($_POST[betreff_f]); ?>"></td>
</tr>
<tr>
      
      
      <td bgcolor="" width="40%" height="19" align="right" valign="top"><b>
      <font face="Courier" color="#000000">Nachricht</font></b></td>
      
      <td bgcolor="" width="50%" height="19" valign="middle" align="left" bgcolor="#000000">
      <p><textarea rows="8" name="frage_f" cols="55"><?php echo strip_tags($_POST[frage_f]); ?></textarea></p>
      </font></b>
      <input type="submit" value="Frage senden" name="speichern" style="width: 150px; height: 35px; color:#000000; font-size: 16px; background-color: #d9d9d9; border-width: 1px; border-color: #c0c0c0; border-left-color: #c0c0c0; border-top-color: #c0c0c0; border-style: solid;
border-radius: 5px 5px 5px 5px;">
      </td>
     </tr>

     <tr>
      <td bgcolor="" colspan="4" align="center">
      <font face="Courier" size="5" color="#000000"><b><p><h3c>bekannte Antworten nach Stichwort:</h3c></p></font>
      <select name="antworten_f" style="width: 150px; height: 35px; color:#000000; font-size: 16px; background-color: #d9d9d9; border-width: 1px; border-color: #c0c0c0; border-left-color: #c0c0c0; border-top-color: #c0c0c0; border-style: solid;
border-radius: 5px 5px 5px 5px;">
      <option>Stichwort w&auml;hlen</option>
      <?php echo $faq_antwort; ?>
      </select>&nbsp;<input type="submit" name="antwort_suche" value="finde" style="width: 150px; height: 35px; color:#000000; font-size: 16px; background-color: orange; border-width: 1px; border-color: #c0c0c0; border-left-color: #c0c0c0; border-top-color: #c0c0c0; border-style: solid;
border-radius: 5px 5px 5px 5px;">
      <br>
     </td>
     </tr>
     
    <tr>
    <!-- Tabelle in der Zeile //-->
    <td colspan="4">
    

      <?php 
      
      
      if ($_POST[antwort_suche] == "finde"){
      
      echo "<table width=\"780\" cellpadding=\"5\">
      <td  width=\"15%\" height=\"30\" align=\"left\" valign=\"middle\" bgcolor=\"\">&nbsp;</td>
      <td  width=\"70%\" height=\"30\" align=\"left\" valign=\"middle\" bgcolor=\"#FFFFFF\">
      <font face=\"Courier\" color=\"#000000\" size=\"3\">";
      
      echo "Stichwort \"".$_POST[antworten_f]."\":<br><br>";
      $stichwort=mysql_query("select frage, antwort from tcm_faq where betreff = '$_POST[antworten_f]'");
      while($result_finden=mysql_fetch_array($stichwort)){
      echo "<font face=\"Arial\" size=\"3\" color=\"#000000\"><b>Frage: $result_finden[frage]</b><br>";
      echo "<font face=\"Arial\" size=\"3\" color=\"#000000\">Antwort: $result_finden[antwort]<br><br>";
      } // ende while
      
      echo "    </td>
      <td  width=\"15%\" height=\"10\" align=\"left\" valign=\"middle\" bgcolor=\"\">&nbsp;</td>
     </tr>     
     </table>";
      } // ende if
      ?>
  
     
     </td>
     </tr>
     
       
<?php 
if ($_POST[speichern] == TRUE){
mysql_query("lock tables tcm_faq write");
$select_max_faq_nr=mysql_query("select max(faq_nr) as maxfaq from tcm_faq");
$selectmaxfaq=mysql_fetch_object($select_max_faq_nr);
$neue_faq_nr=$selectmaxfaq -> maxfaq;
$neue_faq_nr=$neue_faq_nr+1;


$kd_set = mysql_query("insert into tcm_faq
(
faq_nr,
nickname,
email,
betreff,
frage
)
values
(
'$neue_faq_nr',
'$_POST[nickname_f]',
'$_POST[email_f]',
'$_POST[betreff_f]',
'$_POST[frage_f]'
)
");
mysql_query("unlock tables");

if(mysql_error()) {
  echo "<p>Sorry, no connection! ", mysql_error(), "</p>\n";
  exit();
  }//  ende if error
    

 
// MAIL SENDEN  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if ($_POST[speichern]== TRUE){

$empfaenger = "usnh2000@yahoo.de";
$betreff = "lllllllllllllllllll FAQ lllllllllllllllllll";
$inhalt.= "
<div align=\"center\">
  <center>
  <table border=\"0\" width=\"600\">
    <tr>
      <td width=\"50%\" align=\"center\">
      <img border=\"0\" src=\"http://www.prima-heusa.de/intern/logo-prima_heusa.jpg\" width=\"601\" height=\"93\"></td>
    </tr>
    <tr>
      <td align=\"center\"><font face=\"Times\" size=\"4\" color=\"#FFFFFF\">
      $_POST[frage_f]<br><br>
      <a href=\"http://www.prima-heusa.de/tcm/wechselseiten/antwort_faq.php?email=$_POST[email_f]&faq_nr=$neue_faq_nr\">Antwort</a>
      
      </td>
    </tr>

  </table>
  </center>
</div>
";

$header.='Content-type: text/html; charset=iso-8859-1' . "\r\n";
$header.='From: u.sack@variusmedien.de' . "\r\n";
mail($empfaenger, $betreff, $inhalt, $header); 
}
}// ende if start-senden 
 ?> 

     
     </table>
  </center>
</div>







    </form>
  </body>
</html>
