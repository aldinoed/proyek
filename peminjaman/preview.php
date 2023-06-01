<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
      <link rel="stylesheet" href="bootstrap.min.css">
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
                  font-family: "Noto Sans", sans-serif;
            }

            .container {
                  max-width: 1000px;
                  padding: 0 15px;
                  margin: 0 auto;
            }

            h1 {
                  font-size: 1.5em;
            }

            /* TABLE STYLES
–––––––––––––––––––––––––––––––––––––––––––––––––– */
            .table-wrapper {
                  overflow-x: auto;
            }

            .table-wrapper::-webkit-scrollbar {
                  height: 8px;
            }

            .table-wrapper::-webkit-scrollbar-thumb {
                  background: var(--darkblue);
                  border-radius: 40px;
            }

            .table-wrapper::-webkit-scrollbar-track {
                  background: var(--white);
                  border-radius: 40px;
            }

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
      </style>
</head>

<body>
      <div class="container">
            <h1>Detail Peminjaman Barang</h1>
            <div class="table-wrapper">
                  <table>
                        <thead>
                              <tr>
                                    <th>Id_Peminjaman</th>
                                    <th>Nama_User</th>
                                    <th>Barang</th>
                                    <th>Quantity</th>
                                    <th>Tanggal_Pengembalian</th>
                                    <th>Status</th>
                              </tr>
                        </thead>
                        <tbody>

                              <?php
                              include('connection.php');

                              if (isset($_GET['id_peminjaman'])) {
                                    $id_peminjaman = $_GET['id_peminjaman'];

                                    $query = "SELECT * FROM detail_peminjaman WHERE id_peminjaman = :id_peminjaman";
                                    $stmt = $connect->prepare($query);
                                    $stmt->bindParam(':id_peminjaman', $id_peminjaman);
                                    $stmt->execute();
                                    $result = $stmt->fetchAll();

                                    // Tampilkan detail peminjaman
                                    if ($stmt->rowCount() > 0) {
                                          foreach ($result as $row) {
                                                echo "<tr>";
                                                echo "<td>{$row['id_peminjaman']}</td>";
                                                echo "<td>{$row['nama_user']}</td>";
                                                echo "<td>{$row['barang']}</td>";
                                                echo "<td>{$row['quantity']}</td>";
                                                echo "<td>{$row['tanggal_pengembalian']}</td>";
                                                echo "<td>{$row['status']}</td>"; // Closing tag td
                                                echo "</tr>";
                                          }
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
      <footer class="page-footer">
            <span>made by </span>
            <a href="https://georgemartsoukos.com/" target="_blank">
                  <img width="24" height="24" src="https://assets.codepen.io/162656/george-martsoukos-small-logo.svg" alt="George Martsoukos logo">
            </a>
      </footer>
</body>

</html>