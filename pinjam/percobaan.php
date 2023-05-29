<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
      <link rel="stylesheet" href="bootstrap.min.css">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
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

<body>
      <div class="container">
            <form action="percobaan.php" method="POST">
                  <h1 class="d-flex justify-content-center">Form Peminjaman Barang Lab</h1>
                  <div class=" mt-5 row ms-auto me-auto overflow-auto" style="width:90%;">
                        <div class="col ">
                              <ul class="list-group">
                                    <div class="list-group-item row d-flex justify-content-center">
                                          <div class="form-floating col-sm-6">
                                                <div>
                                                      <select id="barang" class="form-select" name="barang[]" aria-label="Default select example">
                                                            <option selected">Pilih Barang</option>
                                                            <?php
                                                            include('../connection.php');
                                                            // Buat koneksi PDO
                                                            $connect->exec("USE proyek");
                                                            $query = "SELECT nama_barang FROM barang";
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
                                                <div class="input-group ">
                                                      <button onclick="addNewRow(event)" class="btn btn-primary">+</button>
                                                </div>
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
      <script>
            // function addNewRow(event) {
            //       event.preventDefault();

            //       var container = document.querySelector(".list-group");

            //       var newRow = document.createElement("div");
            //       newRow.classList.add("list-group-item", "row", "d-flex");

            //       var selectContainer = document.createElement("div");
            //       selectContainer.classList.add("form-floating", "col-sm-6");

            //       var select = document.createElement("select");
            //       select.setAttribute("id", "barang");
            //       select.classList.add("form-select")
            //       select.setAttribute("name", "barang[]", "aria-label");
            //       // select.setAttribute("multiple", "");

            //       var option = document.createElement("option");
            //       option.setAttribute("value", "");
            //       option.innerText = "Pilih Barang";

            //       select.appendChild(option);
            function addNewRow(event) {
                  event.preventDefault();

                  var container = document.querySelector(".list-group");

                  var newRow = document.createElement("div");
                  newRow.classList.add("list-group-item", "row", "d-flex", "justify-content-center");

                  var selectContainer = document.createElement("div");
                  selectContainer.classList.add("form-floating", "col-sm-6");

                  var select = document.createElement("select");
                  select.setAttribute("id", "barang");
                  select.classList.add("form-select");
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
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>

<?php
include('../connection.php');
$connect->exec("USE proyek");
if (isset($_POST['submit'])) {
      $barang = $_POST["barang"];
      $quantity = $_POST["quantity"];

      // Memastikan setidaknya satu barang dipilih
      if (!empty($barang)) {
            // Memproses setiap pasangan barang dan quantity
            for ($i = 0; $i < count($barang); $i++) {
                  $barangItem = $barang[$i];
                  $quantityItem = $quantity[$i];

                  // Simpan ke database atau lakukan tindakan lain sesuai kebutuhan
                  $query = "INSERT INTO peminjaman (barang, quantity) VALUES (?, ?)";
                  $statement = $connect->prepare($query);
                  $statement->bindParam(1, $barangItem);
                  $statement->bindParam(2, $quantityItem);
                  $statement->execute();
            }

            echo "Data berhasil disimpan.";
      } else {
            echo "Pilih setidaknya satu barang.";
      }
}
?>