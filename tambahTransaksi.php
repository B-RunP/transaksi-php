<?php

require 'function.php';

    // cek apakah data berhasil submit sudah ditekan
    if (isset($_POST["submit"])) {
        $kodeBarang = $_POST["kode_barang"];
        $hargaBarang = getData("SELECT harga_barang FROM barang1 WHERE kode_barang = '$kodeBarang'");
        if (!empty($hargaBarang)) {
            $harga = $hargaBarang[0]["harga_barang"];
            $_POST["harga_barang"] = $harga;
        }

        if(tambahTransaksi($_POST) > 0 ){
            echo "
                <script>
                    alert('data berhasil ditambahkan');
                    document.location.href = 'transaksi.php';
                </script>
            ";
        } else {
            echo "<script>
                alert('data gagal ditambahkan');
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>

    <div class="container mt-5" style="width: 50%;">
        <h1>Tambah Data</h1>
        <div class="shadow p-3 mb-5 rounded p-3">
            <form action="" method="post">
                <label for="kode_transaksi" class="form-label">Kode Transaksi:</label>
                <input type="text" id="kode_transaksi" class="form-control" name="kode_transaksi" required>
                <label for="kode_barang" class="form-label">Kode Barang:</label>
                <select id="kode_barang" name="kode_barang" class="form-select">
                    <?php
                        $kodeBarang = getData("SELECT * FROM barang1");
                        foreach ($kodeBarang as $barang) {
                            echo "<option>".$barang['kode_barang']."</option>";
                        }
                    ?>
                </select>
                <input type="hidden" id="harga_barang" class="form-control" name="harga_barang" value="<?= $_POST['harga_barang'] ?? '' ?>">
                <br/>
                <label for="jumlah_barang" class="form-label">Jumlah Barang:</label>
                <input type="number" id="jumlah_barang" class="form-control" name="jumlah_barang" required>
                <!-- <label for="total_harga">Total Harga:</label>
                <input type="number" id="total_harga" name="total_harga" required> -->
                <button class="btn btn-primary" type="submit" name="submit">Tambah data</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>
</html>
