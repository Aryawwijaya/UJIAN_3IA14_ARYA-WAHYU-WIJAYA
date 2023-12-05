<?php
$mysqli = new mysqli('localhost', 'root', '', 'mahasiswa');

if($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

$id = $_GET['id'];

$delete = "DELETE FROM data_mahasiswa WHERE npm='$id'";

if($mysqli->query($delete)) {
    echo "Data Deleted";
} else {
    echo "Error: " . $delete . "<br>" . $mysqli->error;
}

if($mysqli->query($delete)) {
    header("Location: index.php");
    exit();
} else {
    echo "Error: " . $delete . "<br>" . $mysqli->error;
}

$mysqli->close();
?>