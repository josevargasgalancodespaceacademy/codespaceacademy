<?php

/**
* MySQL connection Class
* Functions to connect to sql and run queries
* 
* @author  David Fisher <davidfisher@codespaceacademy.com>
*/


class Mysql 
{
	private $conn;
	private $host;
	private $user;
	private $password;
	private $baseName;
	private $port;
	private $Debug;
 
    public function __construct($host,$user,$password,$db) {
		$this->conn = false;
		$this->host = $host; 
		$this->user = $user; 
		$this->password = $password; 
		$this->baseName = $db; 
		$this->port = '3306';
		$this->debug = true;
		$this->connect();
	}
 
	public function __destruct() {
		$this->disconnect();
	}
	
	/**
	 *
	 * Creates sql connection
	 *
	 * @return $sql connections
	 *
	*/

	private function connect() {
		if (!$this->conn) {
			try {
				$this->conn = new PDO('mysql:host='.$this->host.';dbname='.$this->baseName.'', $this->user, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));  
			}
			catch (Exception $e) {
				die('Erreur : ' . $e->getMessage());
			}
 
			if (!$this->conn) {
				$this->status_fatal = true;
				echo 'Connection BDD failed';
				die();
			} 
			else {
				$this->status_fatal = false;
			}
		}
 
		return $this->conn;
	}

	/**
	 *
	 * Disconnects the sql connection
	 *
	 * @return void
	 *
	*/
 
	private function disconnect() {
		if ($this->conn) {
			$this->conn = null;
		}
	}

	/**
	 *
	 * Executes a passed sql query and returns the first row found
	 *
	 * @param  string  $query  The query to run
	 * @return array $response  The first row found
	 *
	*/
	
	private function getOne($query) {
		$result = $this->conn->prepare($query);
		$ret = $result->execute();
		if (!$ret) {
		   echo 'PDO::errorInfo():';
		   echo '<br />';
		   echo 'error SQL: '.$query;
		   die();
		}
		$result->setFetchMode(PDO::FETCH_ASSOC);
		$reponse = $result->fetch();
		
		return $reponse;
	}

	/**
	 *
	 * Executes a passed sql query and returns all found data
	 *
	 * @param  string  $query  The query to run
	 * @return array $response  All rows found
	 *
	*/
	
	private function getAll($query) {
		$result = $this->conn->prepare($query);
		$ret = $result->execute();
		if (!$ret) {
		   echo 'PDO::errorInfo():';
		   echo '<br />';
		   echo 'error SQL: '.$query;
		   die();
		}
		$result->setFetchMode(PDO::FETCH_ASSOC);
		$reponse = $result->fetchAll();
		
		return $reponse;
	}

	/**
	 *
	 * Executes a passed sql query and returns response
	 *
	 * @param  string  $query  The query to run
	 * @return response $response  SQL response
	 *
	*/
	
	private function execute($query) {
		$query = $this->conn->prepare($query);
		if (!$response = $query->execute()) {
			echo 'PDO::errorInfo():';
		   echo '<br />';
		   echo 'error SQL: '.$query;
		   die();
		}
		return $response;
	}

	/**
	 *
	 * Builds a query to inserts a new sql row. Adds a "created" timestamp
	 *
	 * @param  string  $tableName  The table to insert the data to
	 * @param  array  $data  $key => $value data to enter
	 * @return void 
	 *
	*/

	public function insertRow($tableName,$data) {
		$columns = array_keys($data);
		$values = array_values($data);
		array_push($columns,"created_at");
		array_push($values,date('Y-m-d G:i:s'));

        $query = "INSERT INTO $tableName (".implode(',',$columns).") VALUES ('" . implode("', '", $values) . "' )";
        return $this->execute($query);
	}

	/**
	 *
	 * Check if row exists on an array of parameters
	 *
	 * @param  string  $tableName  The table to check
	 * @param  array  $data    $key => $value data to check against
	 * @return integer $count  Number of rows found for entered data  
	 *
	*/

	public function checkRowExists($tableName,$data) {
        $query = "SELECT * FROM $tableName WHERE ";
        foreach ($data as $key => $value) {
        	$query .= "$key = '$value' OR ";
        }

        $result = $this->getAll(substr($query,0,-4));
        return count($result);
	}

	/**
	 *
	 * Gets all data with column = value filters
	 *
	 * @param  string  $tableName  The table to check
	 * @param  array  $filters (optional)   $key => $value data to look for
	 * @return array $data  All records found with filters
	 *
	*/

	public function getAllDataWithParameters($tableName,$filters = null) {
		$query = !$filters ? "SELECT * FROM $tableName" : $this->buildGetDataQueryWithFilters($tableName,$filters);
		return $this->getAll($query);
	}

	public function getOneDataWithParameters($tableName,$filters = null) {
		$query = !$filters ? "SELECT * FROM $tableName" : $this->buildGetDataQueryWithFilters($tableName,$filters);
		return $this->getOne($query);
	}

	private function buildGetDataQueryWithFilters($tableName,$filters){
		$query = "SELECT * FROM $tableName WHERE";
		foreach ($filters as $name => $value) {
			$query .= " $name = '$value' AND ";
		}
		return substr($query,0,-5);
	}

	/**
	 *
	 * Gets one value from all rows with column = value filters
	 *
	 * @param  string  $tableName  The table to check
	 * @param  string  $selectedData  Data parameter to return
	 * @param  array  $filters (optional)   $key => $value data to look for
	 * @return array $data  data parameters for the selected field
	 *
	*/

	public function getSelectedDataWithParameters($tableName,$selectData,$filters = null) {
		$data = $this->getAllDataWithParameters($tableName,$filters);
		return array_column($data, $selectData);
	}

	/**
	 *
	 * updates a single row
	 *
	 * @param  string  $tableName  The table to check
	 * @param  array  $identifiers  $key => $value data to filter to find row
	 * @param  array  $filters    $key => $value data to update
	 * @return void
	 *
	*/

	public function editSingleRow($tableName,$identifiers,$updateValues) {
		$query = "UPDATE $tableName SET ";
		foreach($updateValues as $column => $value) $query .= $value === "" ? "$column = NULL, " : "$column = '$value', ";
		$query = substr($query,0,-2);
		$query .= " WHERE ";
		foreach ($identifiers as $column => $value) $query .= "$column = '$value' OR ";
		return $this->execute(substr($query,0,-3) . " LIMIT 1");
	}

	/**
	 *
	 * converts a string into a suitable sql Date value
	 *
	 * @param  {string}  $string date in string format
	 * @param  {string}  $fformat  original format using (dmY)
	 
	 * @return {string}
	 *
	*/

	public function checkAndPrepareDateString($string,$format) {

		$date = DateTime::createFromFormat($format,$string);
		return $date->format('Y-m-d');
	}

}

