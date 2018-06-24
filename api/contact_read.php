<?php
include "config.php"
?>
<?php
$sql = "SELECT * FROM contact";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_all($result,MYSQLI_ASSOC);
print json_encode($row);
?>