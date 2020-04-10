<?php

$StId=$_POST['StId'];
$Name=$_POST['Name'];
$Address=$_POST['Address'];
$Email=$_POST['Email'];
$Mobile=$_POST['Mobile'];
$Age=$_POST['Age'];

if(!empty($Stid) || !empty($Name) || !empty($Address) || !empty($Email) || !empty($Mobile) || !empty($Age))
{
	include("Connection.php");


	 $SELECT = "SELECT StId From TblStudent Where Stid = ? Limit 1";
     $INSERT = "INSERT Into TblStudent (StId, Name, Address, Email, Mobile, Age) values(?, ?, ?, ?, ?, ?)";
     //Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $StId);
     $stmt->execute();
     $stmt->bind_result($StId);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("ssssii", $StId,$Name,$Address,$Email,$Mobile,$Age);
      $stmt->execute();
	  
	echo "New record inserted sucessfully";
	
      
     }
	 
	 else 
	 {
      echo "Someone already Addes using this ID";
	  
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