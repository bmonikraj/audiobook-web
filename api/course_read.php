<?php
	include 'config.php';
?>
<?php
	if(isset($_POST['class']) && isset($_POST['subject']))
	{
		$class = mysqli_real_escape_string($conn, $_POST['class']);
		$subject = mysqli_real_escape_string($conn, $_POST['subject']);
		$sql3 = "SELECT DISTINCT course FROM librarydata WHERE class='".$class."' AND subject='".$subject."'";
		$result3 = mysqli_query($conn, $sql3);
		if($result3)
		{
			$res3 = array();
			while($row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC))
			{
				$res3[] = $row3["course"];
			}
			$retn3 = array(
				'status' => 'success',
				'class' => $class,
				'subject' => $subject,
				'data' => $res3
			);
		}
		else
		{
			$retn3 = array(
				'status' => 'failure'
			);
		}
	}
	else
	{
		$retn3 = array(
			'status' => 'failure'
		);
	}
	print json_encode($retn3);
?>