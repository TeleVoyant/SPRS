<?php
include "config.php";

$msg = ""; // Initialize the message variable

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $role = $_POST['role'];

    if (strlen($password) < 8) {
        $msg = "Password must be at least 8 characters long.";
    } elseif ($password !== $confirmPassword) {
        $msg = "Passwords do not match.";
    } else {
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Connect to the database
        $conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare and execute the query to insert user data
        $query = "INSERT INTO registration (username, password, role) VALUES ('$username', '$hashedPassword', '$role')";

        if ($conn->query($query)) {
            echo "Registration successful!";
            header("Location: index.php");
            exit();
        } else {
            echo "Error: " . $query . "<br>" . $conn->error;
        }

        // Close the database connection
        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="styles.css" type="text/css">
<link rel="stylesheet" href="srs.css" type="text/css">
<title>Cive srs- Register</title>
</head>
<body>
    <br><br><br>
  <div class="container">
    
    <div class="speaker-icon"></div>

    <form id="registerForm" action="" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        
        <label for="confirmPassword">Confirm Password:</label>
        <input type="password" id="confirmPassword" name="confirmPassword" required>

        <label for="role">Register as:</label>
        <select id="role" name="role" class="roles">
        <option value="" selected disabled>Choose to register as</option>
          <option value="user">Student</option>
          <option value="admin">Admin</option>
        </select>
        
        <input type="submit" value="Register">
        <br><br>
        <center> <?php if (!empty($msg)) echo "<p style='color: red;'>$msg</p>"; ?> </center>
    </form>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Shadrack T John. All rights reserved.</p>
    </footer>
  </div> 
</body>
</html>
