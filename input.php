<?php 
    include("koneksi.php");

    date_default_timezone_set('Asia/Jakarta');
    $waktu = date("H:i:s");
    $tanggal = date("d F Y");
    $suhu = $_GET ["suhu"];
    $kelembapan = $_GET ["kelembapan"];

    $kirim = mysqli_query($koneksi,"INSERT INTO dht22 (waktu,tanggal,suhu,kelembapan) 
    VALUES ('$waktu','$tanggal','$suhu','$kelembapan')");

    if($kirim == TRUE) {
        echo "Data berhasil diinputkan...!";
    }
    else {
        echo "Gagal di inputkan";
    }
?>  
