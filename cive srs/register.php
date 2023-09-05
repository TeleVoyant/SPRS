<?php

require_once'db-conn.php';
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
        $msg = "please fill all the necessary fields, (including leadership selection above)";
    } else {
        // Check connection
        if (!$conn) {
            $msg = "Connection failed: " . mysqli_connect_error() . ". check your configurations.";
        }
        // prevent mysql injections

        $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
        $middleName = mysqli_real_escape_string($conn, $_POST['middleName']);
        $surname = mysqli_real_escape_string($conn, $_POST['surname']);
        $ATnumber = mysqli_real_escape_string($conn, $_POST['ATnumber']);
        $Tnumber = mysqli_real_escape_string($conn, $_POST['Tnumber']);
        $gender = mysqli_real_escape_string($conn, $_POST['gender']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $yos = mysqli_real_escape_string($conn, $_POST['yos']);
        $progCode = mysqli_real_escape_string($conn, $_POST['progCode']);
        $leadership = mysqli_real_escape_string($conn, $_POST['leadership']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $confirmPassword = mysqli_real_escape_string($conn, $_POST['confirmPassword']);

        if (strlen($password) < 8) {
            $msg = "Password must be at least 8 characters long.";
        } elseif ($password !== $confirmPassword) {
            $msg = "Passwords do not match.";
        } else {

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);


            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $query = "INSERT INTO registration (username, password, role) VALUES ('$username', '$hashedPassword', '$role')";

            if ($conn->query($query)) {
                echo "Registration successful!";
                header("Location: index.php");
                exit();
            } else {
                echo "Error: " . $query . "<br>" . $conn->error;
            }


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
