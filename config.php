<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "telefonrehberiproje";

// MySQL bağlantısı
$cnnMySQL = new mysqli($host, $username, $password, $dbname);

// Bağlantı kontrolü
if ($cnnMySQL->connect_error) {
    die("Bağlantı hatası: " . $cnnMySQL->connect_error);
}
?>
