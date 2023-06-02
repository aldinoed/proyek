<?php
session_start();
include '../connection.php';
if ($_SESSION['role'] !== 'Admin' || !(isset($_SESSION['user']))) {
      header('location: http://localhost:8080/wpw/proyek');
}
$connect->exec("USE proyek");
if (!(isset($_SESSION['user']))) {
      header('location: http://localhost:8080/wpw/proyek');
}

if (isset($_POST['acc'])) {
      try {
            $idPinjam = $_POST['acc'];
            $connect->exec("USE proyek");
            $query = "UPDATE detail_peminjaman SET status = 'Approved' WHERE id_peminjaman = :id";
            $statement = $connect->prepare($query);
            $statement->bindParam(':id', $idPinjam);
            $statement->execute();

            $query = "SELECT * FROM detail_peminjaman WHERE id_peminjaman = :id";
            $statement = $connect->prepare($query);
            $statement->bindParam(':id', $idPinjam);
            $statement->execute();
            $data = $statement->fetchAll();

            foreach ($data as $barang) {
                  $idBarang = $barang['id_barang'];
                  $qtyBarang = $barang['quantity'];

                  $query = "UPDATE barang SET tersedia = tersedia - :qty WHERE id_barang = :id";
                  $statement = $connect->prepare($query);
                  $statement->bindParam(':qty', $qtyBarang);
                  $statement->bindParam(':id', $idBarang);
                  $statement->execute();
            }
      } catch (PDOException $e) {
            echo $e->getMessage();
      }
}

if (isset($_POST['finish'])) {
      try {
            $selectedId = $_POST['finish'];
            $idBarang = $_POST['idbarang'];
            $connect->exec("USE proyek");
            $jmlStmnt = "SELECT jumlah FROM barang WHERE id_barang = :id";
            $stmnt = $connect->prepare($jmlStmnt);
            $stmnt->bindParam(':id', $idBarang);
            $stmnt->execute();
            $jumlahAll = $stmnt->fetchColumn();
            $jumlahAll += $_POST['quantity'];
            $query = "UPDATE barang SET jumlah =  $jumlahAll WHERE id_barang = :barang";
            $statement = $connect->prepare($query);
            $statement->bindParam(':barang', $idBarang);
            $statement->execute();
            $query = "DELETE FROM peminjaman WHERE id_peminjaman = :pinjam";
            $statement = $connect->prepare($query);
            $statement->bindParam(':pinjam', $selectedId);
            $statement->execute();
      } catch (PDOException $e) {
            echo $e->getMessage();
      }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>SMART-ILS</title>
      <!-- <link href="../css/bootstrap.min.css" rel="stylesheet"> -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
      <!-- font -->
      <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
      <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
      <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
      <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
      <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
      <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
      <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
      <!-- <link rel="stylesheet/less" type="text/css" href="scss/index.scss"> -->
      <style>
            *,
            *:before,
            *:after {
                  box-sizing: border-box;
                  margin: 0;
                  padding: 0;
                  /* border: 1px solid black; */
            }

            a {
                  text-decoration: none;
            }

            body {
                  font-family: 'Viga';
                  background: #f7f7f7;
            }

            .table-view {
                  height: 300px;
            }

            table {
                  max-height: 300px;
            }

            .menu-dashboard {
                  background-color: #354458;
                  width: 20%;
                  position: sticky;
                  color: white;
                  padding: 0px;
                  padding-top: -30px;
            }

            .user {
                  width: 70%;
                  height: 45px;
                  background-color: aqua;
            }

            .bar {
                  background-color: #44a0dc;
                  z-index: 999;
                  padding-right: 70px;
                  padding-left: 70px;
            }

            .navigasi .fitur:hover {
                  background-color: #28333e;
            }

            .fitur {
                  height: 55px;
                  border-radius: 0px;
                  width: 100%;
            }

            .fitur a {
                  font-size: 16px;
            }
      </style>
      <script>
            $(document).ready(function() {
                  $("#myModal").modal('show')
            })
      </script>
</head>

<body class="" style="background-color: #ddd;">
      <div class="container-fluid">
            <div class="bar fixed-top shadow d-flex justify-content-between align-items-center" style="height: 50px; " data-bs-theme="dark">
                  <h4 class=" text-white mt-2">SLELS</h4>
            </div>

            <div class=" row mt-5">
                  <div class="col-3 menu-dashboard rounded-end shadow d-flex justify-content-center flex-column align-content-between" style="margin-top:-60px; min-height: 102vh;">
                        <div class="d-flex flex-column justify-content-center  navigasi ">
                              <div style="margin-left:40px" class="pt-3 mb-5 ">
                                    <?php
                                    if (isset($_SESSION['user'])) : ?>
                                          <h5>
                                                <?php echo $_SESSION['user'] ?>
                                          </h5>
                                          <p>
                                                <?php echo $_SESSION['role'] ?>
                                          </p>
                                    <?php endif ?>
                              </div>
                              <div class="btn fitur d-flex justify-content-center align-items-center" style="padding-right: 105px;width:100%;"><span class="text-white  material-symbols-outlined">
                                          home
                                    </span><a class="text-white align-items-center" href="">&#160;&#160;Beranda</a></div>
                              <?php
                              if (isset($_SESSION['user'])) { ?>

                                    <div class="btn fitur d-flex justify-content-center align-items-center" style="padding-right: 40px"><span class="text-white  material-symbols-outlined">
                                                edit_note
                                          </span><a class="text-white align-items-center" href="#">&#160;&#160;Data Peminjaman</a></div>
                                    <div class="btn fitur d-flex justify-content-center align-items-center"><span class="text-white  material-symbols-outlined">
                                                home_repair_service
                                          </span><a class="text-white align-items-center" href="../invman/">&#160;&#160;Manajemen Peralatan</a></div>
                                    <div class="btn fitur d-flex justify-content-center align-items-center">&#160;&#160;<span class="text-white  material-symbols-outlined">
                                                manage_accounts
                                          </span><a class="text-white align-items-center" href="../userman/">&#160;&#160;Manajemen Pengguna</a></div>
                                    <form method="post" class="d-flex justify-content-center fitur" style="padding-right: 100px">
                                          <button name="logout" type="submit" formaction="../logout.php" class=" btn text-white d-flex align-items-center justify-content-center" style="border-radius:0px; height:50px;width: 100%;">
                                                <span class="material-symbols-outlined">
                                                      logout
                                                </span>&#160;&#160;Logout
                                          </button>
                                    </form>
                              <?php } else if (!(isset($_SESSION['user']))) { ?>
                                    <div method="post" class="d-flex justify-content-center fitur" style="padding-right: 100px">
                                          <a name="login" type="submit" class=" btn text-white d-flex align-items-center justify-content-center" style="border-radius:0px; height:50px;width: 100%;" href="../proyek/login/">
                                                <span class="material-symbols-outlined">
                                                      logout
                                                </span>&#160;&#160;Login
                                          </a>
                                    </div>
                              <?php } ?>
                        </div>
                  </div>
                  <!-- table section -->
                  <div class="col-9  ms-auto me-auto bg-white rounded-2 pt-3 " style="max-height:80vh; margin-top: 30px;">
                        <?php
                        include '../connection.php';
                        $currentUser = $_SESSION['user'];
                        $connect->exec("USE proyek");
                        $query = "SELECT * FROM detail_peminjaman ";
                        $statement = $connect->prepare($query);
                        $statement->execute();
                        $rowCount = $statement->rowCount();

                        if ($rowCount === 0) { ?>
                              <div class="img-fluid d-flex justify-content-center align-items-center  ms-auto me-auto" style="min-height:100%;">
                                    <img src=" ../asset/congratsAdmin.png" alt="" style="max-width: 380px;max-height:380px;">
                              </div>
                        <?php } else if ($rowCount > 0) { ?>
                              <div class="table-view overflow-auto" style="height:80%;">
                                    <table class="table table-striped ">
                                          <thead>
                                                <th scope="col">No.</th>
                                                <th scope="col">Id Peminjaman</th>
                                                <th scope="col">Nama Peminjam</th>
                                                <th scope="col">Tanggal Pengembalian</th>
                                                <th scope="col" class="ps-5">Action</th>
                                          </thead>
                                          <tbody>
                                                <?php
                                                include '../connection.php';
                                                $connect->exec("USE proyek");
                                                $query = "SELECT dp.id_peminjaman, MAX(u.nama_user) AS nama_user, MAX(b.nama_barang) AS nama_barang, MAX(dp.id_barang) AS id_barang, MAX(dp.quantity) AS quantity, MAX(dp.tanggal_pengembalian) AS tanggal_pengembalian, MAX(dp.status) AS status  FROM detail_peminjaman dp INNER JOIN barang b ON dp.id_barang = b.id_barang INNER JOIN user u ON dp.id_user = u.id_user GROUP BY dp.id_peminjaman";

                                                $statement = $connect->prepare($query);
                                                $statement->execute();
                                                $jobs = $statement->fetchAll();
                                                $i = 1;
                                                foreach ($jobs as $job) {  ?>
                                                      <tr>
                                                            <td><?php echo $i; ?></td>
                                                            <td><?php echo $job['id_peminjaman']; ?></td>
                                                            <td><?php echo $job['nama_user']; ?></td>
                                                            <td><?php echo $job['tanggal_pengembalian']; ?></td>
                                                            <td class="d-flex justify-content-start">
                                                                  <form method="POST" action="../peminjaman/">
                                                                        <?php if ($job['status'] == 'Waiting') { ?>
                                                                              <div class="d-flex">
                                                                                    <button type="submit" class="btn btn-primary d-flex align-items-center" style="font-size: 14px;" name="acc" value="<?= $job['id_peminjaman']; ?>"><span class="material-symbols-outlined"> task_alt
                                                                                          </span> Setujui</button>
                                                                                    <button type="submit" class="btn btn-danger d-flex align-items-center" style="font-size: 14px;" name="reject" value="<?= $job['id_peminjaman']; ?>"><span class="material-symbols-outlined"> cancel
                                                                                          </span>&#160; Tolak &#160;</button>
                                                                              </div>
                              </div>
                        <?php } else if ($job['status'] == 'Approved') { ?>
                              <input type="text" name="idbarang" value="<?= $job['id_barang']; ?>" style="display: none;">
                              <input type="text" name="quantity" value="<?= $job['quantity']; ?>" style="display: none;">
                              <button type="submit" class="btn btn-primary d-flex align-items-center" style="font-size: 14px;" name="finish" value="<?= $job['id_peminjaman']; ?>"><span class="material-symbols-outlined">
                                          approval_delegation
                                    </span>&#160; Dikembalikan</button>
                        <?php } ?>
                        </form>
                        </td>
                        </tr>
                  <?php $i++;
                                                } ?>
                  </tbody>
                  </table>
                  </div>
            <?php } ?>
            </div>

            <script src="../js/bootstrap.bundle.min.js"></script>
            <script src="../js/jquery-3.6.1.min.js"></script>
            <script>
                  $(document).ready(function() {
                        $("#limit-records").change(function() {
                              $('form').submit();
                        })
                  })
            </script>
            <?php

            ?>
</body>

</html>