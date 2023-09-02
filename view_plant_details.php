<?php
session_start();
if(!isset($_SESSION['admin']))
{
	header("location:admin_home.php?res=invalid");
}

include("connection.php");

?>

<?php
  $q = "SELECT * FROM tblplant_details";
  $re = mysql_query($q, $con) or die(mysql_error());
  $no = mysql_num_rows($re);
  
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
			    <form id="form1" method="post">
			      <div id="apDiv1" style="color:#00F;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:22px">View Plant Details </div>
                  <p>&nbsp;</p>
    <table width="1100" border="1" cellpadding="3">
    <?php
    if($no>0)
    {
    ?>
        <tr>
            <th> S.No </th>
            <th> Family Name </th>
            <th> Plant Name </th>
            <th> Common Name </th>
            <th> Local Name </th>
            <th> Locality </th>
            <th> Altitude </th>
            <th> Habit </th>
            
            <th colspan="2"> Action </th>

        </tr>
    <?php
    $sno=1;
    while($row = mysql_fetch_assoc($re))  
    {
    ?>
        
        <tr id="<?php echo $row['id']; ?>">
            <td><?php echo $sno++; ?></td>
            <input type="hidden" id="pid" name="pid" value="<?php echo $row['id']; ?>" />
            <td><?php echo $row['family_name'];?></td>
            <td> <?php echo $row['plant_name'];?> </td>
            <td> <?php echo $row['common_name'];?> </td>
            <td> <?php echo $row['local_name'];?> </td>
            <td> <?php echo $row['locality'];?> </td>
            <td> <?php echo $row['altitude'];?> </td>
            <td> <?php echo substr($row['habit'],0,15).'...';?> </td>
            <td> <?php echo "<a href=update_plant_details.php?id=".$row['id'] .">Update </a>";?> </td>
            <td> <button class="btn btn-danger btn-sm remove">Delete</button> </td>
        </tr>
  <?php
  
    }
    }
  ?>
  
</table>
<script type="text/javascript">
    $(".remove").click(function(){
      var id = $(this).parents("tr").attr("id");
      //alert(id);
      
        if(confirm('Are you sure to remove this record ?'))
        {
            $.ajax({
               url: 'delete_plant_detail.php',
               type: 'GET',
               data: {id: id},
               error: function() {
                  alert('Something is wrong');
               },
               success: function(data) {
                    //$("#"+id).remove();
                    alert("Record removed successfully");  
               }
            });
        }
        
    });


</script>

		        </form>
			  </div>
			</div>
		</div>
	</div>
	<!-- end #page -->
</div>

</body>
</html>
