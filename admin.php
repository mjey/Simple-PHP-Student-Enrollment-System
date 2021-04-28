<?php
	require('connection_db.php');
	session_start();
	if (isset($_POST['logout'])) {
		session_destroy();
		header('Location:index.php');
	}
	
	elseif($_SESSION['login']=="admin")
	{
		$user =$_SESSION['user'];
		if(isset($_SESSION['message']))
		{	
			echo '<script type="text/javascript">alert("'.$_SESSION['message'].'");</script>';
			unset($_SESSION["message"]); 
		}
	}
	else
		header('Location:index.php');		

?>
<!DOCTYPE html>
<html>
<head>
	<title>Your University Portal admin pannel</title>
	<style type="text/css">
		body{
			background: #f1f1f1;
		}
		.input{
			width: 373px;
			margin-top: 10px;
			height: 35px; 
			padding-left: 15px;
			font-size: 18px;
		}
		.flex{
			display: inline-flex;
		}
		table {
		    border-collapse: collapse;
		    width: auto;
		}
		th{
			text-align: center;
			background-color: #808080;
		    color: white;
		}

		td {
		    text-align: left;
		    padding: 8px;
		}

		tr:nth-child(even){
			background-color: #f2f2f2
		}
		tr:nth-child(odd){
			background-color: #f9f9f9
		}
	</style>
</head>

<body>

	<div style="background-color: #cbf3f0; height: 80px; padding-top: 10px;">
		<div style="padding: 10px; display: inline-flex;">
			<b style="font-family: cursive; font-size: 35px; color: #ed854d; width: 800px; padding-left: 170px;"><?php 
			echo "Welcome, ". $user ?></b>
		</div>
	
		<form style="display: inline-flex;" action="#" method="POST">
			<input style="margin: 5px;" type="submit" name="logout" value="Logout">
		</form>
	</div>

	<div style="background-color: #ffffff; height: auto; padding-bottom: 10px;">
		<?php
				$sql = "SELECT * FROM student";
				$result = mysqli_query($connectivity, $sql);

				if (mysqli_num_rows($result)<=0) {
				   echo "Student's data not found";
				}
				else {
		?>
					<br>
					<b style="margin-left: 20px;">Dear, Admin you can update all Student data from this table,</b>
					<table style="margin-left: 10px; margin-right: 10px;" border="1px">
						<tr>
							<th>S.N</th>
							<th>Name</th>
							<th>Email</th>
							<th>Password</th>
							<th>Date of Birth</th>
							<th>Gender</th>
							<th>Photo</th>
							<th>Address</th>
							<th>Course</th>
							<th>Update</th>
							<th>Delete</th>
							
						</tr>
					
				<?php
					while ($row=mysqli_fetch_assoc($result)) {
						?>
						<tr>
							<td><?=$row['student_id'];?></td>
							<td><?=$row['name'];?></td>
							<td><?=$row['email'];?></td>
							<td><?=$row['password'];?></td>
							<td><?=$row['date_of_birth'];?></td>
							<td><?=$row['Gender'];?></td>
							<td><?=$row['photo'];?></td>
							<td><?=$row['address'];?></td>
							<td><?=$row['course_type'];?></td>
							<td><a href="update.php?s_id=<?=$row['student_id']?>">UPDATE</a></td>
							<td><a href="insert_db.php?s_id=<?=$row['student_id']?>">DELETE</a></td>
						</tr>
						<?php
					}
					?>
					</table>
				<?php
				}
			?> 
			<br><a style="margin-left: 20px;" href="update.php?user='student'">Add new Student</a>
			<br><br>
			<hr>
			<?php
				$sql = "SELECT * FROM teacher";
				$result = mysqli_query($connectivity, $sql);

				if (mysqli_num_rows($result)<=0) {
				   echo "Teacher's data not found";
				}
				else {
		?>
					<br>
					<b style="margin-left: 20px;">Dear, Admin you can update all teacher data from this table,</b>
					<table style="margin-left: 10px; margin-right: 10px;" border="1px">
						<tr>
							<th>S.N</th>
							<th>Name</th>
							<th>Email</th>
							<th>Password</th>
							<th>Date of Birth</th>
							<th>Gender</th>
							<th>Photo</th>
							<th>Address</th>
							<th>Salary</th>
							<th>department</th>
							<th>Update</th>
							<th>Delete</th>
							
						</tr>
					
				<?php
					while ($row=mysqli_fetch_assoc($result)) {
						?>
						<tr>
							<td><?=$row['teacher_id'];?></td>
							<td><?=$row['name'];?></td>
							<td><?=$row['email'];?></td>
							<td><?=$row['password'];?></td>
							<td><?=$row['Date_of_birth'];?></td>
							<td><?=$row['gender'];?></td>
							<td><?=$row['photo'];?></td>
							<td><?=$row['address'];?></td>
							<td><?=$row['salary'];?></td>
							<td><?=$row['department'];?></td>
							<td><a href="update.php?t_id=<?=$row['teacher_id']?>">UPDATE</a></td>
							<td><a href="insert_db.php?t_id=<?=$row['teacher_id']?>">DELETE</a></td>
						</tr>
						<?php
					}
					?>
					</table>
					
				<?php
				}
			
			?> 
		<br><a style="margin-left: 20px;" href="update.php?tu='teacher'">Add new Teacher</a>
	</div>
	
	

</body>
</html>