<?php
	include 'config.php';
?>
<?php
	if(isset($_POST['class']))
	{
		$class = mysqli_real_escape_string($conn, $_POST['class']);
		$sql2 = 'SELECT DISTINCT subject FROM librarydata WHERE class="'.$class.'"';
		$result2 = mysqli_query($conn, $sql2);
		if($result2)
		{
			$res2 = array();
			while($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC))
			{
				$res2[] = $row2["subject"];
			}
			$retn2 = array(
				'status' => 'success',
				'class' => $class,
				'data' => $res2
			);
		}
		else{
			$retn2 = array(
				'status' => 'failure'
			);
		}
	}
	else{
		$retn2 = array(
			'status' => 'failure'
		);
	}
	print json_encode($retn2);
?>