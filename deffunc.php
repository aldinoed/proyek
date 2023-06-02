<?php
function cekUuid()
{
      include 'connection.php';
      $connect->exec("USE proyek");
      $query = "SELECT id_peminjaman FROM detail_peminjaman";
      $statement = $connect->query($query);
      $id = rand();

      while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $data = $row['id_peminjaman'];

            if ($data == $id) {
                  $id = rand();
            }
      }
      return $id;
}
