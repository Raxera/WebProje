<?php require_once("config.php"); ?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Telefon Rehberi</title>
    <style>
        .contact-card {
            border: 1px solid #ccc;
            padding: 15px;
            margin: 10px 0;
        }
        .contact-card img {
            width: 100px;
            height: 100px;
        }
    </style>
</head>
<body>
    <h1>Telefon Rehberi</h1>

    <!-- Telefon Numarası ile Arama Formu -->
    <form action="index.php" method="get">
        <label for="arama">Telefon Numarası ile Arama:</label>
        <input type="text" id="arama" name="telefon" placeholder="Telefon numarasını girin">
        <input type="submit" value="Ara">
    </form>
    <hr>

    <?php
    // Telefon numarası ile arama yapılacaksa
    if (isset($_GET['telefon'])) {
        $telefon = mysqli_real_escape_string($cnnMySQL, $_GET['telefon']);
        $SQL = "SELECT * FROM telefonrehberi WHERE telefonu LIKE '%$telefon%'";
        $rows = mysqli_query($cnnMySQL, $SQL);

        if (mysqli_num_rows($rows) > 0) {
            while ($row = mysqli_fetch_assoc($rows)) {
                // Kişi bilgilerini göster
                echo "<div class='contact-card'>
                        <img src='{$row['profile_picture']}' alt='Profile Picture'>
                        <h2>{$row['adisoyadi']}</h2>
                        <p><strong>Telefon:</strong> {$row['telefonu']}</p>
                        <p><strong>E-posta:</strong> {$row['email']}</p>
                        <p><strong>Adres:</strong> {$row['address']}</p>
                        <p><strong>Meslek:</strong> {$row['job_title']}</p>
                        <p><strong>Şirket:</strong> {$row['company']}</p>
                        <p><strong>Notlar:</strong> {$row['notes']}</p>
                        <p><a href='crud.update.php?kayitno={$row['id']}'>Düzenle</a> | <a href='crud.delete.php?kayitno={$row['id']}'>Sil</a></p>
                      </div>";
            }
        } else {
            echo "<p>Aradığınız telefon numarasına sahip kişi bulunamadı.</p>";
        }
    } else {
        // Tüm kişileri listele
        $SQL = "SELECT * FROM telefonrehberi";
        $rows = mysqli_query($cnnMySQL, $SQL);

        if (mysqli_num_rows($rows) > 0) {
            while ($row = mysqli_fetch_assoc($rows)) {
                // Kişi bilgilerini göster
                echo "<div class='contact-card'>
                        <img src='{$row['profile_picture']}' alt='Profile Picture'>
                        <h2>{$row['adisoyadi']}</h2>
                        <p><strong>Telefon:</strong> {$row['telefonu']}</p>
                        <p><strong>E-posta:</strong> {$row['email']}</p>
                        <p><strong>Adres:</strong> {$row['address']}</p>
                        <p><strong>Meslek:</strong> {$row['job_title']}</p>
                        <p><strong>Şirket:</strong> {$row['company']}</p>
                        <p><strong>Notlar:</strong> {$row['notes']}</p>
                        <p><a href='crud.update.php?kayitno={$row['id']}'>Düzenle</a> | <a href='crud.delete.php?kayitno={$row['id']}'>Sil</a></p>
                      </div>";
            }
        } else {
            echo "<p>Henüz hiç kişi kaydı yok.</p>";
        }
    }
    ?>
    
    <!-- Yeni Kişi Ekleme Linki -->
    <a href="crud.add.php">Yeni Kişi Ekle</a>
</body>
</html>
