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
					// echo "<script>alert('!!! Registered Succesfully !!!')</script>";
					
									// header("location:signin.php");
					}		 	
		else 
					{

					echo "<script>alert('!!! Registered unsuccesfully !!!')</script>";
				    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
					}								


//verifying the user
$otp = mt_rand(1001,9998);
$_SESSION['otp'] = $otp;

$ch = curl_init();

curl_setopt($ch,  CURLOPT_URL ,"https://rest.nexmo.com/sms/json");
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch,   CURLOPT_RETURNTRANSFER ,true);
curl_setopt($ch,    CURLOPT_POST ,true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$data = array(
        'api_key' =>'d5541ab5',
		'api_secret' => '3OrdSiQEhhcVHVZe',
		'to' => $phone,
		'from' => 'audioweb',
		'text' => 'Your OTP is '.$otp
);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
$result = curl_exec($ch);


$var = json_encode($result);

$v = json_decode($var,true);
// print $v;

if($result == false)
{
	print "Curl Error ".curl_error($ch);
}

else
{
	// if($response->status==0)
	// {
	// 	
		
	// }
	// else
	// if($response->status==34)
	// {
	// 	print '{"status":"error","message":"Invalid phone num"}';
	// }
	print '{"status":"success","message":"Success"}';
}

curl_close($ch);



?>
