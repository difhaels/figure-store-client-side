<?php
require '../function/functions.php';
$key = $_GET['key'];
$items = read("SELECT * FROM item WHERE item_name LIKE '%$key%' OR item_source LIKE '%$key%'");
?>

<?php foreach ($items as $item) : ?>
    <div class="item">
        <a href="item/detail.php?item_id=<?= $item['item_id'] ?>">
            <img src="./img/item/<?= $item["item_image"] ?>" alt="<?= $item["item_name"] ?>" class="item-image">
            <h1 class="text-center py-2"><?= $item["item_name"] ?></h1>
        </a>
        <div class="px-5 flex justify-center items-center gap-5 mb-4">
            <a href="item/detail.php?item_id=<?= $item['item_id'] ?>" class="button-red">
                <div class="text-center text-[13px]">
                    <h1>PRE-ORDER</h1>
                    <strong>Rp. <?= number_format($item['item_price'], 0, ',', '.'); ?></strong>
                </div>
            </a>
        </div>
    </div>
<?php endforeach; ?>