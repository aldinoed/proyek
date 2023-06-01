<?php
session_start();
include '../connection.php';
if ($_SESSION['role'] !== 'Admin' || !(isset($_SESSION['user']))) {
      header('location: http://localhost:8080/wpw/proyek');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Input Barang</title>
      <link rel="stylesheet" href="../css/bootstrap.min.css">
      <style>
            * {
                  margin: 0;
                  padding: 0;
                  font-family: 'Viga'
            }
      </style>
</head>

<body class="bg-primary">
      <div class="p-3 mb-2  mt-5">
            <div class="align-self-center ">
                  <p class="text-center fs-1 text-white">FORM PENGISIAN DATA BARANG LAB</p>
                  <form style="max-height: 100vh; width: 60%; " class="p-4 m-auto shadow rounded bg-white" method="POST" action="form.php">
                        <div class="row mt-3 d-flex justify-content-center">
                              <div class="col-md">
                                    <div ">
                                          <label for=" floatingInputGrid">Nama Barang</label>
                                          <input type="text" class="form-control" id="floatingInputGrid" placeholder="" value="" name="nama_barang">
                                    </div>
                              </div>
                        </div>
                        <div class="mt-3">
                              <label for=" floatingInputGrid">Jumlah</label>
                              <input class="form-control" type="" placeholder="" aria-label="" name="jumlah">
                        </div>
                        <div class="mb-3 mt-3">
                              <input class="form-control" type="file" id="formFileMultiple" multiple name="image">
                              <label for="formFileMultiple" class="form-label text-secondary">Masukkan Foto Keadaan Barang Saat Ini</label>
                        </div>
                        <div class="d-flex mx-auto">
                              <input class="btn btn-primary me-2" type="submit" value="Submit" name="submit">
                              <input class="btn btn-danger" type="reset" value=" Clear ">
                        </div>
                  </form>

            </div>


      </div>

      <?php
      include '../connection.php';

      if (isset($_POST['submit'])) {
            $namaBarang = $_POST["nama_barang"];
            $jumlah = $_POST["jumlah"];
            $image = $_POST["image"];
            $connect->exec("USE proyek");
            $query = "INSERT INTO `barang` (`id_barang`, `image_barang`, `nama_barang`, `jumlah`) VALUES (UUID(), '$image', '$namaBarang', '$jumlah')";
            $statement = $connect->prepare($query);
            $result = $statement->execute();

            if ($result == true) {
                  echo "<script> alert(\"Input Barang Berhasil\")</script>";
            } else {
                  echo "Error: ";
            }
      }
      ?>
</body>

</html>