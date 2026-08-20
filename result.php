<?php

$status = $_GET['status'];

?>

<!DOCTYPE html>
<html>

<head>

    <title>Login Result</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="login-box">

<?php if ($status == "Successful") { ?>

    <h2>Login Successful</h2>

    <p>Welcome! You have logged in successfully.</p>

<?php } else { ?>

    <h2>Login Failed</h2>

    <p>Invalid username/email or password.</p>

<?php } ?>

<br>

<a href="index.html">Back to Login</a>

<br><br>

<a href="manage.php">View Login Attempts</a>

</div>

</body>

</html>