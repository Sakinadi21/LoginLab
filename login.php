<?php

include "db.php";

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users 
        WHERE username = ? OR email = ?";

$stmt = $conn->prepare($sql);

$stmt->bind_param("ss", $username, $username);

$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows > 0) {

    $user = $result->fetch_assoc();

    if ($password == $user['password']) {

        $status = "Successful";

    } else {

        $status = "Failed";
    }

} else {

    $status = "Failed";
}


/* Save login attempt */

$sql2 = "INSERT INTO login_attempts
         (username_or_email, password, status)
         VALUES (?, ?, ?)";

$stmt2 = $conn->prepare($sql2);

$stmt2->bind_param(
    "sss",
    $username,
    $password,
    $status
);

$stmt2->execute();


/* Send result */

header("Location: result.php?status=" . $status);

exit();

?>