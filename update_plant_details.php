<?php
session_start();
if(!isset($_SESSION['admin']))
{
	header("location:admin_home.php?res=invalid");
}

include("connection.php");

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
			    <form id="form1" method="post" action="update_plant_details.php" enctype="multipart/form-data">
			      <div id="apDiv1" style="color:#00F;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:22px">Upload Plant Details</div>
                  <p>&nbsp;</p>
                  
                 <table width="506" border="0">
     <tr>
     
     <?php
     if(isset($_GET['id']))
     {
         $q = "SELECT * FROM tblplant_details WHERE id=".$_GET['id'];
         $plant_id = $_GET['id'];
         $re = mysql_query($q, $con) or die(mysql_error());
         $row = mysql_fetch_assoc($re);
         $tno = mysql_num_rows($re);
     
    if($tno>0)
     {
        ?>
    <td width="146">Family Name</td>
    <td width="170">
    <input type="hidden" name="plant_id" id="plant_id" value="<?php echo $plant_id; ?>" />
    <?php
        $interests = array('#' => '--Select--',  'Anonaceae' => 'Anonaceae', 'Magnoliaceae' => 'Magnoliaceae','Menispermaceae' => 'Menispermaceae', 'Papilionaceae'=>'Papilionaceae', 'Ranunculaceae'=>'Ranunculaceae', 
                 'Ulmaceae'=>'Ulmaceae', 'Umbelliferae' => 'Umbelliferae', 'Portulacaceae'=>'Portulacaceae','Polygalaceae' => 'Polygalaceae');
        ?>
        <select name="family" style="width:170px">
        <?php
        foreach($interests as $k => $v) {
        ?>
        <option value="<?php echo $k; ?>" <?php if($k == $row['family_name']) { ?> selected="selected" <?php } ?>><?php echo $v;?></option>
        <?php } ?>
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
      <input type="text" name="plant" id="plant" value="<?php echo $row['plant_name']; ?>" /></td>
  </tr>
   <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Herbarium Image</td>
    <td><input type="file" name="herbimage" id="herbimage" /> <br/><br/>
    <img src="<?php echo $row['herbarium_img']; ?>" height="75" />
    <input type="hidden" name="tmp_herbimage" id="tmp_herbimage" value="<?php echo $row['herbarium_img']; ?>" />
    </td>
  </tr>
   <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Original Image</td>
    <td><input type="file" name="orgimage" id="orgimage" /> <br/><br/>
    <img src="<?php echo $row['original_img']; ?>" height="75" />
    <input type="hidden" name="tmp_orgimage" id="tmp_orgimage" value="<?php echo $row['original_img']; ?>" />
    </td>
  </tr>
   <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Common Name</td>
    <td><input type="text" name="common" id="common" value="<?php echo $row['common_name']; ?>" /></td>
  </tr>
   <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Local Name</td>
    <td><input type="text" name="local" id="local" value="<?php echo $row['local_name']; ?>" /></td>
  </tr>
   <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Locality</td>
    <td>
      <input type="text" name="locality" id="locality" value="<?php echo $row['locality']; ?>" /></td>
  </tr>
   <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Altitude</td>
    <td>
      <input type="text" name="altitude" id="altitude" value="<?php echo $row['altitude']; ?>" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Habit</td>
    <td>
      <textarea rows="5" cols="30" name="habit" id="habit"><?php echo $row['habit']; ?></textarea>
      </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>

  <tr>
    <td>Description</td>
    <td>
      <textarea rows="5" cols="30" name="descr" id="descr"><?php echo $row['descr']; ?></textarea>
      </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>

  <tr>
    <td>Uses</td>
    <td>
      <textarea rows="5" cols="30" name="uses" id="uses"><?php echo $row['uses']; ?></textarea>
      </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
   <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="sub" id="sub" value=" Update " />&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="reset" name="reset" value="Cancel" /></td>
    <?php } } ?>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
    <tr>
    <td>&nbsp;</td>
    <td style="font-size:14px;color:#F00;font-family:Verdana, Geneva, sans-serif">
    <?php
      if(isset($_POST['sub']))
      {
        
        $family = $_POST['family'];
        $plant = $_POST['plant'];
        $pid = $_POST['plant_id'];
        
        $common =$_POST['common'];
        $local =$_POST['local'];
        $locality =$_POST['locality'];
        $altitude =$_POST['altitude'];
        $habit =addslashes($_POST['habit']);
        $descr =addslashes($_POST['descr']);
        $uses =addslashes($_POST['uses']);
        $msg = "";
        
        
        
        if($_FILES['herbimage']['size'] == 0 && $_FILES['orgimage']['size'] == 0)  
        {

          //Image file upload
          $target_file1 = $_POST['tmp_herbimage'];
          $target_file2 = $_POST['tmp_orgimage'];
          $uploadOk = 1;

          //Update record into database
          $sql = "Update tblplant_details SET family_name='$family', plant_name='$plant', herbarium_img='$target_file1', original_img='$target_file2', common_name='$common', local_name='$local', ";
          $sql .= "locality='$locality', altitude='$altitude', habit='$habit', descr='$descr', uses='$uses' WHERE id= $pid";
                   
          $res=mysql_query($sql,$con);
          if($res>0)
          {
            $msg .="Plant Details Updated Successfully..!";
          }
          else
          {
            $msg .="Failed to Update";
          }
          
        }
        else
        {
          $uploadOk = 1;
          if($_FILES['herbimage']['size'] == 0)
          {
            $target_file1 = $_POST['tmp_herbimage'];
            $target_dir2 = "original_image/";
            $target_file2 = $target_dir2 . basename($_FILES["orgimage"]["name"]);

            if ($_FILES["orgimage"]["size"] > 5000000) {
              $msg .= "<br>Sorry, your file is too large.";
              $uploadOk = 0;
              }

            if (file_exists($target_file2)) {
              $msg = "Sorry, file already exists.";
              $uploadOk = 0;
            }

            
            $imageFileType2 = strtolower(pathinfo($target_file2,PATHINFO_EXTENSION));     
            // Allow certain file formats
            if($imageFileType2 != "jpg" && $imageFileType2 != "png" && $imageFileType2 != "jpeg" && $imageFileType2!= "gif") 
            {
              $msg .= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
              $uploadOk = 0;
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
              $msg .= "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
            } else {
              if (move_uploaded_file($_FILES["orgimage"]["tmp_name"], $target_file2)) 
              {
                //$msg .= "The file ". htmlspecialchars( basename( $_FILES["herbimage"]["name"])). " has been uploaded.";

                //Update record into database
                  $sql = "Update tblplant_details SET family_name='$family', plant_name='$plant', herbarium_img='$target_file1', original_img='$target_file2', common_name='$common', local_name='$local', ";
                  $sql .= "locality='$locality', altitude='$altitude', habit='$habit', descr='$descr', uses='$uses' WHERE id= $pid";
                  //$sql = "insert into tblplant_details (family_name,plant_name, herbarium_img, original_img, common_name, local_name, locality, altitude, habit, descr, uses)";
                  //$sql .= " values ('$family','$plant','$target_file1','$target_file2','$common','$local','$locality','$altitude','$habit','$descr','$uses')";

                  //echo $sql;
                  
                  $res=mysql_query($sql,$con);
                  if($res>0)
                  {
                    $msg .="Plant Details Updated Successfully..!";
                  }
                  else
                  {
                    $msg .="Failed to Update";
                  }
                  
              } else {
                $msg .= "Sorry, there was an error uploading your file.";
              }
            }

          }
          elseif($_FILES['orgimage']['size'] == 0)
          {
            $target_file2 = $_POST['tmp_orgimage'];
            $target_dir1 = "herb_image/";
            $target_file1 = $target_dir1 . basename($_FILES["herbimage"]["name"]);

            if ($_FILES["herbimage"]["size"] > 5000000) {
              $msg .= "<br>Sorry, your file is too large.";
              $uploadOk = 0;
              }
            
            if (file_exists($target_file1)) {
              $msg = "Sorry, file already exists.";
              $uploadOk = 0;
            }

            $imageFileType1 = strtolower(pathinfo($target_file1,PATHINFO_EXTENSION));    
            // Allow certain file formats
            if($imageFileType1 != "jpg" && $imageFileType1 != "png" && $imageFileType1 != "jpeg"  && $imageFileType != "gif") 
            {
              $msg .= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
              $uploadOk = 0;
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
              $msg .= "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
            } else {
              if (move_uploaded_file($_FILES["herbimage"]["tmp_name"], $target_file1)) 
              {
                //$msg .= "The file ". htmlspecialchars( basename( $_FILES["herbimage"]["name"])). " has been uploaded.";

                //Update record into database
                  $sql = "Update tblplant_details SET family_name='$family', plant_name='$plant', herbarium_img='$target_file1', original_img='$target_file2', common_name='$common', local_name='$local', ";
                  $sql .= "locality='$locality', altitude='$altitude', habit='$habit', descr='$descr', uses='$uses' WHERE id= $pid";
                  //$sql = "insert into tblplant_details (family_name,plant_name, herbarium_img, original_img, common_name, local_name, locality, altitude, habit, descr, uses)";
                  //$sql .= " values ('$family','$plant','$target_file1','$target_file2','$common','$local','$locality','$altitude','$habit','$descr','$uses')";

                  //echo $sql;
                  
                  $res=mysql_query($sql,$con);
                  if($res>0)
                  {
                    $msg .="Plant Details Updated Successfully..!";
                  }
                  else
                  {
                    $msg .="Failed to Update";
                  }
                  
              } else {
                $msg .= "Sorry, there was an error uploading your file.";
              }
            }

          }
          else
          {
          //Image file upload
            $target_dir1 = "herb_image/";
            $target_file1 = $target_dir1 . basename($_FILES["herbimage"]["name"]);
            $target_dir2 = "original_image/";
            $target_file2 = $target_dir2 . basename($_FILES["orgimage"]["name"]);
            
            // Check file size
            if ($_FILES["herbimage"]["size"] > 5000000 || $_FILES["orgimage"]["size"] > 5000000) {
              $msg .= "<br>Sorry, your file is too large.";
              $uploadOk = 0;
              }

            // Check if file already exists
            if (file_exists($target_file1) || file_exists($target_file2)) {
              $msg = "Sorry, file already exists.";
              $uploadOk = 0;
            }

            $imageFileType1 = strtolower(pathinfo($target_file1,PATHINFO_EXTENSION));
            $imageFileType2 = strtolower(pathinfo($target_file2,PATHINFO_EXTENSION));     
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
                //$msg .= "The file ". htmlspecialchars( basename( $_FILES["herbimage"]["name"])). " has been uploaded.";

                //Update record into database
                  $sql = "Update tblplant_details SET family_name='$family', plant_name='$plant', herbarium_img='$target_file1', original_img='$target_file2', common_name='$common', local_name='$local', ";
                  $sql .= "locality='$locality', altitude='$altitude', habit='$habit', descr='$descr', uses='$uses' WHERE id= $pid";
                  //$sql = "insert into tblplant_details (family_name,plant_name, herbarium_img, original_img, common_name, local_name, locality, altitude, habit, descr, uses)";
                  //$sql .= " values ('$family','$plant','$target_file1','$target_file2','$common','$local','$locality','$altitude','$habit','$descr','$uses')";

                  //echo $sql;
                  
                  $res=mysql_query($sql,$con);
                  if($res>0)
                  {
                    $msg .="Plant Details Updated Successfully..!";
                  }
                  else
                  {
                    $msg .="Failed to Update";
                  }
                  
              } else {
                $msg .= "Sorry, there was an error uploading your file.";
              }
            }

          }
          
          
        } 
      }
     
      
?>
    <?php
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
