<?php 
    if (isset($_GET["id"]))
{
    $id = $_GET["id"];

$host= "localhost";
$user= "root";
$pass="";
$db = "contact";

// connect sa db
$connection = new mysqli($host, $user, $pass, $db);

$sql = "DELETE from user_contact where id=$id";
$connection->query($sql);

}

header("location: ./dash/contacts.php");
exit;
?>