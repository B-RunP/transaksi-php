<?php

require 'function.php';

$kodeTransaksi = $_GET["kode_transaksi"];

// query data berdasarkan kode_transaksi
$transaksi = getData("SELECT * FROM transaksi1 WHERE kode_transaksi = $kodeTransaksi")[0];

    // cek apakah data berhasil submit sudah ditekan
    if (isset($_POST["submit"])) {
        $kodeBarang = $_POST["kode_barang"];
        $hargaBarang = getData("SELECT harga_barang FROM barang1 WHERE kode_barang = '$kodeBarang'");
        if (!empty($hargaBarang)) {
            $harga = $hargaBarang[0]["harga_barang"];
            $_POST["harga_barang"] = $harga;
        }

        // var_dump($_POST);

        if(ubahTransaksi($_POST) > 0 ){
            echo "
                <script>
                    alert('data berhasil diubah');
                    document.location.href = 'transaksi.php';
                </script>
            ";
        } else {
            echo "<script>
                echo 'data gagal diubah';
            </script>";
        }
    }

    if (isset($_POST["kode_barang"])) {
        $kodeBarang = $_POST["kode_barang"];
        $hargaBarang = getData("SELECT harga_barang FROM barang1 WHERE kode_barang = '$kodeBarang'");
        if (!empty($hargaBarang)) {
            $harga = $hargaBarang[0]["harga_barang"];
            echo "<script>document.getElementById('total_harga').value = '$harga';</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Tambah Data</h1>
    
    <form action="" method="post">
        <label for="kode_transaksi">Kode Transaksi:</label>
        <input type="text" id="kode_transaksi" name="kode_transaksi" value="<?= $transaksi["kode_transaksi"]; ?>" required><br><br>
        <label for="kode_barang">Kode Barang:</label>
        <select id="kode_barang" name="kode_barang">
            <?php
                $kodeBarang = getData("SELECT * FROM barang1");
                foreach ($kodeBarang as $barang) {
                    $selected = ($barang['kode_barang'] == $transaksi['kode_barang']) ? "selected" : "";
                    echo "<option $selected>".$barang['kode_barang']."</option>";
                }
            ?>
        </select>
        <input type="hidden" id="harga_barang" name="harga_barang" value="<?= $_POST['harga_barang'] ?? '' ?>">
        <br/>
        <label for="jumlah_barang">Jumlah Barang:</label>
        <input type="number" id="jumlah_barang" name="jumlah_barang" value="<?= $transaksi["jumlah_barang"]; ?>" required><br><br>
        <button type="submit" name="submit">Tambah data</button>
    </form>
</body>
</html>
