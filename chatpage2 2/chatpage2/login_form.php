<!DOCTYPE html>
<html>
<head>
    <title>Student Login</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container l-5 p-5" style=" box-shadow: 10px 5px 8px 10px rgb(215, 213, 211); border-radius:10px; margin-top:50px;">
    <div class="col m-5">
    <h2>Student Login</h2>
    </div>
    <form class="form" method="post" action="login.php" id="loginform">
        <div class="col m-3">
        Year of Study: 
        <select class="form-control" id="year" name="yos" >
            <option value="" selected disabled>select here..</option>
            <option value="1">1st year</option>
            <option value="2">2nd year</option>
            <option value="3">3rd year</option>
            <option value="4">4th year</option>
        </select>
        </div>
        <!-- <div class="col m-3" id="atno">
            AT Number: <input type="text" class="form-control" name="ATnumber" id="ATnumber">
        </div> -->
        <div class="col m-3" id="tno">
            <label for="registration" id="regno">AT/T Number: </label>
            <input type="text" class="form-control" name="regnumber" id="regnumber">
        </div>
        <div class="col m-3" id="password">
            Password:
        <input class="form-control" type="password" name="password" required>
        </div>
        <div class="col m-3" id="submit">
        <input class="btn btn-primary" type="submit" value="Login">
        <label for="" style="margin-left: 50px;">If you have NOT registered click</label>  <a class="btn btn-warning" href="registration.php">here!</a>
        </div>
    </form>
    </div>

</body>
    <script src="js/loginscript.js"></script>
    <script src="js/bootstrap.min.js"></script>   

</html>