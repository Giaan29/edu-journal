<?php
$host= "localhost";
$user= "root";
$pass="";
$db = "contact";

// connection
$conn = new mysqli($host,$user,$pass,$db);

if ($conn->connect_error)
{
    die ("Connection Failed : " . $conn->connect_error);
}


$name = $_POST['cname'];
$email = $_POST['email'];
$subject = $_POST['sub'];
$message = $_POST['message'];

// eto ay prepared statement
$stmt = $conn->prepare("INSERT INTO user_contact (cname, email, sub, message) VALUES (?, ?, ?, ?)");

// para ma bind ang parameters sa prepared statement
$stmt->bind_param("ssss", $name, $email, $subject, $message);

// execute
if ($stmt->execute()) {
  header("location: contact.php");
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement
$stmt->close();

// Close the connection
$conn->close();
?>
