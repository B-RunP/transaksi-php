<?php
// koneksi

$host = "localhost";
$username = "root";
$password = "Natsudragnel157_";
$database = "ujk1";

// Fungsi untuk melakukan koneksi ke database
function koneksi()
{
    global $host, $username, $password, $database;
    $koneksi = mysqli_connect($host, $username, $password, $database);

    if (mysqli_connect_errno()) {
        echo "Koneksi database gagal: " . mysqli_connect_error();
    }

    return $koneksi;
}

// Fungsi untuk mendapatkan data barang dari tabel
function getData($query)
{
    $koneksi = koneksi();
    $result = mysqli_query($koneksi, $query);

    $dataBarang = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $dataBarang[] = $row;
    }

    mysqli_close($koneksi);

    return $dataBarang;
}

function tambahData($data)
{
    $koneksi = koneksi();

    $kode_barang = htmlspecialchars($data["kode_barang"]);
    $nama_barang = htmlspecialchars($data["nama_barang"]);
    $harga_barang = htmlspecialchars($data["harga_barang"]);

    // query insert
    $query = "INSERT INTO barang1 VALUES ('$kode_barang', '$nama_barang', '$harga_barang')";
    mysqli_query($koneksi, $query);
    
    return mysqli_affected_rows($koneksi);
}

function hapusBarang($data) {
    $koneksi = koneksi();

    mysqli_query($koneksi, "DELETE FROM barang1 WHERE kode_barang = '$data'");

    return mysqli_affected_rows($koneksi);
}

function hapusTransaksi($data) {
    $koneksi = koneksi();

    mysqli_query($koneksi, "DELETE FROM transaksi1 WHERE kode_transaksi = '$data'");

    return mysqli_affected_rows($koneksi);
}

function ubahData($data) {
    $koneksi = koneksi();

    $kode_barang = htmlspecialchars($data["kode_barang"]);
    $nama_barang = htmlspecialchars($data["nama_barang"]);
    $harga_barang = htmlspecialchars($data["harga_barang"]);

    // query insert
    $query = "UPDATE barang1 SET kode_barang = '$kode_barang', nama_barang = '$nama_barang', harga_barang = '$harga_barang' WHERE kode_barang = '$kode_barang'";
    mysqli_query($koneksi, $query);
    
    return mysqli_affected_rows($koneksi);
}

function tambahTransaksi($data)
{
    $koneksi = koneksi();

    $kode_transaksi = intval(htmlspecialchars($data["kode_transaksi"]));
    $kode_barang = intval($data["kode_barang"]);
    $jumlah_barang = intval($data["jumlah_barang"]);
    $total_harga = intval($data["harga_barang"]) * $jumlah_barang;

    // query insert
    $query = "INSERT INTO transaksi1 VALUES ('$kode_transaksi', '$kode_barang', '$jumlah_barang', '$total_harga')";
    mysqli_query($koneksi, $query);
    
    return mysqli_affected_rows($koneksi);
}

function ubahTransaksi($data)
{
    $koneksi = koneksi();

    $kode_transaksi = intval(htmlspecialchars($data["kode_transaksi"]));
    $kode_barang = intval($data["kode_barang"]);
    $jumlah_barang = intval($data["jumlah_barang"]);
    $total_harga = intval($data["harga_barang"]) * $jumlah_barang;

    // query insert
    $query = "UPDATE transaksi1 SET kode_transaksi = '$kode_transaksi', kode_barang = '$kode_barang', jumlah_barang = '$jumlah_barang', total_harga = '$total_harga' WHERE kode_transaksi = '$kode_transaksi'";
    mysqli_query($koneksi, $query);
    
    return mysqli_affected_rows($koneksi);
}

?>
