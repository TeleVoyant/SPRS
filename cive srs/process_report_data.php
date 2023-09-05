<?php
require_once('config.php'); 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // We are posting them kwenye db..
    $full_name = $_POST['full_name'];
    $student_id = $_POST['student_id'];
    $email = $_POST['email'];
    $department = $_POST['department'];
    $report_category = $_POST['report_category'];
    $rating = $_POST['rating'];
    $comments = $_POST['comments'];
   
        $query = "INSERT INTO feedback (full_name, student_id, email, department, report_category, rating, comments) 
                  VALUES ('$full_name', '$student_id', '$email', '$department', '$report_category', $rating, '$comments')";
        
        if (mysqli_query($conn, $query)) {
            echo "Thank you for your feedback report!";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
    }

    mysqli_close($conn);
 else {
    echo "Invalid request.";
}
?>
