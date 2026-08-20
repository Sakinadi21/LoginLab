<?php

include "db.php";

$sql = "SELECT * FROM login_attempts
        ORDER BY id DESC";

$result = $conn->query($sql);

?>

<!DOCTYPE html>

<html>

<head>

<title>Manage Login Attempts</title>

<style>

body {
    font-family: Arial;
    background: #f2f2f2;
}

.container {
    width: 900px;
    margin: 50px auto;
    background: white;
    padding: 30px;
}

h2 {
    text-align: center;
}

table {
    width: 100%;
    border-collapse: collapse;
}

th, td {
    border: 1px solid #ccc;
    padding: 10px;
    text-align: center;
}

th {
    background: #333;
    color: white;
}

.success {
    color: green;
    font-weight: bold;
}

.failed {
    color: red;
    font-weight: bold;
}

</style>

</head>

<body>

<div class="container">

<h2>Login Attempt Management</h2>

<table>

<tr>
    <th>ID</th>
    <th>Email / Username</th>
    <th>Password</th>
    <th>Status</th>
    <th>Time</th>
</tr>

<?php

while ($row = $result->fetch_assoc()) {

?>

<tr>

<td>
    <?php echo $row['id']; ?>
</td>

<td>
    <?php echo $row['username_or_email']; ?>
</td>

<td>
    <?php echo $row['password']; ?>
</td>

<td>

<?php

if ($row['status'] == "Successful") {

    echo "<span class='success'>Successful</span>";

} else {

    echo "<span class='failed'>Failed</span>";

}

?>

</td>

<td>
    <?php echo $row['login_time']; ?>
</td>

</tr>

<?php

}

?>

</table>

<br>

<a href="index.html">Back to Login</a>

</div>

</body>

</html>