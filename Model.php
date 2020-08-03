<?php 

/**
 * 
 */
class Model
{
	private $serverName = "localhost";
	private $userName = "username";
	private $password = "password";
	private $dbName = "myDB";
	private $conn;




	/**
    * connectDB function return connection if successfully connected
    */


    function __construct()
    {
    	$this->conn = $this->connectDB();
    }
	
	function connectDB()
	{
		// Create connection
		$connection = new mysqli($serverName, $userName, $password, $dbName);

		// Check connection
		if ($connection->connect_error) {
  			die("Connection failed: " . $connection->connect_error);
		}else{
			return $connection;
		} 
	}


	/**
    * countRows returns the number of rows in table 
    */

	function countRows($sql)
	{
		return $this->conn->query($query)->num_rows;
	}


	/**
    * executeNonQuery is for Update/Delete/Insert 
    * Return type true/false
    */

	function executeNonQuery($sql)
	{
		return $this->conn->query($sql);
	}


	/**
    * disconnect the connection when object is clear
    */

	function __destruct()
	{
		$this->conn->close();
	}

}

?>