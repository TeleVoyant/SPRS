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
        <link rel="stylesheet" href="adminstyles.css">
        <title>Cive srs</title>
        <style>
.box{
    background-color: whitesmoke;
    padding: 0.3rem 1rem;
    border-left: 4px pink solid;
    margin: 1rem;
    flex-basis: 45%;
    border-radius: 5px;
    box-shadow: 7px 7px 4px rgba(0, 0, 0, 0.25);
    background-color: white;
}
        </style>

    </head>
    <body>

        <div class="dashboard-container">
            <div class="sidebar">
                <div class="logo"> <img src="user-profile.avif" alt="Profile Picture"    width="180px" height="180px" style=" border-radius:100px ";></div>
                <BR>

                <section class=Sysname> 
                    <H2> Cive Srs</H2>
                </section>

                <h3>System Administrator </h3>
                <br><br>
                <ul class="menu">
                    <li><a href="admin_dashboard.php">Dashboard</a></li>
                    <li><a href="#">Reports </a></li>
                    <li><a href="#">Users</a></li>
                    <li><a href="#">Settings </a></li>
                    <li><a href="#">Notifications </a></li>
                    <li><a href="#">My profile</a></li>
                    <li><a href="#">Register New Admin </a></li>
                    <li><a href="#">Change password </a></li>
                    <li><a href="logout.php">Log out </a></li>
                </ul>
            </div>
            <div class="content">
                <div class="header">
                    <h1><span style= "color: green";> <?=$_SESSION['name']?> </span> , Welcome to the Dashboard</h1> 
                    <div class="user-profile">
                        <span><a href="logout.php"><button class="btn">Log out  </button>  </a></span>
                    </div>
                </div>
                <div class="overview">
                    <div class="box">
                        <h2>Total issues Reported</h2>
                        <p id="totalReports">   68 <!-- inabidi kuwa dynamic from db -->  </p>
                        <button class="btns"><a href="#">View More </a> </button>
                    </div>
                    <div class="box">
                        <h2>Total Users</h2> 
                        <p id="totalUsers">   75 <!-- inabidi kuwa dynamic from db -->    </p>
                        <button class="btns"><a href="#">View More </a> </button>
                    </div>
                    <div class="box">
                        <h2> New Reports</h2>
                        <p id="newReports"> 21 <!-- inabidi kuwa dynamic from db --></p>
                        <button class="btns"><a href="#">View More </a> </button>
                    </div>
                    <br>
                    <div class="box">
                        <h2> New users <!-- We'll think about something else --> </h2>
                        <p id="  "> 70</p>
                        <button class="btns"><a href="#">View More </a> </button>
                    </div>
                    <div class="box">
                        <h2> New thing <!-- We'll think about something else --> </h2>
                        <p id=" "> 30 </p>
                        <button class="btns"><a href="#">View More </a> </button>
                    </div>
                    <div class="box">
                        <h2> New thing <!-- We'll think about something else --> </h2>
                        <p id="  "> 10 </p>
                        <button class="btns"><a href="#">View More </a> </button>
                    </div>
                    <br>
                    <div class="box">
                        <h2>Another Admin </h2>
                        <p id=" "> 
                        <img src="user-profile.avif" alt="Profile Picture"    width="100px" height="100px" style=" border-radius:100px ";>
                        <small> Nyingi Jackson </small>
                        </p>
                    </div>
                    <div class="box">
                        <h2>Another Admin </h2>
                        <p id=" ">

                        <img src="user-profile.avif" alt="Profile Picture"    width="100px" height="100px" style=" border-radius:100px ";>
                        <small> Young Shelly </small>
                        </p>
                    </div>
                    <div class="box">
                        <h2>Another Admin </h2>
                        <p id=" ">
                        <img src="user-profile.avif" alt="Profile Picture"    width="100px" height="100px" style=" border-radius:100px ";>
                        <small> Sudo Chenai</small>
                        </p>
                    </div>
    </body>
</html>
