<?php
	require_once('Model.php');
	
	$test = new Model;



	//select data
	$result = $test->executeQuery("SELECT * FROM `myguests`");
	var_dump($result);



	//insert data 
	//return true/false
	$result = $test->executeNonQuery("INSERT INTO MyGuests (firstname, lastname, email) VALUES ('Tanjim', 'Islam', 'tan@tnr.com')");



	//update data 
	//return true/false
	$result = $test->executeNonQuery("UPDATE MyGuests SET lastname='Tanvir' WHERE id=2");





	
	
	
?>