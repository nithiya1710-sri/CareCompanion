<?php
session_start();

$host = "localhost";
$username = "root";
$password = "";
$database = "your_database_name";

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $user_type = $row['user_type']; // Assuming 'user_type' is the column name in your users table
        $_SESSION['username'] = $username;
        if ($user_type == 'doctor') {
            header("Location: doctor-dashboard.html"); // Redirect to doctor dashboard
            exit();
        } else {
            header("Location: user-dashboard.html"); // Redirect to user dashboard
            exit();
        }
    } else {
        echo "Invalid username or password";
    }
}

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
    mysqli_query($conn, $sql);

    $_SESSION['username'] = $username;
    header("Location: dashboard.php");
    exit();
}

mysqli_close($conn);
?>