<?php
include "config.php"
?>
<?php
session_start();
$mobile = $_POST['mobile'];
$pwd = $_POST['pwd'];
$sql="SELECT * FROM userdata WHERE mobile = '".$_POST['mobile']."' AND pwd ='".$_POST['pwd']."'"  ;
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_all($result,MYSQLI_ASSOC);
if (sizeof($row)) 
					{
                    // echo "<script>alert('!!! LOGGED Succesfully !!!')</script>";
                    print '{"status":"success"}';
                    $_SESSION['phone'] = $_POST['mobile'];
 							    	// header("location:signin.php");
					}		 	
		else 
					{

					// echo "<script>alert('!!! Registered unsuccesfully !!!')</script>";
				    print '{"status":"error"}';
					}
?>