<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
      <link rel="stylesheet" href="../css/bootstrap.min.css">
      <style>
            * {
                  margin: 0;
                  padding: 0;
                  font-family: 'Viga'
            }
      </style>
</head>

<body>
      <div class="p-3 mb-2 bg-secondary text-white ">
            <div class="align-self-center ">
                  <p class="text-center fs-1 ">FORM PENGISIAN DATA BARANG LAB</p>
                  <form style="height: 100vh; width: 40%; " class=" m-auto " method="POST" action="index.php">
                        <!-- background-color: rgba(255,0,0,0.1);  -->
                        <div class="row g-2 d-flex justify-content-center">
                              <div>
                                    <input class="form-control" type="text" placeholder="ID BARANG" aria-label="" name="id_barang">
                              </div>
                              <div class="col-md">
                                    <div class="form-floating">
                                          <input type="text" class="form-control" id="floatingInputGrid" placeholder="" value="" name="nama_barang">
                                          <label for="floatingInputGrid">NAMA BARANG</label>
                                    </div>
                              </div>
                              <div class="col-md">
                                    <div class="form-floating">
                                          <select class="form-select" id="floatingSelectGrid" aria-label="Floating label select example" name="kategori">
                                                <option value="PC">PC</option>
                                                <option value="PERIPHERAL" name="kategori">PERIPHERAL</option>
                                                <option value="SOUND" name="kategori">SOUND</option>
                                                <option value="KABEL" name="kategori">KABEL</option>
                                                <option value="PROYEKTOR" name="kategori">PROYEKTOR</option>
                                          </select>
                                          <label for="floatingSelectGrid">KATEGORI</label>
                                    </div>
                              </div>
                        </div>
                        <div class="mt-2">
                              <input class="form-control" type="text" placeholder="JUMLAH" aria-label="" name="jumlah">
                        </div>
                        <div class="mb-3">
                              <label for="formFileMultiple" class="form-label">MASUKKAN FOTO KEADAAN BARANG SAAT INI!</label>
                              <input class="form-control" type="file" id="formFileMultiple" multiple name="image">
                        </div>
                        <div class="d-grid gap-2 col-6 mx-auto">
                              <input class="btn btn-success" type="submit" value="Submit" name="submit">
                              <input class="btn btn-danger" type="reset" value="Clear">
                        </div>
                  </form>

            </div>


      </div>

      <?php
      include 'connection.php';

      // Memeriksa apakah terjadi error koneksi
      // if (mysqli_connect_errno()) {
      //     echo "Koneksi database gagal: " . mysqli_connect_error();
      //     exit();
      // }

      // Mengambil data dari form
      if (isset($_POST['submit'])) {
            $idBarang = $_POST["id_barang"];
            $namaBarang = $_POST["nama_barang"];
            $kategori = $_POST["kategori"];
            $jumlah = $_POST["jumlah"];
            $image = $_POST["image"];
            $connect->exec("USE proyek");
            // Query untuk menyimpan data ke dalam tabel
            $query = "INSERT INTO `barang` (`id_barang`, `image_barang`, `nama_barang`, `jumlah`, `kategori`) VALUES ('$idBarang', '$image', '$namaBarang', '$jumlah', '$kategori')";
            echo $query;
            $statement = $connect->prepare($query);
            $result = $statement->execute();


            if ($result == true) {
                  echo "<script> alert(\"Berhasil\")</script>";
            } else {
                  echo "Error: ";
            }
      }

      // // Menutup koneksi ke database
      // mysqli_close($conn);
      ?>
      ?>
</body>

</html>
<!--
      // include '../proyek/connection.php';

      // Memeriksa apakah terjadi error koneksi
      // if (mysqli_connect_errno()) {
      //     echo "Koneksi database gagal: " . mysqli_connect_error();
      //     exit();
      // }

      // Mengambil data dari form
      // $idBarang = $_POST["id_barang"];
      // $namaBarang = $_POST["nama_barang"];
      // $kategori = $_POST["kategori"];
      // $jumlah = $_POST["jumlah"];
      // $image = $_POST["image"];

      // Query untuk menyimpan data ke dalam tabel
      // $query = $connect->exec("INSERT INTO `barang` (`id_barang`, `nama_barang`, `kategori`, `jumlah`, `image_barang`) VALUES ('$idBarang', '$namaBarang', '$kategori', '$jumlah', '$image')"); 
      // echo $query;


      // if ($query == true) {
      //     echo "Data berhasil disimpan.";
      // } else {
      //     echo "Error: " . $query . "<br>" . mysqli_error($connect);
      // }

      // // Menutup koneksi ke database
      // mysqli_close($conn);
      // 
      ?> -->