<?php
session_start();
include '../connection.php';

if (!(isset($_SESSION['user'])) || $_SESSION['role'] == 'Admin') {
      header('location: http://localhost:8080/wpw/proyek');
}

$connect->exec("USE proyek");
if (isset($_POST['delete'])) {
      try {
            $selectedNRP = $_POST['selectedNrp'];
            $connect->exec("USE proyek");
            $query = "DELETE FROM user WHERE id_user = :nrp";
            $statement = $connect->prepare($query);
            $statement->bindParam(':nrp', $selectedNRP);
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
      <title>User Management</title>
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
                  /* max-height: 100%; */
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
                  <p class="text-white mt-3">
                        <?php if (isset($_SESSION['user'])) :
                              echo $_SESSION['user'];
                        endif ?></p>
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
                              if ($_SESSION['role'] === 'Mahasiswa' || $_SESSION['role'] === 'Dosen') { ?>
                                    <div class="btn fitur d-flex justify-content-center align-items-center " style="padding-right:60px"><span class="material-symbols-outlined text-white">
                                                home_repair_service
                                          </span><a class="text-white align-items-center" href="pinjam/">&#160;&#160;Pinjam Barang</a>
                                    </div>
                                    <form method="post" class="d-flex justify-content-center fitur" style="padding-right: 100px">
                                          <button name="logout" type="submit" formaction="../logout.php" class=" btn text-white d-flex align-items-center justify-content-center" style="border-radius:0px; height:50px;width: 100%;">
                                                <span class="material-symbols-outlined">
                                                      logout
                                                </span>&#160;&#160;Logout
                                          </button>
                                    </form>

                              <?php } ?>
                        </div>
                  </div>
                  <!-- table section -->
                  <div class="col-9  ms-auto me-auto bg-white rounded-2 pt-3 " style="max-height:76vh; margin-top: 40px;">
                        <div class="d-flex align-items-center  justify-content-between ps-1 pe-4 mb-2">
                              <button class="btn-primary btn"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                                          <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
                                    </svg><a href="form-peminjaman.php" class="text-white">Pinjam</a>
                              </button>
                        </div>
                        <?php
                        include '../connection.php';
                        $idUser = $_SESSION['id'];
                        $connect->exec("USE proyek");

                        $query = "SELECT dp.*, b.nama_barang, u.nama_user FROM detail_peminjaman dp INNER JOIN barang b ON dp.id_barang = b.id_barang INNER JOIN user u ON dp.id_user = u.id_user WHERE dp.id_user = '$idUser'";
                        $statement = $connect->prepare($query);
                        $statement->execute();
                        $rowCount = $statement->rowCount();

                        if ($rowCount === 0) { ?>
                              <div class="img-fluid d-flex justify-content-center align-items-center  ms-auto me-auto" style="min-height:100%;">
                                    <img src=" ../asset/congrats.png" alt="" style="max-width: 380px;max-height:380px;">
                              </div>
                        <?php } else if ($rowCount > 0) { ?>
                              <div class="table-view overflow-auto" style="height:80%;">
                                    <table class="table table-striped ">
                                          <tr>
                                                <thead>
                                                      <th scope="col">No.</th>
                                                      <th scope="col">Id Peminjaman</th>
                                                      <th scope="col">Barang</th>
                                                      <th scope="col">Jumlah</th>
                                                      <th scope="col">Tanggal Peminjaman</th>
                                                      <th scope="col">Tanggal Pengembalian</th>
                                                      <th scope="col">Status</th>
                                          </tr>
                                          </thead>
                                          <tbody>

                                                <?php $users = $statement->fetchAll();
                                                $i = 1;
                                                foreach ($users as $user) {  ?>
                                                      <tr>
                                                            <td><?= $i; ?></td>
                                                            <td><?= $user['id_peminjaman']; ?></td>
                                                            <td><?= $user['nama_barang']; ?></td>
                                                            <td><?= $user['quantity']; ?></td>
                                                            <td><?= $user['tanggal_peminjaman']; ?></td>
                                                            <td><?= $user['tanggal_pengembalian']; ?></td>
                                                            <td>
                                                                  <?php if ($user['status'] == 'Waiting') { ?>
                                                                        <div class="btn bg-warning text-white" style="cursor:auto;">
                                                                              Waiting
                                                                        </div>
                                                                  <?php } else if ($user['status'] == 'Approved') { ?>
                                                                        <div class="btn bg-success text-white" style="cursor:auto;">
                                                                              Approved
                                                                        </div>
                                                                  <?php  } ?>
                                                            </td>
                                                      </tr>
                                          <?php $i++;
                                                }
                                          }
                                          ?>
                                          </tbody>
                                    </table>
                              </div>
                  </div>
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
</body>

</html>