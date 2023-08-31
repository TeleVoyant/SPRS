<?php
require_once('config.php'); // Include your database connection configuration

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Extract form data
    $full_name = $_POST['full_name'];
    $student_id = $_POST['student_id'];
    $email = $_POST['email'];
    $department = $_POST['department'];
    $feedback_category = $_POST['feedback_category'];
    $rating = $_POST['rating'];
    $comments = $_POST['comments'];
    $is_anonymous = isset($_POST['is_anonymous']) ? 1 : 0;
    $additional_comments = $_POST['additional_comments'];
    $recaptcha_response = $_POST['g-recaptcha-response'];

    // Verify reCAPTCHA response
    $recaptcha_secret = 'recaptcha_secret_key';
    $recaptcha_url = "https://www.google.com/recaptcha/api/siteverify?secret=$recaptcha_secret&response=$recaptcha_response";
    $recaptcha_data = file_get_contents($recaptcha_url);
    $recaptcha_result = json_decode($recaptcha_data);

    if (!$recaptcha_result->success) {
        echo "reCAPTCHA verification failed. Please go back and try again.";
    } else {
        // Insert data into the database
        $query = "INSERT INTO feedback (full_name, student_id, email, department, feedback_category, rating, comments, is_anonymous, additional_comments, recaptcha_response) 
                  VALUES ('$full_name', '$student_id', '$email', '$department', '$feedback_category', $rating, '$comments', $is_anonymous, '$additional_comments', '$recaptcha_response')";
        
        if (mysqli_query($conn, $query)) {
            echo "Thank you for your feedback!";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
    }

    mysqli_close($conn);
} else {
    echo "Invalid request.";
}
?>
