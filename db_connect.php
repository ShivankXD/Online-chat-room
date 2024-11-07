<?php

$servername="localhost";
$username="root";
$password="";
$database="chatroom";


//database connection 
$conn =mysqli_connect($servername,$username,$password,$database);


//checking connection
if(!$conn)
{
    die("Failed to connect". mysqli_connect_error());

}
?>

