<?php
include "config.php"
?>
<?php
session_start();
// print $_SESSION['phone'];
$sql = "SELECT * FROM userdata WHERE mobile = '".$_SESSION['phone']."'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
if($_POST['old_pwd'])
{
	if (strcmp($row['pwd'],$_POST['old_pwd'])==0) //pwd matches
		{
			
			$sql = "UPDATE userdata SET pwd = '".$_POST["new_pwd"]."' WHERE mobile = '".$_SESSION['phone']."'";
			if (mysqli_query($conn,$sql)) 
			{
				print '{"status":"success","message":"Passwords Updated"}';
			}		 	
			else 
			{
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
		}
	else
		{
			print '{"status":"error","message":"Invalid Old password"}';
		}
}

if($_POST['name'])
{
	$sql = "UPDATE userdata SET name = '".$_POST["name"]."' WHERE mobile = '".$_SESSION['phone']."'";
	if (mysqli_query($conn,$sql)) 
	{
		// echo "<script>alert('!!! Updated Succesfully !!!')</script>";
	}		 	
	else 
	{
		// echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}

if($_POST['phone'])
{
	$otp = mt_rand(1001,9998);
	$_SESSION['otp'] = $otp;
	$_SESSION['new_phone'] = $_POST['phone'];
	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL ,"https://rest.nexmo.com/sms/json");
	curl_setopt($ch, CURLOPT_HEADER, FALSE);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER ,true);
	curl_setopt($ch, CURLOPT_POST ,true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

	$data = array(
			'api_key' =>'d5541ab5',
			'api_secret' => '3OrdSiQEhhcVHVZe',
			'to' => $_POST['phone'],
			'from' => 'audioweb',
			'text' => 'Your OTP is '.$otp
	);
	curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
	$result = curl_exec($ch);
	
	if($result == false)
	{
		// print "Curl Error ".curl_error($ch);
	}

	else
	{
		// print '{"status":"success","message":"Success"}';
		// print $_SESSION['otp'];
	}

	curl_close($ch);
}
else
{
	$_SESSION['new_phone'] = NULL;
}

// if($response->status==0)
// {
//     print '{"status":"success","message":"Success"}';
//     //update db
   								

// }
// else
// if($response->status==34)
// {
// 	print '{"status":"error","message":"Invalid phone num"}';
// }
?>