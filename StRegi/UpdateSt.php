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
	
	$uQuery= "Update TblStudent SET Name= ?, Address= ?, Email= ?, Mobile= ?, Age= ? WHERE StId=?";
	$stmt = $conn->prepare($uQuery);
	$stmt->bind_param('sssssi',$Name,$Address,$Email,$Mobile,$Age,$StId);
	
	if($stmt->execute())
	{
		echo "Student record updated";
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