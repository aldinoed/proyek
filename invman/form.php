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
                  <form style="max-height: 100vh; width: 60%; " class="p-4 m-auto shadow rounded bg-white" method="POST" action="form.php" enctype="multipart/form-data">
                        <p class="text-center fs-2     ">Form Input Data Peralatan</p>
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
                              <button type="reset" class="btn btn-secondary  tombol" style="margin-left:10px;"><a href="../invman" class="text-white" style="text-decoration:none">&#160;Back&#160;</a></button>
                        </div>
                  </form>

            </div>


      </div>

      <?php
      include '../connection.php';

      if (isset($_POST['submit'])) {
            $namaBarang = $_POST["nama_barang"];
            $jumlah = $_POST["jumlah"];
            // $image = $_FILES["image"];
            $imageName = $_FILES["image"]["name"];
            $imageTmp = $_FILES["image"]["tmp_name"];
            $imagePath = "../uploads/" . $imageName;

            move_uploaded_file($imageTmp, $imagePath);

            $connect->exec("USE proyek");
            $query = "INSERT INTO `barang` (`id_barang`, `image_barang`, `nama_barang`, `jumlah`, `tersedia`) VALUES (UUID(), '$imagePath', '$namaBarang', '$jumlah', '$jumlah')";
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