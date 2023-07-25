<?php
require('function/functions.php');

$items = read(sortItem(isset($_GET['sort']) ? $_GET['sort'] : "SELECT * FROM item(run else)"));
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
    <div class="bg-bg2 py-5 text-white flex items-center fixed w-full justify-between px-3 lg:px-10">
        <div class="flex items-end">
            <h1 class="font-extrabold text-xl lg:text-4xl">FIGURE STORE</h1>
            <h1 class="text-xs lg:text-base">.client side</h1>
        </div>
        <div class="flex gap-2 lg:gap-6">
            <a href="">
                <img src="./img/icon/user.png" class="w-[35px] change-color">
            </a>
            <a href="">
                <img src="./img/icon/shop.png" class="w-[35px] change-color">
            </a>
        </div>
    </div>

    <div class="px-3 lg:px-10 pt-24 lg:pt-32 pb-10 flex items-center">
        <form id="sortForm" action="" method="get">
            <label for="sort">Sort By</label>
            <select id="sort" name="sort" class="mx-2 px-3 py-1 rounded-lg">
                <option value="">Normal</option>
                <option value="newest" <?php if (isset($_GET['sort']) && $_GET['sort'] === 'newest') echo 'selected'; ?>>Newest</option>
                <option value="oldest" <?php if (isset($_GET['sort']) && $_GET['sort'] === 'oldest') echo 'selected'; ?>>Oldest</option>
                <option value="highest" <?php if (isset($_GET['sort']) && $_GET['sort'] === 'highest') echo 'selected'; ?>>Highest Price</option>
                <option value="lowest" <?php if (isset($_GET['sort']) && $_GET['sort'] === 'lowest') echo 'selected'; ?>>Lowest Price</option>
            </select>
        </form>
        <script>
            const selectElement = document.getElementById('sort');

            selectElement.addEventListener('change', function() {
                // Submit form secara otomatis saat pilihan dipilih
                document.getElementById('sortForm').submit();
            });
        </script>
    </div>

    <div>
        <div class="flex flex-wrap gap-3 justify-center">

            <?php foreach ($items as $item) : ?>
                <div class="bg-white w-44 lg:w-56 shadow-xl rounded-sm">
                    <a href="item/detail.php?id=<?= $item['id'] ?>">
                        <img src="./img/item/<?= $item["image"] ?>" alt="<?= $item["name"] ?>" class="h-40 mx-auto py-3 lg:py-1">
                        <h1 class="text-center py-2"><?= $item["name"] ?></h1>
                    </a>
                    <div class="px-5 flex justify-center items-center gap-5 mb-4">
                        <a href="item/update.php?id=<?= $item['id'] ?>" class="bg-[#E7230D] text-white px-3 py-2 rounded-[4px]">
                            <div class="text-center text-[13px]">
                                <h1>PRE-ORDER</h1>
                                <strong>Rp. <?= number_format($item['price'], 0, ',', '.'); ?></strong>
                            </div>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</body>

</html>