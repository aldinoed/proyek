<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>*{margin:0; padding:0; font-family:'Viga'}</style>
</head>
<body>
<div class="container">
  <form action="percobaan.php" method="POST">
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
        // Buat koneksi PDO
        $pdo = new PDO("mysql:host=localhost;dbname=proyek", "root", "");
        
        // Set atribut PDO untuk menampilkan pesan kesalahan
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Query untuk mendapatkan data barang dari tabel
        $query = "SELECT nama_barang FROM barang";
        $statement = $pdo->query($query);
        
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
  </div>
</ul>
  </div>
</div>

<div class="gap-2 mt-3 d-flex justify-content-center">
  <input class="btn btn-success" type="submit" value="Submit" name="submit">
  <a class="nav-link" href="index.php"><input class="btn btn-danger" type="reset" value="Back" ></a>
</div>

  </form>
</div>
<script>
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
    
    var buttonContainer = document.createElement("div");
    buttonContainer.classList.add("col");
    
    var addButton = document.createElement("button");
    addButton.setAttribute("onclick", "addNewRow(event)");
    addButton.classList.add("btn", "btn-primary");
    addButton.innerText = "+";
    
    buttonContainer.appendChild(addButton);
    
    newRow.appendChild(selectContainer);
    newRow.appendChild(quantityContainer);
    newRow.appendChild(buttonContainer);
    
    container.appendChild(newRow);
  }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>

<?php
include ('connection.php');

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