
<?php
include("db_connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $regnumber = $_POST["regnumber"];
    $password = $_POST["password"];
    
    // You should perform data validation and sanitization here.

    $sql = "SELECT * FROM student WHERE (ATnumber = '$regnumber' OR Tnumber = '$regnumber') AND psswd = '$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        header('location: https://www.google.com');
        //echo "Login successful!";
        // Redirect to a dashboard or another page
    } else {
        echo "Login failed. Invalid email or password.";
    }
}

mysqli_close($conn);
?>
