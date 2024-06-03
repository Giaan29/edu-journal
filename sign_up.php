<?php
session_start();
include 'connect.php';

if (isset($_POST['signUp'])) {
    $name = $_POST['fname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordHashed = md5($password);

    $checkEmailStmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $checkEmailStmt->bind_param("s", $email);
    $checkEmailStmt->execute();
    $result = $checkEmailStmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['message'] = "Email address already exists!";
        header("Location: log-in.php");
        exit();
    } else {
        $insertStmt = $conn->prepare("INSERT INTO users (name, email, password, usertype) VALUES (?, ?, ?, 'user')");
        $insertStmt->bind_param("sss", $name, $email, $passwordHashed);
        if ($insertStmt->execute()) {
            $_SESSION['message'] = "Account created successfully!";
            header("Location: log-in.php");
            exit();
        } else {
            $_SESSION['message'] = "Error: " . $conn->error;
            header("Location: log-in.php");
            exit();
        }
    }
}

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

        if ($row['usertype'] == 'admin') {
            header('Location: /finale_web/dashboard/index.php');
        } else {
            header('Location: ./upload_file/insert.php'); // Redirect non-admin users to their dashboard
        }
        exit();
    } else {
        $_SESSION['message'] = "Incorrect name or password!";
        header("Location: log-in.php");
        exit();
    }
}
?>
