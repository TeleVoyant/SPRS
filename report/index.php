<?php
session_start();

require_once('config.php');

$msg = ""; // Initialize the message variable

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
    $query = "SELECT * FROM registration WHERE username = '$username' AND role = '$role'";
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
            $msg = "Incorrect password.";
        }
    } else {
        // No user found
        $msg = "Invalid username or role.";
    }

    // Close the database connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cive srs - Login</title>
<link rel="stylesheet" href="srs.css" type="text/css">
<link rel="stylesheet" href="styles.css" type="text/css">
</head>
<body>
    <br><br><br><br>
    <div class="container">
    <h1 >Cive Student's Reporting System</h1>
    <div class="speaker-icon"></div>

    <form id="loginForm" action="" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        
        <label for="role">Login as:</label>
        <select id="role" name="role" class="roles">
        <option value="" selected disabled>Choose to login as</option>
          <option value="user">Student</option>
          <option value="admin">Admin</option>
        </select>
        
        <input type="submit" value="Login">
        <br> 
        <center> <?php if (!empty($msg)) echo "<p style='color: red;'>$msg<p>"; ?> </center>
        <br>
        <p class="register-link">Don't have an account? <a href="register.php">Register here</a></p>
    </form>
    
    <footer>
        <p>&copy; <?php echo date("Y"); ?> Shadrack T John. All rights reserved.</p>
    </footer>
  </div>






  
</body>
</html>
