<?php
include('connection.php');


if(isset($_GET['id']))
{
     $sql = "DELETE FROM tblplant_details WHERE id=".$_GET['id'];
     mysql_query($sql,$con);
	 echo 'Deleted successfully.';
}

?>