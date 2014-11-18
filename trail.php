<html>
<head> 
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
<meta http-equiv="content-type" content="text/html; charset=utf-8" /> 
<link rel="stylesheet" type="text/css" href="style/style.css" />


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
$picture_id=mysql_result($result,$i,"picture_id");
$rating=mysql_result($result,$i,"rating");
?>

<meta property="og:title" content="<?php echo $name?>"/>
<meta property="og:site_name" content="HikerTrails.com"/>
<meta property="og:image" content="trail_pictures/<?php echo $picture_id ?>.jpg"/>
<meta property="og:url" content="http://folk.uio.no/magl/CMPE137/hikertrails/trail.php?trail=<?php echo $trailID ?>"/>
<title> <?php echo $name?> on HikerTrails.com  </title>
</head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=155223117903107&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

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

<div id= "trailTitle"><h1> <b><?php echo stripslashes($name) ?> </b></h1><hr></div> 

<div id = "trailInfo">
<pO> <?php echo stripslashes($overview) ?> </pO><br><br>
<div id="trailRating">
<?php
$i=0;
while($i < $rating) {
	echo "<img src='style/star_rating_logo.png' width='30px' alt='Rating star'>";
	$i++;
}
?> 
</div>
<div id ="trailFacebook">
<iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Ffolk.uio.no%2Fmagl%2FCMPE137%2Fhikertrails%2Ftrail.php%3Ftrail%3D<?php echo $trailID ?>&amp;width&amp;layout=button_count&amp;action=like&amp;show_faces=true&amp;share=true&amp;height=21&amp;appId=155223117903107" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:21px;" allowTransparency="true"></iframe>
</div>
<br><br>
<stats><b> Length: <?php echo $length ?> </b></stats>
<p>--</p>
<p> <?php echo stripslashes($info) ?> </p>

</div>
<div id = "trailPicture"><img src="trail_pictures\<?php echo $picture_id?>.jpg" alt="" width="400px"></div>
<br>

<!-- TRAIL COMMENTS -->
<div id = "trailComments">
<hr>
<h2><b>Comments</b></h2>
<?php
$result=mysql_query("SELECT * FROM comment WHERE trail_id='$trailID'"); 
$num=mysql_numrows($result);
 while($row = mysql_fetch_array($result)){
	echo "<cmnt><b>" . $row['comment_posterName'] . "</b>";
	echo stripslashes("<br>" . $row['comment_text'] . "</cmnt>");
	echo "<br><br>";
 }
 ?>

<form name="input" action="add_comment.php" method="POST">
<input type="hidden" name="trailID" value="<?php echo $trailID?>" >
<input type="text" name="name" placeholder="Name" size="10px">
<br>
<input type="text" name="comment" placeholder="comment" size="50px" rows="2">
<input type="submit" value="post">
</form>
</div> <!-- DIV trailComment ENDS -->

<br>
</div> <!-- DIV mainForm END-->
<br>

</body>
