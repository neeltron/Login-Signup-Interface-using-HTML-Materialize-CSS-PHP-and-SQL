<?php
$link = mysqli_connect("localhost", "root", "", "students");
if($link === false)
{
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$name = mysqli_real_escape_string($link, $_REQUEST['name']);
$email = mysqli_real_escape_string($link, $_REQUEST['email']);
$pass = mysqli_real_escape_string($link, $_REQUEST['pass']);
$user = mysqli_real_escape_string($link, $_REQUEST['user']);
$age = mysqli_real_escape_string($link, $_REQUEST['age']);
$sql = "INSERT INTO accounts (Name, Age, Email, Username, Password, Instructor, Assignment) VALUES ('$name', '$age', '$email', '$user', '$pass', '', NULL);";
$sql_alt = "INSERT INTO premium (Username, Password, code, hobby1, hobby2, hobby3, Instructor) VALUES ('$user', '$pass','','','','', '');";

if(mysqli_query($link, $sql) && mysqli_query($link, $sql_alt))
{
    header("location: login.html");
} 
else
{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
mysqli_close($link);
?>
