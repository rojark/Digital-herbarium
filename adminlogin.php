<?php
session_start();
if(isset($_POST['sub']))
{
	$u=$_POST['usr'];
	$p=$_POST['pwd'];
	if($u=='admin' && $p=='admin')
	{
		$_SESSION['admin']='admin';
		header('Location:admin_home.php');
	}
	else
	{
		$msg="Invalid Login";
	}
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
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
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
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="menu-wrapper">
	<div id="menu">
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="aboutus.php">About</a></li>
			<li><a href="byfamily.php">Family Info</a></li>
			<li><a href="byplantinfo.php">Plant Info</a></li>
			<li><a href="contact.php">Contact</a></li>
			<li><a href="adminlogin.php">Admin Login</a></li>
		</ul>
	</div>
	<!-- end #menu -->
</div>
<div id="header-wrapper">
	<div id="header">
		
	</div>
</div>
<div id="banner"><img src="images/banner1.jpg" width="1440" height="300" alt="" /></div>
<div id="wrapper">
	<!-- end #header -->
	<div id="page">
		<div id="page-bgtop">
			<div id="page-bgbtm">
			  <!-- end #content -->
				<!-- end #sidebar -->
			  <div align="center">
			    <form id="form1" method="post" action="">
			      <div id="apDiv1" style="color:#00F;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:24px">Admin Login</div>
                  <p>&nbsp;</p>
                  <p>&nbsp;</p>
                  <table width="264" border="0" cellpadding="2" cellspacing="2">
			        <tr>
			          <td width="96">UserName</td>
			          <td width="154">
			            <input type="text" name="usr" id="usr" /></td>
		            </tr>
			        <tr>
			          <td>&nbsp;</td>
			          <td>&nbsp;</td>
		            </tr>
			        <tr>
			          <td>Password</td>
			          <td>
			            <input type="password" name="pwd" id="pwd" /></td>
		            </tr>
			        <tr>
			          <td>&nbsp;</td>
			          <td>&nbsp;</td>
		            </tr>
			        <tr>
			          <td>&nbsp;</td>
			          <td><input type="submit" name="sub" id="sub" value="Login" />&nbsp;&nbsp;<input type="reset" name="reset" /></td>
		            </tr>
			        <tr>
			          <td>&nbsp;</td>
			          <td>&nbsp;</td>
		            </tr>
                     <tr>
			          <td>&nbsp;</td>
			          <td style="color:#C06;font-size:16px">
                      <?php
					  if(isset($msg))
					  {
						  echo $msg;
					  }
					  ?>
                      </td>
		            </tr>
		          </table>
		        </form>
			  </div>
			</div>
		</div>
	</div>
	<!-- end #page -->
</div>
</body>
</html>
