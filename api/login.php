<?php
include "config.php"
?>
<?php
session_start();
$mobile = $_POST['mobile'];
$pwd = $_POST['pwd'];
$sql="SELECT * FROM userdata WHERE mobile = '".$_POST['mobile']."' AND pwd ='".$_POST['pwd']."'"  ;
if (mysqli_query($conn,$sql)) 
					{
                    echo "<script>alert('!!! LOGGED Succesfully !!!')</script>";
                    $_SESSION['phone'] = $_POST['mobile'];
 							    	// header("location:signin.php");
					}		 	
		else 
					{

					echo "<script>alert('!!! Registered unsuccesfully !!!')</script>";
				    print "Error: " . $sql . "<br>" . mysqli_error($conn);
					}
?>