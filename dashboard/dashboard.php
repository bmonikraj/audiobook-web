<?php
	include "admsession.php"
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="js/alertify.min.js"></script>

	<link rel="stylesheet" href="css/alertify.min.css" />
	<link rel="stylesheet" href="css/themes/default.min.css" />
	<script src="js/jquery-2.1.4.js"></script>

	<title>DASHBOARD</title>
</head>
<?php
if(isset($_POST["submit"]))
{
	$name=mysqli_real_escape_string($conn,$_POST['nm']);
	$class=mysqli_real_escape_string($conn,$_POST['cls']);
	$subject=mysqli_real_escape_string($conn,$_POST['sub']);
	$course=mysqli_real_escape_string($conn,$_POST['crs']);
	$chapter=mysqli_real_escape_string($conn,$_POST['chpt']);
	$doc_ext=pathinfo(basename($_FILES["doc"]["name"]), PATHINFO_EXTENSION);
	$sql="INSERT INTO librarydata(name, class, subject, course, chapter, file_ext) VALUES('".$name."','".$class."','".$subject."','".$course."','".$chapter."','".$doc_ext."')";
	if(mysqli_query($conn,$sql))
	{
		
		$sql8="SELECT * FROM librarydata ORDER BY lid DESC LIMIT 1";
			$result8=mysqli_query($conn,$sql8);
			$row8=mysqli_fetch_array($result8,MYSQLI_ASSOC);

		$target_dir = "../library-storage/";
		$target_file = $target_dir.$row8['lid'].".".$doc_ext;
	//fetching form data for society and category

		$uploadOk = 1;

		// Allow certain file formats
		// if($doc_ext != 'wav' && $doc_ext !='mp3') {
		//     echo "<script>alert('Sorry, only .wav or .mp3 audio files are allowed !!!');</script>";
		//     $uploadOk = 0;
		// }
		// Check if $uploadOk is set to 0 by an error
				$sql1="SELECT * FROM librarydata ORDER BY lid DESC LIMIT 1";
				$result1=mysqli_query($conn,$sql1);
				$row1=mysqli_fetch_array($result1,MYSQLI_ASSOC);
		if ($uploadOk == 0) {
		    echo "<script>alert('Data could not be saved.');</script>";

		    $sql2="DELETE FROM librarydata WHERE lid=".$row1["lid"];
		    $result2=mysqli_query($conn,$sql2);
		    	



		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($_FILES["doc"]["tmp_name"], $target_file)) {
		        echo "<script>alert('Record Successfully Added.');</script>";
		    }

		   else {

		        echo "<script>alert('Sorry, there was an error uploading your file);</script>";
		        $sql2="DELETE FROM librarydata WHERE lid=".$row1["lid"];
		   		$result2=mysqli_query($conn,$sql2);
		    }
		}
	}
}


?>	
<?php
	if(isset($_POST['delete']))
	{
		$GT = $_POST['id'];
		$files = glob("../library-storage/".$GT.".*");
		$sql= "DELETE FROM `librarydata` WHERE `lid`= ".$GT;
		if(mysqli_query($conn, $sql)){
			foreach($files as $file)
			{
				unlink($file);
			}
			echo '
			<script>
				alert("Record Successfully Deleted.");
			</script>
			';
		}
	}
?>
<body style="background-color: rgb(255,255,180);">
	<div class="row" style="height:4em;background-color: rgb(0,0,60);color:white;">
		<center style="position:relative;margin-top:0.5em;font-size:1.5em">DASHBOARD</center>
	</div>
	<div class="signout-button" style="padding: 1em 1em" align="right">
		<a href="admlogout.php" class="btn btn-info" style="font-family: Quicksand">Sign Out</a>
	</div>
	<section class="create">
		<div class="row" style="margin-top: 1em;">
			<center><h4><b>Create Data</b></h4></center>
		</div>
		<hr>
		<form class="form-group" action="dashboard.php" method="POST" enctype="multipart/form-data">
			<div class="row">
				<div class="col-md-6" style="padding: 0em 6em ; margin: 0.5em 0em;">
					<label for="nm">Name:</label>
					<input type="text" class="form-control" id="nm" name="nm">
				</div>
				<div class="col-md-6" style="padding: 0em 6em ; margin: 0.5em 0em;">
					<label for="cls">Class:</label>
					<input type="text" class="form-control" id="cls" name="cls"> 
				</div>
				<div class="col-md-6" style="padding: 0em 6em ; margin: 0.5em 0em;">
					<label for="sub">Subject:</label>
					<input type="text" class="form-control" id="sub" name="sub"> 
				</div>
				<div class="col-md-6" style="padding: 0em 6em ; margin: 0.5em 0em;">
					<label for="crs">Course:</label>
					<input type="text" class="form-control" id="crs" name="crs"> 
				</div>
				<div class="col-md-6" style="padding: 0em 6em ; margin: 0.5em 0em;">
					<label for="chpt">Chapter:</label>
					<input type="text" class="form-control" id="chpt" name="chpt"> 
				</div>
				<div class="col-md-6" style="padding: 0em 6em ; margin: 0.5em 0em;">
					<label for="upload">Related file:</label>
					<input type="file" class="form-control" id="doc" name="doc">
				</div>
			</div>
			<div class="row">
				<div class="col-md-6" style="padding: 0em 6em ; margin: 0.5em 0em;">
					<button type="submit" name="submit" class="btn btn-info">Submit</button>
				</div>
			</div>
		</form>
	</section>
	<hr>
	<section class="read">
		<div class="row" style="margin-top: 1em;">
			<center><h4><b>Manage Data</b></h4></center>
		</div>
		<hr>
		<div class="table-responsive" style="margin: 1em; padding: 0em 2em;background-color: white;">
			<table class="table">
				<thead>
					<tr>
						<th>Name</th>
						<th>Class</th>
						<th>Subject</th>
						<th>Course</th>
						<th>Chapter</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$sql4 = "SELECT * FROM librarydata";
						$result4 = mysqli_query($conn, $sql4);
						if(mysqli_num_rows($result4) == 0)
						{
							echo '<tr><td colspan="6"><center>No records to display</center></td></tr>';
						}
						else
						{
							while($row4 = mysqli_fetch_array($result4, MYSQLI_ASSOC))
							{
								echo '<tr><td>'.$row4["name"].'</td><td>'.$row4["class"].'</td><td>'.$row4["subject"].'</td><td>'.$row4["course"].'</td><td>'.$row4["chapter"].'</td><td><form action="" method="POST"><input type="hidden" value='.$row4["lid"].' name="id"><input type="submit" class="btn btn-sm btn-danger" name="delete" value="Delete"></form></td></tr>';
							}
						}
					?>
					
				</tbody>
			</table>
		</div>
	</section>
</body>
</html>