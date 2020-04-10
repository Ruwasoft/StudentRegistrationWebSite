<?php

$Username=$_POST['username'];
$Password=$_POST['password'];


if(!empty($Username) || !empty($Password) )
{
	include("Connection.php");


	 $SELECT = "SELECT username From TblUser Where Username = ? Limit 1";
     $INSERT = "INSERT Into TblUser (username, password) values(?, ?)";
     //Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $Username);
     $stmt->execute();
     $stmt->bind_result($Username);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("ss", $Username,$Password);
      $stmt->execute();
	  
	echo "Registration sucessfully";
		header('Location: AddSt.html');
      
     }
	 
	 else 
	 {
      echo "already  using this username";
	  
     }
     $stmt->close();
     $conn->close();

	
}
else
{
	
	echo "All field are required";
	die();
}

?>