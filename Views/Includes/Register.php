<?php 
require_once '../Controllers/HomeController.php';
  
if (isset($_POST['register'])) {
	$name = validateInput($stmt = DB::connect(), $_POST['nom']);
	$surname =  validateInput($stmt = DB::connect(), $_POST['prenom']);
	$email =  validateInput($stmt = DB::connect(),  $_POST['login']);
	$password =  validateInput($stmt = DB::connect(),  $_POST['password']);
	$password_confirm =  validateInput($stmt = DB::connect(),  $_POST['password_confirm']);

	$register = new RegisterController;

}

 ?>