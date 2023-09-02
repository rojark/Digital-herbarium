<?php
session_start();
if(!isset($_SESSION['admin']))
{
	header("location:admin_home.php?res=invalid");
}

include("connection.php");

?>
<?php
/*
  $q = "SELECT * FROM department";
  $re = mysql_query($q, $con) or die(mysql_error());
  $ro = mysql_fetch_assoc($re);
  $tro = mysql_num_rows($re);
  */
?>
  <?php
  if(isset($_POST['sub']))
  {
    
    $family = $_POST['family'];
    $plant = $_POST['plant'];
    
    $common =$_POST['common'];
    $local =$_POST['local'];
    $locality =$_POST['locality'];
    $altitude =$_POST['altitude'];
    $habit =addslashes($_POST['habit']);
    $descr =addslashes($_POST['descr']);
    $uses =addslashes($_POST['uses']);
    $msg = "";
    
  //Image file upload
  $target_dir1 = "herb_image/";
  $target_file1 = $target_dir1 . basename($_FILES["herbimage"]["name"]);
  $target_dir2 = "original_image/";
  $target_file2 = $target_dir2 . basename($_FILES["orgimage"]["name"]);
  //$herb_img =$_FILES['herbimage']['name'];
  //$org_img =$_FILES['orgimage']['name'];

  $uploadOk = 1;
  $imageFileType1 = strtolower(pathinfo($target_file1,PATHINFO_EXTENSION));
  $imageFileType2 = strtolower(pathinfo($target_file2,PATHINFO_EXTENSION));

  // Check if image file is a actual image or fake image
  
    $check1 = getimagesize($_FILES["herbimage"]["tmp_name"]);
    $check2 = getimagesize($_FILES["orgimage"]["tmp_name"]);

    if($check1 !== false && $check2 !== false) {
      //echo "File is an image - " . $check["mime"] . ".";
      $uploadOk = 1;
    } 
  

  // Check if file already exists
  if (file_exists($target_file1) || file_exists($target_file2)) {
    $msg = "Sorry, file already exists.";
    $uploadOk = 0;
  }

  // Check file size
  if ($_FILES["herbimage"]["size"] > 5000000 || $_FILES["orgimage"]["size"] > 5000000) {
    $msg .= "<br>Sorry, your file is too large.";
    $uploadOk = 0;
  }

  // Allow certain file formats
  if($imageFileType1 != "jpg" && $imageFileType1 != "png" && $imageFileType1 != "jpeg"  && $imageFileType != "gif" && $imageFileType2 != "jpg" && $imageFileType2 != "png" && $imageFileType2 != "jpeg") 
  {
    $msg .= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
  }

  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    $msg .= "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["herbimage"]["tmp_name"], $target_file1) && move_uploaded_file($_FILES["orgimage"]["tmp_name"], $target_file2)) 
    {
      $msg .= "The file ". htmlspecialchars( basename( $_FILES["herbimage"]["name"])). " has been uploaded.";

      //Insert record into database
        $sql = "insert into tblplant_details (family_name,plant_name, herbarium_img, original_img, common_name, local_name, locality, altitude, habit, descr, uses)";
        $sql .= " values ('$family','$plant','$target_file1','$target_file2','$common','$local','$locality','$altitude','$habit','$descr','$uses')";

        //echo $sql;
        
        $res=mysql_query($sql,$con);
        if($res>0)
        {
          $msg .="Plant Details Added Successfully..!";
        }
        else
        {
          $msg .="Failed to Add";
        }
        
    } else {
      $msg .= "Sorry, there was an error uploading your file.";
    }
  }

    //move_uploaded_file($_FILES['herbimage']['tmp_name'],'herb_image/'.$_FILES['herbimage']['name']);
    //move_uploaded_file($_FILES['orgimage']['tmp_name'],'original_image/'.$_FILES['orgimage']['name']);
       
    
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
	left: 511px;
	top: 381px;
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
<div id="banner"><img src="images/banner1.jpg" width="1440" height="300" alt="" /></div>
<div id="wrapper">
	<!-- end #header -->
	<div id="page">
		<div id="page-bgtop">
			<div id="page-bgbtm">
			  <!-- end #content -->
				<!-- end #sidebar -->
			  <div align="center">
			    <form id="form1" method="post" action="upload_plant.php" enctype="multipart/form-data">
			      <div id="apDiv1" style="color:#00F;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:22px">Upload Plant Details</div>
                  <p>&nbsp;</p>
                 <table width="506" border="0">
     <tr>
    <td width="146">Family Name</td>
    <td width="170">
      <select name="family" style="width:170px">
      <option value="--Select--">--Select--</option>
      <option value="Anonaceae">Anonaceae</option>
      <option value="Magnoliaceae">Magnoliaceae</option>
      <option value="Menispermaceae">Menispermaceae</option>
      <option value="Papilionaceae">Papilionaceae</option>
      <option value="Ranunculaceae">Ranunculaceae</option>
      <option value="Ulmaceae">Ulmaceae</option>
      <option value="Umbelliferae">Umbelliferae</option>
      <option value="Portulacaceae">Portulacaceae</option>
      <option value="Polygalaceae">Polygalaceae</option>
      </select>
      </td>
  </tr>
   <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Plant Name</td>
    <td>
      <input type="text" name="plant" id="plant" /></td>
  </tr>
   <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Herbarium Image</td>
    <td><input type="file" name="herbimage" id="herbimage" /></td>
  </tr>
   <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Original Image</td>
    <td><input type="file" name="orgimage" id="orgimage" /></td>
  </tr>
   <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Common Name</td>
    <td><input type="text" name="common" id="common" /></td>
  </tr>
   <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Local Name</td>
    <td><input type="text" name="local" id="local" /></td>
  </tr>
   <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Locality</td>
    <td>
      <input type="text" name="locality" id="locality" /></td>
  </tr>
   <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Altitude</td>
    <td>
      <input type="text" name="altitude" id="altitude" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Habit</td>
    <td>
      <textarea rows="5" cols="30" name="habit" id="habit"></textarea>
      </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>

  <tr>
    <td>Description</td>
    <td>
      <textarea rows="5" cols="30" name="descr" id="descr"></textarea>
      </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>

  <tr>
    <td>Uses</td>
    <td>
      <textarea rows="5" cols="30" name="uses" id="uses"></textarea>
      </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
   <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="sub" id="sub" value=" Submit " />&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" name="reset" value="Cancel" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
    <tr>
    <td>&nbsp;</td>
    <td style="font-size:14px;color:#F00;font-family:Verdana, Geneva, sans-serif"><?php
	if(isset($msg))
	{
		echo $msg;
	}
    ?></td>
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
