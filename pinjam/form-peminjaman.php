<?php session_start();

include '../connection.php';
if (!(isset($_SESSION['user'])) || $_SESSION['role'] == 'Admin') {
      header('location: http://localhost:8080/wpw/proyek');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Form Peminjaman</title>
      <link rel="stylesheet" href="../css/bootstrap.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css" />
      <style>
            * {
                  margin: 0;
                  padding: 0;
                  font-family: 'Viga'
            }

            select {
                  max-height: 50px;
                  padding-bottom: 30px;
            }
      </style>

</head>

<body class="bg-primary">
      <div class="container">
            <form method="POST" class="shadow rounded pt-1 mt-5 pb-4 bg-white " style="max-height: 80vh">
                  <h1 class="d-flex justify-content-center  mt-4 mb-3">Form Peminjaman Barang Lab</h1>
                  <div class=" mt-5 row ms-auto me-auto overflow-auto" style="width:90%;">
                        <div class="col ">
                              <ul class="list-group overflow-scroll border" style="max-height: 33vh;">
                                    <div class="list-group-item row d-flex justify-content-center">
                                          <div class="form-floating col-sm-6">
                                                <div>
                                                      <select id="barang" class="form-select" name="barang[]" aria-label="Default select example">
                                                            <option selected">Pilih Barang</option>
                                                            <?php
                                                            include('../connection.php');
                                                            $connect->exec("USE proyek");
                                                            $query = "SELECT id_barang, nama_barang FROM barang";
                                                            $statement = $connect->query($query);

                                                            // Mengambil data barang dalam bentuk array
                                                            $data_barang = $statement->fetchAll(PDO::FETCH_ASSOC);

                                                            // Menampilkan data barang dalam dropdown
                                                            foreach ($data_barang as $barang) {
                                                                  echo '<option value="' . $barang['nama_barang'] . '">' . $barang['nama_barang'] . '</option>';
                                                            }
                                                            ?>
                                                      </select>
                                                </div>
                                          </div>
                                          <div class="col-sm-6 d-flex align-items-center justify-content-between">
                                                <div class="input-group me-4 ">
                                                      <input type="number" class="form-control" placeholder="Quantity" name="quantity[]" value="">
                                                </div>
                                                <div class="input-group" style="max-width: 40px">
                                                      <button onclick="addNewRow(event)" class="btn btn-primary">+</button>
                                                </div>
                                          </div>
                                    </div>
                        </div>
                        <div class="row mt-3">
                              <div class="input-group">
                                    <input type="text" class="form-control datepicker" placeholder="Masukkan tanggal peminjaman" name="datePinjam" value="">
                              </div>
                              <div class="input-group mt-3">
                                    <input type="text" class="form-control datepicker" placeholder="Masukkan tanggal pengembalian" name="date" value="">
                              </div>
                              <div class="gap-2 mt-3 d-flex justify-content-start">
                                    <button name="submit" class="btn btn-primary shadow" type="submit" formaction="form-peminjaman.php">Submit</button>
                                    <button class="btn btn-danger shadow" type="reset"> <a href="../pinjam/form-peminjaman.php" class="text-white text-decoration-none">Clear</a> </button>
                                    <button type="button" class="btn btn-secondary shadow " name="kembali"> <a href="../pinjam/" class="text-white text-decoration-none">&#160;Back&#160; </a> </button>
                              </div>
                        </div>
                  </div>
                  </ul>
      </div>
      </div>
      </form>
      </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
      <script src="../js/jquery-3.6.1.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
      <script>
            $(document).ready(function() {
                  $('.datepicker').datepicker({
                        format: 'yyyy/mm/dd',
                        todayHighlight: true,
                        autoclose: true,
                        orientation: 'bottom'
                  });
            });

            function addNewRow(event) {
                  event.preventDefault();

                  var container = document.querySelector(".list-group");

                  var newRow = document.createElement("div");
                  newRow.classList.add("list-group-item", "row", "d-flex", "justify-content-center");

                  var selectContainer = document.createElement("div");
                  selectContainer.classList.add("form-floating", "col-sm-6");

                  var divBeforeSelect = document.createElement("div");

                  var select = document.createElement("select");
                  select.setAttribute("id", "barang");
                  select.classList.add("form-select", );
                  select.style.paddingTop = '0px'
                  select.style.paddingBottom = '0px'
                  select.setAttribute("name", "barang[]");

                  var option = document.createElement("option");
                  option.setAttribute("value", "");
                  option.innerText = "Pilih Barang";

                  select.appendChild(option);

                  <?php
                  // Menampilkan data barang dalam dropdown
                  foreach ($data_barang as $barang) {
                        echo 'var option = document.createElement("option");';
                        echo 'option.setAttribute("value", "' . $barang['nama_barang'] . '");';
                        echo 'option.innerText = "' . $barang['nama_barang'] . '";';
                        echo 'select.appendChild(option);';
                  }

                  ?>
                  selectContainer.appendChild(select);

                  var quantityContainer = document.createElement("div");
                  quantityContainer.classList.add("col-sm-6", "d-flex", "align-items-center", "justify-content-between");
                  quantityContainer.style.paddingTop = '0px'
                  quantityContainer.style.paddingBottom = '0px'

                  var inputGroup = document.createElement("div");
                  inputGroup.classList.add("input-group", "me-4");

                  var input = document.createElement("input");
                  input.setAttribute("type", "number");
                  input.classList.add("form-control");
                  input.setAttribute("placeholder", "Quantity");
                  input.setAttribute("name", "quantity[]");
                  input.setAttribute("value", "");

                  inputGroup.appendChild(input);

                  var addButtonContainer = document.createElement("div");
                  addButtonContainer.classList.add("input-group");
                  addButtonContainer.style.maxWidth = '40px'

                  var addButton = document.createElement("button");
                  addButton.setAttribute("onclick", "addNewRow(event)");
                  addButton.classList.add("btn", "btn-primary");
                  addButton.innerText = "+";

                  addButtonContainer.appendChild(addButton);

                  quantityContainer.appendChild(inputGroup);
                  quantityContainer.appendChild(addButtonContainer);

                  newRow.appendChild(selectContainer);
                  newRow.appendChild(quantityContainer);

                  container.appendChild(newRow);

                  function adjustSelectWidth() {
                        var selects = document.querySelectorAll('.select-barang');

                        // Dapatkan lebar maksimum dari semua elemen select
                        var maxWidth = 0;
                        selects.forEach(function(select) {
                              var width = select.offsetWidth;
                              if (width > maxWidth) {
                                    maxWidth = width;
                              }
                        });

                        // Setel lebar maksimum untuk semua elemen select
                        selects.forEach(function(select) {
                              select.style.width = maxWidth + 'px';
                        });
                  }
            }
      </script>
</body>

</html>

<?php
include('../connection.php');
require '../deffunc.php';
$connect->exec("USE proyek");
if (isset($_POST['submit'])) {
      $idUser = $_SESSION['id'];
      $barang = $_POST["barang"];
      $quantity = $_POST["quantity"];
      $idPinjam = cekUuid();
      $namaUser = $_SESSION['user'];
      $date = date("Y-m-d");
      $borrowDate = $_POST['datePinjam'];
      $returnDate = $_POST['date'];

      if (!empty($barang)) {
            // Memproses setiap pasangan barang dan quantity
            for ($i = 0; $i < count($barang); $i++) {
                  $barangItem = $barang[$i];
                  $query = "SELECT id_barang FROM barang WHERE nama_barang  = '$barangItem'";
                  $statement = $connect->prepare($query);
                  $statement->execute();
                  $idBarang = $statement->fetchColumn();

                  $quantityItem = $quantity[$i];
                  $query = "INSERT INTO detail_peminjaman (id_peminjaman, id_user, id_barang, quantity, tanggal_pengembalian, status, tanggal_peminjaman, status_diambil) VALUES ('$idPinjam', '$idUser','$idBarang', '$quantityItem', '$returnDate', 'Waiting', '$borrowDate', 'belum')";
                  $statement = $connect->prepare($query);
                  $statement->execute();
            }
            echo "<script>alert(\"Data Berhasil Disimpan!\")</script>";
            echo "<script>setTimeout(function() {
        window.location.href = 'http://localhost:8080/wpw/proyek/pinjam'
        },10)</script>";
      } else {
            echo "<script>alert(\"Anda belum memilih satu barang \")</script>";
      }
}
?>