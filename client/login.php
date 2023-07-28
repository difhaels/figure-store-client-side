<?php
session_start();
require '../function/functions.php';

// jika login ditekan
if (isset($_POST["login"])) {

    // membuat variabel dari post agar lebih mudah
    $username = $_POST["username"];
    $password = $_POST["password"];

    // cek database, table account , yang username sama dengan input
    $result  = mysqli_query($koneksi, "SELECT * FROM client WHERE username = '$username'");

    // jika ditemukan username yang sama
    if (mysqli_num_rows($result) === 1) {

        // mengubah hasil result menjadi array assoc
        $row = mysqli_fetch_assoc($result);

        // cek password
        if ($password == $row["password"]) {
            // set session
            $_SESSION["login"] = true;

            // cek remember me di centang tidak
            if (isset($_POST['remember'])) {
                // memberi waktu 3600 detik jika di centang
                setcookie('key', $row['username'], time() + 3600);
            }

            // pindah ke halaman index
            header("Location: ./account.php");
            exit;
        } else {
            echo "
        <script>
            alert('Password Salah');
        </script>
        ";
        }
    } else {
        echo "
        <script>
            alert('Username tidak ditemukan');
        </script>
        ";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="../css/output.css">
</head>

<body class="bg-[#1B6B93] flex justify-center items-center h-screen">
    <div class="bg-white w-[500px] rounded-xl shadow-2xl">
        <form action="" method="post">
            <ul class="p-5">
                <li class="py-1">
                    <input type="text" name="username" placeholder="Username" class="w-full h-10 border-2 border-black rounded-lg px-3">
                </li>
                <li class="py-1">
                    <input type="password" name="password" placeholder="Password" class="w-full h-10 border-2 border-black rounded-lg px-3">
                </li>
                <li class="py-1 px-1 flex justify-between">
                    <div>
                        <input type="checkbox" name="remember" id="remember">
                        <label for="remember">Remember me</label>
                    </div>
                    <a href="register.php">register</a>
                </li>
                <li class="py-1">
                    <button type="submit" name="login" class="button-yellow">Login</button>
                </li>
            </ul>
        </form>
    </div>
</body>

</html>