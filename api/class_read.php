<?php
	include 'config.php';
?>
<?php
	$sql = "SELECT DISTINCT class FROM librarydata";
	$result = mysqli_query($conn, $sql);
	if($result)
	{
		$res = array();
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
		{
			$res[] = $row["class"];
		}
		$retn = array(
			'status' => 'success',
			'data' => $res
		);
	}
	else{
		$retn = array(
			'status' => 'failure'
		);
	}
	print json_encode($retn);
?>