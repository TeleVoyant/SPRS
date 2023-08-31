<?php

require_once('config.php');
// include "config.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
    // Extract form data
    $full_name = $_POST['full_name'];
    $student_id = $_POST['student_id'];
    $email = $_POST['email'];
    $department = $_POST['department'];
    $feedback_category = $_POST['feedback_category'];
    $rating = $_POST['rating'];
    $comments = $_POST['comments'];

        // Insert data into the database
        $query = "INSERT INTO feedback (full_name, student_id, email, department, feedback_category, rating, comments) 
                  VALUES ('$full_name', '$student_id', '$email', '$department', '$feedback_category', $rating, '$comments')";
        
        if (mysqli_query($conn, $query)) {
            echo  "Thank you for your feedback!";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
}

    mysqli_close($conn);
 else {
    echo "Invalid request.";
}
?>