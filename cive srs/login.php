<?php
session_start();
require_once 'db-conn.php';
if (isset($_SESSION['loggedin'])) {
    // redirection
    if ($_SESSION['role'] === 'admin') {
        header("Location: dashboard_admin.php");
    } else {
        header("Location: dashboard_user.php");
    }
    exit;
}

$msg = ""; // Initialize the message variable

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['username'], $_POST['password'])) {
        $msg = "please fill all the necessary fields, (including role selection above)";
    } else {
        // Check connection
        if (!$conn) {
            $msg = "Connection failed: " . mysqli_connect_error() . ". check your configurations.";
        }
        // prevent mysql injections
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        //$role = mysqli_real_escape_string($conn,$_POST['role']);

        // Prepare and execute the query to fetch user information
        $stmt = $conn->prepare('SELECT id, password, role FROM registration WHERE username = ?');
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $pass, $role);
            $stmt->fetch();
            // Verify the password
            if (password_verify($password, $pass)) {
                // Password is correct, proceed based on role
                session_regenerate_id();
                $_SESSION['loggedin'] = TRUE;
                $_SESSION['id'] = $id;
                $_SESSION['name'] = $username;
                $_SESSION['role'] = $role;
                // redirection
                if ($_SESSION['role'] === 'admin') {
                    header("Location: dashboard_admin.php");
                } else {
                    header("Location: dashboard_user.php");
                }
                exit;
            } else {
                // Incorrect password
                $msg = "Incorrect Password.";
            }
        } else {
            // No user found
            $msg = "Incorrect Username.";
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
        <p>&copy; <?php echo date("Y"); ?> UDOM All rights reserved.</p>
    </footer>
  </div>
</body>
</html>
