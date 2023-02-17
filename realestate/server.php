<?php 
	session_start();
	$username="";
	$email="";
	$errors = array();
	// connect to database
	$db = mysqli_connect('localhost', 'root', '', 'registration_php');
	// if the register button is clicked
	if (isset($_POST['register'])) {
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password1 = $_POST['password1'];
		$password2 = $_POST['password2'];

		// ensure form field are filled appropriately
		if (empty($username)) {
			array_push($errors, "Username is required"); //add error to error_array
		}
		if (empty($email)) {
			array_push($errors, "Email is required"); //add error to error_array
		}
		if (empty($password1)) {
			array_push($errors, "Password is required"); //add error to error_array
		}
		if ($password1 != $password2) {
			array_push($errors, "Password and Comfirm Password must match");
		}

		// if there are no error save the data into database
		if (count($errors)==0) {
			$password = md5($password1); // encrypt password before stored in database (security)
			$sql="INSERT INTO user (username, email, password) VALUES ('$username', '$email', '$password')";
			mysqli_query($db, $sql);
			$_SESSION['username']= $username;
			$_SESSION['success']="You are logged in";
			header("location: index.php"); //redirect to the index page
		}



	}
	// logout 
	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: login.php");
	}

	// login
	if (isset($_POST['login'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];

		// ensure form field are filled appropriately
		if (empty($username)) {
			array_push($errors, "Username is required"); //add error to error_array
		}
		if (empty($password)) {
			array_push($errors, "Password is required"); //add error to error_array
		}
		if (count($errors)==0) {
			$password=md5($password);
			$query = "SELECT * FROM user WHERE username='$username' AND password='$password' ";
			$result = mysqli_query($db, $query);
			if (mysqli_num_rows($result)==1) {
				// logged user
				$_SESSION['username']= $username;
				$_SESSION['success']="You are logged in";
				header("location: index.php"); 


			}else{
				array_push($errors, "Username and Password does not match");
				header("location: login.php");
			}
		}

	}

 ?>