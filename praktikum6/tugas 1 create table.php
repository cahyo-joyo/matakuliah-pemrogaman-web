<?php
include "koneksi.php";
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
	die("Connection Failed: " . mysqli_connect_error());
}
$sql = "CREATE TABLE buku_tamu (
	ID_BT INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
	NAMA VARCHAR(200) NOT NULL, 
	EMAIL VARCHAR(50) NOT NULL, 
	ISI TEXT NOT NULL)";
if (mysqli_query($conn, $sql)) {
	echo "New record created successfully";
} else {
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn)
?>