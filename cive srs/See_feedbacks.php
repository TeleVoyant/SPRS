<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>See reports</title>

    <style>

body, table {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
}


body {
    background-color: #f5f5f5;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}


table {
    width: 90%;
    max-width: 1000px;
    border-collapse: collapse;
    background-color: #fff;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    border-radius: 5px;
    overflow: hidden;
    margin-bottom: 50px;
}

table th, table td {
    padding: 12px 15px;
    text-align: left;
    font-weight: normal;
    color: #333;
}

table th {
    background-color: #f2f2f2;
}


table th {
    border-bottom: 1px solid #ddd;
}

table tr {
    border-bottom: 1px solid #ddd;
}


table tr:hover {
    background-color: #f9f9f9;
}


@media screen and (max-width: 768px) {
    table {
        font-size: 14px;
    }

    table th, table td {
        padding: 10px;
    }
}


.search-container {
    text-align: center;
    margin-bottom: 20px;
}


#searchInput {
    padding: 10px;
    width: 100%;
    max-width: 300px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    transition: border-color 0.3s;
}

#searchInput:focus {
    outline: none;
    border-color: #007bff;
}




</style>
</head>
<body>
   <!--  Search bar itakaa hapa
     <div class="search-container">
        <input type="text" id="searchInput" placeholder="Search feedback...">
    </div>
   -->

<?php
  
    require_once 'config.php';

    // chomoa reports from db
    $sql = "SELECT * FROM feedback ORDER BY timestamp DESC";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo '<table>';
        echo '<tr>';
        echo '<th>Full Name</th>';
        echo '<th>Student ID</th>';
        echo '<th>Email</th>';
        echo '<th>Department</th>';
        echo '<th>Report Category</th>';
        echo '<th>Rating</th>';
        echo '<th>Comments</th>';
        echo '</tr>';

        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>' . $row['full_name'] . '</td>';
            echo '<td>' . $row['student_id'] . '</td>';
            echo '<td>' . $row['email'] . '</td>';
            echo '<td>' . $row['department'] . '</td>';
            echo '<td>' . $row['report_category'] . '</td>';
            echo '<td>' . $row['rating'] . '</td>';
            echo '<td>' . $row['comments'] . '</td>';
            echo '</tr>';
        }

        echo '</table>';
    } else {
        echo 'No report from students available.';
    }

    
    mysqli_close($conn);
?>

</body>
</html>