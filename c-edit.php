<?php 

$host= "localhost";
$user= "root";
$pass="";
$db = "contact";

// connect to the db
$connection = new mysqli($host, $user, $pass, $db);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$id = "";
$name = "";
$email = "";
$subject = "";
$message = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET["id"])) {
        header("location: ./dash/users.php");
        exit;
    }

    $id = $_GET["id"];

    $sql = "SELECT * FROM user_contact WHERE id = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if (!$row) {
        header("location: ./dash/users.php");
        exit;
    }

    $name = $row["cname"];
    $email = $row["email"];
    $subject = $row["sub"];
    $message = $row["message"];
} else {
    $id = $_POST["id"];
    $name = $_POST["cname"];
    $email = $_POST["email"];
    $subject = $_POST["sub"];
    $message = $_POST["message"];

    do {
        if (empty($id) || empty($name) || empty($email) || empty($subject) || empty($message)) {
            $errorMessage = "All fields are required";
            break;
        }

        $sql = "UPDATE user_contact SET cname = ?, email = ?, sub = ?, message = ? WHERE id = ?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("ssssi", $name, $email, $subject, $message, $id);

        if (!$stmt->execute()) {
            $errorMessage = "Invalid query: " . $stmt->error;
            break;
        }

        $successMessage = "Updated successfully";
        header("location: ./dash/contacts.php");
        exit;

    } while (false);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container my-5">
        <h2>Update Contacts</h2>
        <?php
        if (!empty($errorMessage)) {
            echo
            "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
        }
        ?>
        <form method="post">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="cname" value="<?php echo htmlspecialchars($name); ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-6">
                    <input type="email" class="form-control" name="email" value="<?php echo htmlspecialchars($email); ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Subject</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="sub" value="<?php echo htmlspecialchars($subject); ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Message</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="message" value="<?php echo htmlspecialchars($message); ?>">
                </div>
            </div>
            <?php
            if (!empty($successMessage)) {
                echo
                "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                    <strong>$successMessage</strong>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
            }
            ?>
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="./dash/contacts.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
