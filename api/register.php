<?php
include "config.php"
?>
<?php
session_start();

$name = $_POST['name'];
$phone = $_POST['phone'];
$pwd = $_POST['pwd'];

$_SESSION['phone'] = $_POST['phone'];

//inserting name and pass
$sql = "INSERT INTO userdata( name, pwd , mobile)VALUES ('".$name."','".$pwd."','".$phone."')";

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


//verifying the user
$url = 'https://rest.nexmo.com/sms/json?' . http_build_query([
	'api_key' =>'d5541ab5',
	'api_secret' => '3OrdSiQEhhcVHVZe',
	'to' => $phone,
	'from' => 'audioweb',
	'text' => 'Your otp '
]);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);

echo $response;

if($response->status==0)
{
	print '{"status":"success","data":'.$response->request_id.'}';
	$_SESSION['request_id'] = $response->request_id;
}
else
if($response->status==3)
{
	print '{"status":"error","message":"Invalid phone num"}';
}
?>
