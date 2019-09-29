<?php 
session_start();
include("intern/myconnect.php");
include("intern/funktionen.php");
include("intern/css/boxen.css");
include("intern/css/schriften.css"); 
include("kopf.php");?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
  <head>
    <title>New Document</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
  </head>
  <body>
  <?php echo "<form action=\"index.php?seitenname=$_GET[seitenname]\" method=\"POST\">";
  $seiten_name=$_GET['seitenname'];
  if($_GET['seitenname'] == "") {$seiten_name="wechselseiten/startseite.php";
  }
  
 
  include("$seiten_name");
   ?>

<?php /* include("footer.php") */; ?>
</form>
</body>
</html>