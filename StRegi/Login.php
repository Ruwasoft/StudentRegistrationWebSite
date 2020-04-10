<?php

$Username=$_POST['Username'];
$Password=$_POST['Password'];


if(!empty($Username) || !empty($Password) )
{	
	session_start();
	include("Connection.php");


	$error = ""; //Variable for storing our errors.

	
			// To protect from MySQL injection
				//$Username = stripslashes($Username);
				//$Password = stripslashes($Password);
				//$Username = mysqli_real_escape_string($conn, $Username);
				//$Password = mysqli_real_escape_string($conn, $Password);
				//$Password = md5($Password);

				//Check username and password from database
				$sql="SELECT Id FROM TblUser WHERE username='$Username' and password='$Password'";
				$result=mysqli_query($conn,$sql);
				$row=mysqli_fetch_array($result,MYSQLI_ASSOC);

				//If username and password exist in our database then create a session.
				//Otherwise echo error.

				if(mysqli_num_rows($result) == 1)
				{
					$_SESSION['username'] = $login_user; // Initializing Session
					header("location: AddSt.html"); // Redirecting To Other Page
				}
				else
				{
					 echo "incorrect username and password";
					 echo $Password;
					 
				}

		
	


	
}
else
{
	
	echo "All field are required";
	die();
}

?>