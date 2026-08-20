<?php

header("Content-Type: application/json");

include "db.php";

$username = $_POST['username'] ?? "";
$password = $_POST['password'] ?? "";


$sql = "SELECT * FROM users
        WHERE username = ? OR email = ?";

$stmt = $conn->prepare($sql);

$stmt->bind_param("ss", $username, $username);

$stmt->execute();

$result = $stmt->get_result();


if ($result->num_rows > 0) {

    $user = $result->fetch_assoc();

    if ($password === $user['password']) {

        $status = "Successful";

    } else {

        $status = "Failed";
    }

} else {

    $status = "Failed";
}


// JSON result পাঠানো

echo json_encode([
    "username" => $username,
    "status" => $status
]);

$stmt->close();
$conn->close();

?>