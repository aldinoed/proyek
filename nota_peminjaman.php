<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
      <link rel="stylesheet" href="bootstrap.min.css">
      <style>
            * {
                  margin: 0;
                  padding: 0;
                  font-family: 'Viga'
            }
      </style>
</head>

<body>
      <div class="container">
            <h1 class="d-flex justify-content-center">DATA PEMINJAMAN</h1>
            <table class="table table-bordered border-primary">
                  <thead>
                        <tr>
                              <th scope="col">NO.</th>
                              <th scope="col">Nama Peminjam</th>
                              <th scope="col">Barang yang Dipinjam</th>
                              <th scope="col">Jumlah</th>
                        </tr>
                  </thead>
                  <tbody>
                        <?php
                        include('connection.php');
                        $connect->exec("USE proyek");
                        $query = "SELECT u.nama_user, p.barang, p.quantity FROM user AS u JOIN peminjaman AS p";
                        $result = $connect->query($query);

                        $nomor = 1;

                        while ($row = $result->fetch()) {
                              echo "<tr>";
                              echo "<td>$nomor</td>";
                              echo "<td>$row[nama_user]</td>";
                              echo "<td>$row[barang]</td>";
                              echo "<td>$row[quantity]</td>";
                              echo "</tr>";
                              $nomor++;
                        }
                        ?>
                  </tbody>
            </table>
            <div class="gap-2 mt-3 d-flex justify-content-center">
                  <a class="nav-link" href="index.php"><input class="btn btn-success " type="submit" value="Selesai" name="selesai"></a>
            </div>

      </div>
</body>

</html>