<html>

<head>
	<style type="text/css">
		.{
			margin:0px;
			padding:0px;
			font-family:sans-serif;
		}
		
		#sidebar{
			position:fixed;
			width:200px;
			height:100%;
			background:#151719;
			left:0px;
			transition: all 500ms linear;
		}
		
		#sidebar.active{
			left:-200px;
			
		}
		
		
		#sidebar ul li a{
			color:rgba(230,230,230,0.9);
			list-style:none;
			padding:15px 10px;
			border-bottom:1px solid rgba(100,100,100,0.3);
		}
		
		#sidebar ul li {
			color:rgba(230,230,230,0.9);
			list-style:none;
			padding:15px 10px;
			border-bottom:1px solid rgba(100,100,100,0.3);
		}
		
		#sidebar .toggle-btn{
			position:absolute;
			left:230px;
			top:20px;
		}
		
		#sidebar .toggle-btn span {
			display:block;
			width:30px;
			height:5px;
			background:#151719;
			margin:5px 0px;
		}
		
	</style>
	
	
	<script language="JavaScript" type="text/JavaScript">
		function toggleSidebar()
		{
			document.getElementById("sidebar").classList.toggle("active");
		}
	</script>
	
	 <title>View Students</title>
</head>

<body>

	<div id="sidebar">
		<div class="toggle-btn" onclick="toggleSidebar()">
			<span> </span>
			<span> </span>
			<span> </span>
			<span> </span>
		</div>
		
		
		<ul>
			<li> <a href="AddSt.html"> Add Student </a>  </li>
			<li> <a href="UpdateSt.html"> Update Student </a> </li>
			<li> <font color="blue"> View Students </font></li>
			<li> <a href="index.html"> Logout </a> </li>
		</ul>
	
	</div>
	


<title>Table with database</title>
<style>
table {
border-collapse: collapse;
width: 70%;
color: #588c7e;
font-family: monospace;
font-size: 25px;
text-align: left;
}
th {
background-color: #588c7e;
color: white;
}
tr:nth-child(even) {background-color: #f2f2f2}
</style>
</head>
<body>
<table align="right">
<tr>
<th>Id</th>
<th>name</th>
<th>Address</th>
<th>Email</th>
<th>Mobile</th>
<th>Age</th>
</tr>
<?php
$conn = mysqli_connect("localhost", "root", "", "Stdb");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT Stid, name, address,email,mobile,age FROM TblStudent";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr> 
		<td>" . $row["Stid"]. "</td> 
		<td>" . $row["name"] . "</td> 
		<td>". $row["address"]. "</td> 
		<td>". $row["email"]. "</td>
		<td>". $row["mobile"]. "</td>
		<td>". $row["age"]. "</td>
	</tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
</table>


	


</body>
</html>