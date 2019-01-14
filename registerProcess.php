<?php

require('includes/dbconx.php');
require('includes/errors.php');


if(isset($_POST['submit'])){

if(!empty($_POST['username']) && !empty($_POST['password'])){
	
	$username =  $_POST[ 'username'];
	$password =  $_POST[ 'password'] ;
	$hashPassword = password_hash($password,PASSWORD_DEFAULT);

	
	//escapes special characters in a string for use in an SQL statement(escape variables for security)

if($stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)")){
$stmt->bind_param("ss", $username, $hashPassword);
$stmt->execute();
$stmt->close();

//insert data into database and check whether connection and query exist and are error free
	

//redirect user to a confirmation page
header("location: login.php");
}

else{

	echo "Something went wrong.";
}
//close the connection when done	
$conn->close();
}
}



?>