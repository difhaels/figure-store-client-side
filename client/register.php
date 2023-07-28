<?php
require '../function/client.php';

if (isset($_POST["register"])) {
    if (register($_POST) > 0) {
        echo "
        <script>
            alert('Register Success');
        </script>
        ";
        header("Location: login.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
                <li class="py-1">
                    <input type="password" name="password2" placeholder="Confirm Password" class="w-full h-10 border-2 border-black rounded-lg px-3">
                </li>
                <li class="py-1">
                    <input type="text" name="notlp" placeholder="Nomer Telepon" class="w-full h-10 border-2 border-black rounded-lg px-3">
                </li>
                <li class="py-1">
                    <input type="text" name="nowa" placeholder="Nomer Whatsapp" class="w-full h-10 border-2 border-black rounded-lg px-3">
                </li>
                <li class="py-1">
                    <input type="text" name="alamat" placeholder="Alamat" class="w-full h-10 border-2 border-black rounded-lg px-3">
                </li>
                <li class="py-1">
                    <input type="text" name="email" placeholder="Email" class="w-full h-10 border-2 border-black rounded-lg px-3">
                </li>
                <li class="py-1">Already have account <a href="./login.php" class="text-red-500">login</a></li>
                <li class="py-1">
                    <button type="submit" name="register" class="button-yellow">Register</button>
                </li>
            </ul>
        </form>
    </div>
</body>

</html>