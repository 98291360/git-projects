<?php 



class User{

static public function login($data){
		$login = $data['login'];
			try {
		$query = ('SELECT * FROM users where login = :login');
			$stmt = DB::connect()->prepare($query);
			$stmt->execute(array(":login" => $login));
			$user = $stmt ->fetch(PDO::FETCH_OBJ);
			return $user;
			if ($stmt->execute()) {
				return 'ok';
			}
	} catch (PDOException $ex) {
         echo 'error' . $ex->getMessage();
		
	}

	}

static public function getAll(){
	$stmt = DB::connect()->prepare('SELECT * from users');
	$stmt ->execute();

	return $stmt ->fetchAll();
	$stmt ->close();
	$stmt = null;
}

static public function add($data){
		$stmt = DB::connect()->prepare("INSERT INTO users (fullname, login, password ) VALUES(:fullname, :login, :password )");
		$stmt->bindParam(':fullname', $data['fullname']);
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