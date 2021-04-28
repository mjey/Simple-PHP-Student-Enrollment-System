<?php
require('connection_db.php');
	session_start();
	if (isset($_POST['logout'])) {
		session_destroy();
		header('Location:index.php');
	}
	elseif($_SESSION['login']=="teacher")
	{
		$user =$_SESSION['name'];
	}

	else
		header('Location:index.php');		

?>
<!DOCTYPE html>
<html>
<head>
	<title>Your University Portal | teacher pannel</title>
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

	<div style="background-color: #ffffff; height: 465px; padding-top: 1px;">
		<?php

			$teacher_id=$_SESSION['teacher_id'];

			$sql = "SELECT * FROM teacher WHERE teacher_id='$teacher_id'";
			$result = mysqli_query($connectivity, $sql);

				if (mysqli_num_rows($result)<0) {
				   echo "No data found";
				}
				else{
					while ($row=mysqli_fetch_assoc($result)) {
			
						$teacher_id=$row['teacher_id'];
						$name=$row['name'];
						$email=$row['email'];
						$pass=$row['password'];
						$address=$row['address'];
						$dob=$row['Date_of_birth'];
						$gender=$row['gender'];
						$photo=$row['photo'];
						$salary=$row['salary'];
						$department=$row['department'];	
					}			
			?>
			<script>
				function password() {
				    var x = document.getElementById('show');
				    if (x.style.display == 'block') {
				        x.style.display = 'none';
				    } 
				    else{
				        x.style.display = 'block';
				    }
				}
			</script>
			
			<div style="margin-left: 100px;">
			<p>Username:&emsp;<?=$email;?><br><br>
			<p style="display: inline-flex;">Password:&emsp; 
				<span hidden id="show"> <?=$pass;?></span> &emsp;
				<button style="height: 37px; margin-top: -8px;" type="button" onclick="password()">Show/Hide</button>
			</div><br>
				<table style="margin-left: 10px; margin-right: 10px;" border="1px">
					<tr>
						<th>Teacher ID</th>
						<th>Name</th>
						<th>Email</th>
						
						<th>Address</th>
						<th>Date of Birth</th>
						<th>Gender</th>
						<th>Photo</th>
						<th>Salary</th>
						<th>department</th>
						<th>Update</th>
						<th>Delete</th>	
					</tr>
					<tr>
						<td><?=$teacher_id;?></td>
						<td><?=$name;?></td>
						<td><?=$email;?></td>
						
						<td><?=$address;?></td>
						<td><?=$dob;?></td>
						<td><?=$gender;?></td>
						<td><?=$photo;?></td>
						<td><?=$salary;?></td>
						<td><?=$department;?></td>
						<td><a href="update.php?t_id=<?=$teacher_id;?>">UPDATE</a></td>
						<td><a href="insert_db.php?tt_id=<?=$teacher_id;?>">DELETE ACCOUNT</a></td>
					</tr>	
				</table>
			<?php
			}
		?> 
	</div>
	
	

</body>
</html>