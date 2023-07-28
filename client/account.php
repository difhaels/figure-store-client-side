<?php
session_start();
// set cookie | cek ada cookie atau tidak
if (isset($_COOKIE['key'])) {
    $_SESSION['login'] = true;
}

if (!isset($_SESSION["login"])) {
    header("Location: ./login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
    <link rel="stylesheet" href="../css/output.css">
</head>

<body>
    <div class="bg-red-700 py-5 text-white flex items-center fixed w-full justify-between px-3 lg:px-10">
        <div class="flex items-end">
            <a href="../index.php">
                <h1 class="font-extrabold text-xl lg:text-4xl">FIGURE STORE</h1>
            </a>
            <h1 class="text-xs lg:text-base">.client side</h1>
        </div>
        <div class="flex gap-2 lg:gap-6">
            <a href="">
                <img src="../img/icon/user.png" class="w-[35px] change-color">
            </a>
            <a href="">
                <img src="../img/icon/shop.png" class="w-[35px] change-color">
            </a>
        </div>
    </div>
    <div class="pt-24 px-10">
        <h1>Username : <?= $_SESSION["username"] ?></h1>
        <h1>No Telepon : <?= $_SESSION["notlp"] ?></h1>
        <h1>No Whatsapp: <?= $_SESSION["nowa"] ?></h1>
        <h1>Alamat : <?= $_SESSION["alamat"] ?></h1>
        <h1>Email : <?= $_SESSION["email"] ?></h1>
        <div class="mt-5">
            <a class="button-yellow">Edit</a>
            <a href="logout.php" class="button-red">Logout</a>
        </div>
    </div>
</body>

</html>