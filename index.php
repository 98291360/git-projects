<?php
require_once './Views/Includes/Header.php'; 
require_once './autoload.php';
require_once './Controllers/HomeController.php';
require_once './Controllers/EncadreurController.php';
require_once './Database/db.php';
require_once './Controllers/RegisterController.php';

$home = new HomeController();

$pages = ['Homme', 'Add', 'Delete', 'Update','Authentification'];
if (isset($_SESSION['logged']) && $_SERVER['logged'] === true) {
	


if (isset($_GET['page'])) {
	if (in_array($_GET['page'], $pages)) {
		$page = $_GET['page'];
		$home->index($page);
	}else{
		include('Views/Includes/404.php');
	}
}else{
     $home -> index('Homme');
 }


 
require_once './Views/Includes/Footer.php';
  
} else if(isset($_GET['page']) && $_GET['page'] === 'Authentification'){
      $home -> index('Authentification');
}else{
	$home -> index('Authentification');
}

 
