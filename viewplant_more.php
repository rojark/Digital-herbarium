<?php
session_start();
session_destroy();
session_unset();
?>
<?php
    if(isset($_GET['id']))
    {
	include("connection.php");
	$q = "SELECT * FROM tblplant_details WHERE ID=".$_GET['id'];
	$re = mysql_query($q, $con) or die(mysql_error());
    $row = mysql_fetch_assoc($re);
	$no = mysql_num_rows($re);
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by TEMPLATED
http://templated.co
Released for free under the Creative Commons Attribution License

Name       : Classifieds  
Description: A two-column, fixed-width design with dark color scheme.
Version    : 1.0
Released   : 20120528

-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Online Herbarium</title>
<link href="http://fonts.googleapis.com/css?family=Arvo" rel="stylesheet" type="text/css" />
<link href="http://fonts.googleapis.com/css?family=Coda:400,800" rel="stylesheet" type="text/css" />
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/arial.js"></script>
<script type="text/javascript" src="js/cuf_run.js"></script>
<script src="SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
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
			  <div style="color:#00F;font:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:36px;" align="center">View Plant Details</div>
			  <p> &nbsp; </p>
    <table width="900" border="1" align="center" cellpadding='5' cellspacing='0'>
    <tr>
    <td>
	  <table width="300" border="0" align="left" cellpadding='5' cellspacing='0'>
            <?php 
            if($no>0)
            {
            ?>
                <tr>
                    <td> Herbarium Image <br/>
                    <img src="<?php echo $row['herbarium_img']; ?>" height="230" />
                    </td>
                </tr>
                <tr>
                    <td> Original Image <br/>
                    <img src="<?php echo $row['original_img']; ?>" height="230" />
                    </td>
                </tr>
        
  </table>
  </td>
  <td  valign="top">
        <table width="100%" cellpadding="5">
        <tr> <td> Family Name: </td> <td> <?php echo $row['family_name'];?></td> </tr>
        <tr> <td> Plant Name: </td> <td> <?php echo $row['plant_name'];?> </td> </tr>
        <tr> <td> Common Name: </td> <td> <?php echo $row['common_name'];?> </td> </tr>
        <tr> <td> Local Name: </td> <td> <?php echo $row['local_name'];?> </td> </tr>
        <tr> <td> Locality: </td> <td> <?php echo $row['locality'];?> </td> </tr>
        <tr> <td> Altitude: </td> <td> <?php echo $row['altitude'];?> </td> </tr>
        <tr> <td> Habit: </td> <td> <?php echo $row['habit'];?> </td> </tr>
        <tr> <td> Description: </td> <td> <?php echo $row['descr'];?> </td> </tr>
        <tr> <td> Uses: </td> <td> <?php echo $row['uses'];?> </td> </tr>
        </table>
  </td>
  </table>
  <?php
            
            }
        ?>
			</div>
		</div>
	</div>
	<!-- end #page -->
</div>
</body>
</html>
