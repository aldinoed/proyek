<?php
include ('connection.php');

// Memeriksa apakah terjadi error koneksi
// if (mysqli_connect_errno()) {
//     echo "Koneksi database gagal: " . mysqli_connect_error();
//     exit();
// }

// Mengambil data dari form
$idBarang = $_POST["id_barang"];
$namaBarang = $_POST["nama_barang"];
$kategori = $_POST["kategori"];
$jumlah = $_POST["jumlah"];
$image = $_POST["image"];

// Query untuk menyimpan data ke dalam tabel
$query = $connect->exec("INSERT INTO `barang` (`id_barang`, `image_barang`, `nama_barang`, `jumlah`, `kategori`) VALUES ('$idBarang', '$image', '$namaBarang', '$jumlah', '$kategori')"); 
echo $query;


if ($query == true) {
    echo "Data berhasil disimpan.";
} else {
    echo "Error: ";
}

// // Menutup koneksi ke database
// mysqli_close($conn);
?>