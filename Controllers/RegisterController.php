<?php 
require_once './Models/Users.php';
class UsersController{

	public function auth(){
				if (isset($_POST['login'])) {
			$data['login'] = $_POST['login'];
			$result = User::login($data);
			if ($result->login === $_POST['login'] && password_verify($_POST['password'], $result->password)) {
				$_SESSION['logged'] = true;
				$_SESSION['login'] = $result->password;
				Redirect::to('Homme');

			}else{
					Session::set('error', 'Login ou password incorrect');
						Redirect::to('Authentification');
			}
		}
	}
	
	public function getAllUsers(){
		$users = User::getAll();
		return $Users;
	}

	public function addUsers(){
		if (isset($_POST['register'])) {

			$data = array(

                  'fullname' => $_POST['fullname'],
                      'login' => $_POST['login'],
                            'password' => sha1($_POST['password'])
			);
			$result = User::add($data);
			if ($result === 'ok') {
				Session::set('success', 'Compte créé avec succès!');
				Redirect::to('Authentification');
			}else{
				echo $result;
			}
		}
	}
              
}
?>