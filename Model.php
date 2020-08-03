<?php 

/**
 * 
 */
public class Model
{
	private $serverName = "localhost";
	private $userName = "root";
	private $password = "";
	private $dbName = "mtest";
	private $conn;


    function __construct()
    {
    	$this->conn = $this->connectDB();
    }


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

	/**
    * insertByArray is for insert Data by Association Array
    * Return type true/false
    */


	function insertByArray($tableName, $data){  
		$sql = "INSERT INTO ".$tableName." (";            
		$sql .= implode(",", array_keys($data)) . ') VALUES (';            
		$sql .= "'" . implode("','", array_values($data)) . "')";

		return $this->executeNonQuery($sql);  
	}


	/**
    * executeQuery is for get Data 
    * Return type association array
    */

	function executeQuery($sql)
	{
		$data = $this->conn->query($sql);
		while($row=mysqli_fetch_assoc($data)){
			$dataSet[] = $row;
		}		
		if(!empty($dataSet)){
			return $dataSet;
		}
		else{
			return array();
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