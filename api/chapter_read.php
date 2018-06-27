<?php
	include 'config.php';
?>
<?php
	if(isset($_POST['class']) && isset($_POST['subject']) && isset($_POST['course']))
	{
		$class = $_POST['class'];
		$subject = $_POST['subject'];
		$course = $_POST['course'];
		$sql4 = "SELECT DISTINCT chapter,name,lid,file_ext FROM librarydata WHERE class='".$class."' AND subject='".$subject."' AND course='".$course."'";
		$result4 = mysqli_query($conn, $sql4);
		if($result4)
		{
			$res4 = array();
			while($row4 = mysqli_fetch_array($result4, MYSQLI_ASSOC))
			{
				$res4[] = $row4;
			}
			$retn4 = array(
				'status' => 'success',
				'class' => $class,
				'subject' => $subject,
				'course' => $course,
				'data' => $res4
			);
		}
		else{
			$retn4 = array(
				'status' => 'failure'
			);
		}
	}
	else
	{
		$retn4 = array(
			'status' => 'failure'
		);
	}
	print json_encode($retn4);
?>