<!DOCTYPE html>
<html>
	<body>
		
		<?php
		$con = mysqli_connect("localhost", "root", "" );
		if(!$con){
			die("Can not connect:" . mysqli_error());
		}
		if(!mysqli_select_db($con, 'mydb')) {
			echo "database not selected";
		}
		
		$bookName = $_POST['bookname'];

		$bookType = $_POST['booktype'];
		$id = $_POST['id'];
		
		
		$check= "SELECT * FROM library WHERE bookname='".$bookName."'";
		$resu = mysqli_query($con, $check);
		$row = mysqli_num_rows($resu);	
		if($row>0) { 
			echo "Book already saved. PLEASE enter new bookname!";
			header('Refresh:0; url=Registration.html');
		}else {
		    if(!empty($_FILES["filename"]["name"])) {
				$filename = $_FILES["filename"]["name"];
				$tempname = $_FILES["filename"]["tmp_name"];
				$imgtype = $_FILES["filename"]["type"];
				$imagename=$_FILES["filename"]["name"];
				$targetpath = $imagename;

				if(move_uploaded_file($tempname, $targetpath)) {
					echo "e";
					$sql = "INSERT INTO library (bookname, filename, booktype) values ('".$bookName."', '".$targetpath."', '".$bookType."')" ;
					mysqli_query($con, $sql) or die("error in query_upload == ---->" .mysql_error()); 
						echo "Book Saved successfully";
						header('Refresh:0; url=view.php');
					} 
				} else {
					exit("Error while uploading in server");
				} 
				}
		
		?>
	</body>
</html>