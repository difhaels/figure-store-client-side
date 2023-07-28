<?php
session_start();
if (isset($_SESSION["login"])) {
} else {
    header("Location: ./login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
</head>

<body>
    <h1>hai</h1>
</body>

</html>