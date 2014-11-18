<?php
require "config.php";
require "dbconnect.php";

$trailID = $_POST['trailID'];
$name = $_POST['name'];
$comment = $_POST['comment'];
echo $trailID;
echo $name;
echo $comment;

mysql_query("INSERT INTO comment(trail_id, comment_posterName, comment_text) VALUES('$trailID', '$name', '$comment')")
or die(mysql_error());

header( "Location: trail.php?trail=$trailID" ) ;
?>

Yeay