<?php
session_start();
include 'connect.php';

if (isset($_POST['signIn'])) {
    $name = $_POST['fname'];
    $password = $_POST['password'];
    $passwordHashed = md5($password);

    $selectStmt = $conn->prepare("SELECT * FROM users WHERE name = ? AND password = ?");
    $selectStmt->bind_param("ss", $name, $passwordHashed);
    $selectStmt->execute();
    $result = $selectStmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['id'] = $row['id'];
        $_SESSION['username'] = $row['name'];
        $_SESSION['usertype'] = $row['usertype'];

        if (isset($_POST['remember'])) {
            setcookie("user", $name, time() + (86400 * 30), "/");
            setcookie("pass", $password, time() + (86400 * 30), "/");
        } else {
            if (isset($_COOKIE["user"])) {
                setcookie("user", "", time() - 3600, "/");
            }
            if (isset($_COOKIE["pass"])) {
                setcookie("pass", "", time() - 3600, "/");
            }
        }

        if ($row['usertype'] == 'admin') {
            header('Location: dash/dashboard.php');
        } else {
            header('Location: ./upload_file/insert.php');
        }
        exit();
    } else {
        $_SESSION['message'] = "Incorrect name or password!";
        header("Location: log-in.php");
        exit();
    }
}
?>
