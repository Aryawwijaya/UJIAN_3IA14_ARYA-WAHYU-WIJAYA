<!DOCTYPE html>
<html>
<head>
    <title>ujian web</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: white; 
            background-image: url("fs.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            padding: 0;
        }

        h2 {
            text-align: center;
        }

        h3 {
            margin-top: 20px;
        }

        form {
            margin-bottom: 20px;
            text-align: center; 
        }

        form label {
            display: block; 
            margin-bottom: 5px;
        }

        form input[type="text"] {
            width: 250px; 
            padding: 8px;
            margin-bottom: 10px;
        }

        form input[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
            background-color: #F5FFFA;
        }

        th {
            background-color: #F4A460;
            text-align: center;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        a {
            text-decoration: none;
            padding: 4px 8px;
            border-radius: 4px;
        }

        a.update {
            background-color: #4CAF50;
            color: white;
        }

        a.delete {
            background-color: #f44336;
            color: white;
        }
    </style>
</head>
<body>

<h2>Data Mahasiswa</h2>

<form action="insert.php" method="post">
    <label for="nama">Nama:</label><br>
    <input type="text" id="nama" name="nama"><br>
    <label for="npm">NPM:</label><br>
    <input type="text" id="npm" name="npm"><br>
    <label for="jurusan">Jurusan:</label><br>
    <input type="text" id="jurusan" name="jurusan"><br>
    <label for="alamat">Alamat:</label><br>
    <input type="text" id="alamat" name="alamat"><br>
    <input type="submit" value="Submit">
</form>

<h3>Daftar Mahasiswa</h3>
<table>
    <tr>
        <th>Nama</th>
        <th>NPM</th>
        <th>Jurusan</th>
        <th>Alamat</th>
        <th>Aksi</th>
    </tr>
    <?php
        $mysqli = new mysqli('localhost', 'root', '', 'mahasiswa');
        $query = "SELECT * FROM data_mahasiswa";
        $result = $mysqli->query($query);

        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row['nama']."</td>";
            echo "<td>".$row['npm']."</td>";
            echo "<td>".$row['jurusan']."</td>";
            echo "<td>".$row['alamat']."</td>";
            echo "<td><a href='update.php?id=".$row['npm']."' class='update'>Update</a> | <a href='delete.php?id=".$row['npm']."' class='delete'>Delete</a></td>";
            echo "</tr>";
        }
    ?>
</table>

</body>
</html>
