<?php
$error=''; //Variable to Store error message;

if(isset($_POST['submit'])){
 if(empty($_POST['username']) || empty($_POST['password'])){
 $error = "Wrong password or username ..!";
 echo $error;
 }
 else
 {
 // Include config file
  require_once "config.php";    
 //Define $user and $pass
 $user=$_POST['username'];
 $pass=$_POST['password'];
 

 //sql query to fetch information of registerd user and finds user match.
 $query = mysqli_query($link, "SELECT * FROM users WHERE password='$pass' AND username='$user' ");
 $_SESSION['username'] = $user;
  
 $rows = mysqli_num_rows($query);
 if($rows == 1){
	 session_start();
     //$id = $row["id"];
     //$_SESSION["id"] = $id;
	 $_SESSION['username'] = $user;
   
                error_reporting(E_ALL);
               
                header("Location: main.php");

                die();
               
 
 }
 
 else
 {
 $error = "error 2 Wrong password or username ..!";
 echo $error;
 }
 mysqli_close($link); // Closing connection
 }
}
?>
<!doctype html>
<html lang="en">
  <head>
  	<title>index</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="images/icons/icon.ico"/>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Part 01 : Database relational model </h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
		      	<div class="icon d-flex align-items-center justify-content-center">
		      		<span class="fa fa-user-o"></span>
		      	</div>
		      	<h3 class="text-center mb-4">Sign In</h3>
						<form action="" method="POST" class="login-form">
		      		<div class="form-group">
		      			<input type="text" class="form-control rounded-left" placeholder="Username" name="username" required>
		      		</div>
	            <div class="form-group d-flex">
	              <input type="password" class="form-control rounded-left" name="password" placeholder="Password" required>
	            </div>
	            <div class="form-group">
	            	<button type="submit" name="submit" id="submit" class="form-control btn btn-primary rounded submit px-3">Login</button>
	            </div>
	            <div class="form-group d-md-flex">
	            	<div class="w-50">
	            		<label class="checkbox-wrap checkbox-primary">Remember Me
									  <input type="checkbox" checked>
									  <span class="checkmark"></span>
									</label>
								</div>
								<div class="w-50 text-md-right">
									<a href="register.php">Don’t have an account?</a>
								</div>
	            </div>
	          </form>
	        </div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>

