<?php 
require_once './Models/Users.php';
class UsersController{
	
	public function getAllUsers(){
		$users = User::getAll();
		return $Users;
	}

	public function addUsers(){
		if (isset($_POST['register'])) {
			$data = array(

                  'nom' => $_POST['nom'],
                    'prenom' => $_POST['prenom'],
                      'login' => $_POST['login'],
                            'password' => sha1($_POST['password'])
			);
			$result = User::add($data);
			if ($result === 'ok') {
				header('Location:'.BASE_URL.'Homme');
			}else{
				echo $result;
			}
		}
	}
              
}
?>