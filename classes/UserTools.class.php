<?php
require_once dirname(__FILE__).'/User.class.php';
require_once dirname(__FILE__).'/DB.class.php';
require_once dirname(__FILE__).'/../includes/passwordHash.inc.php';

class UserTools {

	//Log the user in. First checks to see if the 
	//username and password match a row in the database.
	//If it is successful, set the session variables
	//and store the user object within.
	public function login($username, $password) {
		$db = new DB();
		$result = $db->executeQuery("SELECT * FROM User WHERE username = :username;",
							array(":username" => $username));
		if(count($result) == 1) {
			$userInfo = $result[0];
			if(validate_password($password, $userInfo["password"])) {
				$_SESSION["user"] = serialize(new User($userInfo));
				$_SESSION["login_time"] = time();
				$_SESSION["logged_in"] = 1;
				return true;
			}
		} 
		return false;
	}
	
	//Log the user out. Destroy the session variables.
	public function logout() {
		unset($_SESSION["user"]);
		unset($_SESSION["login_time"]);
		unset($_SESSION["logged_in"]);
		session_destroy();
	}

	//Check to see if a username exists.
	//This is called during registration to make sure all user names are unique.
	public function checkUsernameExists($username) {
		$db = new DB();
		$result = $db->executeQuery("SELECT userID FROM User WHERE username = :username;",
							array(":username" => $username));
		if(count($result) == 0) {
			return false;
		}else{
			return true;
		}
	}
	
	//get a user
	//returns a User object. Takes the users id as an input
	public function get($id)
	{
		$db = new DB();
		$result = $db->executeQuery(" SELECT * FROM User  WHERE userID = :id",
								array(":id" => $id));
		return new User($result[0]);
	}
	
}

?>