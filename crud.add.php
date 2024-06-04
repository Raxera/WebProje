<?php require_once("config.php"); ?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Yeni Kişi Ekle</title>
</head>
<body>
    <h1>Yeni Kişi Ekle</h1>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $adisoyadi = mysqli_real_escape_string($cnnMySQL, $_POST['adisoyadi']);
        $telefonu = mysqli_real_escape_string($cnnMySQL, $_POST['telefonu']);
        $email = mysqli_real_escape_string($cnnMySQL, $_POST['email']);
        $address = mysqli_real_escape_string($cnnMySQL, $_POST['address']);
        $job_title = mysqli_real_escape_string($cnnMySQL, $_POST['job_title']);
        $company = mysqli_real_escape_string($cnnMySQL, $_POST['company']);
        $profile_picture = mysqli_real_escape_string($cnnMySQL, $_POST['profile_picture']);
        $notes = mysqli_real_escape_string($cnnMySQL, $_POST['notes']);

        $SQL = "INSERT INTO telefonrehberi (adisoyadi, telefonu, email, address, job_title, company, profile_picture, notes) 
                VALUES ('$adisoyadi', '$telefonu', '$email', '$address', '$job_title', '$company', '$profile_picture', '$notes')";
        
        if (mysqli_query($cnnMySQL, $SQL)) {
            echo "<p>Yeni Kayıt Eklendi!</p>";
        } else {
            echo "<p>Hata: " . mysqli_error($cnnMySQL) . "</p>";
        }
    }
    ?>

    <form action="" method="post">
        <p>Adı Soyadı: <input type="text" name="adisoyadi" required></p>
        <p>Telefonu: <input type="text" name="telefonu" required></p>
        <p>Email: <input type="email" name="email"></p>
        <p>Adres: <input type="text" name="address"></p>
        <p>Meslek: <input type="text" name="job_title"></p>
        <p>Şirket: <input type="text" name="company"></p>
        <p>Profil Resmi URL: <input type="text" name="profile_picture"></p>
        <p>Notlar: <textarea name="notes"></textarea></p>
        <p><input type="submit" value="Ekle"></p>
    </form>

    <p><a href="index.php">Ana Sayfa</a></p>
</body>
</html>
