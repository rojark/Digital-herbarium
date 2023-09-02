<?php
session_start();
if(!isset($_SESSION['admin']))
{
	header("location:adminlogin.php?res=invalid");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Online Herbarium</title>
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/arial.js"></script>
<script type="text/javascript" src="js/cuf_run.js"></script>
<script src="SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
<style type="text/css">
<!--
#apDiv1 {
	position:absolute;
	width:232px;
	height:38px;
	z-index:1;
	left: 548px;
	top: 430px;
}
-->
</style>
</head>
<body>
<div id="menu-wrapper">
	<div id="menu">
		<ul>
			<li><a href="admin_home.php">Home</a></li>
			<li><a href="upload_plant.php">Add Plant</a></li>
			<li><a href="view_plant_details.php">View Plant</a></li>
            <li><a href="index.php">Signout</a></li>
		</ul>
	</div>
	<!-- end #menu -->
</div>
<div id="header-wrapper">
	<div id="header">
		
	</div>
</div>
<div id="banner"><img src="images/banner1.jpg" width="1440" height="315" alt="" /></div>
<div id="wrapper">
	<!-- end #header -->
	<div id="page">
		<div id="page-bgtop">
			<div id="page-bgbtm">
			  <!-- end #content -->
				<!-- end #sidebar -->
			  <div align="center">
			    <form id="form1" method="post" action="">
			      <div id="apDiv1" style="color:#00F;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:22px">Admin Dashboard..!</div>
                  <p>&nbsp;</p>
                  <p>&nbsp;</p>
                  
		        </form>
			  </div>
			</div>
		</div>
	</div>
	<!-- end #page -->
</div>
</body>
</html>
