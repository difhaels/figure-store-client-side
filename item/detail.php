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

    <div class="pt-28 flex">
        <div class="lg:w-1/2">
            <img src="../img/item/<?= $item['image'] ?>" alt="<?= $item['code'] ?>" class="h-56 mx-auto">
            <div class="flex justify-center gap-2 mt-2">
                <img src="../img/sub/<?= $item['image1'] ?>" alt="<?= $item['code'] ?>1" class="h-56">
                <img src="../img/sub/<?= $item['image2'] ?>" alt="<?= $item['code'] ?>2" class="h-56">
            </div>
            <div class="flex justify-center gap-2 mt-2">
                <img src="../img/sub/<?= $item['image3'] ?>" alt="<?= $item['code'] ?>3" class="h-56">
                <img src="../img/sub/<?= $item['image4'] ?>" alt="<?= $item['code'] ?>4" class="h-56">
            </div>
        </div>
        <div class="lg:w-1/2 pt-[50px]">

            <h1 class="text-xl"><?= $item['source'] ?> - <?= $item['name'] ?> - <?= $item['type'] ?> #<?= $item['code'] ?></h1>
            <a href="">
                <div class="mt-3 bg-[#E7230D] w-[210px] rounded-lg text-white font-semibold px-5 py-3 flex justify-between">
                    <h1>Buy Now</h1>
                    <h1>Rp <?= number_format($item['price'], 0, ',', '.'); ?></h1>
                </div>
            </a>

            <div class="mt-7 px-5 border border-black rounded-lg w-fit bg-[#EEEDED]">
                <h1 class="text-xl font-bold py-3">Transaction Flow</h1>
                <div class="flex gap-3 pb-5">
                    <div class="w-[160px] bg-white rounded-lg flex items-center justify-center gap-3 py-2">
                        <img src="../img/icon/transfer.png" alt="transfer" class="h-10">
                        <h1>Transfer</h1>
                    </div>
                    <div class="w-[160px] bg-white rounded-lg flex items-center justify-center gap-3 py-2">
                        <img src="../img/icon/send.png" alt="send" class="h-10">
                        <h1>Send</h1>
                    </div>
                    <div class="w-[160px] bg-white rounded-lg flex items-center justify-center gap-3 py-2">
                        <img src="../img/icon/receive.png" alt="receive" class="h-10">
                        <h1>Receive</h1>
                    </div>
                </div>
            </div>

            <div class="pt-7 flex gap-10">
                <div>
                    <h1 class="text-slate-400">Type</h1>
                    <h1><?= $item['type'] ?></h1>
                </div>
                <div>
                    <h1 class="text-slate-400">Dimensions</h1>
                    <h1><?= $item['dimensions'] ?></h1>
                </div>
                <div>
                    <h1 class="text-slate-400">Material</h1>
                    <h1><?= $item['material'] ?></h1>
                </div>
            </div>
        </div>
    </div>
</body>

</html>