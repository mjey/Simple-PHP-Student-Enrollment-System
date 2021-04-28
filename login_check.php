<?php
	session_start();
	
	require('connection_db.php');

	$name=$_POST["username"];
	$pass=$_POST["password"];
	$loginType=$_POST["login_type"];

	if ($loginType == "admin") {
		if ($name == "admin" && $pass == "indra") {
			$_SESSION['user']=$name;
			$_SESSION['pass']=$pass;
			$_SESSION['login']=$loginType;
			header('Location:'.$loginType.'.php');
			exit();
		}
		else {
			$_SESSION['error']="Username or Password is wrong";
			header('Location:index.php');
			exit();
		}
	}
	elseif ($loginType == 'student') {	

			$data = "SELECT * FROM student WHERE email = '$name' and password = '$pass'";
			$result = mysqli_query($connectivity, $data);

			if (mysqli_num_rows($result)<=0) {
			    $_SESSION['n_user']= "User not found";
				header('Location:index.php');
				exit();
			}
			else{
			    while($row = mysqli_fetch_assoc($result)) { 
			    	$student_id=$row["student_id"];
			        $Nam=$row["name"];
			        $Email=$row["email"];
			        $password=$row["password"];

				}
					$_SESSION['login']=$loginType;
					$_SESSION['name']=$Nam;
					$_SESSION['email']=$Email;
					$_SESSION['pass']=$password;
					$_SESSION['student_id']=$student_id;
				
					header('Location:student.php');
					exit();
			}
	}

	elseif ($loginType == 'teacher') {	

			$data = "SELECT * FROM teacher WHERE email = '$name' and password = '$pass'";
			$result = mysqli_query($connectivity, $data);

			if (mysqli_num_rows($result)<=0) {
			   $_SESSION['n_user']= "User not found";
				header('Location:index.php');
				exit();
			}
			else{
			    while($row = mysqli_fetch_assoc($result)) { 
			        $teacher_id=$row["teacher_id"];
			        $Nam=$row["name"];
			        $Email=$row["email"];
			        $password=$row["password"];

				}
					$_SESSION['login']=$loginType;
					$_SESSION['name']=$Nam;
					$_SESSION['email']=$Email;
					$_SESSION['pass']=$password;
					$_SESSION['teacher_id']=$teacher_id;
				
					header('Location:teacher.php');
					exit();
			}
	}

?>