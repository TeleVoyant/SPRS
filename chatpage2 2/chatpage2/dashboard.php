<?php
// session_start(); // Anza kikao

// // Angalia kama kikao kimeanzishwa (yaani, mtumiaji amesajiliwa)
// if (!isset($_SESSION['firstName'])) {
//     // Kikao hakipo, hivyo mtumiaji hajaruhusiwa kuingia
//     header("Location: login_form.php");
//     exit();
// }
// // Ikiwa kikao kipo, basi unaweza kuonyesha ukurasa wa dashboard
// $firstName = $_SESSION['firstName']; // Pata jina la mwanafunzi kutoka kikao
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    WELCOME TO DASHBOARD
    <?php echo $firstName?>
</body>
</html>