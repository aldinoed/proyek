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
      <div class="container">
            <form action="form_peminjaman.php" method="POST">
                  <h1 class="d-flex justify-content-center"><span class="badge bg-secondary">FORM</span>Peminjaman Barang Lab</h1>
                  <div class="row">
                        <div class="col">
                              <ul class="list-group">
                                    <li class="list-group-item">
                                          <input class="form-check-input me-1" type="checkbox" value="MOUSE" name="barang[]">
                                          <label class="form-check-label " for="firstCheckboxStretched">MOUSE</label>
                                    </li>
                              </ul>
                        </div>
                        <div class="col">
                              <input type="number" class="form-control" placeholder="Quantity" name="quantity[]">
                        </div>
                  </div>
                  <div class="row">
                        <div class="col">
                              <ul class="list-group">
                                    <li class="list-group-item">
                                          <input class="form-check-input me-1" type="checkbox" value="KEYBOARD" name="barang[]">
                                          <label class="form-check-label " for="secondCheckboxStretched">KEYBOARD</label>
                                    </li>
                              </ul>

                        </div>
                        <div class="col">
                              <input type="number" class="form-control" placeholder="Quantity" name="quantity[]">
                        </div>
                  </div>

                  <div class="row">
                        <div class="col">
                              <ul class="list-group">
                                    <li class="list-group-item">
                                          <input class="form-check-input me-1" type="checkbox" value="MONITOR" name="barang[]">
                                          <label class="form-check-label " for="thirdCheckboxStretched">MONITOR</label>
                                    </li>
                              </ul>
                        </div>
                        <div class="col">
                              <input type="number" class="form-control" placeholder="Quantity" name="quantity[]">
                        </div>
                  </div>
                  <div class="row">
                        <div class="col">
                              <ul class="list-group">
                                    <li class="list-group-item">
                                          <input class="form-check-input me-1" type="checkbox" value="HEADPHONE" name="barang[]">
                                          <label class="form-check-label " for="thirdCheckboxStretched">HEADPHONE</label>
                                    </li>
                              </ul>
                        </div>
                        <div class="col">
                              <input type="number" class="form-control" placeholder="Quantity" name="quantity[]">
                        </div>
                  </div>
                  <div class="row">
                        <div class="col">
                              <ul class="list-group">
                                    <li class="list-group-item">
                                          <input class="form-check-input me-1" type="checkbox" value="KABEL HDMI" name="barang[]">
                                          <label class="form-check-label " for="thirdCheckboxStretched">KABEL HDMI</label>
                                    </li>
                              </ul>
                        </div>
                        <div class="col">
                              <input type="number" class="form-control" placeholder="Quantity" name="quantity[]">
                        </div>
                  </div>
                  <div class="row">
                        <div class="col">
                              <ul class="list-group">
                                    <li class="list-group-item">
                                          <input class="form-check-input me-1" type="checkbox" value="DELL 112" name="barang[]">
                                          <label class="form-check-label " for="thirdCheckboxStretched">PC DELL 112</label>
                                    </li>
                              </ul>
                        </div>
                        <div class="col">
                              <input type="number" class="form-control" placeholder="Quantity" name="quantity[]">
                        </div>
                  </div>
                  <div class="row">
                        <div class="col">
                              <ul class="list-group">
                                    <li class="list-group-item">
                                          <input class="form-check-input me-1" type="checkbox" value="PC LENOVO 007" name="barang[]">
                                          <label class="form-check-label " for="thirdCheckboxStretched">PC LENOVO 007</label>
                                    </li>
                              </ul>
                        </div>
                        <div class="col">
                              <input type="number" class="form-control" placeholder="Quantity" name="quantity[]">
                        </div>
                  </div>
                  <div class="row">
                        <div class="col">
                              <ul class="list-group">
                                    <li class="list-group-item ">
                                          <input class="form-check-input " type="checkbox" value="Speaker Acer" name="barang[]">
                                          <label class="form-check-label " for="thirdCheckboxStretched">SPEAKER ACER</label>
                                    </li>
                              </ul>
                        </div>
                        <div class="col">
                              <input type="number" class="form-control" placeholder="Quantity" name="quantity[]">
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
include '../connection.php';
if (isset($_POST['submit'])) {
      $barangs = $_POST["barang"];
      $quantities = $_POST["quantity"];
      $connect->exec("USE proyek");

      foreach ($barangs as  $barang) {
            // Periksa jika nilai barang dan quantity tidak kosong
            if (!empty($barang)) {
                  // Lakukan operasi yang diperlukan, misalnya menyimpan nilai ke database
                  // $barang dan $quantity mewakili nilai input pada setiap iterasi
                  $query = "INSERT INTO peminjaman (`nama_barang`, `quantity`) VALUES ('$barang', '$quantity')";
                  $statement = $connect->prepare($query);
                  $statement->execute();
            }
      }


      // $sm = $connect->exec("INSERT INTO `peminjaman` (`barang`, `quantity`) VALUES ('$barang', '$quantity')");
      // echo $sm;

      // if ($sm == true) {
      //       echo "Data berhasil disimpan.";
      // } else {
      //       echo "Error: ";
      // }
}

?>