<?php
//Kobler til database
//Henter databasekonfigurasjon fra config.php
$err_msg="Error connecting to the database.<BR>Please try again or Contact our webmaster (contact@liit.no)<BR>Sorry for your Inconvenience.";
$db_hostip=$dbhost;
$db_user=$db_user;
$db_pass=$db_pass;
$db=$db;
$connect=mysql_connect("$db_hostip","$db_user","$db_pass");
if (!$connect)
die("$err_msg");
mysql_select_db($db,$connect)
or die("$err_msg");
?>