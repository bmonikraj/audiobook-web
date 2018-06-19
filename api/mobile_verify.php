<?php
include "config.php"
?>
<?php
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://api.nexmo.com/verify/json'.'/'.$_SESSION['request_id'].'/'.$_POST['code']);
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER,
            array("API_KEY:d5541ab5",
                  "API_SECRET:3OrdSiQEhhcVHVZe"));
$response = curl_exec($ch);
curl_close($ch); 

echo $response;

if($response->status==0)
{
    print '{"status":"success","message":"Correct pin entered "}';
    //code for update row
}
else
{
	print '{"status":"error","message":"Invalid pin"}';
}
?>