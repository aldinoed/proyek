<?php
session_start();
include('connection.php');

$connect->exec("USE proyek");
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
      $barang = $_POST["barang"];
      $quantity = $_POST["quantity"];
      $dates = $_POST["date"];

      // Memastikan setidaknya satu barang dipilih
      if (!empty($barang)) {
            // Memproses setiap pasangan barang, quantity, dan date
            for ($i = 0; $i < count($barang); $i++) {
                  $barangItem = $barang[$i];
                  $quantityItem = $quantity[$i];
                  $dateItem = $dates[$i];
                  // Simpan ke database atau lakukan tindakan lain sesuai kebutuhan
                  $query = "INSERT INTO peminjaman (id_peminjaman
            , barang, quantity, tanggal_pengembalian) VALUES (?, ?, ?, ?)";
                  $statement = $connect->prepare($query);

                  // Generate id untuk pasangan barang
                  $id = uniqid();

                  $statement->bindParam(1, $id);
                  $statement->bindParam(2, $barangItem);
                  $statement->bindParam(3, $quantityItem);
                  $statement->bindParam(4, $dateItem);
                  $statement->execute();
            }
            header('location: http://localhost:8080/wpw/proyek/nota.php');
            // echo '<script>redirectToNotaPeminjaman();</script>';
      } else {
            echo "Pilih setidaknya satu barang.";
      }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css" />
</head>

<body>
      <div class="container">
            <form action="peminjaman.php" method="POST">
                  <h1 class="d-flex justify-content-center"><span class="badge bg-secondary">FORM</span>Peminjaman Barang Lab</h1>
                  <div class="row">
                        <div class="col">
                              <ul class="list-group">
                                    <div class="list-group-item row">
                                          <div class="form-floating col">
                                                <select id="barang" name="barang[]" multiple>
                                                      <option value="">Pilih Barang</option>
                                                      <?php
                                                      include('connection.php');

                                                      try {
                                                            $query = "SELECT nama_barang FROM barang";
                                                            $connect->exec('USE proyek');
                                                            $statement = $connect->query($query);

                                                            // Mengambil data barang dalam bentuk array
                                                            $data_barang = $statement->fetchAll(PDO::FETCH_ASSOC);

                                                            // Menampilkan data barang dalam dropdown
                                                            foreach ($data_barang as $barang) {
                                                                  echo '<option value="' . $barang['nama_barang'] . '">' . $barang['nama_barang'] . '</option>';
                                                            }
                                                      } catch (PDOException $e) {
                                                            // Menampilkan pesan kesalahan jika terjadi error
                                                            echo "Error: " . $e->getMessage();
                                                      }
                                                      ?>
                                                </select>
                                          </div>
                                          <div class="col">
                                                <div class="input-group">
                                                      <input type="number" class="form-control" placeholder="Quantity" name="quantity[]" value="">
                                                      <button onclick="addNewRow(event)" class="btn btn-primary">+</button>
                                                </div>
                                          </div>
                                          <div class="col">
                                                <div class="input-group">
                                                      <input type="text" class="form-control datepicker" placeholder="MM/DD/YYYY" name="date[]" value="">
                                                </div>
                                          </div>
                                    </div>
                              </ul>
                        </div>
                  </div>
                  <div class="gap-2 mt-3 d-flex justify-content-center">
                        <input class="btn btn-success" type="submit" value="Submit" name="submit">
                        <a class="nav-link" href="index.php"><input class="btn btn-danger" type="reset" value="Back"></a>
                  </div>

            </form>
      </div>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
      <script>
            $(document).ready(function() {
                  $('.datepicker').datepicker({
                        format: 'mm/dd/yyyy',
                        todayHighlight: true,
                        autoclose: true
                  });
            });

            function addNewRow(event) {
                  event.preventDefault();

                  var container = document.querySelector(".list-group");

                  var newRow = document.createElement("div");
                  newRow.classList.add("list-group-item", "row");

                  var selectContainer = document.createElement("div");
                  selectContainer.classList.add("form-floating", "col");

                  var select = document.createElement("select");
                  select.setAttribute("name", "barang[]");
                  select.setAttribute("multiple", "");

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
                  quantityContainer.classList.add("col");

                  var input = document.createElement("input");
                  input.setAttribute("type", "number");
                  input.setAttribute("class", "form-control");
                  input.setAttribute("placeholder", "Quantity");
                  input.setAttribute("name", "quantity[]");
                  input.setAttribute("value", "");

                  quantityContainer.appendChild(input);

                  var dateContainer = document.createElement("div");
                  dateContainer.classList.add("col");

                  var dateInput = document.createElement("input");
                  dateInput.setAttribute("type", "text");
                  dateInput.setAttribute("class", "form-control datepicker");
                  dateInput.setAttribute("placeholder", "MM/DD/YYYY");
                  dateInput.setAttribute("name", "date[]");

                  dateContainer.appendChild(dateInput);

                  var buttonContainer = document.createElement("div");
                  buttonContainer.classList.add("col");

                  var addButton = document.createElement("button");
                  addButton.setAttribute("onclick", "addNewRow(event)");
                  addButton.classList.add("btn", "btn-primary");
                  addButton.innerText = "+";

                  buttonContainer.appendChild(addButton);

                  newRow.appendChild(selectContainer);
                  newRow.appendChild(quantityContainer);
                  newRow.appendChild(dateContainer);
                  newRow.appendChild(buttonContainer);

                  container.appendChild(newRow);
            }
      </script>
      <script>
            // function redirectToNotaPeminjaman() {
            //       window.location.href = "nota.php";
            // }
      </script>
</body>

</html>