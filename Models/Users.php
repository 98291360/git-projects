<?php 



class User{
static public function getAll(){
	$stmt = DB::connect()->prepare('SELECT * from users');
	$stmt ->execute();

	return $stmt ->fetchAll();
	$stmt ->close();
	$stmt = null;
}

static public function add($data){
		$stmt = DB::connect()->prepare("INSERT INTO users (nom, prenom, login, password ) VALUES(:nom,:prenom,:login, :password )");
		$stmt->bindParam(':nom', $data['nom']);
		$stmt->bindParam(':prenom', $data['prenom']);
		$stmt->bindParam(':login', $data['login']);
		$stmt->bindParam(':password', $data['password']);
     
     
		if ($stmt->execute()) {
			return 'ok';
		}else{
			return 'error';
		}
		$stmt->close();
		$stmt = null;
	
	}

}