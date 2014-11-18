<html>
<head> 
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
<meta http-equiv="content-type" content="text/html; charset=utf-8" /> 
<link rel="stylesheet" type="text/css" href="style/style.css" />
<title> HikerTrails.com  </title>

<?php

require "config.php";
require "dbconnect.php";
$trailID = htmlspecialchars($_GET["trail"]);
$query="SELECT * FROM trail WHERE id='$trailID'";
$result=mysql_query($query);
$num=mysql_numrows($result);
$name=mysql_result($result,$i,"name");	//name
$overview=mysql_result($result,$i,"overview");
$info=mysql_result($result,$i,"info");	//info
$length=mysql_result($result,$i,"length");	//info

?>

</head>
<body>


<div id = "mainForm">

<div id = "mainHead">
<div id = "mainLogo">
<br>
<a href="index.php"><img src="style/logo.png" height = 120px></a>
</div>
<div id="search">
<?php include "search.php"; ?>
</div>
</div>
<div id = "headSeperatorSmall"> </div>


<div id= "trailList">
<h1> &nbsp&nbspTop trails</h1>
<br>
<?php
$result=mysql_query("SELECT * FROM trail ORDER BY rating DESC"); 
$num=mysql_numrows($result);
 while($row = mysql_fetch_array($result)){
	//LIST ITEM DIV
	echo "<div id='trailListItem'>";
	//TEXT DIV
	echo "<div id='trailListText'>";
	echo stripslashes("<trailListTitle><b><a href='trail.php?trail=" . $row['id'] . "'>" . $row['name'] . "</a></b></trailListTitle><br><br>");
	$i=0;
	$rating = $row['rating'];
	while($i < $rating) {
		$i++;
		echo "<img src='style/star_rating_logo.png' width='20px' alt='Rated star'>";
	}
	echo stripslashes("<br><p>" . $row['overview'] . "</p>");
	
	echo "</div>";
	//PICTURE DIV
	echo "<div id='trailListPicture'>";
	echo "<center><img style='margin-top:20px' border=1px src='trail_pictures/$row[picture_id].jpg' height='180px' width='270px' alt='Picture of trail'></center>";
	echo "</div>";
	echo "<br><br><br>";
	echo "</div>";
 }
 ?>
</div>

<br><br>
</div>
<br>
</body>
