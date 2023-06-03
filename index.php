<?php 
    require_once 'function.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Dosen UDB</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    <div class="px-5 pt-4">
    <h1 class="text-center">Data Barang</h1>
        <table class="table table-bordered">
            <tr class="table-primary">
                <th>No</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Harga barang</th>
                <th>Action</th>
            </tr>
            <?php
    
                $dataBarang = getData("SELECT * FROM barang1");
                $i = 1;
                foreach ($dataBarang as $barang) {
                    echo "<tr>";
                    echo "<td>".$i++."</td>";
                    echo "<td>".$barang['kode_barang']."</td>";
                    echo "<td>".$barang['nama_barang']."</td>";
                    echo "<td>".$barang['harga_barang']."</td>";
                    echo "<td>
                        <a class='btn btn-primary' href='ubah.php?kode_barang=".$barang['kode_barang']."'>Edit</a>
                        <a class='btn btn-danger' href='hapus.php?kode_barang=".$barang['kode_barang']."'>Hapus</a>
                    </td>";
                    echo "</tr>";
                }
            ?>
        </table>
        <br>
        <a class="btn btn-primary" href="tambah.php">Tambah barang</a>
        <a class="btn btn-warning" href="transaksi.php">Tambah transaksi</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>
</html>