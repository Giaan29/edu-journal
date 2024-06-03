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
            header("Location: log-in.php?signup=success"); // Pass a parameter to indicate success
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log-in/Sign-Up</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,400;0,500;0,600;0,800;1,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<header>
    <a href="index.php" class="logo">Edu-Journal</a>
    <ul class="nav-bar">
        <li><a href="about.php">ABOUT</a></li>
        <li><a href="log-in.php">LOG-IN</a></li>
        <li><a href="contact.php">CONTACT</a></li>
    </ul>
</header>

<div class="wrapper">
    <div class="card-switch">
        <label class="switch">
            <input type="checkbox" class="toggle">
            <span class="slider"></span>
            <span class="card-side"></span>
            <div class="flip-card__inner">
                <div class="flip-card__front">
                    <div class="title">Log in</div>
                    <form class="flip-card__form" method="post" action="sign_in.php">
                    <input class="flip-card__input" name="fname" placeholder="Name" type="text" value="<?php if (isset($_COOKIE["user"])) {echo $_COOKIE["user"];} ?>">
                    <input class="flip-card__input" name="password" placeholder="Password" type="password" value="<?php if (isset($_COOKIE["pass"])) {echo $_COOKIE["pass"];} ?>">
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="remember" name="remember" <?php if (isset($_COOKIE["user"]) && isset($_COOKIE["pass"])) { echo "checked"; } ?>>
                        <label class="form-check-label" for="remember">Remember Me</label>
                    </div>
                    <span><?php if (isset($_SESSION['message'])) { echo $_SESSION['message']; unset($_SESSION['message']); } ?></span>
                    <button class="flip-card__btn" name="signIn">Submit!</button>
                    
                </form>

                </div>
                <div class="flip-card__back">
                    <div class="title">Sign up</div>
                    <form class="flip-card__form" method="post" action="sign_up.php"> <!-- Changed action to sign_up.php for signing up -->
                        <input class="flip-card__input" name="fname" placeholder="Name" type="text">
                        <input class="flip-card__input" name="email" placeholder="Email" type="email">
                        <input class="flip-card__input" name="password" placeholder="Password" type="password">
                        <button class="flip-card__btn" name="signUp">Confirm!</button> 
                        <span><?php if (isset($_SESSION['message'])) { echo $_SESSION['message']; unset($_SESSION['message']); } ?></span>
                    </form>
                </div>
            </div>
        </label>
    </div>  
</div>

</body>
</html>


