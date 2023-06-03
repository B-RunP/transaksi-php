<?php 
    require_once 'function.php';
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
    <div class="container pt-4">
        <h1 class="text-center">Data Transaksi</h1>
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Kode Transaksi</th>
                <th>Kode Barang</th>
                <th>Jumlah barang</th>
                <th>Total Harga</th>
                <th>Action</th>
            </tr>
            <?php

                $dataTransaksi = getData("SELECT * FROM transaksi1");
                $i = 1;
                foreach ($dataTransaksi as $transaksi) {
                    echo "<tr>";
                    echo "<td>".$i++."</td>";
                    echo "<td>".$transaksi['kode_transaksi']."</td>";
                    echo "<td>".$transaksi['kode_barang']."</td>";
                    echo "<td>".$transaksi['jumlah_barang']."</td>";
                    echo "<td>".$transaksi['total_harga']."</td>";
                    echo "<td>
                    <a class='btn btn-primary' href='ubahTransaksi.php?kode_transaksi=".$transaksi['kode_transaksi']."'>Edit</a>
                    <a class='btn btn-danger' href='hapusTransaksi.php?kode_transaksi=".$transaksi['kode_transaksi']."'>Hapus</a>
                    </td>";
                    echo "</tr>";
                }
            ?>
        </table>
        <br>
        <a class="btn btn-primary" href="tambahTransaksi.php">Tambah transaksi</a>
        <a class="btn btn-secondary" href="index.php">Kembali ke index</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>
</html>