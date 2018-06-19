<?php
include "config.php"
?>
<?php
$mobile = $_POST['mobile'];
$pwd = $_POST['pwd'];
$sql="SELECT * FROM userdata WHERE mobile = $mobile AND pwd = $pwd " ;
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_all($result,MYSQLI_ASSOC);
print json_encode($row);
?>