<?php 
include("../myconnect.php");
$create_contact=mysql_query("create table tcm_faq
(
faq_id int(6) not null auto_increment primary key,
faq_nr int(6),
nickname char(56),
email char(56),
frage varchar(1024),
antwort varchar(1024),
betreff char(56)
)
");

 ?>