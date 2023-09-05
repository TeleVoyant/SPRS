<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
header('Location: login.php');
exit;
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <title>Cive srs</title>
        <style>
body {
    font-family: Arial, sans-serif;
    background-color: #f7f7f7;
    margin: 0;
    padding: 0;
}
  .container {
      background-color: #fff;
      border-radius: 10px;
      padding: 20px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
  }
  h1 {
      text-align: center;
      color:#000080; 
      padding: 20px 0; 
  }
  form {
      max-width: 330px; 
      margin: 0 auto;
  }
  label {
      font-weight: bold;
      margin-bottom: 5px;
      display: block;
  }
  input[type="text"],
  input[type="number"],
  select,
  textarea,
  input[type="submit"] {
      width: 100%;
      padding: 10px; 
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      font-size: 14px;
      box-sizing: border-box; 
  }
  textarea {
      resize: vertical;
  }
  input[type="submit"] {
      background-color: #007bff;
      color: #fff;
      border: none;
      cursor: pointer;
      transition: background-color 0.3s ease;
  }
  input[type="submit"]:hover {
      background-color: #0056b3;
  }
  .categ {
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 5px;
      font-size: 14px;
      width: 100%;
  }
  .speaker-icon {
      width: 100px;
      height: 100px;
      position: relative;
      border-radius: 50%;
      background-color: #1E90FF; 
      margin: 0 auto;
  }
  .speaker-icon::before {
      content: "";
      position: absolute;
      top: 40px;
      left: 35px;
      width: 30px;
      height: 20px;
      border-radius: 8px;
      background-color: #fff;
  }
  .speaker-icon::after {
      content: "";
      position: absolute;
      top: 45px;
      left: 65px;
      width: 10px;
      height: 10px;
      border-radius: 50%;
      background-color: #fff;
  }
  .sidebar {
      height: 100%;
      width: 0;
      position: fixed;
      top: 0;
      left: 0;
      background-color: #000080; 
      overflow-x: hidden;
      transition: 0.5s;
      padding-top: 60px;
  }
  .sidebar a {
      padding: 15px;
      text-decoration: none;
      font-size: 20px;
      color: #fff;
      display: block;
      transition: 0.3s;
  }
  .sidebar a i {
      margin-right: 10px;
  }
  .sidebar a:hover {
      color: #00a1f1;
  }
  .content {
      margin-left: 250px;
      padding: 20px;
  }
  .menu-icon {
      font-size: 24px;
      color: #00a1f1;
      cursor: pointer;
  }
  .logout {
      position: fixed;
      bottom: 20px;
      left: 20px;
  }
        </style>
    </head>
    <body>
        <div class="sidebar" id="sidebar">
            <a href="javascript:void(0);" onclick="closeNav();"><i class="fas fa-times"></i> Close</a>
            <a href="user_dashboard.php"><i class="fas fa-home"></i> Home</a>
            <a href="#"><i class="fas fa-exclamation"></i> About</a>
            <a href="#"><i class="fas fa-question-circle"></i> Help</a>
            <a href="settings.html"><i class="fas fa-cog"></i> Settings</a>
            <a href="displaySettings.html"><i class="fas fa-user"></i> My profile</a>
            <a href="#"><i class="fas fa-user-friends"></i> Friends</a>
            <a href="#"><i class="fas fa-bell"></i> Notifications</a>
            <a href="#"><i class="fas fa-edit"></i> Edit my report</a>
            <a href="#"><i class="fas fa-eye"></i> See my reports</a>
            <a href="#"><i class="fas fa-eraser"></i> Delete reports</a> 
            <a href="#"><i class="fas fa-key"></i> Change Password</a>
            <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Log Out</a>
        </div>
        <div class="content">
            <span class="menu-icon" onclick="openNav();">&#9776;</span>
        </div>
        <script>
            function openNav() {
                document.getElementById("sidebar").style.width = "250px";
            }
            function closeNav() {
                document.getElementById("sidebar").style.width = "0";
            }
        </script>
        <div class="container">
            <h1 >Cive Student's Reporting System.</h1>
            <div class="speaker-icon"></div>
            <form id="feedbackForm" action="" method="POST">
                <label for="fullName">Full Name:</label>
                <input type="text" id="fullName" name="fullName" placeholder="Max Mpiah Nzengeli" required>
                <!-- Other form fields and elements -->
                <label for="studentID">Student ID:</label>
                <input type="text" id="studentID" name="studentID" placeholder="T22-03-0000" required>
                <label for="yearOfStudy">Year of Study:</label>
                <input id="yos" name="yos" type="number" min="1" max="5" required>
                <label for="programme">Programme:</label>
                <select id="programme" name="programme" required>
                    <option value="" selected disabled>Select your programme</option>
                    <option value="Bsc. Computer Science ">Bsc. Computer Science</option>
                    <option value="Bsc. Computer Engineering">Bsc. Computer Engineering</option>
                    <option value="Bsc. Telecommunication Engineering">Bsc. Telecommunication Engineering</option>
                    <option value="Bsc. Computer Networking And Information Security">Bsc. Computer Networking And Information Security</option>
                    <option value="Bsc. Multimedia Technology & Animation">Bsc. Multimedia Technology & Animation</option>
                    <option value="Bsc. Software Engineering">Bsc. Software Engineering</option>
                    <option value="Bsc. Information System Management">Bsc. Information System Management</option>
                    <option value="Bsc. Business Information System">Bsc. Business Information System</option>
                    <option value="Bsc. Healthy Information System">Bsc. Healthy Information System</option>
                    <option value="Bsc. CSDFE">Bsc. CSDFE</option>
                    <option value="Bsc. DCBE">Bsc. DCBE</option>
                    <option value="Bsc. ICT-MCD">Bsc. ICT-MCD</option>
                    <option value="Bsc. DCS">Bsc. DCS</option>
                    <option value="Bsc. DCSDF">Bsc. DCSDF</option>
                    <option value="Bsc. DET">Bsc. DET</option>
                    <option value="Bsc. DICT">Bsc. DICT</option>
                    <option value="Bsc. IDIT">Bsc. IDIT</option>
                    <option value="Diploma in Computer Science">Diploma in Computer Science</option>
                    <option value="Diploma in Cyber Security And Digitak Forensic">Diploma in Cyber Security And Digital Forensic</option>
                    <option value="Diploma in DET">Diploma in DET</option>
                    <option value="Diploma in ICT">Diploma in ICT</option>
                    <option value="Diploma in DICT">Diploma in DICT</option>
                </select>
                <label for="phoneNumber">Phone Number:</label>
                <input id="phoneNumber" name="phoneNumber" type="number">
                <label for="email">Email:</label>
                <input type="text" id="email" name="email">
                <label for="department">Department:</label>
                <input type="text" id="department" name="department" required>
                <label for="feedbackCategory">Feedback Report Category:</label>
                <select id="feedbackCategory" name="reportCategory" required class="categ">
                    <option value="" disabled selected>Select Feedback Category</option>
                    <option value="Academic Courses">Academic Courses</option>
                    <option value="Faculty Performance">Faculty Performance</option>
                    <option value="Campus Facilities">Campus Facilities</option>
                    <option value="Extracurricular Activities">Extracurricular Activities</option>
                    <option value="Administrative Services">Administrative Services</option>
                    <option value="Overall Campus Experience">Overall Campus Experience</option>
                    <option value="Other">I have other things to feed or report</option>
                </select>
                <label for="specificFeedback">Specific Feedback Report:</label>
                <label for="rating">Rating (Scale of 1 to 5):</label>
                <input type="number" id="rating" name="rating" min="1" max="5" required>
                <label for="comments">Comments or Suggestions:</label>
                <textarea id="comments" name="comments" rows="4" required></textarea>
                <br>
                <input type="submit" value="Submit">
            </form>
        </div>
    </body>
</html>
