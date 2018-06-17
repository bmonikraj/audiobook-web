<?php
include "config.php"
?>
<?php
$name = $_POST['name'];
$phone = $_POST['phone'];
$pwd = $_POST['pwd'];
$cnf_pwd = $_POST['cnf_pwd'];

$sql = "INSERT INTO register(name,phone,pwd,cnf_pwd)VALUES ('".$name."','".$phone."','".$pwd."','".$cnf_pwd."')";

		if (mysqli_query($conn,$sql)) 
					{
					echo "<script>alert('!!! Registered Succesfully !!!')</script>";
							    	// header("location:signin.php");
					}		 	
		else 
					{

					echo "<script>alert('!!! Registered unsuccesfully !!!')</script>";
				    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
								}								
?>