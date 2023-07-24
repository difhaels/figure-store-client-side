<?php
require('function/functions.php');

// menampilkan item
$items = read("SELECT * FROM item");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Figure Store Client Site</title>
    <link rel="stylesheet" href="./css/output.css">
</head>

<body>
    <div class="bg-bg2 py-5 text-white flex items-center fixed w-full justify-between px-10">
        <div class="flex items-end">
            <h1 class="font-extrabold text-4xl">FIGURE STORE</h1>
            <h1>.client side</h1>
        </div>
        <div class="flex gap-6">
            <a href="">
                <img src="./img/icon/user.png" class="w-[70px] lg:w-[45px] change-color">
            </a>
            <a href="">
                <img src="./img/icon/shop.png" class="w-[66px] lg:w-[42px] change-color">
            </a>
        </div>
    </div>
    <div class="p-10 pt-40 lg:pt-32 flex justify-">
        <label for="sort">Sort By</label>
        <select id="sort" name="sort">
            <option value="newest">Newest</option>
            <option value="oldest">Oldest</option>
            <option value="highest">Highest Price</option>
            <option value="lowest">Lowest Price</option>
        </select>
    </div>
    <div>
        <div class="flex flex-wrap gap-3 justify-center">

            <?php foreach ($items as $item) : ?>
                <div class="item">
                    <img src="./img/item/<?= $item["image"] ?>" alt="<?= $item["name"] ?>" class="item-gambar">
                    <h1 class="text-center py-2"><?= $item["name"] ?></h1>
                    <div class="px-5 flex justify-center items-center gap-5 mb-3">
                        <a href="item/update.php?id=<?= $item['id'] ?>" class="bg-red-500 text-white px-3 py-2">
                            <div class="text-center text-[13px]">
                                <h1>Pre-Order</h1>
                                <h1>Rp. <?= $item['price'] ?></h1>
                            </div>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</body>

</html>