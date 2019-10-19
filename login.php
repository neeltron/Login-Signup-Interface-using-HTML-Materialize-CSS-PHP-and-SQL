<?php
session_start();
$error='';
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "students";
$x=$_POST['user'];
$y=$_POST['pass'];

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM accounts WHERE Username='$x' AND Password='$y'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $_SESSION['login_user']=$x;
    // output data of each row
    
    while($row = $result->fetch_assoc()) {
        echo "Hey there";
    }
} else {
    echo "Incorrect Email/Password";
}
$conn->close();
?>
