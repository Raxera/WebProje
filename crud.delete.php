<?php require_once("config.php"); ?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $KAYITNO = mysqli_real_escape_string($cnnMySQL, $_POST["id"]);
    $SQL = "DELETE FROM telefonrehberi WHERE id = '$KAYITNO'";
    if (mysqli_query($cnnMySQL, $SQL)) {
        echo "<p>Kayıt Silindi...</p>";
    } else {
        echo "<p>Hata: " . mysqli_error($cnnMySQL) . "</p>";
    }
    echo "<a href='index.php'>Ana Sayfa</a>";
    exit();
}

if (isset($_GET["kayitno"])) {
    $KAYITNO = mysqli_real_escape_string($cnnMySQL, $_GET["kayitno"]);
    $SQL = "SELECT * FROM telefonrehberi WHERE id = '$KAYITNO'";
    $rows = mysqli_query($cnnMySQL, $SQL);
    if ($row = mysqli_fetch_assoc($rows)) {
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Kayıt Sil</title>
</head>
<body>
    <h1>Kayıt Sil</h1>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
        <p>Adı Soyadı: <?php echo $row['adisoyadi']; ?></p>
        <p>Telefonu: <?php echo $row['telefonu']; ?></p>
        <p>Email: <?php echo $row['email']; ?></p>
        <p>Adres: <?php echo $row['address']; ?></p>
        <p>Meslek: <?php echo $row['job_title']; ?></p>
        <p>Şirket: <?php echo $row['company']; ?></p>
        <p>Profil Resmi: <img src="<?php echo $row['profile_picture']; ?>" alt="Profile Picture" width="100" /></p>
        <p>Notlar: <?php echo $row['notes']; ?></p>
        <p>
            <input type="submit" value="Sil" />
            <a href="index.php">Vazgeç...</a>
        </p>
    </form>
</body>
</html>

<?php
    } else {
        echo "<p>Hata: Kayıt bulunamadı.</p>";
        echo "<a href='index.php'>Ana Sayfa</a>";
    }
} else {
    echo "<p>Hata: Geçersiz kayıt numarası.</p>";
    echo "<a href='index.php'>Ana Sayfa</a>";
}
?>
