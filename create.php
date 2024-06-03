<?php
$servername = "localhost";
$username = "root";
$password= "";
$database = "login";

$connection = new mysqli($servername, $username, $password, $database);

$name = "";
$email = "";
$password = "";

$errorMessage = "";
$succesMessage = "";

if($_SERVER['REQUEST_METHOD']=='POST')
{
    $name =$_POST["name"];
    $email =$_POST["email"];
    $password = $_POST['password'];
    $passwordHashed = md5($password);

    do {
        if (empty($name)|| empty($email) || empty($password)) 
        {
            $errorMessage = "All the fields are required";
            break;
        }

        $sql = "INSERT INTO users (name, email, password)" .
        "VALUES ('$name', '$email', '$passwordHashed')";
        $result = $connection->query($sql);

        if (!$result) {
            $errorMessage = "Invalid query: " .$connection->error;
            break;
        }

        $name = "";
        $email = "";
        $password = "";

        $succesMessage = "User added successfully";

        header("location: ./dash/users.php");
        exit;

    } while(false);
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container my-5"></div>
    <h2>New User</h2>
    <?php
        if (!empty($errorMessage)) 
        {
            echo
             "<div class= 'alert alert-warning alert-dismisible fade show' role= 'alert'>
            <strong>$errorMessage</strong>
            <button type='button' class= 'btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
        }
    ?>
    <form method="post">
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Name</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Email</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="email" value="<?php echo $email; ?>">
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Password</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="password" value="<?php echo $password; ?>">
            </div>
        </div>

        <?php
        if (!empty($successMessage)) 
        {
            echo
             "<div class= 'alert alert-warning alert-dismisible fade show' role= 'alert'>
            <strong>$successMessage</strong>
            <button type='button' class= 'btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
        }
        ?>

        <div class="row mb-3">
           <div class="offset-sm-3 col-sm-3 d-grid">
            <button type="submit" class="btn btn-primary">Submit</button>
           </div>

           <div class="col-sm-3 d-grid">
            <a class="btn btn-outline-primary" href="./dash/users.php" role="button">Cancel</a>
           </div>
            </div>
        </div>
    </form>
</body>
</html>