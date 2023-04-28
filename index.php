<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>Form Complate</title>
    <!-- Created by: Khoirrudin -->
</head>
<body>
    <!-- Form Complate PHP -->
    <?php 
        $errorNama = $errorEmail  = $errorAlamat = "";
        $name = $email = $gender = $alamat = "";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["name"])) {
                $errorNama = "Mohon masukkan nama!";
            } else {
                $name = test_input($_POST["name"]);
                if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) { 
                  $name = "";
                  $errorNama = "Mohon masukkan huruf dan spasi saja!"; 
                  }
            }
            if (empty($_POST["email"])) {
                $errorEmail = "Mohon masukkan email!";
            } else {
                $email = test_input($_POST["email"]);
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { 
                  $email = "";
                  $errorEmail = "Mohon masukkan email dengan benar!"; 
                  }                  
            }
            if (empty($_POST["alamat"])) {
                $errorNama = "Mohon masukkan alamat!";
            } else {
                $name = test_input($_POST["alamat"]);
                if (!preg_match("/^[a-zA-Z-' ]*$/",$alamat)) { 
                  $alamat = "";
                  $errorAlamat = "Mohon masukkan huruf dan spasi saja!"; 
                  }
            }
                 
        }
        function test_input($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    ?>
        <h2>Silahkan Isi Data Dibawah Ini!</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="name">Nama:</label>
            <!-- Penambahan Value untuk complate form -->
            <input type="text" name="name" value="<?= $name; ?>"> 
            <span class="error text-danger">* <?= $errorNama; ?></span>
            <br><br>
            <label for="email">Email:</label>
            <!-- Penambahan Value untuk complate form -->
            <input type="text" name="email" value="<?= $email; ?>">
            <span class="error text-danger">* <?= $errorEmail; ?></span>
            <br><br>
            <label for="alamat">Alamat:</label>
            <!-- Penambahan Value untuk complate form -->
            <input type="text" name="alamat" value="<?= $alamat; ?>">
            <span class="error text-danger">* <?= $errorAlamat; ?></span>
            <br><br>
            
            <button type="submit">Kirim!</button>
        </form>
        <?php
        echo "<h2>Datamu Adalah:</h2>";
        echo $name;
        echo "<br>";
        echo $email;
        echo "<br>";
        echo $alamat;
        ?>
</body>
</html>
