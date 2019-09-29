<?php $hundert=100;


for ($iii=1; $iii <= $counter_2; $iii++)
    { // start for
   
    $select_anfang=mysql_query("select number from $temp_tab_name where reihenfolge = '1'");
    while ($result_anfang=mysql_fetch_array($select_anfang)){
    
       

if ($result_anfang['number'] == ($hundert + 2)) {
    
    $update_ziel=$hundert+1000;
    $where_ziel=$hundert+1;
    mysql_query("update $temp_tab_name set
    number = '$update_ziel'
    where number = '$where_ziel'");
    
    $update_ziel=$hundert+1;
    $where_ziel=$hundert+2;
    mysql_query("update $temp_tab_name set
    number = '$update_ziel'
    where number = '$where_ziel'");
    
    $update_ziel=$hundert+2;
    $where_ziel=$hundert+3;
    mysql_query("update $temp_tab_name set
    number = '$update_ziel'
    where number = '$where_ziel'");
    
    $update_ziel=$hundert+3;
    $where_ziel=$hundert+4;
    mysql_query("update $temp_tab_name set
    number = '$update_ziel'
    where number = '$where_ziel'");
    
    $update_ziel=$hundert+4;
    $where_ziel=$hundert+5;
    mysql_query("update $temp_tab_name set
    number = '$update_ziel'
    where number = '$where_ziel'");
    
    $update_ziel=$hundert+5;
    $where_ziel=$hundert+1000;
    mysql_query("update $temp_tab_name set
    number = '$update_ziel'
    where number = '$where_ziel'"); 
    } // ende if
    
if ($result_anfang['number'] == ($hundert + 3)) {
    
    $update_ziel=$hundert+1000;
    $where_ziel=$hundert+1;
    mysql_query("update $temp_tab_name set
    number = '$update_ziel'
    where number = '$where_ziel'");
    
    $update_ziel=$hundert+2000;
    $where_ziel=$hundert+2;
    mysql_query("update $temp_tab_name set
    number = '$update_ziel'
    where number = '$where_ziel'");
    
    $update_ziel=$hundert+1;
    $where_ziel=$hundert+3;
    mysql_query("update $temp_tab_name set
    number = '$update_ziel'
    where number = '$where_ziel'");
    
    $update_ziel=$hundert+2;
    $where_ziel=$hundert+4;
    mysql_query("update $temp_tab_name set
    number = '$update_ziel'
    where number = '$where_ziel'");
    
    $update_ziel=$hundert+3;
    $where_ziel=$hundert+5;
    mysql_query("update $temp_tab_name set
    number = '$update_ziel'
    where number = '$where_ziel'");
    
    $update_ziel=$hundert+4;
    $where_ziel=$hundert+1000;
    mysql_query("update $temp_tab_name set
    number = '$update_ziel'
    where number = '$where_ziel'"); 
    
    $update_ziel=$hundert+5;
    $where_ziel=$hundert+2000;
    mysql_query("update $temp_tab_name set
    number = '$update_ziel'
    where number = '$where_ziel'");
    } // ende if
    
    
if ($result_anfang['number'] == ($hundert + 4)) {
    
    $update_ziel=$hundert+1000;
    $where_ziel=$hundert+1;
    mysql_query("update $temp_tab_name set
    number = '$update_ziel'
    where number = '$where_ziel'");
    
    $update_ziel=$hundert+2000;
    $where_ziel=$hundert+2;
    mysql_query("update $temp_tab_name set
    number = '$update_ziel'
    where number = '$where_ziel'");
    
    $update_ziel=$hundert+3000;
    $where_ziel=$hundert+3;
    mysql_query("update $temp_tab_name set
    number = '$update_ziel'
    where number = '$where_ziel'");
    
    $update_ziel=$hundert+1;
    $where_ziel=$hundert+4;
    mysql_query("update $temp_tab_name set
    number = '$update_ziel'
    where number = '$where_ziel'");
    
    $update_ziel=$hundert+2;
    $where_ziel=$hundert+5;
    mysql_query("update $temp_tab_name set
    number = '$update_ziel'
    where number = '$where_ziel'");
    
    $update_ziel=$hundert+3;
    $where_ziel=$hundert+1000;
    mysql_query("update $temp_tab_name set
    number = '$update_ziel'
    where number = '$where_ziel'"); 
    
    $update_ziel=$hundert+4;
    $where_ziel=$hundert+2000;
    mysql_query("update $temp_tab_name set
    number = '$update_ziel'
    where number = '$where_ziel'");
    
    $update_ziel=$hundert+5;
    $where_ziel=$hundert+3000;
    mysql_query("update $temp_tab_name set
    number = '$update_ziel'
    where number = '$where_ziel'");
    } // ende if   
    
if ($result_anfang['number'] == ($hundert + 5)) {
    
    $update_ziel=$hundert+1000;
    $where_ziel=$hundert+1;
    mysql_query("update $temp_tab_name set
    number = '$update_ziel'
    where number = '$where_ziel'");
    
    $update_ziel=$hundert+2000;
    $where_ziel=$hundert+2;
    mysql_query("update $temp_tab_name set
    number = '$update_ziel'
    where number = '$where_ziel'");
    
    $update_ziel=$hundert+3000;
    $where_ziel=$hundert+3;
    mysql_query("update $temp_tab_name set
    number = '$update_ziel'
    where number = '$where_ziel'");
    
    $update_ziel=$hundert+4000;
    $where_ziel=$hundert+4;
    mysql_query("update $temp_tab_name set
    number = '$update_ziel'
    where number = '$where_ziel'");
    
    $update_ziel=$hundert+1;
    $where_ziel=$hundert+5;
    mysql_query("update $temp_tab_name set
    number = '$update_ziel'
    where number = '$where_ziel'");
    
    $update_ziel=$hundert+2;
    $where_ziel=$hundert+1000;
    mysql_query("update $temp_tab_name set
    number = '$update_ziel'
    where number = '$where_ziel'"); 
    
    $update_ziel=$hundert+3;
    $where_ziel=$hundert+2000;
    mysql_query("update $temp_tab_name set
    number = '$update_ziel'
    where number = '$where_ziel'");
    
    $update_ziel=$hundert+4;
    $where_ziel=$hundert+3000;
    mysql_query("update $temp_tab_name set
    number = '$update_ziel'
    where number = '$where_ziel'");
    
    $update_ziel=$hundert+5;
    $where_ziel=$hundert+4000;
    mysql_query("update $temp_tab_name set
    number = '$update_ziel'
    where number = '$where_ziel'");
    } // ende if  
 
    } // ende while
    
$hundert=$hundert + 100;
 
    } // ende for
     ?>