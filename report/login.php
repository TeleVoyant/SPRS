<?php
session_start();

require_once('config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Connect to the database
    $conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute the query to fetch user information
    $query = "SELECT * FROM users WHERE username = '$username' AND role = '$role'";
    $result = $conn->query($query);

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // Verify the password
        if (password_verify($password, $user['password'])) {
            // Password is correct, proceed based on role
            if ($role === 'user') {
                $_SESSION['user_id'] = $user['id'];
                header("Location: user_dashboard.php");
                exit();
            } elseif ($role === 'admin') {
                $_SESSION['admin_id'] = $user['id'];
                header("Location: admin_dashboard.php");
                exit();
            }
        } else {
            // Incorrect password
            echo "Incorrect password.";
        }
    } else {
        // No user found
        echo "Invalid username or role.";
    }

    // Close the database connection
    $conn->close();
}
?>
