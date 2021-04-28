<?php
	session_start();
		if(isset($_SESSION['login']))
		{
			header('Location:'.$_SESSION['login'].".php");
		}
		elseif(isset($_SESSION['message']))
		{	
			echo '<script type="text/javascript">alert("'.$_SESSION['message'].'");</script>';
			header('Refresh:0');
			session_destroy();
		}
		elseif(isset($_SESSION['error']))
		{
			echo '<script type="text/javascript">alert("'.$_SESSION['error'].'");</script>';
			header('Refresh:0');
			session_destroy();
		}
		elseif (isset($_SESSION['n_user'])) {
			echo '<script type="text/javascript">alert("'.$_SESSION['n_user'].'");</script>';
			header('Refresh:0');
			session_destroy();
		}
	?>
<!DOCTYPE html>
<html>
<head>
	<title>Student Registration Form</title>
	<style type="text/css">
		body{
			background: #ffffff;
		}
		.input{
			width: 373px;
			margin-top: 10px;
			height: 30px; 
			padding-left: 15px;
			font-size: 18px;
		}
		.flex{
			display: inline-flex;
		}
	</style>

</head>

<body>
	<form style="background-color: #cbf3f0; height: 80px; padding-top: 10px;" action="login_check.php" method="POST">
		<div style="padding: 10px; width: 450px; display: inline-flex; ">
			<b style="font-family: Impact; font-size: 35px; color: #000000; margin-left: 75px;">Your University Portal</b>
		</div>
		<div  align="right" style="margin-left: 240px; display: inline; width: 700px;">
			<select style="margin: 5px;" name="login_type">
				<option value="admin">Admin</option>
				<option value="teacher">Teacher</option>
				<option value="student">Student</option>
			</select>

			<div class="flex">
				<div><input class="input" style="width: 180px; margin: 5px;" type="text" name="username" placeholder="username/email" required></div>
				
				<div><input class="input" style="width: 130px; margin: 5px;" type="password" name="password" placeholder="password" required></div>
			</div>
			<input class="input" style="margin-left: 5; height: 38px; width: 150px; margin-top: 5px; border-radius: 5px; background-color: #1c26f6; font-weight: bold; color: white; margin-bottom: 10px;" type="submit" name="login" value="Login">
		</div>
	</form>
	<script>
		function teacher() {
		    var x = document.getElementById('teacher');
		    if (x.style.display == 'block') {
		        x.style.display = 'none';
		    } 
		    else{
		        x.style.display = 'block';
		    }
		}

		function student() {
		    var x = document.getElementById('student');
		    if (x.style.display == 'block') {
		        x.style.display = 'none';
		    } 
		    else {
		        x.style.display = 'block';
		    }
		}
	</script>
	<div style="background-color: #ffffff;">
		<form action="insert_db.php" method="POST">
			<div style="margin-left: 430px; padding: 25px; padding-top: 10px; padding-bottom: 5px;">
				<b style="font-size: 30px; font-style: bold; font-family: Elephant;">New Registration Form</b><br>		
				<div style="width: 470px;">
					<div class="flex"><input class="input" type="text" name="name" placeholder="Full Name" required></div><br>

					<div class="flex"><input class="input" type="email" name="email" placeholder="Email Address" required></div><br>

					<div class="flex" style="width: 208px;"> <input style="width: 160px;" class="input" type="password" name="password" placeholder="New Password" required></div>

					<div class="flex"><input style="width: 160px;" class="input" type="password" name="confirm_password" placeholder="Confirm Password" required></div><br>

					<div class="flex" style="width: 168px; margin-top: 30px;"> <b>Date of Birth:</b></div>
					<div class="flex"><input style="width: 200px;" class="input" type="Date" name="Date_of_birth" placeholder="DD/MM/YY" required></div><br>

					<div class="flex" style="width: 200px; margin-top: 25px;"> <b>Click your identity:</b></div>
					<div class="flex" style="margin-top: 5px; margin-left: 35px;">
						<input type="radio" name="Sex" value="Male" required>Male
						<input type="radio" name="Sex" value="Female">Female
					</div><br>

					<div class="flex"><input class="input" type="text" name="address" placeholder="Your residental Address" required></div><br>

					<div class="flex" style="width: 148px;"> Upload Photo:</div>
					<div class="flex"><input class="input" style="height: 35px; width: 258px; padding-left: 0px;" type="file" name="photo" required></div><br>

					<div class="flex" style="width: 165px; margin-top: 30px;"> <b>Click your job :</b></div>
					<div class="flex">
						<div style=" margin-top: 5px;">
							<select required style="margin: 5px; width: 225px; height: 45px; background-color: #d4e1cc; font-weight: bold;" class="input" name="c_type">
								<option type="button" value="">None</option>
								<option type="button" onclick="teacher()" value="teacher">I am Teacher</option>
								<option type="button" onclick="student()" value="student">I am Student</option>
							</select>


						</div>
					</div>
				</div>
			</div>

			<div id="teacher" hidden style="margin-left: 430px; padding: 25px; margin-top: -40px; margin-bottom: -15px;">

				<div class="flex"><input class="input" type="text" name="department" placeholder="Your working department"></div><br>

				<div class="flex"><input class="input" type="text" name="salary" placeholder="Your salary"></div><br>
				
			</div>

			<div id="student" hidden style="margin-left: 430px; padding: 25px; margin-top: -40px; margin-bottom: -15px;">

				<div class="flex"><input class="input" type="text" name="course" placeholder="Course name"></div><br>

			</div>
			<div class="flex"><input class="input" style="margin-left: 456px; height: 45px; width: 150px; margin-top: 5px; border-radius: 5px; background-color: #1c26f6; font-weight: bold; color: white; margin-bottom: 10px;" type="reset" value="Reset"></div>

			<div class="flex"><input class="input" style="margin-left: 430px; width: 170px; height: 45px; margin-top: 5px; margin-left: 73px; border-radius: 5px; background-color: #1c26f6; font-weight: bold; color: white;" type="submit" value="Register"></div>
		</form>
	</div>

	

</body>
</html>