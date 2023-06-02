<?php
session_start();
include 'connection.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Preview</title>
      <link rel="stylesheet" href="../css/bootstrap.min.css">
      <style>
            /* RESET & BASIC STYLES
–––––––––––––––––––––––––––––––––––––––––––––––––– */
            @import url("https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;700&display=swap");

            :root {
                  --white: #fff;
                  --darkblue: #1b4965;
                  --lightblue: #edf2f4;
            }

            * {
                  padding: 0;
                  margin: 0;
            }

            body {
                  margin: 50px 0 150px;
                  font-family: "Viga", sans-serif;
            }

            .container {
                  max-width: 1000px;
                  padding: 0 15px;
                  margin: 0 auto;
            }

            h1 {
                  font-size: 1.5em;
            }

            th {
                  background-color: darkblue;
                  color: white;
            }

            /* TABLE STYLES
–––––––––––––––––––––––––––––––––––––––––––––––––– */
            /* .table-wrapper {
                  overflow-x: auto;
            }

            .table-wrapper::-webkit-scrollbar {
                  height: 8px;
            }*/

            .table-wrapper::-webkit-scrollbar-thumb {
                  background: var(--darkblue);
                  border-radius: 40px;
            }

            .table-wrapper::-webkit-scrollbar-track {
                  background: var(--white);
                  border-radius: 40px;
            }

            /*
            .table-wrapper table {
                  margin: 50px 0 20px;
                  border-collapse: collapse;
                  text-align: center;
            }

            .table-wrapper table th,
            .table-wrapper table td {
                  padding: 10px;
                  min-width: 75px;
            }

            .table-wrapper table th {
                  color: var(--white);
                  background: var(--darkblue);
            }

            .table-wrapper table tbody tr:nth-of-type(even)>* {
                  background: var(--lightblue);
            }

            .table-wrapper table td:first-child {
                  display: grid;
                  grid-template-columns: 25px 1fr;
                  grid-gap: 10px;
                  text-align: left;
            }

            .table-credits {
                  font-size: 12px;
                  margin-top: 10px;
            }

            /* FOOTER STYLES
–––––––––––––––––––––––––––––––––––––––––––––––––– */
            .page-footer {
                  position: fixed;
                  right: 0;
                  bottom: 50px;
                  display: flex;
                  align-items: center;
                  padding: 5px;
                  z-index: 1;
                  background: var(--white);
            }

            .page-footer a {
                  display: flex;
                  margin-left: 4px;
            }

            */
      </style>
</head>

<body>
      <div class="container">
            <div class="card shadow rounded d-flex justify-content-center p-3">
                  <h1 class="" style="margin-left:350px">Detail Peminjaman Barang</h1>
                  <div class="table-wrapper stripped p-3 table-stripped-columns overflow-auto" style="width:100%">
                        <table style="width:100%">
                              <thead>
                                    <tr>
                                          <th class="d-flex justify-content-center" scope="col">Id Peminjaman</th>
                                          <th scope="col">Nama Barang</th>
                                          <th scope="col">Quantity</th>
                                          <th scope="col">Tanggal Peminjaman</th>
                                          <th scope="col">Tanggal Pengembalian</th>
                                    </tr>
                              </thead>
                              <tbody>

                                    <?php
                                    include('connection.php');
                                    $connect->exec("USE proyek");
                                    if (isset($_GET['id_peminjaman'])) {
                                          $idPeminjaman = $_GET['id_peminjaman'];

                                          $query = "SELECT dp.id_peminjaman, MAX(u.nama_user) AS nama_user, MAX(u.id_user) AS id_user,  MAX(b.nama_barang) AS nama_barang, MAX(dp.id_barang) AS id_barang, MAX(dp.quantity) AS quantity, MAX(dp.tanggal_pengembalian) AS tanggal_pengembalian,MAX(dp.tanggal_peminjaman) AS tanggal_peminjaman , MAX(dp.status_diambil) AS status_diambil ,MAX(dp.status) AS status  FROM detail_peminjaman dp INNER JOIN barang b ON dp.id_barang = b.id_barang INNER JOIN user u ON dp.id_user = u.id_user GROUP BY dp.id_peminjaman";
                                          $stmt = $connect->prepare($query);
                                          // $stmt->bindParam(':id_peminjaman', $idPeminjaman);
                                          $stmt->execute();
                                          $result = $stmt->fetchAll();

                                          // Tampilkan detail peminjaman
                                          if ($stmt->rowCount() > 0) {
                                                foreach ($result as $row) { ?>
                                                      <tr>
                                                            <td class="d-flex justify-content-center"><?= $row['id_peminjaman']; ?></td>
                                                            <td><?= $row['nama_barang']; ?></td>
                                                            <td class="ps-4"><?= $row['quantity']; ?></td>
                                                            <td><?= $row['tanggal_peminjaman']; ?></td>
                                                            <td><?= $row['tanggal_pengembalian']; ?></td>
                                          <?php  }
                                          } else {
                                                echo "Detail peminjaman tidak ditemukan.";
                                          }
                                    } else {
                                          echo "ID_Peminjaman tidak diberikan.";
                                    }
                                          ?>

                              </tbody>
                        </table>
                  </div>

            </div>
      </div>
</body>

</html>