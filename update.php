<?php
$mysqli = new mysqli('localhost', 'root', '', 'mahasiswa');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mysqli = new mysqli('localhost', 'root', '', 'mahasiswa');

    if ($mysqli->connect_error) {
        die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
    }

    $nama = $_POST['nama'];
    $npm = $_POST['npm'];
    $jurusan = $_POST['jurusan'];
    $alamat = $_POST['alamat'];

    $update = "UPDATE data_mahasiswa SET nama='$nama', jurusan='$jurusan', alamat='$alamat' WHERE npm='$npm'";

    if ($mysqli->query($update)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $update . "<br>" . $mysqli->error;
    }

    $mysqli->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Data Mahasiswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 6px;
        }

        input[type="text"] {
            width: calc(100% - 12px);
            padding: 6px;
            margin-bottom: 10px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        input[type="submit"] {
            padding: 8px 16px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label for="nama">Nama:</label><br>
    <input type="text" id="nama" name="nama"><br>
    <label for="npm">NPM:</label><br>
    <input type="text" id="npm" name="npm"><br>
    <label for="jurusan">Jurusan:</label><br>
    <input type="text" id="jurusan" name="jurusan"><br>
    <label for="alamat">Alamat:</label><br>
    <input type="text" id="alamat" name="alamat"><br>
    <input type="submit" value="Update">
</form>
