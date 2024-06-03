<?php 
    if (isset($_GET["id"]))
{
    $id = $_GET["id"];

$host= "localhost";
$user= "root";
$pass="";
$db = "login";

// connect sa db
$connection = new mysqli($host, $user, $pass, $db);

$sql = "DELETE from users where id=$id";
$connection->query($sql);

}

header("location: ./dash/users.php");
exit;
?>