<!DOCTYPE html>
<html>
	<head>
		<title>My Library</title>
		
			<link rel="stylesheet" href="libr.css" type="text/css"/>
			
	</head>
	<body bgcolor="#d6feff">
		<center><h1>My Library</h1></center>
		<a href="Registration.html"><input type="button" value="RegisterBook" class="butt"></input></a>
		
		<h2>View Library</h2><br>
		<h2>All Books</h2>
		<?php
		$con = mysqli_connect("localhost", "root", "" );
		if(!$con){
			die("Can not connect:" . mysqli_error());
		}
		if(!mysqli_select_db($con, 'mydb')) {
			echo "database is not selected";
		}
		$select_query = "SELECT * FROM library";
		$sql = mysqli_query($con, $select_query) or die(mysql_error()); 
		
		?>
		<table>
			<thead>
				<tr>
				   <td><h2 class="pic">Image</h2></td> 					
					<td><h2 class="pic">BookName</h2></td>
					<td><h2 class="pic">Type</h2></td>
					<td><h2 class="action">Action</h2></td>
				</tr>
			</thead>
			<tbody>
				<?php while($row = mysqli_fetch_assoc($sql)){ ?>
					<tr>
						<td><a class="text"><img src="<?php echo $row['filename'];?> "height="100" width="100"></a></td>
						<td><a class="text"> <?php echo $row["bookname"];?></a></td>
						<td><a class="text"> <?php echo $row["booktype"];?></a></td>
						<td>
							<a class='button' href="edit.php?id=<?php echo$row['id']; ?>">EDIT</a>
							<a class='button' onclick="return confirm('Are you sure?')"  href="delete.php?id=<?php echo$row['id']; ?>">DELETE</a>
						</td>
					</tr>
				<?php
				} ?>
			</tbody>
		</table
	</body>
</html>