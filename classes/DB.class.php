<?php

class DB {
	
	protected $dbh;

	// Opens a connection to the database.
	function __construct() {
		$configs = include(dirname(__FILE__).'/conn.php');
		$this->dbh = new PDO("mysql:host={$configs['db_host']};dbname={$configs['db_name']}",
						$configs['db_user'], $configs['db_pass']);
	}

	// Closes the connection to the database.
	function __destruct() {
		$this->dbh = null;
	}
	
	// Takes in a string containing an sql string and an array of params
	// The function binds the params, executes the query, and returns the
	// result. Input must be of a form PDOStatement::execute understands.
	// Example input:
	// $query = "SELECT * FROM users u WHERE u.fname = ':fname';"
	// $params = array(":fname" => $somePassedInFirstName)
	// -or-
	// $query = "SELECT * FROM users u WHERE u.fname = ?;"
	// $params = array($somePassedInFirstName)
	public function executeQuery($query, $params) {
		$params = $this->sanitizeString($params);
		$stmt = $this->dbh->prepare($query);
		if($stmt->execute($params)) {
			$results = $stmt->fetchAll();
			return($results);
		} else {

			return false;
		}
	}

	// Wrapper for a common PDO function that returns the id of the last
	// inserted row. Useful when the database uses auto increments like 
	// ours does.
	public function getLastInsertID() {
		return $this->dbh->lastInsertId();
	}

	// Takes in a string or array of strings and cleans out junk that could 
	// be used in XSS attacks.
	public function sanitizeString($input) {
		if(is_array($input)) {
			foreach ($input as &$element) {
				$element = htmlspecialchars(stripslashes(trim($element)));
			}
		} else {
			$input = htmlspecialchars(stripslashes(trim($element)));
		}
		return $input;
	}
}

?>