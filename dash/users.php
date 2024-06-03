<?php 
session_start();

if (!isset($_SESSION['id']) || trim($_SESSION['id']) == '') {
    header('Location: ../log-in.php'); 
    exit();
}

include('../connect.php'); 

// Check 
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetching user details
$query = $conn->prepare("SELECT * FROM users WHERE id = ?");
$query->bind_param("i", $_SESSION['id']);
$query->execute();
$result = $query->get_result();
$user = $result->fetch_assoc();

if ($user['usertype'] !== 'admin') {
    header('Location: ./upload_file/insert.php'); 
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        
        .search-add-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .search-add-container form {
            display: flex;
            gap: 10px;
        }
        .table-container {
            max-width: 80%;
            margin: 0 auto;
        }
        .table {
            font-size: 12px;
        }
        .table th, .table td {
            padding: 8px;
        }
    </style>
</head>
<body>
    <!-- =============== Navigation ================ -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-auto bg-light p-0">
                <div class="navigation">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">
                                <span class="icon">
                                    <ion-icon name="library-outline"></ion-icon>
                                </span>
                                <span class="title">Edu-Journal</span>
                            </a>
                        </li>
                        <!-- Navigation items -->
                        <li class="nav-item">
                            <a class="nav-link" href="./dashboard.php">
                                <span class="icon">
                                    <ion-icon name="home-outline"></ion-icon>
                                </span>
                                <span class="title">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./users.php">
                                <span class="icon">
                                    <ion-icon name="people-outline"></ion-icon>
                                </span>
                                <span class="title">Users</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./contacts.php">
                                <span class="icon">
                                    <ion-icon name="chatbubble-outline"></ion-icon>
                                </span>
                                <span class="title">Contacts</span>
                            </a>
                        </li>
                       
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span class="icon">
                                    <ion-icon name="settings-outline"></ion-icon>
                                </span>
                                <span class="title">Uploads</span>
                            </a>
                        </li>
                       
                        <li class="nav-item">
                            <a class="nav-link" href="../sign_out.php">
                                <span class="icon">
                                    <ion-icon name="log-out-outline"></ion-icon>
                                </span>
                                <span class="title">Sign Out</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- ========================= Main ==================== -->
            <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
                    <div class="user">
                        <img src="assets/imgs/coco.jpg" alt="User Image" class="img-fluid rounded-circle" style="width: 40px;">
                    </div>
                </div>

                <!-- Content -->
                <div class="main">
                    <div class="search-add-container">
                        <form action="../search.php" method="GET" class="d-flex">
                            <input type="text" name="search" placeholder="Search by name..." class="form-control me-2" required>
                            <button type="submit" class="btn btn-primary">Search</button>
                        </form>
                        <a href="../create.php" class="btn btn-primary" role="button">Add</a>
                    </div>
                    <h4 class="text-center mb-4">Users</h4>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>User Type</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM users";
                                $result = $conn->query($sql);

                                if ($result === false) {
                                    // Display the SQL error for debugging purposes
                                    echo "<tr><td colspan='6'>Error: " . $conn->error . "</td></tr>";
                                } else if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>
                                            <td>" . htmlspecialchars($row["id"]) . "</td>
                                            <td>" . htmlspecialchars($row["name"]) . "</td>
                                            <td>" . htmlspecialchars($row["email"]) . "</td>
                                            <td>" . htmlspecialchars($row["password"]) . "</td>
                                            <td>" . htmlspecialchars($row["usertype"]) . "</td>
                                            <td>
                                                <a class='btn btn-primary btn-sm' href='../edit.php?id=" . htmlspecialchars($row['id']) . "'>Update</a>
                                                <a class='btn btn-danger btn-sm' href='../delete.php?id=" . htmlspecialchars($row['id']) . "'>Delete</a>
                                            </td>
                                        </tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='6'>No users found</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- =========== Scripts =========  -->
    <script src="assets/js/main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
