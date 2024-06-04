<?php require_once("config.php"); ?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $KAYITNO = mysqli_real_escape_string($cnnMySQL, $_POST["id"]);
    $adisoyadi = mysqli_real_escape_string($cnnMySQL, $_POST["adisoyadi"]);
    $telefonu = mysqli_real_escape_string($cnnMySQL, $_POST["telefonu"]);
    $email = mysqli_real_escape_string($cnnMySQL, $_POST["email"]);
    $address = mysqli_real_escape_string($cnnMySQL, $_POST["address"]);
    $job_title = mysqli_real_escape_string($cnnMySQL, $_POST["job_title"]);
    $company = mysqli_real_escape_string($cnnMySQL, $_POST["company"]);
    $profile_picture = mysqli_real_escape_string($cnnMySQL, $_POST["profile_picture"]);
    $notes = mysqli_real_escape_string($cnnMySQL, $_POST["notes"]);

    $SQL = "UPDATE telefonrehberi SET
                adisoyadi = '$adisoyadi',
                telefonu = '$telefonu',
                email = '$email',
                address = '$address',
                job_title = '$job_title',
                company = '$company',
                profile_picture = '$profile_picture',
                notes = '$notes'
            WHERE id = '$KAYITNO'";
    if (mysqli_query($cnnMySQL, $SQL)) {
        echo "<p>Kayıt Güncellendi...</p>";
        echo "<a href='index.php'>Ana Sayfa</a>";
        exit();
    } else {
        echo "<p>Hata: " . mysqli_error($cnnMySQL) . "</p>";
    }
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
    <title>Kayıt Güncelle</title>
</head>
<body>
    <h1>Kayıt Güncelle</h1>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <p>Adı Soyadı: <input type="text" name="adisoyadi" value="<?php echo $row['adisoyadi']; ?>" required></p>
        <p>Telefonu: <input type="text" name="telefonu" value="<?php echo $row['telefonu']; ?>" required></p>
        <p>Email: <input type="email" name="email" value="<?php echo $row['email']; ?>"></p>
        <p>Adres: <input type="text" name="address" value="<?php echo $row['address']; ?>"></p>
        <p>Meslek: <input type="text" name="job_title" value="<?php echo $row['job_title']; ?>"></p>
        <p>Şirket: <input type="text" name="company" value="<?php echo $row['company']; ?>"></p>
        <p>Profil Resmi URL: <input type="text" name="profile_picture" value="<?php echo $row['profile_picture']; ?>"></p>
        <p>Notlar: <textarea name="notes"><?php echo $row['notes']; ?></textarea></p>
        <p><input type="submit" value="Güncelle"></p>
    </form>

    <p><a href="index.php">Ana Sayfa</a></p>
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
