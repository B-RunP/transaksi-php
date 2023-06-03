<?php

    require 'function.php';

    $kodeTransaksi = $_GET["kode_transaksi"];

    if(hapusTransaksi($kodeTransaksi) > 0) {
        echo "
            <script>
                alert('Transaksi berhasil dihapus');
                document.location.href = 'transaksi.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Transaksi gagal dihapus');
                document.location.href = 'transaksi.php';
            </script>
        ";
    }
?>