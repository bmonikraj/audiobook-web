<?php
include "config.php"
?>
<?php
$sql="SELECT * FROM register WHERE phone = $_POST['phone'] and pwd = $_POST['pwd']";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_all($result,MYSQLI_ASSOC);
print json_encode($row);
?>