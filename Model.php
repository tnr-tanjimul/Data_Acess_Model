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




	/**
    * connectDB function return connection if successfully connected
    */
	
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
}

?>