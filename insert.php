<?php

$mysqli = new mysqli('localhost', 'root', '', 'mahasiswa');


if($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}


$nama = $_POST['nama'];
$npm = $_POST['npm'];
$jurusan = $_POST['jurusan'];
$alamat = $_POST['alamat'];


$insert = "INSERT INTO data_mahasiswa (nama, npm, jurusan, alamat) VALUES ('$nama', '$npm', '$jurusan', '$alamat')";


if($mysqli->query($insert)) {
    header("Location: index.php");
    exit(); 
} else {
    echo "Error: " . $insert . "<br>" . $mysqli->error;
}


$mysqli->close();
?>
