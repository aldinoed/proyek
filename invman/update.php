<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['role'] != 'Admin') {
      header('location: http://localhost:8080/wpw/proyek');
}

include '../connection.php';
if (isset($_GET['update'])) {
      $connect->exec("USE proyek");
      $idBarang = $_GET['update'];
      $query = "SELECT * FROM barang WHERE id_barang = '$idBarang'";
      $statement = $connect->prepare($query);
      $statement->execute();
      $users = $statement->fetch(PDO::FETCH_ASSOC);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Update Barang</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
      <link rel="stylesheet" href="https://code.jquery.com/jquery-3.3.1.slim.min.js">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
      <style>
            body {
                  display: flex;
                  justify-content: center;
                  align-items: center;
                  background-color: #009BE6;
            }

            .form-container {
                  min-width: 120vh;
                  margin-top: 15px;
                  height: 1000%;
            }
      </style>
</head>

<body>
      <div class="form-container">
            <div class="card login-card p-3 shadow-lg">
                  <div class="card-body">
                        <div class="row">
                              <h3 class="text-center fw-bold">Update Data Barang</h3>
                        </div>
                        <form method="POST" action="update.php" class="d-flex justify-content-center flex-column">
                              <div class="row mb-1">
                                    <label for="exampleInputNama" class="col-sm-5 col-form-label">Nama Barang</label>
                                    <div class="col-sm-11">
                                          <input disabled type="text" class="form-control update" id="InputNama" name="nama" value="<?= $users['nama_barang']; ?>">
                                    </div>
                                    <div class="col-sm-1 d-flex justify-content-center">
                                          <button type="button" onclick="toggleForm('InputNama')" class="btn btn-warning update2" name="update" value=""><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                      <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                      <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                </svg></button>
                                    </div>
                              </div>
                              <div class="row mb-1">
                                    <label for="exampleInputUname" class="col-sm-5 col-form-label">Jumlah</label>
                                    <div class="col-sm-11">
                                          <input disabled type="number" class="form-control update" id="InputUname" name="jumlah" value="<?= $users['jumlah']; ?>">
                                    </div>
                                    <div class="col-sm-1 d-flex justify-content-center">
                                          <button type="button" onclick="toggleForm('InputUname')" class="btn btn-warning update3" name="update" value=""><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                      <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                      <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                </svg></button>
                                    </div>
                              </div>
                              <div class="row mb-1">
                                    <label for="exampleInputUname" class="col-sm-5 col-form-label">Jumlah Penambahan Barang</label>
                                    <div class="col-sm-11">
                                          <input disabled type="number" class="form-control update" id="InputChange" name="change" value="0">
                                    </div>
                                    <div class="col-sm-1 d-flex justify-content-center">
                                          <button type="button" onclick="toggleForm('InputChange')" class="btn btn-warning update3" name="update" value=""><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                      <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                      <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                </svg></button>
                                    </div>
                              </div>
                              <div class="row ms-1 mt-3" style="margin-bottom:-10px">
                                    <input style="display: none;" type="" value="<?= $users['id_barang'] ?>" name="idBarang">
                                    <button type="submit" id="kirim" class="btn btn-primary tombol col-2" name="login">Submit</button>
                                    <button type="reset" class="btn btn-secondary col-2 tombol" style="margin-left:10px;"><a href="../invman/" class="text-white" style="text-decoration:none">Back</a></button>
                              </div>
                        </form>
                  </div>
            </div>
      </div>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
      <script>
            function toggleForm(inputId) {
                  const input = document.getElementById(inputId);
                  input.disabled = !input.disabled;
            }
            // document.querySelector('form').addEventListener('submit', function(e) {
            //       e.preventDefault(); // Prevent form from submitting directly

            //       const disabledInputs = Array.from(document.querySelectorAll('.update'));

            //       disabledInputs.forEach(function(input) {
            //             input.disabled = !input.disabled; // Toggle the disabled attribute
            //       });

            //       this.submit(); // Submit the form
            // });
      </script>

</body>

</html>

<?php
include '../connection.php';
if (isset($_POST['login'])) {
      try {
            $id = $_POST['idBarang'];
            $nama = $_POST['nama'];
            $change = $_POST['change'];
            $connect->exec("USE proyek");
            $query = "SELECT * FROM barang WHERE id_barang = :id";
            $statement = $connect->prepare($query);
            $statement->bindParam(':id', $id);
            $statement->execute();
            $currentAvlbl  = $statement->fetchAll(PDO::FETCH_ASSOC);
            $tersedia = $currentAvlbl[0]['tersedia'];
            $jumlah = $currentAvlbl[0]['jumlah'];
            $tersedia += $change;
            $jumlah += $change;
            $query = " UPDATE barang SET nama_barang = :nama, jumlah = :qty, tersedia = :current WHERE id_barang = :id";
            $stmt = $connect->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':nama', $nama);
            $stmt->bindParam(':qty', $jumlah);
            $stmt->bindParam(':current', $tersedia);
            $stmt->execute();
            echo "<script>alert(\"Data Berhasil Disimpan!\")</script>";
            echo "<script>setTimeout(function() {
        window.location.href = 'http://localhost:8080/wpw/proyek/invman'
        },10)</script>";
            exit;
      } catch (PDOException $e) {
            echo $e->getMessage();
      }
}
?>