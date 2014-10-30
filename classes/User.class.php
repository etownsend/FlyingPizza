<?php
require_once dirname(__FILE__).'/UserTools.class.php';
require_once dirname(__FILE__).'/DB.class.php';

class User {

	public $userID;
	public $username;
	public $hashedPassword;
	public $email;
	public $joinDate;
	public $fname;
	public $lname;
	public $description;

	//Constructor is called whenever a new object is created.
	//Takes an associative array with the DB row as an argument.
	function __construct($data) {
		$this->userID = (isset($data['userID'])) ? $data['userID'] : "";
		$this->username = (isset($data['username'])) ? $data['username'] : "";
		$this->hashedPassword = (isset($data['password'])) ? $data['password'] : "";
		$this->email = (isset($data['email'])) ? $data['email'] : "";
		$this->joinDate = (isset($data['join_date'])) ? $data['join_date'] : "";
		$this->fname = (isset($data['fname'])) ? $data['fname'] : "";
		$this->lname = (isset($data['lname'])) ? $data['lname'] : "";
		$this->description = (isset($data['description'])) ? $data['description'] : "";
	}

	public function save($isNewUser = false) {
		//create a new database object.
		$db = new DB();
		//if the user is already registered and we're
		//just updating their info.
		if(!$isNewUser) {
			//update the row in the database
			$db->executeQuery("UPDATE User SET email=:email Where userID=:userID;",
						array(":email" => $this->email, ":userID" => $this->userID));
		}else {
		//if the user is being registered for the first time.
			$columns = "(username, password, email, join_date, fname, lname, description)";
			$placeHolders = "(:username, :password, :email, :join_date, :fname, :lname, :description)";
			$params = array(
				":username" => $this->username,
				":password" => $this->hashedPassword,
				":email" => $this->email,
				":join_date" => date("Y-m-d H:i:s",time()),
				":fname" => $this->fname,
				":lname" => $this->lname,
				":description" => $this->description
			);
			$sql = "INSERT INTO User $columns $placeHolders;";
			$db->executeQuery("INSERT INTO User $columns VALUES $placeHolders;", $params);
			//$this->userID = $db->executeQuery("SELECT userID FROM User WHERE username=:username",
											//array(":username" => $this->username) )[0];
			$this->joinDate = time();
		}
		return true;
	}
}

?>