<?php

require('../function/functions.php');

$id = $_GET['id'];
$item = read("SELECT * FROM item WHERE id = $id")[0];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Detail</title>
    <link rel="stylesheet" href="../css/output.css">
</head>

<body>
    <div class="bg-purple-700 py-5 text-white flex items-center fixed w-full justify-between px-3 lg:px-10">
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

    <div class="pt-24 bg-red-300">
        <div>
            <img src="../img/item/<?= $item['image'] ?>" alt="<?= $item['name'] ?>" class="h-40 mx-auto">
        </div>
        <div></div>
    </div>
</body>

</html>