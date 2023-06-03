<?php

require 'function.php';

$kodeBarang = $_GET["kode_barang"];

// query data berdasarkan barang
$barang = getData("SELECT * FROM barang1 WHERE kode_barang = $kodeBarang")[0];


    // cek apakah data berhasil submit sudah ditekan
    if (isset($_POST["submit"])) {
        if(ubahData($_POST) > 0 ){
            echo "
                <script>
                    alert('data berhasil diubah');
                    document.location.href = 'index.php';
                </script>
            ";
        } else {
            echo "data gagal diubah";
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
        <h1 class="text-center">Ubah Data</h1>
        <div class="shadow p-3 mb-5 rounded p-3">
            <form action="" method="post">
                <label for="kode_barang" class="form-label">Kode Barang:</label>
                <input type="text" id="kode_barang" class="form-control" name="kode_barang" required value="<?= $barang["kode_barang"]; ?>">
                <label for="nama_barang" class="form-label">Nama Barang:</label>
                <input type="text" id="nama_barang" class="form-control" name="nama_barang" required value="<?= $barang["nama_barang"]; ?>">
                <label for="harga_barang" class="form-label">Harga Barang:</label>
                <input type="number" id="harga_barang" class="form-control" name="harga_barang" required value="<?= $barang["harga_barang"]; ?>">
                <button type="submit" class="btn btn-primary mt-3" name="submit">Ubah data</button>
            </form>
        </div> 
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>
</html>