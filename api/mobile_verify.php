<?php
include "config.php"
?>
<?php
session_start();
if($_SESSION['expire'] < time())
{
        session_unset($_SESSION['otp']);
        print '{"status":"timeout","message":"Session timeout"}';
}
else
{
    if(strcmp($_POST['otp'] , $_SESSION['otp'])==0)
    {
        print '{"status":"success","message":"Correct pin entered "}';
        //update row
        if($_SESSION['new_phone'])
        {

            $sql = "UPDATE userdata SET  mobile = ".$_SESSION['new_phone']." WHERE mobile = '".$_SESSION['phone']."'";
            if (mysqli_query($conn,$sql)) 
                        {
                        // echo "<script>alert('!!! Updated Succesfully 2!!!')</script>";
                        }           
            else 
                        {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                        }
        }
        else
        {
            $sql = "UPDATE userdata SET  mobile_verified = 1 WHERE mobile = '".$_SESSION['phone']."'";

            if (mysqli_query($conn,$sql)) 
                        {
                        // echo "<script>alert('!!! Updated Succesfully 1!!!')</script>";
                        }           
            else 
                        {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                        }
        
        }
        
    }
    else
    {
        print '{"status":"error","message":"Invalid pin"}';
        //delete the inserted data using session phone
    }
}
?>