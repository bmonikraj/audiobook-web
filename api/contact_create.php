<?php
include "config.php"
?>
<?php
    $name = $_POST['name'];
    $message = $_POST['message'];

    $sql = "INSERT INTO contact(name , message) VALUES ('".$name."','".$message."')";

    if (mysqli_query($conn,$sql)) 
	{
        echo "<script>alert('!!! Inserted succesfully !!!')</script>";  
	}		 	
	else 
	{
        echo "<script>alert('!!! Inserted unsuccesfully !!!')</script>";
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
?>