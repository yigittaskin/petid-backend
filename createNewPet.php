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

$petid = $data['petid'];
$petName = $data['petName'];
$petSpecies = $data['petSpecies'];
$petBreed = $data['petBreed'];
$petAge = $data['petAge'];
$petWeight = $data['petWeight'];
$petGender = $data['petGender'];
$petSpayed = $data['petSpayed'];
$petIllnesses = $data['petIllnesses'];
$ownerName = $data['ownerName'];
$ownerPhone = $data['ownerPhone'];
$vetName = $data['vetName'];
$vetPhone = $data['vetPhone'];
$additionalInfo = $data['additionalInfo'];

$sql = "INSERT INTO pets (petid, pet_name, species, breed, age, weight, gender, spayed, illnesses, owner_name, owner_phone, vet_name, vet_phone, additional_info) VALUES ('$petid', '$petName', '$petSpecies', '$petBreed', '$petAge', '$petWeight', '$petGender', '$petSpayed', '$petIllnesses', '$ownerName', '$ownerPhone', '$vetName', '$vetPhone', '$additionalInfo')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(array("message" => "Kayıt başarıyla eklendi"));
} else {
    echo json_encode(array("error" => "Hata: " . $sql . "<br>" . $conn->error));
}

$conn->close();
?>