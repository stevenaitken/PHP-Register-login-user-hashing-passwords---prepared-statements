<?php 

include('includes/dbconx.php');
include('includes/errors.php');

if(isset($_POST['submit'])){
	
	$username = $_POST['username'];
	$Userpassword = $_POST['password'];
	
	
  if($stmt = $conn->prepare("SELECT username, password from users where username = ?")){

  	$stmt->bind_param("s", $username);

  	$stmt->bind_result($username, $password);
    $stmt->execute(); 
	$stmt->fetch();

   
       if(password_verify($Userpassword,$password)){
			

			header('location:admin.php');
			} // end  if


		else{
			header('location:login.php');


		} // end of else

} // end of stmt check ////////////////////////////////////////////////////////////////
		else{
	header('location:login.php');
	
	}
       


  } // end of isset

	 
?>