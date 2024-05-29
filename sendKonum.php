<?php
$servername = "localhost";
$username = "petidcom_petid";
$password = "petidcom_petid";
$dbname = "petidcom_petid";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}

$data = json_decode(file_get_contents("php://input"), true);
$location = $data['location'];
$petId = $data['pet_id'];

// konum bilgisini veritabanına kaydetme
$sql = "UPDATE pets SET konum = '$location' WHERE id = '$petId'";

if ($conn->query($sql) === TRUE) {
    echo json_encode(array("message" => "Konum başarıyla kaydedildi"));
} else {
    echo json_encode(array("error" => "Hata: " . $sql . "<br>" . $conn->error));
}

$conn->close();
?>
