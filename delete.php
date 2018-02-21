<!DOCTYPE html>
<html>
	<head>
	</head>
	<body>
		<?php
			$con = mysqli_connect("localhost", "root", "");
			if(!$con) {
				die("Can not connect:" . mysql_error());
			}
			if(!mysqli_select_db($con, 'mydb')) {
				echo "Database is not selected";
			}
			$id = $_GET['id'];
			$sql = "DELETE FROM library WHERE id = '".$id."'";
			if(mysqli_query($con, $sql)) {
				header ("location: view.php");
			}
		?>
	</body>
</html>