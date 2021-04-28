<?php
	require('connection_db.php');

	if (isset($_GET['s_id'])) {
		$student_id=$_GET['s_id'];
		$sql="SELECT * FROM student WHERE student_id=$student_id";
		$result=mysqli_query($connectivity,$sql);
		$row=mysqli_fetch_assoc($result);
		?>
		<style type="text/css">
			form input {
			    width: 528px;
			    height: 40px;
			    font-size: 21px;
			    padding-left: 15px;
			}
		</style>
		<b style="margin-left: 400px; font-size: 30px;">Student data update Form</b> @admin
		<form style="margin-left: 400px; width: 250px;" action="insert_db.php" method="POST">
			<input type="hidden" name="s_id" value=<?=$student_id?>><br/>
			Name:<input required type="text" name="name" value=<?=$row['name'];?>><br/>
			Email:<input required type="email" name="email" value=<?=$row['email'];?>><br/>
			Password:<input required type="text" name="password" value=<?=$row['password'];?>><br/>
			Date of Birth:<input required type="date" name="dob" value=<?=$row['date_of_birth'];?>><br/>
			Gender:<input required type="text" name="gender" value=<?=$row['Gender'];?>><br/>
			Photo:<input required style="padding-left: 0px;" type="file" name="photo" value=<?=$row['photo'];?>><br/>
			Address:<input required type="text" name="address" value=<?=$row['address'];?>><br/>
			Course:<input required type="text" name="course" value=<?=$row['course_type'];?>><br/>
			<input style="width: auto; margin-top: 10px;" type="submit" name="submit" value="Update">
		</form>
	<?php
	}


	elseif (isset($_GET['t_id'])) {
		$teacher_id=$_GET['t_id'];
		$sql="SELECT * FROM teacher WHERE teacher_id=$teacher_id";
		$result=mysqli_query($connectivity,$sql);
		$row=mysqli_fetch_assoc($result);
		?>
		<style type="text/css">
			form input {
			    width: 528px;
			    height: 40px;
			    font-size: 21px;
			    padding-left: 15px;
			}
		</style>
		<b style="margin-left: 400px; font-size: 30px;">Teacher data update Form</b> @admin
		<form style="margin-left: 400px; width: 250px;" action="insert_db.php" method="POST">
			<input type="hidden" name="t_id" value=<?=$teacher_id?>><br/>
			Name:<input required type="text" name="name" value=<?=$row['name'];?>><br/>
			Email:<input required type="email" name="email" value=<?=$row['email'];?>><br/>
			Password:<input required type="text" name="password" value=<?=$row['password'];?>><br/>
			Address:<input required type="text" name="address" value=<?=$row['address'];?>><br/>
			Date of Birth:<input required type="date" name="dob" value=<?=$row['Date_of_birth'];?>><br/>
			Gender:<input required type="text" name="gender" value=<?=$row['gender'];?>><br/>
			Photo:<input required style="padding-left: 0px;" type="file" name="photo" value=<?=$row['photo'];?>><br/>
			Salary:<input required type="text" name="salary" value=<?=$row['salary'];?>><br/>
			Department:<input required type="text" name="department" value=<?=$row['department'];?>><br/>
			<input style="width: auto; margin-top: 10px;" type="submit" name="submit" value="Update">
		</form>
	<?php
	}


	elseif (isset($_GET['user'])) {
		?>
		<style type="text/css">
			form input {
			    width: 528px;
			    height: 40px;
			    font-size: 21px;
			    padding-left: 15px;
			}
		</style>

		<b style="margin-left: 400px; font-size: 30px;">Student Registration Form</b> @admin
		<form style="margin-left: 400px; width: 250px;" action="update_by_admin.php" method="POST">
			<input type="hidden" name="c_type" value="student"><br/>
			Full Name<input required type="text" name="name" placeholder="Full Name"><br/>
			Email<input required type="text" name="email" placeholder="email address"><br/>
			Password<input required type="password" name="password" placeholder="Password"><br/>
			Confirm Password<input required type="password" name="confirm_password" placeholder="Confirm Password"><br/>
			Date of Birth<input required type="date" name="Date_of_birth"><br/>
			Gender<input required type="text" name="Sex" placeholder="sex"><br/>
			Photo<input required style="padding-left: 0px;" type="file" name="photo" ><br/>
			Address<input required type="text" name="address" placeholder="address"><br/>
			Course<input required type="text" name="course" placeholder="course"><br/>
			<input style="width: auto; margin-top: 10px;" type="submit" name="submit" value="Register">
		</form>
	<?php
	}
	elseif (isset($_GET['tu'])) {
		?>
		<style type="text/css">
			form input {
			    width: 528px;
			    height: 40px;
			    font-size: 21px;
			    padding-left: 15px;
			}
		</style>

		<b style="margin-left: 400px; font-size: 30px;">Teacher Registration Form</b> @admin
		<form style="margin-left: 400px; width: 250px;" action="update_by_admin.php" method="POST">
			<input required type="hidden" name="c_type" value="teacher"><br/>
			Name:<input required type="text" name="name" placeholder="Full Name"><br/>
			Email:<input required type="text" name="email" placeholder="Email"><br/>
			Password:<input required type="password" name="password" password><br/>
			Confirm Password:<input required type="password" name="confirm_password" password><br/>
			Address:<input required type="text" name="address" placeholder="Address"><br/>
			Date of Birth:<input required type="date" name="Date_of_birth"><br/>
			Gender:<input required type="text" name="Sex" placeholder="Gender"><br/>
			Photo:<input required style="padding-left: 0px;" type="file" name="photo"><br/>
			Salary:<input required type="text" name="salary" placeholder="Salary"><br/>
			Department:<input required type="text" name="department" placeholder="department"><br/>
			<input style="width: auto; margin-top: 10px;" type="submit" name="submit" value="Register">
		</form>
	<?php
	}
?>