<?php
ini_set('display_errors', 1);

$cFirstName = $_POST['cFirstName'];
$cLastName = $_POST['cLastName'];
$cPhone = $_POST['cPhone'];
$cEmail = $_POST['cEmail'];
$cUsername = $_POST['cUsername'];
$cPassword = $_POST['cPassword'];

$hostname = "us-cdbr-east-06.cleardb.net";
$username = "bc9584bcd61cfa";
$password = "2eff0d16";
$db = "heroku_66e277c8cfa9bb9";

$conn = new mysqli($hostname, $username, $password, $db);

if ($conn->connect_error){
	die("Connection failed: ". $conn->connect_error);
}

$sql = "INSERT INTO Users(username,firstName,lastName,phoneNum,email,password) 
VALUES('$cUsername','$cFirstName','$cLastName','$cPhone','$cEmail',PASSWORD('$cPassword'))";

if ($conn->query($sql) === TRUE) {
	if($conn->affected_rows==0){
		echo '<script>alert("We had trouble creating your account. Please try again.");
		window.location.href="../loginRegister.html";
		</script>';
	 } else{
		 echo '<script>alert("Account created successfully.");
		window.location.href="../loginRegister.html";
		</script>';
	 }
 } else {
 	echo '<script>alert("Could not connect to database. Please try again.");
	 window.location.href="../loginRegister.html";
	 </script>';
 }

$conn->close();


?>