<?php include("db_connection.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Student Registration</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<div class="container l-5 p-5" style=" box-shadow: 10px 5px 8px 10px rgb(215, 213, 211); border-radius:10px; margin-top:50px;">
    <form class="p-5" method="post" action="#" id="registrationForm">
    <h2>Student Registration</h2>
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
          A simple primary alert with <a href="#" class="alert-link">an example link</a>. Give it a click if you like.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <div class="row">
        <div class="col">
        First Name: <input class="form-control" type="text" name="firstName" required>
        <div id="firstNameError" class="text-danger"></div>
        </div>
        <div class="col">
        Middle Name: <input type="text" class="form-control" name="middleName">
        <div id="middleNameError" class="text-danger"></div>
        </div>
        <div class="col">
        Surname: <input type="text" class="form-control" name="surname" required>
        <div id="surnameError" class="text-danger"></div>
        </div>
    </div>
    <div class="row">
        <div class="col">
        Year of Study: 
        <select class="form-control" id="year" name="yos" >
            <option value="" selected disabled>select here..</option>
            <option value="1">1st year</option>
            <option value="2">2nd year</option>
            <option value="3">3rd year</option>
            <option value="4">4th year</option>
        </select>
        </div>
        <div class="col" id="atno">
            AT Number: <input type="text" class="form-control" name="ATnumber" >
        </div>
        <div class="col" id="tno">
            T Number: <input type="text" class="form-control" name="Tnumber" >
        </div>
    </div>

    <div class="row">
        
        <div class="col">
        Program Name: 
                    <select class="form-control" name="progCode" id="year1" >
                        <!-- YEAR 1 STARTS HERE  -->
                        <option value="" selected disabled>select here..</option>
                        <option value="CNISE1">BSc CNISE1</option>
                        <option value="CE1">BSc CE1</option>
                        <option value="CS1">BSc CS1</option>
                        <option value="SE1">BSc SE1</option>
                        <option value="CSDFE1">BSc CSDFE1</option>
                        <option value="DCSDF1">DCSDF1</option>
                    </select>

                    <select class="form-control" name="progCode" id="year2" >
                        <!-- YEAR 2 STARTS HERE  -->
                        <option value="" selected disabled>select here..</option>
                        <option value="CNISE2">BSc CNISE2</option>
                        <option value="CE2">BSc CE2</option>
                        <option value="CS2">BSc CS2</option>
                        <option value="SE2">BSc SE2</option>
                        <option value="CSDFE2">BSc CSDFE2</option>
                        <option value="DCSDF2">DCSDF2</option>
                    
                    </select>

                    <select class="form-control" name="progCode" id="year3" >
                        <!-- YEAR 3 STARTS HERE  -->
                        <option value="" selected disabled>select here..</option>
                        <option value="CNISE3">BSc CNISE3</option>
                        <option value="CE3">BSc CE3</option>
                        <option value="CS3">BSc CS3</option>
                        <option value="SE3">BSc SE3</option>
                        <option value="CSDFE3">BSc CSDFE3</option>
                    
                    </select>

                    <select class="form-control" name="progCode" id="year4" >
                        <!-- YEAR 4 STARTS HERE  -->
                        <option value="" selected disabled>select here..</option>
                        <option value="CNISE4">BSc CNISE4</option>
                        <option value="CE4">BSc CE4</option>
                        <option value="CS4">BSc CS4</option>
                        <option value="SE4">BSc SE4</option>
                        <option value="CSDFE4">BSc CSDFE4</option>
                    
                    </select>
        </div>

        <div class="col">
            Gender: 
            <select  class="form-control" name="gender">
                <option value="M">Male</option>
                <option value="F">Female</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col">
        Email: <input type="email" class="form-control" name="email" required>
        </div>
        <div class="col">
        Telephone Number: <input type="text" class="form-control" name="phone" required>
        <div id="phoneError" class="text-danger"></div>
        </div>
        
    </div>
    <div class="row">
        <div class="col">
        Password: <input type="password" class="form-control" name="password" required>
        </div>
        <div class="col">
        Confirm Password: <input type="password" class="form-control" name="cpassword" required>
        </div>
    </div>
    <div id="passIdError" class="text-danger"></div>
    <br>
        <input type="submit" class="btn btn-primary" value="Register">
          <label for="" style="margin-left: 50px;">If you have registered click</label>  <a class="btn btn-success" href="login_form.php">here!</a>
    </div>
</form>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve other form fields
    $firstName = $_POST["firstName"];
    $middleName = $_POST["middleName"];
    $surname = $_POST["surname"];
    $ATnumber = $_POST["ATnumber"];
    $Tnumber = $_POST["Tnumber"];
    $gender = $_POST["gender"];
    $email = $_POST["email"];
    $yos = $_POST["yos"];
    $progCode = $_POST["progCode"];
    $password = $_POST["password"];
    $leadership = $_POST["leadership"];

/////////////////////////////////////////////

// Hash the password for security
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);



////////////////////////////////////////////
    // You should perform data validation and sanitization here.

    // Insert data into the student table
    $sql = "INSERT INTO student (firstName, middleName, surname, ATnumber, Tnumber, gender, email, yos, progCode, psswd)
            VALUES ('$firstName', '$middleName', '$surname', '$ATnumber', '$Tnumber', '$gender', '$email', $yos, '$progCode', '$password')";

    if (mysqli_query($conn, $sql)) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

}

?>
 </div>
</body>
<script src="js/script.js"></script>
<script src="js/bootstrap.min.js"></script>
</html>
