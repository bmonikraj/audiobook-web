<?php
include "config.php"
?>
<?php
session_start();
if(strcmp($_POST['otp'] , $_SESSION['otp'])==0)
{
    print '{"status":"success","message":"Correct pin entered "'.$_SESSION['phone'].'}';
    //update row
    if(strcmp($_SESSION['new_phone'],"")==0)
    {
        $sql = "UPDATE userdata SET  mobile_verified = 1 WHERE mobile = '".$_SESSION['phone']."'";

        if (mysqli_query($conn,$sql)) 
                    {
                    echo "<script>alert('!!! Updated Succesfully 1!!!')</script>";
                    }           
        else 
                    {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
    }
    else
    {
        $sql = "UPDATE userdata SET  mobile = ".$_SESSION['new_phone']." WHERE mobile = '".$_SESSION['phone']."'";

        if (mysqli_query($conn,$sql)) 
                    {
                    echo "<script>alert('!!! Updated Succesfully 2!!!')</script>";
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
?>