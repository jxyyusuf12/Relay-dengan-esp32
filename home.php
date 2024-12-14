<?php
// Aktifkan error reporting untuk debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Sertakan file koneksi
require_once('koneksi.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monitoring Suhu dan Kelembapan</title>
    <!-- Style CSS -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #00A8A9;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>
    <h1>Monitoring Suhu dan Kelembapan</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Waktu</th>
                <th>Tanggal</th>
                <th>Suhu (°C)</th>
                <th>Kelembapan (%)</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Query untuk mengambil data dari tabel dht22
            $query = "SELECT * FROM dht22 ORDER BY id DESC";
            $result = mysqli_query($koneksi, $query);

            // Periksa apakah query berhasil
            if (!$result) {
                die("Query error: " . mysqli_error($koneksi));
            }

            // Tampilkan data dalam tabel
            $no = 1; // Nomor urut
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $no++ . "</td>";
                echo "<td>" . htmlspecialchars($row['waktu']) . "</td>";
                echo "<td>" . htmlspecialchars($row['tanggal']) . "</td>";
                echo "<td>" . htmlspecialchars($row['suhu']) . "</td>";
                echo "<td>" . htmlspecialchars($row['kelembapan']) . "</td>";
                echo "</tr>";
            }

            // Tutup koneksi database
            mysqli_close($koneksi);
            ?>
        </tbody>
    </table>
</body>
</html>
