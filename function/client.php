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

    $stat = "menunggu konfirmasi";

    // image bukti tranfer handle
    $transaction_info = uploud_image('transaction_info', 'transaction');
    var_dump($transaction_info);

    $query = "INSERT INTO transaction (username, transaction_name, transaction_notlp, transaction_alamat, item_name, item_image, item_price, status, transaction_info) VALUES ('$username', '$transaction_name', '$transaction_notlp', '$transaction_alamat', '$item_name', '$item_image', '$item_price', '$stat', '$transaction_info')";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}


function uploud_image($name, $folder_save)
{
    $namaFile = $_FILES[$name]['name'];
    $ukuranFile = $_FILES[$name]['size'];
    $tmpName = $_FILES[$name]['tmp_name'];

    // cek yang diup gambar bukan
    $ekstensiGambarValid = ['png', 'jpeg', 'jpg'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "
        <script>
            alert('Anda harus menguploud gambar');
        </script>
        ";
        return false;
    }

    // cek ukuran gambar 2mb max
    if ($ukuranFile > 2000000) {
        echo "
        <script>
            alert('Ukuran file terlalu besar max 2 mb');
        </script>
        ";
        return false;
    }

    move_uploaded_file($tmpName, '../img/' . $folder_save . '/' . $namaFile);

    return $namaFile;
}
