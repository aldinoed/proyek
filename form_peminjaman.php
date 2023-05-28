<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <style>
            * {
                  margin: 0;
                  padding: 0;
                  font-family: 'Viga'
            }
      </style>
</head>

<body>
      <div class="container">
            <form action="form_peminjaman.php" method="POST">
                  <h1 class="d-flex justify-content-center"><span class="badge bg-secondary">FORM</span>Peminjaman Barang Lab</h1>
                  <div class="row">
                        <div class="col">
                              <ul class="list-group">
                                    <li class="list-group-item">
                                          <input class="form-check-input me-1" type="checkbox" value="MOUSE" name="barang[]" id="1">
                                          <label class="form-check-label " for="1">MOUSE</label>
                                    </li>
                              </ul>
                        </div>
                        <div class="col">
                              <input type="number" class="form-control" placeholder="Quantity" name="quantity[]" value="">
                        </div>
                  </div>
                  <div class="row">
                        <div class="col">
                              <ul class="list-group">
                                    <li class="list-group-item">
                                          <input class="form-check-input me-1" type="checkbox" value="KEYBOARD" name="barang[]" id="2">
                                          <label class="form-check-label " for="2">KEYBOARD</label>
                                    </li>
                              </ul>

                        </div>
                        <div class="col">
                              <input type="number" class="form-control" placeholder="Quantity" name="quantity[]" value="">
                        </div>
                  </div>
                  <div class="row">
                        <div class="col">
                              <ul class="list-group">
                                    <li class="list-group-item">
                                          <input class="form-check-input me-1" type="checkbox" value="MONITOR" name="barang[]" id="3">
                                          <label class="form-check-label " for="3">MONITOR</label>
                                    </li>
                              </ul>
                        </div>
                        <div class="col">
                              <input type="number" class="form-control" placeholder="Quantity" name="quantity[]" value="">
                        </div>
                  </div>
                  <div class="row">
                        <div class="col">
                              <ul class="list-group">
                                    <li class="list-group-item">
                                          <input class="form-check-input me-1" type="checkbox" value="HEADPHONE" name="barang[]" id="4">
                                          <label class="form-check-label " for="4">HEADPHONE</label>
                                    </li>
                              </ul>
                        </div>
                        <div class="col">
                              <input type="number" class="form-control" placeholder="Quantity" name="quantity[]" value="">
                        </div>
                  </div>
                  <div class="row">
                        <div class="col">
                              <ul class="list-group">
                                    <li class="list-group-item">
                                          <input class="form-check-input me-1" type="checkbox" value="KABEL HDMI" name="barang[]" id="5">
                                          <label class="form-check-label " for="5"> KABEL HDMI</label>
                                    </li>
                              </ul>
                        </div>
                        <div class="col">
                              <input type="number" class="form-control" placeholder="Quantity" name="quantity[]" value="">
                        </div>
                  </div>
                  <div class="row">
                        <div class="col">
                              <ul class="list-group">
                                    <li class="list-group-item">
                                          <input class="form-check-input me-1" type="checkbox" value="PC DELL 112" name="barang[]" id="6">
                                          <label class="form-check-label " for="6">PC DELL 112</label>
                                    </li>
                              </ul>
                        </div>
                        <div class="col">
                              <input type="number" class="form-control" placeholder="Quantity" name="quantity[]" value="">
                        </div>
                  </div>
                  <div class="row">
                        <div class="col">
                              <ul class="list-group">
                                    <li class="list-group-item">
                                          <input class="form-check-input me-1" type="checkbox" value="PC LENOVO 007" name="barang[]" id="7">
                                          <label class="form-check-label " for="7">PC LENOVO 007</label>
                                    </li>
                              </ul>
                        </div>
                        <div class="col">
                              <input type="number" class="form-control" placeholder="Quantity" name="quantity[]" value="">
                        </div>
                  </div>
                  <div class="row">
                        <div class="col">
                              <ul class="list-group">
                                    <li class="list-group-item ">
                                          <input class="form-check-input me-1" type="checkbox" value="SPEAKER ACER" name="barang[]" id="8">
                                          <label class="form-check-label " for="8">SPEAKER ACER</label>
                                    </li>
                              </ul>
                        </div>
                        <div class="col">
                              <input type="number" class="form-control" placeholder="Quantity" name="quantity[]" value="">
                        </div>
                  </div>

                  <div class="gap-2 mt-3 d-flex justify-content-center">
                        <input class="btn btn-success" type="submit" value="Submit" name="submit">
                        <a class="nav-link" href="index.php"><input class="btn btn-danger" type="reset" value="Back"></a>
                  </div>

            </form>
      </div>
</body>

</html>

<?php
// include ('connection.php');
// if (isset($_POST['submit'])){
//     $barang = $_POST["barang"];
//     $quantity = $_POST["quantity"];

// $sm = $connect->exec("INSERT INTO `peminjaman` (`barang`, `quantity`) VALUES ('$barang', '$quantity')"); 
// echo $sm;

// $username = $_POST['username'];
//                   $passwd = $_POST['password'];
//                   $cookieAct = $_POST['remember'];
//                   $connect->exec("USE proyek");
//                   $query = "INSERT INTO peminjaman (barang, quantity) VALUES ('$barang', '$quantity')";
//                   $statement = $connect->prepare($query);
//  $statement->execute();

// if ($sm == true) {
//     echo "Data berhasil disimpan.";
// } else {
//     echo "Error: ";
// }

// }


include('connection.php');

if (isset($_POST['submit'])) {
      $barang = $_POST["barang"];
      $quantity = $_POST["quantity"];
      $connect->exec("USE proyek");
      // Memastikan setidaknya satu barang dipilih
      if (!empty($barang)) {
            // Memproses setiap pasangan barang dan quantity
            for ($i = 0; $i < count($barang); $i++) {
                  $barangItem = $barang[$i];
                  $quantityItem = $quantity[$i];

                  // Simpan ke database atau lakukan tindakan lain sesuai kebutuhan
                  $query = "INSERT INTO peminjaman (nama_barang, quantity) VALUES ('$barangItem', '$quantityItem')";
                  $statement = $connect->prepare($query);
                  $statement->execute();
            }

            echo "Data berhasil disimpan.";
      } else {
            echo "Pilih setidaknya satu barang.";
      }
}
?>