<?php
// koneksi ke database 
$koneksi = mysqli_connect("localhost", "root", "", "figure_store");

// function untuk menampilkan
function read($query)
{
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// function untuk search item 
function search($key)
{
    global $koneksi;
    $query = "SELECT * FROM item WHERE name LIKE '%$key%' OR source LIKE '%$key%'";
    mysqli_query($koneksi, $query);
    return $query;
}


// function untuk sort item 
function sortItem($selectedSort)
{
    global $koneksi;
    if ($selectedSort === "newest") {
        $query = "SELECT * FROM item ORDER BY id DESC";
    } else if ($selectedSort === "oldest") {
        $query = "SELECT * FROM item ORDER BY id ASC";
    } else if ($selectedSort === "highest") {
        $query = "SELECT * FROM item ORDER BY price DESC";
    } else if ($selectedSort === "lowest") {
        $query = "SELECT * FROM item ORDER BY price ASC";
    } else {
        $query = "SELECT * FROM item";
    }
    mysqli_query($koneksi, $query);
    return $query;
}
