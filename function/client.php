<?php
require 'functions.php';
function register($data)
{
    global $koneksi;

    $username = strtolower($data["username"]);
    $password = mysqli_real_escape_string($koneksi, $data["password"]);
    $password2 = mysqli_real_escape_string($koneksi, $data["password2"]);
    $notlp = $data["notlp"];
    $nowa = $data["nowa"];
    $alamat = $data["alamat"];
    $email = $data["email"];

    // username yang sudah digunakan
    $username_taken =  mysqli_query($koneksi, "SELECT username FROM client WHERE username = '$username'");
    if (mysqli_fetch_assoc($username_taken)) {
        echo "
        <script>
            alert('Username telah digunakan!');
        </script>
        ";
        return false;
    }

    // cek konfirmasi password
    if ($password !== $password2) {
        echo "
        <script>
            alert('Password tidak sesuai!');
        </script>
        ";
        return false;
    }

    // tambahkan user baru ke database
    mysqli_query($koneksi, "INSERT INTO client (username, password, notlp, nowa, alamat, email)  VALUES ('$username', '$password', '$notlp', '$nowa','$alamat','$email')");

    return mysqli_affected_rows($koneksi);
}

function transaction($data)
{
    global $koneksi;

    // username data
    $username = $data["username"];

    // item data
    $item_name = $data["item_name"];
    $item_image = $data["item_image"];
    $item_price = $data["item_price"];

    // transaction data
    $transaction_name = $data["transaction_name"];
    if (!$transaction_name) {
        $transaction_name = $data["username"];
    }
    $transaction_notlp = $data["transaction_notlp"];
    if (!$transaction_notlp) {
        $transaction_notlp = $data["notlp"];
    }
    $transaction_alamat = $data["transaction_alamat"];
    if (!$transaction_alamat) {
        $transaction_alamat = $data["alamat"];
    }

    mysqli_query($koneksi, "INSERT INTO transaction(username, item_name, item_image, item_price, transaction_name, transaction_notlp, transaction_alamat, status) VALUES ('$username', '$item_name', '$item_image', '$item_price', '$transaction_name', '$transaction_notlp', '$transaction_alamat',  'menunggu konfirmasi')");

    return mysqli_affected_rows($koneksi);
}
