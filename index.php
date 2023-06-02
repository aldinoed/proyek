<?php
session_start();

?>


<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>SLELS</title>
      <link href="css/bootstrap.min.css" rel="stylesheet">

      <!-- font -->
      <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">
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
                  height: 100vh;
                  position: sticky;
                  color: white;
                  padding: 0px;
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

<body class="secondary">
      <div class="container-fluid">
            <div class="bar fixed-top shadow d-flex justify-content-between align-items-center" style="height: 50px; " data-bs-theme="dark">
                  <h4 class=" text-white mt-2">Smart Laboratory Equipment Loan System</h4>
                  <p class="text-white mt-3">
                        <?php if (isset($_SESSION['user'])) :
                              echo $_SESSION['user'];
                        endif ?></p>
            </div>

            <div class=" row">
                  <div class="col-3 menu-dashboard rounded-end shadow d-flex justify-content-center flex-column align-content-between">
                        <div class="d-flex flex-column justify-content-center  navigasi">
                              <div style="margin-left: 40px;" class="">
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
                              <div class="btn fitur d-flex justify-content-center align-items-center" style="padding-right: 105px;width:100%"><span class="text-white  material-symbols-outlined">
                                          home
                                    </span><a class="text-white align-items-center" href="">&#160;&#160;Beranda</a></div>
                              <?php
                              if (isset($_SESSION['role'])) {
                                    if ($_SESSION['role'] === 'Admin') { ?>
                                          <div class="btn fitur d-flex justify-content-center align-items-center" style="padding-right: 40px"><span class="text-white  material-symbols-outlined">
                                                      edit_note
                                                </span><a class="text-white align-items-center" href="peminjaman/">&#160;&#160;Data Peminjaman</a></div>
                                          <div class="btn fitur d-flex justify-content-center align-items-center"><span class="text-white  material-symbols-outlined">
                                                      home_repair_service
                                                </span><a class="text-white align-items-center" href="invman/">&#160;&#160;Manajemen Peralatan</a></div>
                                          <div class="btn fitur d-flex justify-content-center align-items-center">&#160;&#160;<span class="text-white  material-symbols-outlined">
                                                      manage_accounts
                                                </span><a class="text-white align-items-center" href="userman/">&#160;&#160;Manajemen Pengguna</a></div>
                                          <form method="post" class="d-flex justify-content-center fitur" style="padding-right: 100px">
                                                <button name="logout" type="submit" formaction="logout.php" class=" btn text-white d-flex align-items-center justify-content-center" style="border-radius:0px; height:50px;width: 100%;">
                                                      <span class="material-symbols-outlined">
                                                            logout
                                                      </span>&#160;&#160;Logout
                                                </button>
                                          </form>
                                    <?php } else if ($_SESSION['role'] === 'Mahasiswa' || $_SESSION['role'] === 'Dosen') { ?>
                                          <div class="btn fitur d-flex justify-content-center align-items-center " style="padding-right:60px"><span class="material-symbols-outlined text-white">
                                                      home_repair_service
                                                </span><a class="text-white align-items-center" href="pinjam/">&#160;&#160;Pinjam Barang</a>
                                          </div>
                                          <form method="post" class="d-flex justify-content-center fitur" style="padding-right: 100px">
                                                <button name="logout" type="submit" formaction="logout.php" class=" btn text-white d-flex align-items-center justify-content-center" style="border-radius:0px; height:50px;width: 100%;">
                                                      <span class="material-symbols-outlined">
                                                            logout
                                                      </span>&#160;&#160;Logout
                                                </button>
                                          </form>
                                    <?php  }
                              } else if (!(isset($_SESSION['user']))) { ?>
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
                  <div class="col-9   ms-auto me-auto bg-white rounded-2 pt-3 " style="max-height:76vh; margin-top: 80px;">

                        <?php
                        include 'connection.php';
                        $connect->exec("USE proyek");

                        $query = "SELECT dp.*, b.nama_barang, u.nama_user FROM detail_peminjaman dp INNER JOIN barang b ON dp.id_barang = b.id_barang INNER JOIN user u ON dp.id_user = u.id_user WHERE status_diambil = 'picked'";
                        $statement = $connect->prepare($query);
                        $statement->execute();
                        $rowCount = $statement->rowCount(); ?>

                        <div class="table-view overflow-auto" style="height:80%;">
                              <table class="table table-striped ">
                                    <tr>
                                          <thead>
                                                <th scope="col">Lihat</th>
                                                <th scope="col">Id Peminjaman</th>
                                                <th scope="col">Tanggal Peminjaman</th>
                                                <th scope="col">Tanggal Pengembalian</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                          <?php $users = $statement->fetchAll();
                                          $i = 1;
                                          foreach ($users as $user) {  ?>
                                                <tr>
                                                      <td>
                                                            <form action="preview.php" method="GET">
                                                                  <button class="btn" name="id_peminjaman" value="<?= $user['id_peminjaman']; ?>"><span class="material-symbols-outlined">
                                                                              open_in_new
                                                                        </span></button>
                                                            </form>
                                                      </td>
                                                      <td><?= $user['id_peminjaman']; ?></td>
                                                      <td><?= $user['tanggal_peminjaman']; ?></td>
                                                      <td><?= $user['tanggal_pengembalian']; ?></td>
                                                </tr>
                                          <?php $i++;
                                          }

                                          ?>
                                    </tbody>
                              </table>
                        </div>
                  </div>
            </div>
      </div>


      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.6.1.min.js"></script>
      <script src="js/index.js"></script>
      <?php
      include 'connection.php';
      if (isset($_SESSION['user'])) {
            $connect->exec("USE proyek");

            $jmlStmnt = "SELECT id_user FROM user WHERE username = :uname";
            $stmnt = $connect->prepare($jmlStmnt);
            $stmnt->bindParam(':uname', $_SESSION['user']);
            $stmnt->execute();
            $userId = $stmnt->fetchColumn();

            $sql = "SELECT tanggal_pengembalian, id_barang, id_user FROM detail_peminjaman WHERE id_user = :userId";
            $statement = $connect->prepare($sql);
            $statement->bindParam(':userId', $userId);
            $statement->execute();

            $currentDate = date('Y-m-d');
            $oneDayAway = date('Y-m-d', strtotime($currentDate . '+1 day'));

            $returnDates = $statement->fetchAll(PDO::FETCH_ASSOC);

            $delay = 1000;

            foreach ($returnDates as $returnDate) {
                  $tanggalPengembalian = $returnDate['tanggal_pengembalian'] ?? null;
                  if ($tanggalPengembalian == $oneDayAway) {
                        $namaStmnt = "SELECT nama_user FROM user WHERE id_user = :userId";
                        $namaStatement = $connect->prepare($namaStmnt);
                        $namaStatement->bindParam(':userId', $returnDate['id_user']);
                        $namaStatement->execute();
                        $namauser = $namaStatement->fetchColumn();

                        $barangStmnt = "SELECT nama_barang FROM barang WHERE id_barang = :userId";
                        $barangStatement = $connect->prepare($barangStmnt);
                        $barangStatement->bindParam(':userId', $returnDate['id_barang']);
                        $barangStatement->execute();
                        $namaBarang = $barangStatement->fetchColumn();

                        echo "
                <style>
                  @keyframes slideUp {
                        0% {
                              opacity: 0;
                              transform: translateY(100%);
                        }
                        100% {
                              opacity: 1;
                              transform: translateY(0);
                        }
                  }
                  .toast.show {
                        animation: slideUp 0.5s ease-in-out;
                  }
                  </style>
                ";

                        echo "
                <script>
                    setTimeout(function() {
                        const toastElement = document.createElement('div');
                        toastElement.classList.add('toast', 'show');
                        toastElement.setAttribute('role', 'alert');
                        toastElement.setAttribute('aria-live', 'assertive');
                        toastElement.setAttribute('aria-atomic', 'true');
                        toastElement.setAttribute('style', 'position: fixed; bottom: 20px; right: 20px; z-index: 9999;');
                        toastElement.innerHTML = `
                            <div class='toast-header'>
                                <strong class='me-auto'>Notifications</strong>
                                <button type='button' class='btn-close' data-bs-dismiss='toast' aria-label='Close'></button>
                            </div>
                            <div class='toast-body'>
                              Hai $namauser!
                              <br>
                              Batas peminjaman $namaBarang akan berakhir besok.
                            </div>
                        `;
                        document.body.appendChild(toastElement);
                        const toastBootstrap = new bootstrap.Toast(toastElement);
                        toastBootstrap.show();
                    }, $delay);
                </script>
                ";
                        $delay += 4000;
                  }
            }
      }
      ?>

</body>

</html>