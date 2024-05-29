<?php
// İstekler arasındaki CORS hatalarını önlemek için CORS başlıklarını ayarlayın
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$servername = "localhost";
$username = "petidcom_petid";
$password = "petidcom_petid";
$dbname = "petidcom_petid";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}

// URL'den gelen id'yi al
$id = $_GET['id'];

// Veritabanında ilgili id ile bir sorgu yapın
$sql = "SELECT * FROM pets WHERE petid = '$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Veri bulunduysa, verileri döndür
    $row = $result->fetch_assoc();
    echo json_encode($row);
} else {
    // Veri bulunamadıysa hata mesajı döndür
    echo json_encode(null);
}

$conn->close();
?>
