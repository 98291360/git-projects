<?php
require_once 'Includes/Header.php'; 
require_once './Controllers/RegisterController.php';
require_once './Database/db.php';
?>

<?php 
if (isset($_POST['login'])) {
  $loginUser = new UsersController();
   $loginUser -> auth();
}


if (isset($_POST['register'])) {
  $newUser = new UsersController();
   $newUser -> addUsers();
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Connexion</title>

	
</head>
<body>
  <div class="full-page">

     <?php include('./Views/Includes/Alerts.php'); ?>

  		<div class="form-box">

  			<div class="button-box">

  				<div id="btn"> </div>	<button type="button" onclick="login()" class="toggle-btn">Log In</button>   <button type="button" onclick="register()" class="toggle-btn">Register</button>
  					
  			 </div>

  				<form method="post"  id="login" class="input-group-login">

              <input type="text" name="login" class="input-field" placeholder="Login" required>
  					<input type="password" name="password_" class="input-field" placeholder=" Password" required>
  					<input type="checkbox" name="password_remember" class="check-box" >
            <span style="font-weight:bold; color: black;">Remember Password</span>
            <button name="login" type="submit" class="submit-btn">Log In</button> 					
  				</form>

  				<form method="post"  id="register" class="input-group-register">
  						<input type="text" name="fullname" class="input-field" placeholder="FullName" required>
  						<input type="text" name="login" class="input-field" placeholder="Enter Login" required>
  						<input type="password" name="password" class="input-field" placeholder="Enter Password" required>
  						<input type="checkbox" name="" class="check-box" >
              <span style="font-weight: bold; color:black;">I agree to the terms and conditions Password</span>
              <button name="register" type="submit" class="submit-btn">Register</button>
  				</form>
  				
  		
  			
  		</div>
  	
  </div>

  <script>
  	var x=document.getElementById('login');
  	var y = document.getElementById('register');
  	var z = document.getElementById('btn');

  	function register(){
  		x.style.left = '-400px';
  		y.style.left = '50px';
  		z.style.left = '110px';
  	}

  	function login(){
  			x.style.left = '50px';
  		y.style.left = '450px';
  		z.style.left = '0px';
  	}
  </script>

  <script>
  	var modal = document.getElementById('login-form');
  	window.onclick = function(event)
  	{
  		if (event.target == modal)
  		 {
  		 	modal.style.display = "none";
  		 }
  	}
  </script>
</body>
</html>