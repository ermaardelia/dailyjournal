<?php
date_default_timezone_set('Asia/Jakarta');

$servername = "localhost";
$username = "root";
$password = ""; 
$db = "dailyjournalweb";

//create connection
$conn = new mysqli($servername, $username, $password, $db);

//check connection
if ($conn->connect_error){
    die("Connection failed : ".
    $conn->connect_error);
}

// echo "Connected sucessfully<hr>";
?>